@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('show-tag', $tag) }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Tags"
        :breadcrumbs="['Tags']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ __('Tag statistic') }}</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <div id="circle-angle-radial" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ __('Popular news in this tag') }}</h5>
                </div>
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
    <h2 class="mt-2">{{ __('Related posts') }}</h2>
    <div class="row">
        <x-post-output-card :items="$posts"></x-post-output-card>
        {{ $posts->links() }}
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('/admin/js/vendor/apexcharts.min.js') }}"></script>

    <script>
        let data = [{{ count($posts) }}, {{ $posts->sum('views') }}];

        colors = ["#ffbc00", "#727cf5"];
        options = {
            chart: { height: 380, type: "radialBar" },
            plotOptions: { radialBar: { offsetY: -30, startAngle: 0, endAngle: 270, hollow: { margin: 5, size: "30%", background: "transparent", image: void 0 }, dataLabels: { name: { show: !1 }, value: { show: !1 } } } },
            colors: colors,
            series: data,
            labels: ["{{ __('Posts') }}", "{{ __('Views') }}"],
            legend: {
                show: !0,
                floating: !0,
                fontSize: "13px",
                position: "left",
                offsetX: 10,
                offsetY: 10,
                labels: { useSeriesColors: !0 },
                markers: { size: 0 },
                formatter: function (o, a) {
                    return o + ":  " + a.w.globals.series[a.seriesIndex];
                },
                itemMargin: { horizontal: 1 },
            },
            responsive: [{ breakpoint: 480, options: { legend: { show: !1 } } }],
        };
        (chart = new ApexCharts(document.querySelector("#circle-angle-radial"), options)).render();
    </script>
@endpush
