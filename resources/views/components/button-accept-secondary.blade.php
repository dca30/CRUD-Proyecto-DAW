<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-3 py-1 border border-transparent rounded-full font-semibold text-sm text-black tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150',
    'style' => 'background-color: #9CA9E5; hover:#9CA9E5; active:#9CA9E5;',
]) }}>
    {{ $slot }}
</button>
