<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-6 py-12">
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-4">
                {{ __('Lupa Kata Sandi?') }}
            </h2>
            <p class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
                {{ __('Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.') }}
            </p>
    
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center text-green-600" :status="session('status')" />
    
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" class="block text-gray-700 font-semibold mb-2" />
                    <x-text-input 
                        id="email" 
                        class="block w-full bg-gray-100 border border-gray-300 rounded-md placeholder-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 p-3" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        placeholder="Masukkan email Anda" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    <x-primary-button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-md transition duration-300">
                        {{ __('Kirim Tautan') }}
                    </x-primary-button>
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-800 transition duration-200 mt-5">
                        {{ __('Kembali ke Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>    
</x-guest-layout>
