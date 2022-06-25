@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Posts"
        :breadcrumbs="['Posts']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <div class="text-sm-end">
                                <div class="btn-group mb-3">
                                    <a href="{{ route('posts') }}" class="btn @if($is_published == 'all')btn-primary  @else btn-light @endif">{{ __('All') }}</a>
                                </div>
                                <div class="btn-group mb-3 ms-1">
                                    <a href="{{ route('published-posts', 'published') }}" class="btn @if($is_published == 1)btn-primary  @else btn-light @endif">{{ __('Publishes') }}</a>
                                    <a href="{{ route('published-posts', 'unpublished') }}" class="btn @if($is_published == 0)btn-primary  @else btn-light @endif">{{ __('Inedited') }}</a>
                                </div>
                                <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                                    <a href="{{ route('post-style', 'list') }}" class="btn @if(session('postListStyle') == 'list') btn-secondary @else btn-link text-muted @endif">
                                        <i class="dripicons-checklist"></i></a>
                                </div>
                                <div class="btn-group mb-3 d-none d-sm-inline-block">
                                    <a href="{{ route('post-style', 'block') }}" class="btn @if(session('postListStyle') == 'block') btn-secondary @else btn-link text-muted @endif">
                                        <i class="dripicons-view-apps"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(session('postListStyle') == 'list')
                        <div class="row">
                            <x-data-table
                                :items="$posts"
                                :excepts="['id', 'content', 'is_published', 'updated_at', 'description', 'preview_image', 'page_id', 'icon', 'sheet']"
                                :links="['null', 'post-show', 'post-edit', 'post-delete', 'id']"
                                :actions="$userCanActions"
                            ></x-data-table>
                        </div>
                    @else
                        <div class="row">
                            <x-post-output-card :items="$posts"></x-post-output-card>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endpush

<x-scripts
    type="post"
    :urls="['','', route('post-delete'), '', '', '']"
></x-scripts>
