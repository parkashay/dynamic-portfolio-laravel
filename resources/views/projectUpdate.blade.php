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
                    <div class="input-field">
                        <input id="ptitle" type="text" name="title" value="{{ $project->title }}" class="white-text">
                        <label for="ptitle">Project Title</label>
                    </div>
                    <div class="input-field">
                        <textarea id="pdesc" name="description"  class="materialize-textarea white-text">{{ $project->description }}</textarea>
                        <label for="pdesc">Project Description</label>
                    </div>
                    <div class="input-field">
                        <input id="ptech" type="text" name="tech" value="{{ $project->tech }}" class="white-text">
                        <label for="ptech">Tech Used</label>
                    </div>
                    <div class="input-field">
                        <input id="plink" type="text" name="link" value="{{ $project->link }}" class="white-text">
                        <label for="plink">Project Link</label>
                    </div>
                    <input type="submit" value="Update" class="btn">
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
