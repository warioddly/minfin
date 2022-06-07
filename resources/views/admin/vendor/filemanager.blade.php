@extends('admin.layouts.app')


@section('page-information')
    <x-page-inform
        title="File manager"
        :breadcrumbs="['File manager']"
    ></x-page-inform>
@endsection

@section('content')
    <iframe src="{{ url('laravel-filemanager') }}" style="width: 100%; height: 820px; overflow: hidden; border: none" class="mb-2"></iframe>
@endsection
