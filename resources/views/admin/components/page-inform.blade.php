@section('title-page')
    @foreach(array_reverse($breadcrumbs) as $item)
        {{ __($item)  }} |
    @endforeach
@endsection

<div class="page-title-box">
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Main') }}</a></li>
            @foreach($breadcrumbs as $key => $breadcrumb)
                @if($key + 1 == count($breadcrumbs))
                    <li class="breadcrumb-item active"> {{ \Illuminate\Support\Str::limit(__($breadcrumb), $limit = 25, $end = '...')  }} </li>
                    @break
                @endif
                <li class="breadcrumb-item">{{ \Illuminate\Support\Str::limit(__($breadcrumb), $limit = 25, $end = '...')  }}</li>
            @endforeach
        </ol>
    </div>
</div>
<h4 class="page-title">{{ __($title)  }}</h4>
