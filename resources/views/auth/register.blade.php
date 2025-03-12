<x-guest-layout>
    <div class="min-h-screen bg-white text-gray-900 flex justify-center">
        <div class="max-w-screen-2xl bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <!-- Left Side Image -->
            <div class="flex-1 bg-[#FFFFFF] text-center hidden lg:flex items-center justify-center">
                <div class="flex-1 bg-white text-center hidden lg:flex items-center justify-center">
                    <img class="align-middle" src="assets/images/amico.png" style="width: 300px; height: 300px;"
                        alt="Deskripsi gambar">
                </div>
            </div>

            <!-- Right Side Form -->
            <div class=" max-w-screen-2xl bg-[#047857] shadow  flex justify-center flex-1">
                <div class="lg:w-1/2 xl:w-1/2 m-auto px-6">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col items-center">
                            <h1 class="text-2xl xl:text-3xl font-inter text-white">
                                Daftar
                            </h1>
                            <div class="w-full flex-1 mt-2">
                                <div class="w-full mt-2 flex justify-center items-center">
                                    <div
                                        class="bg-[rgba(255,255,255,0.5)] shadow-lg border-[1px] border-[#F4F4F4]
                                        rounded-lg p-6 w-[500px] min-w-[450px] max-w-[450px] h-[600px]">

                                        <!-- Avatar Upload -->
                                        <div class="text-center mb-4">
                                            <div class="relative">
                                                <img id="avatar-preview"
                                                    class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 mx-auto"
                                                    src="{{ asset('storage/avatars/default-avatar.png') }}"
                                                    alt="Avatar Preview">
                                                <label for="avatar"
                                                    class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-1 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M17.5 3.5a1 1 0 011 1V16a1 1 0 01-1 1h-15a1 1 0 01-1-1V4.5a1 1 0 011-1h15zM3 7h14v9H3V7zM16 5H4v1h12V5zM5 8h2a1 1 0 100-2H5a1 1 0 100 2zm8 1h2a1 1 0 100-2h-2a1 1 0 100 2z" />
                                                    </svg>
                                                </label>
                                                <input id="avatar" name="avatar" type="file" accept="image/*"
                                                    class="hidden" onchange="previewAvatar(event)">
                                            </div>
                                            <p class="text-sm text-gray-500 mt-2">Upload your avatar</p>
                                            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                                        </div>

                                        <!-- Name -->
                                        <div class="flex">
                                            <x-text-input id="name"
                                                class="block mt-1 w-[400px] h-[55px] rounded-lg bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                type="text" name="name" :value="old('name')" required autofocus
                                                autocomplete="name" placeholder="Nama"/>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-text-input id="email"
                                                class="block mt-6 w-[400px] h-[55px] rounded-lg bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                type="email" name="email" :value="old('email')" required
                                                autocomplete="username" placeholder="Alamat Email"/>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-text-input id="password"
                                                class="block mt-6 w-[400px] h-[55px] rounded-lg bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                type="password" name="password" required autocomplete="new-password" placeholder="Kata Sandi"/>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-text-input id="password_confirmation"
                                                class="block mt-6 w-[400px] h-[55px] rounded-lg bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                                type="password" name="password_confirmation" required
                                                autocomplete="new-password" placeholder="Konfirmasi Kata Sandi"/>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <!-- Register Button -->
                                        <x-primary-button class="mt-6 w-full underline">
                                            {{ __('Daftar') }}
                                        </x-primary-button>

                                        <div class="flex items-center justify-center space-x-1 mt-6">
                                            <p class="text-white text-sm">Sudah punya akun?</p>
                                            <a class="underline text-sm text-[#FFD836] hover:text-[#047857] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                href="{{ route('login') }}">
                                                {{ __('Masuk') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/images/Frame 11.png') }}"
                        class="absolute bottom-0 left-[1210px] w-[229px] h-[227px]" alt="Petani">
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('avatar-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-guest-layout>
