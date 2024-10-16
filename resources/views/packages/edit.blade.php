@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Paket Internet</h1>

        <form action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('packages.form')
        </form>
    </div>
@endsection
