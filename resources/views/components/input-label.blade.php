@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-600 uppercase']) }}>
    {{ $value ?? $slot }}
</label>
