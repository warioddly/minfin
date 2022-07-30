@extends('admin.layouts.app')

@section('title-page'){{ __('Posts')  }} | {{ $post->title }} |@endsection
@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('show-post', $post) }}
            </ol>
        </div>
    </div>
    <h4 class="page-title">{{ __('Posts')  }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-xxl-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2><b>{{ $post->title ?? ''}}</b></h2>
                            <div class="d-block d-sm-flex  text-break">
                                <img src="{{ $post->preview_image ?? ''}}" alt="" class="me-2" style="width: 300px; height: 191px; object-fit: cover">
                                <p class="text-muted font-13">{{ $post->description ?? ''}}...</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            @php
                                $post->content = str_replace('&quot', "'", $post->content)
                            @endphp
                            {!! html_entity_decode($post->content) !!}
                        </div>
                    </div>

                    <div class="d-print-none mt-4">
                        <div class="text-end">
                            <a href="{{ route('front-post-show', $post->id) }}" class="btn btn-primary"><i class="mdi mdi-eye"></i></a>
                            <a href="{{ route('post-edit', $post->id) }}" class="btn btn-primary"><i class="mdi mdi-file-edit"></i></a>
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> </a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ __('Data') }}</h5>
                    <div class="d-print-none mt-3">
                        <div class="mt-1">
                            <p class="font-13"><strong>Дата создания: </strong> <span class="float-end">{{ $post->created_at->toDateTime()->format('d-m-Y') }}</span></p>
                            <p class="font-13"><strong>Статус: </strong>
                                @if($post->is_published == 1)
                                    <span class="badge bg-success float-end">Опубликованные</span>
                                @else
                                    <span class="badge bg-secondary float-end">Неопубликованные</span>
                                @endif
                            </p>
                            <p class="font-13"><strong>Категория</strong> <span class="float-end">{{ $post->category->title }}</span></p>
                            <p class="font-13"><strong>{{ __('Publisher') }}</strong> <span class="float-end">{{ $post->publisher->title ?? '' }}</span></p>
                            <p class="font-13"><strong>{{ __('Author') }}</strong> <span class="float-end">{{ $post->getUserName($post->user_id) }}</span></p>
                            <p class="font-13"><strong>{{ __('Tags') }}</strong>
                                @foreach($post->tags() as $tag)
                                    <span class="float-end badge badge-outline-primary me-1">
                                        {{ $tag->title }}
                                    </span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#attach-files" data-bs-toggle="tab" aria-expanded="false" class="nav-link @if(count($post->attachmentFiles) != 0) active @endif">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block">{{ __('Attached files') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#gallery" data-bs-toggle="tab" aria-expanded="true" class="nav-link @if(count($post->attachmentFiles) == 0) active @endif">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">{{ __('Gallery') }}</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane @if(count($post->attachmentFiles) != 0) active show @endif" id="attach-files">
                            @if(count($post->attachmentFiles) != 0)
                                @foreach($post->attachmentFiles as $document)
                                    <div class="card mb-1 shadow-none border me-2" style="">
                                        <div class="px-2 py-1">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title rounded text-uppercase">{{ $document->extension }}</span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="{{ $document->path }}" target="_blank" class="text-muted fw-bold"  style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 200px">{{ $document->title }}</a>
                                                    <p class="mb-0">{{ $document->size }} kB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="{{ $document->path }}" class="btn btn-link btn-lg text-muted" download>
                                                        <i class="dripicons-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>{{ __('Empty yet') }}</p>
                            @endif
                        </div>
                        <div class="tab-pane @if(count($post->attachmentFiles) == 0) active show @endif" id="gallery">
                            @if(count($post->galleries) != 0)
                            @foreach($post->galleries as $key => $image)
                                <div class="card mb-1 shadow-none border me-2" style="">
                                    <div class="px-2 py-1">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <img src="{{ $image->thumbnail_image }}" alt="" class="avatar-sm">
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="{{ $image->full_size_image }}" target="_blank" class="text-muted fw-bold"  style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 200px">{{ $image->title }}</a>
                                                <p class="mb-0">{{ $image->size }} kB</p>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ $image->full_size_image }}" class="btn btn-link btn-lg text-muted" download>
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <p>{{ __('Empty yet') }}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('head-scripts')
    <link rel="stylesheet" href="{{ asset('/js/chart/chart.css') }}">
    <script src="{{ asset('/js/chart/chart.js') }}"></script>
    <script src="{{ asset('/js/chart/widget2chart.js') }}"></script>
@endpush
