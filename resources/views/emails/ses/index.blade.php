@component('mail::message')
# Introduction

{{$content}}

{{-- @component('mail::button', ['url' => ''])
Button
@endcomponent --}}

<br>
{{ config('app.name') }}
@endcomponent