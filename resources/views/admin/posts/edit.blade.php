@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Posts"
        :breadcrumbs="['Posts', 'Editing']"
    ></x-page-inform>
@endsection

@section('content-title')
    {{ __('Posts') }} - {{ __('Editing') }} {{ __('post-2') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <form action="{{ route('page-post-update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col">
                                            <strong>{{__('Title')}}:</strong>
                                            <input type="text" name="title" placeholder="{{ __('Post title') }}" maxlength="255" value="{{ $post->title }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Category')}}:</strong>
                                            <select name="category_id" class="form-control" required>
                                                <option value="" disabled selected>-- {{ __('Select category') }} --</option>
                                                @foreach($categories as $category)
                                                @if($category->id == $post->category_id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                                        @continue
                                                    @endif
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Publisher')}}:</strong>
                                            <select name="publisher_id" class="form-control" required>
                                                <option value="" disabled selected>-- {{ __('Select publisher') }} --</option>
                                                @foreach($publishers as $publisher)
                                                    @if($publisher->id == $post->publisher_id)
                                                        <option value="{{ $publisher->id }}" selected>{{ $publisher->title }}</option>
                                                        @continue
                                                    @endif
                                                    <option value="{{ $publisher->id }}">{{ $publisher->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <div class="col-12 col-md-3 col-lg-3 col-xl-3 d-flex align-items-center pt-2">
                                        <strong class="me-2" style="margin-top: -6px;">{{__('Publish')}}:</strong>
                                        <span>
                                            <input type="checkbox" id="switch" name="is_published" @if($post->is_published)checked @endif data-switch="primary"/>
                                            <label for="switch" data-on-label="{{ __('Yes') }}" data-off-label="{{ __('No') }}"></label>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{__('Preview image')}}:</strong>
                                    <input name="preview_image" type="file" class="form-control" accept="image/*">
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{__('Description')}}:</strong>
                                    <textarea name="description" id="" cols="30" rows="4" placeholder="{{__('Post description')}}" class="form-control" maxlength="500" data-toggle="maxlength" data-threshold="500"  required>{{ $post->description }}</textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>Редактор</strong>
                                    <textarea id="editor" name="content">{{ $post->content }}</textarea>
                                    <input type="hidden" name="page_id" value="{{ $post->page_id }}">
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
                                                                               style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 200px">{{ $file->title }}</a>
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
                                                                               style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 200px">{{ __('Image') }} {{ $key + 1 }}</a>
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

@push('head-scripts')
    <script src="{{ asset('admin/plugins/Ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/plugins/Ckeditor/editor.js') }}"></script>
@endpush

@push('footer-scripts')
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

        initSample();

    </script>
@endpush
