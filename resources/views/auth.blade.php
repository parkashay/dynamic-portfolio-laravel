@extends('layout')
@section('title', 'Auth')
<style>
    .keypass{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
    }
</style>
@section('content')
<form action="/verify" method="POST" class="keypass">
    @csrf
    <input type="password" name="adminpass" placeholder="Enter token">
    @error('adminpass')
    <span class="error">{{$message}}</span>
    @enderror
    @if(session('fail'))
    <div class="error">{{session('fail')}}</div>
    @endif
    <input type="submit">
</form>
@endsection