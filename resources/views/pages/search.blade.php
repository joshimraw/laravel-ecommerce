@extends('frontend.layout')

@section('title', ' | Search ')

@push('styles')
	<link rel="stylesheet" href="{{asset('frontend/css/product_styles.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/product_responsive.css')}}">
@endpush

@section('content')
@include('frontend.partials.nav')

<div class="single_product">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-9">

				@if($products->count() > 0)

					<h4>{{ $products->count() }} Product(s) Found!</h4>
					<hr>
				<div class="row">

 					@foreach($products as $product)

						<div class="col-md-4">
		                  <div class="trends_item is_new">
		                     <a href="{{route('product.detail', $product->slug)}}">
		                     <div class="trends_image d-flex flex-column align-items-center justify-content-center">
		                        <img src="{{asset('storage/products/'. $product->image)}}" alt="">
		                     </div>
		                     <div class="trends_content">
		                        <div class="trends_category">
		                           <a href="JavaScript:void(0)">{{ $product->category->name }}</a>
		                        </div>
		                        <div class="trends_info clearfix">
		                           <div class="trends_name">
		                            <a href="{{route('product.detail', $product->slug)}}">{{ $product->title }}</a>
		                           </div>
		                           <hr>
		                           <div class="trends_price">Tk {{ $product->price }}</div>
		                           <div class="trends_view">
		                               <a class="btn btn-sm btn-danger" href="{{route('product.detail', $product->slug)}}">Quick View</a>
		                           </div>
		                        </div>
		                     </div>
		                     <ul class="trends_marks">
		                        <li class="trends_mark trends_discount">-25%</li>
		                        <li class="trends_mark trends_new">new</li>
		                     </ul>
		                     <div class="trends_fav"><i class="fas fa-heart"></i>
		                     </div>
		                  </a>
		                  </div>
		               </div>
					@endforeach 
				</div>
				@else

				<h4 class="pt-5 pb-5">No Product is Found by "{{ $query }}"</h4>

				@endif
			</div>
		</div>
	</div>
</div>
	
</section>

@endsection
