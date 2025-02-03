<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::whereNull('parent_id')->with('children')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Категория создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Категория обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        if ($category->productCards()->exists()) {
            return back()->with('error', 'Нельзя удалить категорию, в которой есть товары.');
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена.');
    }
}
