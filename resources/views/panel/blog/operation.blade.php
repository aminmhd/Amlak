@if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
    <a style="color: white !important;" class="btn btn-danger" onclick="executeExample('customHtml')"><i style="font-size: large;" class="fa fa-times"></i> </a>
    <a style="color: white !important;" class="btn btn-warning" href="{{ Route('blog.edit' , $b->blog_id) }}"><i style="font-size: large;" class="fa fa-edit"></i> </a>
@elseif(\Illuminate\Support\Facades\Auth::user()->role == 'Operator' && \Illuminate\Support\Facades\Auth::user()->id == $b->blog_user_id)
    <a style="color: white !important;" class="btn btn-danger" onclick="executeExample('customHtml')"><i style="font-size: large;" class="fa fa-times"></i> </a>
    <a style="color: white !important;" class="btn btn-warning" href="{{ Route('blog.edit' , $b->blog_id) }}"><i style="font-size: large;" class="fa fa-edit"></i> </a>
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
                '<a style="color: white;" href="{{  Route('blog.delete' , $b->blog_id) }}">Yes!</a>',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText:
                '<i class="fa fa-thumbs-down"></i>',
            cancelButtonAriaLabel: 'Thumbs down'
        })

    }
</script>
