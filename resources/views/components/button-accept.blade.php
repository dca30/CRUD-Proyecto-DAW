<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-3 py-1 border border-transparent rounded-full font-semibold text-sm text-white tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150',
    'style' => 'background-color: #2C39DD; hover:#2C39DD; active:#2C39DD;',
]) }}>
    {{ $slot }}
</button>
