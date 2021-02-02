@extends('panel.layouts.app')

@section('header')

    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('panel/vendors/cdn/editor.pkgd.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection



@section('content')

    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2></h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_title">Title
                            <span class="required"></span>
                        </label>

                        <div class="col-md-6 col-sm-6 ">
                            <input name="title" type="text" id="blog_title" class="form-control"
                                   value="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_title">content
                            <span class="required"></span>
                        </label>

                        <div class="col-md-6 col-sm-6 ">
                           <textarea name="test" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div style="text-align: center" class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



@stop

@section('footer')
    <!-- bootstrap-wysiwyg -->
    <script type="text/javascript" src="{{ asset('panel/vendors/cdn/editor.pkgd.min.js') }}"></script>
    <script>
        new FroalaEditor("#froala-editor")
    </script>


@endsection
