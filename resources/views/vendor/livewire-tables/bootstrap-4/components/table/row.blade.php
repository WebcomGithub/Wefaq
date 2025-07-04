@props(['url' => null, 'target' => '_self', 'reordering' => false, 'customAttributes' => []])
@php $styleCss = 'style'; @endphp
@if (!$reordering && (method_exists($attributes, 'has') ? $attributes->has('wire:sortable.item') : array_key_exists('wire:sortable.item', $attributes->getAttributes())))
    @php
        $attributes = $attributes->filter(fn ($value, $key) => $key !== 'wire:sortable.item');
    @endphp
@endif

<tr
        {{ $attributes->merge($customAttributes) }}

        @if ($url)
        onclick="window.open('{{ $url }}', '{{ $target }}')"
{{ $styleCss }}="cursor:pointer"
@endif
>
{{ $slot }}
</tr>
