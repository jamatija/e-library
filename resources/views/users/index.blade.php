@extends('layouts.app')

@section('title', $resourcePlural)

@section('content')

@include('users.partials.index_resource', [
        'users' => $users,
        'resourceName' => $resource,
        'resourcePlural' => $resourcePlural,
    ])

@endsection('content')