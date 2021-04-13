@extends('layout')

@section('content')
<div class="container text-center">
    <h1>Your account is {{ $status }}d</h1>

    <p>You can click the button to {{ strtolower($action) }} your account</p>
    <button class="btn btn-primary" onclick="document.getElementById('enable').submit()">{{ ucfirst($action) }} Account</button>

    <form action="{{ route("account.$action", auth()->id()) }}" method="post" style="display: none;" id="enable">
        @csrf
    </form>
</div>
@endsection
