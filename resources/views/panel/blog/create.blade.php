@extends('panel.layouts.app')

@section('header')

    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('panel/vendors/cdn/editor.pkgd.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection



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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_title">Title
                            <span class="required"></span>
                        </label>
                        {{-- {{ dd($blog_info) }}--}}
                        <div class="col-md-6 col-sm-6 ">
                            <input name="blog_title" type="text" id="blog_title" class="form-control"
                                   value="{{ isset($blog_info) ? old('blog_title' , $blog_info->blog_title) : old('blog_title')  }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="blog_img">Upload Image <span
                                class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="btn btn-secondary" type="file" id="blog_img" name="blog_img">
                        </div>
                    </div>
                    <div class="item form-group">
                        {{-- ///////////// wysiwyg  //////////////--}}
                        <div class="x_content">
                            <textarea id="froala-editor" name="blog_description" style="display:none;">
                                {{ isset($blog_info) ? old('blog_description' , $blog_info->blog_content) : old('blog_description') }}
                            </textarea>
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
