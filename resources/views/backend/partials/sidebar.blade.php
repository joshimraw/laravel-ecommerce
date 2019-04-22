 

 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">{{'Login as '.auth::user()->role->name}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item {{Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
            <i class="app-menu__icon fa fa-laptop fa-lg"></i>
            <span class="app-menu__label">Dashboard</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item {{Request::is('admin/category*') ? 'active' : '' }}" href="{{route('admin.category.index')}}"><i class="app-menu__icon fa fa-th-large">
            
            </i><span class="app-menu__label">Categories</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item {{Request::is('admin/tag*') ? 'active' : '' }}" href="{{route('admin.tag.index')}}"><i class="app-menu__icon fa fa-tag fa-lg">
            
            </i><span class="app-menu__label">Tags</span>
          </a>
        </li>


        <li class="treeview">
          <a class="app-menu__item {{Request::is('admin/product*') ? 'active' : ''}}" href="JavaScript:Void(0)" data-toggle="treeview">
            <i class="app-menu__icon fa fa-shopping-bag"></i>
            <span class="app-menu__label">Products</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{route('admin.product.create')}}">
                <i class="icon fa fa-circle-o"></i> 
              New Product
            </a>
            </li>
            <li>
              <a class="treeview-item" href="{{route('admin.product.index')}}">
                <i class="icon fa fa-circle-o"></i> 
              All Products
            </a>
          </li>
          </ul>
        </li>

         <li>
          <a class="app-menu__item {{Request::is('admin/order*') ? 'active' : '' }}" href="{{route('admin.order.index')}}"><i class="app-menu__icon fa fa-tag fa-lg">
            
            </i><span class="app-menu__label">Orders</span>
          </a>
        </li>
        
        <hr>

        <li>
          <a class="app-menu__item" href="javascript:void(0);">
            <i class="app-menu__icon fa fa-cog fa-lg"></i>
            <span class="app-menu__label">Site Setting</span>
          </a>
        </li>


      </ul>
    </aside>