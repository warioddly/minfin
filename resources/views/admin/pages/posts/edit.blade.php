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
                            <form action="{{ route('post-update', $post->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="description" id="" cols="30" rows="4" placeholder="{{__('Post description')}}" class="form-control" maxlength="255" required>
                    {{ $post->description }}
                </textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>Редактор</strong>
                                    <textarea id="editor" name="content">{{ $post->content }}</textarea>
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
    <script type="text/javascript">
        initSample();
    </script>
@endpush
