@extends('front.layouts.app')

@section('content-title'){{ __($post->title) }}@endsection

@section('content')
    <div class="container" id="post-page">
        <div class="row mt-4 mb-3">
            <div class="col">
                {{ Breadcrumbs::render('Post', $post) }}
            </div>
        </div>
        <div class="row mb-4 mb-md-5">
            <p class="main-post-header mb-3 d-none d-sm-block d-md-block d-xl-block">{{ __($post->title) }}</p>
            <a href="{{ url()->previous() }}" class="back-to-list-btn">
                <i class="mdi mdi-arrow-left me-2"></i>{{ __('To list') }}
            </a>
        </div>
        @if(count($post->attachmentFiles) !=0)
            <div class="row justify-content-between align-items-center content-tab-row mb-lg-4 mb-sm-3 mb-2">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#post" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
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
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 mb-3 mb-lg-0 post-show-content">
                <div class="tab-content">
                    <div class="tab-pane show active" id="post">
                        <div class="show-post-block" id="print-post">
                            <p class="p-2 post-title"> {{ __($post->title) }}</p>
                            <div class="d-flex social-media mb-2 d-print-none">
                                <ul class="social-list list-inline head-social-media">
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-odnoklassniki"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-muted d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-vk"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <img src="{{ $post->preview_image }}" alt="..." class="img-fluid post-preview-image mt-2 mb-3">
                            <div class="post-content">{!! html_entity_decode( __($post->content) ) !!}</div>
                            <div class="d-flex social-media mt-5 justify-content-between d-print-none align-items-center">
                                <ul class="social-list list-inline">
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-odnoklassniki"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#"  class="edit-button social-list-item text-blue-light d-flex justify-content-center"
                                           style="font-size: 30px" target="_blank"><i class="mdi mdi-vk"></i>
                                        </a>
                                    </li>
                                </ul>
                                <button onclick="printCertificate()" class="print-button">
                                    <i class="dripicons-print me-2"></i>
                                    {{ __('Print version') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="news-documents">
                       <div class="main-documents mt-3 px-2 px-md-0">
                           <x-post-document-download
                               :items="$post['attachmentFiles']"
                           ></x-post-document-download>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 ">
                <div class="p-3 post_information">
                    <p class="header-info-text">{{ __('Publication date') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 ">{{ Carbon\Carbon::parse($post->created_at)->format("d-m-Y - H:i") }}</h6>
                    <p class="header-info-text">{{ __('Publication date') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1">{{ __($post->category->title ?? '') }}</h6>
                    <p class="header-info-text">{{ __('Published') }}</p>
                    <h6 class="mb-lg-4 mt-lg-2 mb-md-3 mt-md-2 mb-2 mt-1 info-blue-text">{{ __($post->publisher->title ?? '') }}</h6>
                    <p class="header-info-text mb-2">{{ __('Direction') }}</p>
                    <a href="#" class="mt-lg-2 mt-md-2 mt-2 info-blue-text">{{ __($post->InPage->title) }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script>
        function printCertificate() {
            const printContents = document.getElementById('print-post').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
