@foreach($items as $key => $item)
    <div class="col-md-12 col-lg-12 col new_block mb-lg-3 mb-2">
        <span class="p-0 d-flex">
            <img src="{{ $item->preview_image  }}" alt="" class="new_block__image">
            <div class="position-relative new_text-information">
                <p class="new_block__date pb-1 pb-lg-2 pb-md-1 pt-2">{{ $item->created_at->toDateTime()->format('d.m.Y H:s') }}</p>
                <p class="new_block__title d-block d-sm-none d-md-none d-md-none">
                    @for($i = 0; $i < 6; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                    <a class="new_block__read_more" href="{{ route('front-post-show', $item->id) }}">{{ __('read more') }}</a>
                </p>
                <p class="new_block__title d-none d-sm-block d-md-block d-lg-block">
                    @for($i = 0; $i < 11; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                    <a class="new_block__read_more" href="{{ route('front-post-show', $item->id) }}">{{ __('read more') }}</a>
                </p>
                <p class="new_block__category bottom-0 pb-2">{{ __($item->category->title) }}</p>
            </div>
        </span>
    </div>
@endforeach
