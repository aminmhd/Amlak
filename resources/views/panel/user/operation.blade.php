

<a style="color: white !important;" class="btn btn-danger" aria-label="Try me! Example: Custom HTML description and buttons" onclick="executeExample('customHtml')"><i
        style="font-size: large;" class="fa fa-times"></i> </a>
<a style="color: white !important;" class="btn btn-warning" href="{{ Route('user.edit' , $u->id) }}"><i
        style="font-size: large;" class="fa fa-edit"></i> </a>


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
                '<a style="color: white;" href="{{  Route('user.delete' , $u->id) }}">Yes!</a>',
            confirmButtonAriaLabel: 'Thumbs up, great!',
            cancelButtonText:
                '<i class="fa fa-thumbs-down"></i>',
            cancelButtonAriaLabel: 'Thumbs down'
        })

    }
</script>





