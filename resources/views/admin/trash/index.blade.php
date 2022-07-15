@extends('admin.layouts.app')


@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('trash') }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Trash"
        :breadcrumbs="['Trash']"
    ></x-page-inform>
@endsection

@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert alertType="danger" message="{{ __($error) }}"></x-alert>
        @endforeach
    @endif

    @if(session('status'))
        <x-alert alertType="success" message="{{ __(session('status')) }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="page-aside-left">
                        <div class="nav flex-column nav-pills nav-justified" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show d-flex align-items-center" id="v-pills-posts-tab" data-bs-toggle="pill" href="#v-pills-posts" role="tab" aria-controls="v-pills-posts"
                               aria-selected="true">
                                <i class="mdi mdi-rss font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Posts') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-categories-tab" data-bs-toggle="pill" href="#v-pills-categories" role="tab" aria-controls="v-pills-categories"
                               aria-selected="true">
                                <i class="mdi mdi-view-list font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Categories') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-pages-tab" data-bs-toggle="pill" href="#v-pills-pages" role="tab" aria-controls="v-pills-pages"
                               aria-selected="true">
                                <i class="uil-copy-alt font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Pages') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-documents-tab" data-bs-toggle="pill" href="#v-pills-documents" role="tab" aria-controls="v-pills-documents"
                               aria-selected="true">
                                <i class="mdi mdi-file-document font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Documents') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-appeals-tab" data-bs-toggle="pill" href="#v-pills-appeals" role="tab" aria-controls="v-pills-appeals"
                               aria-selected="true">
                                <i class="dripicons-user font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Appeals') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-tags-tab" data-bs-toggle="pill" href="#v-pills-tags" role="tab" aria-controls="v-pills-tags"
                               aria-selected="true">
                                <i class="dripicons-tags font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Tags') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="page-aside-right">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-posts" role="tabpanel" aria-labelledby="v-pills-posts-tab">
                                <div class="row mb-2">
                                    <div class="col d-flex justify-content-between">
                                        <p class="h3 mt-1 mb-3">{{ __('Posts') }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <x-deleted-data-table
                                        :items="$posts"
                                        :excepts="['id', 'content', 'is_published', 'updated_at', 'created_at','description', 'preview_image', 'page_id', 'icon', 'sheet']"
                                        :links="['', 'restore-post', '', '', '']"
                                        :actions="[]"
                                        id="posts"
                                    ></x-deleted-data-table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Categories') }}</p>
                                <div class="row">
                                    <x-deleted-data-table
                                        :items="$categories"
                                        :excepts="['id', 'is_published', 'updated_at', 'created_at','description', 'publisher']"
                                        :links="['null', 'restore-category', '', '', '']"
                                        :actions="[]"
                                        id="categories"
                                    ></x-deleted-data-table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-documents" role="tabpanel" aria-labelledby="v-pills-documents-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Documents') }}</p>
                                <div class="row">
                                    <x-deleted-data-table
                                        :items="$documents"
                                        :excepts="['id', 'post_id', 'path', 'is_published', 'preview_image', 'updated_at', 'appeal_of_citizens_id', 'created_at', 'publisher', 'icon', 'icon_type', 'type', 'level']"
                                        :links="['null', 'restore-document', '', '', '']"
                                        :actions="[]"
                                        id="documents"
                                    ></x-deleted-data-table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-appeals" role="tabpanel" aria-labelledby="v-pills-appeals-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Appeals') }}</p>
                                <div class="row">
                                    <x-deleted-data-table
                                        :items="$appeals"
                                        :excepts="['id', 'answer', 'appeal_of_citizens_id', 'created_at', 'content', 'organization', 'is_published', 'updated_at']"
                                        :links="['', 'restore-appeal', '', '', '']"
                                        :actions="[]"
                                        id="appeals"
                                    ></x-deleted-data-table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-pages" role="tabpanel" aria-labelledby="v-pills-pages-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Pages') }}</p>
                                <div class="row">
                                    <x-deleted-data-table
                                        :items="$pages"
                                        :excepts="['id', 'is_published', 'updated_at', 'created_at','description', 'publisher', 'icon', 'icon_type', 'type', 'level', 'parent_id', 'visible_on_main_page']"
                                        :links="['null', 'restore-page', '', '', '']"
                                        :actions="[]"
                                        id="pages"
                                    ></x-deleted-data-table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-tags" role="tabpanel" aria-labelledby="v-pills-tags-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Tags') }}</p>
                                <div class="row">
                                    <x-deleted-data-table
                                        :items="$tags"
                                        :excepts="['id', 'updated_at', 'created_at']"
                                        :links="['null', 'restore-tag', '', '', '']"
                                        :actions="[]"
                                        id="tags"
                                    ></x-deleted-data-table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
        <div class="modal fade" id="delete" aria-hidden="true"
             aria-labelledby="deleteModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Restoring') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to restore this?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger restore-item">{{ __('Recover') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="restore" aria-hidden="true"
             aria-labelledby="deleteModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Restoring') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to restore this?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-success restore-item">{{ __('Recover') }}</button>
                    </div>
                </div>
            </div>
        </div>
@endpush

<x-scripts
    type="settings"
    :urls="['', '', '',  '', '']"
></x-scripts>

@push('head-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/admin/plugins/DataTables/css/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/plugins/bootstrap/css/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <style>
        div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate{
            text-align: end !important;
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="{{ asset('/admin/plugins/DataTables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.bootstrap5.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.buttons.min.js') }}" type="text/javascript"></script>
@endpush
