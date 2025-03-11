@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'font-bold text-sm border-gray-300 focus:border-[#047857] focus:ring-[#047857] rounded-2xl shadow-sm placeholder-[#047857]']) }}>
