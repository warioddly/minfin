@foreach($items as $key => $item)
    <div class="col-12 col-md-6 col-lg-6 col news_block">
        <div class="d-flex new_block mb-lg-3 mb-2">
            <a href="{{ route('front-post-show', $item->id) }}" class="p-0 d-contents">
                <img src="{{ $item->preview_image  }}" alt="" class="new_block__image">
                <div class="position-relative new_text-information">
                    <p class="new_block__date pb-1 pb-lg-2 pb-md-1 pt-2"></p>
                    <div class="new_block__title d-block d-sm-none d-md-none d-md-none">
                        @for($i = 0; $i < 6; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                        <div class="new_block__read_more" >{{ __('read more') }}</div>
                    </div>
                    <span class="new_block__title d-none d-sm-block d-md-block d-lg-block">
                                        @for($i = 0; $i < 11; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...<span class="new_block__read_more" >{{ __('read more') }}</span>
                                    </span>
                    <a href="#" class="new_block__category bottom-0 pb-2">{{ __($item->category->title) }}</a>
                </div>
            </a>
        </div>
    </div>
@endforeach
