<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.home')}}">WePermit</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{route('admins.index')}}"><i class="fas fa-users"></i> <span>Admins</span></a></li>
            <li><a class="nav-link" href="{{route('admins.create')}}"><i class="fas fa-user-plus"></i> <span>Add Admin</span></a></li>

            <li class="menu-header">Starter</li>
            <li><a class="nav-link" href="{{route('users.index')}}"><i class="fas fa-user"></i> <span>Users</span></a></li>
            <li><a class="nav-link" href="{{route('applications.index')}}"><i class="fas fa-user"></i> <span>Applications (Reviewer)</span></a></li>
            <li><a class="nav-link" href="{{route('applications.processor.index')}}"><i class="fas fa-user"></i> <span>Applications (Processor)</span></a></li>

            <li class="menu-header">AUTHORIZING</li>
            <li><a class="nav-link" href="{{route('role.index')}}"><i class="fas fa-pencil-ruler"></i> <span>Roles</span></a></li>
            <li><a class="nav-link" href="{{route('permission.index')}}"><i class="fas fa-pencil-ruler"></i> <span>Permissions</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
