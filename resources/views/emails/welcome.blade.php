@component('mail::message')
# Welcome to CoreFunctions app, 

The body of your message.

@component('mail::button', ['url' => ''])

Welcome !

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
