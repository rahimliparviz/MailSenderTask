@component('mail::message')
Mail Subject: {{ $notification->mailSubject }}
Mail Content: {{ $notification->mailContent }}

@endcomponent
