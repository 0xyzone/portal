<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('staff.store') }}" class="mt-6 space-y-6">
        @csrf
        <!-- Avatar -->
        <input type="hidden" name="company_id" value="{{ $user->company->id }}">
        <div>
            <div class="rounded-lg mt-2 object-cover flex" alt="avatar" id="UploadImg">
                <div class="preview">
                    <img id="preview-selected-image" class="rounded-full w-32 h-32" />
                </div>
                <svg id="svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="white" class="w-16 h-16">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                </svg>

                <script>
                    $("#UploadImg").click(function() {
                        $("#avatar").trigger('click');
                    })
                </script>
            </div>
        </div>
        <div>
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 w-full" autofocus autocomplete="avatar" onchange="previewImage(event);" hidden />
            <script>
                $("#preview-selected-image").hide()
                /**
                 * Create an arrow function that will be called when an image is selected.
                 */
                const previewImage = (event) => {
                    /**
                     * Get the selected files.
                     */
                    const imageFiles = event.target.files;
                    /**
                     * Count the number of files selected.
                     */
                    const imageFilesLength = imageFiles.length;
                    /**
                     * If at least one image is selected, then proceed to display the preview.
                     */
                    if (imageFilesLength > 0) {
                        /**
                         * Get the image path.
                         */
                        const imageSrc = URL.createObjectURL(imageFiles[0]);
                        /**
                         * Select the image preview element.
                         */
                        const imagePreviewElement = document.querySelector("#preview-selected-image");
                        /**
                         * Assign the path to the image preview element.
                         */
                        imagePreviewElement.src = imageSrc;
                        /**
                         * Show the element by changing the display value to "block".
                         */
                        imagePreviewElement.style.display = "block";
                        $('#svg').hide();

                    }
                };
            </script>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="dob" :value="__('Date of birth')" />
            <x-text-input id="dob" name="dob" type="date" class="mt-1 block w-full" :value="old('dob')"
                required autofocus autocomplete="dob" />
            <x-input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username')"
                required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" id="role" class="w-full mt-2 rounded-lg appearance-none">
                <option value="1">Admin</option>
                <option value="2">CSR</option>
                <option value="3">Rider</option>
            </select>
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')"
                autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="alt_phone" :value="__('Alternative Phone')" />
            <x-text-input id="alt_phone" name="alt_phone" type="text" class="mt-1 block w-full" :value="old('alt_phone')"
                autofocus autocomplete="alt_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('alt_phone')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Gender')" />

            <div class="flex gap-4 items-center mt-2">
                <div class="flex gap-2 text-white items-center text-lg">
                    <input type="radio" name="gender" id="male" value="1">
                    <label for="male">Male</label>
                </div>
                <div class="flex gap-2 text-white items-center text-xl">
                    <input type="radio" name="gender" id="female" value="2">
                    <label for="female">Female</label>
                </div>
                <div class="flex gap-2 text-white items-center text-xl">
                    <input type="radio" name="gender" id="others" value="3">
                    <label for="others">Others</label>
                </div>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('gender')" />

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-lime-600 dark:text-lime-400">{{ __('Profile Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
