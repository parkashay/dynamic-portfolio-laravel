@extends('layout')
@section('title', 'update')
@section('navbar')
    @include('components.navbar')
@endsection

@if (session()->has('admin'))
    @section('content')
        <div class="form-section">
            <div class="form-title">Edit and Update</div>
            <form action="/update/{{$editContent->id}}" method="POST" class="form">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @csrf
    
                @if(session('fail'))
                <div class="error">
                    {{session('fail')}}
                </div>
                @endif
               <div class="input-field">
                <select name="title" class="dropdown">
                    <option value="{{ $editContent->title }}">{{ $editContent->title }}</option>
                </select>
               </div>
                
               <div class="input-field">
                <textarea id="cont" type="text" name="content" class="materialize-textarea white-text">{{ $editContent->content }}</textarea>
                <label for="cont">Content</label>
               </div>
                <button class="btn" type="submit"> Submit</button>
            </form>
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
