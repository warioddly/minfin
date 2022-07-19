@extends('admin.layouts.app')

@section('title-page'){{ __('Gallery')  }} | @endsection
@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('show-gallery', $post) }}
            </ol>
        </div>
    </div>
    <h4 class="page-title">{{ __('Gallery')  }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <x-show-gallery-block :item="$post"></x-show-gallery-block>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script>
        $('.remove-gallery-file-btn').click((event) => {
            let id = $(event.currentTarget).data('id');
            $(event.currentTarget).parent().closest('.preview_boxes').remove();
            $.ajax({
                url: '{{ route('delete-gallery-image') }}',
                type: "POST",
                data: { id: id },
            });
        });
    </script>
@endpush
