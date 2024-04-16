<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.partials.head')
    </head>
    <body class="sb-nav-fixed">
        
        <div id="loading-screen" class="loading-screen">
            <div class="loading-spinner"></div>
        </div>


        @include('layout.partials.top_nav')
        <div id="layoutSidenav">
            @include('layout.partials.side_nav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('layout.partials.footer')
            </div>
        </div>
        @include('layout.partials.footer-scripts')
    </body>
</html>
