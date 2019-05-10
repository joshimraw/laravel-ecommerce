@extends('frontend.layout')

@section('title', ' | Show Category')


@section('content')
@include('frontend.partials.nav')

<div class="single_product">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-9">
				<div class="row">
					@foreach($category->products as $product)

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
			</div>
		</div>
	</div>
</div>
	
</section>

@endsection
