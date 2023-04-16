<x-guest-layout titlename="Dashboard" class="py-10">
    <div class="flex flex-col items-center justify-center gap-5 lg:flex-row">
        <x-primary-button>
            <a href="{{ route('login') }}">Login</a>
        </x-primary-button>
        <x-secondary-button>
            <a href="{{ route('register') }}">Register</a>
        </x-secondary-button>
    </div>
        <x-footer class="text-white"></x-footer>
</x-guest-layout>