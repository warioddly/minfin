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
                            <form action="{{ route('store-document') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf
                                <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                                    <li class="nav-item">
                                        <a href="#russian" data-bs-toggle="tab" aria-expanded="true" data-lang="russian" class="nav-link active tab">
                                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                            <span class="d-none d-md-block">Русский</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#kyrgyz" data-bs-toggle="tab" aria-expanded="false" data-lang="kyrgyz" class="nav-link tab">
                                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                            <span class="d-none d-md-block">Кыргызча</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#english" data-bs-toggle="tab" aria-expanded="false" data-lang="english" class="nav-link tab">
                                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                            <span class="d-none d-md-block">English</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="russian">
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>{{__('Description')}}:</strong>
                                                    <textarea name="description" id="" cols="30" rows="3" placeholder="{{__('Post description')}}" class="form-control ru_description" maxlength="500" data-toggle="maxlength" data-threshold="500" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="kyrgyz">
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>{{__('Description')}}:</strong>
                                                    <textarea name="kg_description" id="" cols="30" rows="3" placeholder="{{__('Post description')}}" class="form-control kg_description" maxlength="500" data-toggle="maxlength" data-threshold="500" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="english">
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col">
                                                    <strong>{{__('Description')}}:</strong>
                                                    <textarea name="en_description" id="" cols="30" rows="3" placeholder="{{__('Post description')}}" class="form-control en_description" maxlength="500" data-toggle="maxlength" data-threshold="500" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                                <strong>{{__('Subsection')}}:</strong>
                                                <select name="page_id" class="form-control" required>
                                                    <option value="" disabled selected>-- {{ __('Select subsection') }} --</option>
                                                    @foreach($pages as $page)
                                                        <optgroup label="{{ __($page->title) }}">
                                                            <option value="{{ $page->id }}">{{ __($page->title) }}</option>
                                                            @forelse($page->childPages as $firstChild)
                                                                <option value="{{ $firstChild->id }}">{{ __($firstChild->title) }}</option>
                                                                @forelse($firstChild->childPages as $secondChild)
                                                                    <option value="{{ $secondChild->id }}">{{ __($secondChild->title) }}</option>
                                                                    @forelse($secondChild->childPages as $thirdChild)
                                                                        <option value="{{ $thirdChild->id }}">{{ __($thirdChild->title) }}</option>
                                                                        @forelse($thirdChild->childPages as $fourthChild)
                                                                            <option value="{{ $fourthChild->id }}">{{ __($fourthChild->title) }}</option>
                                                                        @empty
                                                                        @endforelse
                                                                    @empty
                                                                    @endforelse
                                                                @empty
                                                                @endforelse
                                                            @empty
                                                            @endforelse
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col col-md-6 col-lg-6 col-xl-6">
                                            <strong>{{__('Publisher')}}:</strong>
                                            <select name="publisher_id" class="form-control" >
                                                <option value="" disabled selected>-- {{ __('Select publisher') }} --</option>
                                                @foreach($publishers as $publisher)
                                                    <option value="{{ $publisher->id }}">{{ $publisher->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="attach-file-tab">
                                    <div class="form-group mt-2">
                                        <strong>{{ __('Attach document') }}</strong>
                                        <input type="file" name="documents[]" id="attachment-files" class="form-control w-25" multiple required>
                                        <div class="row" id="uploadPreviewTemplate"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('documents') }}" class="btn btn-secondary mt-3 me-1">{{__('Cancel')}}</a>
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

@push('footer-scripts')
    <script src="{{ asset('admin/plugins/UploadFile/FileUploader.js') }}"></script>
@endpush


