<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add items to order') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Fill out customer information') }}
        </p> --}}
    </header>

    <form method="post" action="{{ route('order.store.item', ['company' => $companyId, 'order' => $orderId]) }}"
        class="mt-6 space-y-6">
        @csrf
        @method('PUT')
        <script>
            $(function() {
                $("#item_id").select2();
            });
        </script>
        <input type="number" name="order_id" id="order_id" value="{{ $orderId }}" hidden>
        <div>
            <select name="item_id" id="item_id" class="w-full !border-gray-300 dark:!border-gray-700 dark:!bg-gray-900 dark:!text-gray-300 focus:!border-emerald-500 dark:focus:!border-emerald-600 focus:!ring-emerald-500 dark:focus:!ring-emerald-600 !rounded-md !shadow-sm">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
            </select>
        </div>

        <div>
            <x-input-label for="quantity" :value="__('Quantity *')" />
            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" :value="old('quantity')"
                autocomplete="quantity" />
            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Add') }}</x-primary-button>
        </div>
    </form>
</section>
