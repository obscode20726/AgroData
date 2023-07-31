{{-- resources/views/farmer/verify-email.blade.php --}}

@component('mail::message')
# Verify Email Address

Please click the button below to verify your email address.

@component('mail::button', ['url' => $verificationUrl])
Verify Email Address
@endcomponent

If you did not create an account, no further action is required.

Thanks,
{{ config('app.name') }}
@endcomponent
