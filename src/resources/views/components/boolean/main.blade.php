@php
    $customization = $classes();
@endphp

<span {{ $attributes }} @if ($attributes->has('wire:click')) class="cursor-pointer" @endif>
    <x-dynamic-component :component="TallStackUiTrippodi::prefix('icon')"
                         :icon="TallStackUiTrippodi::icon($boolean ? $iconWhenTrue : $iconWhenFalse)"
                         internal
                         @class([$customization['icon'], $colors['icon']]) />
</span>
