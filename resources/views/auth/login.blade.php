<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
            <div class=" max-w-screen-2xl  bg-white shadow sm:rounded-lg flex justify-center flex-1">
                <div class="lg:w-1/2 xl:w-1/2 m-auto px-6">
                    <div class=" flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl font-extrabold">
                            Masuk
                        </h1>
                        <div class="w-full flex-1 mt-8">

                            <div class="w-full flex-1 mt-5 flex items-center justify-center">
                                <div class="bg-white shadow-lg rounded-lg p-6 max-w-sm w-full">
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email"
                                            name="email" :value="old('email')" required autofocus
                                            autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm"
                                                name="remember">
                                            <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                                        </label>
                                    </div>

                                    <x-primary-button class="mt-4 w-full">
                                        {{ __('Masuk') }}
                                    </x-primary-button>

                                    <div class="flex items-center justify-between mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                href="{{ route('password.request') }}">
                                                {{ __('Lupa kata sandi?') }}
                                            </a>
                                        @endif

                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                                            href="{{ route('register') }}">
                                            {{ __('Daftar') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-indigo-100 text-center hidden lg:flex items-center justify-center"
                    style="background-image: url('assets/images/bg/bglg.jpg'); background-size: cover; background-position: center;">
                    <dotlottie-player class="align-middle"
                        src="https://lottie.host/d921c873-4bbc-4ed0-8f94-cf17a0b052f8/3T2RfVZuyy.lottie" speed="3"
                        style="width: 300px; height: 300px" loop autoplay>
                    </dotlottie-player>
                    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                </div>

            </div>
        </div>
        </div>
    </form>
</x-guest-layout>
