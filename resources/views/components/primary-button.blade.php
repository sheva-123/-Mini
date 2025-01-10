<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none']) }}>
    {{ $slot }}
</button>
