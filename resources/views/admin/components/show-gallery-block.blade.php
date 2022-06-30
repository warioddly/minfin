@foreach($item->galleries as $image)
    <div class="col-md-6 col-xxl-3 preview_boxes">
        <div class="card d-block">

            <img class="card-img-top" src="{{ $image->thumbnail_image }}" alt="project image cap">
            <div class="card-img-overlay ">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="badge bg-secondary text-light p-1">{{ $image->size }} kb</div>
                </div>
            </div>

            <div class="card-body position-relative pb-1 pt-2">
                <h4 class="mt-0">
                    <a href="{{ $image->full_size_image }}" class="text-title" target="_blank">{{ \Illuminate\Support\Str::limit($image->title, $limit=30) }}</a>
                </h4>
                <div class="d-flex justify-content-end cursor-pointer">
                    <h4 class="mt-0 remove-gallery-file-btn" style="cursor: pointer" data-id="{{ $image->id }}">
                        <span class="text-title me-2"><i class="dripicons-trash"></i></span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endforeach
