@if(count($items) == 1)
    <div class="new__block">
        <span class="new__image_overflow"></span>
        <img src="{{ $items[0]->preview_image }}" alt="" class="img-fluid new__image">
        <div class="new_information position-absolute bottom-0 py-4">
            <a href="{{ route('front-post-show',  $items[0]->id) }}" class="new_title mb-3"
             @if($textSize == 'large') style="font-size: clamp(1.4375rem, 0.7150919732441472rem + 1.5050167224080269vw, 2rem) !important;" @endif
            >
                @for($i = 0; $i < 9; $i++) {{ explode(" ",  $items[0]->title)[$i] ?? '' }} @endfor...
            </a>
            <div class="d-flex">
                <p class="new_date me-3"></p>
                <p class="new_category">{{  __($items[0]->category->title) ?? '' }}</p>
            </div>
        </div>
    </div>
@else
    <div class="subsection_new">
        <div class="d-grid">
            <a href="{{ route('front-post-show', $items[0]->id) }}" class="">
                    <span>
                        @for($j = 0; $j < 9; $j++) {{ explode(" ", $items[0]->title)[$j] ?? '' }}@endfor...
                        <span class="new_block__read_more">{{ __('read more') }}</span>
                    </span>
            </a>
            <div class="d-flex justify-content-between align-items-end ">
                <div class="d-flex align-items-end">
                    <p class="new_date me-3"></p>
                    <p class="new_category">{{ __($items[0]->category->title) ?? ''}}</p>
                </div>
                <div class="text-muted new_date">
                    <i class="mdi mdi-eye-check pe-2 mt-2"></i><span>{{ $items[0]->views }}</span>
                </div>
            </div>
            <hr class="m-2 ms-0 me-2"/>

            <a href="{{ route('front-post-show', $items[1]->id) }}" class="">
                <span>
                    @for($j = 0; $j < 9; $j++) {{ explode(" ", $items[1]->title)[$j] ?? '' }}@endfor...
                    <span class="new_block__read_more">{{ __('read more') }}</span>
                </span>
            </a>
            <div class="d-flex justify-content-between align-items-end ">
                <div class="d-flex align-items-end">
                    <p class="new_date me-3"></p>
                    <p class="new_category">{{ __($items[1]->category->title) ?? ''}}</p>
                </div>
                <div class="text-muted new_date">
                    <i class="mdi mdi-eye-check pe-2 mt-2"></i><span>{{ $items[1]->views }}</span>
                </div>
            </div>
        </div>
    </div>
@endif






