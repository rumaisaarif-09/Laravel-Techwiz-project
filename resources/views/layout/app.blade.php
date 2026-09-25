<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MarketLink | eGreen Basket')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Leaflet OpenStreetMap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f8f9fa; 
        }
        .bg-gradient-success { 
            background: linear-gradient(135deg, #198754, #20c997); 
        }
        .product-card { 
            transition: all 0.3s ease; 
        }
        .product-card:hover { 
            transform: translateY(-5px); 
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/home') }}">
                <span class="text-success me-1 fs-3"><i class="bi bi-basket2-fill"></i></span>
                <span class="fs-4">Market<span class="text-success">Link</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto fw-medium">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/markets') }}">Markets & Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Products</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ url('/customer/dashboard') }}" class="btn btn-outline-success btn-sm rounded-pill px-3">Customer Panel</a>
                    <a href="{{ url('/farmer/dashboard') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Farmer Panel</a>
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-danger btn-sm rounded-pill px-3">Admin Panel</a>
                    <a href="{{ url('/login') }}" class="btn btn-light border btn-sm rounded-pill px-3 ms-2">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT BODY -->
    <div style="margin-top: 80px; min-height: 80vh;">
        @yield('content')
    </div>

    <!-- AI CHATBOT WIDGET -->
    <div id="aiChatbotWrapper" class="position-fixed bottom-0 end-0 m-4" style="z-index: 1050;">
        <button id="chatbotToggleBtn" class="btn btn-success rounded-circle p-3 shadow-lg d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
            <i class="bi bi-robot fs-3"></i>
        </button>

        <div id="chatbotBox" class="card shadow-lg border-0 d-none position-absolute bottom-100 end-0 mb-3" style="width: 320px; height: 400px; border-radius: 18px; overflow: hidden;">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center py-3">
                <h6 class="mb-0 fw-bold"><i class="bi bi-robot me-1"></i> eGreen AI Assistant</h6>
                <button type="button" id="closeChatbot" class="btn-close btn-close-white"></button>
            </div>
            <div class="card-body overflow-y-auto p-3 bg-light" id="chatMessages" style="height: 280px; font-size: 13px;">
                <div class="p-2 rounded bg-white border text-dark mb-2" style="max-width: 85%;">
                    Hello! Ask me about market locations or fresh stock availability!
                </div>
            </div>
            <div class="card-footer bg-white border-top p-2">
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm border-0 bg-light" placeholder="Ask a question...">
                    <button class="btn btn-sm btn-success"><i class="bi bi-send-fill"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-4 pb-3 mt-5">
        <div class="container text-center">
            <p class="text-muted small mb-0">&copy; 2026 MarketLink | eGreen Basket. TechWiz Solution.</p>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.getElementById('chatbotToggleBtn').addEventListener('click', function() {
            document.getElementById('chatbotBox').classList.toggle('d-none');
        });
        document.getElementById('closeChatbot').addEventListener('click', function() {
            document.getElementById('chatbotBox').classList.add('d-none');
        });
    </script>
    @stack('scripts')
</body>
</html>