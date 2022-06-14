<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">{{ __('MDI icons') }} <span class="badge badge-danger-lighten">warioddly</span></h4>
                <div class="row icons-list-demo" id="newIcons"> </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">{{ __('ALL ICONS') }}</h4>
                <div class="row icons-list-demo" id="icons"> </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="header-title mb-4">Size</h4>

                <div class="row icons-list-demo">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-18px mdi-account"></i> mdi-18px
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-24px mdi-account"></i> mdi-24px
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-36px mdi-account"></i> mdi-36px
                    </div>

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-48px mdi-account"></i> mdi-48px
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="header-title mb-4">Rotate</h4>

                <div class="row icons-list-demo">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-45 mdi-account"></i> mdi-rotate-45
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-90 mdi-account"></i> mdi-rotate-90
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-135 mdi-account"></i> mdi-rotate-135
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-180 mdi-account"></i> mdi-rotate-180
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-225 mdi-account"></i> mdi-rotate-225
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-270 mdi-account"></i> mdi-rotate-270
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-rotate-315 mdi-account"></i> mdi-rotate-315
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="header-title mb-4">Spin</h4>

                <div class="row icons-list-demo">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-spin mdi-loading"></i> mdi-spin
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <i class="mdi mdi-spin mdi-star"></i> mdi-spin
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('footer-scripts')
    <script src="{{ asset('/admin/js/vendor/materialdesignicons.js') }}"></script>
@endpush
