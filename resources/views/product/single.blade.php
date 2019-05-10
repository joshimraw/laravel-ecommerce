@extends('frontend.layout')

@section('title', ' | '.$product->title)

@push('styles')
	<link rel="stylesheet" href="{{asset('frontend/css/product_styles.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/product_responsive.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/lightbox.css')}}">
	<style>
	.product-list {
    font-family: 'Rubik', sans-serif;
    font-size: 14px;
    line-height: 1.7;
    font-weight: 400;
    color: #828282;
    -webkit-font-smoothing: antialiased;
    -webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
    text-shadow: rgba(0,0,0,.01) 0 0 1px;
}
	</style>
@endpush

@section('content')
@include('frontend.partials.nav')

  <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					@foreach($product->pimages as $p)
			            <ul class="image_list">
							<li>
								<a href="{{asset('storage/products/'.$p->name)}}" data-lightbox="products">
									<img src="{{asset('storage/products/'.$p->name)}}" alt=""></a>
							</li>
						</ul>
		           
		          @endforeach
					
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{asset('storage/products/'.$product->image)}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">Home / {{ $product->category->name }} / {{ $product->title }}</div>
						<div class="product_name">{{$product->title}}</div>
						<div class="product_text">
						<ul class="product-list">
							<li>Product Code: {{ $product->sku }}</li>
							<li>Product Code: {{ $product->sku }}</li>
						</ul>
						{!! $product->short_description !!}
						</div>
						<div class="product_price">Tk {{$product->price}}</div>
						<div class="order_info d-flex flex-row">
							<form action="{{route('carts.store', $product->id)}}" method="post">
							@csrf

								<div class="row">
									<div class="col-md-6">
									<input class="form-control" type="number" value="1" name="product_quantity">
									</div>
								<div class="col-md-6">
									<input type="submit" value="Add to Cart" class="btn btn-primary">
								</div>
								</div>

													
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Product Description</h3>
						
						<div class="product-description">
							{!! $product->full_description !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   
</section>

@endsection

@push('scripts')
	<script src="{{asset('frontend/js/lightbox.js')}}"></script>
@endpush
