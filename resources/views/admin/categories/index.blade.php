@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Categories"
        :breadcrumbs="['Categories']"
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
                                create="Create category"
                                icon="uil-file-plus-alt"
                                rightSide="null"
                            ></x-page-actions>
                        @endcan
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">
                            <x-data-table
                                :items="$categories"
                                :excepts="['updated_at', 'id']"
                                :links="['', 'show-category', null, null]"
                                :actions="$userCanActions"
                            ></x-data-table>
                        </div>

                        <div class="col col-md-12 col-lg-4 mt-3">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <h4 class="header-title mb-3">Order Summary</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td>Grand Total :</td>
                                            <td>$1571.19</td>
                                        </tr>
                                        <tr>
                                            <td>Discount : </td>
                                            <td>-$157.11</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charge :</td>
                                            <td>$25</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated Tax : </td>
                                            <td>$19.22</td>
                                        </tr>
                                        <tr>
                                            <th>Total :</th>
                                            <th>$1458.3</th>
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
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }} {{ __('category') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-category') }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="modal-body">
                        <label for="create-input" class="form-label">{{ __('Enter a category name') }}</label>
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
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Renaming') }} {{ __('category') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-modal-form" method="POST" class="needs-validation">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <label for="edit-input" class="form-label">{{ __('Enter a new category name') }}</label>
                        <input type="text" name="title" id="edit-input-name" class="form-control" value="" placeholder="{{ __('Enter a new category name') }}" required>
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
                    <button type="submit" id="item-delete" class="btn btn-danger">{{ __('Remove') }}</button>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endpush

<x-scripts
    type="category"
    :urls="['', route('update-category', ''), route('delete-category')]"
></x-scripts>
