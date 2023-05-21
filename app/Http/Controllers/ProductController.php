<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Product::class);

        $search = $request->get('search', '');

        $products = Product::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.products.index', compact('products', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Product::class);

        $categories = Category::pluck('name', 'id');
        $types = Product::getTypeMapping();

        return view('app.products.create', compact('categories', 'types'));
    }

    /**
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $this->authorize('create', Product::class);

        $validated = $request->validated();

        $validated['thumbnail'] = $request->file('thumbnail')->store('public/images');
        $validated['image'] = $request->file('image')->store('public/images');

        if ($request->hasFile('image_2')) {
            $validated['image_2'] = $request->file('image_2')->store('public/images');
        }

        if ($request->hasFile('download_link')) {
            $validated['download_link'] = $request->file('download_link')->store('public/images');
        }

        // generate slug
        $validated['slug'] = Str::slug($validated['name']). "_" . Str::random(5) ;
 
        // dd($validated);
        $product = Product::create($validated);

        return redirect()
            ->route('products.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        $this->authorize('view', $product);

        $categories = Category::pluck('name', 'id');
        $types = Product::getTypeMapping();

        return view('app.products.show', compact('product', 'types', 'categories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $categories = Category::pluck('name', 'id');
        $types = Product::getTypeMapping();

        return view('app.products.edit', compact('product', 'types', 'categories'));
    }

    /**
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('public/images');
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public/images');
        }

        if ($request->hasFile('image_2')) {
            $validated['image_2'] = $request->file('image_2')->store('public/images');
        }

        if ($request->hasFile('download_link')) {
            $validated['download_link'] = $request->file('download_link')->store('public/images');
        }


        $product->update($validated);

        return redirect()
            ->route('products.edit', $product)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
