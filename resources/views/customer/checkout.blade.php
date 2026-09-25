<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eGreen Basket - Checkout</title>
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

        /* Form Customization */
        .form-control {
            border-radius: 8px;
            border: 1px solid #dcdcdc;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 0.25rem rgba(88, 129, 87, 0.25);
        }

        .list-group-item {
            border-color: #f0f0f0;
            background-color: transparent;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom px-4 py-3 mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4 text-green" href="{{ route('products.index') }}">eGreen Basket</a>
            <div>
                <a href="{{ route('cart.index') }}" class="btn btn-outline-green btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Back to Cart
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-2">
        <h2 class="fw-bold text-green mb-4"><i class="bi bi-credit-card me-2"></i>Checkout & Order Details</h2>

        <div class="row">
            <!-- Order Summary -->
            <div class="col-md-6 mb-4">
                <div class="card card-custom p-4">
                    <h4 class="fw-bold text-green mb-3"><i class="bi bi-bag-check me-2"></i>Order Summary</h4>
                    <hr class="text-muted">
                    
                    @php $total = 0; @endphp
                    <ul class="list-group list-group-flush mb-3">
                        @foreach($cart as $item)
                            @php $total += $item['price'] * $item['quantity']; @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                                <div>
                                    <strong class="d-block">{{ $item['name'] }}</strong>
                                    <small class="text-muted">Qty: {{ $item['quantity'] }} x Rs. {{ number_format($item['price'], 2) }}</small>
                                </div>
                                <span class="fw-bold text-green">Rs. {{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <hr class="text-muted">
                    <h5 class="d-flex justify-content-between fw-bold mb-0 pt-2">
                        <span>Total Amount:</span>
                        <span class="text-green fs-4">Rs. {{ number_format($total, 2) }}</span>
                    </h5>
                </div>
            </div>

            <!-- Shipping & Payment Form -->
            <div class="col-md-6">
                <div class="card card-custom p-4">
                    <h4 class="fw-bold text-green mb-3"><i class="bi bi-truck me-2"></i>Delivery Address</h4>
                    <hr class="text-muted">
                    
                    <form action="{{ route('checkout.place') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required placeholder="03XXXXXXXXX">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Shipping Address</label>
                            <textarea name="address" class="form-control" rows="3" required placeholder="Ghar ka mukammal address likhein..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Payment Method</label>
                            <input type="text" class="form-control bg-light text-muted" value="Cash on Delivery (COD)" readonly>
                        </div>

                        <button type="submit" class="btn btn-green w-100 py-2 fs-5">
                            <i class="bi bi-check-circle me-1"></i> Place Order (COD)
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>