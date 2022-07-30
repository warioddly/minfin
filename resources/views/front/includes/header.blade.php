<header>
    <div class="banner">
        <div class="container">
            <div class="row banner__row align-items-center">
                <div class="col d-flex minfin-address ">
                    <p class="me-3">
                        <img src="{{ asset('front/images/icons/phone-icon.svg') }}" alt="" class="me-2">
                        {{ \Illuminate\Support\Str::limit(__('Phone'), $limit=3, $end='') }}: {{ $сontactData->phone }}
                    </p>
                    <p>
                        <img src="{{ asset('front/images/icons/map-pin.svg ') }}" alt="" class="me-2">
                        {{ __('Address') }}: {{ $сontactData->address }}
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="d-flex social-media me-4">
                        <ul class="social-list list-inline">
                            @foreach($socialMedia as $key => $item)
                                @if($key == 4)
                                    @break
                                @endif
                                <li class="list-inline-item">
                                    <a href="{{ $item->url }}"  class="edit-button border-primary text-primary d-flex justify-content-center"
                                        style="font-size: 20px" target="_blank"
                                    >
                                        <i class="mdi {{ $item->icon }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="localization-languages d-flex">
                        <a href="{{ route('locale', 'kg') }}" class="text-uppercase me-2 @if( App::getLocale() == 'kg')active @endif">Кырг</a>
                        <a href="{{ route('locale', 'ru') }}" class="text-uppercase me-2 @if( App::getLocale() == 'ru')active @endif">Рус</a>
                        <a href="{{ route('locale', 'en') }}" class="text-uppercase me-2 @if( App::getLocale() == 'en')active @endif">Eng</a>
                        <a href="{{ route('login') }}"><i class="mdi mdi-login" style="font-size: 21px; color: var(--heading-color);"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brand">
        <div class="container">
            <div class="row brand__row align-items-center ">
                <div class="col-9 col-xs-6 col-sm-8 col-md-7 col-lg-6 @if(App::getLocale() == 'en')col-xl-5 @else col-xl-6 @endif  pe-0">
                    <a href="{{ route('index') }}" class="d-flex align-items-center ">
                        <img src="{{ asset('front/images/logo/Logo1.png') }}" alt="" class="rounded-circle me-1 me-lg-3 brand-logo">
                        <span class="text-uppercase brand-name">{{ __('Ministry of Finance of the Kyrgyz Republic') }}</span>
                    </a>
                </div>
                <div class="col ps-0 d-flex justify-content-end">
                    <a class="MenuToggleButton" href="#">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <nav class="desktop-menu">
        <div class="container">
            <div class="d-flex navigation justify-content-around align-items-center">
                <div class="col">
                    <ul class="nav__items d-flex">
                        @foreach($navPages as $page)
                                @if($page->title == 'About the ministry')
                                    <li class="nav__item">
                                        <a href="{{ route('front-page-show', $page->id) }}" class="item__link text-uppercase">{{ __('About the ministry') }}</a>
                                        @if(count($page->ChildPages) != 0)
                                            <div class="dropdownContain">
                                                <div class="dropOut">
                                                    <ul class="firstChild sub_nav__items p-0">
                                                        @forelse($page->ChildPages ?? [] as $secondKey =>$secondChild)
                                                            @if($secondKey + 1 <= 6)
                                                                <li class="firstList">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link p-0">{{ __($secondChild->title) }}</a>
                                                                        @if(count($secondChild->ChildPages) != 0)
                                                                            <ul class="second_sub_nav__items">
                                                                                @forelse($secondChild->ChildPages ?? [] as $thirdKey => $thirdChild)
                                                                                    @if($thirdKey + 1 <= 5)
                                                                                        <li class="secondList">
                                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                                <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link p-0">{{ __($thirdChild->title) }}</a>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endif
                                                                                @empty
                                                                                @endforelse
                                                                                <li class="secondList">
                                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                                                </li>
                                                                            </ul>
                                                                            <span class="menu-arrow"></span>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                        <li class="firstList">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endif
                        @endforeach
                        @foreach($navPages as $page)
                            @if($page->title == 'Activity')
                                <li class="nav__item">
                                    <a href="{{ route('front-page-show', $page->id) }}" class="item__link text-uppercase">{{ __('Activity') }}</a>
                                    @if(count($page->ChildPages) != 0)
                                        <div class="dropdownContain">
                                            <div class="dropOut">
                                                <ul class="firstChild sub_nav__items p-0">
                                                    @forelse($page->ChildPages ?? [] as $secondKey =>$secondChild)
                                                        @if($secondKey + 1 <= 6)
                                                            <li class="firstList">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link p-0">{{ __($secondChild->title) }}</a>
                                                                    @if(count($secondChild->ChildPages) != 0)
                                                                        <ul class="second_sub_nav__items">
                                                                            @forelse($secondChild->ChildPages ?? [] as $thirdKey => $thirdChild)
                                                                                @if($thirdKey + 1 <= 5)
                                                                                    <li class="secondList">
                                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                                            <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link p-0">{{ __($thirdChild->title) }}</a>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            @empty
                                                                            @endforelse
                                                                            <li class="secondList">
                                                                                <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                                            </li>
                                                                        </ul>
                                                                        <span class="menu-arrow"></span>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                    <li class="firstList">
                                                        <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                        @foreach($navPages as $page)
                                @if($page->title == 'Documents')
                                    <li class="nav__item">
                                        <a href="{{ route('front-page-show', $page->id) }}" class="item__link text-uppercase">{{ __('Documents') }}</a>
                                        @if(count($page->ChildPages) != 0)
                                            <div class="dropdownContain">
                                                <div class="dropOut">
                                                    <ul class="firstChild sub_nav__items p-0">
                                                        @forelse($page->ChildPages ?? [] as $secondKey =>$secondChild)
                                                            @if($secondKey + 1 <= 6)
                                                                <li class="firstList">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link p-0">{{ __($secondChild->title) }}</a>
                                                                        @if(count($secondChild->ChildPages) != 0)
                                                                            <ul class="second_sub_nav__items">
                                                                                @forelse($secondChild->ChildPages ?? [] as $thirdKey => $thirdChild)
                                                                                    @if($thirdKey + 1 <= 5)
                                                                                        <li class="secondList">
                                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                                <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link p-0">{{ __($thirdChild->title) }}</a>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endif
                                                                                @empty
                                                                                @endforelse
                                                                                <li class="secondList">
                                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                                                </li>
                                                                            </ul>
                                                                            <span class="menu-arrow"></span>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                        <li class="firstList">
                                                            <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        <li class="nav__item"><a href="{{ route('appeal-of-citizens') }}" class="item__link text-uppercase">{{ __('Appeal') }}</a></li>
                        @foreach($navPages as $page)
                                @if($page->title == 'Press center')
                                    <li class="nav__item">
                                        <a href="{{ route('front-page-show', $page->id) }}" class="item__link text-uppercase">{{ __('Press center') }}</a>
                                        @if(count($page->ChildPages) != 0)
                                            <div class="dropdownContain">
                                                <div class="dropOut">
                                                    <ul class="firstChild sub_nav__items p-0">
                                                        @forelse($page->ChildPages ?? [] as $secondKey =>$secondChild)
                                                            @if($secondKey + 1 <= 5)
                                                                <li class="firstList">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link p-0">{{ __($secondChild->title) }}</a>
                                                                        @if(count($secondChild->ChildPages) != 0)
                                                                            <ul class="second_sub_nav__items">
                                                                                @forelse($secondChild->ChildPages ?? [] as $thirdKey => $thirdChild)
                                                                                    @if($thirdKey + 1 <= 5)
                                                                                        <li class="secondList">
                                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                                <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link p-0">{{ __($thirdChild->title) }}</a>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endif
                                                                                @empty
                                                                                @endforelse
                                                                                <li class="secondList">
                                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link " style="text-transform: inherit">{{ __('View all') }}</a>
                                                                                </li>
                                                                            </ul>
                                                                            <span class="menu-arrow"></span>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                        <li class="firstList">
                                                            <a href="http://minfin.kg" class="nav-item-link p-0" target="_blank">{{ __('Old website') }}</a>
                                                        </li>
                                                        <li class="firstList">
                                                            <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link" style="text-transform: inherit">{{ __('View all') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        <li class="nav__item"><a href="{{ route('contacts') }}" class="item__link text-uppercase">{{ __('Contacts') }}</a></li>
                    </ul>
                </div>
                <div class="col d-flex justify-content-end ">
                    <ul class="nav__items d-flex">
                        <li class="nav__item m-0">
                            <form action="{{ route('search') }}" method="GET" class="search-group">
                                <div href="#" class="item__link text-uppercase d-flex justify-content-end align-items-center">
                                    <input type="search" name="query" class="me-2" id="search-input" placeholder="{{ __('Search news') }}">
                                    <img class="search-icon me-2"  id="search-img" src="{{ asset('front/images/icons/search-icon.svg') }}" alt="">
                                    <button type="submit" class="submit-btn">
                                        <img class="search-icon me-2"  id="search" src="{{ asset('front/images/icons/search-icon.svg') }}" alt="">
                                    </button>
                                 </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="mobile-menu" class="wrapper cf d-none">
        <nav id="main-nav">
            <ul class="first-nav">
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <div class="localization-languages d-flex justify-content-between align-items-center">
                            <div class="d-flex social-media">
                                @foreach($socialMedia as $key => $item)
                                    @if($key == 4)
                                        @break
                                    @endif
                                    <div class="list-inline-item">
                                        <a href="{{ $item->url }}"  class="edit-button text-primary d-flex justify-content-center"
                                           style="font-size: 20px" target="_blank"
                                        >
                                            <i class="mdi {{ $item->icon }}"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('locale', 'kg') }}" class="text-uppercase me-2 @if( App::getLocale() == 'kg')active @endif">Кырг</a>
                                <a href="{{ route('locale', 'ru') }}" class="text-uppercase me-2 @if( App::getLocale() == 'ru')active @endif">Рус</a>
                                <a href="{{ route('locale', 'en') }}" class="text-uppercase me-2 @if( App::getLocale() == 'en')active @endif">Eng</a>
                                <a href="{{ route('login') }}"><i class="mdi mdi-login" style="font-size: 21px; color: var(--heading-color);"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="search">
                    <form action="{{ route('search') }}" method="GET" class="search-form position-relative d-flex">
                        @csrf
                        <input type="search" name="query" maxlength="255" placeholder="{{ __('Keyword search') }}">
                        <button type="submit" class="search-icon-btn">
                            <i class="mdi mdi-magnify" style="color: var(--heading-color) !important;"></i>
                        </button>
                    </form>
                </li>
                @foreach($navPages as $page)
                    <li class="cryptocurrency">
                        <a href="{{ route('front-page-show', $page->id) }}" rel="noreferrer" target="_self">{{ __($page->title) }}</a>
                        @if(count($page->ChildPages) != 0)
                            <ul>
                                @forelse($page->ChildPages ?? [] as $secondChild)
                                <li><a href="{{ route('front-page-show', $secondChild->id) }}" target="_self">{{ __($secondChild->title) }}</a>
                                    @if(count($secondChild->ChildPages) != 0)
                                        <ul>
                                            @forelse($secondChild->ChildPages ?? [] as $thirdChild)
                                                <li><a href="{{ route('front-page-show', $thirdChild->id) }}" target="_self">{{ __($thirdChild->title) }}</a>
                                                    @if(count($thirdChild->ChildPages) != 0)
                                                        <ul>
                                                            @forelse($thirdChild->ChildPages ?? [] as $fourthChild)
                                                                <li><a href="{{ route('front-page-show', $fourthChild->id) }}" target="_self">{{ __($fourthChild->title) }}</a>
                                                                    @if(count($fourthChild->ChildPages) != 0)
                                                                        <ul>
                                                                            @forelse($fourthChild->ChildPages ?? [] as $fifthChild)
                                                                                <li><a href="{{ route('front-page-show', $fifthChild->id) }}" target="_self">{{ __($fifthChild->title) }}</a></li>
                                                                            @empty
                                                                            @endforelse
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    @endif
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @endif
                                </li>
                                @empty
                                @endforelse
                                @if($page->title == 'Press center')
                                    <li><a href="http://minfin.kg" target="_blank">{{ __('Old website') }}</a></li>
                                @endif
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <ul role="menu" aria-level="1" class="bottom-nav">
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <div class="localization-languages d-flex justify-content-between align-items-center">
                            <div class="col minfin-address ">
                                <p class="mb-3 d-flex align-items-center">
                                    <img src="{{ asset('front/images/icons/phone-white-icon.svg') }}" alt="" class="me-2">
                                    {{ \Illuminate\Support\Str::limit(__('Phone'), $limit=3, $end='') }}: {{ $сontactData->phone }}
                                </p>
                                <p class="d-flex align-items-center">
                                    <img src="{{ asset('front/images/icons/map-pin-white.svg ') }}" alt="" class="me-2">
                                    {{ __('Address') }}: {{ $сontactData->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
