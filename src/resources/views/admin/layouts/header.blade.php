<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">


            <a id="" class="nav-link dropdown-toggle" href="#">
                {{auth('admin')->user()->name}}
            </a>

        </li>

        <li style="margin-right: 20px;">
            <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-center btn btn-danger "><i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>

</nav>
