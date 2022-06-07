<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <a href="/" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('front/images/Logo.svg') }}" alt="" height="60">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('front/images/Logo.svg') }}" alt="" height="50">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            <li class="dropdown notification-list d-xl-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" id="topbar-languagedrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src=" {{ asset('admin/images/flags/us.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span> <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu" aria-labelledby="topbar-languagedrop">

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{ asset('admin/images/flags/kg.svg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Кыргызча</span>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="javascript: void(0);" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div style="max-height: 230px;" data-simplebar>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View All
                    </a>

                </div>
            </li>

{{--            <li class="notification-list">--}}
{{--                <a class="nav-link end-bar-toggle" href="javascript: void(0);">--}}
{{--                    <i class="dripicons-gear noti-icon"></i>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ auth()->user()['avatar'] }}" alt="user-image" class="rounded-circle" style="object-fit: cover">
                    </span>
                    <span>
                        <span class="account-user-name">
                            @if(strlen(auth()->user()['last_name']) > 12)
                                {{ \Illuminate\Support\Str::limit(auth()->user()['last_name'], $limit = 1, $end = '.') }}
                                {{ \Illuminate\Support\Str::limit(auth()->user()['name'], $limit = 13, $end = '...')  }}
                            @else
                                {{ auth()->user()['last_name'] }} {{ \Illuminate\Support\Str::limit(auth()->user()['name'], $limit = 13, $end = '...')  }}
                            @endif
                        </span>
                        <span class="account-position">{{ auth()->user()->getRoleNames()[0] }}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lifebuoy me-1"></i>
                        <span>{{ __('Help') }}</span>
                    </a>

                    @if(session('theme') == 'dark')
                        <a href="{{ route('theme', 'light') }}" class="dropdown-item notify-item">
                            <i class="uil-brightness me-1"></i>
                            <span> {{ __('Light theme') }}</span>
                        </a>
                    @else
                        <a href="{{ route('theme', 'dark') }}" class="dropdown-item notify-item">
                            <i class="uil-moon me-1"></i>
                            <span> {{ __('Dark theme') }}</span>
                        </a>
                    @endif
                    <hr class="my-1" />
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-1"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>


        </ul>

        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>

        <div class="app-search dropdown">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ __('Search') }}..." id="top-search">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <button class="input-group-text btn-primary" type="submit">{{ __('Search') }}</button>
                </div>
            </form>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                <div class="dropdown-header noti-title">
                    <h5 class="text-overflow mb-2">Не найдено <span class="text-danger">17</span> results</h5>
                </div>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-notes font-16 me-1"></i>
                    <span>{{ __('News') }}</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-life-ring font-16 me-1"></i>
                    <span>{{ __('How can I help you?') }}</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-cog font-16 me-1"></i>
                    <span>{{ __('User profile settings') }}</span>
                </a>

                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">{{ __('New users') }}</h6>
                </div>

                <div class="notification-list">
                    @foreach($latestUsers as $user)
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="d-flex">
                                <img class="d-flex me-2 rounded-circle" src="{{ $user->avatar }}" alt="Generic placeholder image" height="32" width="32" style="object-fit: cover">
                                <div class="w-100">
                                    <h5 class="m-0 font-14">{{ \Illuminate\Support\Str::limit($user->last_name, $limit=1, $end=".") }} {{ $user->name }}</h5>
                                    <span class="font-12 mb-0">{{ $user->email }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
