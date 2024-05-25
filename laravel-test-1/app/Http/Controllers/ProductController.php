<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
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

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'publish' => 'required|boolean',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}