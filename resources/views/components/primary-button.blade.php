<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-5 tracking-wide font-inter bg-[#FFD836] text-gray-100 w-full py-2 rounded-lg hover:bg-gray-100 hover:text-[#047857] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none']) }}>
    {{ $slot }}
</button>
