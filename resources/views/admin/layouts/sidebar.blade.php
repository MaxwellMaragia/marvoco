<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('avatar.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>Logged in</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          {{--<li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Roles</span></a></li>--}}
          <li><a href="{{ route('home') }}"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>
          <li><a href="{{ route('categories.index') }}"><i class="fa fa-gear text-aqua"></i> <span>Categories</span></a></li>
          <li><a href="{{ route('products.index') }}"><i class="fa fa-users text-aqua"></i> <span>Premier products</span></a></li>
          <li><a href="{{ route('chemicals.index') }}"><i class="fa fa-users text-aqua"></i> <span>Chemicals</span></a></li>
          <li><a href="{{ route('post.index') }}"><i class="fa fa-rss text-aqua"></i> <span>Posts</span></a></li>
          <li class="treeview" style="height: auto;">
              <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Website data</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                  <li><a href="{{ route('banner.index') }}"><i class="fa fa-circle-o"></i>Banners</a></li>
                  <li><a href="{{ route('deliverables.index') }}"><i class="fa fa-circle-o"></i>Deliverables</a></li>
                  <li><a href="{{ route('brands.index') }}"><i class="fa fa-circle-o"></i>Brands</a></li>
                  <li><a href="{{ route('reviews.index') }}"><i class="fa fa-circle-o"></i>Reviews</a></li>
                  <li><a href="{{ route('about.index') }}"><i class="fa fa-circle-o"></i>About us page</a></li>
                  <li><a href="{{ route('contacts.index') }}"><i class="fa fa-circle-o"></i>Contacts</a></li>
                  <li><a href="{{ route('settings.index') }}"><i class="fa fa-circle-o"></i>General Settings</a></li>

              </ul>
          </li>

    </ul>



    </section>
    <!-- /.sidebar -->
  </aside>
