@component('mail::message')
# {{ $data['subject'] }}

<p class="text-muted">{{ $data['body'] }}</p>

@if(array_key_exists('attachment', $data))
# {{ __('Attached file') }}

<a href="{{ $data['attachment'] }}">{{ $data['file'] }}</a>
@endif

{{ __(config('app.name')) }}
@endcomponent
