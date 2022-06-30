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
