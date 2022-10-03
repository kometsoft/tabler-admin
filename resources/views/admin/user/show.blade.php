@extends('tabler::layouts.stacked.index')

@section('header')
<x-tabler::page-header :title='"$user->name"' :links="[
    ['route' => route('tabler.admin.user.index'), 'name' => __('Users')],
]">
    <div class="btn-list">
        <x-tabler::button :href="route('tabler.admin.user.edit', $user)" class="btn-primary" icon="pencil" label="Edit"></x-tabler::button>
    </div>
</x-page-header>
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('User Details')</h3>
            </div>
            <div class="card-body">
                <form id="form-user-edit"
                    action="{{ $user->exists ? route('tabler.admin.user.update', $user) : route('tabler.admin.user.store') }}"
                    method="POST">
                    @csrf
                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="Name"></x-tabler::label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="Email"></x-tabler::label>
                        <div class="col-md-9">
                            <p class="form-control-plaintext">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="Roles"></x-tabler::label>
                        <div class="col-md-6">
                            {{ implode(', ', $user->getRoleNames()->toArray()) }}
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="Enabled"></x-tabler::label>
                        <div class="col-md-6">
                            <div class="form-switch form-switch form-switch-lg">
                                <input class="form-check-input" type="checkbox" name="enabled" disabled value="1"
                                    @checked($user->enabled == 1 || !$user->exists)>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection