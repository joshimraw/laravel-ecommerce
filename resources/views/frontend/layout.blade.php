<!DOCTYPE html>
<html lang="en">
  
@include('frontend.partials.head')

	<body>
		<div class="root_container">
			@include('frontend.partials.header')
			


			@yield('content')

			@include('frontend.partials.footer')

		</div>
			
			@include('frontend.partials.js')
	</body>
  
</html>