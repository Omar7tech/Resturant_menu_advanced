<x-admin-layout nav_title="Admin Dashboard">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="container mx-auto px-4 ">
        <div class="grid lg:grid-cols-5 sm:grid-cols-2 gap-3 mb-8 justify-stretch">
            <a href="{{ route('admin.products.index') }}" class="btn btn-active">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>

                Products
            </a>
            <a href="{{ route('admin.categories') }}" class="btn btn-active"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                Categories
            </a>
            <a href="{{ route('admin.settings') }}" class="btn btn-active"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                </svg>
                Settings
            </a>
            <a href="{{ route('home') }}" class="btn btn-active text-success" target="_blank"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path
                        d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z" />
                </svg>

                View Site
            </a>
            <a href="{{ route('logout') }}" class="btn btn-active text-error">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
              </svg>


                Logout
            </a>

        </div>

        <hr>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8 mt-8">
            <div class="card p-6 border rounded-lg bg-gradient-to-r from-primary to-secondary text-white shadow-xl">
                <h3 class="text-xl font-medium mb-4">Total Products</h3>

                    @if ($totalProducts > 0)
                    <p class="text-4xl font-bold">{{ $totalProducts }}
                        <a href="{{ route('admin.products.index') }}" class="btn btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </a>
                    @else
                        <h1 class="text-error">No Products</h1>
                    @endif
                    <a href="{{ route('admin.products.create') }}" class="btn btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                    </a>
                </p>
            </div>

            <!-- Total Categories -->
            <div
                class="card p-6 border-2 border-transparent rounded-lg bg-gradient-to-r from-blue-500 via-indigo-600 to-purple-700 text-white shadow-lg ">
                <h3 class="text-xl font-medium mb-4">Total Categories</h3>

                    @if ($totalCategories > 0)
                    <p class="text-3xl font-bold">{{ $totalCategories }}
                        <a href="{{ route('admin.categories') }}" class="btn btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    @else
                        <h1 class="text-error">No Categories</h1>
                    @endif
                </p>
            </div>
            <div
                class="card p-6 border-2 border-success rounded-lg bg-gradient-to-r from-green-400 to-blue-500 text-white shadow-lg ">
                <h3 class="text-xl font-medium mb-4">Uncategorized Products</h3>
                <p class="text-3xl font-bold">{{ $totalUnCategorized }}
                    @if ($totalUnCategorized > 0)
                        <a href="{{ route('admin.products.index', ['no_category' => 'on']) }}" class="btn btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    @endif

                </p>
            </div>

            <!-- Featured Products -->
            <div
                class="card p-6 border rounded-lg bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 text-white shadow-2xl transform ">
                <h3 class="text-xl font-medium mb-4">Featured Products</h3>
                <p class="text-3xl font-bold">{{ $totalFeaturedProducts }}</p>
            </div>

            <!-- Top Sellers -->
            <div
                class="card p-6 border-2 border-success rounded-lg bg-gradient-to-r from-green-400 to-blue-500 text-white shadow-lg ">
                <h3 class="text-xl font-medium mb-4">Top Sellers</h3>
                <p class="text-3xl font-bold">{{ $totalTopSellers }}</p>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2  mt-5 gap-6">
            <!-- Bar Chart - Products by Category -->
            <div class="card p-6 border rounded-lg">
                <h3 class="text-xl font-medium">Products by Category</h3>
                <canvas id="productsByCategoryChart"></canvas>
            </div>

            <!-- Pie Chart - Featured vs Regular Products -->
            <div class="card p-6 border rounded-lg">
                <h3 class="text-xl font-medium">Featured vs Regular Products</h3>
                <canvas id="featuredProductsChart"></canvas>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Site Name -->
            <div class="card shadow-lg bg-base-100 w-full p-6 ">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Site Name:</h3>
                    <p class="text-3xl font-bold">{{ $settings['name'] ?? 'Big Bunz' }}</p>
                </div>
            </div>

            <!-- Display Style -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Display Style:</h3>
                    <p class="text-xl font-bold">{{ ucfirst($settings['display'] ?? 'cards') }}</p>
                </div>
            </div>

            <!-- Show Image -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Image:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_image'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_image'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Description -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Description:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_description'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_description'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Menu -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Menu:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_menu'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_menu'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Title -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Title:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_title'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_title'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Search -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Search:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_search'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_search'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Footer -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Footer:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_footer'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_footer'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Food Count -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Food Count:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_food_count'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_food_count'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Allow Theme Change -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Allow Theme Change:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['allow_theme_change'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['allow_theme_change'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Features -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Features:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_features'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_features'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Calories -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Calories:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_calories'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_calories'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Preparation Time -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Preparation Time:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_preparation_time'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_preparation_time'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Menu Design -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Menu Design:</h3>
                    <p class="text-xl font-bold">{{ $settings['menu_design'] ?? '1' }}</p>
                </div>
            </div>

            <!-- Currency -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Currency:</h3>
                    <p class="text-xl font-bold">{{ $settings['currency'] ?? '$' }}</p>
                </div>
            </div>

            <!-- Show As Categorized -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show As Categorized:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_as_categorized'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_as_categorized'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Show Uncategorize -->
            <div class="card shadow-lg bg-base-100 w-full p-6">
                <div class="card-body">
                    <h3 class="card-title text-lg font-semibold mb-2">Show Uncategorize:</h3>
                    <p class="text-xl font-bold">
                        {{ $settings['show_uncategorized'] === 'true' ? 'Enabled' : 'Disabled' }}
                        @if ($settings['show_uncategorized'] === 'true')
                            <span class="text-green-500">Enabled</span>
                        @else
                            <span class="text-red-500">Disabled</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>




    </div>

    <script>
        // Products by Category Chart (Bar Chart)
        const ctxCategory = document.getElementById('productsByCategoryChart').getContext('2d');
        const productsByCategoryData = @json($productsByCategory);

        const labels = productsByCategoryData.map(item => item.category);
        const data = productsByCategoryData.map(item => item.product_count);

        new Chart(ctxCategory, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Products',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Products by Category'
                    }
                }
            }
        });

        // Featured vs Regular Products (Pie Chart)
        const ctxFeatured = document.getElementById('featuredProductsChart').getContext('2d');
        const featuredProductsData = {
            labels: ['Featured', 'Regular'],
            datasets: [{
                label: 'Products',
                data: [{{ $totalFeaturedProducts }}, {{ $totalProducts - $totalFeaturedProducts }}],
                backgroundColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                hoverOffset: 4
            }]
        };

        new Chart(ctxFeatured, {
            type: 'pie',
            data: featuredProductsData,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Featured vs Regular Products'
                    }
                }
            }
        });
    </script>
    

</x-admin-layout>
