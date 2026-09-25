@extends()

@section('title', 'Browse Fresh Produce | MarketLink')

@section('content')
<div class="container py-4">
    <!-- Search Bar -->
    <div class="row align-items-center mb-4 g-3">
        <div class="col-md-6">
            <h2 class="fw-bold mb-1">Fresh Farm <span class="text-success">Products</span></h2>
            <p class="text-muted mb-0">Browse seasonal produce directly from local farmers.</p>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-success"></i></span>
                <input type="text" class="form-control border-start-0" placeholder="Search vegetables, fruits, dairy...">
                <button class="btn btn-success px-4">Search</button>
            </div>
        </div>
    </div>

    <!-- Product Cards Grid -->
    <div class="row g-4">
        <!-- Item 1 -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative product-card">
                <span class="position-absolute top-0 start-0 bg-success text-white small px-3 py-1 m-2 rounded-pill fw-semibold">Fresh Stock</span>
                <img src="https://images.unsplash.com/photo-1597362925123-77861d3fbac7?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 190px; object-fit: cover;" alt="Spinach">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted"><i class="bi bi-shop me-1 text-success"></i> Green Valley Farm</small>
                    <h5 class="fw-bold my-1">Organic Fresh Spinach</h5>
                    <div class="mt-auto pt-3 d-flex align-items-center justify-content-between border-top">
                        <div>
                            <span class="fs-5 fw-bold text-success">Rs. 180</span>
                            <small class="text-muted">/ bunch</small>
                        </div>
                        <button class="btn btn-sm btn-success rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#preOrderModal">
                            <i class="bi bi-bag-plus me-1"></i> Pre-Order
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative product-card">
                <span class="position-absolute top-0 start-0 bg-warning text-dark small px-3 py-1 m-2 rounded-pill fw-semibold">Limited Stock</span>
                <img src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 190px; object-fit: cover;" alt="Apples">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted"><i class="bi bi-shop me-1 text-success"></i> Sunrise Organic Farm</small>
                    <h5 class="fw-bold my-1">Red Delicious Apples</h5>
                    <div class="mt-auto pt-3 d-flex align-items-center justify-content-between border-top">
                        <div>
                            <span class="fs-5 fw-bold text-success">Rs. 420</span>
                            <small class="text-muted">/ kg</small>
                        </div>
                        <button class="btn btn-sm btn-success rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#preOrderModal">
                            <i class="bi bi-bag-plus me-1"></i> Pre-Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pre-Order Modal -->
<div class="modal fade" id="preOrderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Reserve for Market Pickup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="p-3 bg-light rounded-3 mb-3">
                    <p class="small text-muted mb-0"><i class="bi bi-info-circle text-primary me-1"></i> Payment is settled in cash or direct transfer at the pickup stall.</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control" value="1" min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Pickup Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Select Pickup Time Window</label>
                        <select class="form-select">
                            <option>09:00 AM - 10:30 AM</option>
                            <option>11:00 AM - 12:30 PM</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-success w-100 py-2 rounded-3 fw-semibold">Confirm Reservation</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection