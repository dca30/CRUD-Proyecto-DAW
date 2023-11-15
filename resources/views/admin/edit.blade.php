<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
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
                    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                    crossorigin="anonymous">
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
                    });
                });
                </script>
        </div>
    </div>
</x-app-layout>