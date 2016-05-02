<!-- Main Header -->
<header class="main-header">
     <a href="http://localhost/TestRepo3/simpony2/public" class="logo">
    <span class="logo-mini"><b>S</b>IM</span>
    <!-- Logo -->
    <span class="logo-lg"><b>Simponi</b>Lite</span>
    <!-- <a href="index2.html" class="logo"><b>Simponi</b> Lite</a> -->
</a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <!-- Messages: style can be found in dropdown.less-->
                


                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">!</span>
                    </a>

                    <?php $notifikasis = DB::table('notifikasis')->where('Receiver','=',Auth::user()->user_ID)->get(); 
                        $users = DB::table('users')->get();
                        $assignments = DB::table('assignments')->get();

                    ?>
                    <ul class="dropdown-menu">
                        <li class="header">Notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    @foreach($notifikasis as $items)
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"> {{ $items->Title }}</i>
                                    </a>
                                    @endforeach
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset("/bower_components/adminlte/dist/img/user.png") }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"> {{ Auth::user()->name }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/adminlte/dist/img/user.png") }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                
                                                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
   
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>