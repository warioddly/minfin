@extends('admin.layouts.app')

@section('page-information')
    @if($page->type == 3)
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
                    @if($page->type == 1 || $page->type == 3)
                        @include('admin.pages.includes.directoryWithPosts')
                    @else
                        <div class="row mb-2">
                            @can('add-pages')
                            <div>
                                <a data-bs-toggle="modal" href="#createIs" role="button"
                                   class="btn btn-primary mb-2"> <i class="uil-folder-medical me-1"></i> {{ __('Create') }}
                                </a>
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
            <div class="modal fade" id="createIs" aria-hidden="true"
                 aria-labelledby="createModalLabel"
                 tabindex="3">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-grid">
                                @if($page->level != 4)
                                    <a data-bs-toggle="modal" href="#create" role="button"
                                       class="btn btn-primary mb-2"> <i class="uil-folder-medical me-1"></i> {{ __('Create directory') }}
                                    </a>
                                @endif
                                <a href="{{ route('page-sheet-create', $parentId) }}" class="btn btn-primary mb-2"><i class="mdi mdi-book-open-page-variant"></i> {{ __('Create') }} {{ __('page-2') }}</a>
                                <a href="{{ route('page-post-create', $parentId) }}" class="btn btn-primary mb-2"><i class="mdi mdi-rss"></i> {{ __('Create') }} {{ __('post') }}</a>
                            </div>
                        </div>

                        <div class="modal-footer pt-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
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
        @endcan
    @endpush
@endif

