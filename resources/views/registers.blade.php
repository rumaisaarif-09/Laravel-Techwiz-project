

@section('title', 'Register | MarketLink')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="text-success fs-1 mb-2"><i class="bi bi-person-plus-fill"></i></div>
                    <h3 class="fw-bold mb-1">Create an Account</h3>
                    <p class="text-muted small">Join MarketLink to buy or sell fresh farm produce</p>
                </div>

                <form action="{{ url('/login') }}" method="GET">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Full Name</label>
                        <input type="text" class="form-control rounded-3" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Email Address</label>
                        <input type="email" class="form-control rounded-3" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Account Type</label>
                        <select class="form-select rounded-3">
                            <option value="customer">Customer (Buy Fresh Produce)</option>
                            <option value="farmer">Farmer (Sell Produce at Market Stalls)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Password</label>
                        <input type="password" class="form-control rounded-3" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 rounded-3 fw-semibold shadow-sm mt-2">Create Account</button>
                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <p class="small text-muted mb-0">Already have an account? <a href="{{ url('/login') }}" class="text-success fw-semibold text-decoration-none">Login Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection