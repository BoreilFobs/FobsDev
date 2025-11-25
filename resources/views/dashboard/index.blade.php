@extends('dashboard.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="container-fluid">
    <div class="row g-4">
        <!-- Portfolio Stats -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                    <div class="ms-3">
                        <h3 class="mb-0">{{ $portfolioCount }}</h3>
                        <p class="text-muted mb-0">Total Projects</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="ms-3">
                        <h3 class="mb-0">{{ $activePortfolioCount }}</h3>
                        <p class="text-muted mb-0">Active Projects</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <div class="ms-3">
                        <h3 class="mb-0">{{ $portfolioCount - $activePortfolioCount }}</h3>
                        <p class="text-muted mb-0">Inactive Projects</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="ms-3">
                        <h3 class="mb-0">{{ date('Y') }}</h3>
                        <p class="text-muted mb-0">Current Year</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="stat-card">
                <h5 class="mb-4"><i class="bi bi-lightning-fill text-warning me-2"></i>Quick Actions</h5>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard.portfolio.create') }}" class="btn btn-gradient">
                        <i class="bi bi-plus-circle me-2"></i>Add New Project
                    </a>
                    <a href="{{ route('dashboard.portfolio.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-list-ul me-2"></i>View All Projects
                    </a>
                    <a href="/" target="_blank" class="btn btn-outline-secondary">
                        <i class="bi bi-eye me-2"></i>Preview Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
