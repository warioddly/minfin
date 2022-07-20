@extends('front.layouts.app')

@section('content-title'){{ __('Ministry of Finance of the Kyrgyz Republic') }}@endsection

@section('content')
    <section id="head-information" class="mb-4">
        <div class="container">
            <div class="row mt-4 mb-3">
                <div class="col">
                    {{ Breadcrumbs::render('AntiCorruption') }}
                </div>
            </div>
        </div>
    </section>
    <section id="content" class="mb-5">
        <div class="container ask-a-questions">
            <div class="row justify-content-between">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert alertType="danger" message="{{ $error }}"></x-alert>
                    @endforeach
                @endif

                @if(session('success'))
                    <x-alert alertType="success" message="{{ __(session('success')) }}"></x-alert>
                @endif

                <div class="content-header pb-3 mb-4">
                    <p class="header-text border-none mb-3 text-uppercase">{{ __('Report Corruption') }}</p>
                    <p class="secondary-text border-none">{{ __('Fields marked with an asterisk are required') }}</p>
                </div>
                <form action="{{ route('send-corruption') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d-block d-md-flex justify-content-between mb-3">
                        <div class="col">
                            <input type="text" name="subject" class="ask-question-input" maxlength="45" placeholder="{{ __('Subject') }}*" required>
                        </div>
                    </div>
                    <div class="form-group d-block d-md-flex justify-content-between mb-3">
                        <div class="col">
                            <textarea type="text" name="body" rows="5" class="ask-question-input" maxlength="2000" placeholder="{{ __('Your message') }}*" required></textarea>
                        </div>
                    </div>
                    <div class="form-group d-block d-md-flex justify-content-between mb-3">
                        <div class="col-12 col-md-5">
                            <input type="file" name="attachment" class="ask-question-input form-control ask-question-file-input">
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="ask-a-questions-submit-btn">{{ __('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('footer-scripts')
    <x-ask-a-questions-scripts></x-ask-a-questions-scripts>
@endpush
