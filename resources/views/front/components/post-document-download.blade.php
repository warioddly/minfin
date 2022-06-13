@foreach($items as $item)
    <div class="row align-items-center py-2 mb-2">
        <div class="col-lg-1">
            <img src="{{ asset('front/images/icons/document.svg') }}" class="document-image" style="object-fit: cover" alt="">
        </div>
        <div class="col-lg-1">
            <p class="document-text">{{ $item->extension }}</p>
        </div>
        <div class="col-2">
            <p class="text-center document-size document-text">{{ \Illuminate\Support\Str::limit($item->size, $limit=5, $end='') }}MB</p>
        </div>
        <div class="col-lg-3 col-md-2 col-3">
            <p class="post_document_name">{{ \Illuminate\Support\Str::limit($item->title, $limit=18, $end='...') }}</p>
        </div>
        <div class="col-lg-3 text-end ">
            <a href="{{ $item->path }}" target="_blank" class="post_document__download-link" download>{{ __('Download') }}</a>
        </div>
    </div>
@endforeach
