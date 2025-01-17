
<x-guest-layout>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <!-- Left Side Image -->
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex items-center justify-center" 
            style="background-image: url('assets/images/bg/logre.png'); background-size: cover; background-position: center;">
            <dotlottie-player class="align-middle" 
                src="https://lottie.host/d921c873-4bbc-4ed0-8f94-cf17a0b052f8/3T2RfVZuyy.lottie"
                speed="3" style="width: 300px; height: 300px" loop
                autoplay>
            </dotlottie-player>
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
        </div>
            <!-- Right Side Form -->
            <div class="lg:w-1/2 xl:w-1/2 m-auto px-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl font-extrabold">
                            Daftar
                        </h1>
                        <div class="w-full flex-1 mt-8">

                            <div class="w-full flex items-center justify-center mt-2">
                                <div class="bg-white shadow-lg rounded-lg p-6">
                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" 
                                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                            
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" 
                                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                            
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" 
                                            type="password" name="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                            
                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" 
                                            type="password" name="password_confirmation" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                            
                                    <!-- Register Button -->
                                    <x-primary-button class="mt-4 w-full">
                                        {{ __('Daftar') }}
                                    </x-primary-button>
                            
                                    <div class="flex items-center justify-between mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                            {{ __('Belum punya akun?') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

