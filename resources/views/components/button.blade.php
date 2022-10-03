@props(['label' => null, 'href' => null, 'icon' => null])

@if($href)
<a href="{{ $href }}" {!! $attributes->merge(['class' => 'btn']) !!}>
    @if($icon)
    <i class="ti ti-{{ $icon }} icon"></i>
    @endif
    <span>@lang($label)</span>
</a>
@else
<button {!! $attributes->merge(['class' => 'btn']) !!}>
    @if($icon)
    <i class="ti ti-{{ $icon }} icon"></i>
    @endif
    <span>@lang($label)</span>
</button>
@endif