@extends('layouts.app')

@section('title', $resourcePlural)

@section('content')

@include('users.partials.edit_resource', [
        'user' => $user,
        'resourceName' => $resource,
        'resourcePlural' => $resourcePlural,
    ])

@endsection('content')