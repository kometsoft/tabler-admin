@extends('tabler::layouts.stacked.index')

@section('header')
<x-tabler::page-header title="Access Control">
    <div class="btn-list">
        <x-tabler::button :href="route('tabler.admin.role.create')" class="btn-primary" icon="plus" label="Create"></x-tabler::button>
    </div>
</x-page-header>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        {{ $dataTable->table() }}
    </div>
</div>
@endsection

@push('script')
{{ $dataTable->scripts() }}
@endpush