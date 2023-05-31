@extends('layout')
@section('title', 'tokens')
@section('navbar')
    @include('components.navbar')
@endsection

@if (session()->has('admin'))
    @section('content')
        <div class="form-section">
            <div class="form-title">Add Key</div>
            <form action="/addkey" method="post" class="form">
                @csrf
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
                <input type="text" name='keys' placeholder="enter new key">
                <input type="submit" value="add key">
            </form>
        </div>
        <div class="table-section">
            <table>
                <tr>
                    <th>id</th>
                    <th>token</th>
                    <th>action</th>
                </tr>
                @foreach ($tokens as $token)
                    <tr>
                        <td>{{ $token->id }}</td>
                        <td>{{ $token->keys }}</td>
                        <td>
                            <a href="/token/delete/{{ $token->id }}" class="tbl-act-del">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
@else
    @section('content')
        <div>no access</div>
    @endsection
@endif
