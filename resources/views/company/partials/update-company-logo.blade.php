<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Company Logo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Upload a square shaped picture. minimum 512px x 512px") }}
        </p>
    </header>

    <div>
        @if ($company->logo)
            <img class="w-32 h-32 rounded-lg mt-2 object-cover" src="{{ '/storage/'.$company->logo  }}" alt="logo" id="UploadImg">
            <script>
                $("#UploadImg").click(function(){
                    $("#logo").trigger('click');
                })
            </script>
        @else
            <img class="w-32 mt-2" src="https://ui-avatars.com/api/?name={{ $company->name }}&background=a7f3d0&color=047857"
                alt="" id="UploadImg">
                <script>
                    $("#UploadImg").click(function(){
                        $("#logo").trigger('click');
                    })
                </script>
        @endif
    </div>

    <form method="post" action="{{ route('company.logo.update') }}" class="space-y-3" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="logo" :value="__('Update Company Logo')" />
            <x-text-input id="logo" name="logo" type="file" class="mt-1 w-full" :value="old('logo', $company->logo)"
                required autofocus autocomplete="logo" onchange="this.form.submit()" hidden/>
            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
        </div>

        <div class="flex items-center gap-4">
            <!-- <x-primary-button>{{ __('Update') }}</x-primary-button> -->

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-lime-600 dark:text-lime-400">{{ __('Logo Updated.') }}</p>
            @endif
        </div>
    </form>
</section>
