@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Posts"
        :breadcrumbs="['Posts']"
    ></x-page-inform>
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
