<!-- Sidebar  -->
<nav id="sidebar">  
    <ul class="list-unstyled components">
        @for($i=0;$i<count($grade_levels);$i++)
        <li>
            <a href="#gradeSidebar{{$grade_levels[$i]['level']}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-angle-right fs-2"></i> {{$grade_levels[$i]['name']}}
            </a>
            <ul class="collapse list-unstyled submenu-list" id="gradeSidebar{{$grade_levels[$i]['level']}}">
                @foreach($subjects as $subject)
                <li>
                    <a href="{{\LaravelLocalization::localizeURL('topics/grades/'.$grade_levels[$i]['level'].'/subjects/'.$subject->id)}}">{{$subject->name}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        @endfor
    </ul>
</nav>