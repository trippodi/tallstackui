@php
    $customization = ['wrapper' => $attributes->get('wrapper', $classes()['wrapper'])];
@endphp

<div>
    @if ($label instanceof \Illuminate\View\ComponentSlot)
        {{ $label }}
    @elseif ($label && is_string($label))
        <x-dynamic-component :component="TallStackUiTrippodi::prefix('label')" scope="wrapper.input.label" :$id :$label :$error :$invalidate />
    @endif
    <div @if ($attributes->get('floatable', false)) x-ref="anchor" @endif class="{{ $customization['wrapper'] }}">
        {!! $slot !!}
    </div>
    @if ($hint && !$error)
        <x-dynamic-component :component="TallStackUiTrippodi::prefix('hint')" scope="wrapper.input.hint" :$hint />
    @endif
    @if ($property && !$invalidate)
        <x-dynamic-component :component="TallStackUiTrippodi::prefix('error')" scope="wrapper.input.error" :$property />
    @endif
</div>
