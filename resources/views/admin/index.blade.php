@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Main"
        :breadcrumbs="['Main']"
    ></x-page-inform>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-6">

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
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">{{ __('Amount of category') }}</h5>
                            <h3 class="mt-3 mb-3">{{ $categoryCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="dripicons-checklist"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">{{ __('Amount of category') }}</h5>
                            <h3 class="mt-3 mb-3">{{ $categoryCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-7 col-lg-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title mb-3">Projections Vs Actuals</h4>

                    <div dir="ltr">
                        <div id="high-performing-product" class="apex-charts" data-colors="#536de6,#e3eaef"></div>
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

        @if(count($notes) != 0)
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
        @endif
    </div>
@endsection
