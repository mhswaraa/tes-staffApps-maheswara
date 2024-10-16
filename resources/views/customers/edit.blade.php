@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pelanggan</h1>

        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('customers.form')
        </form>
    </div>
@endsection
