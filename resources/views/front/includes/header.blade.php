<header>
    <div class="banner">
        <div class="container">
            <div class="row banner__row align-items-center">
                <div class="col d-flex minfin-address ">
                    <p class="me-3">
                        <img src="{{ asset('front/images/icons/phone-icon.svg') }}" alt="" class="me-2">
                        Тел: +996 312 607 080
                    </p>
                    <p>
                        <img src="{{ asset('front/images/icons/map-pin.svg ') }}" alt="" class="me-2">
                        Адрес: бульвар Эркиндик, 58
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="d-flex social-media me-4">
                        <a href="" class="me-2">
                            <img src="images/icons/social/Facebook.svg" alt="">
                        </a>
                        <a href="" class="me-2">
                            <img src="images/icons/social/instagram.svg" alt="">
                        </a>
                        <a href="" class="me-2">
                            <img src="images/icons/social/telegram.svg" alt="">
                        </a>
                    </div>
                    <div class="localization-languages d-flex">
                        <a href="#" class="text-uppercase me-2">Кырг</a>
                        <a href="#" class="text-uppercase me-2 active">Рус</a>
                        <a href="#" class="text-uppercase me-2">Eng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brand">
        <div class="container">
            <div class="row brand__row align-items-center ">
                <div class="col-9 col-xs-6 col-sm-8 col-md-7 col-lg-6 col-xl-6 pe-0">
                    <a href="{{ route('index') }}" class="d-flex align-items-center ">
                        <img src="{{ asset('front/images/logo/Logo.svg') }}" alt="" class="rounded-circle me-1 me-lg-3 brand-logo">
                        <span class="text-uppercase brand-name">министерство финансов Кыргызской Республики</span>
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
                        @foreach($pages as $page)
                            @if($page->title == 'About the ministry')
                                <li class="nav__item">
                                    <a href="#" class="item__link text-uppercase">{{ __('About the ministry') }}</a>
                                    @if(count($page->ChildPages) != 0)
                                        <div class="dropdownContain">
                                            <div class="dropOut">
                                                <ul class="firstChild sub_nav__items p-0">
                                                    @forelse($page->ChildPages ?? [] as $secondChild)
                                                        <li class="firstList">
                                                            <a href="#" class="nav-item-link">{{ __($secondChild->title) }}</a>
                                                            @if(count($secondChild->ChildPages) != 0)
                                                                <ul class="second_sub_nav__items">
                                                                    @forelse($secondChild->ChildPages ?? [] as $thirdChild)
                                                                        <li class="secondList">
                                                                            <a href="#" class="nav-item-link">{{ __($thirdChild->title) }}</a>
                                                                            @if(count($thirdChild->ChildPages) != 0)
                                                                                <ul class="third_sub_nav__items">
                                                                                    @forelse($thirdChild->ChildPages ?? [] as $fourthChild)
                                                                                        <li class="thirdList">
                                                                                            <a href="#" class="nav-item-link">{{ __($fourthChild->title) }}</a>
                                                                                            @if(count($fourthChild->ChildPages) != 0)
                                                                                                <ul class="fourth_sub_nav__items">
                                                                                                    @forelse($fourthChild->ChildPages ?? [] as $fifthChild)
                                                                                                        <li class="fourthList"><a href="#" class="nav-item-link">{{ __($fifthChild->title) }}</a></li>
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
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                        @foreach($pages as $page)
                                @if($page->title == 'Activity')
                                    <li class="nav__item">
                                        <a href="#" class="item__link text-uppercase">{{ __('Activity') }}</a>
                                        @if(count($page->ChildPages) != 0)
                                            <div class="dropdownContain">
                                                <div class="dropOut">
                                                    <ul class="firstChild sub_nav__items p-0">
                                                        @forelse($page->ChildPages ?? [] as $secondChild)
                                                            <li class="firstList">
                                                                <a href="#" class="nav-item-link">{{ __($secondChild->title) }}</a>
                                                                @if(count($secondChild->ChildPages) != 0)
                                                                    <ul class="second_sub_nav__items">
                                                                        @forelse($secondChild->ChildPages ?? [] as $thirdChild)
                                                                            <li class="secondList">
                                                                                <a href="#" class="nav-item-link">{{ __($thirdChild->title) }}</a>
                                                                                @if(count($thirdChild->ChildPages) != 0)
                                                                                    <ul class="third_sub_nav__items">
                                                                                        @forelse($thirdChild->ChildPages ?? [] as $fourthChild)
                                                                                            <li class="thirdList">
                                                                                                <a href="#" class="nav-item-link">{{ __($fourthChild->title) }}</a>
                                                                                                @if(count($fourthChild->ChildPages) != 0)
                                                                                                    <ul class="fourth_sub_nav__items">
                                                                                                        @forelse($fourthChild->ChildPages ?? [] as $fifthChild)
                                                                                                            <li class="fourthList"><a href="#" class="nav-item-link">{{ __($fifthChild->title) }}</a></li>
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
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endif
                        @endforeach
                        <li class="nav__item"><a href="#" class="item__link text-uppercase">Документы</a></li>
                        @foreach($pages as $page)
                                @if($page->title == 'Press center')
                                    <li class="nav__item">
                                        <a href="#" class="item__link text-uppercase">{{ __('Press center') }}</a>
                                        @if(count($page->ChildPages) != 0)
                                            <div class="dropdownContain">
                                                <div class="dropOut">
                                                    <ul class="firstChild sub_nav__items p-0">
                                                        @forelse($page->ChildPages ?? [] as $secondChild)
                                                            <li class="firstList">
                                                                <a href="#" class="nav-item-link">{{ __($secondChild->title) }}</a>
                                                                @if(count($secondChild->ChildPages) != 0)
                                                                    <ul class="second_sub_nav__items">
                                                                        @forelse($secondChild->ChildPages ?? [] as $thirdChild)
                                                                            <li class="secondList">
                                                                                <a href="#" class="nav-item-link">{{ __($thirdChild->title) }}</a>
                                                                                @if(count($thirdChild->ChildPages) != 0)
                                                                                    <ul class="third_sub_nav__items">
                                                                                        @forelse($thirdChild->ChildPages ?? [] as $fourthChild)
                                                                                            <li class="thirdList">
                                                                                                <a href="#" class="nav-item-link">{{ __($fourthChild->title) }}</a>
                                                                                                @if(count($fourthChild->ChildPages) != 0)
                                                                                                    <ul class="fourth_sub_nav__items">
                                                                                                        @forelse($fourthChild->ChildPages ?? [] as $fifthChild)
                                                                                                            <li class="fourthList"><a href="#" class="nav-item-link">{{ __($fifthChild->title) }}</a></li>
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
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        <li class="nav__item"><a href="./html/contacts.html" class="item__link text-uppercase">Контакты</a></li>
                    </ul>
                </div>
                <div class="col d-flex justify-content-end ">
                    <ul class="nav__items d-flex">
                        <li class="nav__item m-0">
                            <a href="#" class="item__link text-uppercase d-flex ">
                                <img class="search-icon me-2" src="images/icons/search-icon.svg" alt="">Поиск
                            </a>
                            <div class="dropdownContain">
                                <div class="searchDropOut">
                                    <div class=" searchDropRow">
                                        <form action="#" method="POST">
                                            <div class="form-group d-flex">
                                                <input type="search" name="search" id="search-input">
                                                <button type="submit">ПОИСК</button>
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
                @foreach($pages as $page)
                    <li class="cryptocurrency">
                        <a href="https://www.google.com/search?q=Crypto" rel="noreferrer" target="_self">{{ __($page->title) }}</a>
                        @if(count($page->ChildPages) != 0)
                            <ul>
                                @forelse($page->ChildPages ?? [] as $secondChild)
                                <li><a href="#" target="_self">{{ __($secondChild->title) }}</a>
                                    @if(count($secondChild->ChildPages) != 0)
                                        <ul>
                                            @forelse($secondChild->ChildPages ?? [] as $thirdChild)
                                                <li><a href="#" target="_self">{{ __($thirdChild->title) }}</a>
                                                    @if(count($thirdChild->ChildPages) != 0)
                                                        <ul>
                                                            @forelse($thirdChild->ChildPages ?? [] as $fourthChild)
                                                                <li><a href="#" target="_self">{{ __($fourthChild->title) }}</a>
                                                                    @if(count($fourthChild->ChildPages) != 0)
                                                                        <ul>
                                                                            @forelse($fourthChild->ChildPages ?? [] as $fifthChild)
                                                                                <li><a href="#" target="_self">{{ __($fifthChild->title) }}</a></li>
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

        </nav>
    </div>
</header>
