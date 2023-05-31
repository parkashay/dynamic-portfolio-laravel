@extends('layout')
@section('navbar')
    @include('components.navbar')
@endsection

@if (session()->has('admin'))
    @if ($project)
        @section('content')
            <div class="form-section">
                <div class="form-title">Edit and Update Project</div>
                <div class="project-img">
                    <img src="{{ asset('uploads/' . $project->image) }}" alt="project image">
                </div>
                @if (session('fail'))
                    <div class="error"> {{ session('fail') }} </div>
                @endif
                <form action="/updateproject/{{ $project->id }}" method="POST" class="form">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                    <input type="text" name="title" value="{{ $project->title }}" placeholder="title">
                    <textarea name="description" rows="5" placeholder="Project Description">{{ $project->description }}</textarea>
                    <input type="text" name="tech" value="{{ $project->tech }}" placeholder="tech used">
                    <input type="text" name="link" value="{{ $project->link }}" placeholder="link">
                    <input type="submit" value="Update">
                </form>
            </div>
        @endsection
    @endif
@else
    @section('content')
        <div>You fo not have access to this page yet.
            <a href="/auth" class="nav-link">click here</a>
            to enter the pass key if you are an admin
        </div>
    @endsection
@endif
