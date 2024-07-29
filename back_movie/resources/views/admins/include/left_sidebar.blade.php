<div class="leftside-menu">
    <a href="{{route('admin.dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo" />
        </span>
    </a>
    <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="dark logo" />
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="small logo" />
        </span>
    </a>
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <div class="leftbar-user">
            <a href="pages-profile.php">
                <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42" class="rounded-circle shadow-sm" />
                <span class="leftbar-user-name mt-2">aaaaaaaaaa</span>
            </a>
        </div>

        <ul class="side-nav">
            <li class="side-nav-title">Navigation</li>
            <li class="side-nav-item">
                <a href="{{route('admin.dashboard')}}" class="side-nav-link">
                    <i class="ri-calendar-event-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-title">Apps</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#person" aria-expanded="false" aria-controls="person" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span>Person</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="person">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.user.index')}}">Users</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#slider" aria-expanded="false" aria-controls="slider" class="side-nav-link">
                    <i class=" ri-slideshow-fill"></i>
                    <span>Slider</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="slider">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admins.slider.index')}}">Slider</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#type" aria-expanded="false" aria-controls="type" class="side-nav-link">
                    <i class="ri-shopping-bag-3-fill"></i>
                    <span>Category</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="type">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.category.index')}}">Category</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#movie" aria-expanded="false" aria-controls="movie" class="side-nav-link">
                    <i class=" ri-slideshow-fill"></i>
                    <span>Movie</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="movie">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.movie.index')}}">Movie</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="" class="side-nav-link">
                    <i class="ri-shopping-bag-3-fill"></i>
                    <span>Report </span>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>