<section class="min-h-full bg-base-100 mb-5">
    <div class="sm:flex mid:flex mx-auto max-w-screen-xl px-10 py-10  lg:flex lg:items-center">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="text-3xl font-extrabold sm:text-5xl gradient-text light-gradient">
                Fast, fresh,
                <br>
                <span class="sm:block"> and flavorful! </span>
            </h1>
            <form action="{{ route('home') }}" method="GET" class="relative">
                <div class="flex items-center mt-5">
                    <input
                        type="search"
                        placeholder="Search Your Food!"
                        class="input input-bordered w-full pr-12"
                        name="s2"
                        value="{{ request()->get('s2') }}"
                    >
                    <img
                    src="{{ Vite::asset('resources/images/Red-X-PNG-Photos.png') }}"

                        type="button"
                        class="w-6 absolute right-2 top-6 transform -translate-y-1/2 bg-error/10 text-gray-700 rounded-full p-1 transition duration-200 cursor-pointer"
                        onclick="clearSearch()"
                        aria-label="Clear Search"
                    >
                    </img>
                </div>
                <!-- Hidden inputs to retain other query parameters -->
                @foreach(request()->query() as $key => $value)
                    @if($key !== 's2')
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <button type="submit" class="mt-5 btn btn-primary w-full">Search</button>
            </form>

            <script>
                function clearSearch() {
                    const input = document.querySelector('input[name="s2"]');
                    input.value = ''; // Clear the input field
                    input.form.submit(); // Submit the form to update the URL
                }
            </script>
        </div>
    </div>
</section>
