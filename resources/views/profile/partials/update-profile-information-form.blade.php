<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="dob" :value="__('Date of birth')" />
            <x-text-input id="dob" name="dob" type="date" class="mt-1 block w-full" :value="old('dob', $user->dob)"
                required autofocus autocomplete="dob" />
            <x-input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
                required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)"
                required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="alt_phone" :value="__('Alternative Phone')" />
            <x-text-input id="alt_phone" name="alt_phone" type="text" class="mt-1 block w-full" :value="old('alt_phone', $user->alt_phone)"
                required autofocus autocomplete="alt_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('alt_phone')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />

            <div class="flex gap-4 items-center mt-2">
                <div class="flex gap-2 text-white items-center text-lg">
                    <input type="radio" name="gender" id="male" value="1" @if(auth()->user()->gender == 1) checked @endif>
                    <label for="male">Male</label>
                </div>
                <div class="flex gap-2 text-white items-center text-xl">
                    <input type="radio" name="gender" id="female" value="2" @if(auth()->user()->gender == 2) checked @endif>
                    <label for="female">Female</label>
                </div>
                <div class="flex gap-2 text-white items-center text-xl">
                    <input type="radio" name="gender" id="others" value="3" @if(auth()->user()->gender == 3) checked @endif>
                    <label for="others">Others</label>
                </div>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Profile Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
