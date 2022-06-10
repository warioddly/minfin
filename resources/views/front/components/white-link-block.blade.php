@foreach($items[0]->ChildPages as $key => $item)
    <div class="col-lg-4 col-md-6 col-12">
        <a href="#" class="links d-flex " >
            <img src="{{ $item->icon }}" alt="..." class="me-3 ms-3 rounded">
            {{ __($item->title) }}
        </a>
    </div>
@endforeach
