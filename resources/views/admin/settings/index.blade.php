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
                        <div class="btn-group d-block mb-2">
                            <button type="button" class="btn btn-primary dropdown-toggle w-100" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Control') }}</button>
                            <div class="dropdown-menu">
                                <a data-bs-toggle="modal" href="#create" role="button"
                                   class="dropdown-item"><i class="mdi mdi-spin mdi-star me-1"></i> {{ __('Add carousel item') }}
                                </a>
                                <a data-bs-toggle="modal" href="#changeMainPageBlocks" role="button"
                                   class="dropdown-item change-button"><i class="mdi mdi-view-week me-1"></i> {{ __('Change block in a main paige') }}
                                </a>
                            </div>
                        </div>

                        <div class="nav flex-column nav-pills nav-justified" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active show d-flex align-items-center" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                               aria-selected="true">
                                <i class="mdi mdi-file-phone font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Contacts') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                               aria-selected="false">
                                <i class="mdi mdi-google-drive font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Carousel') }}</span>
                            </a>
                            <a class="nav-link d-flex align-items-center" id="v-pills-banner-tab" data-bs-toggle="pill" href="#v-pills-banner" role="tab" aria-controls="v-pills-banner"
                               aria-selected="false">
                                <i class="dripicons-flag font-18 align-middle me-2"></i>
                                <span class="d-md-block">{{ __('Banner') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="page-aside-right">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Contacts') }}</p>
                                <form action="{{ route('update-contacts') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="address">{{ __('Address') }}</label>
                                            <input type="text" maxlength="500" name="address" id="address" class="form-control" value="{{ $contactData->address }}">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="phone">{{ __('Phone') }}</label>
                                            <input type="number" maxlength="15" name="phone" id="phone" class="form-control" value="{{ $contactData->phone }}">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $contactData->email }}">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="reception">{{ __('Reception') }}</label>
                                            <input type="text" maxlength="500" name="reception" id="reception" class="form-control" value="{{ $contactData->reception }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="relations_sector">{{ __('Public Relations Sector') }}</label>
                                            <input type="text" maxlength="500" name="relations_sector" id="relations_sector" class="form-control" value="{{ $contactData->relations_sector }}">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="helpline">{{ __('Helpline') }}</label>
                                            <input type="number" maxlength="15" name="helpline" id="helpline" class="form-control" value="{{ $contactData->helpline }}">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="public_reception">{{ __('Public reception') }}</label>
                                            <input type="text" maxlength="500" name="public_reception" id="public_reception" class="form-control" value="{{ $contactData->public_reception }}">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-2">
                                            <label for="google_iframe">{{ __('Google iframe') }}</label>
                                            <input type="text" name="google_iframe" id="google_iframe" class="form-control" value="{{ $contactData->google_iframe }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>{{ __('Social sites') }}</p>
                                        <div class="form-group mb-1">
                                            <a data-bs-toggle="modal" href="#addsocial" role="button"
                                               class="btn btn-primary add-button">
                                                {{ __('Add social website') }}
                                            </a>
                                        </div>
                                        <ul class="social-list list-inline mt-1 mb-0">
                                            @foreach($socialMedia as $item)
                                                <li class="list-inline-item">
                                                    <a data-bs-toggle="modal" href="#editSocialMedia" role="button"
                                                       data-id="{{ $item->id }}"
                                                       data-title="{{ $item->title }}"
                                                       data-icon-name="{{ $item->icon }}"
                                                       data-url="{{ $item->url }}"
                                                       data-type="social"
                                                       class="edit-button social-list-item border-primary text-primary d-flex justify-content-center"><i class="mdi {{ $item->icon }}"></i>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button type="submit" class="btn btn-primary " style="float: right"><i class="mdi mdi-content-save me-2"></i>{{ __('Save') }}</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    <p class="h3 mt-0 mb-3">{{ __('Carousel') }}</p>
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
                            <div class="tab-pane fade" id="v-pills-banner" role="tabpanel" aria-labelledby="v-pills-banner-tab">
                                <p class="h3 mt-0 mb-3">{{ __('Banner') }}</p>
                                <form action="{{ route('update-banner') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row mb-3">
                                        <div class="col-12 col-sm-6">
                                            <input type="file" name="first_image" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <input type="file" name="second_image" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <textarea name="content" maxlength="70" rows="4" class="form-control" data-toggle="maxlength" data-threshold="70"  required>{{ __($banner->content) }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary " style="float: right"><i class="mdi mdi-content-save me-2"></i>{{ __('Save') }}</button>
                                </form>
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

        <div class="modal fade" id="addsocial" aria-hidden="true"
             aria-labelledby="createModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Adding social media') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('store-social-media') }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="create-input" class="form-label">{{ __('Enter title') }}</label>
                            <input name="title" type="text" id="create-input" class="form-control mb-2" maxlength="255" data-toggle="maxlength" data-threshold="255" required>

                            <div class="form-group  mb-2">
                                <label for="create-link-input" class="form-label">{{ __('Choice icon') }}</label>
                                <div class="d-flex">
                                    <input name="icon" type="text" id="page-icon" class="form-control me-2 p-1">
                                    <a data-bs-toggle="modal" href="#choiceicon" role="button"
                                       class="btn btn-primary">{{ __('Choice') }}
                                    </a>
                                </div>
                            </div>

                            <label for="create-link-input" class="form-label">{{ __('Input link') }}</label>
                            <input name="url" type="text" id="create-link-input" class="form-control" required>
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

        <div class="modal fade" id="editSocialMedia" aria-hidden="true"
             aria-labelledby="editModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Editing') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#"  id="edit-modal-social-form" method="POST" class="needs-validation">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <label for="title" class="form-label">{{ __('Enter title') }}</label>
                            <input name="title" type="text" id="title" class="form-control mb-2" maxlength="255" data-toggle="maxlength" data-threshold="255" required>

                            <div class="form-group mb-2">
                                <label for="create-link-input" class="form-label">{{ __('Choice icon') }}</label>
                                <div class="d-flex">
                                    <input name="icon" type="text" id="page-icon" class="form-control me-2 p-1">
                                    <a data-bs-toggle="modal" href="#choiceicon" role="button"
                                       class="btn btn-primary">{{ __('Choice') }}
                                    </a>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="create-link-input" class="form-label">{{ __('Input link') }}</label>
                                <div class="d-flex">
                                    <input name="url" type="text" id="create-link-input" class="form-control  me-2 p-1" required>
                                    <a href="#" id="open-link" class="btn btn-primary">{{ __('Open link') }}</a>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a data-bs-toggle="modal" href="#deleteSocialMedia" id="delete-button" role="button" data-id="" data-type="social"
                               class="delete-button btn btn-danger">{{ __('Delete') }}
                            </a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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
                        <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteSocialMedia" aria-hidden="true"
             aria-labelledby="deleteModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to delete this?') }} awdawdawdawd
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" data-type="social" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
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

    <div class="modal fade" id="choiceicon" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('Mdi Icons') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-icon-modal></x-icon-modal>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush

<x-scripts
    type="settings"
    :urls="['', route('update-carousel', ''), route('delete-carousel-item'),  route('update-social-media', ''), route('delete-social-media')]"
></x-scripts>
