@extends('layout')
@section('title', 'contacts')

@section('navbar')
    @include('components.navbar')
@endsection


@if (session()->has('admin'))
    @section('content')
        <div class="form-section">
            <div class="form-title">Add Contact or Nav-Link</div>
            <form action="/add/contact" method="POST" class="form">
                @csrf
                @foreach ($errors->all() as $error)
                    <div class="error">
                        {{ $error }}
                    </div>
                @endforeach
                <div class="input-field">
                    <select name="type" class="dropdown">
                        <option value="">Select type</option>
                        <option value="nav">Navigation Link</option>
                        <option value="contact">Contact Info</option>
                    </select>
                </div>
                <div class="input-field">
                    <input id="ctitle" type="text" name="title" class="white-text">
                    <label for="ctitle">Title</label>
                </div>
                <div class="input-field">
                    <input id="ccontent" type="text" name="content" class="white-text">
                    <label for="ccontent">Content</label>
                </div>
                <input type="submit" value="Add" class="btn">
            </form>
        </div>

        <div class="table-section">
            <table>
                <tr>
                    <th>id</th>
                    <th>type</th>
                    <th>title</th>
                    <th>content</th>
                    <th>action</th>
                </tr>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->type }}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{{ $contact->content }}</td>
                        <td><a href="/contact/delete/{{ $contact->id }}" class="tbl-act-del">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
@else
    @section('content')
        <div>No access</div>
    @endsection

@endif
