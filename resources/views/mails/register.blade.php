@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => route('confirm') . '?id='.encrypt($user->id) ])
Confirm Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
