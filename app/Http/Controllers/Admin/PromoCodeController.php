<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\PromoCodeStoreRequest;
use App\Http\Requests\Admin\PromoCodeUpdateRequest;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $promoCodes = PromoCode::paginate(10);
        return view('admin.promocodes.index', compact('promoCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.promocodes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromoCodeStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        PromoCode::create($request->validated());

        return redirect()->route('admin.promocodes.index')->with('success', 'Промокод успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoCode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromoCode $promocode): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.promocodes.edit', compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromoCodeUpdateRequest $request, PromoCode $promocode): \Illuminate\Http\RedirectResponse
    {
        $promocode->update($request->validated());

        return redirect()->route('admin.promocodes.index')->with('success', 'Промокод успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoCode $promocode): \Illuminate\Http\RedirectResponse
    {
        $promocode->delete();
        return redirect()->route('admin.promocodes.index')->with('success', 'Промокод успешно удален.');
    }
}
