@if(count($items) > 13)
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
    <div class="row mb-0 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-6 col-lg-4 mb-2 mb-md-0">
            <x-main-second-post-block
                :items="[$items[7]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[8]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[9], $items[10]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[11], $items[12]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[13]]"
                    ></x-main-second-post-block>
                </div>

            </div>
        </div>
    </div>
@endif
@if(count($items) == 23)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16], $items[17]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <x-main-second-post-block
                :items="[$items[18]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[19], $items[20]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[21], $items[22]]"
                    >
                    </x-main-second-post-block>
                </div>

            </div>
        </div>
    </div>
@elseif(count($items) == 22)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16], $items[17]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <x-main-second-post-block
                :items="[$items[18]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[19], $items[20]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[21]]"
                    >
                    </x-main-second-post-block>
                </div>

            </div>
        </div>
    </div>
@elseif(count($items) == 21)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16], $items[17]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <x-main-second-post-block
                :items="[$items[18]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[19], $items[20]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 20)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16], $items[17]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <x-main-second-post-block
                :items="[$items[18]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[19]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 19)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16], $items[17]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <x-main-second-post-block
                :items="[$items[18]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
    </div>
@elseif(count($items) == 18)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16], $items[17]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 17)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[16]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 16)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14], $items[15]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 15)
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-4 mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                <div class="col-12">
                    <x-main-second-post-block
                        :items="[$items[14]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 14)
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
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-6 col-lg-4">
            <x-main-second-post-block
                :items="[$items[7]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[8]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[9], $items[10]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[11], $items[12]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[13]]"
                    ></x-main-second-post-block>
                </div>

            </div>
        </div>
    </div>
@elseif(count($items) == 13)
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
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-6 col-lg-4">
            <x-main-second-post-block
                :items="[$items[7]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[8]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[9], $items[10]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[11], $items[12]]"
                    ></x-main-second-post-block>
                </div>

            </div>
        </div>
    </div>
@elseif(count($items) == 12)
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
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-6 col-lg-4">
            <x-main-second-post-block
                :items="[$items[7]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[8]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[9], $items[10]]"
                    >
                    </x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[11]]"
                    ></x-main-second-post-block>
                </div>

            </div>
        </div>
    </div>
@elseif(count($items) == 11)
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
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-6 col-lg-4">
            <x-main-second-post-block
                :items="[$items[7]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[8]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[9], $items[10]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@elseif(count($items) == 10)
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
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col-12 col-md-6 col-lg-4">
            <x-main-second-post-block
                :items="[$items[7]]"
                textSize="large"
            ></x-main-second-post-block>
        </div>
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[8]]"
                    ></x-main-second-post-block>
                </div>

                <div class="col-12 col-sm-6">
                    <x-main-second-post-block
                        :items="[$items[9]]"
                    >
                    </x-main-second-post-block>
                </div>
            </div>
        </div>
    </div>
@else
    @php $old_item = '' @endphp
    <div class="row mb-2 mb-lg-3 mb-md-2">
        <div class="col mb-2 mb-sm-2 mb-md-0 mb-lg-0 pe-md-0 pe-lg-2">
            <div class="row g-2 g-lg-3 g-md-2">
                @foreach($items as $key => $item)

                    @if($key % 2 != 0)
                        <div class="col-12 col-sm-4">
                            <x-main-second-post-block
                                :items="[$old_item, $item]"
                            >
                            </x-main-second-post-block>
                        </div>
                        @continue
                    @endif

                    @php $old_item = $item @endphp

                @endforeach
            </div>
        </div>
    </div>
@endif
