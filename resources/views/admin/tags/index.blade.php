@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('tags') }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Tags"
        :breadcrumbs="['Tags']"
    ></x-page-inform>
@endsection

@section('content')
    @error('title')
        <x-alert alertType="danger" message="{{ $message }}"></x-alert>
    @enderror

    @if(session('status'))
        <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @can('add-tags')
                            <x-page-actions
                                create="Create"
                                icon="uil-file-plus-alt"
                                rightSide="typeInTag"
                            ></x-page-actions>
                        @endcan
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">
                            <x-data-table
                                :items="$tags"
                                :excepts="['updated_at', 'id', 'deleted_at', 'publisher', 'author']"
                                :links="['', 'show-tag', null, null]"
                                :actions="$userCanActions"
                                type="tags"
                            ></x-data-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @can('add-categories')
        <div class="modal fade" id="create" aria-hidden="true"
         aria-labelledby="createModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-tag') }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="modal-body">
                        <label for="create-input" class="form-label">{{ __('Enter name-2') }}</label>
                        <input name="title" type="text" id="create-input" class="form-control" required>
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

    @can('edit-categories')
    <div class="modal fade" id="edit" aria-hidden="true"
         aria-labelledby="editModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Renaming') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-modal-form" method="POST" class="needs-validation">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <label for="edit-input" class="form-label">{{ __('Enter a new tag name') }}</label>
                        <input type="text" name="title" id="edit-input" class="form-control" value="" placeholder="{{ __('Enter a new tag name') }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Rename') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @can('delete-categories')
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
                    {{ __('Are you sure you want to delete this tag?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endpush

<x-scripts
    type="category"
    :urls="['', route('update-tag', ''), route('delete-tag'), '', '']"
></x-scripts>
