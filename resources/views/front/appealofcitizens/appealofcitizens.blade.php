@extends('front.layouts.app')

@section('content-title'){{ __('Ministry of Finance of the Kyrgyz Republic') }}@endsection

@section('content')
    <section id="head-information" class="mb-4">
        <div class="container">
            <div class="row mt-4 mb-3">
                <div class="col">
                    {{ Breadcrumbs::render('AppealOfCitizens') }}
                </div>

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert alertType="danger" message="{{ $error }}"></x-alert>
                    @endforeach
                @endif

                @if(session('status'))
                    <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
                @endif

            </div>
        </div>
    </section>
    <section id="content" class="mb-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-8">

                    <div class="d-flex content-header pb-3 mb-3">
                        <img src="{{ asset('/front/images/icons/appealofcitizens-icon.svg') }}" alt="" class="me-2">
                        <p class="header-text border-none">{{ __('Appeal Of Citizens') }}</p>
                    </div>

                    <x-appeal-of-citizens-block
                        :items="$appealofcitizens"
                    ></x-appeal-of-citizens-block>

                </div>
                <div class="col-3">
                    <a href="{{ route('ask-a-question') }}" class="d-flex ask-question-btn mb-3">
                        {{ __('Ask a Question') }}
                        <i class="mdi mdi-message-bulleted"></i>
                    </a>
                    <form action="{{ route('appeal-search') }}" method="POST">
                        @csrf
                        <div class="form-group d-grid mb-3">
                            <label for="appeal-search-input" class="mb-2 form-lbl">{{ __('Search') }}</label>
                            <input type="text" maxlength="255" name="search" id="appeal-search-input" class="form-input" placeholder="{{ __('Enter text') }}">
                        </div>

                        <div class="form-group d-grid position-relative mb-3">
                            <label for="appeal-search-input" class="mb-2 form-lbl">{{ __('Publication period') }}</label>
                            <input type="text" name="dates" id="appeal-search-input" class="form-input" value="01-01-2022" />
                            <i class="uil-calendar-alt calendar-icon"></i>
                        </div>

                        <button type="submit" class="submit-button">{{ __('Search')  }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('head-scripts')
    <style>
        #content .accordion-button::after{
            content: "{{ __('View answer') }}";
            word-wrap: normal;
            background: none;
            white-space: nowrap;
            width: inherit;
            height: inherit;
            outline: none;
            border: none;
        }

        #content .accordion-button:not(.collapsed)::after{
            content: "{{ __('Hide answer') }}";
            background: none;
            transform: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@push('footer-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('input[name="dates"]').daterangepicker();
</script>
@endpush
