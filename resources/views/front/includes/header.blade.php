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
                                @if($key == 3)
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
                        <img src="{{ asset('front/images/logo/Logo.png') }}" alt="" class="rounded-circle me-1 me-lg-3 brand-logo">
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
                                                                                                @if(count($thirdChild->ChildPages) != 0)
                                                                                                    <ul class="third_sub_nav__items">
                                                                                                        @forelse($thirdChild->ChildPages ?? [] as $fourthKey => $fourthChild)
                                                                                                            @if($thirdKey + 1 <= 5)
                                                                                                                <li class="thirdList">
                                                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                                                        <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link p-0">{{ __($fourthChild->title) }}</a>
                                                                                                                        @if(count($fourthChild->ChildPages) != 0)
                                                                                                                            <ul class="fourth_sub_nav__items">
                                                                                                                                @forelse($fourthChild->ChildPages ?? [] as $fifthKey => $fifthChild)
                                                                                                                                    @if($thirdKey + 1 <= 5)
                                                                                                                                        <li class="fourthList"><a href="{{ route('front-page-show', $fifthChild->id) }}" class="nav-item-link p-0">{{ __($fifthChild->title) }}</a></li>
                                                                                                                                    @endif
                                                                                                                                @empty
                                                                                                                                @endforelse
                                                                                                                                <li class="thirdList">
                                                                                                                                    <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                            <span class="menu-arrow"></span>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                            @endif
                                                                                                        @empty
                                                                                                        @endforelse
                                                                                                        <li class="thirdList">
                                                                                                            <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link text-capitalize text-capitalize">{{ __('View all') }}</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                    <span class="menu-arrow"></span>
                                                                                                @endif
                                                                                            </div>
                                                                                        </li>
                                                                                    @endif
                                                                                @empty
                                                                                @endforelse
                                                                                <li class="secondList">
                                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                                                                <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                                                                                            @if(count($thirdChild->ChildPages) != 0)
                                                                                                <ul class="third_sub_nav__items">
                                                                                                    @forelse($thirdChild->ChildPages ?? [] as $fourthKey => $fourthChild)
                                                                                                        @if($thirdKey + 1 <= 5)
                                                                                                            <li class="thirdList">
                                                                                                                <div class="d-flex justify-content-between align-items-center">
                                                                                                                    <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link p-0">{{ __($fourthChild->title) }}</a>
                                                                                                                    @if(count($fourthChild->ChildPages) != 0)
                                                                                                                        <ul class="fourth_sub_nav__items">
                                                                                                                            @forelse($fourthChild->ChildPages ?? [] as $fifthKey => $fifthChild)
                                                                                                                                @if($thirdKey + 1 <= 5)
                                                                                                                                <li class="fourthList"><a href="{{ route('front-page-show', $fifthChild->id) }}" class="nav-item-link p-0">{{ __($fifthChild->title) }}</a></li>
                                                                                                                                @endif
                                                                                                                            @empty
                                                                                                                            @endforelse
                                                                                                                            <li class="thirdList">
                                                                                                                                <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                                            </li>
                                                                                                                        </ul>
                                                                                                                        <span class="menu-arrow"></span>
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                    @empty
                                                                                                    @endforelse
                                                                                                    <li class="thirdList">
                                                                                                        <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <span class="menu-arrow"></span>
                                                                                            @endif
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            @empty
                                                                            @endforelse
                                                                            <li class="secondList">
                                                                                <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                                                        <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                                                                                                @if(count($thirdChild->ChildPages) != 0)
                                                                                                    <ul class="third_sub_nav__items">
                                                                                                        @forelse($thirdChild->ChildPages ?? [] as $fourthKey => $fourthChild)
                                                                                                            @if($thirdKey + 1 <= 5)
                                                                                                                <li class="thirdList">
                                                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                                                        <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link p-0">{{ __($fourthChild->title) }}</a>
                                                                                                                        @if(count($fourthChild->ChildPages) != 0)
                                                                                                                            <ul class="fourth_sub_nav__items">
                                                                                                                                @forelse($fourthChild->ChildPages ?? [] as $fifthKey => $fifthChild)
                                                                                                                                    @if($thirdKey + 1 <= 5)
                                                                                                                                        <li class="fourthList"><a href="{{ route('front-page-show', $fifthChild->id) }}" class="nav-item-link p-0">{{ __($fifthChild->title) }}</a></li>
                                                                                                                                    @endif
                                                                                                                                @empty
                                                                                                                                @endforelse
                                                                                                                                <li class="thirdList">
                                                                                                                                    <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                            <span class="menu-arrow"></span>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                            @endif
                                                                                                        @empty
                                                                                                        @endforelse
                                                                                                        <li class="thirdList">
                                                                                                            <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                    <span class="menu-arrow"></span>
                                                                                                @endif
                                                                                            </div>
                                                                                        </li>
                                                                                    @endif
                                                                                @empty
                                                                                @endforelse
                                                                                <li class="secondList">
                                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                                                            <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @foreach($navPages as $page)
                                @if($page->title == 'Press center')
                                    <li class="nav__item">
                                        <a href="{{ route('front-page-show', $page->id) }}" class="item__link text-uppercase">{{ __('Press center') }}</a>
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
                                                                                                @if(count($thirdChild->ChildPages) != 0)
                                                                                                    <ul class="third_sub_nav__items">
                                                                                                        @forelse($thirdChild->ChildPages ?? [] as $fourthKey => $fourthChild)
                                                                                                            @if($thirdKey + 1 <= 5)
                                                                                                                <li class="thirdList">
                                                                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                                                                        <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link p-0">{{ __($fourthChild->title) }}</a>
                                                                                                                        @if(count($fourthChild->ChildPages) != 0)
                                                                                                                            <ul class="fourth_sub_nav__items">
                                                                                                                                @forelse($fourthChild->ChildPages ?? [] as $fifthKey => $fifthChild)
                                                                                                                                    @if($thirdKey + 1 <= 5)
                                                                                                                                        <li class="fourthList"><a href="{{ route('front-page-show', $fifthChild->id) }}" class="nav-item-link p-0">{{ __($fifthChild->title) }}</a></li>
                                                                                                                                    @endif
                                                                                                                                @empty
                                                                                                                                @endforelse
                                                                                                                                <li class="thirdList">
                                                                                                                                    <a href="{{ route('front-page-show', $fourthChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                            <span class="menu-arrow"></span>
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                </li>
                                                                                                            @endif
                                                                                                        @empty
                                                                                                        @endforelse
                                                                                                        <li class="thirdList">
                                                                                                            <a href="{{ route('front-page-show', $thirdChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                    <span class="menu-arrow"></span>
                                                                                                @endif
                                                                                            </div>
                                                                                        </li>
                                                                                    @endif
                                                                                @empty
                                                                                @endforelse
                                                                                <li class="secondList">
                                                                                    <a href="{{ route('front-page-show', $secondChild->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                                                            <a href="{{ route('front-page-show', $page->id) }}" class="nav-item-link text-capitalize">{{ __('View all') }}</a>
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
                            <a href="#" class="item__link text-uppercase d-flex ">
                                <img class="search-icon me-2" src="{{ asset('front/images/icons/search-icon.svg') }}" alt="">{{ __('Search') }}
                            </a>
                            <div class="dropdownContain">
                                <div class="searchDropOut">
                                    <div class=" searchDropRow">
                                        <form action="#" method="POST">
                                            <div class="form-group d-flex">
                                                <input type="search" name="search" id="search-input">
                                                <button type="submit" class="text-uppercase">{{ __('Search') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="d-flex p-4">
                                        <div class="col">
                                            <p class="header-text">физические лица</p>
                                            <ul class="items">
                                                <li class="item"><a href="#" class="item__link">Среднесрочный прогноз бюджета</a></li>
                                                <li class="item"><a href="#" class="item__link">Финансовые отчеты</a></li>
                                                <li class="item"><a href="#" class="item__link">Состав и контакты</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <p class="header-text">юридические лица</p>
                                            <ul class="items">
                                                <li class="item"><a href="#" class="item__link">Сообщи о коррупции</a></li>
                                                <li class="item"><a href="#" class="item__link">Проект бюджета</a></li>
                                                <li class="item"><a href="#" class="item__link">Капитальные вложения</a></li>
                                                <li class="item"><a href="#" class="item__link">Поддержка Бюджета</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <p class="header-text">Донорам</p>
                                            <ul class="items">
                                                <li class="item"><a href="#" class="item__link">Проекты, вынесенные на обсуждение</a></li>
                                                <li class="item"><a href="#" class="item__link">Итоги обсуждения проектов</a></li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <p class="header-text">вакансии</p>
                                            <ul class="items">
                                                <li class="item"><a href="#" class="item__link">Состав и контакты</a></li>
                                                <li class="item"><a href="#" class="item__link">Семинары и курсы повышения </a></li>
                                                <li class="item"><a href="#" class="item__link">Кассовый план</a></li>
                                                <li class="item"><a href="#" class="item__link">Результаты служебных расследований</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    @if($key == 3)
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
                    <form action="#" method="POST" class="search-form position-relative d-flex">
                        @csrf
                        <input type="text" maxlength="255" placeholder="{{ __('Keyword search') }}">
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
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
{{--            <ul role="menu" aria-level="1" class="bottom-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <div class="nav-item-wrapper">--}}
{{--                        <div class="localization-languages d-flex justify-content-between align-items-center">--}}
{{--                            <div class="d-flex">--}}
{{--                                <a href="{{ route('locale', 'kg') }}" class="text-uppercase me-2 @if( App::getLocale() == 'kg')active @endif">Кырг</a>--}}
{{--                                <a href="{{ route('locale', 'ru') }}" class="text-uppercase me-2 @if( App::getLocale() == 'ru')active @endif">Рус</a>--}}
{{--                                <a href="{{ route('locale', 'en') }}" class="text-uppercase me-2 @if( App::getLocale() == 'en')active @endif">Eng</a>--}}
{{--                            </div>--}}
{{--                            <a href="{{ route('login') }}"><i class="mdi mdi-login" style="font-size: 21px; color: var(--heading-color);"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
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
