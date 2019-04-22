@extends('frontend.layout')

@section('title', ' | Welcome')

@push('styles')
	<link rel="stylesheet" href="{{asset('frontend/css/product_styles.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/product_responsive.css')}}">
@endpush

@section('content')


  <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li><img src="{{asset('frontend/product-images/placeholder.png')}}" alt=""></li>
						<li><img src="{{asset('frontend/product-images/placeholder.png')}}" alt=""></li>
						<li><img src="{{asset('frontend/product-images/placeholder.png')}}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{asset('frontend/product-images/'.$product->image)}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">Category / item</div>
						<div class="product_name">{{$product->title}}</div>
						<div >Rating 5</div>
						<div class="product_text">
							<ul>
								<li>Product Code: {{$product->sku}}</li>
								<li>Product Size</li>
								<li>Product Brand: {{$product->brand}}</li>
							</ul>
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
									<select class="form-control" name="colors" style="height: 44px;">
										<option value="Red">Red</option>
										<option value="Blue">Blue</option>
										<option value="White">White</option>
									</select>
								</div>
								</div>

								<div class="row">
									<div class="col-md-3 pt-3">
										<input type="submit" value="Add to Cart" class="btn btn-primary" style="height: 44px;">
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
						<h3 class="viewed_title">Related Produt</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						

					</div>
				</div>
			</div>
		</div>
	</div>
   
</section>

@endsection
