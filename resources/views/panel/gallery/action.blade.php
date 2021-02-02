@if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')

    <a style="color: white !important;" class="btn btn-success" href="{{ Route('gallery.show' , $album->album_id) }}"><i
            class="fa fa-table"></i></a>
    <a style="color: white !important;" class="sm_open btn btn-primary" data-modal="{{ $item }}" data-effect="pushdown"><i
            class="fa fa-desktop"></i></a>
    <a style="color: white !important;" class="btn btn-warning" href="{{ Route('album.edit' , $album->album_id) }}"><i
            class="fa fa-edit"></i></a>
    <a style="color: white !important;" class="btn btn-danger" onclick="executeExample('customHtml')"><i
            class="fa fa-times"></i></a>
@else
    <a style="color: white !important;" class="btn btn-success" href="{{ Route('gallery.show' , $album->album_id) }}"><i
            class="fa fa-table"></i></a>
    <a style="color: white !important;" class="sm_open btn btn-primary" data-modal="{{ $item }}" data-effect="pushdown"><i
            class="fa fa-desktop"></i></a>
    @if(\Illuminate\Support\Facades\Auth::user()->id == $album->album_user_id)
        <a style="color: white !important;" class="btn btn-warning" href="{{ Route('album.edit' , $album->album_id) }}"><i
                class="fa fa-edit"></i></a>
        <a style="color: white !important;" class="btn btn-danger"
           onclick="executeExample('customHtml')"><i
                class="fa fa-times"></i></a>
    @endif
@endif

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
                '<a style="color: white;" href="{{  Route('album.delete' , $album->album_id) }}">Yes!</a>',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText:
                '<i class="fa fa-thumbs-down"></i>',
            cancelButtonAriaLabel: 'Thumbs down'
        })

    }
</script>

