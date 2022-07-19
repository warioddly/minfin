<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

                <a href="/" class="topnav-logo d-none d-sm-block d-lg-block">
                    <span class="topnav-logo-lg">
                        <img src="{{ asset('front/images/logo/Logo1.png') }}" alt="" height="60">
                    </span>
                    <span class="topnav-logo-sm">
                        <img src="{{ asset('front/images/logo/Logo1.png') }}" alt="" height="50">
                    </span>
                </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            <li class="dropdown notification-list topbar-dropdown d-lg-block">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" id="topbar-languagedrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    @if( App::getLocale() == 'en')
                        <img src=" {{ asset('admin/images/flags/us.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span> <i class="mdi mdi-chevron-down"></i>
                    @elseif(App::getLocale() == 'ru')
                        <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Русский</span> <i class="mdi mdi-chevron-down"></i>
                    @elseif(App::getLocale() == 'kg')
                        <img src="{{ asset('admin/images/flags/kg.svg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Кыргызча</span> <i class="mdi mdi-chevron-down"></i>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu" aria-labelledby="topbar-languagedrop">
                    @if( App::getLocale() != 'en')
                        <a href="{{ route('locale', 'en') }}" class="dropdown-item notify-item">
                            <img src="{{ asset('admin/images/flags/us.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                        </a>
                    @endif
                    @if(App::getLocale() != 'kg')
                        <a href="{{ route('locale', 'kg') }}" class="dropdown-item notify-item">
                            <img src="{{ asset('admin/images/flags/kg.svg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Кыргызча</span>
                        </a>
                    @endif
                    @if(App::getLocale() != 'ru')
                        <a href="{{ route('locale', 'ru') }}" class="dropdown-item notify-item">
                            <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Русский</span>
                        </a>
                    @endif
                </div>
            </li>

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
                        <h6 class="text-overflow m-0">Welcome! Warioddly</h6>
                    </div>

                    <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>{{ __('Profile') }}</span>
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

                    <a href="{{ route('index') }}" class="dropdown-item notify-item">
                        <i class="dripicons-home me-1"></i>
                        <span>{{ __('Home') }}</span>
                    </a>

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

{{--        <div class="app-search dropdown">--}}
{{--            <form>--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" class="form-control" placeholder="{{ __('Search') }}..." id="top-search">--}}
{{--                    <span class="mdi mdi-magnify search-icon"></span>--}}
{{--                    <button class="input-group-text btn-primary" type="submit">{{ __('Search') }}</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">--}}
{{--                <div class="dropdown-header noti-title">--}}
{{--                    <h5 class="text-overflow mb-2">Не найдено <span class="text-danger">17</span> results</h5>--}}
{{--                </div>--}}

{{--                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                    <i class="uil-notes font-16 me-1"></i>--}}
{{--                    <span>{{ __('News') }}</span>--}}
{{--                </a>--}}

{{--                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                    <i class="uil-life-ring font-16 me-1"></i>--}}
{{--                    <span>{{ __('How can I help you?') }}</span>--}}
{{--                </a>--}}

{{--                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                    <i class="uil-cog font-16 me-1"></i>--}}
{{--                    <span>{{ __('User profile settings') }}</span>--}}
{{--                </a>--}}

{{--                <div class="dropdown-header noti-title">--}}
{{--                    <h6 class="text-overflow mb-2 text-uppercase">{{ __('New users') }}</h6>--}}
{{--                </div>--}}

{{--                <div class="notification-list">--}}
{{--                    @foreach($latestUsers as $user)--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="d-flex">--}}
{{--                                <img class="d-flex me-2 rounded-circle" src="{{ $user->avatar }}" alt="Generic placeholder image" height="32" width="32" style="object-fit: cover">--}}
{{--                                <div class="w-100">--}}
{{--                                    <h5 class="m-0 font-14">{{ \Illuminate\Support\Str::limit($user->last_name, $limit=1, $end=".") }} {{ $user->name }}</h5>--}}
{{--                                    <span class="font-12 mb-0">{{ $user->email }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
