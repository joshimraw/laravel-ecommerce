<header class="header">

    <div class="top_bar">
      <div class="container">
        <div class="row">
          <div class="col d-flex flex-row">
            <div class="top_bar_contact_item"><i class="fa fa-phone"></i> 01715 779128</div>
            <div class="top_bar_contact_item" id="topbarmail"><i class="fa fa-envelope"></i> hello@eghuri.com</div>
            <div class="top_bar_content ml-auto">
              
              <div class="top_bar_user">

              @if(Auth::check())
                
                <div class="user_icon"><i class="fa fa-user"></i></div>
                <div><a href="{{route('customer.dashboard')}}">My Account</a></div>
                <div>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      <i class="fa fa-power-off fa-lg"></i> Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                </div>
                @else
                <div class="user_icon"><i class="fa fa-user"></i></div>
                <div><a href="{{route('register')}}">Register</a></div>
                <div><a href="{{route('login')}}">Sign in</a></div>
                
                @endif

              </div>
            </div>
          </div>
        </div>
      </div>    
    </div> <!-- Top Bar -->

    <!-- Header Main -->

    <div class="header_main">
      <div class="container">
        <div class="row">

          <!-- Logo -->
          <div class="col-lg-3 col-sm-3 col-3 order-1">
            <div class="logo_container">
              <div class="logo"><a href="/">
                <img src="{{asset('storage/images/ghuri.png')}}" alt="">
              </a></div>
            </div>
          </div>

          <!-- Search -->
          <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
            <div class="header_search">
              <div class="header_search_content">
                <div class="header_search_form_container">
                  <form action="{{route('search')}}" class="header_search_form clearfix" method="get">
                  
                    <input type="text" required="required" class="header_search_input" placeholder="Search for products" name="query">
                    
                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('storage/images/search.png')}}" alt=""></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Wishlist -->
          <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
              <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                <div class="wishlist_icon">
                  <i class="fa fa-heart fa-2x text-danger"></i>
                </div>
                <div class="wishlist_content">
                  <div class="wishlist_text"><a href="#">Wishlist</a></div>
                  <div class="wishlist_count">0</div>
                </div>
              </div>

              <!-- Cart -->
              <div class="cart">
                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                  <div class="cart_icon">
                    <a href="{{ route('carts.index') }}">
                    <i class="fa fa-cart-arrow-down fa-2x text-danger"></i>
                    <div class="cart_count">
                      <span>{{ App\Models\Cart::totalCarts()->count() }}</span>
                    </div>
                  </a>
                  </div>
                  <div class="cart_content">
                    <div class="cart_text"><a href="{{ route('carts.index') }}">Cart</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  
  </header>