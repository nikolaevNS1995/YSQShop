<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCardStoreRequest;
use App\Http\Requests\Admin\ProductCardUpdateRequest;
use App\Models\Category;
use App\Models\ProductCard;
use Illuminate\Http\Request;

class ProductCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $productCards = ProductCard::with('category')->paginate(10);
        return view('admin.product_cards.index', compact('productCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('admin.product_cards.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCardStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        ProductCard::create($request->validated());

        return redirect()->route('admin.product-cards.index')->with('success', 'Карточка товара создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCard $productCard): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $productCard->load(['products']);
        return view('admin.product_cards.show', compact('productCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCard $productCard): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('admin.product_cards.edit', compact('productCard', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCardUpdateRequest $request, ProductCard $productCard): \Illuminate\Http\RedirectResponse
    {
        $productCard->update($request->validated());

        return redirect()->route('admin.product-cards.index')->with('success', 'Карточка товара обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCard $productCard): \Illuminate\Http\RedirectResponse
    {
        $productCard->delete();
        return redirect()->route('admin.product-cards.index')->with('success', 'Карточка товара удалена.');
    }
}
