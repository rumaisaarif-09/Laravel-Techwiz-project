

@section('title', 'Farmer Stall Dashboard | MarketLink')

@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="fw-bold mb-1">Farmer Stall Portal</h3>
            <p class="text-muted mb-0">Manage your product inventory and customer pre-orders.</p>
        </div>
        <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-circle me-1"></i> Add New Produce
        </button>
    </div>

    <!-- Stats -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <small class="text-muted fw-semibold">Active Listed Items</small>
                <h3 class="fw-bold text-success mb-0">12 Products</h3>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <small class="text-muted fw-semibold">Pending Pre-Orders</small>
                <h3 class="fw-bold text-warning mb-0">8 Requests</h3>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <small class="text-muted fw-semibold">Assigned Market</small>
                <h3 class="fw-bold text-primary mb-0">Model Colony</h3>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white py-3 border-0">
            <h5 class="fw-bold mb-0">Incoming Customer Reservations</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Product Details</th>
                        <th>Time Window</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-semibold">#ORD-1092</td>
                        <td>Ali Khan</td>
                        <td>Fresh Organic Spinach (2 bunches)</td>
                        <td>Sat, 10:00 AM</td>
                        <td><span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Pending</span></td>
                        <td>
                            <button class="btn btn-sm btn-success rounded-3"><i class="bi bi-check-lg"></i> Mark Ready</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection