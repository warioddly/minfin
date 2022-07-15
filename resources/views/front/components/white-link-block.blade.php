@foreach($items as $key => $item)
    <div class="col-lg-4 col-md-6 col-12">
        <a href="{{ route('front-page-show', $item->id) }}" class="white_block_links d-flex pe-1" >
            @if($item->icon_type == 'mdi')
                <i class="mdi {{ $item->icon }} py-3 ms-2 ms-lg-3 me-2 d-flex white-link-block-icon"></i>
            @else
                <img src="{{ $item->icon }}" alt="..." class="me-3 ms-3 rounded">
            @endif
            {{ __($item->title) }}
        </a>
    </div>
@endforeach
