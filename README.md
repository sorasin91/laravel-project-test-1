## Description
Laravel application that manages products using Yajra DataTables.<br>
The application includes functionalities for listing, searching, creating, showing, editing, and deleting products.

## Installation
**1. Install Laravel:**
```
composer create-project --prefer-dist laravel/laravel laravel-test-1
cd laravel-test-1
```

**2. Install Yajra DataTables:**
```
composer require yajra/laravel-datatables-oracle
```

**3. Publish DataTables Configuration:**
```
php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
```

**4. Database Setup:**<br>
4.1. Create a migration for the products table:
```
php artisan make:migration create_products_table
```
4.2. Define the table structure in the migration file:
```
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->decimal('price', 8, 2);
    $table->text('details');
    $table->boolean('publish');
    $table->timestamps();
});

```
4.3. Run the migration:
```
php artisan migrate
```

## Routes
1. Define routes in `routes/web.php`:
```
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
```

## Controller
1. Create a controller for managing products:
```
php artisan make:controller ProductController --resource
```
2. Define methods in `app/Http/Controllers/ProductController.php`.

## Blade Templates
1. Layout - `resources/views/pages/layouts/app.blade.php`
2. Index - `resources/views/products/index.blade.php`
3. Create - `resources/views/products/create.blade.php`
4. Show - `resources/views/products/show.blade.php`
5. Edit - `resources/views/products/edit.blade.php`







