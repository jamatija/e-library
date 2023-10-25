@extends('layouts.app')

@section('title', $resourcePlural)

@section('content')

@include('users.partials.create_resource', [
        'role' => $role,
        'resourceName' => $resource,
        'resourcePlural' => $resourcePlural,
    ])

@endsection('content')