@if(Auth::user()->Dept_name == '1')
<li ><a href ="{{url('assignments2/index')}}"><i class="fa fa-files-o"></i><span>Melihat Pekerjaan</span></a></li>
<li ><a href ="{{url('artists')}}"><i class="fa fa-files-o"></i><span>Mengelola Artis</span></a></li>
<li ><a href ="{{url('programs')}}"><i class="fa fa-files-o"></i><span>Mengelola Program</span></a></li>
@endif

@if(Auth::user()->Dept_name == '3')
<li ><a href ="{{url('assignments/pekerjaanstaff')}}"><i class="fa fa-files-o"></i><span>Melihat Pekerjaan</span></a></li>

@endif