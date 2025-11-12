@extends('layout')
@section('content')
    <a href="{{ route('indexLog') }}" class="btn btn-success btn-sm">Login</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="mt-2 text-white btn btn-danger btn-sm" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
        </form>
@endsection
