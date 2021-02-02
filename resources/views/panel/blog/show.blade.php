@extends('panel.layouts.app')


@section('header')

    <!-- Datatables -->

    <link href="{{ asset('panel/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">

@endsection

@section('content')


    <div class="row">
        <div class="col-md-12 col-sm-12 ">
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th>Blog Image</th>
                                        <th>Title</th>
                                        <th>operation</th>
                                    </tr>
                                    </thead>
                                    @include('notification.notification')
                                    @if( !count($blog) == 0 )
                                        <tbody>
                                        @foreach($blog as $b)
                                            <tr style="text-align: center">
                                                <td>
                                                    <img style="width: 80px;height: 80px;"
                                                         src="{{ asset('panel/images/'.$b->blog_img) }}">
                                                </td>
                                                <td>{{ $b->blog_title }}</td>
                                                <td>@include('panel.blog.operation',$b)</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <tbody>
                                        <tr style="text-align: center">
                                            <td>empty</td>
                                            <td>empty</td>
                                            <td>empty</td>
                                            <td>empty</td>
                                        </tr>
                                        </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@stop

@section('footer')

    <!-- Datatables -->
    <script src="{{ asset('panel/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>



@stop
