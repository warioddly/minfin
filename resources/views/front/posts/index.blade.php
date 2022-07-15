@extends('front.layouts.app')

@section('content-title'){{ __('Ministry of Finance of the Kyrgyz Republic') }}@endsection

@section('content')

    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                {{ Breadcrumbs::render('Posts') }}
            </div>
        </div>
        <div class="row mb-4 mb-md-5">
            <p class="main-post-header mb-3 d-none d-sm-block d-md-block d-xl-block">{{ __('Latest news-2') }}</p>
            <a href="{{ route('index') }}" class="back-to-list-btn">
                <i class="mdi mdi-arrow-left me-2"></i>{{ __('Back') }}
            </a>
        </div>
    </div>

    <section class="mb-3 mb-md-5">
        <div class="container" id="pages">
            <div class="mb-2 mb-md-5">
                <div class="row page_posts__row mb-4">
                    <div class="col d-flex justify-content-between align-items-center">
                        <p class="header-text mb-4">{{ __('Latest news-2') }}</p>
                    </div>
                </div>
                <div class="row justify-content-md-around justify-content-lg-around d-none d-lg-flex d-md-flex g-3">
                    <x-post-blocks
                        :items="$posts"
                        limit="28"
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
            <div class="pagination-block">
                {{ $posts->links() }}
            </div>
        </div>
    </section>

@endsection
