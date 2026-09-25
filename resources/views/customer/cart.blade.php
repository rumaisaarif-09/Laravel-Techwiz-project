<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eGreen Basket - Shopping Cart</title>
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

        .text-green {
            color: var(--primary-green) !important;
        }

        /* Custom Table Styling */
        .table-custom thead {
            background-color: #e9f0e8;
            color: var(--text-color);
        }

        .table-custom th {
            font-weight: 600;
            border-bottom: 2px solid #dcdcdc;
        }

        .table-custom td {
            border-bottom: 1px solid #f0f0f0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom px-4 py-3 mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4 text-green" href="{{ route('products.index') }}">eGreen Basket</a>
            <a href="{{ route('products.index') }}" class="btn btn-outline-green btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Continue Shopping
            </a>
        </div>
    </nav>

    <div class="container py-2">
        <h2 class="mb-4 fw-bold text-green"><i class="bi bi-cart3 me-2"></i>Shopping Cart</h2>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 10px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-custom mb-4 overflow-hidden">
                        <div class="card-body p-0">
                            <table class="table table-custom table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th class="pe-4 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandTotal = 0; @endphp
                                    @foreach($cart as $id => $item)
                                        @php 
                                            $total = $item['price'] * $item['quantity'];
                                            $grandTotal += $total;
                                        @endphp
                                        <tr>
                                            <td class="ps-4">
                                                <div class="fw-bold">{{ $item['name'] }}</div>
                                            </td>
                                            <td>Rs. {{ number_format($item['price'], 2) }}</td>
                                            <td>
                                                <span class="badge bg-light text-dark px-3 py-2 border">{{ $item['quantity'] }}</span>
                                            </td>
                                            <td class="fw-bold text-green">Rs. {{ number_format($total, 2) }}</td>
                                            <td class="pe-4 text-end">
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" style="border-radius: 6px;">
                                                        <i class="bi bi-trash"></i> Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Summary & Checkout -->
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="card-title mb-0 fw-bold text-green">Order Summary</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between mb-4 fs-5 fw-bold">
                                <span>Grand Total:</span>
                                <span class="text-green fs-4">Rs. {{ number_format($grandTotal, 2) }}</span>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="btn btn-green w-100 py-2 fs-6 mb-2">
                                <i class="bi bi-credit-card me-1"></i> Proceed to Checkout
                            </a>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100 style-radius" style="border-radius: 8px;">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart Screen -->
            <div class="text-center py-5 card card-custom">
                <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
                <h4 class="mt-3 text-muted">Aapka cart khali hai.</h4>
                <p class="text-secondary">Products khareedne ke liye store par wapas jayein.</p>
                <div class="mt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-green btn-lg">
                        <i class="bi bi-bag me-1"></i> Go to Products
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>