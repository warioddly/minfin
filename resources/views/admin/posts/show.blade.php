@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Posts"
        :breadcrumbs="['Posts']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h2><b>{{ $post->title ?? ''}}</b></h2>
                            <div class="d-block d-sm-flex  text-break">
                                <img src="{{ $post->preview_image ?? ''}}" alt="" class="me-2" style="width: 300px; height: 191px; object-fit: cover">
                                <p class="text-muted font-13">{{ $post->description ?? ''}}...</p>
                            </div>
                        </div>
                        <div class="col-sm-2 offset-sm-1 d-print-none mt-3">
{{--                            <div class="mt-1">--}}
{{--                                <p class="font-13"><strong>{{ __('Created time') }}: </strong> <span class="float-end">{{ $post->created_at->toDateTime()->format('d-m-Y') }}</span></p>--}}
{{--                                <p class="font-13"><strong>{{ __('Status') }}: </strong>--}}
{{--                                    @if($post->is_published == 1)--}}
{{--                                        <span class="badge bg-success float-end">{{ __('Published') }}</span>--}}
{{--                                    @else--}}
{{--                                        <span class="badge bg-secondary float-end">{{ __('Unpublished') }}</span>--}}
{{--                                    @endif--}}
{{--                                </p>--}}
{{--                                <p class="font-13"><strong>{{ __('Category') }}</strong> <span class="float-end">{{ $post->category->title }}</span></p>--}}
{{--                                <p class="font-13"><strong>{{ __('Publisher') }}</strong> <span class="float-end">{{ $post->publisher->title ?? '' }}</span></p>--}}
{{--                                <p class="font-13"><strong>{{ __('Author') }}</strong> <span class="float-end">{{ $post->getUserName($post->user_id) }}</span></p>--}}
{{--                            </div>--}}
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
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            {!! html_entity_decode( $post->content ) !!}
                        </div>
                    </div>

                    @if(count($post->attachmentFiles) != 0)
                        <div class="row mx-n1 g-0">
                            <p class="h4">{{ __('Attached files') }}</p>
                            @foreach($post->attachmentFiles as $document)
                                <div class="card mb-1 shadow-none border me-2" style="width: 400px">
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
                        </div>
                    @endif

                    <div class="d-print-none mt-4">
                        <div class="text-end">
                            <a href="{{ route('post-edit', $post->id) }}" class="btn btn-primary"><i class="mdi mdi-file-edit"></i></a>
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> </a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
