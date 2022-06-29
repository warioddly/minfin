@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Appeal Of Citizens"
        :breadcrumbs="['Appeal Of Citizens']"
    ></x-page-inform>
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
                    <div class="row mb-2">
                        <div class="col">
                            <div class="text-sm-end">
                                <div class="btn-group mb-3">
                                    <a href="{{ route('appeal') }}" class="btn @if($is_published == 'all')btn-primary  @else btn-light @endif">{{ __('All') }}</a>
                                </div>
                                <div class="btn-group mb-3 ms-1">
                                    <a href="{{ route('published-appeals', 'published') }}" class="btn @if($is_published == 1)btn-primary  @else btn-light @endif">{{ __('Publishes') }}</a>
                                    <a href="{{ route('published-appeals', 'unpublished') }}" class="btn @if($is_published == 0)btn-primary  @else btn-light @endif">{{ __('Inedited') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($appealofcitizens as $item)
                            <div class="col-12 col-md-4 col-lg-3 mb-2">
                                <div class="card mb-0">
                                    <div class="card-body p-3">
                                        <small class="float-end text-muted">{{ $item->created_at->format('d m Y') }}</small>
                                        @if($item->answer == null)
                                            <span class="badge bg-secondary">{{ __('unanswered') }}</span>
                                        @else
                                            <span class="badge bg-success">{{ __('answered') }}</span>
                                        @endif
                                        @if($item->is_published == null)
                                            <span class="badge bg-secondary">{{ __('unpublished') }}</span>
                                        @else
                                            <span class="badge bg-success">{{ __('published') }}</span>
                                        @endif

                                        <h5 class="mt-2 mb-2">
                                            <div id="tooltip-container7">
                                                <a href="{{ route('show-appeal', $item->id) }}" class="text-body"
                                                   data-bs-container="#tooltip-container7" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $item->title }}" >
                                                    {{ \Illuminate\Support\Str::limit($item->title, $limit=25, $end='...') }}
                                                </a>
                                            </div>
                                        </h5>

                                        <p class="mb-0">
                                            <span class="pe-2  mb-2 d-inline-block">
                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                {{ $item->category->title }}
                                            </span>
                                        </p>

                                        @canany(['edit-appeal', 'delete-appeal'])
                                            <div class="dropdown float-end">
                                                <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    @can('edit-appeal')
                                                        @if($item->is_published == true)
                                                            <a href="{{ route('appeal-publish', [$item->id, 'Unpublish']) }}" class="dropdown-item"><i class="mdi-comment-off me-1"></i>{{ __('Unpublish') }}</a>
                                                        @else
                                                            <a href="{{ route('appeal-publish', [$item->id, 'publish']) }}" class="dropdown-item"><i class="mdi mdi-publish me-1"></i>{{ __('Publish') }}</a>
                                                        @endif
                                                    @endcan
                                                    @can('delete-appeal')
                                                        <a data-bs-toggle="modal" href="#delete" role="button" class="dropdown-item delete-button" data-id="{{ $item->id }}"><i class="mdi mdi-delete me-1"></i>{{ __('Delete') }}</a>
                                                    @endcan
                                                </div>
                                            </div>
                                        @endcanany

                                        <p class="mb-0">
                                            <i class=" uil-user-check"></i>
                                            <span class="align-middle">{{ $item->last_name }}
                                                @if(strlen($item->name) > 15)
                                                    {{ \Illuminate\Support\Str::limit($item->name, $limit=1, $end='.') }}
                                                @else
                                                    {{ $item->name }}
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @can('delete-users')
        <div class="modal fade" id="delete" aria-hidden="true"
             aria-labelledby="deleteModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ __('Are you sure you want to delete this?') }}</h5>
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
    type="appeal"
    :urls="['', '', route('delete-appeal'), '', '']"
></x-scripts>
