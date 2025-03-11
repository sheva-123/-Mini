<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
            <div class=" max-w-screen-2xl bg-[#047857] shadow  flex justify-center flex-1">
                <div class="lg:w-1/2 xl:w-1/2 m-auto px-6">
                    <div class=" flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl text-white font-extrabold">
                            Masuk
                        </h1>
                        <div class="w-full flex-1 mt-8">

                            <div class="w-full flex-1 flex items-center justify-center">
                                <div
                                    class="bg-[rgba(255,255,255,0.5)] shadow-lg border-[1px] border-[#F4F4F4] rounded-lg p-6 w-[500px] h-[400px]">
                                    <div class="flex justify-center">
                                        <x-text-input id="email" class="block mt-4 w-[400px] h-[55px] rounded-2xl"
                                            type="email" name="email" :value="old('email')" required autofocus
                                            autocomplete="username" placeholder="Alamat Email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mt-2 flex justify-center">
                                        <x-text-input id="password" class="block mt-8 w-[400px] h-[55px] rounded-2xl"
                                            type="password" name="password" required autocomplete="current-password"
                                            placeholder="Kata Sandi" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="block mt-4 px-7">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm"
                                                name="remember">
                                            <span class="ms-2 text-sm text-[#EEEEEE]">{{ __('Ingat Sandi') }}</span>
                                        </label>
                                    </div>

                                    <div class="flex justify-center">
                                        <x-primary-button class=" text-lg mt-4 w-[400px]">
                                            {{ __('Masuk') }}
                                        </x-primary-button>
                                    </div>

                                    <div class="flex flex-col items-center justify-center mt-4 space-y-2">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-[#FFFFFF] hover:text-[#047857] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                href="{{ route('password.request') }}">
                                                {{ __('Lupa kata sandi?') }}
                                            </a>
                                        @endif

                                        <div class="flex items-center py-2 space-x-1">
                                            <p class="text-white text-sm">Belum Punya Akun?</p>
                                            <a class="underline text-sm text-[#FFD836] hover:text-[#047857] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                                                href="{{ route('register') }}">
                                                {{ __('Daftar') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Gambar petani di pojok kiri bawah -->
                    <img src="{{ asset('assets/images/Frame 12.png') }}"
                        class="absolute bottom-0 left-16 w-[229px] h-[227px]" alt="Petani">

                </div>
                <div class="flex-1 bg-white text-center hidden lg:flex items-center justify-center">
                    <img class="align-middle" src="assets/images/amico.png" style="width: 300px; height: 300px;"
                        alt="Deskripsi gambar">
                </div>

            </div>
        </div>
        </div>
    </form>
</x-guest-layout>
