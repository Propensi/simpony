@extends('layouts.admin_template')

@section('content')

        <section class="content-header">
            <div class="col-md-6">
            <br>
            <div class="col-md-6 box">
                 <div class="col-md-12">
                    <center>


                    <img src="http://localhost/simpony/resources/uploads/simponi.png" width="450px" class="img-responsive">
                    

            <br>
            <h1>
                Selamat Datang {{ Auth::user()->name }}
            </h1>
            <hr>
            <h2>
                Role : {{ Auth::user()->role }}
            </h2>
        
        

        </center>
            <!-- You can dynamically generate breadcrumbs here -->
   <!--          <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol> -->
        </div>
        </div>
        </div>
        </section>


    <div class='row'>
        <div class='col-md-6'>
            <!-- Box -->
        </div><!-- /.col -->

        <div class='col-md-6'>
           
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection

