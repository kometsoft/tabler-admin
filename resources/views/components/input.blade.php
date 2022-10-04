@props(['name' => null, 'value' => null, 'disabled' => false])

@php
$classes = ($errors->has($name) ?? false)
? 'form-control is-invalid'
: 'form-control';
@endphp

<input name="{{ $name ? $name : '' }}" value="{{ old($name, $value) }}" {{ $disabled ? 'disabled' : '' }} {!!
    $attributes->merge(['class' => $classes]) !!}>

@error($name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

{{--

<x-tabler::input name="name" :value="old('name', $user->name)" required></x-tabler::input>

--}}