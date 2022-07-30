<div class="col-3 mb-4 position-relative">
    <div class="h-100 d-grid subsection_block">
        <a href="{{ route('front-post-show', $item->id) }}" class="subsection_new__block ">
            <div class="subsection_image__block">
                <img src="{{ $item->preview_image }}" alt="" class="subsection_image img-fluid">
            </div>
            <p class="subsection_new__title mb-3">
                @for($i = 0; $i < 7; $i++) {{ explode(" ", $item->title)[$i] ?? '' }}@endfor
            </p>
        </a>
        <div class="d-flex align-items-end">
            <p class="subsection_new__date text-muted">{{ $item->created_at->toDateTime()->format('d.m.Y') }}</p>
            <p class="subsection_new__category">{{ __($item->category->title  ?? '') }}</p>
        </div>
    </div>
</div>
