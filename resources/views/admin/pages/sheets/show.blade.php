@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Pages"
        :breadcrumbs="['Pages', 'Sheet']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="d-flex">
                                <i class="mdi {{ $sheet->icon }} d-flex me-2" style="font-size: 40px"></i>
                                <h2><b>{{ $sheet->title }}</b></h2>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            {!! html_entity_decode( $sheet->content ) !!}
                        </div>
                    </div>

                    @if(count($sheet->attachmentFiles) != 0)
                        <div class="row mx-n1 g-0">
                            <p class="h4">{{ __('Attached files') }}</p>
                            @foreach($sheet->attachmentFiles as $document)
                                <div class="col-xxl-3 col-lg-6">
                                    <div class="card m-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center flex-nowrap overflow-hidden">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        @if(in_array($document->extension, ['img', 'svg', 'image', 'ico', 'jpeg', 'gif']))
                                                            <img data-dz-thumbnail src="{{ $document->path }}" class="avatar-sm rounded bg-light " style="object-fit: cover" alt="">
                                                        @else
                                                            <i class="mdi mdi-file-document-outline font-24 px-2" ></i>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="{{ $document->path }}" class="text-muted fw-bold">{{ $document->title }}</a>
                                                    <p class="mb-0 font-13">{{ $document->size }} kb</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="d-print-none mt-4">
                        <div class="text-end">
                            <a data-bs-toggle="modal" href="#delete" role="button"
                               class="btn btn-danger"> <i class="mdi mdi-trash-can-outline me-1"></i> {{ __('Delete') }}
                            </a>
                            <a href="{{ route('page-sheet-edit', $sheet->id) }}" class="btn btn-primary"><i class="mdi mdi-file-edit"></i></a>
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i> </a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @can('delete-posts')
        <div class="modal fade" id="delete" aria-hidden="true"
             aria-labelledby="deleteModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }} {{ __('page') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('page-sheet-delete', $sheet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            {{ __('Are you sure you want to delete this page?') }}
                            <input type="hidden" name="id"  id="delete-input-id" value="" />
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endpush
