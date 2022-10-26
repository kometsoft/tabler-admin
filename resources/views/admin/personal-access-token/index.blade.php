@extends('tabler::layouts.horizontal.index')

@section('header')
<x-tabler::page-header title="Personal Access Token Manager">
    <div class="btn-list">
        <x-tabler::button :href="route('tabler.admin.personal-access-token.create')" class="btn btn-primary" icon="plus" label="Create"></x-tabler::button>
    </div>
</x-page-header>
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-md-12">
        {{ $dataTable->table() }}
    </div>
</div>
@endsection

@push('script')
{{ $dataTable->scripts() }}
@endpush