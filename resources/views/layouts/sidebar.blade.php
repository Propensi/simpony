<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/adminlte/dist/img/user.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
               <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->role }}
               <br>{{ Auth::user()->departments->Dept_Name }}</a>
             
            </div>
        </div>

        <!-- search form (Optional) -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
              <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="#"><span>Link</span></a></li> -->
            @if(Auth::user()->role == 'General Manager')
            @include('layouts.generalmanager')
            @endif
            <li class="treeview">
                <a href="#"><i class="fa fa-plus"></i><span>Membuat Request</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                <li><a href="{{url('assignments/create')}}">Pembuatan Promo</a></li>
                <li><a href="{{ url('assignments2/membuatriset')}}">Pembuatan Data Riset</a></li>

            </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-search"></i><span>Melacak Request</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                <li><a href="{{url('assignments/pelacakan')}}"><span>Pelacakan Promo<span></a></li>
                <li><a href="{{ url('assignments2/pelacakan')}}"><span>Pelacakan Data Riset</span></a></li>

            </ul>
            </li>

            @if(Auth::user()->role == 'Head of Dept')
            @include('layouts.hod')
            @endif

            @if(Auth::user()->role == 'Head Group')
            @include('layouts.hg')
            @endif
            
            @if(Auth::user()->role == 'Staff' && Auth::user()->Dept_name != '6' )
            @include('layouts.staff')
            @endif

            @if(Auth::user()->role == 'Admin')    
            @include('layouts.admin')

            @endif

            @if(Auth::user()->Dept_name == '6')    
            @include('layouts.ps')

            @endif



        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>