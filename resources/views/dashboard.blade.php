<script src="{{asset('js/admin.js')}}"></script>
@extends('layout')
@section('title', 'Dashboard')
@section('navbar')
    @include('components.navbar')
@endsection

@if (session()->has('admin'))
    @section('content')
        <div class="form-section">
            <div class="form-title">Add Content</div>
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
                    <option value="owner">Owner Name</option>
                    <option value="about">About Me</option>
                    <option value="skills">Add Skill</option>
                    <option value="education">Education</option>
                    <option value="experience">Experience</option>
                </select>
                <textarea type="text" name="content" placeholder="content" rows="5"></textarea>
                <button class="submit-btn" type="submit"> Submit</button>
            </form>
        </div>
        <div>
            <a href="/projects" class="nav-link">Manage Projects</a>
            <a href="/tokens" class="nav-link">Manage Tokens</a>
            <a href="/manage/contact" class="nav-link">Manage Contact</a>

        </div>
        <div class="table-section">
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
                        <td><a href="/delete/{{ $item->id }}" class="tbl-act-del">Delete</a>
                            <a href="/edit/{{$item->id}}" class="tbl-act-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
    
@else
    @section('content')
        <div>You fo not have access to this page yet.
            <a href="/auth" class="nav-link">click here</a>
            to enter the pass key if you are an admin
        </div>
    @endsection
    
@endif
