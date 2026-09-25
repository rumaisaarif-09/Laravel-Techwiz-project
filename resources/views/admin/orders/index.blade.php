<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Customer Orders | eGreen Basket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- eGreen Basket Theme Styling -->
    <style>
        :root {
            --bg-color: #F3F7F2;
            --card-bg: #FFFFFF;
            --primary-green: #588157;
            --text-color: #263328;
            --hover-green: #466745;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Theme */
        .navbar-custom {
            background-color: var(--card-bg);
            border-bottom: 1px solid #e0e0e0;
        }

        /* Theme Cards */
        .card-custom {
            background-color: var(--card-bg);
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        /* Dynamic Green Buttons */
        .btn-green {
            background-color: var(--primary-green) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-green:hover {
            background-color: var(--hover-green) !important;
            color: #ffffff !important;
        }

        .btn-outline-green {
            color: var(--primary-green) !important;
            border: 1px solid var(--primary-green) !important;
            border-radius: 8px;
        }

        .btn-outline-green:hover {
            background-color: var(--primary-green) !important;
            color: #ffffff !important;
        }

        /* Table Styling */
        .table-custom thead {
            background-color: var(--primary-green) !important;
            color: #ffffff !important;
        }

        .table-custom th {
            border: none;
            padding: 12px 16px;
        }

        .table-custom td {
            padding: 12px 16px;
            vertical-align: middle;
        }

        .text-green {
            color: var(--primary-green) !important;
        }

        /* Status Badges */
        .badge-pending { background-color: #ffeeba; color: #856404; }
        .badge-completed { background-color: #d4edda; color: #155724; }
        .badge-other { background-color: #e2e3e5; color: #383d41; }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom mb-4 px-4 py-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4 text-green" href="#">eGreen Basket</a>
            <a href="{{ route('products.index') }}" class="btn btn-outline-green btn-sm" target="_blank">
                <i class="bi bi-shop"></i> View Storefront
            </a>
        </div>
    </nav>

    <div class="container py-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="fw-bold text-green mb-0">
                <i class="bi bi-box-seam me-2"></i>Customer Orders Management
            </h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 10px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(count($orders) > 0)
            <div class="card card-custom p-0 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 table-custom">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer Details</th>
                                <th>Items Ordered</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="fw-bold text-green">#{{ $order->id }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $order->phone }}</div>
                                        <small class="text-muted">{{ $order->address }}</small>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled mb-0 small">
                                            @foreach($order->items as $item)
                                                <li>
                                                    • {{ $item->product ? $item->product->name : 'Product' }} 
                                                    <span class="fw-bold">x {{ $item->quantity }}</span> 
                                                    <span class="text-muted">(Rs. {{ number_format($item->price, 2) }})</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="fw-bold text-green">
                                        Rs. {{ number_format($order->total_price ?? $order->grand_total, 2) }}
                                    </td>
                                    <td>
                                        <span class="badge 
                                            @if($order->status == 'pending') badge-pending 
                                            @elseif($order->status == 'completed' || $order->status == 'delivered') badge-completed 
                                            @else badge-other @endif px-3 py-2" style="border-radius: 6px;">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-2">
                                            @csrf
                                            <select name="status" class="form-select form-select-sm" style="width: 130px; border-radius: 6px;">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-green px-3">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-5 card card-custom">
                <i class="bi bi-inbox text-muted" style="font-size: 3.5rem;"></i>
                <h5 class="mt-3 text-muted">Abhi koi order place nahi hua.</h5>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>