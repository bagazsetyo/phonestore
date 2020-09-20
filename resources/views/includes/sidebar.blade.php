 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          {{-- <a href="{{route('auth.edit',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('index')}}" data-turbolinks-action="replace" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" 
                class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 {{ __('Logout') }}
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
          <li class="nav-header">USER</li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-header">Brand</li>
           <li class="nav-item">
            <a href="{{route('brand.create')}}" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Add Brand
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('brand.index')}}" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Brand
              </p>
            </a>
          </li>
          <li class="nav-header">Phone</li>
          <li class="nav-item">
            <a href="{{route('phone.create')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Create</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('phone.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Phone</p>
            </a>
          </li>
          <li class="nav-header">Transaction</li>
            <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Transaction</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>