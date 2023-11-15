<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit User') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Edit or delete existent users') }}
        </p>
    </header>
    <a href="{{ route('admin.edit') }}">
        <x-danger-button>
            {{ __('Edit') }}
        </x-danger-button>

    </a>


</section>