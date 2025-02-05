<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::with('product')->paginate(10);
        return view('admin.product_photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.product_photos.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_main' => 'boolean',
        ]);

        $path = $request->file('image')->store('product_photos', 'public');

        Photo::create([
            'product_id' => $request->product_id,
            'image_path' => $path,
            'is_main' => $request->is_main ?? false,
        ]);

        return redirect()->route('admin.product-photos.index')->with('success', 'Фотография загружена.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();
        return redirect()->route('admin.product-photos.index')->with('success', 'Фотография удалена.');
    }
}
