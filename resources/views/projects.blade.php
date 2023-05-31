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
                <input type="text" name="title" placeholder="title">
                <textarea name="description" rows="5" placeholder="Project Description"></textarea>
                <input type="text" name="tech" placeholder="Tech used">
                <input type="text" name="link" placeholder="link">
                <label class="image-uploader">
                    <span>Upload Image :</span>
                    <input type="file" name="image" accept="image/*">
                </label>
                <input type="submit">
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
                            <a href="/projectedit/{{$project->id}}" class="tbl-act-edit">Edit</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
@else
    @section('content')
        <div>You do not have access to this page yet. <a href="/auth" class="nav-link">click here</a> to enter the pass key if you are an admin</div>
    @endsection
@endif
