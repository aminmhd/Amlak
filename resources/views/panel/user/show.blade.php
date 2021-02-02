@extends('panel.layouts.app')


@section('header')

    <!-- Datatables -->

    <link href="{{ asset('panel/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('panel/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('panel/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
          rel="stylesheet">






@endsection

@section('content')
@include('notification.notification')
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
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>operation</th>
                                    </tr>
                                    </thead>
                                    @include('notification.notification')
                                    @if( !count($users) == 0 )
                                        <tbody>
                                        @foreach($users as $u)
                                            <tr style="text-align: center">
                                                <td>{{ $u->name }}</td>
                                                <td>{{ $u->username }}</td>
                                                <td>{{ $u->email }}</td>
                                                <td>{{ $u->role }}</td>
                                                <td>@include('panel.user.operation' , $u)</td>
                                            </tr>
                                        @endforeach
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
