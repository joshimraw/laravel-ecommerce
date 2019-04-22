    <nav class="main_nav">
      <div class="container">
        <div class="row">
          <div class="col">
            
            <div class="main_nav_content d-flex flex-row">

              <!-- Categories Menu -->

              <div class="cat_menu_container">
                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                  <div class="cat_burger"><span></span><span></span><span></span></div>
                  <div class="cat_menu_text">categories</div>
                </div>

                <ul class="cat_menu">
                
                @foreach($categories as $category)

                  <li><a href="#">{{ $category->name }}</a></li>
                  
                @endforeach
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </nav>