@extends('admin.layouts.app')

@section('page-information')
    @if($page->type == 1)
        <x-page-inform
            title="Pages"
            :breadcrumbs="['Pages']"
        ></x-page-inform>
    @elseif($page->type == 3)
        <x-page-inform
            title="Pages"
            :breadcrumbs="['Pages', 'Posts']"
        ></x-page-inform>
    @else
        <x-page-inform
            title="Pages"
            :breadcrumbs="['Pages']"
        ></x-page-inform>
    @endif

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
                    @if($page->type == 1)
                        @include('admin.pages.includes.directoryType')
                    @elseif($page->type == 2)
                        @include('admin.pages.includes.pageType')
                    @elseif($page->type == 3)
                        @include('admin.pages.includes.postsType')
                    @else
                        <div class="row mb-2">
                            @can('add-pages')
                                <div class="">
                                    @if($page->level != 4)
                                        <a data-bs-toggle="modal" href="#create" role="button"
                                           class="btn btn-primary mb-2"> <i class="uil-folder-medical me-1"></i> {{ __('Create directory') }}
                                        </a>
                                    @endif
                                    <a href="#" class="btn btn-primary mb-2"><i class="mdi mdi-plus"></i> {{ __('Create') }} {{ __('page-2') }}</a>
                                    <a href="{{ route('page-post-create', $parentId) }}" class="btn btn-primary mb-2"><i class="mdi mdi-plus"></i> {{ __('Create') }} {{ __('post') }}</a>
                                </div>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@if($page->type == 0)
    @push('modal')
        @can('add-pages')
            <div class="modal fade" id="create" aria-hidden="true"
                 aria-labelledby="createModalLabel"
                 tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }} {{ __('page') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('directory-store-child-page', $parentId) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label for="create-input" class="form-label">{{ __('Enter a page name') }}</label>
                                <input name="title" type="text" id="create-input" class="form-control mb-3" maxlength="45" data-toggle="maxlength" data-threshold="45" required>
                                <label for="description" class="form-label">{{ __('Enter a page description') }}</label>
                                <textarea name="description" type="text" maxlength="500"
                                          id="description" class="form-control mb-3" required
                                          data-toggle="maxlength" data-threshold="500"
                                          rows="5"
                                ></textarea>

                                <label for="page-image-icon" class="form-label">{{ __('Choice icon') }}</label>
                                <input name="image" type="file" id="page-image-icon" class="form-control mb-3" accept="image/*">

                                <div class="form-group">
                                   <label for="page-image-icon" class="form-label">{{ __('Or') }} {{ __('enter MDI icon') }}</label>
                                   <div class="form-group d-flex">
                                       <input name="icon" type="text" id="page-icon" class="form-control me-2 p-1">
                                       <a data-bs-toggle="modal" href="#choiceicon" role="button"
                                          class="btn btn-primary">{{ __('Choice') }}
                                       </a>
                                   </div>
                                </div>
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
        type="pages"
        :pageParentId="$parentId"
        :urls="[route('get-pages'), route('directory-update-child-page', array_merge([$parentId], [''])), route('delete-page')]"
    ></x-scripts>
@elseif($page->type == 3)
    @push('modal')
        @can('delete-posts')
            <div class="modal fade" id="delete" aria-hidden="true"
                 aria-labelledby="deleteModalLabel"
                 tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }} {{ __('post') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ __('Are you sure you want to delete this post?') }}
                            <input type="hidden" name="id"  id="delete-input-id" value="" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" id="item-delete" class="btn btn-danger">{{ __('Remove') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @endpush

    <x-scripts
        type="post"
        :urls="['','', route('post-delete')]"
    ></x-scripts>
@endif

