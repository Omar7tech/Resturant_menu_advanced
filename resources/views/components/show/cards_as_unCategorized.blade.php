@props(['categories', 'total_products'])
<div class="space-y-5">
    <div class="h-20"></div>
    <x-cards.grid>
        @foreach ($categories as $index => $category)
            @foreach ($category->products as $product)
                <x-cards.main :food="$product" />
            @endforeach
        @endforeach
    </x-cards.grid>
</div>
