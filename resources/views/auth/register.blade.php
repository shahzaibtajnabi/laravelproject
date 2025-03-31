<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="container mx-auto flex flex-wrap items-center justify-center h-screen bg-pink-100">
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="w-3/4" alt="Sample image">
            </div>
            <div class="w-full md:w-1/3 bg-pink-200 p-6 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="text-center mb-4">
                        <p class="text-lg font-semibold text-pink-700">Sign up with</p>
                        <div class="flex justify-center gap-2 mt-2">
                            <button type="button" class="bg-pink-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-pink-600">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="bg-pink-400 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-pink-500">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="bg-pink-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-pink-700">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>
                    </div>

                    <div class="text-center my-4">
                        <p class="text-pink-600">Or</p>
                    </div>

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" class="text-pink-700 font-semibold" />
                        <x-input id="name" class="block mt-1 w-full p-2 border border-pink-400 rounded-md focus:ring focus:ring-pink-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" class="text-pink-700 font-semibold" />
                        <x-input id="email" class="block mt-1 w-full p-2 border border-pink-400 rounded-md focus:ring focus:ring-pink-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" class="text-pink-700 font-semibold" />
                        <x-input id="password" class="block mt-1 w-full p-2 border border-pink-400 rounded-md focus:ring focus:ring-pink-500" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-pink-700 font-semibold" />
                        <x-input id="password_confirmation" class="block mt-1 w-full p-2 border border-pink-400 rounded-md focus:ring focus:ring-pink-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" class="text-pink-600" required />
                                    <div class="ml-2 text-pink-700">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-pink-600 hover:text-pink-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-pink-600 hover:text-pink-800">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-between mt-4">
                        <a class="text-sm text-pink-700 hover:underline" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="py-2 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-md shadow-lg transition-all">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
