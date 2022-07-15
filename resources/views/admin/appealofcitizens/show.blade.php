@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb">
                {{ Breadcrumbs::render('show-appeal', $appealofcitizen) }}
            </ol>
        </div>
    </div>
    <h4 class="page-title">{{ __('Appeal Of Citizens')  }}</h4>
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
        <div class="col-xxl-8 col-lg-6">
            <div class="card d-block">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="dripicons-dots-3"></i>
                        </a>
                        @can('edit-appeal')
                            <div class="dropdown-menu dropdown-menu-end">
                                @if($appealofcitizen->is_published == true)
                                    <a href="{{ route('appeal-publish', [$appealofcitizen->id, 'Unpublish']) }}" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>{{ __('Unpublish') }}</a>
                                @else
                                    <a href="{{ route('appeal-publish', [$appealofcitizen->id, 'publish']) }}" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>{{ __('Publish') }}</a>
                                @endif
                                <a data-bs-toggle="modal" href="#edit" role="button" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>{{ __('Edit') }}</a>
                            </div>
                        @endcan
                    </div>

                    <h3 class="mt-0">{{ $appealofcitizen->title }}</h3>

                    @if($appealofcitizen->answer == null)
                        <div class="badge bg-secondary text-light mb-3">{{ __('unanswered') }}</div>
                    @else
                        <div class="badge bg-success text-light mb-3">{{ __('answered') }}</div>
                    @endif

                    <h5>{{ __('Appeal') }}:</h5>

                    <p class="text-muted mb-2">{{ $appealofcitizen->content }}</p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>{{ __('Date of the application') }}</h5>
                                <p>{{ __($appealofcitizen->created_at->format('d-m-Y')) }} <small class="text-muted">{{ __($appealofcitizen->created_at->format('h:m')) }}</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>{{ __('Сitizen') }}</h5>
                                <p>{{ $appealofcitizen->last_name }} {{ $appealofcitizen->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <h5>{{ __('Category') }}</h5>
                                <p>{{ __($appealofcitizen->category->title) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 mb-3">{{ __('Answer') }}</h4>
                    <form action="{{ route('appeal-answer', $appealofcitizen->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <textarea class="form-control form-control-light mb-2" name="answer"
                                  placeholder="{{ __('Write message') }}" id="example-textarea"
                                  rows="13" maxlength="2000">{{ $appealofcitizen->answer ?? '' }}</textarea>
                        <div class="text-end">
                            <div class="btn-group mb-2 ms-2">
                                <button type="submit" class="btn btn-primary btn-sm">{{ __('Answer') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">{{ __('User data') }}</h5>
                    <div dir="ltr">
                        <div class="mt-3 ">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td>{{ __('Organization') }}: </td>
                                        <td>{{ $appealofcitizen->organization }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Phone') }}: </td>
                                        <td>{{ $appealofcitizen->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td>{{ $appealofcitizen->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Address') }}</td>
                                        <td>{{ __($appealofcitizen->region . ' region') }}, {{ __($appealofcitizen->district . ' district') }}
                                            {{ $appealofcitizen->address }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($appealofcitizen->attachmentFiles) != 0)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ __('Attached files') }}</h5>
                        @foreach($appealofcitizen->attachmentFiles as $document)
                            <div class="card mb-1 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded text-uppercase">{{ $document->extension }}</span>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <a href="{{ $document->path }}" target="_blank" class="text-muted fw-bold">{{ \Illuminate\Support\Str::limit($document->title, $limit=20, $end="...." . $document->extension) }}</a>
                                        <p class="mb-0">{{ $document->size }} kB</p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ $document->path }}" class="btn btn-link btn-lg text-muted" download>
                                            <i class="dripicons-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('modal')
    @can('edit-users')
        <div class="modal fade" id="edit" aria-hidden="true"
             aria-labelledby="editModalLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 1016px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Editing') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('appeal-edit', $appealofcitizen->id) }}" method="POST" id="edit-form" class="p-3">
                        @csrf
                        @method('PATCH')
                        <div class="row justify-content-between">
                            <label for="subject" class="mb-1">{{ __('Appeal subject') }}</label>
                            <input type="text" maxlength="45" id="subject" name="title" class="form-control mb-3" value="{{ $appealofcitizen->title }}" required>

                            <label for="category_id" class="mb-1">{{ __('Category') }}</label>
                            <select name="category_id" id="category_id" class="form-control mb-3" required>
                                @foreach($categories as $category)
                                    @if($category->id == $appealofcitizen->id)
                                        <option value="{{ $category->id }}" selected>{{ __($category->title) }}</option>
                                        @continue
                                    @endif
                                    <option value="{{ $category->id }}">{{ __($category->title) }}</option>
                                @endforeach
                            </select>

                            <label for="content" class="mb-1">{{ __('Appeal') }}</label>
                            <textarea class="form-control form-control-light mb-2" name="content" id="content"
                                      placeholder="{{ __('Write message') }}" id="example-textarea"
                                      rows="13" maxlength="2000" required>{{ $appealofcitizen->content }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endpush

<x-scripts
    type="appeal"
    :urls="['', '', route('delete-appeal'), '', '']"
></x-scripts>
