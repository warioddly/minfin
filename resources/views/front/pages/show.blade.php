@extends('front.layouts.app')

@section('content-title'){{ __($page->title) }}@endsection

@section('content')
    <div class="container" id="Pages">
        <div class="row mt-4 mb-3">
            <div class="col">
                {{ Breadcrumbs::render('Page', $page) }}
            </div>
        </div>
    </div>
@endsection
