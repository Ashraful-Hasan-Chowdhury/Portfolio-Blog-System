<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/admin/home')}}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.password.change') }}" class="nav-link">
          Change Password
        </a>
    </li>


  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">

    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->

    <!-- Notifications Dropdown Menu -->
    
    <!-- Admin Toggler start -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-shield text-danger"></i>

      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        @admin('super')
        <a href="{{ route('admin.show') }}" class="dropdown-item">
          <i class="fas fa-user-cog text-danger mr-2"></i>
          {{ ucfirst(config('multiauth.prefix')) }}
        </a>
        @permitToParent('Role')
        <div class="dropdown-divider"></div>
        <a href="{{ route('admin.roles') }}" class="dropdown-item">
          <i class="far fa-user-circle mr-2 text-danger"></i>
          Roles

        </a>
        @endpermitToParent
        @endadmin
        <div class="dropdown-divider"></div>
        <a href="{{ route('admin.password.change') }}" class="dropdown-item">
          <i class="fas fa-unlock-alt mr-2 text-danger"></i>
          Change Password

        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt mr-2 text-danger"></i>
              {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
            style="display: none;">
            @csrf
        </form>
        <div class="dropdown-divider"></div>
      </div>
    </li>
    <!-- Admin Toggler End -->
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
  </ul>
</nav>
