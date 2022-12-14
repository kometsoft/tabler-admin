@props(['links' => []])

<nav {!! $attributes->merge(['class' => '']) !!}>
    <ol class="breadcrumb">
        @if(Route::currentRouteName() !== 'home')
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">@lang('Dashboard')</a>
        </li>
        @endif
        @foreach($links as $link)
        @if(! empty($link))
        <li class="breadcrumb-item">
            @if (data_get($link, 'route'))
                <a href="{{ data_get($link, 'route') }}">{{ data_get($link, 'name') }}</a>
            @else
                <span class="text-muted">{{ data_get($link, 'name') }}</span>
            @endif
        </li>
        @endif
        @endforeach
    </ol>
</nav>

{{-- 

<x-tabler::breadcrumb :links="array_merge([
    ['route' => route('user.index'), 'name' => __('Users')],
    ($user->exists ? ['route' => route('user.show', $user), 'name' => $user->name] : []),
])"></x-tabler::breadcrumb>

--}}
