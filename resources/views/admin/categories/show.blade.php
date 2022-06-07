@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Categories"
        :breadcrumbs="['Categories']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">{{ __('Category statistic') }}</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <canvas id="chartjs-dashboard-pie"></canvas>
                            </div>
                        </div>

                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td>{{ __('Amount of posts') }}</td>
                                <td class="text-end">{{ count($category->posts) }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Total post views') }}</td>
                                <td class="text-end">{{ $category->TotalPostViews() }}</td>
                            </tr>
                            <tr>
                                <td>IE</td>
                                <td class="text-end">1689</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ __('Popular news in this category') }}</h5>
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
                                <td>{{ \Illuminate\Support\Str::limit($post->title, $limit = 35, $end = '...') }}</td>
                                <td class="d-none d-xl-table-cell">{{ $post->views }}</td>
                                <td class="d-none d-xl-table-cell">{{ $post->author }}</td>
                                <td class="d-none d-xl-table-cell">{{ $post->created_at->toDateTime()->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="mt-2">Связанные посты</h2>
    <div class="row">
        <x-post-output-card :items="$posts"></x-post-output-card>
    </div>
@endsection

@push('footer-scripts')
    <script src="{{ asset('admin/js/vendor/Chart.bundle.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["{{ __('Amount of posts') }}", "{{ __('Total post views') }}", "IE"],
                    datasets: [{
                        data: [{{ count($category->posts) }}, {{ $category->TotalPostViews() }}, 4],
                        backgroundColor: [ '#3edcd9', '#ba0909', '#e59d36' ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>
@endpush
