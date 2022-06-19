@foreach($items as $key => $item)
    @if($key == 4)
        </div>
    @elseif($key > 6)
        @break
    @endif
    @if($key < 3)
        @if($key == 0)
            <div class="row mb-3">
                <div class="col">
                    <div class="row g-3">
                        <div class="col-6">
                            <div  class="new__block">
                                <span class="new__image_overflow"></span>
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
            <div class="col-6">
                <div class="subsection_new">
                    @for($i = $key + 1; $i < $key + 3; $i++)
                        <a href="{{ route('front-post-show', $items[$i]->id) }}" class="d-grid">
                            @for($j = 0; $j < 9; $j++) {{ explode(" ", $items[$i]->title)[$j] ?? '' }} @endfor...
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
                        </a>
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
        <div class="col-4">
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
                <div class="col-8">
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
                <div class="col-4">
                @endif
                    <div class="subsection_new mb-3">
                    @for($i = $key + 1; $i < $key + 3; $i++)
                        <a href="{{ route('front-post-show', $items[$i]->id) }}" class="d-grid">
                            @for($j = 0; $j < 9; $j++) {{ explode(" ", $items[$i]->title)[$j] ?? '' }} @endfor...
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
                        </a>
                    @endfor
                </div>
                @if($key == 6)
                </div>
            </div>
        @endif
    @endif
@endforeach
