<x-app-layout>
    <div class=" bg-gray-200 dark:bg-gray-900 flex flex-wrap items-center justify-center">
        <div
            class="container max-w-xs lg:max-w-7xl bg-white rounded dark:bg-gray-800 shadow-lg transform duration-200 easy-in-out m-12">
            @if (auth()->user()->role === 1 && auth()->user()->company_id == $user->company_id)
                <div class="absolute top-6 right-4">
                    <a href="{{ route('staff.edit', ['staff' => $user->id]) }}"
                        class="p-2 border rounded-lg text-emerald-800 border-current hover:bg-emerald-700 hover:text-white smooth ad-theme"><i
                            class="fa-regular fa-pen-to-square hover:text-white"></i> Edit</a>
                </div>
            @endif
            <div class="h-2/4 sm:h-64 overflow-hidden z-0">
                <img class="w-full rounded-t" src="{{ asset('img/bg.jpg') }}" alt="background_image" />
            </div>
            <div class="flex justify-between px-5 -mt-12 mb-5 items-end">
                <span clspanss="relative h-32 w-32">
                    @if ($user->avatar)
                        <img class="mx-auto object-cover rounded-full h-24 w-24 bg-white p-1 border-4 border-emerald-800"
                            src="{{ '/storage/' . $user->avatar }}" alt="logo" id="UploadImg">
                    @else
                        <img alt="profile_image"
                            src="https://ui-avatars.com/api/?name={{ $user->name }}&background=a7f3d0&color=047857"
                            class="mx-auto object-cover rounded-full h-24 w-24 bg-emerald-800 p-1" />
                    @endif
                </span>
            </div>
            <div class="">
                <div class="px-7 mb-8">
                    <div class="flex lg:justify-between flex-col lg:flex-row lg:items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-green-800 dark:text-gray-300 truncate max-w-sm">
                                {{ __($user->name ? $user->name : 'N/a') }}</h2>
                            <p
                                class="text-gray-400 mt-2 dark:text-gray-400 text-sm truncate max-w-[18rem] lg:max-w-full">
                                <i class="fa-regular fa-location-dot ad-theme"></i> {{ __($user->address ? $user->address : 'N/a') }}
                            </p>
                        </div>
                        @php
                            $company = $user->company;
                            $url = "location.href='" . route('company.show', ['company' => $company->id]) . "'";
                        @endphp
                        <div class="flex gap-2 flex-col lg:flex-row mt-4 lg:mt-0 hover:cursor-pointer hover:scale-105 smooth" onclick="{{ $url }}">
                            <p class="text-white text-center p-2 bg-white bg-opacity-20 backdrop-blur-lg rounded-lg">
                                <i class="fa-regular fa-briefcase text-emerald-400"></i>
                                {{ __($user->company->name ? $user->company->name : 'N/a') }}
                            </p>
                        </div>
                    </div>

                    <hr class="mt-8 w-10/12 mx-auto border-emerald-200">
                    <div class="flex items-center gap-2 justify-center flex-col lg:flex-row mt-8">
                        <div class="px-4 py-2 cursor-pointer bg-green-900 rounded-lg text-gray-300 hover:bg-green-800 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-gray-200 smooth hover:scale-105 text-xs lg:text-xl w-full lg:w-max text-center"
                            onclick="window.location = 'mailto:{{ $user->email }}'">
                            <p class="flex items-center gap-2 justify-center"><i
                                    class="fa-regular fa-envelope text-emerald-200"></i> {{ __($user->email) }}</p>
                        </div>
                        <div class="flex gap-2 text-xs lg:text-xl w-full lg:w-max">
                            <div class="px-4 py-2 cursor-pointer bg-green-900 rounded-lg text-gray-300 hover:bg-green-800 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-gray-200 smooth hover:scale-105 w-full lg:w-max text-center"
                                onclick="window.location = 'tel:{{ $user->phone ? $user->phone : '' }}'">
                                <p><i class="fa-regular fa-phone-volume text-emerald-200"></i>
                                    {{ __($user->phone ? $user->phone : 'N/a') }}
                                </p>
                            </div>
                            @if ($user->alt_phone)
                                <div class="px-4 py-2 cursor-pointer bg-green-900 rounded-lg text-gray-300 hover:bg-green-800 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-gray-200 smooth hover:scale-105 w-full lg:w-max text-center"
                                    onclick="window.location = 'tel:{{ $user->alt_phone }}'">
                                    <p><i class="fa-regular fa-phone-volume text-emerald-200"></i>
                                        {{ __($user->alt_phone) }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>