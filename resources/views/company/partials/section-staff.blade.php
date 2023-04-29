<section id="staffs" class="max-w-xs lg:max-w-7xl text-white mx-auto pb-20">
    <h2 class="text-white text-2xl mb-4">{{ __('Staffs') }}</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        @foreach ($staffs as $var)
            @php
                $staff = "location.href='" . route('staff.show', ['staff' => $var->id]) . "'";
            @endphp
            <div class="max-w-xl w-full z-10 hover:scale-[1.03] smooth hover:cursor-pointer group"
                onclick="{{ $staff }}">
                <div class="flex flex-col">
                    <div class="bg-white border border-white shadow-lg rounded-3xl p-4">
                        <div class="flex-none sm:flex">
                            <div class=" relative h-32 w-32 sm:mb-0 mb-3 mx-auto lg:mx-0 shrink-0">
                                @if ($var->avatar)
                                    <img src="/storage/{{ $var->avatar }}" alt="{{ $var->name }}_avatar"
                                        class=" w-32 object-cover rounded-2xl aspect-square bg-emerald-500">
                                @else
                                    <img class="w-32 object-cover rounded-2xl aspect-square"
                                        src="https://api.dicebear.com/6.x/bottts-neutral/svg?seed={{ $var->email }}"
                                        alt="" id="UploadImg">
                                @endif

                                @if (auth()->user()->role === 1 && (isset($company) && $company->id == auth()->user()->company_id))
                                    <a href="{{ route('staff.edit', ['staff' => $var->id]) }}"
                                        class="absolute -right-2 bottom-2 -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="h-4 w-4">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                            <div class="flex sm:ml-5 sm:justify-evenly justify-start w-full">
                                <div class="flex items-center justify-between sm:mt-2 w-full">
                                    <div class="flex items-center w-full">
                                        <div class="flex flex-col items-center lg:items-start justify-center w-full">
                                            <div
                                                class="flex-none text-lg text-gray-800 font-bold leading-none w-full pb-1">
                                                @php
                                                    if ($var->role == 1) {
                                                        $role = 'Admin';
                                                        $icon = 'fa-solid fa-crown text-amber-400';
                                                    } elseif ($var->role == 2) {
                                                        $role = 'CSR';
                                                        $icon = 'fa-solid fa-headset';
                                                    } elseif ($var->role == 3) {
                                                        $role = 'Rider';
                                                        $icon = 'fa-solid fa-moped';
                                                    }
                                                @endphp
                                                <div class="flex items-center gap-2">
                                                    {{ $var->name }}
                                                    <div class="flex items-center">
                                                        <div
                                                            class="text-xs p-1.5 bg-gray-300 group-hover:rounded-r-[0] rounded-none z-10 rounded-l-lg rounded-r-lg transform duration-300">
                                                            <i class="{{ $icon }} "></i>
                                                        </div>
                                                        <span
                                                            class="group-hover:smooth smooth opacity-0 group-hover:opacity-100 -translate-x-8 group-hover:translate-x-[-1] !duration-500 text-xs p-1.5 bg-gray-200 rounded-r-lg z-0">
                                                            {{ $role }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 text-gray-500 my-1 gap-2 w-full text-sm">
                                                <span class="">
                                                    <i class="fa-regular text-emerald-500 fa-user"></i>
                                                    {{ $var->username ?? 'N/a' }}
                                                </span>
                                                <span>
                                                    <i class="fa-regular text-emerald-500 fa-cake-candles"></i>
                                                    {{ isset($var->dob) ? date('jS M, Y', strtotime($var->dob)) : 'N/a' }}
                                                </span>
                                                <span>
                                                    <i class="fa-regular text-emerald-500 fa-phone"></i>
                                                    {{ isset($var->phone) ? $var->phone : 'N/a' }}
                                                </span>
                                                <span>
                                                    <i class="fa-regular text-emerald-500 fa-phone"></i>

                                                    {{ isset($var->alt_phone) ? $var->alt_phone : 'N/a' }}

                                                </span>
                                                <span class="col-span-2">
                                                    <i class="fa-regular text-emerald-500 fa-envelope"></i>
                                                    {{ $var->email }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-6">
        {{ $staffs->links() }}
    </div>
</section>
