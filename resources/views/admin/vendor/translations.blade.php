@extends('admin.layouts.app')


@section('page-information')
    <x-page-inform
        title="Translations"
        :breadcrumbs="['Translations']"
    ></x-page-inform>
@endsection

@section('content')
    <iframe src="{{ route('languages.index') }}" style="width: 100%; height: 820px; overflow: hidden; border: none" class="mb-2"></iframe>
@endsection
