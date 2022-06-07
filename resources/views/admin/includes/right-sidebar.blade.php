<div class="end-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
            </div>

            <h5 class="mt-3">{{ __('Theme') }}</h5>
            <hr class="mt-1" />

            <h5 class="mt-4">Left Sidebar</h5>
            <hr class="mt-1" />

            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="compact" value="fixed" id="fixed-check"
                       checked />
                <label class="form-check-label" for="fixed-check">Scrollable</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="compact" value="condensed"
                       id="condensed-check" />
                <label class="form-check-label" for="condensed-check">Condensed</label>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            </div>
        </div>

    </div>
</div>
<div class="rightbar-overlay"></div>
