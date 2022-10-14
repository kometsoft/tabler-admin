@extends('tabler::layouts.stacked.index')

@section('header')
<x-tabler::page-header :title='$user->exists ? "Edit User" : "Create User"' :links="array_merge([
    ['route' => route('tabler.admin.user.index'), 'name' => __('Users')],
    ($user->exists ? ['route' => route('tabler.admin.user.show', $user), 'name' => $user->name] : []),
])">
    <div class="btn-list">
        <x-tabler::button type="submit" form="form-user-edit" class="btn btn-primary" icon="check" label="Save">
        </x-tabler::button>
    </div>
</x-tabler::page-header>
@endsection

@section('content')

<div class="row row-cards">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="form-user-edit"
                    action="{{ $user->exists ? route('tabler.admin.user.update', $user) : route('tabler.admin.user.store') }}"
                    method="POST">
                    @csrf

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" label="Name"></x-tabler::label>
                        <div class="col-md-6">
                            <x-tabler::input name="name" :value="old('name', $user->name)" required></x-tabler::input>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" label="Email"></x-tabler::label>
                        <div class="col-md-9">
                            <x-tabler::input type="email" name="email" :value="old('email', $user->email)" required>
                            </x-tabler::input>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" label="Roles"></x-tabler::label>
                        <div class="col-md-9">
                            <div class="form-selectgroup">
                                @foreach($roles as $role)
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="role-{{ $role->id }}" name="roles[]" value="{{ $role->id }}"
                                        class="form-selectgroup-input" @checked($user->hasAnyRole($role->name))>
                                    <span class="form-selectgroup-label">{{ $role->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" label="Enabled"></x-tabler::label>
                        <div class="col-md-6">
                            <div class="form-switch form-switch form-switch-lg">
                                <input class="form-check-input" type="checkbox" name="enabled" value="1"
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