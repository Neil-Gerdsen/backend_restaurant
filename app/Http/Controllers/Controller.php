<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
 
class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->search, fn($q, $search) => $q->where('name', 'like', "%{$search}%"))
            ->when($request->boolean('active_only'), fn($q) => $q->active())
            ->latest()
            ->paginate($request->input('per_page', 15));
 
        if ($request->wantsJson()) {
            return ProductResource::collection($products);
        }
 
        return view('products.index', compact('products'));
    }
 
    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('products.create');
    }
 
    /**
     * Store a newly created product.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
 
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
 
        $product = Product::create($data);
 
        if ($request->wantsJson()) {
            return new ProductResource($product);
        }
 
        return redirect()->route('products.show', $product)
            ->with('success', 'Product created successfully.');
    }
 
    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        if (request()->wantsJson()) {
            return new ProductResource($product);
        }
 
        return view('products.show', compact('product'));
    }
 
    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
 
    /**
     * Update the specified product.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
 
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
 
        $product->update($data);
 
        if ($request->wantsJson()) {
            return new ProductResource($product);
        }
 
        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully.');
    }
 
    /**
     * Remove the specified product.
     */
    public function destroy(Product $product)
    {
        $product->delete();
 
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Product deleted successfully.']);
        }
 
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
// PHP;
 
    //     File::ensureDirectoryExists(dirname($path));
    //     File::put($path, $stub);
    //     $this->info('✔ Controller created.');
    // }
 
    // protected function createResource()
    // {
    //     $path = app_path('Http/Resources/ProductResource.php');
 
    //     $stub = <<<'PHP'