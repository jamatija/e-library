@extends('layouts.app')

@section('title', 'Učenici')

@section('content')

@include('users.partials.create_resource', [
        'role' => $role,
        'resourceName' => $resource,
        'resourcePlural' => $resourcePlural,
    ])

@endsection('content')