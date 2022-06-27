@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="pages"
        :breadcrumbs="['Pages']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-12 col-lg-8">
                            <x-data-table
                                :items="$pages"
                                :excepts="['updated_at', 'id', 'type', 'icon', 'level', 'parent_id', 'icon_type', 'description', 'visible_on_main_page', 'deleted_at']"
                                :links="['', 'show-pages', null, null]"
                                :actions="$userCanActions"
                                :withactions="true"
                            ></x-data-table>
                        </div>
                        <div class="col col-md-12 col-lg-4 mt-3">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <x-page-to-tree></x-page-to-tree>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @can('edit-pages')
        <div class="modal fade" id="edit" aria-hidden="true"
             aria-labelledby="editModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Editing') }} {{ __('page') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" id="edit-modal-form" method="POST" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <label for="create-input" class="form-label">{{ __('Enter a page name') }}</label>
                            <input name="title" type="text" id="create-input" class="form-control mb-3" maxlength="50" required>
                            <label for="description" class="form-label">{{ __('Enter a page description') }}</label>
                            <textarea name="description" type="text" maxlength="700"
                                      id="description" class="form-control mb-3" required
                                      data-toggle="maxlength" data-threshold="700"
                                      rows="5"
                            ></textarea>

                            <label for="page-image-icon" class="form-label mt-3">{{ __('Choice icon') }}</label>
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
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endpush

@push('modal')
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
    :urls="[route('get-pages'), route('directory-update-parent-page', ''), '', '', '', '', '']"
></x-scripts>
