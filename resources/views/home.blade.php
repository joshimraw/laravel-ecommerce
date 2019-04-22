@extends('frontend.layout')

@section('title', ' | Welcome')


@section('content')
@include('frontend.partials.nav')

<div class="banner">
   <div id="c-indicator" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#c-indicator" data-slide-to="0" class="active"></li>
         <li data-target="#c-indicator" data-slide-to="1"></li>
         <li data-target="#c-indicator" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img src="{{asset('frontend/images/banner1.jpg')}}" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
               <h2>A Trusted Online Store in Dhaka</h2>
               <h4>Nulla vitae elit libero, a pharetra augue mollis interdum.</h4>
            </div>
         </div>
         <div class="carousel-item">
            <img src="{{asset('frontend/images/banner2.jpg')}}" class="d-block w-100" alt="">
         </div>
         <div class="carousel-item">
            <img src="{{asset('frontend/images/banner3.jpg')}}" class="d-block w-100" alt="">
         </div>
      </div>
   </div>
</div> {{-- End Banner --}}

    <!-- Category Slider -->

<div class="category_slider">
   <div class="container">
      <div class="row">

        @foreach($categories as $category)

         <div class="col-lg-3 col-md-6 char_col">

            <div class="char_item d-flex flex-row align-items-center justify-content-start">
               <div class="char_content">
                <a href="#">
                  <div class="char_title">{{ $category->name }}</div>
                  <div class="char_subtitle">Product 20</div>
                </a>
               </div>
            </div>
         </div>

         @endforeach

      </div>
   </div>
</div>
    
<section>
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="hot-offer">
               <img src="{{asset('frontend/images/headphone.png')}}" alt="">
            </div>
         </div>
         <div class="col-md-8">
            <div class="row">
                
            @foreach($products as $product)

               <div class="col-md-4">
                  <div class="trends_item is_new">
                     <a href="{{route('product.detail', $product->slug)}}">
                     <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                        <img src="{{asset('frontend/product-images/'. $product->image)}}" alt="">
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

            </div> {{-- End row --}}
         </div>
      </div>
   </div>
</section>

<section>
   <div class="container">
      <div class="row">
         <div class="section-title">
            <h2>New Arrival</h2>
         </div>
         <div class="line"></div>

         @foreach($products as $product)

               <div class="col-md-3">
                  <div class="trends_item is_new">
                     <a href="{{route('product.detail', $product->slug)}}">
                     <div class="trends_image d-flex flex-column align-items-center justify-content-center">
                        <img src="{{asset('frontend/product-images/'. $product->image)}}" alt="">
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
                           <div class="trends_price">TK {{ $product->price }}</div>
                           <div class="trends_view">
                               <a class="btn btn-sm btn-danger" href="">Quick View</a>
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


      </div> {{-- End row --}}
   </div>
</section>

@endsection
