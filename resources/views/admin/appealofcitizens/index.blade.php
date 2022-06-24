@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Appeal Of Citizens"
        :breadcrumbs="['Appeal Of Citizens']"
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
                    <div class="row">
                        @foreach($appealofcitizens as $item)
                            <div class="col-3 mb-2">
                                <div class="card mb-0">
                                    <div class="card-body p-3">
                                        <small class="float-end text-muted">{{ $item->created_at->format('d m Y') }}</small>
                                        @if($item->answer == null)
                                            <span class="badge bg-secondary">{{ __('unanswered') }}</span>
                                        @else
                                            <span class="badge bg-success">{{ __('answered') }}</span>
                                        @endif

                                        <h5 class="mt-2 mb-2">
                                            <div id="tooltip-container7">
                                                <a href="{{ route('show-appeal', $item->id) }}" class="text-body"
                                                   data-bs-container="#tooltip-container7" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $item->title }}" >
                                                    {{ \Illuminate\Support\Str::limit($item->title, $limit=25, $end='...') }}
                                                </a>
                                            </div>
                                        </h5>

                                        <p class="mb-0">
                                            <span class="pe-2  mb-2 d-inline-block">
                                                <i class="mdi mdi-briefcase-outline text-muted"></i>
                                                {{ $item->category->title }}
                                            </span>
                                        </p>

                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-18"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                            </div>
                                        </div>

                                        <p class="mb-0">
                                            <i class=" uil-user-check"></i>
                                            <span class="align-middle">{{ $item->last_name }}
                                                @if(strlen($item->name) > 15)
                                                    {{ \Illuminate\Support\Str::limit($item->name, $limit=1, $end='.') }}
                                                @else
                                                    {{ $item->name }}
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-scripts
    type="appealofcitizens"
    :urls="['', '', '']"
></x-scripts>
