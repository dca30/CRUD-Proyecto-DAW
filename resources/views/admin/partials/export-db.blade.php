<section class="space-y-6">
    <header class="mb-3">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Download database') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Export the database to an .sql file. This will not affect the current state of the database.') }}
        </p>
    </header>

    <a href="{{ route('admin.exportDB') }}">
        <x-danger-button>{{ __('Export Database') }}</x-danger-button>
    </a>
</section>