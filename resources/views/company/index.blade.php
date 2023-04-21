<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <div
                class="left-1/2 -translate-x-1/2 z-10 absolute top-10 border-4 border-emerald-700 rounded-full overflow-hidden">
                @if ($company->logo)
                @else
                    <img src="https://ui-avatars.com/api/?name={{ $company->name }}&background=a7f3d0&color=047857"
                        alt="company_img" class="w-32 h-32 drop-shadow-lg">
                @endif
            </div>
            <div
                class="bg-white dark:bg-gray-700 overflow-hidden shadow-lg sm:rounded-lg z-[5] absolute w-max top-28 dark:bg-opacity-40 dark:backdrop-blur-lg left-1/2 -translate-x-1/2 pt-12 rounded-xl">
                <div class="p-6 lg:px-10 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-2xl lg:text-6xl font-extrabold dark:text-emerald-100">{{ __($company->name) }}</h1>
                    <p class="text-xs lg:text-xl">{{ __($company->address) }}</p>
                    <p>address here</p>
                    <p>address here</p>
                    <p>address here</p>
                </div>
            </div>
            <img src="{{ asset('img/bg.jpg') }}" alt="bg-img"
                class="w-full h-64 object-cover rounded-lg absolute top-0">
        </div>
    </div>
</x-app-layout>
