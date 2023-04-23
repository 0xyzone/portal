<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Company Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your company information and other essential information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('company.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Company Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autofocus autocomplete="name" :value="old('name', $company->name)" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Company Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" autofocus autocomplete="address" :value="old('address', $company->address)" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Company Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="email" :value="old('email', $company->email)" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" autofocus autocomplete="phone" :value="old('phone', $company->phone)" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="alt_phone" :value="__('Alternative Phone')" />
            <x-text-input id="alt_phone" name="alt_phone" type="text" class="mt-1 block w-full" autocomplete="alt_phone" :value="$company->alt_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('alt_phone')" />
        </div>

        <div>
            <x-input-label for="pan" :value="__('Company PAN no.')" />
            <x-text-input id="pan" name="pan" type="text" class="mt-1 block w-full" autofocus autocomplete="pan" :value="old('pan', $company->pan)" />
            <x-input-error class="mt-2" :messages="$errors->get('pan')" />
        </div>

        <div>
            <x-input-label for="vat" :value="__('Company VAT no.')" />
            <x-text-input id="vat" name="vat" type="text" class="mt-1 block w-full" autofocus autocomplete="vat" :value="old('vat', $company->vat)" />
            <x-input-error class="mt-2" :messages="$errors->get('vat')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-lime-600 dark:text-lime-400">{{ __('Profile Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
