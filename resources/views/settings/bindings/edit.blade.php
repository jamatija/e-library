@extends('layouts.app')
@section('title', 'Edit binding')

@section('content')

    @include('settings.partials.edit_resource', [
        'resource' => $binding,
        'resourceName' => 'binding',
        'resourcePlural' => 'bindings',
    ])

@endsection