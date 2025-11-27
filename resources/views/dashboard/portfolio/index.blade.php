@extends('dashboard.layout')

@section('title', 'Portfolio Items')

@section('page-title', 'Portfolio Items')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h4 class="mb-0" style="color: var(--heading-color);">All Portfolio Items</h4>
        <a href="{{ route('dashboard.portfolio.create') }}" class="btn btn-gradient">
            <i class="bi bi-plus-circle me-2"></i>Add New Project
        </a>
    </div>

    <div class="stat-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolioItems as $item)
                        <tr>
                            <td data-label="Image">
                                <img src="{{ asset($item->main_image) }}" alt="{{ $item->title }}" 
                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            </td>
                            <td data-label="Title">
                                <strong>{{ $item->title }}</strong>
                            </td>
                            <td data-label="Category">
                                <span class="badge" style="background: var(--accent-color);">{{ $item->category }}</span>
                            </td>
                            <td data-label="Status">
                                @if($item->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td data-label="Order">{{ $item->order }}</td>
                            <td data-label="Created">{{ $item->created_at->format('M d, Y') }}</td>
                            <td data-label="Actions">
                                <div class="btn-group btn-group-sm d-flex" role="group">
                                    <a href="{{ route('dashboard.portfolio.edit', $item->id) }}" 
                                       class="btn btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('dashboard.portfolio.destroy', $item->id) }}" 
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this portfolio item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="bi bi-inbox display-4 text-muted"></i>
                                <p class="text-muted mt-2">No portfolio items found. Add your first project!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($portfolioItems->hasPages())
            <div class="mt-4">
                {{ $portfolioItems->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
