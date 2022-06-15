@extends('front.layouts.app')

@section('content-title'){{ __($sheet->title) }}@endsection

@section('content')
    <div class="container" id="pages">
        <div class="row mt-4 mb-2">
            <div class="col">
                {{ Breadcrumbs::render('Page', $sheet) }}
            </div>
        </div>
        <div class="row page_title__row">
            <div class="d-flex align-items-center border-0 p-0 pb-2">
                <i class="mdi {{ $sheet->icon }} ms-2 me-2 d-flex white-link-block-icon"></i>
                <p class="page_show__header">{{ __($sheet->title) }}</p>
            </div>
        </div>
        <div class="row page_description__row mb-5">
            <p class="">{!! html_entity_decode( $sheet->content ) !!}</p>
        </div>
    </div>
@endsection
