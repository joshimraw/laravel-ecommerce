<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Category;

class CategoryController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth', 'admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
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
            'name'      => 'required|unique:categories,name',
            'image'     => 'sometimes|required',
        ));

        $slug = str_slug($request->name);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $slug. '.' .$image->getClientOriginalExtension();
            $category_img = Image::make($image)->save();

            Storage::disk('public')->put('categories/'.$image_name, $category_img);
        }

        $cat = new Category;
        $cat->name  = $request->name;
        $cat->slug  = str_slug($cat->name);
        $cat->image = $image_name;

        $cat->save();

        Toastr::success('Category Added Successfully', 'Success');
        return redirect()->route('admin.category.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
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
        $category = Category::find($id);
        if($request->input('name') == $category->name){

            $this->validate($request, array(

                'image' => 'sometimes|required',
        ));

        }else{
            $this->validate($request, array(
                'name'  => 'required|unique:categories,name',
                'image' => 'sometimes|required',
        ));
        }
  

        $slug = str_slug($request->input('name'));
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $slug. '.' .$image->getClientOriginalExtension();
            $location = public_path('frontend/category-images/'.$image_name);
            Image::make($image)->save($location);
        }

        $old_image = $category->image;
        Storage::delete($old_image);

        $category = Category::find($id);
        $category->name  = $request->input('name');
        $category->image = $image_name;

        $category->save();
        Toastr::success('Update Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $image = $category->image;
        $old_image = public_path('frontend/category-images/'. $image);


        if (file_exists($old_image)) {

               @unlink($old_image);

           }

        $category->delete();

        Toastr::warning('Category has Deleted', 'Warning');
        return redirect()->route('admin.category.index');
    }
}
