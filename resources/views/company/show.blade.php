<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class=" bg-gray-200 dark:bg-gray-900 flex flex-wrap items-center justify-center">
        <div
            class="container max-w-xs lg:max-w-7xl bg-white rounded dark:bg-gray-800 shadow-lg transform duration-200 easy-in-out m-12">
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
                            <p class="flex items-center gap-2 justify-center"><i class="fa-regular fa-envelope text-emerald-200"></i> {{ __($company->email) }}</p>
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
                    {{-- <div class="flex flex-wrap justify-center gap-2 sm:gap-4 mt-8">
                        <button
                            class="text-green-900 hover:text-green-700 p-1 sm:p-2 inline-flex items-center dark:text-gray-400 dark:hover:text-gray-300">
                            <svg class="w-7 h-7 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </button>
                        <button
                            class="text-green-900 hover:text-green-700 p-1 sm:p-2 inline-flex items-center dark:text-gray-400 dark:hover:text-gray-300">
                            <svg class="w-7 h-7 fill-current" role="img" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z" />
                            </svg>
                        </button>
                        <button
                            class="text-green-900 hover:text-green-700 p-1 sm:p-2  inline-flex items-center dark:text-gray-400 dark:hover:text-gray-30 dark:hover:text-gray-300">
                            <svg class="w-7 h-7 fill-current" role="img" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z" />
                            </svg>
                        </button>
                        <button
                            class="text-green-900 hover:text-green-700 p-1 sm:p-2  inline-flex items-center dark:text-gray-400 dark:hover:text-gray-30  dark:hover:text-gray-300">
                            <svg class="w-7 h-7 fill-current" role="img" viewBox="0 0 256 256"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055">
                                    </path>
                                </g>
                            </svg>
                        </button>
                        <button
                            class="text-green-900 hover:text-green-700 p-1 sm:p-2  inline-flex items-center dark:text-gray-400 dark:hover:text-gray-30 dark:hover:text-gray-300">
                            <svg class="w-7 h-7 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
