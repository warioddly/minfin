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
                    <form action="" method="GET">
                        <div class="form-group d-flex">
                            <select name="Month" class="archive-select">
                                <option value="January">{{ __('January') }}</option>
                                <option value="February">{{ __('February') }}</option>
                                <option value="March">{{ __('March') }}</option>
                                <option value="April">{{ __('April') }}</option>
                                <option value="May">{{ __('May') }}</option>
                                <option value="June">{{ __('June') }}</option>
                                <option value="July">{{ __('July') }}</option>
                                <option value="August">{{ __('August') }}</option>
                                <option value="September">{{ __('September') }}</option>
                                <option value="October">{{ __('October') }}</option>
                                <option value="November">{{ __('November') }}</option>
                                <option value="December">{{ __('December') }}</option>
                            </select>
                            @php
                                foreach ($archives as $item){
                                    $years[] = $item['year'];
                                }
                                $years = array_unique($years);
                            @endphp
                            <select name="Year" class="archive-select">
                                @for($i = 0; $i < count($years); $i++) {
                                <option value="{{ $years[$i] }}">{{ $years[$i] }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit">{{ __("Show") }}</button>
                    </form>
                </div>
            </div>
            <div>
                <x-all-post-page-blocks :items="$posts"></x-all-post-page-blocks>
                <div class="pagination-block">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
