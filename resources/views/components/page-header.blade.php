@props(['title' => 'Untitled', 'links' => []])

@section('title', __($title))

<div class="page-header">
    <div class="row align-items-center g-2 mw-100">
        <div class="col">
            <div class="mb-1">
                <x-tabler::breadcrumb :links="$links"></x-tabler::breadcrumb>
            </div>
            <h2 class="page-title">
                <span class="text-truncate">@lang($title)</span>
            </h2>
        </div>
        <div class="col-md-auto ms-auto">
            {{ $slot }}
        </div>
    </div>
</div>

{{--

<x-tabler::page-header :title='"$user->name"' :links="array_merge([
    ['route' => route('user.index'), 'name' => __('Users')],
])"></x-tabler::page-header>

--}}