@extends('front.layouts.app')

@section('content-title'){{ __($post->title) }}@endsection

@section('content')
    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                waddddddddddddddddddddddddddd
            </div>
        </div>
        <div class="row mb-5">
            <p class="main-post-header mb-3">{{ __($post->title) }}</p>
            <a href="{{ url()->previous() }}" class="back-to-list-btn">
                <i class="mdi mdi-arrow-left me-2"></i>{{ __('To list') }}
            </a>
        </div>
        <div class="row justify-content-between align-items-center content-tab-row mb-4">
            <div class="col-8">
                <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a href="#post" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-md-block">Новость</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#news-documents" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            <span class=" d-md-block">Прикрепленные документы</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <p class="post-created-date">{{ Carbon\Carbon::parse($post->created_at)->format("d-F-Y - H:i") }}</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-10">
                <div class="tab-content">
                    <div class="tab-pane" id="post">
                        <div class="show-post-block">
                            <p class="p-2 post-title"> {{ $post->title }}</p>
                            <img src="{{ $post->preview_image }}" alt="..." class="img-fluid post-preview-image mt-2 mb-3">
                            <div class="post-content">{!! html_entity_decode( $post->content ) !!}</div>
                        </div>
                    </div>
                    <div class="tab-pane show active" id="news-documents">
                        <div class="main-documents mt-3">
                            <div class="row">
                                <x-post-document-download
                                    :items="$post['attachmentFiles']"
                                ></x-post-document-download>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 mt-3 mb-3">
                <div class="p-3 post_information">
                    <p class="">{{ __('Publication date') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 ">{{ Carbon\Carbon::parse($post->created_at)->format("d-F-Y - H:i") }}</h6>
                    <p class="">{{ __('Category') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">{{ __($post->category->title) }}</h6>
                    <p class="">{{ __('Published') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">{{ $post->getUserName($post->page_id) }}</h6>
                    <p class="">{{ __('Direction') }}</p>
                    <a href="#" class="mt-lg-2  mt-md-2  mt-1">{{ __($post->InPage->title) }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
