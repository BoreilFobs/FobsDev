@extends('dashboard.layout')

@section('title', 'Edit Portfolio Item')

@section('page-title', 'Edit Project')

@section('styles')
<style>
    .feature-builder, .tech-builder {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
    }
    .feature-item-input, .tech-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 10px;
    }
    
    /* Gallery Management Styles */
    .gallery-item-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
        border: 2px solid #c8b9aa;
        border-radius: 12px;
        overflow: hidden;
        cursor: move;
        transition: all 0.3s ease;
        background: white;
    }
    
    .gallery-item-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(168, 109, 55, 0.3);
        border-color: #a86d37;
    }
    
    .gallery-item-wrapper.dragging {
        opacity: 0.5;
        transform: scale(0.95);
    }
    
    .gallery-item-wrapper.drag-over {
        border-color: #a86d37;
        border-style: dashed;
        background: rgba(168, 109, 55, 0.1);
    }
    
    .gallery-thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .gallery-item-controls {
        position: absolute;
        top: 8px;
        right: 8px;
        z-index: 10;
        display: flex;
        gap: 5px;
        align-items: center;
    }
    
    .delete-gallery-btn {
        width: 32px;
        height: 32px;
        padding: 0;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(220, 53, 69, 0.9);
        border: none;
        transition: all 0.2s;
    }
    
    .delete-gallery-btn:hover {
        background: #dc3545;
        transform: scale(1.1);
    }
    
    .gallery-order-badge {
        background: rgba(168, 109, 55, 0.95);
        color: white;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.85rem;
    }
    
    .drag-handle {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(168, 109, 55, 0.95);
        color: white;
        padding: 6px;
        text-align: center;
        font-size: 1.2rem;
        cursor: move;
    }
    
    #gallery-container {
        min-height: 150px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
        border: 2px dashed #c8b9aa;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="stat-card">
                <form action="{{ route('dashboard.portfolio.update', $portfolioItem->id) }}" method="POST" enctype="multipart/form-data" id="portfolioForm">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <!-- Basic Information Section -->
                        <div class="col-12">
                            <h4 class="border-bottom pb-2">Basic Information</h4>
                        </div>

                        <!-- Title -->
                        <div class="col-md-6">
                            <label for="title" class="form-label">Project Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $portfolioItem->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="col-md-6">
                            <label for="slug" class="form-label">URL Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug', $portfolioItem->slug) }}" 
                                   placeholder="auto-generated from title">
                            <small class="text-muted">URL: /{{ old('slug', $portfolioItem->slug) }}</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="col-md-4">
                            <label for="category" class="form-label">Category *</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                   id="category" name="category" value="{{ old('category', $portfolioItem->category) }}" 
                                   placeholder="e.g., Web and Mobile Development" required>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Client -->
                        <div class="col-md-4">
                            <label for="client" class="form-label">Client</label>
                            <input type="text" class="form-control @error('client') is-invalid @enderror" 
                                   id="client" name="client" value="{{ old('client', $portfolioItem->client) }}" 
                                   placeholder="Client name">
                            @error('client')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Project Date -->
                        <div class="col-md-4">
                            <label for="project_date" class="form-label">Project Date</label>
                            <input type="text" class="form-control @error('project_date') is-invalid @enderror" 
                                   id="project_date" name="project_date" value="{{ old('project_date', $portfolioItem->project_date) }}" 
                                   placeholder="e.g., 01 June, 2025">
                            @error('project_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- External URL -->
                        <div class="col-md-6">
                            <label for="project_url_external" class="form-label">External Project URL</label>
                            <input type="url" class="form-control @error('project_url_external') is-invalid @enderror" 
                                   id="project_url_external" name="project_url_external" value="{{ old('project_url_external', $portfolioItem->project_url_external) }}" 
                                   placeholder="https://example.com">
                            <small class="text-muted">The actual URL to link to</small>
                            @error('project_url_external')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- External URL Display Text -->
                        <div class="col-md-6">
                            <label for="project_url_external_text" class="form-label">External Link Text</label>
                            <input type="text" class="form-control @error('project_url_external_text') is-invalid @enderror" 
                                   id="project_url_external_text" name="project_url_external_text" value="{{ old('project_url_external_text', $portfolioItem->project_url_external_text) }}" 
                                   placeholder="e.g., Visit Live Site, View Website">
                            <small class="text-muted">Text to display for the external link</small>
                            @error('project_url_external_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content Section -->
                        <div class="col-12 mt-4">
                            <h4 class="border-bottom pb-2">Project Content</h4>
                        </div>

                        <!-- Short Description -->
                        <div class="col-12">
                            <label for="description" class="form-label">Short Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="2" required>{{ old('description', $portfolioItem->description) }}</textarea>
                            <small class="text-muted">Brief description shown on portfolio listing</small>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Overview -->
                        <div class="col-12">
                            <label for="overview" class="form-label">Overview (First Paragraph)</label>
                            <textarea class="form-control @error('overview') is-invalid @enderror" 
                                      id="overview" name="overview" rows="3">{{ old('overview', $portfolioItem->overview) }}</textarea>
                            <small class="text-muted">Main project overview paragraph</small>
                            @error('overview')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Additional Overview -->
                        <div class="col-12">
                            <label for="overview_additional" class="form-label">Additional Overview (Second Paragraph)</label>
                            <textarea class="form-control @error('overview_additional') is-invalid @enderror" 
                                      id="overview_additional" name="overview_additional" rows="3">{{ old('overview_additional', $portfolioItem->overview_additional) }}</textarea>
                            <small class="text-muted">Additional details about the project</small>
                            @error('overview_additional')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Images Section -->
                        <div class="col-12 mt-4">
                            <h4 class="border-bottom pb-2">Images</h4>
                        </div>

                        <!-- Current Main Image -->
                        <div class="col-12">
                            <label class="form-label">Current Main Image</label>
                            <div class="mb-2">
                                <img src="{{ asset($portfolioItem->main_image) }}" alt="{{ $portfolioItem->title }}" 
                                     style="max-width: 300px; border-radius: 8px;">
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="col-md-6">
                            <label for="main_image" class="form-label">Update Main Image (Optional)</label>
                            <input type="file" class="form-control @error('main_image') is-invalid @enderror" 
                                   id="main_image" name="main_image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image. Max 2MB</small>
                            @error('main_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gallery Images -->
                        <div class="col-md-6">
                            <label for="gallery_images" class="form-label">Add More Gallery Images (Optional)</label>
                            <input type="file" class="form-control @error('gallery_images.*') is-invalid @enderror" 
                                   id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                            <small class="text-muted">You can select multiple images</small>
                            @error('gallery_images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Gallery -->
                        @if($portfolioItem->gallery_images && count($portfolioItem->gallery_images) > 0)
                            <div class="col-12">
                                <label class="form-label">Current Gallery Images</label>
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-info-circle"></i> Drag to reorder, click trash to delete
                                </small>
                                <div id="gallery-container" class="d-flex flex-wrap gap-3">
                                    @foreach($portfolioItem->gallery_images as $index => $image)
                                        <div class="gallery-item-wrapper" data-index="{{ $index }}" draggable="true">
                                            <div class="gallery-item-controls">
                                                <button type="button" class="btn btn-sm btn-danger delete-gallery-btn" 
                                                        data-index="{{ $index }}" title="Delete image">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <span class="gallery-order-badge">{{ $index + 1 }}</span>
                                            </div>
                                            <img src="{{ asset($image) }}" alt="Gallery" class="gallery-thumbnail">
                                            <div class="drag-handle">
                                                <i class="bi bi-grip-vertical"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Features Section -->
                        <div class="col-12 mt-4">
                            <h4 class="border-bottom pb-2">Key Features</h4>
                            <button type="button" class="btn btn-sm btn-secondary mb-3" onclick="addFeature()">
                                <i class="bi bi-plus-circle"></i> Add Feature
                            </button>
                            <div id="features-container"></div>
                            <input type="hidden" name="features" id="features-json">
                        </div>

                        <!-- Technologies Section -->
                        <div class="col-12 mt-4">
                            <h4 class="border-bottom pb-2">Technologies Used</h4>
                            <button type="button" class="btn btn-sm btn-secondary mb-3" onclick="addTechnology()">
                                <i class="bi bi-plus-circle"></i> Add Technology
                            </button>
                            <div id="technologies-container"></div>
                            <input type="hidden" name="technologies" id="technologies-json">
                        </div>

                        <!-- Settings Section -->
                        <div class="col-12 mt-4">
                            <h4 class="border-bottom pb-2">Settings</h4>
                        </div>

                        <!-- Order -->
                        <div class="col-md-6">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                   id="order" name="order" value="{{ old('order', $portfolioItem->order) }}" min="0">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-select @error('is_active') is-invalid @enderror" 
                                    id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', $portfolioItem->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $portfolioItem->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('dashboard.portfolio.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-gradient">
                                    <i class="bi bi-check-circle me-2"></i>Update Project
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let featureIndex = 0;
let techIndex = 0;

// Existing features and technologies from database
const existingFeatures = @json($portfolioItem->features ?? []);
const existingTechnologies = @json($portfolioItem->technologies ?? []);

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Load existing features
    if (existingFeatures && existingFeatures.length > 0) {
        existingFeatures.forEach(feature => {
            addFeature(feature.icon, feature.title, feature.description);
        });
    }
    
    // Load existing technologies
    if (existingTechnologies && existingTechnologies.length > 0) {
        existingTechnologies.forEach(tech => {
            addTechnology(tech);
        });
    }
    
    // Initialize gallery management
    initializeGalleryManagement();
});

// ============ GALLERY MANAGEMENT ============
function initializeGalleryManagement() {
    const galleryContainer = document.getElementById('gallery-container');
    if (!galleryContainer) return;
    
    const items = galleryContainer.querySelectorAll('.gallery-item-wrapper');
    let draggedItem = null;
    
    items.forEach(item => {
        // Drag start
        item.addEventListener('dragstart', function(e) {
            draggedItem = this;
            this.classList.add('dragging');
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        });
        
        // Drag end
        item.addEventListener('dragend', function() {
            this.classList.remove('dragging');
            items.forEach(i => i.classList.remove('drag-over'));
            
            // Save new order
            saveGalleryOrder();
        });
        
        // Drag over
        item.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('drag-over');
            return false;
        });
        
        // Drag leave
        item.addEventListener('dragleave', function() {
            this.classList.remove('drag-over');
        });
        
        // Drop
        item.addEventListener('drop', function(e) {
            e.stopPropagation();
            e.preventDefault();
            
            if (draggedItem !== this) {
                // Swap positions
                const allItems = [...galleryContainer.querySelectorAll('.gallery-item-wrapper')];
                const draggedIndex = allItems.indexOf(draggedItem);
                const targetIndex = allItems.indexOf(this);
                
                if (draggedIndex < targetIndex) {
                    this.parentNode.insertBefore(draggedItem, this.nextSibling);
                } else {
                    this.parentNode.insertBefore(draggedItem, this);
                }
                
                updateGalleryOrderBadges();
            }
            
            this.classList.remove('drag-over');
            return false;
        });
    });
    
    // Delete buttons
    const deleteButtons = document.querySelectorAll('.delete-gallery-btn');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const index = this.getAttribute('data-index');
            deleteGalleryImage(index);
        });
    });
}

