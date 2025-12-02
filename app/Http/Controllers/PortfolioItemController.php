<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Storage;

class PortfolioItemController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolioItems = PortfolioItem::ordered()->paginate(10);
        return view('dashboard.portfolio.index', compact('portfolioItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_items,slug',
            'category' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|string|max:255',
            'project_url_external' => 'nullable|url|max:255',
            'project_url_external_text' => 'nullable|string|max:255',
            'description' => 'required|string',
            'overview' => 'nullable|string',
            'overview_additional' => 'nullable|string',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|string|max:255',
            'features' => 'nullable|json',
            'technologies' => 'nullable|json',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('assets/img/portfolio/' . $validated['title']), $mainImageName);
            $validated['main_image'] = 'assets/img/portfolio/' . $validated['title'] . '/' . $mainImageName;
        }

        // Handle gallery images upload
        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/img/portfolio/' . $validated['title']), $imageName);
                $galleryPaths[] = 'assets/img/portfolio/' . $validated['title'] . '/' . $imageName;
            }
        }
        $validated['gallery_images'] = $galleryPaths;

        // Parse features and technologies from JSON if provided
        if (isset($validated['features'])) {
            $validated['features'] = json_decode($validated['features'], true);
        }
        if (isset($validated['technologies'])) {
            $validated['technologies'] = json_decode($validated['technologies'], true);
        }

        $portfolio = PortfolioItem::create($validated);

        // Send notification to all devices
        $this->firebase->notifyNewPortfolio($portfolio);

        return redirect()->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('dashboard.portfolio.show', compact('portfolioItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('dashboard.portfolio.edit', compact('portfolioItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_items,slug,' . $id,
            'category' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|string|max:255',
            'project_url_external' => 'nullable|url|max:255',
            'project_url_external_text' => 'nullable|string|max:255',
            'description' => 'required|string',
            'overview' => 'nullable|string',
            'overview_additional' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|string|max:255',
            'features' => 'nullable|json',
            'technologies' => 'nullable|json',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('assets/img/portfolio/' . $validated['title']), $mainImageName);
            $validated['main_image'] = 'assets/img/portfolio/' . $validated['title'] . '/' . $mainImageName;
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = $portfolioItem->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/img/portfolio/' . $validated['title']), $imageName);
                $galleryPaths[] = 'assets/img/portfolio/' . $validated['title'] . '/' . $imageName;
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        // Parse features and technologies from JSON if provided
        if (isset($validated['features'])) {
            $validated['features'] = json_decode($validated['features'], true);
        }
        if (isset($validated['technologies'])) {
            $validated['technologies'] = json_decode($validated['technologies'], true);
        }

        $portfolioItem->update($validated);

        // Send notification to all devices
        $this->firebase->notifyPortfolioUpdated($portfolioItem);

        return redirect()->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        $title = $portfolioItem->title;
        $portfolioItem->delete();

        // Send notification to all devices
        $deletedPortfolio = (object)['title' => $title];
        $this->firebase->notifyPortfolioDeleted($deletedPortfolio);

        return redirect()->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio item deleted successfully!');
    }
    
    /**
     * Delete a specific gallery image
     */
    public function deleteGalleryImage(string $id, int $index)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        $galleryImages = $portfolioItem->gallery_images ?? [];
        
        if (isset($galleryImages[$index])) {
            // Delete the physical file
            $imagePath = public_path($galleryImages[$index]);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            
            // Remove from array
            array_splice($galleryImages, $index, 1);
            
            // Update database
            $portfolioItem->update(['gallery_images' => $galleryImages]);
            
            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Image not found'
        ], 404);
    }
    
    /**
     * Reorder gallery images
     */
    public function reorderGallery(Request $request, string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        $newOrder = $request->input('order', []);
        
        if (!is_array($newOrder)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid order data'
            ], 400);
        }
        
        $galleryImages = $portfolioItem->gallery_images ?? [];
        $reorderedImages = [];
        
        foreach ($newOrder as $index) {
            if (isset($galleryImages[$index])) {
                $reorderedImages[] = $galleryImages[$index];
            }
        }
        
        $portfolioItem->update(['gallery_images' => $reorderedImages]);
        
        return response()->json([
            'success' => true,
            'message' => 'Gallery order updated successfully'
        ]);
    }
}
