@foreach($items as $key => $item)
    <div class="col-md-12 col-lg-12 col new_block mb-lg-3 mb-2">
        <span class="p-0 d-flex">
            <a href="{{ route('front-post-show', $item->id) }}">
                <div class="position-relative me-2 me-md-2">
                    <img src="{{ $item->preview_image  }}" alt="" class="new_block__image">
                </div>
                <div class="position-relative">
                    <p class="new_block__date pb-2 pb-md-1">{{ $item->created_at->toDateTime()->format('d.m.Y') }}</p>
                    <p class="new_block__title d-block d-sm-none d-md-none d-md-none">{{ \Illuminate\Support\Str::limit($item->title , $limit = 55, $end = '...') }}</p>
                    <p class="new_block__title d-none d-sm-none d-md-block d-lg-block">
                        @for($i = 0; $i < 12; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                        <a href="{{ route('front-post-show', $item->id) }}" class="new_block__read_more">{{ __('read more') }}
                        </a>
                    </p>
                    <p class="new_block__title d-none d-sm-block d-md-none d-lg-none ">
                        @for($i = 0; $i < 35; $i++) {{ explode(" ", $item->description)[$i] ?? '' }}@endfor...
                        <a href="{{ route('front-post-show', $item->id) }}" class="new_block__read_more">{{ __('read more') }}
                        </a>
                    </p>
                    <p class="new_block__category bottom-0 ">{{ $item->category->title ?? '' }}</p>
                </div>
            </a>
        </span>
    </div>
@endforeach
