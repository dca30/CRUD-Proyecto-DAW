<section class="space-y-6">
    <header class="space-y-6">
        <h2 class="text-lg fw-bold font-medium text-gray-900">
            {{ __('Edit User') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Edit or delete existent users') }}
        </p>
    </header>
    <a href="{{ route('admin.edit') }}">
        <x-button-add class="mt-4">
            {{ __('Edit') }}
        </x-button-add>
    </a>
</section>