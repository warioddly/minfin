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
                <p class="header-text mb-3">Контактные данные</p>
            </div>
        </div>
    </section>
    <section id="content" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-sm-12">
                    <ul class="contact-data_items contact-data mb-sm-4 mb-3 p-3">
                        <li class="contact-data_item mb-4">
                            Адрес: <p class="mt-2">Lorem ipsum dolor sit amet, consectetur</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            Применая: <p class="mt-2">Lorem ipsum dolor sit.</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            Сектор по связям с общественностью: <p class="mt-2">Lorem ipsum dolor sit amet.</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            Прием электронных сообщений: <p class="mt-2">Lorem ipsum dolor sit amet, consectetur.</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            Телефон доверия: <p class="mt-2">Lorem ipsum.</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            Общественная приемная: <p class="mt-2">Lorem ipsum dolor sit amet.</p>
                        </li>
                        <li class="social-media contact-data_item">
                            <p class="social-media mb-3">Социальные сети</p>
                            <ul class="d-flex">
                                <li>
                                    <img src="{{ asset('front/images/icons/social/Facebook.svg') }}" alt="">

                                </li>
                                <li>
                                    <img src="{{ asset('front/images/icons/social/instagram.svg') }}" alt="">
                                </li>
                                <li>
                                    <img src="{{ asset('front/images/icons/social/telegram.svg') }}" alt="">
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2925.3593866972697!2d74.58038980973456!3d42.84414412205675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x389ec9b8bdad69ed%3A0xce76e22493fb67a0!2sAkademiya%20Tsifrovykh%20Innovatsiy!5e0!3m2!1sen!2skg!4v1654160742266!5m2!1sen!2skg"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="google-map-address">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
