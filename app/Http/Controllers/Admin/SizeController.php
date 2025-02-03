<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SizeStoreRequest;
use App\Http\Requests\Admin\SizeUpdateRequest;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $sizes = Size::paginate(10);
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizeStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Size::create($request->validated());

        return redirect()->route('admin.sizes.index')->with('success', 'Размер успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SizeUpdateRequest $request, Size $size): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        if (!isset($data->bust_circumference)) {
            $data['bust_circumference'] = null;
        }

        if (!isset($data->waist_circumference)) {
            $data['waist_circumference'] = null;
        }

        if (!isset($data->hip_circumference)) {
            $data['hip_circumference'] = null;
        }

        $size->update($data);

        return redirect()->route('admin.sizes.index')->with('success', 'Размер успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size): \Illuminate\Http\RedirectResponse
    {
        if ($size->products()->count() > 0) {
            return back()->with('error', 'Нельзя удалить размер, к которому привязаны товары.');
        }

        $size->delete();
        return redirect()->route('admin.sizes.index')->with('success', 'Размер успешно удален.');
    }
}
