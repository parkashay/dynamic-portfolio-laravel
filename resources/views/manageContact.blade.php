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
                @foreach($errors->all() as $error)
                <div class="error">
                    {{$error}}
                </div>
                @endforeach
                <select name="type" class="dropdown">
                    <option value="">Select type</option>
                    <option value="nav">Navigation Link</option>
                    <option value="contact">Contact Info</option>
                </select>
                <input type="text" name="title" placeholder="title">
                <input type="text" name="content" placeholder="content">
                <input type="submit" value="Add" class="submit-btn">
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
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->type}}</td>
                    <td>{{$contact->title}}</td>
                    <td>{{$contact->content}}</td>
                    <td><a href="/contact/delete/{{$contact->id}}" class="tbl-act-del">Delete</a></td>
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
