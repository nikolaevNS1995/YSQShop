<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $carts = Cart::with('user')->paginate(10);
        return view('admin.carts.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $users = User::all();
        return view('admin.carts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:carts,user_id',
        ]);

        Cart::create($request->only('user_id'));

        return redirect()->route('admin.carts.index')->with('success', 'Корзина успешно создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $cart->load('products');
        return view('admin.carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart): \Illuminate\Http\RedirectResponse
    {
        $cart->delete();
        return redirect()->route('admin.carts.index')->with('success', 'Корзина удалена.');
    }

    // Добавление товара в корзину
    public function addProduct(Request $request, Cart $cart): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);

        return redirect()->route('admin.carts.show', $cart)->with('success', 'Товар добавлен в корзину.');
    }

    // Изменение количества товара в корзине
    public function updateProduct(Request $request, Cart $cart, Product $product): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->products()->updateExistingPivot($product->id, ['quantity' => $request->quantity]);

        return redirect()->route('admin.carts.show', $cart)->with('success', 'Количество товара обновлено.');
    }

    // Удаление товара из корзины
    public function removeProduct(Cart $cart, Product $product): \Illuminate\Http\RedirectResponse
    {
        $cart->products()->detach($product->id);
        return redirect()->route('admin.carts.show', $cart)->with('success', 'Товар удален из корзины.');
    }
}
