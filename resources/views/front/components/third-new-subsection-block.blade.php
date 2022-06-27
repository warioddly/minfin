<div class="row mb-2 mb-lg-3 mb-md-2">
    <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
        <div class="row g-2 g-lg-3 g-md-2">

            <div class="col-12 col-sm-6">
                <x-main-second-post-block
                    :items="[$items[0]]"
                ></x-main-second-post-block>
            </div>

            <div class="col-12 col-sm-6">
                <x-main-second-post-block
                    :items="[$items[1], $items[2]]"
                >
                </x-main-second-post-block>
            </div>

            <div class="col-12 col-sm-6">
                <x-main-second-post-block
                    :items="[$items[3], $items[4]]"
                ></x-main-second-post-block>
            </div>

            <div class="col-12 col-sm-6">
                <x-main-second-post-block
                    :items="[$items[5], $items[6]]"
                >
                </x-main-second-post-block>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <x-main-second-post-block
            :items="[$items[7]]"
            textSize="large"
        ></x-main-second-post-block>
    </div>
</div>

<div class="row">
    <div class="d-none d-md-block col-12 col-md-6 col-lg-8 mb-3 mb-sm-3 mb-lg-0 pe-lg-2 pe-md-0" style="max-height: 596px;">
        <x-main-second-post-block
            :items="[$items[8]]"
            textSize="large"
        >
        </x-main-second-post-block>
    </div>
    <div class="col-12 col-md-6 col-lg-4 mb-3 mb-sm-3 mb-lg-0">
        <div class="row g-2 g-sm-2 g-lg-3">
            <div class="col-12 col-sm-6 col-md-12">
                <x-main-second-post-block
                    :items="[$items[9], $items[10]]"
                ></x-main-second-post-block>
            </div>
            <div class="col-12 col-sm-6 col-md-12">
                <x-main-second-post-block
                    :items="[$items[11], $items[12]]"
                ></x-main-second-post-block>
            </div>
        </div>
    </div>
</div>
