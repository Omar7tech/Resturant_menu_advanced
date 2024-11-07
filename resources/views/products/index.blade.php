<x-admin-layout nav_title="Products">
    @if ($products->isEmpty())
    <div class="text-center my-12">
        <!-- No products found message -->
        <p class="text-3xl font-semibold text-gray-700 mb-6">It seems like there are no products available right now</p>

        <!-- Create Product button -->
        <div class="mb-6">
            <a href="{{ route('admin.products.create') }}" class="btn bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-lg px-6 py-3 transition-all hover:scale-105 hover:from-blue-600 hover:to-indigo-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add a New Product
            </a>
        </div>

        <!-- Go Back button -->
        <div>
            <a href="{{ route('admin.products.index') }}" class="btn border-2 btn-warning border-gray-300 text-gray-700 font-medium rounded-lg px-6 py-3 hover:bg-gray-100 transition-all hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>
                Go Back to Products List
            </a>
        </div>
    </div>

    @else
        <x-table.products :products="$products" :categories="$categories"></x-table.products>
    @endif

    {{--  @if ($errors->any())
        <x-toast.error>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-toast.error>
    @endif --}}
</x-admin-layout>
