@foreach($items as $item)
    <div class="row align-items-center justify-content-between py-2 mb-2">
        <div class="col-1 me-2 m-lg-0">
            <img src="{{ asset('front/images/icons/document.svg') }}" class="document-image" style="object-fit: cover" alt="">
        </div>
        <div class="col-1">
            <p class="document-text">{{ $item->extension }}</p>
        </div>
        <div class="col-2">
            <p class="text-center document-size document-text">{{ \Illuminate\Support\Str::limit($item->size, $limit=5, $end='') }}kB</p>
        </div>
        <div class="col-4 me-1">
            <p class="post_document_name">{{ \Illuminate\Support\Str::limit($item->title, $limit=18, $end='...') }}</p>
        </div>
        <div class="col-3 text-end ">
            <a href="{{ $item->path }}" target="_blank" class="post_document__download-link" download>{{ __('Download') }}</a>
        </div>
    </div>
@endforeach
