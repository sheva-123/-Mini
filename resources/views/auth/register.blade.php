<x-guest-layout>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <!-- Left Side Image -->
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex items-center justify-center"
            style="background-image: url('assets/images/bg/bglg.jpg'); background-size: cover; background-position: center;">
                <dotlottie-player class="align-middle"
                    src="https://lottie.host/d921c873-4bbc-4ed0-8f94-cf17a0b052f8/3T2RfVZuyy.lottie"
                    speed="3" style="width: 300px; height: 300px" loop
                    autoplay>
                </dotlottie-player>
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            </div>

            <!-- Right Side Form -->
            <div class="lg:w-1/2 xl:w-1/2 m-auto px-6">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl font-extrabold">
                            Daftar
                        </h1>
                        <div class="w-full flex-1 mt-8">

                            <div class="w-full flex flex-1 items-center justify-center mt-8">
                                <div class="bg-white shadow-lg rounded-lg p-6 max-w-sm w-full">
                                    <!-- Avatar Upload -->
                                    <div class="text-center mb-6">
                                        <div class="relative">
                                            <img id="avatar-preview"
                                                class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 mx-auto"
                                                src="{{ asset('storage/images/default-avatar.png') }}"
                                                alt="Avatar Preview">
                                            <label for="avatar" class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-1 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.5 3.5a1 1 0 011 1V16a1 1 0 01-1 1h-15a1 1 0 01-1-1V4.5a1 1 0 011-1h15zM3 7h14v9H3V7zM16 5H4v1h12V5zM5 8h2a1 1 0 100-2H5a1 1 0 100 2zm8 1h2a1 1 0 100-2h-2a1 1 0 100 2z"/>
                                                </svg>
                                            </label>
                                            <input id="avatar" name="avatar" type="file" accept="image/*"
                                                class="hidden"
                                                onchange="previewAvatar(event)">
                                        </div>
                                        <p class="text-sm text-gray-500 mt-2">Upload your avatar</p>
                                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                                    </div>

                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                            type="password" name="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                            type="password" name="password_confirmation" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <!-- Register Button -->
                                    <x-primary-button class="mt-4 w-full underline">
                                        {{ __('Daftar') }}
                                    </x-primary-button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('avatar-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-guest-layout>
