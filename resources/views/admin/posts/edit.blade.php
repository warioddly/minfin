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
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Title')}}:</strong>
                                            <input type="text" name="title" placeholder="{{ __('Post title') }}" maxlength="255" value="{{ $post->title }}" class="form-control" required>
                                        </div>
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Category')}}:</strong>
                                            <select name="category_id" aria-selected="{{ $post->category_id }}" class="form-control" required>
                                                <option value="" disabled>-- {{ __('Select category') }} --</option>
                                                @foreach($categories as $category)
                                                    @if($category->id == $post->category_id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                                        @continue
                                                    @endif
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
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

                                <div class="form-group mt-2">
                                    <strong>Прикрепить документы</strong>
                                        <input type="file" name="documents[]" id="attachment-files" class="form-control" multiple>

                                    <div class="" id="uploadPreviewTemplate">
                                        @foreach($post->attachmentFiles as $file)
                                            <div class="card mt-1 mb-0 shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            @if(in_array($file->extension, ['img', 'svg', 'image', 'ico', 'jpeg', 'gif']))
                                                                <img data-dz-thumbnail src="{{ $file->path }}" class="avatar-sm rounded bg-light " style="object-fit: cover" alt="">
                                                            @else
                                                                <i class="mdi mdi-file-document-outline font-24 px-2" ></i>
                                                            @endif
                                                            </div>
                                                        <div class="col ps-0">
                                                            <a href="{{ $file->path }}" class="text-muted fw-bold" data-dz-name>{{ $file->title }}</a>
                                                            <p class="mb-0" data-dz-size>{{ $file->size }}</p>
                                                            </div>
                                                        <div class="col-auto">
                                                            <p class="btn btn-link btn-lg text-muted m-0 remove-old-file-btn" data-dz-remove data-name="{{ $file->title }}" data-id="{{ $file->id }}">
                                                                <i class="dripicons-cross"></i>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
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

    <script type="text/javascript">

        const removeButton = document.querySelector('.remove-old-file-btn');

        $('.remove-old-file-btn').click((event) => {
            let id = $(event.currentTarget).data('id');
            $(event.currentTarget).parent().closest('div.card.shadow-none').remove();
            console.log(id);
            $.ajax({
                url: '{{ route('delete-document') }}',
                type: "POST",
                data: { id: id },
            });
        });

        initSample();

    </script>
@endpush
