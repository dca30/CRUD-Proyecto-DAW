<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-full font-semibold text-sm text-white tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150',
    'style' => 'background-color: #960404; hover:#960404; active:#960404; ',
]) }}>
    {{ $slot }}
</button>
