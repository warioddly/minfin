<div class="table-responsive">
    <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="x-datatable">
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

                        @if($key == 'name' && $type == 'roles')
                            <td class="table-user">
                                <a href="#" class="text-body fw-semibold" target="_blank">
                                    {{ \Illuminate\Support\Str::limit(__($item->name) , $limit = 35, $end = '...') }}
                                </a>
                            </td>
                            @continue
                        @endif
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

                        @if($key == 'title'&& $type == 'posts')
                            <td >
                                <a href="@if($showLinks){{ route($links[1], $item->id) }}@elseif($links[1]){{ route($links[1], $item->id) }}@endif" class="text-body fw-semibold">
                                    {{ \Illuminate\Support\Str::limit( $item->title , $limit = 35, $end = '...') }}
                                </a>
                            </td>
                            @continue
                        @endif

                        @if($key == 'message')
                            <td >
                                <a href="@if($showLinks){{ route($links[1], $item->id) }}@elseif($links[1]){{ route($links[1], $item->id) }}@endif" class="text-body fw-semibold">
                                    {{ \Illuminate\Support\Str::limit( $item->message , $limit = 35, $end = '...') }}
                                </a>
                            </td>
                            @continue
                        @endif

                        @if($key == 'title')
                            <td >
                                <a href="@if($showLinks){{ route($links[1], $item->id) }}@elseif($links[1]){{ route($links[1], $item->id) }}@endif" class="text-body fw-semibold">
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

                        @if($key == 'created_at')
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
                    @if($withactions)
                        <td class="d-flex">
                        @if(in_array('1', $actions))
                            <a href="@if($links[1]){{ route($links[1], $item->id) }} @else#view @endif"
                               @if(!$links[0]) data-bs-toggle="modal" data-id="{{ $item->id }}" role="button" @endif
                               class="action-icon view-button"><i class="mdi mdi-eye"></i>
                            </a>
                        @endif
                        @if(in_array('2', $actions))
                            <a href="@if($links[2]){{ route($links[2], $item->id) }} @else#edit @endif"
                               @if(!$links[2]) data-bs-toggle="modal" data-id="{{ $item->id }}" @if($item->title) data-title="{{ $item->title }}" @endif role="button" @endif
                               class="action-icon edit-button"><i class="mdi mdi-square-edit-outline"></i>
                            </a>
                        @endif
                        @if(in_array('3', $actions))
                            <a data-bs-toggle="modal" href="#delete" data-id="{{ $item->id }}" role="button"
                               class="action-icon delete-button"> <i class="mdi mdi-delete"></i></a>
                        @endif
                    </td>
                    @endif

            @endforeach
        </tbody>
    </table>
</div>


@push('head-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/admin/plugins/DataTables/css/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/plugins/bootstrap/css/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <style>
        div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate{
            text-align: end !important;
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="{{ asset('/admin/plugins/DataTables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.bootstrap5.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('#x-datatable').DataTable({
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
