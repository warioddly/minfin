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
                            <h2><b>{{ $post->title }}</b></h2>
                            <p class="text-muted font-13">{{ $post->description }}...</p>
                        </div>
                        <div class="col-sm-2 offset-sm-1  d-print-none">
                            <div class="mt-1">
                                <p class="font-13"><strong>{{ __('Created time') }}: </strong> <span class="float-end">{{ $post->created_at->toDateTime()->format('d-m-Y') }}</span></p>
                                <p class="font-13"><strong>{{ __('Status') }}: </strong>
                                    @if($post->is_published == 1)
                                        <span class="badge bg-success float-end">{{ __('Published') }}</span>
                                    @else
                                        <span class="badge bg-secondary float-end">{{ __('Unpublished') }}</span>
                                    @endif
                                </p>
                                <p class="font-13"><strong>{{ __('Category') }}</strong> <span class="float-end">{{ $post->category->title }}</span></p>
                                <p class="font-13"><strong>{{ __('Author') }}</strong> <span class="float-end">{{ $post->author }}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            {!! html_entity_decode( $post->content ) !!}
                        </div>
                    </div>

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
