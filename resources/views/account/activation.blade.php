@extends('layout')

@section('content')
<div class="container text-center">
    <h1>Your account is disabled</h1>
    <p>You can click the button to enable your account</p>
    <button class="btn btn-primary" onclick="document.getElementById('enable').submit()">Enable Account</button>
    <form action="{{ route("acc.activation", auth()->id()) }}" method="post" style="display: none;" id="enable">
        @csrf
    </form>
</div>
@endsection
