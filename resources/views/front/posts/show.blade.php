@extends('front.layouts.app')

@section('content-title'){{ __($post->title) }}@endsection

@section('content')
    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                {{ Breadcrumbs::render('Post', $post) }}
            </div>
        </div>
        <div class="row mb-4 mb-md-5">
            <p class="main-post-header mb-3 d-none d-sm-block d-md-block d-xl-block">{{ __($post->title) }}</p>
            <a href="{{ url()->previous() }}" class="back-to-list-btn">
                <i class="mdi mdi-arrow-left me-2"></i>{{ __('To list') }}
            </a>
        </div>
        @if(count($post->attachmentFiles) !=0)
            <div class="row justify-content-between align-items-center content-tab-row mb-lg-4 mb-sm-3 mb-2">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#post" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span class="d-md-block">{{ __('New') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#news-documents" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                <span class=" d-md-block">{{ __('Attached documents') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 mb-3 mb-lg-0 post-show-content">
                <div class="tab-content">
                    <div class="tab-pane show active" id="post">
                        <div class="show-post-block" id="print-post">
                            <p class="p-2 post-title"> {{ __($post->title) }}</p>
                            <div class="d-flex social-media mb-2 d-print-none">
                                <ul class="social-list list-inline head-social-media">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('front-post-show', $post->id) }}&t={{ $post->title }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://twitter.com/intent/tweet?text={{ $post->title }}&url={{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://t.me/share/url?url={{ route('front-post-show', $post->id) }}&text={{ $post->title }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://wa.me/?text={{ __($post->title) }} {{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://connect.ok.ru/offer?url={{ route('front-post-show', $post->id) }}&title={{ __($post->title) }}&imageUrl={{ $post->preview_image }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-odnoklassniki"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://vk.com/share.php?url={{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-muted d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-vk"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <img src="{{ $post->preview_image }}" alt="..." class="img-fluid post-preview-image mt-2 mb-3">
                            <div class="post-content mb-5">{!! html_entity_decode( __($post->content) ) !!}</div>
                            @if(count($post->galleries) !=0)
                                <div class="post-gallery">
                                <p class="text-muted mb-2 g-info-text">{{ __('Gallery') }}</p>
                                <div id="gallery" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($post->galleries as $key => $item)
                                            @if($key == 5)
                                                @break
                                            @endif
                                            <div class="carousel-item @if($key == 0)active @endif">
                                                <img src="{{ $item->thumbnail_image }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#gallery" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#gallery" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="carousel-indicators">
                                        @foreach($post->galleries as $key => $item)
                                            @if($key == 5)
                                                @break
                                            @endif
                                            <button type="button" data-bs-target="#gallery"
                                                    data-bs-slide-to="{{ $key }}" @if($key == 0)class="active" @endif aria-current="true" aria-label="Slide {{ $key + 1 }}">
                                                <img class="d-block gallery-thumbnail" src="{{ $item->thumbnail_image }}" alt=""/>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-2 d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <p class="text-muted g-info-text me-2">{{ count($post->galleries) }} {{ __('photos') }}</p>
                                        <p class="text-muted g-info-text">{{ number_format($post->TotalSize() / 1048576,2) }}MB</p>
                                    </div>
                                    <a href="{{ route('front-post-download', $post->id) }}" class="gallery-download-btn">{{ __('Download gallery') }}</a>
                                </div>
                            </div>
                            @endif
                            <div class="d-flex social-media mt-5 mb-3 justify-content-between d-print-none align-items-center">
                                <ul class="social-list list-inline">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('front-post-show', $post->id) }}&t={{ $post->title }}"  class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://twitter.com/intent/tweet?text={{ $post->title }}&url={{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://t.me/share/url?url={{ route('front-post-show', $post->id) }}&text={{ $post->title }}"  class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://wa.me/?text={{ __($post->title) }} {{ route('front-post-show', $post->id) }}"
                                           class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://connect.ok.ru/offer?url={{ route('front-post-show', $post->id) }}&title={{ __($post->title) }}&imageUrl={{ $post->preview_image }}"  class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-odnoklassniki"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://vk.com/share.php?url={{ route('front-post-show', $post->id) }}"  class="edit-button social-media-item text-blue-light d-flex justify-content-center"
                                           style="" target="_blank"><i class="mdi mdi-vk"></i>
                                        </a>
                                    </li>
                                </ul>
                                <button onclick="printCertificate()" class="print-button">
                                    <i class="dripicons-print me-2"></i>
                                    {{ __('Print version') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="news-documents">
                        <div class="main-documents mt-3 px-2 px-md-0">
                            <x-post-document-download
                                :items="$post['attachmentFiles']"
                            ></x-post-document-download>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 ">
                <div class="p-3 post_information">
                    <p class="header-info-text">{{ __('Publication date') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 ">{{ Carbon\Carbon::parse($post->created_at)->format("d-m-Y - H:i") }}</h6>
                    <p class="header-info-text">{{ __('Publication date') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">{{ __($post->category->title ?? '') }}</h6>
                    <p class="header-info-text">{{ __('Published') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 info-blue-text">{{ __($post->publisher->title ?? '') }}</h6>
                    <p class="header-info-text mb-2">{{ __('Direction') }}</p>
                    <a href="#" class="mt-lg-2 mt-md-2 mt-2 info-blue-text">{{ __($post->InPage->title) }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script>
        function printCertificate() {
            const printContents = document.getElementById('print-post').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
