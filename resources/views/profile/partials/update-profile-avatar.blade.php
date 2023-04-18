<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile avatar.") }}
        </p>
    </header>

    <div>
        @if ($user->avatar)
            <img src="" alt="">
        @else
            <img class="w-32 mt-2" src="https://api.dicebear.com/6.x/bottts-neutral/svg?seed={{ Auth::user()->email }}"
                alt="">
        @endif
    </div>

    <form method="post" action="{{ route('profile.avatar.update') }}" class="space-y-3" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="avatar" :value="__('Upload Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"
                required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Avatar Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
