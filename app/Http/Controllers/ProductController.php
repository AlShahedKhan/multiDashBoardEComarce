<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Collage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Display all products
    // public function index()
    // {
    //     // fetch only products if collage_id of users table and collage_id of products table are same
    //     $products = Product::all(); // Fetch all products for display
    //     return view('products.index', compact('products'));
    // }
    public function index()
    {
        // Get the logged-in user's collage_id
        $collageId = Auth::user()->collage_id;

        // Fetch products where the collage_id matches the user's collage_id
        $products = Product::where('collage_id', $collageId)->get();

        return view('products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        $collages = Collage::all(); // Fetch all collages to associate with the product
        return view('products.create', compact('collages'));
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'collage_id' => 'required|exists:collages,id', // Make sure collage exists
        ]);

        Product::create([
            'name' => $request->name,
            'collage_id' => $request->collage_id,
        ]);

        return redirect()->route('products.index');
    }

    // Show the form to edit an existing product
    public function edit(Product $product)
    {
        $collages = Collage::all(); // Fetch all collages to associate with the product
        return view('products.edit', compact('product', 'collages'));
    }

    // Update the existing product in the database
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'collage_id' => 'required|exists:collages,id', // Ensure the collage exists
        ]);

        $product->update([
            'name' => $request->name,
            'collage_id' => $request->collage_id,
        ]);

        return redirect()->route('products.index');
    }

    // Delete a product from the database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
