<script src="{{asset('js/admin.js')}}"></script>
@extends('layout')
@section('title', 'Dashboard')
@section('navbar')
    @include('components.navbar')
@endsection

@if (session()->has('admin'))
    @section('content')
        <div class="form-section">
            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/adminform" method="POST" class="form">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @csrf
                <select name="title" class="dropdown">
                    <option value="">Select a title</option>
                    <option value="about">About Me</option>
                    <option value="skills">Add Skill</option>
                    <option value="education">Education</option>
                </select>
                <textarea type="text" name="content" placeholder="content" rows="5"></textarea>
                <button class="submit-btn" type="submit"> Submit</button>
            </form>
        </div>
        <div>
            <a href="/projects" class="nav-link">Add a Project</a>
        </div>
        <div class="table-section">
            @if (session('deleted'))
                <span>{{ session('deleted') }}</span>
            @endif
            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>content</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="/delete/{{ $item->id }}" class="tbl-act">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
    
@else
    @section('content')
        <div>You fo not have access to this page yet.
            <a href="/auth" class="nav-link">click here</a>
            to enter the pass key if you are a admin
        </div>
    @endsection
    
@endif
