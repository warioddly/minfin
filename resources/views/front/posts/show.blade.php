@extends('front.layouts.app')

@section('content-title'){{ __($post->title) }}@endsection

@section('content')
    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                waddddddddddddddddddddddddddd
            </div>
        </div>
        <div class="row mb-5">
            <p class="main-post-header mb-3">{{ __($post->title) }}</p>
            <a href="{{ url()->previous() }}" class="back-to-list-btn">
                <i class="mdi mdi-arrow-left me-2"></i>{{ __('To list') }}
            </a>
        </div>
        <div class="row justify-content-between align-items-center content-tab-row">
            <div class="col-8">
                <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a href="#post" data-bs-toggle="tab" aria-expanded="false" class="nav-link active ">
                            <span class="d-md-block">Новость</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#news-documents" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                            <span class=" d-md-block">Прикрепленные документы</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <p class="post-created-date">{{ Carbon\Carbon::parse($post->created_at)->format("d-F-Y - H:i") }}</p>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane show active" id="post">
                <div class="row mb-4 mt-4 justify-content-between">
                    <div class="col-lg-9 col-md-9 col-12">
                        <div class="main_documents_news_info">
                            <p class="p-2"> {{ $post->title }}</p>
                            <img src="{{ $post->preview_image }}" alt="Responsive image" class="img-fluid ">
                            <div>
                                {!! html_entity_decode( $post->content ) !!}
                            </div>
                        </div>
                        <div class="col-3 d-flex p-2 ">
                            <div class="documents_none " style="width: clamp(4.375rem, 2.4829717457114024rem + 8.072653884964682vw, 9.375rem); line-height: clamp(0.8125rem, 0.2757633587786259rem + 2.290076335877863vw, 1.375rem);">
                                <p class="">
                                    Направления
                                </p>
                                <a href="#">
                                    Бюджет
                                </a>
                            </div>
                            <div class="documents_none" style="width:200px ; line-height: clamp(0.8125rem, 0.2757633587786259rem + 2.290076335877863vw, 1.375rem);;">
                                <p>
                                    Опубликован
                                </p>
                                <a href="#">
                                    Министерство финансов
                                    Кыргызской республики
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="main_documents_social col-lg-3 col-md-3 col-8 p-lg-3 p-md-2 ">
                        <div class="main_documents_data col-lg-4 col-md-4 col-8 p-3">
                            <p class="">Дата публикации</p>
                            <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">21 декабря 2021 - 12:15</h6>
                            <P class="">Дата обновления</P>
                            <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">21 декабря 2021</h6>
                            <p class="">Тип</p>
                            <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">Пресс-релиз</h6>
                            <p class="">Опубликован</p>
                            <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">Министерство финансов
                                Кыргызской республики </h6>
                            <p class="">Направления</p>
                            <a href="#" class="mt-lg-2  mt-md-2  mt-1">Бюджет</a>
                        </div>
                        <p class="p-2">Социальные сети</p>
                        <div class="social_images  d-flex  p-2">
                            <a href="">
                                <img src="/img/img social/Facebook.svg" alt="" class="me-lg-3  me-md-3 me-sm-2">
                            </a>
                            <a href="">
                                <img src="/img/img social/instagram (1).svg" alt=""  class="me-lg-3  me-md-3 me-sm-2  ">
                            </a>
                            <a href="">
                                <img src="/img/img social/telegram.svg" alt=""  class="me-lg-3  me-md-3 me-sm-2 ">
                            </a>
                            <a href="">
                                <img src="/img/img social/Vector.svg" alt=""  class="me-lg-3  me-md-3 me-sm-2 ">
                            </a>
                            <a href="">
                                <img src="/img/img social/logos_twitter.svg" alt=""  class="me-lg-3  me-md-3 me-sm-2">
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="news-documents">
                <div class="main-documents">
                    <div class="col-12">
                        <div class="row mb-4 mt-4 g-3 justify-content-lg-around justify-content-md-between">
                            <div class="col-lg-8 col-md-8 col-12">

                                <div class="main_documents_info d-flex justify-content-around mb-4 align-items-center">
                                    <div class="col-lg-1 ">
                                        <img src="img/docs.svg" alt="" class="">
                                    </div>
                                    <div class="col-lg-1  ">
                                        <p class="">docx</p>
                                    </div>
                                    <div class="col-lg-1 ">
                                        <p class="text-center  border-start border-end
                                    ">16 КБ</p>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-3">
                                        <p class="">Основной документ</p>
                                    </div>
                                    <div class="col-lg-3 text-end">
                                        <a href="#" class="">Скачать</a>
                                    </div>
                                </div>

                                <div class="main_documents_info d-flex justify-content-around mb-4 align-items-center ">
                                    <div class="col-lg-1 ">
                                        <img src="img/docs.svg" alt="" class="">
                                    </div>
                                    <div class="col-lg-1  ">
                                        <p class="">docx</p>
                                    </div>
                                    <div class="col-lg-1 ">
                                        <p class="text-center  border-start border-end
                                    ">16 КБ</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="">Приложение</p>
                                    </div>
                                    <div class="col-lg-3 text-end">
                                        <a href="#" class="">Скачать</a>
                                    </div>
                                </div>

                                <div class="main_documents_info d-flex justify-content-around mb-4 align-items-center">
                                    <div class="col-lg-1 ">
                                        <img src="img/docs.svg" alt="" class="">
                                    </div>
                                    <div class="col-lg-1  ">
                                        <p class="">docx</p>
                                    </div>
                                    <div class="col-lg-1 ">
                                        <p class="text-center  border-start border-end
                                    ">16 КБ</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="">Приложение</p>
                                    </div>
                                    <div class="col-lg-3 text-end">
                                        <a href="#" class="">Скачать</a>
                                    </div>
                                </div>

                            </div>
                            <div class="main_documents_data col-lg-4 col-md-4 col-sm-12 col-12 p-3">
                                <p class="">Дата публикации</p>
                                <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 ">21 декабря 2021 - 12:15</h6>
                                <P class="">Дата обновления</P>
                                <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">21 декабря 2021</h6>
                                <p class="">Тип</p>
                                <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">Пресс-релиз</h6>
                                <p class="">Опубликован</p>
                                <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">Министерство финансов
                                    Кыргызской республики </h6>
                                <p class="">Направления</p>
                                <a href="#" class="mt-lg-2  mt-md-2  mt-1">Бюджет</a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
