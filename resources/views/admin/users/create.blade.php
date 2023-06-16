@extends('layouts.admin.master')
@section('content')
    <div class="container">
        <h1>Users</h1>
        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                @error('name')
                    <span style="color : red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" cols="30" rows="10" class="form-control" placeholder="your_email@email.com">
                @error('email')
                    <span style="color : red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">

                    <input id="password" type="password" name="password"
                    class="form-control form-control-user @error('password') is-invalid @enderror"
                    required autocomplete="new-password" placeholder="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                </div>
                <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user"
                    name="password_confirmation"  autocomplete="new-password" placeholder="Repeat Password">
                </div>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <label for="role">Choose the role:</label>
            <select id="role" name="role">
                <option value="0">client</option>
                <option value="1">admin</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary">create</button>
        </form>
    </div>
@endsection
