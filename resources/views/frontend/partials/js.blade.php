<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

<script>
	@if($errors->any())
	
		@foreach($errors->all() as $error)
			toastr.error('{{ $error }}', 'Error', {
				closeButton : true,
			});
		@endforeach
		
	@endif
</script>

@stack('scripts')