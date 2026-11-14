@php
    $customization = $classes();
@endphp

<x-dynamic-component component="ts-ui-trippodi::theme-switch.variations.{{ $variation }}"
                     :$size
                     :$onlyIcons
                     :$block
                     :$customization />
