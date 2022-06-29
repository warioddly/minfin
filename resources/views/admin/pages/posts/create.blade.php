@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Pages"
        :breadcrumbs="['Pages', 'Creating']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <form action="{{ route('page-post-store', $parentId) }}" method="POST" enctype="multipart/form-data"
                                  class="" id="myAwesomeDropzone">
                                @csrf
                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col">
                                            <strong>{{__('Title')}}:</strong>
                                            <input type="text" name="title" placeholder="{{ __('Post title') }}" maxlength="255" class="form-control" data-toggle="maxlength" data-threshold="255" required>
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
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Publisher')}}:</strong>
                                            <select name="publisher_id" class="form-control" required>
                                                <option value="" disabled selected>-- {{ __('Select publisher') }} --</option>
                                                @foreach($publishers as $publisher)
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
                                            <input type="checkbox" id="switch" name="is_published" data-switch="primary"/>
                                            <label for="switch" data-on-label="{{ __('Yes') }}" data-off-label="{{ __('No') }}"></label>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{__('Preview image')}}:</strong>
                                    <input name="preview_image" type="file" class="form-control" accept="image/*" required>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{__('Description')}}:</strong>
                                    <textarea name="description" id="" cols="30" rows="3" placeholder="{{__('Post description')}}" class="form-control" maxlength="500" data-toggle="maxlength" data-threshold="500" required></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{ __('Content') }}</strong>
                                    <textarea id="editor" name="content"></textarea>
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
                                               <div class="row" id="uploadPreviewTemplate"></div>
                                           </div>
                                       </div>
                                       <div class="tab-pane" id="gallery-tab">
                                           <div class="form-group mt-2">
                                               <strong>{{ __('Gallery') }}</strong>
                                               <input type="file" name="galleries[]" id="gallery-files" class="form-control w-25" accept="image/*" multiple>
                                               <div class="row" id="galleryImages"></div>
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
        initSample();
    </script>
@endpush
