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
            :excepts="['updated_at', 'id', 'icon', 'parent_id', 'description', 'type', 'content', 'level']"
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
                            <input name="title" type="text" id="create-input" class="form-control mb-3" maxlength="50" required>
                            <label for="description" class="form-label">{{ __('Enter a page description') }}</label>
                            <textarea name="description" type="text" maxlength="500"
                                      id="description" class="form-control mb-3" required
                                      data-toggle="maxlength" data-threshold="500"
                                      rows="5"
                            ></textarea>

                            <label for="page-icon" class="form-label">{{ __('Choice icon') }}</label>
                            <input name="icon" type="file" id="page-icon" class="form-control" accept="image/*">
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

                            <label for="roles-multiselect" class="form-label">{{ __('Move to') }}</label>
                            <select class="select2 form-control select2-selection--single" name="parent_id" data-toggle="select2" id="select-edit"
                                    data-placeholder="Choose ...">
                                @foreach($parentPages as $page)
                                    <option value="{{ $page->id }}">{{ __($page->title) }}</option>
                                @endforeach
                            </select>

                            <label for="page-icon" class="form-label mt-2">{{ __('Choice icon') }}</label>
                            <input name="icon" type="file" id="page-icon" class="form-control mt" accept="image/*">
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
