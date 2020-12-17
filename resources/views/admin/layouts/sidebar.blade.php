<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{asset('admin/img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">BikkiShop</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Category
    </div>
    <li class="nav-item">
        <a class="dropdown-item" href="{{route('category.create')}}">Create</a>
    </li>
    <li class="nav-item" style="margin-top: 15px">
        <a class="dropdown-item" href="{{route('category.index')}}">view all</a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
       Sub Category
    </div>
    <li class="nav-item">
        <a class="dropdown-item" href="{{route('subcategory.create')}}">Create</a>
    </li>
    <li class="nav-item" style="margin-top: 15px">
        <a class="dropdown-item" href="{{route('subcategory.index')}}">view all</a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Products
    </div>
    <li class="nav-item">
        <a class="dropdown-item" href="{{route('product.create')}}">Create</a>
    </li>
    <li class="nav-item" style="margin-top: 15px">
        <a class="dropdown-item" href="{{route('product.index')}}">view all</a>
    </li>


    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Action
    </div>
    <li class="nav-item">

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
