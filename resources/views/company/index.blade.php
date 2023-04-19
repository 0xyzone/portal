<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($user->company_id != null)
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This user has a company") }}
                </div>
                @else
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button>
                    <a href="{{ route('create.company') }}">{{ __('Create Company') }}</a></x-primary-button>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>