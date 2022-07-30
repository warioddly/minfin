@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('dashboard') }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Main"
        :breadcrumbs="['Main']"
    ></x-page-inform>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="uil-rss"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">{{ __('Amount of posts') }}</h5>
                            <h3 class="mt-3 mb-3">{{ $postsCount }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"></i> {{ substr($viewsPercent, 0, 8) }}%</span>
                                <span class="text-nowrap">{{ __('Views for the current month') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="dripicons-checklist"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">{{ __('Total post views') }}</h5>
                            <h3 class="mt-3 mb-4">{{ $postViewsCount }}</h3>
                            <p class="mb-1 text-muted">
                                <span class="text-nowrap">{{ __('Data for the current month') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-file-document"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">{{ __('Amount of documents') }}</h5>
                            <h3 class="mt-3 mb-3">{{ $documentCount }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">{{ __('Documents') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-fit-to-page"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">{{ __('Latest page') }}</h5>
                            <h3 class="mt-3 mb-3">{{ \Illuminate\Support\Str::limit(__($latestPage->title), $limit=14) }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"></i> {{ __('Page') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-2 mb-3">{{ __('Appeal of citizens') }}</h4>

                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th class="d-none d-xl-table-cell">{{ __('Author') }}</th>
                            <th class="d-none d-xl-table-cell">{{ __('Appeal') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($appeals as $appeal)
                            <tr class='post-row' data-href="{{ route('show-appeal', $appeal->id) }}">
                                <td><a href="{{ route('show-appeal', $appeal->id) }}" class="text-secondary ">{{ \Illuminate\Support\Str::limit($appeal->title, $limit = 35, $end = '...') }}</a></td>
                                <td class="d-none d-xl-table-cell">{{ $appeal->name }} {{ $appeal->last_name }}</td>
                                <td class="d-none d-xl-table-cell">{{ $appeal->created_at->toDateTime()->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mt-4 mt-lg-0">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-2 mb-3">{{ __('Popular news') }}</h4>

                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>{{ __('Post title') }}</th>
                            <th class="d-none d-xl-table-cell">{{ __('Amount of view') }}</th>
                            <th class="d-none d-xl-table-cell">{{ __('Author') }}</th>
                            <th class="d-none d-xl-table-cell">{{ __('Created date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($popularPosts as $post)
                            <tr class='post-row' data-href="{{ route('post-show', $post->id) }}">
                                <td><a href="{{ route('post-show', $post->id) }}" class="text-secondary ">{{ \Illuminate\Support\Str::limit($post->title, $limit = 35, $end = '...') }}</a></td>
                                <td class="d-none d-xl-table-cell">{{ $post->views }}</td>
                                <td class="d-none d-xl-table-cell">{{ $post->getUserName($post->user_id) }}</td>
                                <td class="d-none d-xl-table-cell">{{ $post->created_at->toDateTime()->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-2">{{ __('Notes') }}</h4>

                        <div data-simplebar style="max-height: 419px;">
                            <div class="timeline-alt pb-0">
                                @foreach($notes as $note)
                                    <div class="timeline-item">
                                        <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                                        <div class="timeline-item-info">
                                            <a href="#" class="text-info fw-bold mb-1 d-block">{{ \Illuminate\Support\Str::limit($note->note, $limit=7, $end="...") }}</a>
                                            <small>{{ $note->note }}</small>
                                            <p class="mb-0 pb-2">
                                                <small class="text-muted">{{ Carbon\Carbon::parse($note->created_at)->format('H:i:s') }}</small>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('head-scripts')
    <link href="{{ asset('admin/plugins/Calendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('footer-scripts')
    <script src="{{ asset('admin/plugins/Calendar/fullcalendar.min.js') }}"></script>
    <script>
        var event={id:1 , title: 'New event', start:  new Date()};
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ru',
                displayEventTime: false,
                editable: false,
                events: @json($calendarData),
                selectable: true,
                selectHelper: true,
                droppable: false
            });
            calendar.render();
        });
    </script>

@endpush
