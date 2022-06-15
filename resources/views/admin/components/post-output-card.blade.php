@foreach($items as $item)
    <div class="col-md-6 col-lg-6 col-xxl-3">
        <div class="card d-flex">
            <img src="{{ $item->preview_image }}" alt="" style="border-radius: 7px 7px 0 0;height: 178px;object-fit: cover;">
            <div class="card-body">
                <div class="dropdown card-widgets">
                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="dripicons-dots-3"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('post-edit', $item->id) }}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>{{ __('Edit') }}</a>
                        <a data-bs-toggle="modal" href="#delete" data-id="{{ $item->id }}" role="button"
                           class="dropdown-item delete-button"> <i class="mdi mdi-delete me-1"></i>{{ __('Delete') }}</a>
                        @if($item->is_published == 0)
                            <a href="{{ route('post-publish', $item->id) }}" class="dropdown-item"><i class="mdi mdi-publish me-1"></i>{{ __('Publish') }}</a>
                        @endif
                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-share-variant me-1"></i>{{ __('Share') }}</a>
                    </div>
                </div>
                <h4 class="mt-0">
                    <a href="{{ route('post-show', $item->id) }}" class="text-title">{{ \Illuminate\Support\Str::limit($item->title, $limit = 18, $end = '') }}</a>
                </h4>
                @if($item->is_published == true)
                    <div class="badge bg-success mb-3"> {{ __('Published') }} </div>
                @else
                    <div class="badge bg-secondary mb-3"> {{ __('Unpublished') }} </div>
                @endif

                <p class="text-muted font-13 mb-3" style="height: 40px; overflow: hidden">{{ \Illuminate\Support\Str::limit($item->description, $limit = 45, $end = '...') }}
                    <a href="{{ route('post-show', $item->id) }}" class="fw-bold text-muted">{{ __('view more') }}</a>
                </p>

                <p class="mb-1 justify-content-between d-flex">
                    <span>
                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                            <i class="mdi mdi-eye text-muted"></i>
                            <b class="font-13">{{ $item->views }}</b>
                        </span>
                        <span class="text-nowrap mb-2 d-inline-block">
                            <i class="mdi mdi-calendar-clock text-muted"></i>
                            <b class="font-13">{{ $item->created_at->toDateTime()->format('d-m-Y') }}</b>
                        </span>
                    </span>
                    <span id="tooltip-container">
                        <img src="{{ $item->getUser()->avatar ?? url("storage/files/shares/Аватар/default-avatar.jpg?timestamp=1653539619") }}" class="rounded-circle avatar-xs me-1" alt="friend">
                        <a href="#" data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                           data-bs-placement="top"
                           title="{{ $item->getUser()->name ?? "noname" }}" class="d-inline-block text-muted">
                            {{  $item->getUser()->name ?? "noname"  }}
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>
@endforeach
