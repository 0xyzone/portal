<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>
    {{-- Company Profile Start --}}
    <div class=" bg-gray-200 dark:bg-gray-900 flex flex-wrap items-center justify-center">
        <div
            class="container max-w-xs lg:max-w-7xl bg-white rounded dark:bg-gray-800 shadow-lg transform duration-200 easy-in-out m-12">
            @if (auth()->user()->role === 1)
                <div class="absolute top-6 right-4">
                    <a href="{{ route('edit.company', ['id' => $company->id]) }}"
                        class="p-2 border rounded-lg text-emerald-800 border-current hover:bg-emerald-700 hover:text-white smooth ad-theme"><i
                            class="fa-regular fa-pen-to-square hover:text-white"></i> Edit</a>
                    <a href="{{ route('company.create.staff') }}"
                        class="p-2 border rounded-lg text-emerald-800 border-current hover:bg-emerald-700 hover:text-white smooth ad-theme"><i
                            class="fa-regular fa-user-plus hover:text-white"></i> Add staff</a>
                </div>
            @endif
            <div class="h-2/4 sm:h-64 overflow-hidden z-0">
                <img class="w-full rounded-t" src="{{ asset('img/bg.jpg') }}" alt="background_image" />
            </div>
            <div class="flex justify-between px-5 -mt-12 mb-5 items-end">
                <span clspanss="relative h-32 w-32">
                    @if ($company->logo)
                        <img class="mx-auto object-cover rounded-full h-24 w-24 bg-white p-1 border-4 border-emerald-800"
                            src="{{ '/storage/' . $company->logo }}" alt="logo" id="UploadImg">
                    @else
                        <img alt="profile_image"
                            src="https://ui-avatars.com/api/?name={{ $company->name }}&background=a7f3d0&color=047857"
                            class="mx-auto object-cover rounded-full h-24 w-24 bg-emerald-800 p-1" />
                    @endif
                </span>
            </div>
            <div class="">
                <div class="px-7 mb-8">
                    <div class="flex lg:justify-between flex-col lg:flex-row lg:items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-green-800 dark:text-gray-300 truncate max-w-sm">
                                {{ __($company->name) }}</h2>
                            <p
                                class="text-gray-400 mt-2 dark:text-gray-400 text-sm truncate max-w-[18rem] lg:max-w-full">
                                <i class="fa-regular fa-location-dot ad-theme"></i> {{ __($company->address) }}
                            </p>
                        </div>
                        <div class="flex gap-2 flex-col lg:flex-row mt-4 lg:mt-0">
                            <p class="text-white text-center p-2 bg-white bg-opacity-20 backdrop-blur-lg rounded-lg">
                                @if ($company->pan)
                                    <i class="fa-regular fa-file-certificate text-emerald-200"></i>
                                    &nbsp;{{ __($company->pan) }} (PAN)
                                @endif
                                @if ($company->vat)
                                    | <i class="fa-regular fa-file-certificate text-emerald-200"></i>
                                    &nbsp;{{ __($company->vat) }} (VAT)
                                @endif
                            </p>
                            <p class="text-white text-center p-2 bg-white bg-opacity-20 backdrop-blur-lg rounded-lg">
                                <i class="fa-regular fa-crown text-amber-400"></i>
                                {{ __($company->user->name) }}
                            </p>
                        </div>
                    </div>

                    <hr class="mt-8 w-10/12 mx-auto border-emerald-200">
                    <div class="flex items-center gap-2 justify-center flex-col lg:flex-row mt-8">
                        <div class="px-4 py-2 cursor-pointer bg-green-900 rounded-lg text-gray-300 hover:bg-green-800 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-gray-200 smooth hover:scale-105 text-xs lg:text-xl w-full lg:w-max text-center"
                            onclick="window.location = 'mailto:{{ $company->email }}'">
                            <p class="flex items-center gap-2 justify-center"><i
                                    class="fa-regular fa-envelope text-emerald-200"></i> {{ __($company->email) }}</p>
                        </div>
                        <div class="flex gap-2 text-xs lg:text-xl w-full lg:w-max">
                            <div class="px-4 py-2 cursor-pointer bg-green-900 rounded-lg text-gray-300 hover:bg-green-800 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-gray-200 smooth hover:scale-105 w-full lg:w-max text-center"
                                onclick="window.location = 'tel:{{ $company->phone }}'">
                                <p><i class="fa-regular fa-phone-volume text-emerald-200"></i>
                                    {{ __($company->phone) }}
                                </p>
                            </div>
                            @if ($company->alt_phone)
                                <div class="px-4 py-2 cursor-pointer bg-green-900 rounded-lg text-gray-300 hover:bg-green-800 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-gray-200 smooth hover:scale-105 w-full lg:w-max text-center"
                                    onclick="window.location = 'tel:{{ $company->alt_phone }}'">
                                    <p><i class="fa-regular fa-phone-volume text-emerald-200"></i>
                                        {{ __($company->alt_phone) }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Company Profile end --}}

    <section id="staffs" class="max-w-xs lg:max-w-7xl text-white mx-auto">
        <h2 class="text-white text-2xl mb-4">{{ __('Staffs') }}</h2>
        <div class="flex flex-wrap space-x-4 mx-auto">
            @foreach ($staffs as $var)
                <div class="max-w-xl w-full z-10">
                    <div class="flex flex-col">
                        <div class="bg-white border border-white shadow-lg  rounded-3xl p-4">
                            <div class="flex-none sm:flex">
                                <div class=" relative h-32 w-32 sm:mb-0 mb-3 mx-auto lg:mx-0">
                                    @if ($var->avatar)
                                        <img src="/storage/{{ $var->avatar }}"
                                            alt="{{ $var->name }}_avatar"
                                            class=" w-32 h-32 object-cover rounded-2xl">
                                    @else
                                        <img class="w-32 h-32 object-cover rounded-2xl"
                                            src="https://api.dicebear.com/6.x/bottts-neutral/svg?seed={{ $var->email }}"
                                            alt="" id="UploadImg">
                                    @endif

                                    <a href="#"
                                        class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="h-4 w-4">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="flex-auto sm:ml-5 sm:justify-evenly justify-center">
                                    <div class="flex items-center justify-between sm:mt-2">
                                        <div class="flex items-center">
                                            <div class="flex flex-col items-center">
                                                <div
                                                    class="w-full flex-none text-lg text-gray-800 font-bold leading-none bg-red-300">
                                                    <span>{{ $var->name }}</span></div>
                                                <div class="flex-auto text-gray-500 my-1">
                                                    <span class="mr-3 "><i class="fa-regular fa-user"></i> {{ $var->username }}</span><span
                                                        class="mr-3 border-r border-gray-200  max-h-0"></span><span><i class="fa-regular fa-cake-candles"></i> {{ date('jS M, Y', strtotime($var->dob)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex pt-2  text-sm text-gray-500">
                                        <div class="flex-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                </path>
                                            </svg>
                                            <p class="">1.2k Followers</p>
                                        </div>
                                        <div class="flex-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="">14 Components</p>
                                        </div>
                                        <button
                                            class="flex-no-shrink bg-green-400 hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">FOLLOW</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
