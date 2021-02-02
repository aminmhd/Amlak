@extends('panel.layouts.app')
@section('header')
    {{--echarts--}}
    <script type="text/javascript" src="{{ asset('panel/vendors/cdn/echarts.min.js') }}"></script>
    <!-- Select2 -->
    <link href="{{ asset('panel/vendors/cdn/select2.min.css') }}" rel="stylesheet"/>

@stop

@section('content')


    <div class="page-title">
        <div class="title_left">
            <h3>{{ isset($user) ? $user->name  :  'User'}} </h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" style="width: 220px; height: 220px;"
                                     src="{{ isset($user) ? asset('panel/images/'.$user->img)  : asset('panel/images/img.png')}}" alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3>{{ isset($user) ? $user->name  : 'Amlak Amin'}}</h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> Tehran
                            </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Amlak Amin
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.Amlak4.com</a><br>
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.Amlak4dange.ir</a>
                            </li>
                        </ul>

                        <a href="{{ Route('profile.edit') }}" class="btn btn-danger" style="color: white"><i class="fa fa-edit m-right-xs">Edit Profile</i></a>
                        <br/>

                    </div>
                    <div class="col-md-9 col-sm-9 ">
                    <!-- start of user-activity-graph -->
                        <div id="graph_bar" style="width:100%; height:450px;">
                            <div id="container" style="height: 100%"></div>
                            @include('panel.profile.charts',[
                              $user_table ,
                               $blog_table,
                               $image_table,
                              $contact_table,
                              $partner_table,
                            ])
                        </div>
                    </div>
                    <!-- end of user-activity-graph -->

                </div>
            </div>
        </div>
    </div>



@stop
@section('footer')
    <!-- morris.js -->
    <script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('panel/vendors/cdn/select2.min.js') }}"></script>

    <script>
        $(".js-example-responsive").select2({
            width: 'resolve', // need to override the changed default
            border: '1px solid #ced4da '
        })
    </script>

@endsection


