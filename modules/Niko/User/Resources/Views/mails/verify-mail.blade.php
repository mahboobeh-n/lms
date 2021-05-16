@component('mail::message')
# Introduction

The body of your message.

@component('mail::panel')
    کد مربوطه:{{ $code }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
