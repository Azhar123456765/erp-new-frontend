@extends('master') @section('content')
<br>
<style>
    @media (max-width: 755px) {

        .container {
            width: 100% !important;

        }


    }

    .container {
        width: 50%;
    }
</style>
<div class="container">

    <form action="/organization" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($organization as $row)

        <div class="form-group">
            <label for="">Organization Name</label>
            <input type="text" name="name" id="company" class="form-control" placeholder="" aria-describedby="helpId" value="{{$row->organization_name}}" required>
        </div>

        <div class="form-group">
            <label for="">Organization address</label>
            <br>
            <textarea name="address" id="" cols="78" rows="3" style="border: 1px solid lightgray; width: 100%;" required>{{$row->address}}</textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="">Phone Number</label>
                    <input type="number" name="phone_number" id="email" class="form-control" value="{{$row->phone_number}}" required>
                </div>
                <div class="col">
                    <label for="">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{$row->email}}" required>

                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Organization Logo </label>
            <div class="img" style="    border: 1px solid lightgray;">

                <input style="    border: none;" type="file" name="logo" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                <input style="    border: none;" type="hidden" name="old_logo" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{$row->logo}}">

                @error('logo')
                <h5 id="emailHelpId" style="color:red;">
                    {{ $message }}!
                </h5>
                @enderror
                <div class="right" style="    margin-left: 74%;
    margin-top: -5%;">
                    <a href="{{$row->logo}}" target="__blank" style="display: flex;">
                        <img src="{{$row->logo}}" alt="Logo" class="float-end" width="190px" height="180px">
                    </a>
                </div>
            </div>

        </div>
        <!-- <div class="form-group">
            <label for="">Choose text color</label>
            <input type="color" name="theme_color" id="text_color" class="form-control" placeholder="" aria-describedby="helpId" style="width: 25%;" value="{{$row->theme_color}}" required>

        </div> -->

        <br>

        <button type="submit" class="btn btn-success btn-sm">
            Submit
        </button>

        @endforeach
    </form>

</div>




<script>
    //     $('#text_color').on('change',function(){


    //         $.ajax({
    //     url: '/customize-form',
    //     type: 'POST',
    //     data: {
    //         theme_color: $("#text_color").val()
    //     },  
    //     success: function(response) {



    //     },
    //     error: function(xhr, status, error) {
    //       console.log(error);
    //     }
    //   });


    //     })
</script>
@endsection