@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Pages"
        :breadcrumbs="['Pages', 'Sheet']"
    ></x-page-inform>
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
                            <form action="{{ route('page-sheet-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                                            <strong>{{__('Title')}}:</strong>
                                            <input type="text" name="title" placeholder="{{ __('Sheet title') }}" maxlength="255" class="form-control" data-toggle="maxlength" data-threshold="255" required>
                                            <input type="hidden" name="page_id" value="{{ $parentId }}">
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="page-image-icon" class="form-label m-0 text-capitalize">{{ __('enter MDI icon') }}</label>
                                                <div class="form-group d-flex">
                                                    <input name="icon" type="text" id="page-icon" class="form-control me-2">
                                                    <a data-bs-toggle="modal" href="#choiceicon" role="button"
                                                       class="btn btn-primary">{{ __('Choice') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group mt-2">
                                    <strong>{{ __('Content') }}</strong>
                                    <textarea id="editor" name="content"></textarea>
                                </div>

                                <div class="form-group mt-2">
                                    <strong>{{ __('Attach document') }}</strong>
                                    <input type="file" name="documents[]" id="attachment-files" class="form-control" multiple>
                                    <div class="" id="uploadPreviewTemplate"></div>
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
        initSample();
    </script>
@endpush

@push('modal')
    <div class="modal fade" id="choiceicon" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __('Mdi Icons') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-icon-modal></x-icon-modal>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush
