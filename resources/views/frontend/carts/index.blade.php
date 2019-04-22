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
			
			<div class="col-md-9">
				<h4>There is {{ $carts->count() }} Cart </h4>
				@if($carts->count() > 0)
				<table class="table">
					<thead>
						<tr>
							<th>SL</th>
							<th>Product Name</th>
							<th>Image</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@php 
							$total_price = 0;
						@endphp
						@foreach($carts as $cart)
						<tr>
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ $cart->product->title }}</td>
							<td>
								<img src="{{ asset('frontend/product-images/'.$cart->product->image) }}" width="100">
							</td>
							<td>{{ 'TK '.$cart->product->price }}</td>
							<td>
								<input type="number" value="{{ $cart->product_quantity }}" class="form-control" style="width: 70px;">
							</td>
							<td>
								@php 
									$total_price += $cart->product_quantity * $cart->product->price;
								@endphp
								{{ $cart->product_quantity * $cart->product->price }}
							</td>
							<td>
								<a class="btn btn-sm btn-danger"
				                  onclick="event.preventDefault();
				                  document.getElementById('delete-form.{{$cart->id}}').submit();" 
				                   href="{{ route('carts.index') }}"> 
				                   <i class="fa fa-trash"></i>
				                 </a>

	                   <form id="delete-form.{{$cart->id}}" action="{{ route('carts.delete',$cart->id) }}" method="post" style="display: none;">
	                     @csrf
	                     @method('DELETE')
	                   </form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
			<div class="col-md-3">
				<div class="card p-5">
					<div class="row">
						<label class="col-md-8"><strong>Subtotal</strong></label>
						<label class="col-md-4">22</label>
					</div>
					<div class="row">
						<label class="col-md-8"><strong>Shipping Cost</strong></label>
						<label class="col-md-4">50</label>
					</div>
					<hr>
					<div class="row">
						<label class="col-md-8"><strong>Grand Total</strong></label>
						<label class="col-md-4">{{ $carts->count() > 0 ? $total_price +  50 : ''}}</label>
					</div>
					<div class="form-group pt-3">
						<a class="btn btn-primary" href="{{route('checkout')}}">Proceed to chekck</a>
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
   
   @else
				
	<h2 class="pt-5 pb-5">There is no cart to show</h2>
	@endif
</section>

@endsection
