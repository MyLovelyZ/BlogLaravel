<x-guest-layout>
    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="user_cred" :value="__('Email or Username')" />
            <x-text-input id="user_cred" class="block mt-1 w-full" type="text" name="user_cred" :value="old('user_cred')" required autofocus autocomplete="user_cred" />
            <x-input-error :messages="$errors->get('user_cred')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm border-gray-300 text-indigo-600 shadow-xs focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Sign in to your account
            </h1>

            <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                {{-- email / username --}}
                <div>
                    <label for="user_cred" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email or Username
                    </label>

                    <input type="text" 
                        name="user_cred" 
                        id="user_cred" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="email@example.com or username" 
                        value="{{ old('user_cred') }}" 
                        required 
                        autofocus 
                        autocomplete="user_cred">

                    <x-input-error :messages="$errors->get('user_cred')" class="mt-2" />
                </div>

                {{-- password --}}
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>
                    <input type="password" 
                        name="password" 
                        id="password" 
                        placeholder="••••••••" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        required 
                        autocomplete="current-password">
                    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- remember me + forgot password --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" 
                                name="remember" 
                                type="checkbox" 
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 hover:cursor-pointer">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:cursor-pointer">
                    {{ __('Sign in') }}
                </button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    {{ __('Don’t have an account yet?') }} 
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                        {{ __('Sign up') }}
                    </a>
                </p>
            </form>
        </div>
</x-guest-layout>
