<div class="row mb-2">
    <div class="col-sm-4">
        <a href="#" class="btn btn-primary mb-2"><i class="mdi mdi-plus-circle me-2"></i>{{ __('Add photo') }}</a>
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <button type="button" class="btn btn-light mb-2">Export</button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-centered w-100 dt-responsive nowrap" id="gallery-datatable">
        <thead class="table-light">
        <tr>
            <th class="all" style="width: 20px;">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                </div>
            </th>
            <th class="all">Product</th>
            <th>Category</th>
            <th>Added Date</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th style="width: 85px;">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck2">
                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                </div>
            </td>
            <td>
                <img src="https://wallpaperaccess.com/full/8051222.jpg" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                <p class="m-0 d-inline-block align-middle font-16">
                    <a href="apps-ecommerce-products-details.html" class="text-body">Amazing Modern Chair</a>
                    <br/>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                    <span class="text-warning mdi mdi-star"></span>
                </p>
            </td>
            <td>
                Aeron Chairs
            </td>
            <td>
                09/12/2018
            </td>
            <td>
                $148.66
            </td>

            <td>
                254
            </td>
            <td>
                <span class="badge bg-success">Active</span>
            </td>

            <td class="table-action">
                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
</div>


@push('head-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/admin/plugins/DataTables/css/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/plugins/bootstrap/css/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <style>
        div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate{
            text-align: end !important;
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="{{ asset('/admin/plugins/DataTables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.bootstrap5.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin/plugins/DataTables/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('#gallery-datatable').DataTable({
                responsive: true,
                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                    },
                ],
                "ordering": false,
                "bLengthChange" : false,
                "pageLength": 10,
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
                },
            });
        });
    </script>
@endpush
