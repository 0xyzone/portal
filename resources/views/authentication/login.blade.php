<x-layout titlename="Login">
    <x-layout titlename="Registration">
        <div class="flex flex-col items-center w-full h-screen gap-10 pt-[10rem]">
            <h1 class="text-6xl font-thin lg:text-6xl" class>Login</h1>
            <form action="{{ route('authenticate') }}" class="w-full px-4 space-y-5 lg:w-4/12 lg:px-0">
                <fieldset>
                    <legend>
                        <label for="email">Email</label>
                    </legend>
                    <input type="text" name="email" id="email">
                    @error('email')
                        <p class="pt-2 text-sm font-thin text-rose-200">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset>
                    <legend>
                        <label for="password">Password</label>
                    </legend>
                    <input type="password" name="password" id="password">
                    @error('password')
                        <p class="pt-2 text-sm font-thin text-rose-200">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button type="submit" class="btn-primary">Enter</button>
                <a href="{{ route('register_user') }}" class="btn-primary">Register</a>
            </form>
        </div>
        <x-footer></x-footer>
    </x-layout>
</x-layout>
