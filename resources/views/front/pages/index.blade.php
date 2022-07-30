@extends('front.layouts.app')

@section('content-title'){{ __($pages[0]->title) }}@endsection

@section('content')

    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                {{ Breadcrumbs::render('Pages') }}
            </div>
        </div>
        <div class="row mb-4 mb-md-5">
            <p class="main-post-header mb-3 d-none d-sm-block d-md-block d-xl-block">{{ __('All sections') }}</p>
            <a href="{{ route('index') }}" class="back-to-list-btn">
                <i class="mdi mdi-arrow-left me-2"></i>{{ __('Back') }}
            </a>
        </div>
    </div>

    <div class="container" id="pages">
        @foreach($pages as $page)
            @if($page->level != 3 && count($page->childPages) != 0)
                <div class="row page_accordion__row mb-5">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button page_show__header collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne_{{ $page->id }}" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    {{ __($page->title) }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne_{{ $page->id }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body px-0 row g-3 pt-4">
                                    <x-white-link-block
                                        :items="$page['childPages']"
                                    ></x-white-link-block>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
