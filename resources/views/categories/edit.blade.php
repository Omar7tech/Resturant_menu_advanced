<x-admin-layout nav_title="Edit Category">
    <div class="container mx-auto max-w-3xl p-6  rounded-lg shadow mt-10">
        <h2 class="text-xl font-semibold mb-6">Edit Category : <span class="text-info">{{ $category->name }}</span></h2>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Category Name Field -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Category Name</span>
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Enter category name"
                    class="input input-bordered w-full"
                />

            </div>

            <!-- Description Field -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Description</span>
                </label>
                <textarea
                    name="description"
                    placeholder="Enter description here"
                    class="textarea textarea-bordered w-full">{{ old('description', $category->description) }}</textarea>

            </div>

            <!-- Submit Button -->
            <div class="form-control mt-6">
                <button type="submit" class="btn btn-success w-full">Save Changes</button>
            </div>
        </form>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mt-4 p-4 bg-error border-l-4 border-error text-error">
                <h3 class="font-semibold">Please fix the following errors:</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-admin-layout>
