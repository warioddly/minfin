<div class="page-aside-left">

    <div class="d-grid">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#compose-modal">{{ __('Compose') }}</button>
    </div>

    <div class="email-menu-list mt-3">
        <a href="{{ route('email', 'inbox') }}" @if(request()->segment(3) == 'Inbox')class="text-danger fw-bold" @endif><i class="dripicons-inbox me-2"></i>{{ __('inbox') }}</a>
        <a href="{{ route('email', 'starred') }}" @if(request()->segment(3) == 'Starred')class="text-danger fw-bold" @endif><i class="dripicons-star me-2"></i> {{ __('starred') }}</a>
        <a href="{{ route('email', 'sent') }}" @if(request()->segment(3) == 'Sent')class="text-danger fw-bold" @endif><i class="dripicons-exit me-2"></i>{{ __('sent Mail') }}</a>
        <a href="{{ route('email', 'trash') }}" @if(request()->segment(3) == 'Trash')class="text-danger fw-bold" @endif><i class="dripicons-trash me-2"></i>{{ __('trash') }}</a>
        <a href="{{ route('email', 'spam') }}" @if(request()->segment(3) == 'Spam')class="text-danger fw-bold" @endif><i class="dripicons-warning me-2"></i>{{ __('spam') }}</a>
    </div>

</div>

@push('modal')
    <div id="compose-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="compose-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="compose-header-modalLabel">{{ __('New Message') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-1">
                    <form action="{{ route('send-email') }}" method="POST">
                        <div class="modal-body px-3 pt-3 pb-0">
                                @csrf
                                <div class="mb-2">
                                    <label for="msgto" class="form-label">{{ __('To') }}</label>
                                    <input type="text" name="to" id="msgto" class="form-control" placeholder="{{ __('Enter email') }}">
                                </div>
                                <div class="mb-2">
                                    <label for="mailsubject" class="form-label">{{ __('Subject') }}</label>
                                    <input type="text" name="subject" id="mailsubject" class="form-control" placeholder="{{ __('Subject') }}" maxlength="255">
                                </div>
                                <div class="write-mdg-box mb-3">
                                    <label class="form-label">{{ __('Message') }}</label>
                                    <textarea id="simplemde1" name="message" maxlength="700"></textarea>
                                </div>
                        </div>
                        <div class="px-3 pb-3 text-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Send Message <i class="mdi mdi-send ms-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('head-scripts')
    <link rel="stylesheet" href="{{ asset('admin/plugins/Simplemde/simplemde.min.css') }}">
@endpush
@push('footer-scripts')
    <script src="{{ asset('admin/plugins/Simplemde/simplemde.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/Simplemde/inbox.js') }}"></script>
@endpush
