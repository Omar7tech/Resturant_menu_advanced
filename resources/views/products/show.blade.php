<!-- resources/views/products/show.blade.php -->

<x-admin-layout nav_title="Product Details">
    <div class="p-6 bg-base-100 shadow-lg rounded-lg max-w-4xl mx-auto my-10">
        <div class="flex flex-col md:flex-row gap-6 items-center md:items-start">
            <!-- Product Image Section -->
            <div class="w-full md:w-1/3">
                @if ($product->image_url)
                    <img src="{{ asset($product->image_url) }}" />
                @endif

            </div>

            <!-- Product Details Section -->
            <div class="w-full">
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-primary">{{ $product->name }}</h1>
                    <p class="text-gray-600 text-md mt-2">{{ $product->description ?? 'No description available' }}</p>
                </div>

                <!-- Price and Discount Section -->
                <div class="flex items-center gap-3 mt-4">
                    <span
                        class="text-2xl font-semibold {{ $product->new_price ? 'line-through text-error' : 'text-primary' }}">
                        ${{ number_format($product->price, 2) }}
                    </span>
                    @if ($product->new_price)
                        <span
                            class="text-2xl font-semibold text-success">${{ number_format($product->new_price, 2) }}</span>
                    @endif
                </div>

                <!-- Badge Tags Section -->
                <div class="flex gap-2 mt-4">
                    @if ($product->new)
                        <span class="badge badge-secondary">New</span>
                    @endif
                    @if ($product->top_seller)
                        <span class="badge badge-success">Top Seller</span>
                    @endif
                    @if ($product->featured)
                        <span class="badge badge-info">Featured</span>
                    @endif
                    @if ($product->spicy)
                        <span class="badge badge-error">Spicy</span>
                    @endif
                    @if ($product->vegan)
                        <span class="badge badge-success">Vegan</span>
                    @endif
                    @if ($product->dairy_free)
                        <span class="badge badge-warning">Dairy-Free</span>
                    @endif
                </div>

                <!-- Additional Details Section -->
                <div class="mt-6 space-y-2">
                    <p><span class="font-semibold">Calories:</span> {{ $product->calories ?? 'N/A' }}</p>
                    <p><span class="font-semibold">Preparation Time:</span>
                        {{ $product->preparation_time ? $product->preparation_time . ' mins' : 'N/A' }}</p>
                    <p><span class="font-semibold">Category:</span> {{ $product->category->name ?? 'Uncategorized' }}
                    </p>
                    <p><span class="font-semibold">Availability:</span>
                        <span class="text-sm badge {{ $product->available ? 'badge-success' : 'badge-error' }}">
                            {{ $product->available ? 'Available' : 'Unavailable' }}
                        </span>
                    </p>
                </div>

                <!-- Back Button -->
                <div class="mt-8">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm">
                        &larr; Back to Products
                    </a>
                    <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                        class="btn btn-info btn-sm">
                        Edit<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>

                    </a>
                    @if ($product->image_url)
                        <hr class="my-3">
                        <div class="mt-3">

                            <form action="{{ route('admin.products.delete.image', ['product' => $product->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-error btn-sm">
                                    Delete Image <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>

                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
