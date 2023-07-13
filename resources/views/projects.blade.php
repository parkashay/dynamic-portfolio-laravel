@extends('layout')
@section('title', 'Projects')
@section('navbar')
    @include('components.navbar')
@endsection

@if (session()->has('admin'))
    @section('content')
        <div class="form-section">
            <div class="form-title">Add a new project</div>
            @if (session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif
            <form action="/addproject" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
                <div class="input-field">
                    <input type="text" name="title" id="title" class="white-text">
                    <label for="title">Title</label>
                </div>

                <div class="input-field">
                    <textarea name="description" id="description" class="materialize-textarea white-text"></textarea>
                    <label for="description">Description</label>
                </div>

                <div class="input-field">
                    <input id="tech" type="text" name="tech" class="white-text">
                    <label for="tech">Tech Used</label>
                </div>
                <div class="input-field">
                    <input id="link" type="text" name="link" class="white-text">
                    <label for="link">Project Link</label>
                </div>
                <label class="image-uploader">
                    <span>Upload Image :</span>
                    <input type="file" name="image" accept="image/*">
                </label>
                <input type="submit" class="btn">
            </form>
        </div>
        <div class="table-section">
            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>tech used</th>
                    <th>link</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->tech }}</td>
                        <td><a href="https://{{ $project->link }}" target="_blank">{{ $project->link }}</a></td>
                        <td>{{ $project->image }}</td>
                        <td><a href="/projectdelete/{{ $project->id }}" class="tbl-act-del">Delete</a>
                            <a href="/projectedit/{{ $project->id }}" class="tbl-act-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
@else
    @section('content')
        <div>You do not have access to this page yet. <a href="/auth" class="nav-link">click here</a> to enter the pass
            key if you are an admin</div>
    @endsection
@endif
