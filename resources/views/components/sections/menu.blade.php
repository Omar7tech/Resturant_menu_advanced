@if ($settings['show_menu'] == "true")
    @if ($settings['show_menu'] == "1")
        <div class="flex flex-wrap justify-center space-x-4 p-4 bg-base-200 rounded-lg">
            <div class="flex items-center mb-2">
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'new']) }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 {{ request()->get('s1') == 'new' ? 'bg-success/20' : 'hover:bg-success/10' }}">
                    <span class="badge badge-sm badge-warning">NEW</span>
                </a>
            </div>
            <div class="flex items-center mb-2">
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'spicy']) }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 {{ request()->get('s1') == 'spicy' ? 'bg-success/20' : 'hover:bg-success/10' }}">
                    <img class="w-6 h-6" src="{{ Vite::asset('resources/images/chili.png') }}" alt="Spicy">
                    <span class="ml-1 hidden md:inline">Spicy</span>
                </a>
            </div>
            <div class="flex items-center mb-2">
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'vegan']) }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 {{ request()->get('s1') == 'vegan' ? 'bg-success/20' : 'hover:bg-success/10' }}">
                    <img class="w-6 h-6" src="{{ Vite::asset('resources/images/leaf.png') }}" alt="Vegan">
                    <span class="ml-1 hidden md:inline">Vegan</span>
                </a>
            </div>
            <div class="flex items-center mb-2">
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'dairy-free']) }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 {{ request()->get('s1') == 'dairy-free' ? 'bg-success/20' : 'hover:bg-success/10' }}">
                    <img class="w-6 h-6" src="{{ Vite::asset('resources/images/dairy-free.png') }}" alt="Dairy Free">
                    <span class="ml-1 hidden md:inline">Dairy Free</span>
                </a>
            </div>
            <div class="flex items-center mb-2">
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'featured']) }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 {{ request()->get('s1') == 'featured' ? 'bg-success/20' : 'hover:bg-success/10' }}">
                    <img class="w-6 h-6" src="{{ Vite::asset('resources/images/star.png') }}" alt="Featured">
                    <span class="ml-1 hidden md:inline">Top</span>
                </a>
            </div>
            <div class="flex items-center mb-2">
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('s1')) }}"
                    class="flex items-center p-2 rounded-lg bg-error/10 hover:bg-error/20 transition-colors duration-200">
                    <img class="w-6 h-6" src="{{ Vite::asset('resources/images/Red-X-PNG-Photos.png') }}"
                        alt="Clear Filter">
                    <span class="ml-1 hidden md:inline">Clear</span>
                </a>
            </div>
        </div>
    @else
        <ul class="menu menu-horizontal bg-base-200 rounded-box space-x-1">
            <li>
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'new']) }}"
                    class="{{ request()->get('s1') == 'new' ? 'bg-success/20' : '' }}">
                    <span class="badge badge-sm badge-warning">NEW</span>
                </a>
            </li>
            <li>
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'spicy']) }}"
                    class="{{ request()->get('s1') == 'spicy' ? 'bg-success/20' : '' }}">
                    <img class="w-6" src="{{ Vite::asset('resources/images/chili.png') }}" alt="">
                </a>
            </li>
            <li>
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'vegan']) }}"
                    class="{{ request()->get('s1') == 'vegan' ? 'bg-success/20' : '' }}">
                    <img class="w-6" src="{{ Vite::asset('resources/images/leaf.png') }}" alt="">
                </a>
            </li>
            <li>
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'dairy-free']) }}"
                    class="{{ request()->get('s1') == 'dairy-free' ? 'bg-success/20' : '' }}">
                    <img class="w-6" src="{{ Vite::asset('resources/images/dairy-free.png') }}" alt="">
                </a>
            </li>
            <li>
                <a href="{{ request()->fullUrlWithQuery(['s1' => 'featured']) }}"
                    class="{{ request()->get('s1') == 'featured' ? 'bg-success/20' : '' }}">
                    <img class="w-6" src="{{ Vite::asset('resources/images/star.png') }}" alt="">
                </a>
            </li>
            <li>
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('s1')) }}" class="bg-error/10">
                    <img class="w-6" src="{{ Vite::asset('resources/images/Red-X-PNG-Photos.png') }}"
                        alt="">
                </a>

            </li>

        </ul>
    @endif
@endif
