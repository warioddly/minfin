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

    <section id="third-post-subsection" class="mb-3 mb-md-5">
        <div class="container">
            <p class="header-text mb-4">{{ __('Latest news-2') }}</p>
            <x-all-post-page-blocks :items="$posts"></x-all-post-page-blocks>
            <div class="pagination-block">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
