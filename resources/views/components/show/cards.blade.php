@props(['categories'])
<div class="space-y-5">
    @foreach ($categories as $index => $category)
        @if ($category->products->count() > 0)
            <div class="h-30"></div>
            <div class="collapse bg-base-200 collapse-arrow ">
                <input type="radio" name="my-accordion-2" id="accordion-{{ $category->id }}"
                    @if ($index == 0) checked="true" @endif />
                <div class="flex justify-between collapse-title text-xl font-medium"
                    onclick="event.preventDefault(); document.getElementById('accordion-{{ $category->id }}').checked = !document.getElementById('accordion-{{ $category->id }}').checked;">
                    <x-sections.label>{{ $category->name }}</x-sections.label>

                    @if ($settings['show_food_count'] == 'true')
                        <div class="badge badge-info">
                            {{ $category->products->count() }}
                        </div>
                    @endif


                </div>
                <div class="collapse-content">
                    <x-cards.grid>
                        @foreach ($category->products as $product)
                            <x-cards.main :food="$product" />
                        @endforeach
                    </x-cards.grid>
                </div>
            </div>
        @endif
    @endforeach
</div>
