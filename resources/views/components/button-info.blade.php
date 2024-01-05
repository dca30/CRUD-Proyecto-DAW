<button {{ $attributes->merge([
    'type' => 'button', 
    'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-full font-semibold text-sm text-white tracking-widest active:bg-gray-900 shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
    'style' => 'border-radius: 999px; min-height: 35px;',
]) }}>
    {{ $slot }}
</button>
