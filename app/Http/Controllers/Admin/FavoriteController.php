<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FavoriteStoreRequest;
use App\Http\Requests\Admin\FavoriteUpdateRequest;
use App\Models\Favorite;
use App\Models\FavoriteProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $favorites = Favorite::with('user')->paginate(10);
        return view('admin.favorites.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $users = User::all();
        return view('admin.favorites.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FavoriteStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Favorite::create($request->validated()->only('user_id'));

        return redirect()->route('admin.favorites.index')->with('success', 'Избранное успешно создано.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $products = Product::all();
        $favorite->load('products');
        return view('admin.favorites.show', compact('favorite', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FavoriteUpdateRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite): \Illuminate\Http\RedirectResponse
    {
        $favorite->delete();
        return redirect()->route('admin.favorites.index')->with('success', 'Избранное удалено.');
    }

    // Добавление товара в избранное
    public function addProduct(Request $request, Favorite $favorite): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $favorite->products()->attach($request->product_id, ['quantity' => $request->quantity]);

        return redirect()->route('admin.favorites.show', $favorite)->with('success', 'Товар добавлен в избранное.');
    }

    // Удаление товара из избранного
    public function removeProduct(Favorite $favorite, Product $product): \Illuminate\Http\RedirectResponse
    {
        $favorite->products()->detach($product->id);
        return redirect()->route('admin.favorites.show', $favorite)->with('success', 'Товар удален из избранного.');
    }
}
