<h4 class="header-title mb-3">{{ __('Page structure') }}</h4>
<div id="jstree-2">
    <ul>
        <li data-jstree='{ "icon" : "dripicons-home text-success", "opened": true }'>
            <a href="{{ route('pages') }}"> {{ __('Main page') }}</a>
            @foreach($mainPages as $mainPage)
                <ul>
                    <li data-jstree='{ @if($pageIs == $mainPage->id)"opened" : true, "selected": true @else "opened" : false, @endif }'>
                        <a href="{{ route('show-pages', $mainPage->id) }}">{{ __($mainPage->title) }}</a>
                        @forelse($mainPage->ChildPages ?? [] as $secondChild)
                            <ul>
                                <li data-jstree='{ "disabled" : false @if($secondChild->type == '0'), "type" : "file" @endif
                                    @if($pageIs == $secondChild->id) ,"opened" : true, "selected": true @else ,"opened" : false @endif
                                    }'>
                                    <a href="{{ route('show-pages', $secondChild->id) }}">{{ \Illuminate\Support\Str::limit(__($secondChild->title), $limit = 10, $end = '...') }}</a>
                                    @forelse($secondChild->ChildPages ?? [] as $thirdChild)
                                        <ul>
                                            <li data-jstree='{ "disabled" : false @if($thirdChild->type == '0'), "type" : "file" @endif
                                            @if($pageIs == $thirdChild->id) ,"opened" : true, "selected": true @else ,"opened" : false @endif
                                                }'>
                                                <a href="{{ route('show-pages', $thirdChild->id) }}">{{ \Illuminate\Support\Str::limit(__($thirdChild->title), $limit = 10, $end = '...') }}</a>
                                                @forelse($thirdChild->ChildPages ?? [] as $fourthChild)
                                                    <ul>
                                                        <li data-jstree='{ "disabled" : false @if($fourthChild->type == '0'), "type" : "file" @endif }'>
                                                            <a href="{{ route('show-pages', $fourthChild->id) }}">{{ \Illuminate\Support\Str::limit(__($fourthChild->title), $limit = 10, $end = '...') }}</a>
                                                        </li>
                                                    </ul>
                                                @empty
                                                @endforelse
                                            </li>
                                        </ul>
                                    @empty
                                    @endforelse
                                </li>
                            </ul>
                        @empty
                        @endforelse
                    </li>
                </ul>
            @endforeach
        </li>
    </ul>
</div>

@push('head-scripts')
    <link rel="stylesheet" href="{{ asset('admin/plugins/Jstree/jstree.min.css') }}" />
@endpush

@push('footer-scripts')
    <script src="{{ asset('admin/plugins/Jstree/jstree.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/Jstree/demo.jstree.js') }}"></script>
@endpush
