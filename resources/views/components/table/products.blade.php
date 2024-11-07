@props(['products' => [], 'categories' => []])
<div>
    <div class="overflow-x-auto">
        <div class="flex items-center justify-center space-x-2 mb-8 {{ request()->has('category') ? 'hidden' : '' }}">
            <a href="{{ route("admin.products.create") }}" class="btn btn-outline btn-circle btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

            </a>
            <button class="btn btn-outline btn-circle" onclick="my_modal_1.showModal()"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
            </button>
            <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Filter Products</h3>
                    <p class="py-4">
                        <a href="{{ route('admin.products.index', ['all' => 'on']) }}"
                            class="btn btn-secondary w-full">Show all , No Pages</a>
                    </p>
                    <p class="py-4">
                        <!-- Link to view only new products -->
                        <a href="{{ route('admin.products.index', ['new' => 'on']) }}"
                            class="btn btn-primary w-full">Show New Products</a>
                    </p>
                    <p class="py-4">
                        <!-- Link to view only products with no category -->
                        <a href="{{ route('admin.products.index', ['no_category' => 'on']) }}"
                            class="btn btn-accent w-full">Show Products Without Category</a>
                    </p>

                    <div class="modal-action">
                        <div>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-error">Clear
                                Filter</a>
                        </div>
                        <form method="dialog">
                            <button class="btn">Close</button>
                        </form>

                    </div>
                </div>
            </dialog>

            <form action="{{ route('admin.products.index') }}" method="GET" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}"
                    class="input input-bordered w-full max-w-xs" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>


        </div>
        @if (request()->has('category'))
            @php
                $currentCategory = \App\Models\Category::find(request()->input('category'));
            @endphp
            <div class="flex items-center justify-center font-bold mt-4 mb-5 space-x-5">
                <div>{{ $currentCategory ? $currentCategory->name : 'Unknown Category' }}</div>
                <div><a href="{{ route('admin.categories') }}" class="btn btn-neutral btn-sm">Go Back</a></div>
            </div>
        @endif
        <div>

        </div>
        <div class="my-2">
            {{ $products->links('vendor.pagination.simple-tailwind') }}

        </div>
        <table class="table table-sm">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Enabled</th>
                    <th>Featured</th>
                    <th>Category</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr id="product-{{ $product->id }}">
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle h-12 w-12">
                                        @if ($product->image_url)
                                            <img src="{{ asset($product->image_url) }}" />
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $product->name }}</div>
                                    @if ($product->new)
                                        <span class="badge badge-sm badge-secondary">NEW</span>
                                    @endif

                                </div>
                            </div>
                        </td>
                        <td class="">
                            @if ($product->description)
                                <span class="text-xsm">{{ $product->description }}</span>
                            @else
                                <span class="text-red-500 font-bold">No description</span>
                            @endif
                        </td>
                        <td class="font-bold cursor-pointer toggle-status {{ $product->enabled ? 'text-success' : 'text-error' }}"
                            data-id="{{ $product->id }}" data-type="enabled">
                            {{ $product->enabled ? 'Yes' : 'No' }}
                        </td>
                        <td class="font-bold cursor-pointer toggle-status {{ $product->featured ? 'text-success' : 'text-error' }}"
                            data-id="{{ $product->id }}" data-type="featured">
                            {{ $product->featured ? 'Yes' : 'No' }}
                        </td>
                        <td>
                            <select
                                class="select select-bordered {{ $product->category ? 'select-primary' : 'select-error' }} w-full"
                                onchange="updateCategory({{ $product->id }}, this)">
                                <option value="" {{ is_null($product->category_id) ? 'selected' : '' }}>No
                                    Category
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <th>
                            <div class="join">


                                <a href="{{ route('admin.products.show', $product->id) }}"
                                    class="btn join-item btn-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn join-item btn-sm">
                                    <!-- Edit Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
                                    id="delete-form-{{ $product->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn join-item btn-sm text-error"
                                        onclick="confirmDelete({{ $product->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                        </svg>
                                    </button>
                                </form>

                                <script>
                                    function confirmDelete(productId) {
                                        const deleteForm = document.getElementById('delete-form-' + productId);

                                        // Show confirmation prompt
                                        const confirmation = confirm("Are you sure you want to delete this product? This action cannot be undone.");

                                        if (confirmation) {
                                            // If the user confirms, submit the form
                                            deleteForm.submit();
                                        }
                                    }
                                </script>


                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="my-2">
            {{ $products->withQueryString()->links('vendor.pagination.tailwind') }}

        </div>
        <div id="toast" class="toast toast-bottom toast-end hidden">
            <div id="toast-alert" class="alert alert-success">
                <span></span>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('search');

        if (searchTerm) {
            // Escape special characters in the search term for regex
            const regex = new RegExp(searchTerm.replace(/[-/\\^$*+?.()|[\]{}]/g, '\\$&'), 'gi');

            // Get all table rows and highlight matching text in Name and Description columns (index 0 and 1)
            document.querySelectorAll('table tbody tr').forEach(row => {
                row.querySelectorAll('td').forEach((cell, index) => {
                    if (index === 0 || index ===
                        1) { // Only target Name (index 0) and Description (index 1)
                        // Extract the visible text from each cell
                        const originalText = cell.textContent;

                        // Check for matches and wrap them in <span> if found
                        if (regex.test(originalText)) {
                            const highlightedText = originalText.replace(regex, match => {
                                return `<span class="highlight">${match}</span>`;
                            });
                            // Apply only the highlighted text to the cell without affecting the HTML structure
                            cell.innerHTML = highlightedText;
                        }
                    }
                });
            });
        }
    });
</script>

<style>
    .highlight {
        background-color: rgba(255, 255, 0, 0.282);
        /* Highlight color */
        font-weight: bold;
        border-radius: 5px;
        padding: 2px 5px;
    }
</style>
