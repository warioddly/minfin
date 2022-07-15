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
    </div>
@endsection
