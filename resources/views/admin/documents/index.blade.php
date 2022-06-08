@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Documents"
        :breadcrumbs="['Documents']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                            <a href="{{ route('post-style', 'list') }}" class="btn @if(session('postListStyle') == 'list') btn-secondary @else btn-link text-muted @endif">
                                <i class="dripicons-checklist"></i></a>
                        </div>
                        <div class="btn-group mb-3 d-none d-sm-inline-block">
                            <a href="{{ route('post-style', 'block') }}" class="btn @if(session('postListStyle') == 'block') btn-secondary @else btn-link text-muted @endif">
                                <i class="dripicons-view-apps"></i></a>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="mb-2">{{ __('Quick Access') }}</h5>

                        <div class="row mx-n1 g-0">
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-folder-zip font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Hyper-sketch.zip</a>
                                                <p class="mb-0 font-13">2.3 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-folder font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Compile Version</a>
                                                <p class="mb-0 font-13">87.2 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-primary-lighten text-primary rounded">
                                                        <i class="mdi mdi-folder-zip-outline font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">admin.zip</a>
                                                <p class="mb-0 font-13">45.1 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-file-pdf-outline font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Docs.pdf</a>
                                                <p class="mb-0 font-13">7.5 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-file-pdf-outline font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">License-details.pdf</a>
                                                <p class="mb-0 font-13">784 KB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-folder-account font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Purchase Verification</a>
                                                <p class="mb-0 font-13">2.2 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-folder-account font-18"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold">Hyper Integrations</a>
                                                <p class="mb-0 font-13">874 MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="mb-3">{{ __('Recent') }}</h5>
                        @if(session('postListStyle') == 'list')
                        <x-data-table
                            :items="$documents"
                            :excepts="['id', 'path', 'icon', 'updated_at', 'post_id', 'preview_image']"
                            :links="['null', 'post-show', 'post-edit', 'post-delete', 'id']"
                            :actions="$userCanActions"
                            orederable="false"
                            type="documents"
                        ></x-data-table>
                        @else
                            <div class="row mx-n1 g-0">
                                @foreach($documents as $document)
                                    <div class="col-xxl-3 col-lg-6">
                                        <div class="card m-1 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center flex-nowrap overflow-hidden">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            @if(in_array($document->extension, ['img', 'svg', 'image', 'ico', 'jpeg', 'gif']))
                                                                <img data-dz-thumbnail src="{{ $document->path }}" class="avatar-sm rounded bg-light " style="object-fit: cover" alt="">
                                                            @else
                                                                <i class="mdi mdi-file-document-outline font-24 px-2" ></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="{{ $document->path }}" class="text-muted fw-bold">{{ $document->title }}</a>
                                                        <p class="mb-0 font-13">{{ $document->size }} kb</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @can('delete-documents')
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
    :urls="['','', route('delete-document')]"
></x-scripts>
