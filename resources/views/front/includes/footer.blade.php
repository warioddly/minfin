<footer>
    <div class="container">
        <div class="footer_container text-center ">
            <div class="row pt-2 pt-md-2 pt-lg-3">
                <div class="col-lg-4 col-md-4 col-4 p-0">
                    <img src="{{ asset('front/images/logo/kabinet-kg.svg') }}" alt="" class="">
                    <a href="https://www.gov.kg/" class="mt-lg-2 mt-md-1 mt-sm-0 mt-2">  КАБИНЕТ МИНИСТРОВ <br>Кыргызcкой Республики</a>
                </div>
                <div class="col-lg-4 col-md-4 col-4 p-0">
                    <img src="{{ asset('front/images/logo/kenesh.svg') }}" alt="">
                    <a href="http://kenesh.kg/" class="mt-lg-2 mt-md-1 mt-sm-0 mt-2">ЖОГОРКУ КЕНЕШ <br>Кыргызcкой Республики </a>
                </div>

                <div class="col-lg-4 col-md-4 col-4 p-0">
                    <img src="{{ asset('front/images/logo/admin-kg.svg') }}" alt="">
                    <a href="http://www.president.kg/ru/apparat_prezidenta" class="mt-lg-2 mt-md-1 mt-sm-0 mt-2">АДМИНИСТРАЦИЯ ПРЕЗИДЕНТА <br>Кыргызcкой Республики</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_info d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <p class="pb-3 pt-3">{{ $сontactData->address }}</p>
                    <p class="pb-3">Тел: {{ $сontactData->phone }}</p>
                    <p class="pb-3">e-mail: <span class="text-warning">{{ $сontactData->email }}</span></p>
                </div>
                <div class="col">
                    <p> © {{ now()->year }} Министерство Финансов КР. Все права защищены.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
