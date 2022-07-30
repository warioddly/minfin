@extends('front.layouts.app')

@section('content-title'){{ __($page->title) }}@endsection

@section('content')
    <div class="container" id="pages">
        <div class="row mt-4 mb-2">
            <div class="col">
                {{ Breadcrumbs::render('Page', $page) }}
            </div>
        </div>
        <div class="row page_title__row">
            <div class="d-flex align-items-center border-0 p-0 pb-2">
                @if($page->icon_type == 'mdi')
                    <i class="mdi {{ $page->icon }} ms-2 me-2 d-flex white-link-block-icon"></i>
                @else
                    <img src="{{ $page->icon }}" alt="..." class="me-2 ms-2 rounded">
                @endif
                <p class="page_show__header">{{ __($page->title) }}</p>
            </div>
        </div>
        <div class="row page_description__row mb-5">
            <p class="">{{ __($page->description) }}</p>
        </div>
        @if($page->level != 4 && count($page->childPages) != 0)
            <div class="row page_accordion__row mb-5">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button page_show__header" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            {{ __('Subsections') }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body px-0 row g-3 pt-4 ">
                            <x-white-link-block
                                :items="$page['childPages']"
                            ></x-white-link-block>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endif
        @if(count($posts) != 0)
            <div class="mb-2 mb-md-5">
                <div class="row page_posts__row mb-4">
                    <div class="col d-flex justify-content-between align-items-center">
                        <p class="header-text">{{ __('Subsection News') }}</p>
                        <a href="#" class="view_all-news-btn">{{ __('View all news') }}</a>
                    </div>
                </div>
                <div class="row justify-content-md-around justify-content-lg-around d-none d-lg-flex d-md-flex g-3">
                    <x-post-blocks
                        :items="$posts"
                        limit="3"
                    ></x-post-blocks>
                </div>
                <div class="row" id="news-section">
                    <div class="news_block d-block d-lg-none d-md-none">
                        <x-post-mini-block
                            :items="$posts"
                        ></x-post-mini-block>
                    </div>
                </div>
            </div>
        @endif

        @if(count($documents) != 0)
            <div class="mb-2 mb-md-5">
                <div class="row page_posts__row mb-4">
                    <div class="col d-flex justify-content-between align-items-center">
                        <p class="header-text">{{ __('Subsection documents') }}</p>
                    </div>
                </div>

                <div class="row">
                    @foreach($documents as $key => $item)
                        @if($key == 6)
                            @break
                        @endif
                        <div class="col-12 col-md-6 col-lg-6 col news_block ">
                            <div class="d-flex new_block mb-lg-3 mb-2 related-span">
                                <a href="{{ $item->path }}" class="p-0 d-contents" download>
                                    <span class="doc-ico">
                                        {{ $item->extension ?? 'doc' }}
                                    </span>
                                    <div class="position-relative new_text-information">
                                        <p class="new_block__date pb-1 pb-lg-2 pb-md-1 pt-1"></p>
                                        <div class="new_block__title d-block d-sm-none d-md-none d-md-none">
                                            @for($i = 0; $i < 6; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                                            <div class="new_block__read_more" >{{ __('read more') }}</div>
                                        </div>
                                        <span class="new_block__title d-none d-sm-block d-md-block d-lg-block">
                                        @for($i = 0; $i < 11; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...<span class="new_block__read_more" >{{ __('more') }}</span>
                                    </span>
                                        <a href="#" class="new_block__category bottom-0 pb-2">{{ __($item->page->title) }}</a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
@endsection
