@foreach($items as $key => $item)
    <div class="col-4 d-flex justify-content-center">
        <div class="card new_card__block">
            <img src="{{ $item->preview_image }}" class="card-img-top" alt="...">
            <div class="card-body">
               <div class="pb-1 d-flex justify-content-between">
                   <p class="post_date">{{ $item->created_at->toDateTime()->format('d.m.Y') }}</p>
                   <div class="d-flex">
                       <i class="mdi mdi-eye text-muted me-1 align-items-center"></i>
                       <p class="post_date">{{ $item->views }}</p>
                   </div>
               </div>
                <h5 class="card-title post_title pb-2">@for($i = 0; $i < 10; $i++) {{ explode(" ", $item->title)[$i] ?? '' }}@endfor...</h5>
                <p class="post_description">@for($i = 0; $i < 15; $i++) {{ explode(" ", $item->description)[$i] ?? '' }}@endfor
                    <a href="{{ route('front-post-show', $item->id) }}" class="read_more">{{ __('read more') }}</a>
                </p>
            </div>
        </div>
    </div>
@endforeach
