@extends('panel.layouts.app')




@section('header')

    <style>
        body {
            background-color: #E0EAE9;
        }

        #one {
            margin-top: 50px;
            box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.2);
        }

        .it .btn-orange {
            background-color: transparent;
            border-color: #ced4da;
            color: #777;
            text-align: left;
            width: 100%;
        }

        .it input.form-control {
            height: 54px;
            border: none;
            margin-bottom: 0px;
            border-radius: 0px;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
        }

        .it .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
            outline: none;
        }

        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 10px;
        }

        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .it .btn-new,
        .it .btn-next {
            margin: 30px 0px;
            border-radius: 0px;
            background-color: #333;
            color: #f5f5f5;
            font-size: 16px;
            width: 155px;
        }

        .it .btn-next {
            background-color: #ff4d0d;
            color: #fff;
        }

        .it .btn-check {
            cursor: pointer;
            line-height: 54px;
            color: red;
        }

        .it .uploadDoc {
            margin-bottom: 20px;
        }

        .it .uploadDoc {
            margin-bottom: 20px;
        }

        .it .btn-orange img {
            width: 30px;
        }

        p {
            font-size: 16px;
            text-align: center;
            margin: 30px 0px;
        }

        .it #uploader .docErr {
            position: absolute;
            right: auto;
            left: 10px;
            top: -56px;
            padding: 10px;
            font-size: 15px;
            background-color: #fff;
            color: red;
            box-shadow: 0px 0px 7px 2px rgba(0, 0, 0, 0.2);
            display: none;
        }

        .it #uploader .docErr:after {
            content: '\f0d7';
            display: inline-block;
            font-family: FontAwesome;
            font-size: 50px;
            color: #fff;
            position: absolute;
            left: 30px;
            bottom: -40px;
            text-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
        }

        .pageTitle {
            width: 100%;
            text-align: center;
            color: #05263B;
        }

        .Box {
            width: 63%;
            margin: 0 auto;
            max-width: 83.333333%;
            display: flex;
            color: #05263B;
        }

        .Box div {
            margin-top: 10px;
        }

        .Box > div input {
            padding: 5px;
        }

        .Box > :nth-child(1) {
            width: 200px;
        }

        textarea {
            width: 500px;
            height: 200px;
            padding: 5px;
        }

        .form1 {
            width: 80%;
            margin: 0 auto;
        }

        .submitButton {
            margin: 40px auto;
            width: 10%;
        }
    </style>
@endsection



@section('content')
    @php
        if (!isset($edit_form)){
        $edit_form = false;
        }
    @endphp

    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $header }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <form id="demo-form2" method="post" action="" enctype="multipart/form-data">
                    @include('notification.notification')
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title
                            <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="album_status" type="text" id="first-name" class="form-control"
                                   value="{{ isset($albums) ? old('album_status' , $albums->album_status) : old('album_status') }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">content</label>
                        <div class="col-md-4 col-sm-4 ">
                            <label>
