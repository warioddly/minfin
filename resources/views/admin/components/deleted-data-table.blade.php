<div class="table-responsive">
    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap " id="{{ $id }}-datatable">
        <thead class="table-light">
        <tr>
            @foreach($items as $key => $item)
                @foreach(array_keys($item->toArray()) as $index => $column)

                    @if(!in_array($column, $excepts))

                        @if($index == 1)
                            <th data-priority="1" class="text-capitalize">{{ __($column) }}</th>
                            @continue
                        @endif
                        @if($column == 'views' && $type == 'category')
                            <th class="text-capitalize">{{ __('Amount of posts') }}</th>
                            @continue
                        @endif
                        <th class="text-capitalize">{{ __($column) }}</th>
                    @endif
                @endforeach
                @break
            @endforeach
            @if($withactions)
            <th style="width: 75px;" data-priority="2" data-orderable="false">{{ __('Action') }}</th>
            @endif
        </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
                <tr>
                    @foreach($item->toArray() as $key => $value)

                        @if($key == 'name')
                            <td class="table-user">
                                @if($item->avatar)
                                    <img src="{{ $item->avatar }}" alt="table-user" class="me-2 rounded-circle" style="object-fit: cover">
                                @endif
                                <a href="@if($links[0]){{ route($links[0], $item->id) }}@endif"
                                   class="text-body fw-semibold">
                                    @if(strlen($item->last_name) > 12)
                                        {{ \Illuminate\Support\Str::limit($item->last_name, $limit = 1, $end = '.') }}
                                        {{ \Illuminate\Support\Str::limit($item->name, $limit = 13, $end = '...')  }}
                                    @else
                                        {{ $item->last_name }} {{ \Illuminate\Support\Str::limit($item->name, $limit = 13, $end = '...')  }}
                                    @endif
                                </a>
                            </td>
                            @continue
                        @endif

                        @if($key == 'title' && $type == 'documents')
                            <td class="table-user">
                                @if(in_array($item->extension, ['img', 'svg', 'image', 'ico', 'jpeg', 'gif']))
                                    <img src="{{ $item->path }}" alt="..." class="me-2 rounded-circle" style="object-fit: cover">
                                @else
                                    <i class="mdi mdi-file-document-outline font-24 me-2" ></i>
                                @endif
                                <a href="{{ $item->path }}" class="text-body fw-semibold" target="_blank">
                                    {{ \Illuminate\Support\Str::limit(__($item->title) , $limit = 35, $end = '...') }}
                                </a>
                            </td>
                            @continue
                        @endif

                        @if($key == 'title')
                            <td >
                                <a href="#" class="text-body fw-semibold">
                                    {{ \Illuminate\Support\Str::limit(__($item->title) , $limit = 35, $end = '...') }}
                                </a>
                            </td>
                            @continue
                        @endif

                        @if($key == 'publisher_id')
                            <td>{{ __($item->publisher->title ?? '') }}</td>
                            @continue
                        @endif


                        @if($key == 'category_id')
                                <td>{{ __($item->category->title) }}</td>
                                @continue
                        @endif

                        @if($key == 'user_id')
                                <td>{{ $item->getUserName($value) }}</td>
                                @continue
                        @endif

                        @if($key == 'deleted_at')
                            <td>{{ $item->created_at->toDateTime()->format('d-m-Y') }}</td>
                            @continue
                        @endif

                        @if($key == 'size')
                                <td>
                                    <span class="text-muted">{{ $value }}</span> <strong>kb</strong>
                                </td>
                            @continue
                        @endif

                        @if($key == 'views' && $type == 'category')
                            <td>
                                {{ count($item->posts) }}
                            </td>
                            @continue
                        @endif

                        @if($key == 'status')
                            <td>
                                @if($value == 'active')
                                    <span class="badge badge-success-lighten">{{ __('active')  }}</span>
                                @elseif($value == 'offline')
                                    <span class="badge badge-secondary-lighten">{{ __('offline')  }}</span>
                                @else
                                    <span class="badge badge-danger-lighten">{{ __('banned')  }}</span>
                                @endif
                            </td>
                            @continue
                        @endif

                        @if(!in_array($key, $excepts))
                            <td>
                                {{ __($value) }}
                            </td>
                        @endif

                    @endforeach
                    <td class="d-flex justify-content-center">
                        <a data-bs-toggle="modal" href="#restore" role="button"
                           data-id="{{ $item->id }}" data-restore-url="@if($links[1]){{ route($links[1], '') }}@endif"
                           class="action-icon restore-button font-22 me-2 text-success"><i class="mdi mdi-cached"></i>
                        </a>
                        <a data-bs-toggle="modal" href="#delete" role="button"
                           data-id="{{ $item->id }}" data-recover-url="@if($links[1]){{ route($links[1], '') }} @endif"
                           class="action-icon delete-button font-20"><i class="dripicons-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('footer-scripts')
    <script>
        $(document).ready( function () {
            $('#{{ $id }}-datatable').DataTable({
                responsive: true,
                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                    },
                ],
                "ordering": {{ $orederable }},
                "bLengthChange" : false,
                "pageLength": 10,
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                },
            });
        });
    </script>
@endpush
