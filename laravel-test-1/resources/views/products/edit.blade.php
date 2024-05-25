@extends('pages.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">    
            <label for="details">Details:</label>
            <textarea id="details" name="details">{{ $product->details }}</textarea>
        </div>
        <div class="form-group">    
            <label for="price">Price</label>
            <textarea id="price" name="price">{{ $product->price }}</textarea>
        </div>   
        <div class="form-group">    
            <label for="publish">Publish</label><br>
            <input type="radio" id="publish" name="publish" value="Yes">
            <label for="publish">Yes</label><br>
            <input type="radio" id="unpublish" name="publish" value="No">
            <label for="publish">No</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>  
@endsection
