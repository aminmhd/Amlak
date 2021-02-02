<div class="slim_modal" id="{{ $item }}">
    <div class="sm_content">
        <div class="sm_content_inner_wrap">
            <div class="sm_area_top">
                <h3>{{ isset($image) ? $image->img_title : $album->album_status     }}
                    <span></span>
                </h3>
                <br>
                <div>
                    <p>
                    {{ isset($album) ? $album->album_content : '' }}
                    </p>
                </div>
            </div>
            <div class="sm_area_bottom">
                <img
                    src="{{ isset($image) ? asset('panel/images/'.$image->img_name) : asset('panel/images/'.$album->album_img) }}"
                    style="height: 250px;width: 250px;">
            </div>
            <a class="sm_close sm_close_button">CLOSE</a>
        </div>
    </div>
</div>



