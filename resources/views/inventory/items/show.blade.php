<x-app-layout>
    <div class=" bg-gray-200 dark:bg-gray-900 flex flex-wrap items-center justify-center">
        <div
            class="container max-w-xs lg:max-w-7xl bg-white rounded dark:bg-gray-800 shadow-lg transform duration-200 easy-in-out m-12">
            @if (auth()->user()->role === 1 && auth()->user()->company_id == $item->company_id)
                <div class="absolute top-6 right-4">
                    <a href="{{ route('inventory.edit', ['company' => $companyId, 'inventory' => $item->id]) }}"
                        class="p-2 border rounded-lg text-emerald-800 border-current hover:bg-emerald-700 hover:text-white smooth ad-theme"><i
                            class="fa-regular fa-pen-to-square hover:text-white"></i> Edit</a>
                </div>
            @endif
            <div class="h-2/4 sm:h-96 overflow-hidden z-0">
                <img class="w-full rounded-t" src="{{ asset('img/bg.jpg') }}" alt="background_image" />
            </div>
            <div class="flex justify-between px-5 -mt-12 lg:-mt-32 mb-5 items-end">
                <span clspanss="relative h-32 w-32">
                    @if ($item->image)
                        <img class="mx-auto object-cover rounded-full lg:rounded-lg smooth h-24 w-24 lg:w-52 aspect-square lg:h-auto bg-white p-1 border-4 border-emerald-800"
                            src="{{ '/storage/' . $item->image }}" alt="logo" id="UploadImg">
                    @else
                        <img alt="profile_image"
                            src="https://ui-avatars.com/api/?name={{ $item->name }}&background=a7f3d0&color=047857"
                            class="mx-auto object-cover rounded-full h-24 w-24 bg-emerald-800 p-1" />
                    @endif
                </span>
            </div>
            <div class="">
                <div class="px-7 mb-8">
                    <div class="flex lg:justify-between flex-col lg:flex-row lg:items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-green-800 dark:text-gray-300 truncate max-w-sm">
                                {{ __($item->name ? $item->name : 'N/a') }}</h2>
                            <p
                                class="text-gray-400 mt-2 dark:text-gray-400 text-sm truncate max-w-[18rem] lg:max-w-full">
                                <i class="fa-regular fa-location-dot ad-theme"></i> {{ __($item->address ? $item->address : 'N/a') }}
                            </p>
                        </div>
                        @php
                            $url = "location.href='" . route('company.show', ['company' => $item->company_id]) . "'";
                        @endphp
                        <div class="flex gap-2 flex-col lg:flex-row mt-4 lg:mt-0 hover:cursor-pointer hover:scale-105 smooth" onclick="{{ $url }}">
                            <p class="text-white text-center p-2 bg-white bg-opacity-20 backdrop-blur-lg rounded-lg">
                                <i class="fa-regular fa-briefcase text-emerald-400"></i>
                                {{ $item->company->name }}
                            </p>
                        </div>
                    </div>

                    <hr class="mt-8 w-10/12 mx-auto border-emerald-200">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>