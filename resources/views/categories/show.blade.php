<x-admin-layout>
    <div class="space-y-6 mt-5 px-4 sm:px-6 lg:px-8">
        <!-- Category Card -->
        <div class="card bg-base-100 shadow-xl p-6 rounded-lg">
            <!-- Category Name -->
            <h1 class="font-bold text-xl sm:text-2xl">
                <span class="text-base-content/70">Category:</span> {{ $category->name }}
            </h1>

            <!-- Products Count -->
            <h1 class="text-lg">
                This category has <a class="badge badge-neutral cursor-pointer">{{ $category->products->count() }}</a> products
            </h1>

            <!-- Description -->
            <h1 class="text-lg">
                <span class="text-base-content/70">Description:</span> {{ $category->description }}
            </h1>

            <!-- Enabled Status -->
            <h1 class="text-lg">
                <span class="text-base-content/70">Enabled:</span>
                @if ($category->enabled)
                    <span class="badge badge-success">YES</span>
                @else
                    <span class="badge badge-error font-bold">NO</span>
                @endif
            </h1>

            <!-- Date Created -->
            <h1 class="text-lg">
                Date Created: {{ $category->created_at->format('F d, Y') }}
            </h1>
        </div>

        <!-- Action Buttons (Delete & Edit) -->
        <div class="flex flex-wrap gap-4">
            <!-- Delete Button -->
            <form action="{{ route('admin.categories.delete', $category) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-error flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                    Delete
                </button>
            </form>

            <!-- Edit Button -->
            <a class="btn btn-sm btn-primary flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
                Edit
            </a>
        </div>
    </div>
</x-admin-layout>
