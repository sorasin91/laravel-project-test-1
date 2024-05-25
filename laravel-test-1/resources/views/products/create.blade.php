@extends('pages.layouts.app')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price (RM):</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="details">Detail:</label>
            <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Publish:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="publish_yes" name="publish" value="1" checked>
                <label class="form-check-label" for="publish_yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="publish_no" name="publish" value="0">
                <label class="form-check-label" for="publish_no">No</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection


