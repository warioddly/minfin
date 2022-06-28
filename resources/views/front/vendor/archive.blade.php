@extends('front.layouts.app')

@section('content-title'){{ __('Ministry of Finance of the Kyrgyz Republic') }}@endsection

@section('content')
    <section id="head-information" class="mb-4">
        <div class="container">
            <div class="row mt-4 mb-3">
                <div class="col">
                    {{ Breadcrumbs::render('Contacts') }}
                </div>
            </div>
            <div class="d-flex align-items-center">
                <p class="header-text mb-3">{{ __('Archive') }}</p>
            </div>
        </div>
    </section>
    <section id="third-post-subsection" class="mb-3 mb-md-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-sm-2">
                    <form action="{{ route('archive-with-month') }}" method="GET" class="archive-form">
                        @csrf
                        @php
                            foreach ($archives as $item){
                                $years[] = $item['year'];
                            }
                            $years = array_unique($years);

                            $month = [
                                    'January',
                                    'February',
                                    'March',
                                    'April',
                                    'May',
                                    'June',
                                    'July',
                                    'August',
                                    'September',
                                    'October',
                                    'November',
                                    'December',
                                ]
                        @endphp
                        <div class="form-group d-flex">
                            <select name="month" class="archive-select ask-question-select me-2">
                                @for($i = 0; $i < count($month); $i++) {

                                    @if(now()->format('F') == $month[$i])
                                        <option value="{{ $month[$i] }}" selected>{{ __($month[$i]) }}</option>
                                        @continue
                                    @endif
                                    <option value="{{ $month[$i] }}">{{ __($month[$i]) }}</option>
                                @endfor
                            </select>

                            <select name="year" class="archive-select me-2">
                                @for($i = 0; $i < count($years); $i++) {

                                    @if(now()->format('Y') == $years[$i])
                                        <option value="{{ $years[$i] }}" selected>{{ $years[$i] }}</option>
                                        @continue
                                    @endif
                                    <option value="{{ $years[$i] }}">{{ $years[$i] }}</option>
                                @endfor
                            </select>
                            <button type="submit" class="ask-question-btn">{{ __("Show") }}</button>

                        </div>
                    </form>
                </div>
            </div>
            <div>
                @if(count($posts) == 0)
                    <p class="header-text border-0 p-0 text-center">{{ __('No posts found') }}!</p>
                @endif
                <x-all-post-page-blocks :items="$posts"></x-all-post-page-blocks>
                <div class="pagination-block">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
