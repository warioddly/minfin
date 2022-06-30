@foreach($items as $item)
    @if(count($item->galleries) != 0)
        <div class="col-md-6 col-xxl-3 preview_boxes">
            <div class="card d-block">

                <img class="card-img-top" src="{{ $item->preview_image }}" alt="project image cap">
                <div class="card-img-overlay ">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="badge bg-secondary text-light p-1">{{ count($item->galleries) }} {{ __('photo') }}</div>
                        <span class="badge text-nowrap bg-secondary p-1">
                            <i class="mdi mdi-eye"></i>
                            <b>{{ $item->views }}</b> {{ __('viewers') }}
                        </span>
                    </div>
                </div>

                <div class="card-body position-relative pb-1 pt-2">
                    <h4 class="mt-0">
                        <a href="{{ route('show-gallery', $item->id) }}" class="text-title">{{ \Illuminate\Support\Str::limit($item->title, $limit=30) }}</a>
                    </h4>
                </div>
            </div>
        </div>
    @endif
@endforeach
