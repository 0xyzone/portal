<x-guest-layout titlename="Dashboard" class="py-10" >
    <div class="flex flex-col items-center justify-center gap-5 lg:flex-row">
        @php
            $login = route('login');
            $register = route('register');
        @endphp
        <x-primary-button onclick="location.href = '{{ $login }}';">
            {{ __('Login') }}
        </x-primary-button>
        <x-secondary-button onclick="location.href = '{{ $register }}';">
            {{ __('Register') }}
        </x-secondary-button>


    </div>
    <x-footer class="text-white"></x-footer>
</x-guest-layout>
