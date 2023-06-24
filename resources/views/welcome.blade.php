@extends('layout')

@section('title', 'Prakash Poudel')
<div id="particles-js"></div>
@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    @include('components.body')
@endsection

@section('footer')
    @include('components.footer')
@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/particles.js') }}"></script>
