@extends('pages.layouts.app')

@section('title', 'Show Product')

@section('content')
<h2 class="text-center my-4">View</h2>
    <div class="card mx-auto" style="width: 50%;">
        <div class="card-header">
            <h5>Show product</h5>
        </div>
        <div class="card-body">
            <p class="card-title">Name: {{ $product->name }}</p>
            <p class="card-title">Price: RM {{ number_format($product->price, 2) }}</p>
            <p class="card-text">Details: {{ $product->details }}</p>
            <p class="card-text">Publish: {{ $product->publish ? 'Yes' : 'No' }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection