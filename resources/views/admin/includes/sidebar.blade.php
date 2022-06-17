<div class="leftside-menu leftside-menu-detached">

    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="{{ auth()->user()['avatar'] }}" alt="user-image" height="42" width="42" class="rounded-circle shadow-sm" style="object-fit: cover">
            <span class="leftbar-user-name">@if(strlen(auth()->user()['last_name']) > 12)
                    {{ \Illuminate\Support\Str::limit(auth()->user()['last_name'], $limit = 1, $end = '.') }}
                    {{ \Illuminate\Support\Str::limit(auth()->user()['name'], $limit = 13, $end = '...')  }}
                @else
                    {{ auth()->user()['last_name'] }} {{ \Illuminate\Support\Str::limit(auth()->user()['name'], $limit = 13, $end = '...')  }}
                @endif
            </span>
        </a>
    </div>

    <ul class="side-nav">

        <li class="side-nav-title side-nav-item">{{ __('Pages') }}</li>

        <li class="side-nav-item">
            <a href="{{ route('dashboard') }}" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> {{ __('Main') }} </span>
            </a>
        </li>

        @canany(['show-posts', 'show-translates', 'show-categories', 'show-documents', 'show-pages', 'show-content-settings', ])
            <li class="side-nav-title side-nav-item">{{ __('Content') }}</li>

            @if(auth()->user()->can('show-posts'))
                <li class="side-nav-item">
                    <a href="{{ route('posts') }}" class="side-nav-link">
                        <i class="uil-rss"></i>
                        <span> {{ __('News') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-pages'))
                <li class="side-nav-item">
                    <a href="{{ route('pages') }}" class="side-nav-link">
                        <i class="uil-copy-alt"></i>
                        <span> {{ __('Pages') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-categories'))
                <li class="side-nav-item">
                    <a href="{{ route('categories') }}" class="side-nav-link">
                        <i class="dripicons-checklist"></i>
                        <span> {{ __('Categories') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-documents'))
                <li class="side-nav-item">
                    <a href="{{ route('documents') }}" class="side-nav-link">
                        <i class="mdi mdi-file-document"></i>
                        <span> {{ __('Documents') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-translates'))
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="mdi mdi-earth"></i>
                        <span> {{ __('Translates') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-content-settings'))
                <li class="side-nav-item">
                    <a href="{{ route('settings') }}" class="side-nav-link">
                        <i class="dripicons-gear noti-icon"></i>
                        <span> {{ __('Other settings') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-filemanager'))
                <li class="side-nav-item">
                    <a href="{{ route('file-manager') }}" class="side-nav-link">
                        <i class="uil-folder-plus"></i>
                        <span> {{ __('File manager') }} </span>
                    </a>
                </li>
            @endif

        @endcanany


        @canany(['show-users', 'show-roles', 'show-logs', 'show-email'])
            <li class="side-nav-title side-nav-item">{{ __('Administration') }}</li>

            @if(auth()->user()->can('auth-email'))
                <li class="side-nav-item">
                    <a href="@if(LaravelGmail::check()) {{ route('email', 'inbox') }} @else {{ route('auth-email') }} @endif" class="side-nav-link">
                        <i class="uil-envelope"></i>
                        <span> {{ __('Email') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-users'))
                <li class="side-nav-item">
                    <a href="{{ route('users') }}" class="side-nav-link">
                        <i class="dripicons-user-group"></i>
                        <span> {{ __('Users') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-roles'))
                <li class="side-nav-item">
                    <a href="{{ route('roles') }}" class="side-nav-link">
                        <i class="uil-check"></i>
                        <span> {{ __('Roles') }} </span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->can('show-logs'))
                <li class="side-nav-item">
                    <a href="{{ route('logs') }}" class="side-nav-link">
                        <i class="uil-assistive-listening-systems"></i>
                        <span> {{ __('Logs') }} </span>
                    </a>
                </li>
            @endif

        @endcanany
    </ul>

{{--    <div class="help-box help-box-light text-center">--}}
{{--        <a href="javascript: void(0);" class="float-end close-btn text-body">--}}
{{--            <i class="mdi mdi-close"></i>--}}
{{--        </a>--}}
{{--        <img src="{{ asset('admin/images/help-icon.svg') }}" height="90" alt="Helper Icon Image" />--}}
{{--        <h5 class="mt-3">Unlimited Access</h5>--}}
{{--        <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>--}}
{{--        <a href="javascript: void(0);" class="btn btn-outline-primary btn-sm">Upgrade</a>--}}
{{--    </div>--}}

    <div class="clearfix"></div>
</div>
