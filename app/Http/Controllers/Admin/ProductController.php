<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCard;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

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
        $tags = Tag::all();
        return view('admin.products.create', compact('productCards', 'sizes', 'colors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::create($request->validated());

        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('product_photos', 'public');
                $product->photos()->create(['image_path' => $path]);
            }
        }

        if ($request->main_photo) {
            Photo::where('product_id', $product->id)->update(['is_main' => false]);
            Photo::where('id', $request->main_photo)->update(['is_main' => true]);
        }

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
        $tags = Tag::all();
        return view('admin.products.edit', compact('product', 'productCards', 'sizes', 'colors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->update($request->validated());

        if ($request->has('tags')) {
            $product->tags()->sync($request->tags ?? []);
        }

        // Удаление фото, если отмечено
        if ($request->has('delete_photos')) {
            foreach ($request->delete_photos as $photo_id) {
                $photo = Photo::find($photo_id);
                Storage::disk('public')->delete($photo->image_path);
                $photo->delete();
            }
        }

        // Загрузка новых фото
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('product_photos', 'public');
                Photo::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        if ($request->main_photo) {
            Photo::where('product_id', $product->id)->update(['is_main' => false]);
            Photo::where('id', $request->main_photo)->update(['is_main' => true]);
        }

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
