@extends('admin.layouts.app')

@section('title-page'){{ __('Posts')  }} | {{ __('Editing') }} |@endsection
@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('edit-post', $post) }}
            </ol>
        </div>
    </div>
    <h4 class="page-title">{{ __('Posts')  }}</h4>
@endsection

@section('content-title')
    {{ __('Posts') }} - {{ __('Editing') }} {{ __('post-2') }}
@endsection

@section('content')

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert alertType="danger" message="{{ $error }}"></x-alert>
        @endforeach
    @endif

    @if(session('status'))
        <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <form action="{{ route('page-post-update', $post->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                @method('PATCH')

                                <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                                    <li class="nav-item">
                                        <a href="#russian" data-bs-toggle="tab" aria-expanded="true" data-lang="russian" class="nav-link active tab d-flex justify-content-center">
                                            <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="" height="12" class="d-md-none d-block">
                                            <span class="d-none d-md-block">Русский</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#kyrgyz" data-bs-toggle="tab" aria-expanded="false" data-lang="kyrgyz" class="nav-link tab d-flex justify-content-center">
                                            <img src="{{ asset('admin/images/flags/kg.svg') }}" alt="" height="12" class="d-md-none d-block">
                                            <span class="d-none d-md-block">Кыргызча</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#english" data-bs-toggle="tab" aria-expanded="false" data-lang="english" class="nav-link tab d-flex justify-content-center">
                                            <img src="{{ asset('admin/images/flags/us.jpg') }}" alt="" height="12" class="d-md-none d-block">
                                            <span class="d-none d-md-block">English</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="russian">
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>{{__('Title')}}:</strong>
                                                    <input type="text" name="title" placeholder="{{ __('Post title') }}"
                                                           maxlength="255" value="{{ $post->title }}" class="form-control ru_title"
                                                           data-toggle="maxlength" data-threshold="255" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="kyrgyz">
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>{{__('Title')}}:</strong>
                                                    <input type="text" name="kg_title" placeholder="{{ __('Post title') }}"
                                                           maxlength="255" class="form-control kg_title" value="{{ $post->translates->kg_title ?? ''}}"
                                                           data-toggle="maxlength" data-threshold="255" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="english">
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>{{__('Title')}}:</strong>
                                                    <input type="text" name="en_title" placeholder="{{ __('Post title') }}"
                                                           maxlength="255" class="form-control en_title" value="{{ $post->translates->en_title ?? ''}}"
                                                           data-toggle="maxlength" data-threshold="255">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Publisher')}}:</strong>
                                            <select name="publisher_id" class="form-control publisher" required>
                                                <option value="" disabled selected>-- {{ __('Select publisher') }} --</option>
                                                @foreach($publishers as $publisher)
                                                    @if($publisher->id == $post->publisher_id)
                                                        <option value="{{ $publisher->id }}" selected>{{ $publisher->title}}</option>
                                                        @continue
                                                    @endif
                                                    <option value="{{ $publisher->id }}">{{ $publisher->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @can('delete-posts')
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <div class="form-group mt-2  d-flex align-items-center pt-2">
                                                <strong class="me-2" style="margin-top: -6px;">{{__('Publish')}}:</strong>
                                                <span>
                                                    <input type="checkbox" id="switch" name="is_published" @if($post->is_published)checked @endif data-switch="primary"/>
                                                    <label for="switch" data-on-label="{{ __('Yes') }}" data-off-label="{{ __('No') }}"></label>
                                                </span>
                                            </div>
                                        </div>
                                        @endcan
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="roles-multiselect" class="form-label">{{ __('Tags') }}</label>
                                    <select class="select2 form-control select2-multiple" name="tags[]" data-toggle="select2" id="multiselect-create"
                                            multiple="multiple" data-placeholder="-- {{ __('Choose tags') }} --"
                                            required>
                                        @foreach($tags as $tag)
                                            @if(in_array($tag->id, $tagIds))
                                                <option value="{{ $tag->id }}" selected>{{ __($tag->title) }}</option>
                                                @continue
                                            @endif
                                            <option value="{{ $tag->id }}">{{ __($tag->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{__('Preview image')}}:</strong>
                                    <input name="preview_image" type="file" class="form-control preview_image_edited" accept="image/*">
                                    <input type="hidden" class="preview_image" value="{{ $post->preview_image }}">
                                </div>

                                <input type="hidden" name="page_id" value="{{ $post->page_id }}">
                                <div class="tab-content" id="tab-description">
                                    <div class="tab-pane show active" id="russian-description">
                                        <div class="form-group mt-2">
                                            <strong>{{__('Description')}}:</strong>
                                            <textarea name="description" id="" cols="30"
                                                      rows="3" placeholder="{{__('Post description')}}"
                                                      class="form-control ru_description" maxlength="500" data-toggle="maxlength"
                                                      data-threshold="500" required>{{ $post->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="kyrgyz-description">
                                        <div class="form-group mt-2">
                                            <strong>{{__('Description')}}:</strong>
                                            <textarea name="kg_description" id="" cols="30"
                                                      rows="3" placeholder="{{__('Post description')}}"
                                                      class="form-control kg_description" maxlength="500" data-toggle="maxlength"
                                                      data-threshold="500" >{{ $post->translates->kg_description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="english-description">
                                        <div class="form-group mt-2">
                                            <strong>{{__('Description')}}:</strong>
                                            <textarea name="en_description" id="" cols="30"
                                                      rows="3" placeholder="{{__('Post description')}}"
                                                      class="form-control en_description" maxlength="500" data-toggle="maxlength"
                                                      data-threshold="500" >{{ $post->translates->en_description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="tab-content">
                                    <div class="tab-pane show active" id="russian-content">
                                        <div class="form-group mt-2">
                                            <strong>{{ __('Content') }}</strong>
                                            <textarea id="editor" name="content">{{ $post->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="kyrgyz-content">
                                        <div class="form-group mt-2">
                                            <strong>{{ __('Content') }}</strong>
                                            <textarea id="editor2" name="kg_content">{{ $post->translates->kg_content ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="english-content">
                                        <div class="form-group mt-2">
                                            <strong>{{ __('Content') }}</strong>
                                            <textarea id="editor3" name="en_content">{{ $post->translates->en_content ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <ul class="nav nav-tabs nav-justified nav-bordered mb-3 mt-3">
                                        <li class="nav-item">
                                            <a href="#attach-file-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                                <span class="d-none d-md-block">{{ __('Attach document') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#gallery-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">{{ __('Gallery') }}</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="attach-file-tab">
                                            <div class="form-group mt-2">
                                                <strong>{{ __('Attach document') }}</strong>
                                                <input type="file" name="documents[]" id="attachment-files" class="form-control w-25" multiple>
                                                <div class="row" id="uploadPreviewTemplate">
                                                    @foreach($post->attachmentFiles as $file)
                                                        <div class="col-12 col-md-3 mt-1 mb-0 preview_boxes">
                                                            <div class="card mb-0 shadow-none border">
                                                                <div class="p-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <div class="avatar-sm">
                                                                                <span class="avatar-title rounded text-uppercase">{{ $file->extension }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col ps-0">
                                                                            <a href="{{ $file->path }}" class="text-muted fw-bold" data-dz-name
                                                                               style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 182px">{{ $file->title }}</a>
                                                                            <p class="mb-0" data-dz-size>{{ $file->size }}kb</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <p class="btn btn-link btn-lg text-muted m-0 remove-old-file-btn" data-dz-remove data-name="{{ $file->title }}" data-id="{{ $file->id }}">
                                                                                <i class="dripicons-cross"></i>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="gallery-tab">
                                            <div class="form-group mt-2">
                                                <strong>{{ __('Gallery') }}</strong>
                                                <input type="file" name="galleries[]" id="gallery-files" class="form-control w-25" accept="image/*" multiple>
                                                <div class="row" id="galleryImages">
                                                    @foreach($post->galleries as $key => $image)
                                                        <div class="col-12 col-md-3 mt-1 mb-0 preview_boxes">
                                                            <div class="card mb-0 shadow-none border">
                                                                <div class="p-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-sm">
                                                                                    <img src="{{ $image->thumbnail_image }}" alt="" class="avatar-sm">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col ps-0">
                                                                            <a href="{{ $image->full_size_image }}" class="text-muted fw-bold" data-dz-name
                                                                               style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 150px">{{ __('Image') }} {{ $key + 1 }}</a>
                                                                            <p class="mb-0" data-dz-size>{{ $image->size }}kb</p>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <p class="btn btn-link btn-lg text-muted m-0 remove-gallery-file-btn" data-dz-remove data-name="{{ $image->title }}" data-id="{{ $image->id }}">
                                                                                <i class="dripicons-cross"></i>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        <a data-bs-toggle="modal" href="#preview" role="button"
                                           class="btn btn-primary preview_btn mt-3 me-1">{{ __('Preview') }}</a>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3 me-1">{{__('Cancel')}}</a>
                                        <button type="submit" class="btn btn-primary mt-3">{{__('Save')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal fade" id="preview" aria-hidden="true"
         aria-labelledby="createModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 1319px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Preview') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="post_preview">
                    <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#russian_modal" data-bs-toggle="tab" aria-expanded="true" data-lang="russian" class="nav-link active tab d-flex justify-content-center">
                                <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="" height="12" class="d-md-none d-block">
                                <span class="d-none d-md-block">Русский</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#kyrgyz_modal" data-bs-toggle="tab" aria-expanded="false" data-lang="kyrgyz" class="nav-link tab d-flex justify-content-center">
                                <img src="{{ asset('admin/images/flags/kg.svg') }}" alt="" height="12" class="d-md-none d-block">
                                <span class="d-none d-md-block">Кыргызча</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#english_modal" data-bs-toggle="tab" aria-expanded="false" data-lang="english" class="nav-link tab d-flex justify-content-center">
                                <img src="{{ asset('admin/images/flags/us.jpg') }}" alt="" height="12" class="d-md-none d-block">
                                <span class="d-none d-md-block">English</span>
                            </a>
                        </li>
                    </ul>
                    <img src="" alt="" class="preview_image" style="width: 100%;height: 325px;object-fit: cover;"/>

                    <div class="tab-content">
                        <div class="tab-pane show active p-1 p-md-3" id="russian_modal">
                           <h3 class="ru_title"></h3>
                           <p class="ru_description text-muted"></p>
                           <div class="ru_content"></div>
                        </div>
                        <div class="tab-pane p-1 p-md-3" id="kyrgyz_modal">
                            <h3 class="kg_title"></h3>
                            <p class="kg_description text-muted"></p>
                            <div class="kg_content"></div>
                        </div>
                        <div class="tab-pane p-1 p-md-3" id="english_modal">
                            <h3 class="en_title"></h3>
                            <p class="en_description text-muted"></p>
                            <div class="en_content"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('head-scripts')
    <script src="{{ asset('admin/plugins/Ckeditor/ckeditor.js') }}"></script>
@endpush

@push('footer-scripts')
    <script src="{{ asset('admin/js/preview.js') }}"></script>
    <script src="{{ asset('admin/plugins/UploadFile/FileUploader.js') }}"></script>
    <script src="{{ asset('admin/plugins/UploadFile/GalleryUploader.js') }}"></script>

    <script type="text/javascript">

        $('.remove-old-file-btn').click((event) => {
            let id = $(event.currentTarget).data('id');
            $(event.currentTarget).parent().closest('.preview_boxes').remove();
            $.ajax({
                url: '{{ route('delete-document') }}',
                type: "POST",
                data: { id: id },
            });
        });

        $('.remove-gallery-file-btn').click((event) => {
            let id = $(event.currentTarget).data('id');
            $(event.currentTarget).parent().closest('.preview_boxes').remove();
            $.ajax({
                url: '{{ route('delete-gallery-image') }}',
                type: "POST",
                data: { id: id },
            });
        });

        $('.tab').click((event) => {
            let lang = $(event.currentTarget).data('lang');

            $('#tab-description .tab-pane').removeClass('active').removeClass('show');
            $('#tab-content .tab-pane').removeClass('active').removeClass('show');
            $('#tab-description #' + lang + '-description').addClass('active').addClass('show');
            $('#tab-content #' + lang + '-content').addClass('active').addClass('show');

        });

        CKEDITOR.replace( 'editor' );
        CKEDITOR.add

        CKEDITOR.replace( 'editor2' );
        CKEDITOR.add

        CKEDITOR.replace( 'editor3' );
        CKEDITOR.add

    </script>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: rgb(var(--bs-primary-rgb)) !important;
            border: 1px solid #fff !important;
            margin-top: 3.5px !important;
        }
    </style>
@endpush
