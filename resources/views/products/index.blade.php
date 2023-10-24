<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-primary">Product</h1>
                        <div>
                            @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                            @endif
                        </div>
                        <div>
                            <div>
                                <a href="{{route('product.create')}}">Create a Product</a>
                            </div>
                            <table border="1">
                                <tr>
                                    <th class="text-primary">ID</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($products as $product )
                                @if($product->qty > 2)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->qty}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post"
                                            action="{{route('product.destroy', ['product' => $product])}}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" />
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>