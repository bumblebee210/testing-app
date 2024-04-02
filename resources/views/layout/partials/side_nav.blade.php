<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                    <div class="sb-nav-link-icon"></div>
                    <i class="fas fa-tachometer-alt col-3"></i>
                    Dashboard
                </a>
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('tableWorkspace')}}">
                    <div class="sb-nav-link-icon"></div>
                    <i class="fa-solid fa-laptop-file col-3"></i>
                    Worksapace
                </a>
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('space')}}">
                    <div class="sb-nav-link-icon"></div>
                    <i class="fa-brands fa-space-awesome col-3"></i>
                    Space
                </a>
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('list')}}">
                    <div class="sb-nav-link-icon"></div>
                    <i class="fa-solid fa-list-check col-3"></i>
                    List
                </a>
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{route('tasks')}}">
                    <div class="sb-nav-link-icon"></div>
                    <i class="fa-regular fa-message col-3"></i>
                    Task
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Welcome</div>
            Admin
        </div>
    </nav>
</div>