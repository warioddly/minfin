<div class="row mb-2">
    @can('add-pages')
        <div class="">
            <a data-bs-toggle="modal" href="#create" role="button"
               class="btn btn-primary mb-2"> <i class="uil-folder-medical me-1"></i> {{ __('Create directory') }}
            </a>
        </div>
    @endcan
</div>
<div class="row justify-content-between">
    <div class="col-12 col-md-12 col-lg-8">
        <x-data-table
            :items="$ChildPages"
            :excepts="['updated_at', 'id', 'icon', 'parent_id', 'description', 'type', 'content', 'level', 'icon_type', 'visible_on_main_page']"
            :links="['', 'show-pages', null, null]"
            :actions="$userCanActions"
            :showLinks="$parentId"
        ></x-data-table>
    </div>
    <div class="col col-md-12 col-lg-4 mt-3">
        <div class="border p-1 pt-2 mt-4 mt-lg-0 rounded" >
            <x-page-to-tree
                :pageIs="$parentId"
            ></x-page-to-tree>
        </div>
    </div>
</div>

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
                            <textarea name="description" type="text" maxlength="500"
                                      id="description" class="form-control mb-3" required
                                      data-toggle="maxlength" data-threshold="500"
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

    @can('delete-pages')
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
                        {{ __('Are you sure you want to delete this page?') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" id="item-delete" class="btn btn-danger">{{ __('Remove') }}</button>
                    </div>
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

@push('footer-scripts')
    <x-scripts
        type="pages"
        :pageParentId="$parentId"
        :urls="[route('get-pages'), route('directory-update-child-page', array_merge([$parentId], [''])), route('delete-page')]"
    ></x-scripts>
@endpush
