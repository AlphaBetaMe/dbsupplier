<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
      <a class="navbar-brand brand-logo-mini" href="{{ url('admin/dashboard') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 100%; height:100%;"/>
        <span class="title-logo">Alive</span>
      </a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav w-100">
        {{-- <li class="nav-item w-100">
          <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
            <input type="text" class="form-control" placeholder="Search products">
          </form>
        </li> --}}
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
            <div class="navbar-profile">
              <img class="img-xs rounded-circle" src="{{ asset('assets/uploads/profile/' . auth()->user()->image) }}" alt="User Image">
              <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
              <i class="mdi mdi-menu-down d-none d-sm-block"></i>
           </div> 
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
            {{-- <h6 class="p-3 mb-0">Profile</h6> --}}
            <div class="dropdown-divider"></div>
            <a href="{{ route('users.myProfile', Auth::user())}}" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-account text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">My Profile</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        
           
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing"></span>
      </button>
    </div>
  </nav>