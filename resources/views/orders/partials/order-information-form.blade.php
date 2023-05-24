<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Order Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Fill out customer information') }}
        </p>
    </header>

    <form method="post" action="{{ route('order.store', ['company' => $companyId]) }}" class="mt-6 space-y-6">
        @csrf

        <input type="number" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>
        <input type="text" name="order_status" id="order_status" value="pending" hidden>

        <div>
            <x-input-label for="customer_name" :value="__('Customer Name *')" />
            <x-text-input id="customer_name" name="customer_name" type="text" class="mt-1 block w-full"
                :value="old('customer_name')"  autofocus autocomplete="customer_name" />
            <x-input-error class="mt-2" :messages="$errors->get('customer_name')" />
        </div>

        <div>
            <x-input-label for="customer_email" :value="__('Customer Email (optional)')" />
            <x-text-input id="customer_email" name="customer_email" type="email" class="mt-1 block w-full"
                :value="old('customer_email')" autocomplete="customer_email" />
            <x-input-error class="mt-2" :messages="$errors->get('customer_email')" />
        </div>

        <div>
            <x-input-label for="customer_address" :value="__('Customer Address *')" />
            <x-text-input id="customer_address" name="customer_address" type="text" class="mt-1 block w-full"
                :value="old('customer_address')"  autocomplete="customer_address" />
            <x-input-error class="mt-2" :messages="$errors->get('customer_address')" />
        </div>

        <div>
            <x-input-label for="in_out" :value="__('Inside or Outside Valley? *')" />
            <select name="in_out" id="in_out"
                class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 dark:focus:border-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 rounded-md shadow-sm">
                <option value="inside" @if (old('in_out') == 'inside') selected @endif>Inside Valley</option>
                <option value="inside" @if (old('in_out') == 'outside') selected @endif>Outside Valley</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('in_out')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone Number *')" />
            <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full" :value="old('phone')"
                 autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="alt-phone" :value="__('Alternative Phone Number (optional)')" />
            <x-text-input id="alt-phone" name="alt-phone" type="number" class="mt-1 block w-full" :value="old('alt-phone')"
                autocomplete="alt-phone" />
            <x-input-error class="mt-2" :messages="$errors->get('alt-phone')" />
        </div>

        <div>
            <x-input-label for="note" :value="__('Note')" />
            <textarea name="note" class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-emerald-500 dark:focus:border-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 rounded-md shadow-sm resize-none" id="textarea">{{ old('note') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('note')" />
            <script>
                var textarea = document.getElementById("textarea");

                textarea.oninput = function() {
                    textarea.style.height = "";
                    /* textarea.style.height = Math.min(textarea.scrollHeight, 300) + "px"; */
                    textarea.style.height = textarea.scrollHeight + "px"
                };
            </script>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Create') }}</x-primary-button>
        </div>
    </form>
</section>
