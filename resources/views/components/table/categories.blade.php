@props(['categories' => ''])
<div class="overflow-x-auto">
    <table class="table table-auto bord" id="sortable-table">

        <thead>
            <tr>

                <th>Name</th>
                <th>Description</th>
                <th>Enabled</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr data-id="{{ $category->id }}"
                    class=" cursor-grab {{ $category->products->isEmpty() ? 'bg-error/20' : '' }}">
                    <td class="font-bold">{{ $category->name }} <span
                            class="text-primary ms-2">{{ !$category->products->isEmpty() ? '(' . $category->products->count() . ')' : '' }}</span>
                    </td>
                    <td>{{ $category->description }}</td>
                    <td class="font-bold toggle-enabled cursor-pointer {{ $category->enabled ? 'text-success' : 'text-error' }}"
                        data-id="{{ $category->id }}">
                        {{ $category->enabled ? 'Yes' : 'No' }}
                    </td>
                    <td class="font-bold toggle-featured cursor-pointer {{ $category->featured ? 'text-success' : 'text-error' }}"
                        data-id="{{ $category->id }}">
                        {{ $category->featured ? 'Yes' : 'No' }}
                    </td>
                    <td>
                        <div class="join">
                            <a href="{{ $category->products->count() > 0 ? route('admin.products.index', ['category' => $category->id]) : '#' }}"
                                class="btn join-item btn-sm {{ $category->products->count() > 0 ? '' : 'btn-disabled' }}"
                                title="{{ $category->products->count() > 0 ? 'View products in this category' : 'No products available in this category' }}">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                           d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0 .515.045.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                                 </svg>
                             </a>

                            <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}"
                                class="btn join-item btn-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="btn join-item btn-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.categories.delete', $category) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn join-item btn-sm text-error"><svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button id="save-sort" class="btn btn-primary mt-4">Save Order</button>
</div>
