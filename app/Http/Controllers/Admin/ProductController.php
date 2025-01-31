<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCard;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $productCards = ProductCard::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.create', compact('productCards', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('admin.products.index')->with('success', 'Товар добавлен.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $product->load(['productCard.category', 'size', 'color', 'photos']);

        // Получаем все товары с такой же карточкой (другие вариации)
        $similarProducts = Product::where('product_card_id', $product->product_card_id)
            ->where('id', '!=', $product->id)
            ->get();

        return view('admin.products.show', compact('product', 'similarProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $product->load(['productCard.category', 'size', 'color', 'photos']);
        $productCards = ProductCard::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.products.edit', compact('product', 'productCards', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->update($request->validated());
        return redirect()->route('admin.products.index')->with('success', 'Товар обновлён.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Товар удалён.');
    }
}
