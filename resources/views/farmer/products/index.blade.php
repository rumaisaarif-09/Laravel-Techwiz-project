<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products - Farmer Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            color: #1e4799;
        }

        .add-btn {
            background: #1e4799;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
        }

        .message {
            background: #dff5e1;
            color: #26733a;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card h3 {
            color: #1e4799;
        }

        .price {
            font-weight: bold;
            font-size: 18px;
        }

        .actions {
            margin-top: 15px;
        }

        .actions a,
        .actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .view {
            background: #e8eef9;
            color: #1e4799;
        }

        .edit {
            background: #1e4799;
            color: white;
        }

        .delete {
            background: #dc3545;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>My Products</h1>

        <a href="{{ route('products.create') }}" class="add-btn">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <div class="products">

        @forelse($products as $product)

            <div class="card">

                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}">
                @else
                    <div style="height:180px; background:#eef2f7; display:flex; align-items:center; justify-content:center; border-radius:10px;">
                        No Image
                    </div>
                @endif

                <h3>{{ $product->name }}</h3>

                <p>
                    Category:
                    {{ $product->category->name ?? 'N/A' }}
                </p>

                <p class="price">
                    Rs. {{ $product->price }}
                </p>

                <p>
                    Stock: {{ $product->stock }}
                </p>

                <p>
                    Status: {{ ucfirst($product->status) }}
                </p>

                <div class="actions">

                    <a href="{{ route('products.show', $product->id) }}"
                       class="view">
                        View
                    </a>

                    <a href="{{ route('products.edit', $product->id) }}"
                       class="edit">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="delete"
                                onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <p>No products found. Add your first product.</p>

        @endforelse

    </div>

</div>

</body>
</html>