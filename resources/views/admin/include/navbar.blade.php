<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="/admin-messages" class="dropdown-item">
          <!-- Message Start -->
          {{-- @if ($new_msggs == 0)
            <div class="media">
              <div class="media-body">
              <p class="text-sm">No New Messages</p>
              
            </div>
          </div>
          @endif --}}
          {{-- @foreach ($new_msgs as $msgs)
          <div class="media">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                {{$msgs->email}}
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">{{$msgs->message}}</p>
              
            </div>
          </div>
          <div class="dropdown-divider"></div>
          @endforeach --}}
          
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="/mark_read" class="dropdown-item dropdown-footer">Mark All as read</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        {{-- <span class="badge badge-warning navbar-badge">{{$new_users_register}}</span> --}}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- @if ($new_users_register == 0)
          <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i>No new users
          <span class="float-right text-muted text-sm"></span>
        </a>
        @else
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>{{$new_users_register}} new users
            <span class="float-right text-muted text-sm"></span>
          </a>
        @endif --}}
        <div class="dropdown-divider"></div>
        <a href="/mark_read_user" class="dropdown-item dropdown-footer">Mark as Read</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>