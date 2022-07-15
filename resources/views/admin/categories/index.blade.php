@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('publishers') }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Publishers"
        :breadcrumbs="['Publishers']"
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
                        @can('add-categories')
                            <x-page-actions
                                create="Create"
                                icon="uil-file-plus-alt"
                                rightSide="typeInCategory"
                            ></x-page-actions>
                        @endcan

                    </div>
                    <div class="row justify-content-between">
                        <div class="col">
                            <x-data-table
                                :items="$categories"
                                :excepts="['updated_at', 'id', 'deleted_at', 'publisher']"
                                :links="['', 'show-category', null, null]"
                                :actions="$userCanActions"
                                type="publishers"
                            ></x-data-table>
                        </div>

                        <div class="col col-md-12 col-lg-4 mt-3">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <h4 class="header-title mb-3">{{ __('Report') }}</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td>@if(session('categoryView') == true){{ __('Amount of categories') }}  @else {{ __('Amount of publishers') }} @endif: </td>
                                            <td>{{ count($categories) }}</td>
                                        </tr>
                                        @if(session('categoryView') == true)
                                            <tr>
                                                <td>{{ __('Popular category') }}:</td>
                                                <td>{{ __($popularCategory) }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>{{ __('Average views') }}</td>
                                            <td>{{ substr($averageViews, 0, 5) }}%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                <form action="{{ route('store-category') }}" method="POST" class="needs-validation">
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
                        <label for="edit-input" class="form-label">{{ __('Enter a new category name') }}</label>
                        <input type="text" name="title" id="edit-input" class="form-control" value="" placeholder="{{ __('Enter a new category name') }}" required>
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
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }} {{ __('category') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ __('Are you sure you want to delete this category?') }}
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
    :urls="['', route('update-category', ''), route('delete-category'), '', '']"
></x-scripts>
