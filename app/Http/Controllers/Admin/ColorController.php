<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorStoreRequest;
use App\Http\Requests\Admin\ColorUpdateRequest;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $colors = Color::paginate(10);
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Color::create($request->validated());

        return redirect()->route('admin.colors.index')->with('success', 'Цвет успешно создан.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorUpdateRequest $request, Color $color): \Illuminate\Http\RedirectResponse
    {
        $color->update($request->validated());

        return redirect()->route('admin.colors.index')->with('success', 'Цвет успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color): \Illuminate\Http\RedirectResponse
    {
        if ($color->products()->count() > 0) {
            return back()->with('error', 'Нельзя удалить цвет, к которому привязаны товары.');
        }

        $color->delete();
        return redirect()->route('admin.colors.index')->with('success', 'Цвет успешно удален.');
    }
}
