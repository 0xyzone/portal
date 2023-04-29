<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Inventory') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    {{ __('Items List') }}
                    <x-primary-button
                        onclick="location.href='{{ route('inventory.create', ['company' => $companyId]) }}'">
                        <p><i class="fa-solid fa-inbox-in"></i> {{ __('Add Item') }}</p>
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>

    @if (count($items) == 0)
        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center items-center gap-2">
                        <p>{{ __('No items found!') }}</p>
                        <x-primary-button
                            onclick="location.href='{{ route('inventory.create', ['company' => $companyId]) }}'">
                            <p><i class="fa-solid fa-inbox-in"></i> {{ __('Add Item') }}</p>
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div
                        class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-1 lg:grid-cols-5 place-items-center gap-10">
                        @foreach ($items as $var)
                            <div class="rounded-lg overflow-hidden bg-gradient-to-t from-slate-700 to-transparent w-8/12 lg:w-full shadow-2xl relative hover:scale-[1.05] smooth hover:cursor-pointer"
                                title="{{ $var->name }}" onclick="location.href='{{ route('inventory.show', ['company' => $companyId, 'inventory' => $var->id]) }}'">
                                <img src="{{ asset('storage') . '/' . $var->image }}" alt="product_image"
                                    class="w-full aspect-square object-cover bg-white">
                                @if (auth()->user()->role === 1) 
                                    <a href="{{ route('inventory.edit', ['company' => $companyId, 'inventory' => $var->id]) }}"
                                        class="px-1.5 py-1 bg-emerald-200 rounded-full absolute bottom-24 right-2 text-sm text-gray-800 shadow-2xl">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                @endif
                                <h2 class="text-xl font-bold truncate max-w-md px-4 pt-4 pb-2">{{ $var->name }}</h2>
                                <p class="text-sm text-slate-400 px-4 pb-4">रु {{ $var->price }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
