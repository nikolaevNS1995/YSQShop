<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderStoreRequest;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $orders = Order::with(['user', 'status', 'products'])->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $users = User::all();
        $statuses = Status::all();
        $products = Product::all();
        return view('admin.orders.create', compact('users', 'statuses', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $order = Order::create($request->validated());

        // Добавление товаров в заказ
        if ($request->has('products')) {
            foreach ($request->products as $product_id => $quantity) {
                if ($quantity > 0) {
                    $product = Product::find($product_id);
                    $order->products()->attach($product_id, [
                        'quantity' => $quantity,
                        'price' => $product->price
                    ]);
                }
            }
        }

        return redirect()->route('admin.orders.index')->with('success', 'Заказ успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $users = User::all();
        $statuses = Status::all();
        $products = Product::all();
        return view('admin.orders.edit', compact('order', 'users', 'statuses', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateRequest $request, Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->update($request->validated());

        // Обновление товаров в заказе
        $order->products()->detach();
        if ($request->has('products')) {
            foreach ($request->products as $product_id => $quantity) {
                if ($quantity > 0) {
                    $product = Product::find($product_id);
                    $order->products()->attach($product_id, [
                        'quantity' => $quantity,
                        'price' => $product->price
                    ]);
                }
            }
        }

        return redirect()->route('admin.orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->products()->detach();
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Заказ успешно удален.');
    }
}
