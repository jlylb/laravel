@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <p><b>[{{ $user->name }}]</b> {{ $user->email }}  {{ $user->created_at }}</p>
    </div>
</div>

@endsection