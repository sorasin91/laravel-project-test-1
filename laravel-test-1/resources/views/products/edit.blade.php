@extends('pages.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">    
            <label for="price">Price (RM):</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">    
            <label for="details">Details:</label>
            <textarea class="form-control" id="details" name="details" rows="3" required>{{ $product->details }}</textarea>
        </div>
        <div class="form-group">    
            <label>Publish:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="publish_yes" name="publish" value="1" {{ $product->publish ? 'checked' : '' }}>
                <label class="form-check-label" for="publish_yes">Yes</label>
            </div> 
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="publish_no" name="publish" value="0" {{ !$product->publish ? 'checked' : '' }}>
                <label class="form-check-label" for="publish_no">No</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>  
@endsection
