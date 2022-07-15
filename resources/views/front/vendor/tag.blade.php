@extends('front.layouts.app')

@section('content-title'){{ __($tag->title) }} | {{ __('Tags') }}@endsection

@section('content')
    <div class="container" id="pages">
        <div class="row mt-4 mb-2">
            <div class="col">
                {{ Breadcrumbs::render('Tag', $tag) }}
            </div>
        </div>
        <div class="row page_title__row">
            <div class="d-flex align-items-center border-0 p-0 pb-2">
                <i class="dripicons-tags ms-2 me-2 d-flex white-link-block-icon"></i>
                <p class="page_show__header">{{ __($tag->title) }}</p>
            </div>
        </div>
        <div class="row page_description__row mb-5">
            awdawdawd
        </div>
        @if(count($posts) != 0)
            <div class="mb-2 mb-md-5">
                <div class="row page_posts__row mb-4">
                    <div class="col d-flex justify-content-between align-items-center">
                        <h2 class="accordion-header page_show__header" id="panelsStayOpen-headingOne">
                            {{ __('Related news') }}
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
