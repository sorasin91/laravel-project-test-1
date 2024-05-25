@extends('pages.layouts.app')

@section('title', 'Product List')

@section('content')

    <div class="container">
        <h2>Laravel Datatables</h2>
        {{-- Link to create a new product --}}
        <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        {{-- Products table --}}
        <table class="table table-bordered" id="products-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price (RM)</th>
                    <th>Details</th>
                    <th>Publish</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    {{-- jQuery and DataTables scripts --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('products.index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'details', name: 'details' },
                { data: 'publish', name: 'publish' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
    </script>
@endsection