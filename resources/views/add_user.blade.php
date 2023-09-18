@extends('master') @section('content')
<style>
    @media (max-width:755px){
        .container{
            width: 100% !important;
        }
    }
</style>
<br><br><br>
<div class="container" style="width: 39%;">
    <h3>Add user</h3>
    <div class="card-body card-block">
        <form action="add_user_form" method="post">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="username2" name="username" placeholder="Username" class="form-control " required >
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" id="email2" name="email" placeholder="Email" class="form-control " required >
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" id="" name="phone_number" placeholder="phone number" class="form-control " required >
                    <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password2" name="password" placeholder="Password" class="form-control " required >
                    <div class="input-group-addon">
                        <i class="fa fa-asterisk"></i>
                    </div>
                </div>
            </div>

            <div class="form-group" required>
                <label for="">Select Role</label>
                <select class="custom-select" name="role" id="">
                    <option value="admin">admin</option>
                    <option value="user">user</option>

                </select>
            </div>

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
        </form>
    </div>

</div>
@endsection