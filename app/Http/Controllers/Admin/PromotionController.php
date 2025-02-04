<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromotionStoreRequest;
use App\Http\Requests\Admin\PromotionUpdateRequest;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $promotions = Promotion::paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Promotion::create($request-validated());

        return redirect()->route('admin.promotions.index')->with('success', 'Акция успешно создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $promotion->load('products');
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionUpdateRequest $request, Promotion $promotion): \Illuminate\Http\RedirectResponse
    {
        $promotion->update($request->validated());

        return redirect()->route('admin.promotions.index')->with('success', 'Акция успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion): \Illuminate\Http\RedirectResponse
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('success', 'Акция удалена.');
    }

    // Добавление товара в акцию
    public function addProduct(Request $request, Promotion $promotion): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $promotion->products()->attach($request->product_id);

        return redirect()->route('admin.promotions.show', $promotion)->with('success', 'Товар добавлен в акцию.');
    }

    // Удаление товара из акции
    public function removeProduct(Promotion $promotion, Product $product): \Illuminate\Http\RedirectResponse
    {
        $promotion->products()->detach($product->id);
        return redirect()->route('admin.promotions.show', $promotion)->with('success', 'Товар удален из акции.');
    }
}
