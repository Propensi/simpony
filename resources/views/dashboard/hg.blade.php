@extends('layouts.dashboard')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.js"></script>

<div class="row">
        
        <!-- ./col -->
        
        <!-- ./col -->
      </div>

      <div class="row">
      <div class="col-md-6">
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rating Program RCTI</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <canvas id="myChart" ></canvas>
            </div>
            <!-- /.box-body -->
          </div>

          </div>


        <div class="col-md-6">
          <div class="box box-solid bg-teal-gradient">


        <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Deadline Pekerjaan Dept. Promotions</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>

        <div class="box-body border-radius-none">  
        <canvas id="workchart" ></canvas></div>
        </div>

                    </div>
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
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pekerjaan Saat Ini</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <canvas id="piechart" ></canvas>
            </div>
            <!-- /.box-body -->
          </div>

          </div>

        </div>

       <script>

var xAxis = [];
var yAxis1 = [];

            @foreach($work as $item)
              xAxis.push('{{$item->Tgl_Deadline}}');
              yAxis1.push('{{$item->jumlah}}');
                           
            @endforeach

var ctx = document.getElementById("workchart");


var workchart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: xAxis,
        datasets: [{

            fill: false,
            data: yAxis1,
            lineTension: 0.1,
                      borderColor: "rgba(45, 178, 213, 1)",
                      borderCapStyle: 'butt',
                      borderDash: [],
                      borderDashOffset: 0.0,
                      borderJoinStyle: 'miter',
                      pointBorderColor: "rgba(45, 178, 213, 1)",
                      pointBackgroundColor: "#fff",
                      pointBorderWidth: 1,
                      pointRadius: 5,
                      label:'Pekerjaan',
                      pointHitRadius: 10,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

Chart.defaults.global.responsive = true;
</script>

<!-- end box -->

    
<script>

var xAxis = [];
          var yAxis1 = [];

            @foreach($rating as $rats)
              xAxis.push('{{$rats->Tanggal_Sum}}');
              yAxis1.push('{{$rats->Average_Rating}}');
                           
            @endforeach

var ctx = document.getElementById("myChart");


var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: xAxis,
        datasets: [{

            fill: false,
            data: yAxis1,
            lineTension: 0.1,
                      borderColor: "rgba(45, 178, 213, 1)",
                      borderCapStyle: 'butt',
                      borderDash: [],
                      borderDashOffset: 0.0,
                      borderJoinStyle: 'miter',
                      pointBorderColor: "rgba(45, 178, 213, 1)",
                      pointBackgroundColor: "#fff",
                      pointBorderWidth: 1,
                      pointRadius: 5,
                      label:'Rating The Voice',
                      pointHitRadius: 10,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

Chart.defaults.global.responsive = true;
</script>

<script>

var done = [];
          var going = [];


              done.push('{{$assndone}}');
              going.push('{{$assn}}');
                        

var ctx = document.getElementById("piechart");


var data = {
    labels: [
        "Pekerjaan Selesai",
        "Pekerjaan Saat ini",
    ],
    datasets: [
        {
            data: [done, going],
            backgroundColor: [
                "#FF6384",
                "#36A2EB"

            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB"
            ]
        }]
};

var piechart = new Chart(ctx, {
    type: 'pie',
    data: data
});

Chart.defaults.global.responsive = true;
</script>

@endsection

