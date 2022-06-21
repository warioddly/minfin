@foreach($items as $key => $item)
    @if($key == 4)
        </div>
    @elseif($key > 6)
        @break
    @endif
    @if($key < 3)
        @if($key == 0)
            <div class="row mb-3">
                <div class="col mb-3 mb-md-3 mb-lg-0 pe-md-0 pe-lg-2">
                    <div class="row g-2 g-lg-3 g-md-2">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div  class="new__block ">
                                <span class="new__image_overflow "></span>
                                <img src="{{ $item->preview_image }}" alt="" class="img-fluid new__image">
                                <div class="new_information position-absolute bottom-0 py-4">
                                    <a href="{{ route('front-post-show', $item->id) }}" class="new_title mb-3">
                                        @for($i = 0; $i < 9; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                                    </a>
                                    <div class="d-flex">
                                       <p class="new_date me-3">{{ $item->created_at->toDateTime()->format('d.m.Y') }}</p>
                                       <p class="new_category">{{ $item->category->title }}</p>
                                   </div>
                                </div>
                            </div>
                        </div>
        @endif
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                <div class="subsection_new">
                    @for($i = $key + 1; $i < $key + 3; $i++)
                        <div class="d-grid">
                            <a href="{{ route('front-post-show', $items[$i]->id) }}" class="">
                                <span>
                                    @for($j = 0; $j < 9; $j++) {{ explode(" ", $items[$i]->title)[$j] ?? '' }}@endfor...
                                    <span class="new_block__read_more">{{ __('read more') }}</span>
                                </span>
                            </a>
                            <div class="d-flex justify-content-between align-items-end ">
                                <div class="d-flex align-items-end">
                                    <p class="new_date me-3">{{ $items[$i]->created_at->toDateTime()->format('d.m.Y') }}</p>
                                    <p class="new_category">{{ $items[$i]->category->title }}</p>
                                </div>
                                <div class="text-muted new_date">
                                    <i class="mdi mdi-eye-check pe-2 mt-2"></i><span>{{ $items[$i]->views }}</span>
                                </div>
                            </div>
                            @if($i == $key + 1)
                                <hr class="m-2 ms-0 me-2"/>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        @if($key > 1)
                </div>
            </div>
        @endif
        @continue
    @endif
    @if($key < 4)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="new__block position-relative">
                <span class="new__image_overflow"></span>
                <img src="{{ $item->preview_image }}" alt="..." class="new__image">
                <div class="new__text-information position-absolute">
                    <a href="{{ route('front-post-show', $item->id) }}" class="new__title">
                        @for($i = 0; $i < 12; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                    </a>

                    <span class="d-flex">
                        <div class="new__date me-4 ">{{ $item->created_at->toDateTime()->format('d.m.Y H:s') }}</div>
                        <div class="new__category ">{{ $item->category->title }}</div>
                </span>
            </div>
        </div>
    </div>
    @endif
    @if($key > 4 && $key < 7)
        @if($key == 5)
            <div class="row">
                <div class="d-none d-md-block col-12 col-md-6 col-lg-8 mb-3 mb-sm-3 mb-lg-0">
                    <div class="new__block second-row position-relative">
                        <span class="new__image_overflow"></span>
                        <img src="{{ $item->preview_image }}" alt="..." class="new__image">
                        <div class="new__text-information position-absolute">
                            <a href="{{ route('front-post-show', $item->id) }}" class="new__title">
                                @for($i = 0; $i < 12; $i++) {{ explode(" ", $item->title)[$i] ?? '' }} @endfor...
                            </a>
                            <span class="d-flex">
                            <div class="new__date me-4 ">{{ $item->created_at->toDateTime()->format('d.m.Y H:s') }}</div>
                            <div class="new__category ">{{ $item->category->title }}</div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-3 mb-sm-3 mb-lg-0">
                    <div class="row g-3">
                @endif
                    <div class="col-12">
                        <div class="subsection_new">
                            @for($i = $key + 1; $i < $key + 3; $i++)
                                <div class="d-grid">
                                    <a href="{{ route('front-post-show', $items[$i]->id) }}" class="">
                                    <span>
                                        @for($j = 0; $j < 9; $j++) {{ explode(" ", $items[$i]->title)[$j] ?? '' }}@endfor...
                                        <span class="new_block__read_more">{{ __('read more') }}</span>
                                    </span>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-end">
                                            <p class="new_date me-3">{{ $items[$i]->created_at->toDateTime()->format('d.m.Y') }}</p>
                                            <p class="new_category">{{ $items[$i]->category->title }}</p>
                                        </div>
                                        <div class="text-muted new_date">
                                            <i class="mdi mdi-eye-check pe-2 mt-2"></i><span>{{ $items[$i]->views }}</span>
                                        </div>
                                    </div>
                                    @if($i == $key + 1)
                                        <hr class="m-2 ms-0 me-2"/>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                @if($key == 6)
                    </div>
                </div>
            </div>
        @endif
    @endif
@endforeach
