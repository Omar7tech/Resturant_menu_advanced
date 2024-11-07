@props(['food'])
<div
    class="card bg-base-100 w-full shadow-xl hover:bg-base-200 hover:translate-y-1 transition-all duration-300 @if ($food->featured) border border-yellow-400 @endif">
    <figure>
        @if ($settings['show_image'] == 'true')
            @if ($food->image_url)
                <img src="{{ asset($food->image_url) }}" />
            @endif
        @endif
    </figure>
    <div class="card-body">
        <h2 class="card-title">
            {{ $food->name }}
            @if ($settings['show_features'] == 'true')
                @if ($food->new == true)
                    <div class="badge badge-secondary">NEW</div>
                @endif
                @if ($food->featured == true)
                    <span class="tooltip" data-tip="featured">
                        <img class="w-6" src="{{ Vite::asset('resources/images/star.png') }}" alt="">
                    </span>
                @endif

                @if ($food->spicy == true)
                    <span class="tooltip" data-tip="Spicy">
                        <img class="w-6" src="{{ Vite::asset('resources/images/chili.png') }}" alt="">
                    </span>
                @endif
                @if ($food->vegan == true)
                    <span class="tooltip" data-tip="Vegan">
                        <img class="w-6" src="{{ Vite::asset('resources/images/leaf.png') }}" alt="">
                    </span>
                @endif
                @if ($food->dairy_free == true)
                    <span class="tooltip" data-tip="dairy free">
                        <img class="w-6" src="{{ Vite::asset('resources/images/dairy-free.png') }}" alt="">
                    </span>
                @endif
            @endif
        </h2>
        @if ($settings['show_description'] == 'true')
            <p>{{ $food->description }}</p>
        @endif
        @if ($food->new_price)
            <div class="divider divider-neutral"><span
                    class="text-error text-xl line-through ">{{ $food->price . $settings['currency'] }}</span><span
                    class="text-success font-bold text-xl">{{ $food->new_price . $settings['currency'] }}</span>
            </div>
        @else
            <div class="divider divider-neutral"><span
                    class="text-success font-bold text-xl">{{ $food->price . $settings['currency'] }}</span></div>
        @endif
        <div class="card-actions justify-end">
            @if ($food->preparation_time && $settings['show_preparation_time'] == 'true')
                <div class="badge badge-outline">Prep time : {{ $food->preparation_time }} mins</div>
            @endif
            @if ($food->calories && $settings['show_calories'] == 'true')
                <div class="badge badge-outline">{{ $food->calories }} cals</div>
            @endif
        </div>
    </div>
</div>
