@props(['categories'])
<div class="overflow-x-auto">
    @foreach ($categories as $category)
        @if ($category->products->count() > 0)
            <div class="divider divider-secondary my-12">
                <span class="text-2xl font-extrabold">
                    {{ $category->name }}
                    @if ($settings['show_food_count'])
                        -
                        {{ $category->products->count() }}
                    @endif
                </span>


            </div>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        @if ($settings['show_description'] == 'true')
                            <th class="hidden lg:block">Description</th>
                        @endif
                        <th>Price</th>
                        @if ($settings['show_features'] == 'true')
                            <th class="hidden lg:block">Features</th>
                        @endif

                    </tr>
                </thead>
                <tbody>

                    @foreach ($category->products as $product)
                        <tr>
                            <td class="font-bold">{{ $product->name }}</td>
                            @if ($settings['show_description'] == 'true')
                                <td class="hidden lg:block">{{ $product->description }}</td>
                            @endif
                            <td>
                                <span
                                    class="{{ $product->new_price ? 'line-through text-error' : 'text-success font-bold' }}">
                                    {{ $product->price . ($product->new_price ? '' : $settings['currency']) }}
                                </span>
                                <span class="text-success font-bold">
                                    {{ $product->new_price ? $product->new_price . $settings['currency'] : '' }}
                                </span>
                            </td>
                            @if ($settings['show_features'] == 'true')
                                <td class="hidden lg:flex">
                                    @if ($product->new)
                                        <span class="badge badge-secondary">NEW</span>
                                    @endif
                                    @if ($product->featured)
                                        <span class="tooltip" data-tip="featured"><img class="w-6"
                                                src="{{ Vite::asset('resources/images/star.png') }}"
                                                alt=""></span>
                                    @endif
                                    @if ($product->spicy)
                                        <span class="tooltip" data-tip="Spicy"><img class="w-6"
                                                src="{{ Vite::asset('resources/images/chili.png') }}"
                                                alt=""></span>
                                    @endif
                                    @if ($product->vegan)
                                        <span class="tooltip" data-tip="Vegan"><img class="w-6"
                                                src="{{ Vite::asset('resources/images/leaf.png') }}"
                                                alt=""></span>
                                    @endif
                                    @if ($product->dairy_free)
                                        <span class="tooltip" data-tip="Dairy Free"><img class="w-6"
                                                src="{{ Vite::asset('resources/images/dairy-free.png') }}"
                                                alt=""></span>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    @endforeach
</div>
