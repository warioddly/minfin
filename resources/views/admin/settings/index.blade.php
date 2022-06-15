@extends('admin.layouts.app')


@section('page-information')
    <x-page-inform
        title="Settings"
        :breadcrumbs="['Settings']"
    ></x-page-inform>
@endsection

@section('content')
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert alertType="danger" message="{{ $error }}"></x-alert>
        @endforeach
    @endif

    @if(session('status'))
        <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="page-aside-left">
                        <div class="btn-group d-block mb-2">
                            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Control') }}</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="mdi mdi-file-phone-outline me-1"></i>{{ __('Change contacts') }}</a>
                                <a data-bs-toggle="modal" href="#create" role="button"
                                   class="dropdown-item"><i class="mdi mdi-spin mdi-star me-1"></i> {{ __('Add carousel item') }}
                                </a>
                                <a data-bs-toggle="modal" href="#create" role="button"
                                   class="dropdown-item"><i class="mdi mdi-spin mdi-loading me-1"></i> {{ __('Update statistic data') }}
                                </a>
                                <a data-bs-toggle="modal" href="#changeMainPageBlocks" role="button"
                                   class="dropdown-item change-button"><i class="mdi mdi-view-week mdi-loading me-1"></i> {{ __('Change block in a main paige') }}
                                </a>
                            </div>
                        </div>

                        <div class="nav flex-column nav-pills nav-justified" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link d-flex align-items-center" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                               aria-selected="true">
                                <i class="mdi mdi-file-phone font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Contacts') }}</span>
                            </a>
                            <a class="nav-link active show  d-flex align-items-center" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                               aria-selected="false">
                                <i class="mdi mdi-google-drive font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Carousel') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-statistics" role="tab" aria-controls="v-pills-profile"
                               aria-selected="false">
                                <i class="mdi mdi-google-drive font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Statistics') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="page-aside-right">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <p class="mb-0">wadawdawd</p>
                            </div>
                            <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    @foreach($carouselItems as $item)
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a data-bs-toggle="modal" href="#edit" role="button" data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                                                               class="dropdown-item edit-button"><i class="mdi mdi-pencil me-1"></i> {{ __('Edit') }}
                                                            </a>
                                                            <a data-bs-toggle="modal" href="#delete" role="button" data-id="{{ $item->id }}"
                                                               class="dropdown-item delete-button"><i class="mdi mdi-delete me-1"></i> {{ __('Delete') }}
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <h4 class="header-title mb-1">{{ $item->title }}</h4>

                                                    <div class="mt-3">
                                                        <div class="ratio ratio-16x9">
                                                            <img src="{{ $item->path }}" alt="" width="560" height="315" style="object-fit: cover;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-statistics" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <p class="mb-0">awdawdddddd</p>
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
    @can('add-content-settings')
        <div class="modal fade" id="create" aria-hidden="true"
             aria-labelledby="createModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }} {{ __('carousel item') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('store-carousel') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="create-input" class="form-label">{{ __('Enter title') }}</label>
                            <input name="title" type="text" id="create-input" class="form-control mb-2" maxlength="60" data-toggle="maxlength" data-threshold="60" required>

                            <label for="file-input" class="form-label">{{ __('Select image') }}</label>
                            <input name="image" type="file" id="file-input" class="form-control mb-2" accept="image/*" required>

                            <label for="create-link-input" class="form-label">{{ __('Input link') }}</label>
                            <input name="link" type="text" id="create-link-input" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    @can('edit-content-settings')
        <div class="modal fade" id="edit" aria-hidden="true"
             aria-labelledby="editModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Editing') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="edit-modal-form" method="POST" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <label for="edit-input" class="form-label">{{ __('Enter a new title') }}</label>
                            <input name="title" type="text" id="edit-input" class="form-control mb-2" maxlength="60" data-toggle="maxlength" data-threshold="60" required>

                            <label for="file-input" class="form-label">{{ __('Select image') }}</label>
                            <input name="image" type="file" id="file-input" class="form-control mb-2" accept="image/*">

                            <label for="create-link-input" class="form-label">{{ __('Input link') }}</label>
                            <input name="link" type="text" id="create-link-input" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    @can('delete-content-settings')
        <div class="modal fade" id="delete" aria-hidden="true"
             aria-labelledby="deleteModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to delete this?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" id="item-delete" class="btn btn-danger">{{ __('Remove') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    <div class="modal fade" id="changeMainPageBlocks" aria-hidden="true"
         aria-labelledby="createModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Changing') }} {{ __('blocks') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('changeBlocks') }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="modal-body">
                        <label for="multiselect-change" class="form-label">{{ __('Pages') }}</label>
                        <select class="select2 form-control select2-multiple" name="pages[]" data-toggle="select2" id="multiselect-change"
                                multiple="multiple" data-placeholder="Choose ..." required>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ __($page->title) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endpush

<x-scripts
    type="settings"
    :urls="['', route('update-carousel', ''), route('delete-carousel-item')]"
></x-scripts>
