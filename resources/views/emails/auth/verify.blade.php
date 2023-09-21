<x-mail::message>

    {{__('auth.please_follow')}}

    <x-mail::button :url="route('register.verify', ['token' => $user->verify_token])">
        {{__('auth.verify_email')}}
    </x-mail::button>

    {{__('auth.verify_email')}},<br>
    {{ config('app.name') }}
</x-mail::message>
