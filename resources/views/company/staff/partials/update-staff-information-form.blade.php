<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Information of ' ) }} <span class="text-lg font-medium text-emerald-200">{{ $user->name }}</span>
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update account's profile information and email address along with other important informations.") }}
            @if (session('status') === 'staff-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-lime-600 dark:text-lime-400">{{ __('Information updated successfully.') }}</p>
            @endif
        </p>
    </header>

    <form method="post" action="{{ route('staff.update', ['staff' => $user->id]) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)"
                required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
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
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"
                required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Role')" />
            <select name="role" id="role" class="w-full mt-2 rounded-lg appearance-none">
                <option value="1" @if(old('role') == 1 || $user->role == 1) selected @endif>Admin</option>
                <option value="2" @if(old('role') == 2 || $user->role == 2) selected @endif>CSR</option>
                <option value="3" @if(old('role') == 3 || $user->role == 3) selected @endif>Rider</option>
            </select>
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)"
                autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="alt_phone" :value="__('Alternative Phone')" />
            <x-text-input id="alt_phone" name="alt_phone" type="text" class="mt-1 block w-full" :value="old('alt_phone', $user->alt_phone)"
                autofocus autocomplete="alt_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('alt_phone')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />

            <div class="flex gap-4 items-center mt-2">
                <div class="flex gap-2 text-white items-center text-lg">
                    <input type="radio" name="gender" id="male" value="1" @if(old('gender') == 1 || $user->gender == 1) checked @endif>
                    <label for="male">Male</label>
                </div>
                <div class="flex gap-2 text-white items-center text-xl">
                    <input type="radio" name="gender" id="female" value="2" @if(old('gender') == 2 || $user->gender == 2) checked @endif>
                    <label for="female">Female</label>
                </div>
                <div class="flex gap-2 text-white items-center text-xl">
                    <input type="radio" name="gender" id="others" value="3" @if(old('gender') == 3 || $user->gender == 3) checked @endif>
                    <label for="others">Others</label>
                </div>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('gender')" />

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Update') }}</x-primary-button>
        </div>
    </form>
</section>
