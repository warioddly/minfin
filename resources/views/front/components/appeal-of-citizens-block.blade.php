@foreach($items as $key => $item)
    <div class="mb-3">
        <div class="appeal_block">
            <div class="d-flex align-items-center justify-content-between mb-lg-4 mb-2">
                <p class="appeal-title">{{ $item->title }}</p>
                <p class="appeal-date text-muted">{{ $item->created_at->toDateTime()->format('d-m-Y H:m') }}</p>
            </div>
            <p class="appeal-body mb-lg-4 mb-2">{{ $item->content }}</p>
            <div class="d-flex align-items-center justify-content-between mb-lg-4 mb-2">
                <p class="appeal-category">{{ $item->category->title }}</p>
                <p class="appeal-views text-muted d-flex">
                    <i class="mdi mdi-eye me-1"></i>
                    122
                </p>
            </div>
            @if($item->answer != null)
                <div class="d-flex justify-content-end">
                    <button class="accordion-button @if($key != 0)collapsed @endif" type="button" data-bs-toggle="collapse"
                            data-bs-target="#answer_{{ $item->id }}" aria-expanded="true"
                            aria-controls="#answer_{{ $item->id }}">
                    </button>
                </div>
            @endif
        </div>

        @if($item->answer != null)
            <div id="answer_{{ $item->id }}"
             class="accordion-collapse collapse @if($key == 0)show @endif mt-3"
             aria-labelledby="answer_{{ $item->id }}">
            <div class="appeal_block appeal-answered-block">
                <div class="d-flex align-items-center justify-content-between mb-lg-4 mb-2">
                    <p class="appeal-title appeal-answer">
                        {{ __('Answer') }}
                    </p>
                    <p class="appeal-date text-muted">{{ $item->updated_at->toDateTime()->format('d-m-Y H:m') }}</p>
                </div>
                <p class="appeal-body mb-lg-4 mb-2">{{ $item->answer }}</p>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="appeal-category"> {{ $item->category->title }} </p>
                </div>
            </div>
        </div>
        @endif
    </div>
@endforeach
