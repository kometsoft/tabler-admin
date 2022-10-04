@props(['name' => null])

<label {!! $attributes->merge(['class' => 'form-label']) !!}>
    {{ $name ? __($name) : $slot }}
</label>


{{--

<x-tabler::label class="col-md-3 col-form-label" name="Name"></x-tabler::label>

--}}