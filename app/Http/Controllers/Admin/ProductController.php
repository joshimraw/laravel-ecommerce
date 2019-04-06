<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Image;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.product.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'title'             => 'required|unique:products,title',
            'price'             => 'required',
            'short_description' => 'required',
            'full_description'  => 'required',
            'brand'             => 'required',
            'stock'             => 'required',
            'image'             => 'sometimes|required'
        ));

        $slug = str_slug($request->title);

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $img_name = $slug.'.'.$image->getClientOriginalExtension();
            $location = public_path('frontend/product-images/'.$img_name);
            Image::make($image)->save($location);
        }else{
            $img_name = 'defautl.png';
        }

        $product = new Product;
        $product->title         = $request->title;
        $product->slug          = $slug;
        $product->image         = $img_name;
        $product->price         = $request->price;
        $product->brand         = $request->brand;
        $product->sku           = $request->sku;
        $product->is_stock      = $request->stock;
        $product->view_count    = '0';
        $product->short_description = $request->short_description;
        $product->full_description  = $request->full_description;
        $product->user_id           = Auth::user()->id;

        $product->save();

        Toastr::success('Product Added Successfully', 'Success');
        return redirect()->route('admin.product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.product.edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if($product->title == $request->title){

            $this->validate($request, array(
                'price'             => 'required',
                'short_description' => 'required',
                'full_description'  => 'required',
                'brand'             => 'required',
                'stock'             => 'required',
                'image'             => 'sometimes|required'
            ));
        }else{
            $this->validate($request, array(
                'title'             => 'required|unique:products,title|max:200',
                'price'             => 'required',
                'short_description' => 'required',
                'full_description'  => 'required',
                'brand'             => 'required',
                'stock'             => 'required',
                'image'             => 'sometimes|required'
            ));
        }
        $slug = str_slug($request->title);


        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $img_name = $slug.'.'.$image->getClientOriginalExtension();
            $location = public_path('frontend/product-images/'.$img_name);
            Image::make($image)->save($location);
        }else{
            $img_name = 'defautl.png';
        }

        $product = Product::find($id);
        $product->title         = $request->title;
        $product->slug          = $slug;
        $product->image         = $img_name;
        $product->price         = $request->price;
        $product->brand         = $request->brand;
        $product->sku           = $request->sku;
        $product->is_stock      = $request->stock;
        $product->view_count    = '0';
        $product->short_description = $request->short_description;
        $product->full_description  = $request->full_description;
        $product->user_id           = Auth::user()->id;

        $product->save();

        Toastr::success('Successfully Updated !', 'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        Storage::delete($product->image);

        Toastr::warning('Product has been removed!', 'Warning');
        return redirect()->route('admin.product.index');

    }
}
