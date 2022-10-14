@extends('tabler::layouts.stacked.index')

@section('header')
<x-tabler::page-header :title='$personal_access_token->exists ? "Edit Personal Access Token" : "Create Personal Access Token"' :links="array_merge([
    ['route' => route('tabler.admin.personal-access-token.index'), 'name' => __('Personal Access Tokens')],
    ($personal_access_token->exists ? ['route' => route('tabler.admin.personal-access-token.show', $personal_access_token), 'name' => $personal_access_token->name] : []),
])">
    <div class="btn-list">
        <x-tabler::button type="submit" form="form-personal-access-token-edit" class="btn btn-primary" icon="check" label="Save">
        </x-tabler::button>
    </div>
</x-tabler::page-header>
@endsection

@section('content')

<div class="row row-cards">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="form-personal-access-token-edit"
                    action="{{ $personal_access_token->exists ? route('tabler.admin.personal-access-token.update', $personal_access_token) : route('tabler.admin.personal-access-token.store') }}"
                    method="POST">
                    @csrf

                    <div class="alert alert-warning" role="alert">
                        <div class="text-muted">If you’ve lost or forgotten this token, you can regenerate it, but be aware that any scripts or applications using this token will need to be updated.</div>
                      </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="Note"></x-tabler::label>
                        <div class="col-md-6">
                            <x-tabler::input name="name" :value="old('name', $personal_access_token->name)" hint="What’s this token for?" required></x-tabler::input>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="User"></x-tabler::label>
                        <div class="col-md-6">
                            <x-tabler::input name="user_id" required></x-tabler::input>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <x-tabler::label class="col-md-3 col-form-label" name="Expiration"></x-tabler::label>
                        <div class="col-md-2">
                            <x-tabler::select name="expires_at" id="expires_at" :value="old('expires_at')" required optionValue="name" :options="collect([
                                (object) ['id' => 1, 'name' => '7 days'],
                                (object) ['id' => 2, 'name' => '30 days'],
                                (object) ['id' => 3, 'name' => '1 year'],
                            ])"></x-tabler::select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection