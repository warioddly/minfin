@extends('front.layouts.app')

@section('content-title'){{ __($post->title) }}@endsection

@section('content')
    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                {{ Breadcrumbs::render('Post', $post) }}

                @if(session('status'))
                    <x-alert alertType="danger" message="{{ __(session('status')) }}"></x-alert>
                @endif

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
        <div class="row mb-1 mb-md-3">
            <div class="col-12 col-md-8 col-lg-9 mb-3 mb-lg-0 post-show-content">
                <div class="tab-content">
                    <div class="tab-pane show active" id="post">
                        <div class="show-post-block" id="print-post">
                            <p class="p-2 post-title"> {{ __($post->title) }}</p>
                            <img src="{{ $post->preview_image }}" alt="..." class="img-fluid post-preview-image mt-2 mb-3">
                            <div class="post-content mb-5">{!! html_entity_decode( __($post->content) ) !!}</div>
                            @if(count($post->galleries) != 0)
                                <div class="post-gallery mb-3">
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
                            <div class="row ">
                                <div class="col-12 col-sm-6  mb-3">
                                    <p class="text-muted mb-2 g-info-text">{{ __('Views') }}</p>
                                    <p class="text-muted g-info-text"><i class="mdi mdi-eye"></i> {{ $post->views }} </p>
                                </div>
                                <div class="col-12 col-sm-6 d-md-flex justify-content-end">
                                    <div class="wds_share mb-3">
                                        <p class="text-muted mb-2 g-info-text text-md-end text-start">{{ __('Share') }}</p>
                                        <div class="wds_share_block">
                                            <div class="ya-share2" data-services="vkontakte,odnoklassniki,gplus,twitter,viber,whatsapp,skype,telegram,pinterest,facebook"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($post->tags()) != 0)
                                <div class="tags">
                                    <p class="text-muted mb-2 mt-2 g-info-text">{{ __('Tags') }}</p>
                                    <div class="tags-block">
                                        @foreach($post->tags() as $tag)
                                            <a href="{{ route('front-show-tag', $tag->id) }}" class="tag-button">{{ $tag->title }} </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
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
            <div class="col-12 col-md-4 col-lg-3 mb-2">
                <div class="p-3 post_information">
                    <p class="header-info-text">{{ __('Publication date') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 ">{{ Carbon\Carbon::parse($post->created_at)->format("d-m-Y - H:i") }}</h6>
                    <p class="header-info-text">{{ __('Published') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 info-blue-text">{{ __($post->publisher->title ?? '') }}</h6>
                    <p class="header-info-text mb-2">{{ __('Direction') }}</p>
                    <a href="#" class="mt-lg-2 mt-md-2 mt-2 info-blue-text mb-2">{{ __($post->InPage->title) }}</a>
                </div>
            </div>
        </div>
        @if(count($relatedPosts) !=0)
            <div class="row">
                <p class="main-post-header mb-3">{{ __("Related posts") }}</p>
            </div>
        @endif
    </div>
    <section id="" class="mb-lg-5 mb-md-3">
        <div class="container">
            <div class="row related-posts">
                @foreach($relatedPosts as $key => $post)
                    <div class="col-12 col-md-6 col-lg-6 new_block mb-lg-3 mb-2">
                        <span class="p-0 d-flex related-span">
                            <img src="{{ $post->preview_image  }}" alt="" class="new_block__image">
                            <div class="position-relative new_text-information">
                                <p class="new_block__date pb-1 pb-lg-2 pb-md-1 pt-2">{{ $post->created_at->toDateTime()->format('d.m.Y H:s') }}</p>
                                <p class="new_block__title d-block d-sm-none d-md-none d-md-none">
                                    @for($i = 0; $i < 6; $i++) {{ explode(" ", $post->title)[$i] ?? '' }} @endfor...
                                    <a class="new_block__read_more" href="{{ route('front-post-show', $post->id) }}">{{ __('read more') }}</a>
                                </p>
                                <p class="new_block__title d-none d-sm-block d-md-block d-lg-block">
                                    @for($i = 0; $i < 11; $i++) {{ explode(" ", $post->title)[$i] ?? '' }} @endfor...
                                    <a class="new_block__read_more" href="{{ route('front-post-show', $post->id) }}">{{ __('read more') }}</a>
                                </p>
                                <p class="new_block__category bottom-0 pb-2">{{ __($post->category->title) }}</p>
                            </div>
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('footer-scripts')
    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
    <script src="//yastatic.net/share2/share.js"></script>
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
