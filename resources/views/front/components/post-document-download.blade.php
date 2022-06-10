@foreach($items as $item)
    <div class="row align-items-center">
        <div class="col-lg-1">
            @if(in_array($item->extension, ['img', 'svg', 'image', 'ico', 'jpeg', 'gif']))
                <img data-dz-thumbnail src="{{ $item->path }}" class="avatar-sm rounded bg-light " style="object-fit: cover" alt="">
            @else
                <i class="mdi mdi-file-document-outline font-24 px-2" ></i>
            @endif
        </div>
        <div class="col-lg-1">
            <p class="">{{ $item->extension }}</p>
        </div>
        <div class="col-lg-1 ">
            <p class="text-center">{{ $item->size }}MB</p>
        </div>
        <div class="col-lg-3 col-md-2 col-3">
            <p class="post_document_name">{{ __($item->title) }}</p>
        </div>
        <div class="col-lg-3 text-end ">
            <a href="{{ $item->path }}" target="_blank" class="post_document__download-link">{{ __('Download') }}</a>
        </div>
    </div>
@endforeach