<textarea name="album_content" class="form-control" rows="3"
          placeholder="Description">{{  isset($albums) ? old('album_content' , $albums->album_content) : old('album_content')  }}</textarea>
                            </label>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Album Image<span
                                class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="btn btn-secondary" id="blog_img" name="album_img">
                        </div>
                    </div>
                    @if($edit_form)
                        @if( count($images) > 0 )
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Edit Image</th>
                                    <th>Edit Title</th>
                                    <th>Images</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <th>
                                            <img style="width: 30px;height: 30px"
                                                 src="{{ asset('panel/images/'.$image->img_name) }}">
                                        </th>
                                        <td>
                                            <input class="btn btn-success" type="file"
                                                   name="img_name.{{ $image->img_id }}">
                                        </td>
                                        <td>
                                            <input name="img_title.{{ $image->img_id }}" type="text"
                                                   class="form-control"
                                                   value="{{ $image->img_title }}">
                                        </td>

                                        <td>
                                            <a style="color: white !important;" class="btn btn-success"
                                               href="{{ Route('gallery.show' , $albums->album_id) }}"><i
                                                    class="fa fa-table"></i></a>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                                <a style="color: white !important;" class="btn btn-danger"
                                                   onclick="executeExample('customHtml')"><i
                                                        class="fa fa-times"></i></a>
                                            @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Operator' && \Illuminate\Support\Facades\Auth::user()->id == $albums->album_user_id)
                                                <a style="color: white !important;" class="btn btn-danger"
                                                   onclick="executeExample('customHtml')"><i
                                                        class="fa fa-times"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <input type="hidden" name="img_id[]" value="{{ $image->img_id }}">
                                        </td>
                                    </tr>
                                    <script>
                                        function executeExample(customHtml) {
                                            Swal.fire({
                                                icon: 'info',
                                                html:
                                                    'ایا برای حذف اطلاعات مورد نظر اطمینان دارید؟  ',
                                                showCloseButton: true,
                                                showCancelButton: true,
                                                focusConfirm: false,
                                                confirmButtonText:
                                                    '<a style="color: white;" href="{{  Route('gallery.destroy' , $image->img_id) }}">Yes!</a>',
                                                confirmButtonAriaLabel: 'Thumbs up, great!',
                                                cancelButtonText:
                                                    '<i class="fa fa-thumbs-down"></i>',
                                                cancelButtonAriaLabel: 'Thumbs down'
                                            })

                                        }
                                    </script>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif

                    <div class="row it">
                        <div class="col-sm-offset-1 col-sm-10" id="one" style="margin: 25px 50px 34px 80px">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4 form-group">
                                    <h3 class="text-center">Add images</h3>
                                </div>
                                <!--form-group-->
                            </div>
                            <!--row-->
                            <div method="post" action="" data-parsley-validate
                                 enctype="multipart/form-data" class="form-horizontal form-label-left">

                                <div id="uploader">
                                    <div class="row uploadDoc">
                                        <div class="col-sm-3">
                                            <div class="docErr">Please upload valid file</div>
                                            <!--error-->
                                            <div class="fileUpload btn btn-orange">
                                                <img src="https://image.flaticon.com/icons/svg/136/136549.svg"
                                                     class="icon">
                                                <span class="upl" id="upload">Upload document</span>
                                                <input type="file" name="images[]"
                                                       class="upload up" id="up" onchange="readURL(this);"/>
                                            </div><!-- btn-orange -->
                                        </div><!-- col-3 -->
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"
                                                   name="image_text[]" placeholder="Title">
                                        </div>
                                        <!--col-8-->
                                        <div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a>
                                        </div>
                                        <!-- col-1 -->
                                    </div>
                                    <!--row-->
                                </div>
                                <!--uploader-->
                                <div class="text-center">
                                    <a class="btn btn-new"><i class="fa fa-plus"></i> Add new</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--one-->


                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3" style="text-align: center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>




@endsection





@section('footer')
    <script>
        var fileTypes = ['pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png', 'txt'];  //acceptable file types
        function readURL(input) {
            if (input.files && input.files[0]) {
                var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
                    isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types

                if (isSuccess) { //yes
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if (extension == 'pdf') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/179/179483.svg');
                        } else if (extension == 'docx') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/281/281760.svg');
                        } else if (extension == 'rtf') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136539.svg');
                        } else if (extension == 'png') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136523.svg');
                        } else if (extension == 'jpg' || extension == 'jpeg') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136524.svg');
                        } else if (extension == 'txt') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136538.svg');
                        } else {
                            //console.log('here=>'+$(input).closest('.uploadDoc').length);
                            $(input).closest('.uploadDoc').find(".docErr").slideUp('slow');
                        }
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    //console.log('here=>'+$(input).closest('.uploadDoc').find(".docErr").length);
                    $(input).closest('.uploadDoc').find(".docErr").fadeIn();
                    setTimeout(function () {
                        $('.docErr').fadeOut('slow');
                    }, 9000);
                }
            }
        }

        $(document).ready(function () {

            $(document).on('change', '.up', function () {
                var id = $(this).attr('id'); /* gets the filepath and filename from the input */
                var profilePicValue = $(this).val();
                var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
                profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 20); /* isolates the filename */
                //var profilePicLabelText = $(".upl"); /* finds the label text */
                if (profilePicValue != '') {
                    //console.log($(this).closest('.fileUpload').find('.upl').length);
                    $(this).closest('.fileUpload').find('.upl').html(profilePicValue); /* changes the label text */
                }
            });

            $(".btn-new").on('click', function () {
                $("#uploader").append('<div class="row uploadDoc"><div class="col-sm-3"><div class="docErr">Please upload valid file</div><!--error--><div class="fileUpload btn btn-orange"> <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon"><span class="upl" id="upload">Upload document</span><input type="file" class="upload up" name="images[]" id="up" onchange="readURL(this);" /></div></div><div class="col-sm-8"><input type="text" class="form-control" name="image_text[]" placeholder="Note"></div><div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div></div>');
            });

            $(document).on("click", "a.btn-check", function () {
                if ($(".uploadDoc").length > 1) {
                    $(this).closest(".uploadDoc").remove();
                } else {
                    alert("You have to upload at least one document.");
                }
            });
        });
    </script>

@stop
