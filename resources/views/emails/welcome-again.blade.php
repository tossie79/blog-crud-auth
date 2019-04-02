@component('mail::message')
# Introduction

Thank you so much for registering

@component('mail::button', ['url' => 'http://127.0.0.1:8000/posts'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some inspirational quote for your day
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
