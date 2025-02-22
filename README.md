# Laravel Practice Guide

## Introduction
Hi, I'm **Arif**, and I am practicing Laravel step by step to improve my skills. This guide documents my learning process, covering migrations, models, controllers, seeders, factories, and Faker.

## Table of Contents
- [Migration](#migration)
- [Model](#model)
- [Controller](#controller)
- [View](#view)
- [API Routes](#api-routes)
- [Seeder](#seeder)
- [Factory & Faker](#factory--faker)
- [Commands](#commands)
- [Running the Project](#running-the-project)

---

## Migration
A migration is used to create database tables. Run the following command to create a migration:
```bash
php artisan make:migration create_products_table
```
Then, define the table structure inside the generated migration file in `database/migrations/`.

Example:
```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
```
Run the migration:
```bash
php artisan migrate
```

---

## Model
Models interact with the database. Create a model with:
```bash
php artisan make:model Product
```
Modify the model (`app/Models/Product.php`):
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock'];
}
```

---

## Controller
Controllers handle business logic. Create one using:
```bash
php artisan make:controller ProductController --resource
```
Modify the controller (`app/Http/Controllers/ProductController.php`):
```php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
```

---

## View
Create views for **create** and **edit** inside `resources/views/products/`.

### `create.blade.php`
```html
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Product Name">
    <input type="text" name="description" placeholder="Description">
    <input type="number" name="price" placeholder="Price">
    <input type="number" name="stock" placeholder="Stock">
    <button type="submit">Create</button>
</form>
```

### `edit.blade.php`
```html
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $product->name }}">
    <input type="text" name="description" value="{{ $product->description }}">
    <input type="number" name="price" value="{{ $product->price }}">
    <input type="number" name="stock" value="{{ $product->stock }}">
    <button type="submit">Update</button>
</form>
```

---

## API Routes
Define API routes in `routes/api.php`:
```php
use App\Http\Controllers\ProductController;
Route::resource('products', ProductController::class);
```

---

## Seeder
Seeders populate the database with test data.
```bash
php artisan make:seeder ProductSeeder
```
Modify `database/seeders/ProductSeeder.php`:
```php
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(20)->create();
    }
}
```
Run the seeder:
```bash
php artisan db:seed --class=ProductSeeder
```

---

## Factory & Faker
Factories help generate fake data.
```bash
php artisan make:factory ProductFactory --model=Product
```
Modify `database/factories/ProductFactory.php`:
```php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 50, 2000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
```
Generate fake data:
```bash
php artisan tinker
>>> \App\Models\Product::factory()->count(10)->create();
```

---

## Commands
| Command | Description |
|---------|-------------|
| `php artisan make:migration create_products_table` | Create migration |
| `php artisan make:controller ProductController` | Create controller |
| `php artisan make:model Product` | Create model |
| `php artisan make:model Product -mcr` | Create model with migration, controller, and resource methods |
| `php artisan make:seeder ProductSeeder` | Create seeder |
| `php artisan migrate:fresh --seed` | Reset database and seed |
| `php artisan make:factory ProductFactory --model=Product` | Create factory |

---

## Running the Project
1. **Install dependencies:**
   ```bash
   composer install
   ```
2. **Run migrations and seed data:**
   ```bash
   php artisan migrate:fresh --seed
   ```
3. **Start Laravel server:**
   ```bash
   php artisan serve
   ```

Now, visit `http://127.0.0.1:8000/` and explore your Laravel project! 🚀

