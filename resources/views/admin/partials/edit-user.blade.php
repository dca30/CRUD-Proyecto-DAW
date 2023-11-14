<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit User') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Edit or delete existent users') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit-user')">
        {{ __('Edit') }}</x-danger-button>
    <x-modal name="edit-user" :show="$errors->userCreation->isNotEmpty()" focusable>
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Search User (id, username, email)') }}
                    </h2>
                    <div class="form-group">
                        <input type="text" name="search" id="search" placeholder="Enter search name"
                            class="form-control" onfocus="this.value=''">
                    </div>
                    <div id="search_list"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('admin.search') }}",
                    type: "GET",
                    data: {
                        'search': query
                    },
                    success: function(data) {
                        $('#search_list').html(data);
                    }
                });
                //end of ajax call
            });
        });
        </script>
    </x-modal>
</section>