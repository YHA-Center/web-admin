@extends('user.master.master')

@section('content')

    This is user page

    <h1>Name: {{ Auth::user()->name }}</h1>


    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>logout</button>
    </form>

@endsection