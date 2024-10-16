@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pelanggan</h1>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            @include('customers.form')
        </form>
    </div>
@endsection
