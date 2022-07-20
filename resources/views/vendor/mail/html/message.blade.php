@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => __(env('APP_NAME'))])
{{ __(env('APP_NAME')) }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ __(env('APP_NAME')) }}
@endcomponent
@endslot
@endcomponent
