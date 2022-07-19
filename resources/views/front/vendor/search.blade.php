@extends('front.layouts.app')

@section('content-title'){{ $search }} | {{ __('Search') }}@endsection

@section('content')
    <div class="container" id="pages">
        <div class="row mt-4 mb-2">
            <div class="col">
                {{ Breadcrumbs::render('Search') }}
            </div>
        </div>
        <div class="row page_title__row">
            <div class="d-flex align-items-center border-0 p-0 pb-2">
                <i class="mdi mdi-home-search ms-2 me-2 d-flex white-link-block-icon"></i>
                <p class="page_show__header">{{ __('Search result') }}: "<strong>{{ \Illuminate\Support\Str::limit($search, $limit=45) }}</strong>"</p>
            </div>
        </div>
        <div class="row page_description__row mb-5">
            @if(count($pages) == 0 && count($posts) == 0 && count($categories) == 0)
                <p class="">{{ __('Unfortunately, your search returned no results') }}</p>
            @else
                <p class="">{{ __('Found') }} <strong>{{ count($pages) }}</strong> @if(count($pages) == 1) {{ __('section') }} @elseif(count($pages) < 1 && count($pages) < 10) {{ __('sections') }} @else {{ __('sections-2') }} @endif,
                    <strong>{{ count($posts) }}</strong> @if(count($posts) == 1) {{ __('new') }} @else {{ __('news') }} @endif,
            @endif
        </div>
        @if(count($pages) != 0)
            <div class="row page_accordion__row mb-5">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button page_show__header" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            {{ __('Sections') }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body px-0 row g-3 pt-4 justify-content-center">
                            <x-white-link-block
                                :items="$pages"
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
                        <h2 class="accordion-header page_show__header" id="panelsStayOpen-headingOne">
                            {{ __('News') }}
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-md-around justify-content-lg-around d-none d-lg-flex d-md-flex g-3">
                    <x-post-blocks
                        :items="$posts"
                        limit=""
                    ></x-post-blocks>
                </div>
                <div class="row" id="news-section">
                    <div class="news_block d-block d-lg-none d-md-none">
                        <x-post-mini-block
                            :items="$posts"
                        ></x-post-mini-block>
                    </div>
                </div>
                <div class="pagination-block mt-3">
                    {{ $posts->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
