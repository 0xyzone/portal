<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Item Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update item information and price details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('order.store', ['company' => $companyId]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        <!-- image -->
        <input type="hidden" name="company_id" value="{{ $companyId }}">
        
        <div>
            <x-text-input id="image" name="image" type="file" class="mt-1 w-full" autofocus autocomplete="image" onchange="previewImage(event);" hidden />
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
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price *')" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old('price')"
                autocomplete="price" />
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label for="stock" :value="__('Stock (optional)')" />
            <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" :value="old('stock')"
                autocomplete="stock" />
            <x-input-error class="mt-2" :messages="$errors->get('stock')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Create') }}</x-primary-button>
        </div>
    </form>
</section>