function updateGalleryOrderBadges() {
    const items = document.querySelectorAll('.gallery-item-wrapper');
    items.forEach((item, index) => {
        const badge = item.querySelector('.gallery-order-badge');
        if (badge) {
            badge.textContent = index + 1;
        }
        item.setAttribute('data-index', index);
    });
}

function saveGalleryOrder() {
    const items = document.querySelectorAll('.gallery-item-wrapper');
    const order = Array.from(items).map(item => parseInt(item.getAttribute('data-index')));
    
    fetch('{{ route("dashboard.portfolio.reorderGallery", $portfolioItem->id) }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ order: order })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast('Gallery order updated successfully', 'success');
            updateGalleryOrderBadges();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Failed to update gallery order', 'error');
    });
}

function deleteGalleryImage(index) {
    if (!confirm('Are you sure you want to delete this image?')) {
        return;
    }
    
    fetch('{{ route("dashboard.portfolio.deleteGalleryImage", ["portfolio" => $portfolioItem->id, "index" => "__INDEX__"]) }}'.replace('__INDEX__', index), {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const item = document.querySelector(`.gallery-item-wrapper[data-index="${index}"]`);
            if (item) {
                item.remove();
                updateGalleryOrderBadges();
                showToast('Image deleted successfully', 'success');
                
                // Reload page after 1 second to refresh the gallery
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        } else {
            showToast('Failed to delete image', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Failed to delete image', 'error');
    });
}

function showToast(message, type = 'success') {
    // Simple toast notification
    const toast = document.createElement('div');
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 25px;
        background: ${type === 'success' ? '#a86d37' : '#dc3545'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        z-index: 9999;
        font-weight: 500;
        animation: slideIn 0.3s ease-out;
    `;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Add animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(400px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(400px); opacity: 0; }
    }
`;
document.head.appendChild(style);

// ============ FEATURES MANAGEMENT ============
function addFeature(icon = '', title = '', description = '') {
    const container = document.getElementById('features-container');
    const featureDiv = document.createElement('div');
    featureDiv.className = 'feature-item-input';
    featureDiv.id = `feature-${featureIndex}`;
    featureDiv.innerHTML = `
        <div class="row g-2">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Icon (e.g., bi-check-circle-fill)" 
                       data-feature="icon" value="${icon}">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Feature Title" 
                       data-feature="title" value="${title}">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Feature Description" 
                       data-feature="description" value="${description}">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger w-100" onclick="removeFeature(${featureIndex})">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(featureDiv);
    featureIndex++;
}

function removeFeature(index) {
    const element = document.getElementById(`feature-${index}`);
    if (element) {
        element.remove();
    }
    updateFeaturesJSON();
}

function updateFeaturesJSON() {
    const features = [];
    const featureItems = document.querySelectorAll('.feature-item-input');
    featureItems.forEach(item => {
        const icon = item.querySelector('[data-feature="icon"]').value;
        const title = item.querySelector('[data-feature="title"]').value;
        const description = item.querySelector('[data-feature="description"]').value;
        if (title) {
            features.push({ icon, title, description });
        }
    });
    document.getElementById('features-json').value = JSON.stringify(features);
}

function addTechnology(name = '') {
    const container = document.getElementById('technologies-container');
    const techDiv = document.createElement('div');
    techDiv.className = 'tech-item';
    techDiv.id = `tech-${techIndex}`;
    techDiv.innerHTML = `
        <div class="row g-2">
            <div class="col-md-11">
                <input type="text" class="form-control" placeholder="Technology name (e.g., Laravel, React)" 
                       data-tech="name" value="${name}">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger w-100" onclick="removeTechnology(${techIndex})">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(techDiv);
    techIndex++;
}

function removeTechnology(index) {
    const element = document.getElementById(`tech-${index}`);
    if (element) {
        element.remove();
    }
    updateTechnologiesJSON();
}

function updateTechnologiesJSON() {
    const technologies = [];
    const techItems = document.querySelectorAll('.tech-item');
    techItems.forEach(item => {
        const name = item.querySelector('[data-tech="name"]').value;
        if (name) {
            technologies.push(name);
        }
    });
    document.getElementById('technologies-json').value = JSON.stringify(technologies);
}

// Update JSON before form submit
document.getElementById('portfolioForm').addEventListener('submit', function(e) {
    updateFeaturesJSON();
    updateTechnologiesJSON();
});

// Auto-generate slug from title if slug is empty
document.getElementById('title').addEventListener('blur', function() {
    const slugInput = document.getElementById('slug');
    if (!slugInput.value) {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
        slugInput.value = slug;
    }
});
</script>
@endsection