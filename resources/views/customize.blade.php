@extends('master')  @section('title','Organization')  @section('content')
<br>

<style>
    @media (max-width: 755px) {

        .container {
            width: 100% !important;

        }

        body {
            font-family: sans-serif;
            background-color: #eeeeee;
        }

    }
    input.invalid,
textarea.invalid,
select.invalid,
.match_error,
.match_error:focus {
	border-color: #b00 !important;
}

.validation_error {
	margin: .4em 0 1em;
	color: #b00 !important;
	font-size: .7em;
	text-transform: uppercase;
	letter-spacing: .15em;
}
</style>
<div class="content">

    <form action="/organization" method="POST" enctype="multipart/form-data" id="form" novalidate="novalidate">
        @csrf
        @foreach ($organization as $row)

        <div class="form-group">
            <label for="">Organization Name</label>
            <input type="text" name="name" id="company" class="form-control" value="{{$row->organization_name}}" placeholder="" aria-describedby="helpId" required>
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
                    <input required type="email" validate="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{$row->email}}" required>

                </div>
            </div>
        </div>
        <div class="form-group">
            <!-- <input style="    border: none;" type="file" name="logo" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                <input style="    border: none;" type="hidden" name="old_logo" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{$row->logo}}"> -->
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Organization Logo</button>

                <div class="image-upload-wrap" style="display: none;">
                    <input class="file-upload-input" name="logo" type='file' onchange="readURL(this);" accept="image/*" required />
                    <input name="old_logo" type='hidden' value="{{$row->logo}}" />
                    <div class="drag-text">
                        <h3>Drag and drop a file or select add Image</h3>
                    </div>
                </div>
                <div class="file-upload-content" style="display: block;">
                    <img class="file-upload-image" src="{{$row->logo ?? '#'}}" alt="your image" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded </span></button>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-sm">
            Submit
        </button>
        @endforeach
    </form>

</div>

@endsection
<script>

</script>