<x-layout>
    @if ($settings['show_title'] == 'true')
        <x-sections.hero />
    @endif
    @if (config('settings.show_menu') == true)
        <div class="flex justify-center items-center mb-5">
            <x-sections.menu />
        </div>
    @endif
    @if ($settings['display'] == 'cards')
        @if ($settings['show_as_categorized'] == 'true')
            <x-show.cards :categories="$categories" />
        @else
            <x-show.cards_as_unCategorized :categories="$categories" :total_products="$total_products" />
        @endif
    @elseif ($settings['display'] == 'list')
        <x-show.table :categories="$categories" />
    @else
        <x-show.cards :categories="$categories" />
    @endif
    @if ($settings['show_uncategorized'] == 'true')
        <div class="h-12"></div>
        <x-cards.grid>
            @foreach ($uncategorized_products as $product)
                <x-cards.main :food="$product" />
            @endforeach
        </x-cards.grid>
    @endif
</x-layout>
