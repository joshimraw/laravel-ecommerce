@extends('frontend.layout')

@section('title', ' | About Eghuri')

@push('styles')
	<link rel="stylesheet" href="{{asset('frontend/css/product_styles.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/product_responsive.css')}}">
	<style>
		p{
		font-family: 'Rubik', sans-serif;
	    font-size: 14px;
	    line-height: 1.7;
	    font-weight: 400;
	    color: #0d0d0d;
		}
	</style>
@endpush

@section('content')


<div class="single_product">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<h1 class="product_name">About Eghuri.com</h1>
				<p>
					<strong class="text-danger">Eghuri.com</strong> is the ultimate online shopping destination for Bangladesh offering completely hassle-free shopping experience through secure and trusted gateways. We offer you trendy and reliable shopping with all your favorite brands and more. Now shopping is easier, faster and always joyous. We help you make the right choice here.
				</p>
				<p>
					Eghuri.com has been launched in March 2019. It is an initiative of the leading . Eghuri showcases products from all categories such as accessories, electronics, Home appliance, health & beauty, Kids and Toys, gadget, computer accessories, stationery, medicine and health, gift item , Kitchen and dining, Watch,  and still counting! Our collection combines the latest in fashion trends as well as the all-time favorites. Our products are exclusively selected for you. We, at Eghuri, have all that you need under one umbrella.
				</p>
				<p>
					In tune with the vision Digital Bangladesh, Eghuri.com opens the doorway for everybody to shop over the Internet. We constantly update with lot of new products, services and special offers. We provide on-time delivery of products and quick resolution of any concerns. We provide our customers with memorable online shopping experience. Our dedicated Eghuri quality assurance team works round the clock to personally make sure the right packages reach on time. You can choose whatever you like. We deliver it right at your address across Bangladesh. Our services are at your doorsteps all the time. Get the best products with the best online shopping experience every time. You will enjoy online shopping here!
				</p>

			</div>
		</div>
	</div>
</div>
	
</section>

@endsection
