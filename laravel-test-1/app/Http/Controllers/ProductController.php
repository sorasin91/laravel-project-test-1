<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{   // Product listing displays
    public function index()
    {
        if (request()->ajax()) {
            // Fetch products data 
            return datatables()->of(Product::query())
                ->addColumn('publish', function($row){
                    return $row->publish ? 'Yes' : 'No';
                })
                ->addColumn('action', function($row){
                    $showUrl = route('products.show', $row->id);
                    $editUrl = route('products.edit', $row->id);
                    $deleteUrl = route('products.destroy', $row->id);
                    $csrfField = csrf_field();
                    $methodField = method_field('DELETE');
                    // Action buttons for each product
                    return '<a href="'.$showUrl.'" class="btn btn-primary">Show</a>
                            <a href="'.$editUrl.'" class="btn btn-info">Edit</a>
                            <form action="'.$deleteUrl.'" method="POST" style="display:inline;">
                                '.$csrfField.'
                                '.$methodField.'
                                <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                            </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.index');
    }

    
    // Creating a new product
    
    public function create()
    {
        return view('products.create');
    }

    // Store a new product in storage.
    public function store(Request $request)
    {   // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'publish' => 'required|boolean',
        ]);
        // Create a new product
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Display the specific product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Edit a specific product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update the specific product in database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'publish' => 'required|boolean',
        ]);
        // Find the product and update details
        $product = Product::findOrFail($id);
        $product->update($request->all());
    }

    // Delete the specific product from database
    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}