<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Item Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update item information and price details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('inventory.store', ['company' => $companyId]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        <!-- image -->
        <input type="hidden" name="company_id" value="{{ $companyId }}">
        <div>
            <div class="rounded-lg mt-2 object-cover flex flex-col gap-2" alt="image" id="UploadImg">
                <div class="preview">
                    <img id="preview-selected-image" class="rounded-lg w-32 h-32 object-cover" />
                </div>
                <svg id="svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="white" class="w-16 h-16">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                </svg>
                <p class="text-white">{{ __('Upload Item Image') }}</p>

                <script>
                    $("#UploadImg").click(function() {
                        $("#image").trigger('click');
                    })
                </script>
            </div>
        </div>
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
