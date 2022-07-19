@extends('admin.layouts.app')

@section('title-page'){{ __('Gallery')  }} | @endsection
@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('gallery') }}
            </ol>
        </div>
    </div>
    <h4 class="page-title">{{ __('Gallery')  }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <x-gallery-block :items="$posts"></x-gallery-block>
                    </div>
                    <div class="row">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
