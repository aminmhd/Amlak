@extends('panel.layouts.app')


@section('content')
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name
                            <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="user_name" type="text" id="first-name" class="form-control"
                                   value="{{ isset($user_info) ? old('user_name' , $user_info->name) : old('user_name') }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-username">User Name
                            <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="user_username"
                                   value="{{ isset($user_info) ? old('user_username' , $user_info->username) : old('user_username') }}"
                                   type="text" id="first-username" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span
                                class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" id="last-name" name="user_email" required="required"
                                   class="form-control"
                                   value="{{ isset($user_info) ? old('user_email' , $user_info->email) : old('user_email') }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password
                            <span></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="last-name" name="user_password" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_img">Upload Image <span
                                class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="btn btn-secondary" id="blog_img" name="user_img">
                        </div>
                    </div>

                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Role</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="gender" class="btn-group" data-toggle="buttons">

                                    <label
                                        class="first btn btn-secondary"
                                        data-toggle-class="btn-primary" style="
                                        background-color: {{ isset($user_info) && $user_info->role == 'Admin' ? "#007bff" : "#6c757d" }};
                                        color: white;
                                        border: 1px solid {{ isset($user_info) && $user_info->role == 'Admin' ? "#007bff" : "#6c757d" }};
                                        !important;"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="role" value="1"
                                               class="join-btn" {{ isset($user_info) && $user_info->role == 'Admin' ? 'checked' : '' }}>
                                        &nbsp; Admin

                                    </label>
                                    <label
                                        class="second btn btn-primary"
                                        data-toggle-class="btn-primary"
                                        style="
                                            background-color: {{ isset($user_info) && $user_info->role == 'Operator' ? "#007bff" : "#6c757d" }};
                                            color: white;
                                            border: 1px solid {{ isset($user_info) && $user_info->role == 'Admin' ? "#007bff" : "#6c757d" }};
                                            !important;"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="role" value="2"
                                               class="join-btn" {{ isset($user_info) && $user_info->role == 'Operator' ? 'checked' : '' }}>
                                        Operator
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Reset</button>
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
        $(document).ready(function () {

            $(".first").click(function () {
                $(this).css("background-color", "#007bff");
                $(".second").css("background-color", "#6c757d");
            });
            $(".second").click(function () {
                $(this).css("background-color", "#007bff");
                $(".first").css("background-color", "#6c757d");
            });
        });
    </script>


@endsection
