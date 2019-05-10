
@extends('backend.layout')

@section('title', ' | Single Products')

@section('content')

 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-shopping-bag"></i> {{ $product->title }}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="tile">
        <a class="btn btn-primary" href="{{route('admin.product.index')}}" ><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Back </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="tile">
        <a class="btn btn-success" href="{{route('admin.product.edit', $product->id)}}" ><i class="fa fa-fw fa-lg fa-pencil-square-o"></i>Edit </a>

        <a class="btn btn-danger pull-right" href="{{route('admin.product.destroy', $product->id)}}" ><i class="fa fa-fw fa-lg fa-trash"></i>Delete </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="tile">
        <div class="tile-body">
          <h2>{{ $product->title }}</h2>
          <p>
            <small>{{ 'Created By'. $product->user->name. ' at '. date('M j, Y', time($product->created_at)). ' in '.$product->category->name }}</small>
          </p>
          <p>{!! $product->short_description !!}</p>
          <hr>

          <img class="img-fluid" src="{{asset('storage/products/'. $product->image)}}" alt="">


        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
         <h4>Category: {{$product->category->name}}</h4>
         <h4>Brand: {{ $product->brand }}</h4>
         <h4>SKU: {{ $product->sku }}</h4>
         <h4>Price: {{ $product->price. ' Tk' }}</h4>
         <h4>Available Stock: {{ $product->is_stock}}</h4>
         <h4>update Date: {{ date('M j, Y', time($product->updated_at)) }}</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <p>{!! $product->full_description !!}</p>

          @foreach($product->pimages as $p)
            <ul>
              <li>{{$p->name}}</li>
            </ul>
          @endforeach

          @foreach($product->tags as $tag)

          <span class="badge badge-secondary">{{ $tag->name }}</span>

          @endforeach


          


        </div>
      </div>
    </div>
  </div>
</main>


@endsection
