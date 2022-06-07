<div class="col-sm-4">
    <a data-bs-toggle="modal" href="#create" role="button"
       class="btn btn-primary mb-2"> <i class="{{ $icon }} me-1"></i> {{ __($create) }}
    </a>
</div>
<div class="col-sm-8">
    @if($rightSide == 'export')
        <div class="text-sm-end">
            <button type="button" class="btn btn-light mb-2">Export</button>
        </div>
    @endif
</div>
