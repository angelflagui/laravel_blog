    @extends('layouts.admin.master')
    @section('content')
        <div class="container">
            <h1>Users</h1>
            <form action="{{ route('admin.users.update', ['users' => $user]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <span style="color : red;">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" cols="30" rows="10" class="form-control"
                        value="{{ $user->email }}">
                    @error('email')
                        <span style="color : red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">

                        <input id="password" type="password" name="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror"
                            autocomplete="new-password" placeholder="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-sm-6">
                        <input id="new_password" type="password"
                            class="form-control form-control-user @error('new_password') is-invalid @enderror"
                            name="new_password" autocomplete="new-password" placeholder="new Password"> <br>
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-sm-6">
                        <input id="password_confirmation" type="password"
                            class="form-control form-control-user  @error('password_confirmation') is-invalid @enderror"
                            name="new_password_confirmation" autocomplete="new-password" placeholder="Repeat Password"><br>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <label for="role">Choose the role : </label>
                <select id="role" name="role">
                    <option value="0">client</option>
                    <option value="1">admin</option>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </select>

                <br>
                <button type="submit" class="btn btn-success"> edit </button>
            </form>
        </div>
    @endsection
