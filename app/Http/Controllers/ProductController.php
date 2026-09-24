<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Farmer ke apne products show karna
     */
    public function index()
    {
        $products = Product::where('user_id', auth()->id())
            ->with('category')
            ->latest()
            ->get();

        return view('farmer.products.index', compact('products'));
    }

    /**
     * Product add karne ka form show karna
     */
    public function create()
    {
        $categories = Category::all();

        return view('farmer.products.create', compact('categories'));
    }

    /**
     * Naya product database mein save karna
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        // Image local storage mein save karna
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store(
                'products',
                'public'
            );
        }

        Product::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product added successfully.');
    }

    /**
     * Product ki details show karna
     */
    public function show(string $id)
    {
        $product = Product::where('user_id', auth()->id())
            ->with('category')
            ->findOrFail($id);

        return view('farmer.products.show', compact('product'));
    }

    /**
     * Farmer ke apne product ka edit form show karna
     */
    public function edit(string $id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);

        $categories = Category::all();

        return view(
            'farmer.products.edit',
            compact('product', 'categories')
        );
    }

    /**
     * Product ko update karna
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Nayi image upload hone par purani image delete karna
        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $request->file('image')->store(
                'products',
                'public'
            );
        }

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $product->save();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Product delete karna
     */
    public function destroy(string $id)
    {
        $product = Product::where('user_id', auth()->id())
            ->findOrFail($id);

        // Product ke saath image bhi delete karna
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}

