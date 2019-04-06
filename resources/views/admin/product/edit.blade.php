
@extends('backend.layout')

@section('title', ' | Edit Product')

@push('styles')
  <link href="{{asset('backend/css/select2.min.css')}}" rel="stylesheet" />
  <style>
    label{
      font-weight: bold;
      font-size: 17px;
    }
  </style>
@endpush

@section('content')

<form action="{{route('admin.product.update', $product->id)}}" method="POST" enctype="multipart/form-data">

   @csrf
   @method('PUT')

   <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-pencil"></i> Edit The product</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
          <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
        </ul>
      </div>
      <div class="row">
          <div class="col-md-8">
              <div class="tile">
                  <h3 class="tile-title">{{ $product->title }}</h3>
                <div class="tile-body">
                  <div class="form-group">
                    <label class="control-label">Product Name</label>
                    <input type="text" name="title" value="{{$product->title}}" 
                    class="form-control" placeholder="Product Name">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label">Price</label>
                      <div class="form-group">
                        <label class="sr-only" for="price">Amount (in dollars)</label>
                        <div class="input-group">
                          <div class="input-group-prepend"><span class="input-group-text">Tk</span></div>
                          <input type="number" name="price" value="{{$product->price}}"
                          class="form-control" id="price" placeholder="Amount">
                          <div class="input-group-append"><span class="input-group-text">.00</span></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">SKU</label>
                      <input type="text" name="sku" value="{{$product->sku}}"
                      class="form-control"  placeholder="SKU">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="8">
                      {{$product->short_description}}
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Tags </label>
                    <select name="tags[]" id="" class="form-control select-tags" multiple="multiple">
                      @foreach($tags as $tag)

                        <option value="{{$tag->id}}">{{ $tag->name }}</option>

                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
          </div> {{-- end column 8 --}}

          <div class="col-md-4">
              <div class="tile">

                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-danger" href="{{route('admin.product.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  
                  <hr>
                  <br>

                <div class="tile-body">
                    <div class="form-group">
                      <label for="select-cat">Select Category</label>
                      <select name="category" class="form-control">
                        @foreach($categories as $category)

                          <option value="{{$category->id}}" {{ $product->category->id == $category->id ? 'selected' : '' }}>
                            {{$category->name}}
                          </option>

                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label  class="control-label">Brand</label>
                      <input type="text" name="brand" value="{{$product->brand}}" 
                      class="form-control" placeholder="Brand Name">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Stock</label>
                      <input type="number" name="stock" value="{{$product->is_stock}}" 
                      class="form-control" placeholder="Stock">
                    </div>

                    <div class="form-group">
                      <label class="control-label">Image</label>
                      <input type="file" name="photo" class="form-control">
                    </div>
                </div>
            </div>
          </div> {{-- end column 4 --}}
      </div> {{-- end row --}}
      <div class="row">
        <div class="col-md-12">
          <div class="title">
            <div class="form-group">
              <label class="control-label">Full Description</label>
              <textarea name="full_description" class="form-control" rows="14">
                {{$product->full_description}}
              </textarea>
            </div>
          </div>  
        </div>
      </div>
    </main>
</form>


@endsection

@push('scripts')

<script src="{{asset('backend/js/select2.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/tinymce.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/jquery.tinymce.min.js')}}"></script>
<script>
$(document).ready(function() {
  // SELECT 2
    $('.select-tags').select2();

  // TINYMCE 
    tinymce.init({
      selector: 'textarea',
      plugins : 'link lists',
      menubar: false,
      toolbar: 'undo redo | fontsizeselect | bold italic | bullist numlist | link | alignleft aligncenter alignright'
    });

});
</script>
@endpush
