@props(['name' => null])

<label {!! $attributes->merge(['class' => 'form-label']) !!}>
    {{ $name ? __($name) :  $slot }}
</label>
