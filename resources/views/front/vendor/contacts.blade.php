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
                    <ul class="contact-data_items contact-data p-3">
                        <li class="contact-data_item mb-4">
                            {{ __('Address') }}: <p class="mt-2">{{ $сontactData->address }}</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            {{ __('Reception') }}: <p class="mt-2">{{ $сontactData->reception }}</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            {{ __('Public Relations Sector') }}: <p class="mt-2">{{ $сontactData->relations_sector }}</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            {{ __('Receiving emails') }}: <p class="mt-2">{{ $сontactData->email }}</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            {{ __('Helpline') }}: <p class="mt-2">{{ $сontactData->helpline }}</p>
                        </li>
                        <li class="contact-data_item mb-4">
                            {{ __('Public reception') }}: <p class="mt-2">{{ $сontactData->public_reception }}</p>
                        </li>
                        <li class="social-media contact-data_item">
                            <p class="social-media mb-3">{{ __('Social media') }}</p>
                            <ul class="social-list list-inline">
                                @foreach($socialMedia as $key => $item)
                                    <li class="list-inline-item me-2">
                                        <a href="{{ $item->url }}"  class="edit-button social-list-item border-primary text-primary d-flex justify-content-center"
                                           style="font-size: 20px" target="_blank"
                                        >
                                            <i class="mdi {{ $item->icon }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col google-iframe">
                    {!! html_entity_decode( $сontactData->google_iframe ) !!}
                </div>
            </div>
        </div>
    </section>
@endsection
