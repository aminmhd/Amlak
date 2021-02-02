@extends('panel.layouts.app')


@section('header')


    <link href="{{ asset('panel/modals/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/modals/scss/style.css') }}" rel="stylesheet">


@endsection




@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>gallery</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
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
                        @include('notification.notification')
                        @if(count($images) > 0)
                            @foreach($images as $item => $image)
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%;height: 100%; display: block;"
                                                 src="{{ asset('panel/images/'.$image->img_name) }}"
                                                 alt="image"/>
                                            <div class="mask">
                                                <p>{{--Your Tex--}}</p>
                                                <div class="tools tools-bottom">
                                                    <a class="sm_open" data-modal="{{ $item }}"
                                                       data-effect="pushdown"><i
                                                            class="fa fa-desktop"></i></a>
                                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                                                        <a onclick="executeExample('customHtml')"><i
                                                                class="fa fa-times"></i></a>
                                                    @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Operator' && \Illuminate\Support\Facades\Auth::user()->id == $album->album_user_id)
                                                        <a onclick="executeExample('customHtml')"><i
                                                                class="fa fa-times"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p>{{ $image->img_title }}</p>
                                        </div>
                                    </div>
                                </div>
                                @include('panel.modal.modal',[$item])
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
                        @else
                            There are no photos for showing
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection


@section('footer')
    <script src="{{ asset('panel/modals/js/index.js') }}"></script>
    {{--sweet alert--}}



@endsection
