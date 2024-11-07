<x-admin-layout nav_title="Add Product">
    <div class="p-8 bg-base-100 shadow-lg rounded-lg max-w-4xl mx-auto my-10">
        <h1 class="text-3xl font-bold text-primary mb-6">Add New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Product Name -->
            <div class="form-control">
                <label for="name" class="label">
                    <span class="label-text">Product Name</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="input input-bordered" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div class="form-control">
                <label for="description" class="label">
                    <span class="label-text">Description</span>
                </label>
                <textarea name="description" id="description" class="textarea textarea-bordered">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Price and New Price -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="price" class="label">
                        <span class="label-text">Price</span>
                    </label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" class="input input-bordered" />
                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label for="new_price" class="label">
                        <span class="label-text">New Price</span>
                    </label>
                    <input type="number" name="new_price" id="new_price" value="{{ old('new_price') }}" step="0.01" class="input input-bordered" />
                    @error('new_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Preparation Time and Calories -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="preparation_time" class="label">
                        <span class="label-text">Preparation Time (minutes)</span>
                    </label>
                    <input type="number" name="preparation_time" id="preparation_time" value="{{ old('preparation_time') }}" min="0" class="input input-bordered" />
                    @error('preparation_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="form-control">
                    <label for="calories" class="label">
                        <span class="label-text">Calories</span>
                    </label>
                    <input type="number" name="calories" id="calories" value="{{ old('calories') }}" min="0" class="input input-bordered" />
                    @error('calories') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Image Upload -->
            <div class="form-control">
                <label for="image_url" class="label">
                    <span class="label-text">Image</span>
                </label>
                <input type="file" name="image_url" id="image_url" class="file-input file-input-bordered" onchange="previewImage(event)" />
                <img id="image_preview" alt="Product Image Preview" class="mt-2 max-w-full rounded hidden" />
                @error('image_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Product Attributes (Check/Toggle Options) -->
            <h2 class="text-lg font-semibold text-gray-800">Product Attributes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach (['available', 'enabled', 'new', 'top_seller', 'featured', 'spicy', 'vegan', 'dairy_free'] as $attribute)
                    <div class="form-control">
                        <label class="cursor-pointer">
                            <span class="label-text capitalize">{{ str_replace('_', ' ', $attribute) }}</span>
                            <input type="checkbox" name="{{ $attribute }}" id="{{ $attribute }}" class="toggle" {{ old($attribute) ? 'checked' : '' }}>
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Product</button>
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
            preview.classList.remove('hidden');
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
