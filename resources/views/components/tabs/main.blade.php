@props(["checked" => "" , "label" => "No Name"])
<input type="radio" name="my_tabs_2" role="tab" class="tab" aria-label="{{ $label }}" checked="{{ $checked }}" />
<div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
    {{ $slot }}
</div>
