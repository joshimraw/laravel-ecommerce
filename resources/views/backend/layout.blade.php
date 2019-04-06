<!DOCTYPE html>
<html lang="en">
  
@include('backend.partials.head')

  <body class="app sidebar-mini rtl">

      @include('backend.partials.nav')
      @include('backend.partials.sidebar')


      @yield('content')

      @include('backend.partials.footer')
    
  </body>
  
</html>