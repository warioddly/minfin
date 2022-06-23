@extends('front.layouts.app')

@section('content-title'){{ __('Ministry of Finance of the Kyrgyz Republic') }}@endsection

@section('content')
    <section id="head-information" class="mb-4">
        <div class="container">
            <div class="row mt-4 mb-3">
                <div class="col">
                    {{ Breadcrumbs::render('AskAQuestions') }}
                </div>
            </div>
        </div>
    </section>
    <section id="content" class="mb-5">
        <div class="container ask-a-questions">
            <div class="row justify-content-between">
                <div class="content-header pb-3 mb-4">
                    <p class="header-text border-none mb-3 text-uppercase">{{ __('Leave a question') }}</p>
                    <p class="secondary-text border-none">{{ __('Fields marked with an asterisk are required') }}</p>
                </div>
                <form action="{{ route('appeal-question') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col-5">
                            <input type="text" name="last_name" class="ask-question-input" maxlength="45" placeholder="{{ __('Last name') }}*" required>
                        </div>
                        <div class="col-6">
                            <input type="text" name="name" class="ask-question-input" maxlength="45" placeholder="{{ __('Name') }}*">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between person-address mb-3">
                        <div class="col-3">
                            <select class="ask-question-input ask-question-select" name="region" id="region" required>
                                <option value="" selected disabled>{{ __('Region') }}*</option>
                                <option value="Bishkek">{{ __('Bishkek') }}</option>
                                <option value="Naryn">{{ __('Naryn region') }}</option>
                                <option value="Chui">{{ __('Chui region') }}</option>
                                <option value="Osh">{{ __('Osh region') }}</option>
                                <option value="Batken">{{ __('Batken region') }}</option>
                                <option value="Issyk-Kul">{{ __('Issyk-Kul region') }}</option>
                                <option value="Talas">{{ __('Talas region') }}</option>
                                <option value="Jalal-Abad">{{ __('Jalal-Abad region') }}</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="ask-question-input ask-question-select" name="district" id="district" required>
                                <option value="" selected disabled>{{ __('District') }}*</option>
                                <option value="Sverdlov" data-region="Bishkek">{{ __('Sverdlov district') }}</option>
                                <option value="October" data-region="Bishkek">{{ __('October district') }}</option>
                                <option value="Leninsky" data-region="Bishkek">{{ __('Leninsky district') }}</option>
                                <option value="Pervomaisky" data-region="Bishkek">{{ __('Pervomaisky district') }}</option>
                                <option value="Jumgal" data-region="Naryn">{{ __('Jumgal district') }}</option>
                                <option value="Kochkor" data-region="Naryn">{{ __('Kochkor district') }}</option>
                                <option value="Ak-Talaa" data-region="Naryn">{{ __('Ak-Talaa district') }}</option>
                                <option value="Naryn" data-region="Naryn">{{ __('Naryn district') }}</option>
                                <option value="At-Bashy" data-region="Naryn">{{ __('At-Bashy district') }}</option>
                                <option value="Jayil" data-region="Chui">{{ __('Jayil district') }}</option>
                                <option value="Moscow" data-region="Chui">{{ __('Moscow district') }}</option>
                                <option value="Sokuluk" data-region="Chui">{{ __('Sokuluk district') }}</option>
                                <option value="Alamedin" data-region="Chui">{{ __('Alamedin district') }}</option>
                                <option value="Ysyk-Ata" data-region="Chui">{{ __('Ysyk-Ata district') }}</option>
                                <option value="Chui" data-region="Chui">{{ __('Chui district') }}</option>
                                <option value="Jumgal" data-region="Chui">{{ __('Kemin district') }}</option>
                                <option value="Panfilov" data-region="Chui">{{ __('Panfilov district') }}</option>
                                <option value="Uzgen" data-region="Osh">{{ __('Uzgen district') }}</option>
                                <option value="Kara-Suu" data-region="Osh">{{ __('Kara-Suu district') }}</option>
                                <option value="Kara-Kulja" data-region="Osh">{{ __('Kara-Kulja district') }}</option>
                                <option value="Alay" data-region="Osh">{{ __('Alay district') }}</option>
                                <option value="Nookat" data-region="Osh">{{ __('Nookat district') }}</option>
                                <option value="Aravan" data-region="Osh">{{ __('Aravan district') }}</option>
                                <option value="Chon-Alai" data-region="Osh">{{ __('Chon-Alai district') }}</option>
                                <option value="Leilek" data-region="Batken">{{ __('Leilek district') }}</option>
                                <option value="Batken" data-region="Batken">{{ __('Batken district') }}</option>
                                <option value="Kadamjai" data-region="Batken">{{ __('Kadamjai district') }}</option>
                                <option value="Issyk-Kul" data-region="Issyk-Kul">{{ __('Issyk-Kul district') }}</option>
                                <option value="Tup" data-region="Issyk-Kul">{{ __('Tup district') }}</option>
                                <option value="Ak-Suu" data-region="Issyk-Kul">{{ __('Ak-Suu district') }}</option>
                                <option value="Ton" data-region="Issyk-Kul">{{ __('Ton district') }}</option>
                                <option value="Jeti-Oguz" data-region="Issyk-Kul">{{ __('Jeti-Oguz district') }}</option>
                                <option value="Chatkal" data-region="Jalal-Abad">{{ __('Chatkal district') }}</option>
                                <option value="Toktogul" data-region="Jalal-Abad">{{ __('Toktogul district') }}</option>
                                <option value="Ala-Buka" data-region="Jalal-Abad">{{ __('Ala-Buka district') }}</option>
                                <option value="Aksy" data-region="Jalal-Abad">{{ __('Aksy district') }}</option>
                                <option value="Nooken" data-region="Jalal-Abad">{{ __('Nooken district') }}</option>
                                <option value="Bazar-Korgon" data-region="Jalal-Abad">{{ __('Bazar-Korgon district') }}</option>
                                <option value="Suzak" data-region="Jalal-Abad">{{ __('Suzak district') }}</option>
                                <option value="Toguz-Torou" data-region="Jalal-Abad">{{ __('Toguz-Torou district') }}</option>
                                <option value="Kara-Buura" data-region="Talas">{{ __('Kara-Buura district') }}</option>
                                <option value="Manas" data-region="Talas">{{ __('Manas district') }}</option>
                                <option value="Talas" data-region="Talas">{{ __('Talas district') }}</option>
                                <option value="Bakai-Ata" data-region="Talas">{{ __('Bakai-Ata district') }}</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" name="address" class="ask-question-input" maxlength="255" placeholder="{{ __('Address') }}*">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col-5">
                            <input type="text" name="phone" class="ask-question-input" maxlength="45" placeholder="{{ __('Number') }}*" required>
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" class="ask-question-input" maxlength="45" placeholder="{{ __('Email') }}*">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col">
                            <input type="text" name="organization" class="ask-question-input" maxlength="45" placeholder="{{ __('Name of the organization') }}" >
                        </div>
                    </div>
                    <p class="header-text ask-a-questions-category border-none mb-3">{{ __('Category') }}</p>
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col">
                            <select class="ask-question-input ask-question-select" name="category_id" id="category" required>
                                <option value="" selected disabled>--{{ __('All') }}--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ __($category->title) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col">
                            <input type="text" name="title" class="ask-question-input" maxlength="45" placeholder="{{ __('Subject') }}*" required>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col">
                            <textarea type="text" name="content" rows="5" class="ask-question-input" maxlength="2000" placeholder="{{ __('Your question') }}*" required></textarea>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between mb-3">
                        <div class="col-5">
                            <input type="file" name="file" class="ask-question-input form-control ask-question-file-input" placeholder="{{ __('Last name') }}*" multiple>
                        </div>
                    </div>
                    <div class="col-3">
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
