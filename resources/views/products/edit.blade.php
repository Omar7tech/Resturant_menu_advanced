<x-admin-layout nav_title="Edit Product">
    <div class="p-8 bg-base-100 shadow-lg rounded-lg max-w-4xl mx-auto my-10">
        <h1 class="text-3xl font-bold text-primary mb-6">Edit Product: {{ $product->name }}</h1>
        @if ($product->image_url)
            <form action="{{ route('admin.products.delete.image', ['product' => $product->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-error btn-sm">
                    Delete Image <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>

                </button>
            </form>
        @endif
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="form-control">
                <label for="name" class="label">
                    <span class="label-text">Product Name</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                    class="input input-bordered" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label for="description" class="label">
                    <span class="label-text">Description</span>
                </label>
                <textarea name="description" id="description" class="textarea textarea-bordered">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="price" class="label">
                        <span class="label-text">Price</span>
                    </label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                        step="0.01" class="input input-bordered" />
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="new_price" class="label">
                        <span class="label-text">New Price</span>
                    </label>
                    <input type="number" name="new_price" id="new_price"
                        value="{{ old('new_price', $product->new_price) }}" step="0.01"
                        class="input input-bordered" />
                    @error('new_price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="preparation_time" class="label">
                        <span class="label-text">Preparation Time (minutes)</span>
                    </label>
                    <input type="number" name="preparation_time" id="preparation_time"
                        value="{{ old('preparation_time', $product->preparation_time) }}" min="0"
                        class="input input-bordered" />
                    @error('preparation_time')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="calories" class="label">
                        <span class="label-text">Calories</span>
                    </label>
                    <input type="number" name="calories" id="calories"
                        value="{{ old('calories', $product->calories) }}" min="0"
                        class="input input-bordered" />
                    @error('calories')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-control">
                <label for="image_url" class="label">
                    <span class="label-text">Image</span>
                </label>
                <input type="file" name="image_url" id="image_url" class="file-input file-input-bordered"
                    onchange="previewImage(event)" />
                <img id="image_preview" src="{{ asset($product->image_url) }}" alt="Current Product Image"
                    class="mt-2 max-w-full rounded" style="display: block;" />
                @error('image_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <h2 class="text-lg font-semibold text-gray-800">Product Attributes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Available</span>
                        <input type="checkbox" name="available" id="available" class="toggle"
                            {{ old('available', $product->available) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Enabled</span>
                        <input type="checkbox" name="enabled" id="enabled" class="toggle"
                            {{ old('enabled', $product->enabled) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">New</span>
                        <input type="checkbox" name="new" id="new" class="toggle"
                            {{ old('new', $product->new) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Top Seller</span>
                        <input type="checkbox" name="top_seller" id="top_seller" class="toggle"
                            {{ old('top_seller', $product->top_seller) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Featured</span>
                        <input type="checkbox" name="featured" id="featured" class="toggle"
                            {{ old('featured', $product->featured) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Spicy</span>
                        <input type="checkbox" name="spicy" id="spicy" class="toggle"
                            {{ old('spicy', $product->spicy) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Vegan</span>
                        <input type="checkbox" name="vegan" id="vegan" class="toggle"
                            {{ old('vegan', $product->vegan) ? 'checked' : '' }}>
                    </label>
                </div>

                <div class="form-control">
                    <label class="cursor-pointer">
                        <span class="label-text">Dairy Free</span>
                        <input type="checkbox" name="dairy_free" id="dairy_free" class="toggle"
                            {{ old('dairy_free', $product->dairy_free) ? 'checked' : '' }}>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    @if ($errors->any())
        <x-toast.error>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-toast.error>
    @endif
</x-admin-layout>

<script>
    function previewImage(event) {
        const preview = document.getElementById('image_preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
