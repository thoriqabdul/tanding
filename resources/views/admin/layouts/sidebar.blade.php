<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="index.html">
            <i class="fas fa-futbol text-primary"></i>
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">Bola</span> <span class="font-w400">Tarkam</span>
            </span>
        </a>
        <!-- END Logo -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link {{ (request()->segment(2) == 'match') ? 'active' : ''}}" href="{{route('match.index')}}">
                    <i class="nav-main-link-icon si si-speedometer"></i>
                    <span class="nav-main-link-name">Pertandingan</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ (request()->segment(2) == 'team') ? 'active' : ''}}" href="{{route('team.index')}}">
                    <i class="nav-main-link-icon si si-user"></i>
                    <span class="nav-main-link-name">Team</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="nav-main-link-icon si si-power"></i>
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                    
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->