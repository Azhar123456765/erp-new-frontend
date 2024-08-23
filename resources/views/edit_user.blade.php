@extends('master')  @section('title','Edit User')  @section('content')


<br>
<div class="container">
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
    <div class="card-body card-block">


        @foreach ($user as $row)
        <form action="/edit_user_form-{{$row->user_id}}" method="post">


            @csrf

            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="username2" name="username" placeholder="Username" class="form-control " required value="{{$row->username}}">
                    <div class="input-group-addon">
                        <i class=" -user"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="email" validate="email" id="email2" name="email" placeholder="Email" class="form-control " required value="{{$row->email}}">
                    <div class="input-group-addon">
                        <i class=" -envelope"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" step="any" id="" name="phone_number" placeholder="phone number" class="form-control " required value="{{$row->phone_number}}">
                    <div class="input-group-addon">
                        <i class=" -asterisk"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="password2" name="password" placeholder="Password" class="form-control " required value="{{$row->password}}">
                    <div class="input-group-addon">
                        <i class=" -asterisk"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Select Role</label>
                <select class="custom-select" name="role" id="" required>

                    @if ($row->role == 'admin')
                    <option selected value="admin">admin</option>
                    <option value="user">user</option>
                    @else


                    <option value="admin">admin</option>
                    <option selected value="user">user</option>
                    @endif
                </select>
            </div>

            <input type="hidden" name="user_id" value="{{$row->user_id}}">

            <br>

            @error('username')

            <div class="alert alert-danger" role="alert">
                {{$message}}



            </div>
            @enderror

            @error('email')

            <div class="alert alert-danger" role="alert">
                {{$message}}



            </div>
            @enderror


            @error('phone_number')

            <div class="alert alert-danger" role="alert">
                {{$message}}



            </div>
            @enderror



            <div class="form-actions form-group">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
            </div>

            @endforeach
        </form>
    </div>

</div>
</div>
@endsection