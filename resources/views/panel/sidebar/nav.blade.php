<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <br>
            <br>
            <li><a href="{{ Route('profile.index') }}"><i class="fa fa-home"></i> Home</a></li>

            @if( \Illuminate\Support\Facades\Auth::check()  && \Illuminate\Support\Facades\Auth::user()->role == 'Admin')

                <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ Route('user.create') }}">Users Create</a></li>
                        <li><a href="{{ Route('user.show') }}">Users Table</a></li>
                    </ul>
                </li>
            @endif


            <li><a><i class="fa fa-desktop"></i> Blog <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ Route('blog.create') }}">Blog Create</a></li>
                    <li><a href="{{ Route('blog.show') }}">Blog Table</a></li>
                </ul>
            </li>


            <li><a><i class="fa fa-image"></i> Gallery <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ Route('image.create') }}">New Image</a></li>
                    <li><a href="{{ Route('image.show') }}">Show Gallery</a></li>
                </ul>
            </li>
            <li><a href="{{ Route('test') }}"><i class="fa fa-image"></i> Test</a>
            </li>
        </ul>
    </div>
</div>
