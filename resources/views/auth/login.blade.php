<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif



        <div class="container mx-auto flex flex-wrap items-center justify-center h-screen bg-pink-200">
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="w-3/4" alt="Sample image">
            </div>
            <div class="w-full md:w-1/3 bg-pink-300 p-6 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="text-center mb-4">
                        <p class="text-lg font-semibold text-gray-800">Sign in with</p>
                        <div class="flex justify-center gap-2 mt-2">
                            <button type="button" class="bg-pink-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="bg-pink-400 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="bg-pink-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>
                    </div>

                    <div class="text-center my-4">
                        <p class="text-gray-700">Or</p>
                    </div>

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="text-gray-800 font-semibold" />
                        <x-input id="email" class="block mt-1 w-full p-2 border border-pink-400 rounded-md focus:ring focus:ring-pink-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" class="text-gray-800 font-semibold" />
                        <x-input id="password" class="block mt-1 w-full p-2 border border-pink-400 rounded-md focus:ring focus:ring-pink-500" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="flex items-center text-sm text-gray-700">
                            <x-checkbox id="remember_me" name="remember" class="text-pink-600" />
                            <span class="ml-2">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-pink-700 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="flex items-center justify-center mt-6">
                        <x-button class="w-full py-2 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-md shadow-lg transition-all">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>


    </x-authentication-card>
</x-guest-layout>

