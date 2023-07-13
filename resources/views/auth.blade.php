@extends('layout')
@section('title', 'Auth')
<style>
    .keypass {
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
        <div class="input-field">
            <label for="key">Access Key</label>
            <input id="key" type="password" name="adminpass" class="white-text">
        </div>
        @error('adminpass')
            <span class="error">{{ $message }}</span>
        @enderror
        @if (session('fail'))
            <div class="error">{{ session('fail') }}</div>
        @endif
        <input type="submit" class="btn" value="Get Access">
    </form>
@endsection
