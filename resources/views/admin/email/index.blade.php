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

    @if(session('error'))
        <x-alert alertType="danger" message="{{ session('error') }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.includes.emailLeftAside')

                    <div class="page-aside-right">
                        <div class="d-flex justify-content-between">
                            <p class="h3 text-uppercase mt-0">{{ __($pageName) }}</p>
                            <p class="text-uppercase mt-0 text-muted">{{ __(LaravelGmail::user()) }}</p>
                        </div>

                        <div class="mt-3">
                            <ul class="email-list">
                                @foreach($messages as $message)
                                    <li @if(in_array('UNREAD', $message->getLabels())) class="unread" @endif>
                                        <div class="email-sender-info">
                                            <a href="@if(in_array('STARRED', $message->getLabels())){{ route('action-email', [$message->getId(),'removeStar']) }} @else {{ route('action-email', [$message->getId(),'addStar']) }} @endif"
                                               class="star-toggle mdi mdi-star-outline @if(in_array('STARRED', $message->getLabels()))text-warning @endif"></a>
                                            <a href="{{ route('show-email', $message->getId()) }}" class="email-title">{{ \Illuminate\Support\Str::limit($message->getFrom()['name'], $limit=20, $end='...') }}</a>
                                        </div>
                                        <div class="email-content">
                                            <a href="javascript: void(0);" class="email-subject">{{ \Illuminate\Support\Str::limit($message->getSubject(), $limit=50, $end='...') }}
                                            </a>
                                            <div class="email-date">{{ $message->getDate() }}</div>
                                        </div>
                                        <div class="email-action-icons">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('action-email', [$message->getId(), 'toArchive'])  }}"><i class="mdi mdi-archive email-action-icons-item"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{ route('action-email', [$message->getId(), 'toTrash'])  }}"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="@if(in_array('UNREAD', $message->getLabels())){{ route('action-email', [$message->getId(), 'markAsRead']) }} @else {{ route('action-email', [$message->getId(), 'markAsUnread']) }} @endif">
                                                    <i class="mdi @if(in_array('UNREAD', $message->getLabels()))mdi-email-open @else mdi-email-mark-as-unread  @endif email-action-icons-item "></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="row">
                            <div class="col-7 mt-1">
                                Showing {{ ($messages->currentpage()-1) * $messages->perpage() + 1 }} to {{ $messages->currentpage() * $messages->perpage() }}
                                    of  {{ $messages->total() }} entries
                            </div>

                            <div class="col-5">
                                <div class="btn-group float-end">
                                    {{ $messages->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
