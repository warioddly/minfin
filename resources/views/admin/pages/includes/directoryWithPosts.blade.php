<div class="row mb-2">
    <div class="col-sm-4">
        @can('add-pages')
            @if($page->level != 4)
                <a data-bs-toggle="modal" href="#create" role="button"
                   class="btn btn-primary mb-2"> <i class="uil-folder-medical me-1"></i> {{ __('Create directory') }}
                </a>
            @endif
        @endcan
        @can('add-posts')
            <a href="{{ route('page-post-create', $parentId) }}" class="btn btn-primary mb-2"><i class="mdi mdi-rss"></i> {{ __('Create') }} {{ __('post') }}</a>
        @endcan
    </div>
    <div class="col">
        <div class="text-sm-end">
            @if(session('postView') == true)
                <div class="btn-group mb-3">
                    <a href="{{ route('show-pages', $parentId) }}" class="btn @if($is_published == 'all')btn-primary  @else btn-light @endif">{{ __('All') }}</a>
                </div>
                <div class="btn-group mb-3 ms-1">
                    <a href="{{ route('page-published-posts', [$parentId, 'published']) }}" class="btn @if($is_published == 1)btn-primary  @else btn-light @endif">{{ __('Publishes') }}</a>
                    <a href="{{ route('page-published-posts', [$parentId, 'unpublished']) }}" class="btn @if($is_published == 0)btn-primary  @else btn-light @endif">{{ __('Inedited') }}</a>
                </div>
                <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                    <a href="{{ route('post-style', 'list') }}" class="btn @if(session('postListStyle') == 'list') btn-secondary @else btn-link text-muted @endif">
                        <i class="dripicons-checklist"></i>
                    </a>
                </div>
                <div class="btn-group mb-3 d-none d-sm-inline-block">
                    <a href="{{ route('post-style', 'block') }}" class="btn @if(session('postListStyle') == 'block') btn-secondary @else btn-link text-muted @endif">
                        <i class="dripicons-view-apps"></i></a>
                </div>
            @endif
            <div class="btn-group mb-3 ms-1">
                <a href="{{ route('isDirectory', 'directory') }}" class="btn @if(session('postView') == false)btn-primary  @else btn-light @endif">{{ __('Directories') }}</a>
                <a href="{{ route('isDirectory', 'post') }}" class="btn @if(session('postView') == true)btn-primary  @else btn-light @endif">{{ __('Posts') }}</a>
            </div>
        </div>
    </div>
</div>

@if(session('postView') == true)
    @if(session('postListStyle') == 'list')
        <div class="row">
            <x-data-table
                :items="$posts"
                :excepts="['id', 'content', 'is_published', 'updated_at', 'description', 'preview_image', 'childType', 'page_id', 'icon', 'sheet', 'deleted_at']"
                :links="['', 'post-show', 'post-edit', 'post-delete', 'id']"
                :actions="$userCanActions"
            ></x-data-table>
        </div>
    @else
        <div class="row">
            <x-post-output-card :items="$posts"></x-post-output-card>
        </div>
    @endif
@else
    <div class="row justify-content-between">
        <div class="col-12 col-md-12 col-lg-8">
            <x-data-table
                :items="$ChildPages"
                :excepts="['updated_at', 'id', 'icon', 'parent_id', 'description', 'type', 'content', 'level', 'icon_type', 'visible_on_main_page', 'deleted_at']"
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
@endif

@push('modal')

    @if(session('postView') == true)
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
                            <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @else
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
                                <textarea name="description" type="text" maxlength="700"
                                          id="description" class="form-control mb-3" required
                                          data-toggle="maxlength" data-threshold="700"
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
                            <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
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
    @endif

@endpush

@push('footer-scripts')
    @if(session('postView') == true)
        <x-scripts
            type="post"
            :urls="['','', route('post-delete'), '', '', '', '', '', '']"
        ></x-scripts>
    @else
        <x-scripts
            type="pages"
            :pageParentId="$parentId"
            :urls="[route('get-pages'), route('directory-update-child-page', array_merge([$parentId], [''])), route('delete-page'), '', '', '', '']"
        ></x-scripts>
    @endif
@endpush
