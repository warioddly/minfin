@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Email"
        :breadcrumbs="['Email']"
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
                    @include('admin.includes.emailLeftAside')

                    <div class="page-aside-right">

                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary"><i class="mdi mdi-alert-octagon font-16"></i></button>
                            <button type="button" class="btn btn-secondary"><i class="mdi mdi-delete-variant font-16"></i></button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal font-16"></i> More
                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <span class="dropdown-header">More Options :</span>
                                @if(in_array('UNREAD', $message->getLabels()))
                                    <a class="dropdown-item" href="{{ route('action-email', [$message->getId(),'markAsRead']) }}">{{ __('Mark as read') }}</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('action-email', [$message->getId(),'markAsUnread']) }}">{{ __('Mark as unread') }}</a>
                                @endif

                                @if(in_array('STARRED', $message->getLabels()))
                                    <a class="dropdown-item" href="{{ route('action-email', [$message->getId(),'removeStar']) }}">{{ __('Remove star') }}</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('action-email', [$message->getId(),'addStar']) }}">{{ __('Add star') }}</a>
                                @endif
                            </div>
                        </div>

                        <div class="mt-3">
                            <h5 class="font-18">{{ $message->getSubject() }}</h5>
                            <hr/>
                            <div class="d-flex mb-3 mt-1">
                                <div class="w-100 overflow-hidden">
                                    <small class="float-end">{{ $message->getDate() }}</small>
                                    <h6 class="m-0 font-14">{{ $message->getFromName() }}</h6>
                                    <small class="text-muted">From: {{ $message->getFromEmail() }}</small>
                                </div>
                            </div>
                               <div class="overflow-auto" style="height: 613px">
                                   {!! html_entity_decode( $message->getHtmlBody() ) !!}
                               </div>
                            <hr/>

                            @if(count($attachments) != 0)
                            <h5 class="mb-3">{{ __('Attachments') }}</h5>
                                <div class="row">
                                    @foreach($attachments as $item)
                                        <div class="col-xl-4">
                                            <div class="card mb-1 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title bg-primary-lighten text-primary rounded text-uppercase">{{ $item['ext'] }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col ps-0">
                                                        <a href="{{ $item['filepath'] }}" class="text-muted fw-bold" target="_blank"
                                                        style="overflow:hidden;
                                                                white-space:nowrap;
                                                                display:inline-block;
                                                                text-overflow:ellipsis;
                                                                width: 100px"
                                                        >{{ $item['filename'] }}</a>
                                                        <p class="mb-0">{{ $item['size'] }} kB</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="{{ $item['filepath'] }}" class="btn btn-link btn-lg text-muted" download>
                                                            <i class="dripicons-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-5">
                                <a href="" class="btn btn-secondary me-2"><i class="mdi mdi-reply me-1"></i> Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

