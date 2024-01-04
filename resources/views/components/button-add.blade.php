<button {{ $attributes->merge([
    'type' => 'button', 
    'style' => 'border: 2px solid #2C39DD; border-radius: 9999px;', // Estilos en línea
    'class' => 'inline-flex items-center px-4 py-2 bg-white rounded-full font-semibold text-sm text-black tracking-widest shadow-sm hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
]) }}>
    {{ $slot }}
</button>
