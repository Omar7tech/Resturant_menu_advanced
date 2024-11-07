<x-admin-layout nav_title="Settings">
    <div class="container mx-auto p-8">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <h1 class="font-bold text-lg ms-2">Settings</h1>

        </div>

        <div class="card shadow-lg bg-base-100">
            <div class="card-body">
                <form action="{{ route('admin.settings.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="label">Display <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </label>
                            <select name="display" class="select w-full">
                                <option value="cards" {{ $settings['display'] == 'cards' ? 'selected' : '' }}>Cards
                                </option>
                                <option value="list" {{ $settings['display'] == 'list' ? 'selected' : '' }}>List
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Image</span>
                                <input type="hidden" name="show_image" value="false">
                                <input type="checkbox" name="show_image" value="true" class="toggle"
                                    {{ $settings['show_image'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Description</span>
                                <input type="hidden" name="show_description" value="false">
                                <input type="checkbox" name="show_description" value="true" class="toggle"
                                    {{ $settings['show_description'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Menu</span>
                                <input type="hidden" name="show_menu" value="false">
                                <input type="checkbox" name="show_menu" value="true" class="toggle"
                                    {{ $settings['show_menu'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Title</span>
                                <input type="hidden" name="show_title" value="false">
                                <input type="checkbox" name="show_title" value="true" class="toggle"
                                    {{ $settings['show_title'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Search</span>
                                <input type="hidden" name="show_search" value="false">
                                <input type="checkbox" name="show_search" value="true" class="toggle"
                                    {{ $settings['show_search'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Footer</span>
                                <input type="hidden" name="show_footer" value="false">
                                <input type="checkbox" name="show_footer" value="true" class="toggle"
                                    {{ $settings['show_footer'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Food Count</span>
                                <input type="hidden" name="show_food_count" value="false">
                                <input type="checkbox" name="show_food_count" value="true" class="toggle"
                                    {{ $settings['show_food_count'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Allow Theme Change</span>
                                <input type="hidden" name="allow_theme_change" value="false">
                                <input type="checkbox" name="allow_theme_change" value="true" class="toggle"
                                    {{ $settings['allow_theme_change'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Features</span>
                                <input type="hidden" name="show_features" value="false">
                                <input type="checkbox" name="show_features" value="true" class="toggle"
                                    {{ $settings['show_features'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Calories</span>
                                <input type="hidden" name="show_calories" value="false">
                                <input type="checkbox" name="show_calories" value="true" class="toggle"
                                    {{ $settings['show_calories'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Preparation Time</span>
                                <input type="hidden" name="show_preparation_time" value="false">
                                <input type="checkbox" name="show_preparation_time" value="true" class="toggle"
                                    {{ $settings['show_preparation_time'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label">Menu Design</label>
                            <select name="menu_design" class="select w-full">
                                <option value="1" {{ $settings['menu_design'] == 1 ? 'selected' : '' }}>Design 1
                                </option>
                                <option value="2" {{ $settings['menu_design'] == 2 ? 'selected' : '' }}>Design 2
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="label">Currency</label>
                            <input type="text" name="currency" class="input input-bordered w-full"
                                value="{{ $settings['currency'] }}">
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show as Categorized</span>
                                <input type="hidden" name="show_as_categorized" value="false">
                                <input type="checkbox" name="show_as_categorized" value="true" class="toggle"
                                    {{ $settings['show_as_categorized'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="label cursor-pointer">
                                <span class="label-text">Show Uncategorized</span>
                                <input type="hidden" name="show_uncategorized" value="false">
                                <input type="checkbox" name="show_uncategorized" value="true" class="toggle"
                                    {{ $settings['show_uncategorized'] == 'true' ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div class="col-span-full">
                            <label class="label">Name</label>
                            <input type="text" name="name" class="input input-bordered w-full"
                                value="{{ $settings['name'] }}">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary w-full">Save</button>
                    </div>
                </form>
            </div>
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

        @if (session('success'))
            <x-toast.success>
                {{ session('success') }}
            </x-toast.success>
        @endif

    </div>
</x-admin-layout>
