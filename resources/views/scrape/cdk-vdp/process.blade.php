@extends('layouts.app')

@section('title', 'Process CDK VDPs')

@section('heads')
@livewireStyles
@endsection

@section('content')
@include('scrape.cdk-vdp.partials.nav')

{{-- Livewire test --}}
<div class="container mt-4">
    <div class="h3 text-danger border-bottom">Livewire Component</div>
    <div class="small mb-4">As long as there is an un-visited URL in the database this will refresh and load a new vehicle.</div>

    <livewire:get-vdp />
</div>
@endsection

@section('scripts')
@livewireScripts
@endsection