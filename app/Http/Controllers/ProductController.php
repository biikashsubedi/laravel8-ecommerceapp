<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productValidate($request);

        $image = $request->file('image')->store('public/uploads');
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $image,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'description' => $request->description,
            'additional_info' => $request->additional_info
        ]);
        notify()->success('Sucessfully Created');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $this->productValidate($request);
        $product = Product::find($id);
        $image = $product->image;
        if ($request->file('image')) {
            $image->$request->file('image')->store('public/uploads');
            \Storage::delete($product->image);
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $image;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->additional_info = $request->additional_info;
        $product->save();
        notify()->success('Sucessfully Updated');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = $product->image;
        $product->delete();
        \Storage::delete($image);
        notify()->success('Sucessfully Deleted');
        return redirect()->route('product.index');
    }

    public function productValidate($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'image' => 'required|mimes:png,jpeg,jpg',
            'category' => 'required',
            'description' => 'required'
        ]);
    }

    public function loadsubcontroller(Request $request, $id)
    {
        $subcategory = SubCategory::where('category_id', $id)->pluck('name', 'id');
        return response()->json($subcategory);
    }
}
