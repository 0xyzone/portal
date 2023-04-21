<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($company->logo)

                        @else
                        <img src="https://ui-avatars.com/api/?name={{ $company->name }}" alt="company_img">
                    @endif
                    {{ __($company->name) }}
                    {{ __($company->user->name) }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>