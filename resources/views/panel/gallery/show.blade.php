@extends('panel.layouts.app')


@section('header')

    <link href="{{ asset('panel/modals/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/modals/scss/style.css') }}" rel="stylesheet">
    {{--table--}}
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
                                        <th>Image</th>
                                        <th>Image Name</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    @include('notification.notification')
                                    <tbody>
                                    @if( count($albums) > 0)
                                        @foreach($albums as $item => $album)
                                            <tr style="text-align: center">
                                                <td><img style="width: 80px;height: 80px;"
                                                         src="{{ asset('panel/images/'.$album->album_img) }}"></td>
                                                <td>{{ $album->album_img }}</td>
                                                <td>{{ $album->album_status }}</td>
                                                <td>@include('panel.gallery.action', [$item])</td>
                                            </tr>
                                            @include('panel.modal.modal' ,[$album])
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


@endsection


@section('footer')

    <script src="{{ asset('panel/modals/js/index.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('panel/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

@stop
