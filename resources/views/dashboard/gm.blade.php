@extends('layouts.dashboard')

@section('content')

<div class="row">
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Pekerjaan Divisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>90</h3>

              <p>Promotions</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
        </div>

        
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>60</h3>

              <p>Research & Dev.</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
      <div class="col-md-6">
                  <div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Jadwal Tayang</h3>

            
            <!-- /.box-header -->
            <div class="box-body">

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>Jam</th><th>Program</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($jadwaltayangs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td><a href="{{ url('jadwaltayangs', $item->Jadwal_ID) }}">{{ $x }}</td> -->
                    <td>{{ $item->Time }}</a></td>
                    <td>{{ $item->Nama_Program }}</td>
                   
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $jadwaltayangs->render() !!} </div>
   

</div>
</div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              </div>
          </div>      
        </div>
        </div>

        <div class="col-md-6">
          <div class="box box-solid bg-teal-gradient">


        <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Jumlah Pekerjaan Masuk Minggu Ini</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>

        <div class="box-body border-radius-none">  
        <div id="myfirstchart" style="height: 250px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" class="chart" ></div>
        </div>


      </div>
      </div>





       </div>




        <script>
        $(document).ready(function() {
            barChart();

            $(window).resize(function() {
                window.m.redraw();
            });
        });

        function barChart() {

         window.m = Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
              { day: '2016-05-02', value: 20 },
              { day: '2016-05-03', value: 10 },
              { day: '2016-05-04', value: 5 },
              { day: '2016-05-05', value: 5 },
              { day: '2016-05-06', value: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'day',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            pointFillColors: ['#efefef'],
            lineColors: ['#efefef'],
            eventLineColors: ['#efefef'],
            
            gridTextColor: ['#efefef'],
            resize: true

          });

          }


        </script>

@endsection

