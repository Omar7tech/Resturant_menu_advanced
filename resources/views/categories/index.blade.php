<x-admin-layout nav_title="Categories">
    <x-tabs.container>
        @if ($deleted_categories->isNotEmpty())
            <x-tabs.main label="Deleted">
                <x-table.deleted-categories :$deleted_categories />
            </x-tabs.main>
        @endif



        <x-tabs.main label="Add">
            <div class="flex items-center justify-center  ">
                <form action="{{ route('admin.categories.store') }}" method="post"
                    class="space-y-6 w-full max-w-md bg-base-100 p-5 rounded-lg">
                    @csrf

                    <!-- Header -->
                    <h2 class="text-2xl font-semibold text-center text-base-content mb-4">Add New Category</h2>

                    <!-- Category Name Field -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Category Name</span>
                        </label>
                        <input type="text" placeholder="Enter category name" class="input input-bordered w-full"
                            name="name" required />
                    </div>

                    <!-- Description Field -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Description</span>
                        </label>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Enter description here" name="description"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Category</button>
                    </div>
                </form>
            </div>

        </x-tabs.main>

        <x-tabs.main label="Statistics">
            @if ($categories->isNotEmpty())
                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div
                        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                        <div class="w-max rounded-lg bg-gray-900 p-5 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Product Statistics by Category
                            </h6>
                            <p
                                class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                                Visualize product data by category.
                            </p>
                        </div>
                    </div>
                    <div class="pt-6 px-2 pb-0">
                        <div id="category-chart"></div>
                    </div>
                </div>
            @else
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>No Categories</span>
                </div>
            @endif
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

            <script>
                // Fetch categories and product data from the backend
                const categories = @json($categories->pluck('name'));
                const productCounts = @json(
                    $categories->map(function ($category) {
                        return $category->products->count(); // Get product count for each category
                    }));

                // Chart configuration
                const chartConfig = {
                    series: [{
                        name: 'Products',
                        data: productCounts, // Product counts per category
                    }],
                    chart: {
                        type: 'bar',
                        height: 240,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '40%',
                            borderRadius: 2,
                        },
                    },
                    xaxis: {
                        categories: categories, // Category names as labels
                        labels: {
                            style: {
                                colors: '#616161',
                                fontSize: '12px',
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: '#616161',
                                fontSize: '12px',
                            },
                        },
                    },
                    grid: {
                        borderColor: '#dddddd',
                        strokeDashArray: 5,
                    },
                    colors: ['#020617'], // Custom bar color
                    fill: {
                        opacity: 0.8,
                    },
                    tooltip: {
                        theme: 'dark',
                    },
                };

                const chart = new ApexCharts(document.querySelector("#category-chart"), chartConfig);
                chart.render();
            </script>
        </x-tabs.main>

        <x-tabs.main label="Main" checked="checked">
            <button class="btn mb-4" onclick="my_modal_5.showModal()">Category Manual</button>
            <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Category Manual</h3>
                    <p class="py-4 ">
                        In this Categories table, you can manage the categories for your products.
                        You can drag and drop the categories to reorder them. Click the "Save Order" button
                        to save your changes. To enable or disable a category, simply click on the "Enabled"
                        or "Featured" status directly in the table. Categories marked as "Featured" will be
                        highlighted accordingly.
                    </p>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>
            @if ($categories->isNotEmpty())
                <x-table.categories :$categories />
            @else
                <p class="my-10 font-bold text-xl text-error/100">No categories found.</p>
            @endif
        </x-tabs.main>

    </x-tabs.container>
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
