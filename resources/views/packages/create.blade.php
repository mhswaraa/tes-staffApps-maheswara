@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Paket Internet</h1>

        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            @include('packages.form')
        </form>
    </div>
@endsection
