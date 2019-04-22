@extends('frontend.layout')

@section('title', ' | Welcome')


@section('content')


<div class="single_product">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_form_container">
				<div class="contact_form_title">
					<h2>Shipping Address</h2>
				</div>
					<form action="{{route('order.store')}}" method="post">
						@csrf

					<div class="form-row">
						<div class="form-group col-md-6">
							<label>First Name</label>
							<input type="text" class="form-control" name="firstname" placeholder="First Name">
						</div>
						<div class="form-group col-md-6">
							<label>Last Name</label>
							<input type="text" class="form-control" name="lastname" placeholder="Last Name">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Phone No</label>
							<input type="text" class="form-control" name="phone" placeholder="Phone No">
						</div>
						<div class="form-group col-md-6">
							<label>Email Address</label>
							<input type="email" class="form-control" name="email" placeholder="Email Address">
						</div>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" placeholder="Full Address">
					</div>
					<div class="form-group">
						<label>Message</label>
						<textarea name="" class="form-control" style="height: 145px;" rows="10"></textarea>
					</div>
					<div class="form-group">
						<div class="form-check">
						<label class="form-check-label" >
						<input class="form-check-input" type="radio" name="payment_type" value="cash_on" >
						Cash On 
						</label>
					</div>
					{{-- <div class="form-check">
						<label class="form-check-label" >
						<input class="form-check-input" type="radio" name="payment-type" >
						Bkash
						</label>
					</div> --}}
					</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Place Order	</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<div class="viewed">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="viewed_title_container">
					<h3 class="viewed_title">Some Advised</h3>
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
</div>
   
</section>

@endsection
