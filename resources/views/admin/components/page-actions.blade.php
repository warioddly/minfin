<div class="col-sm-4">
    <a data-bs-toggle="modal" href="#create" role="button"
       class="btn btn-primary mb-2"> <i class="{{ $icon }} me-1"></i> {{ __($create) }}
    </a>
</div>
<div class="col-sm-8 text-end">
    @if($rightSide == 'typeInCategory')
        <div class="btn-group mb-3 ms-1">
            <a href="{{ route('isCategory', 'category') }}" class="btn @if(session('categoryView') == true)btn-primary  @else btn-light @endif">{{ __('Categories') }}</a>
            <a href="{{ route('isCategory', 'publisher') }}" class="btn @if(session('categoryView') == false)btn-primary  @else btn-light @endif">{{ __('Publishers') }}</a>
        </div>
    @endif
</div>
