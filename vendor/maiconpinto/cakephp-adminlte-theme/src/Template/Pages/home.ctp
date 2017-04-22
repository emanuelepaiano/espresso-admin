<?php require "functions.inc.php"; ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotspot Status
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

     <?php
           //preparing data
           $users=count(getUsers());
           $guests=count(getGuestSessions());
           $online=count(getOnlineSessions());
           $expired=count(getExpiredSessions());
           $sessions=count(getSessions());
           $groups=count(getGroups());
           $frontend_users=$sessions-$guests;
                
     ?>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $sessions ?></h3>

              <p>Total sessions</p>
            </div>
            <div class="icon">
              <i class="fa fa-laptop"></i>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $frontend_users ?></h3>

              <p>Logged users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
          </div>
        </div>
          
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $online ?></h3>

              <p>Online sessions</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-circle"></i>
            </div>
          </div>
        </div>
          
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $expired ?></h3>

              <p>Expired sessions</p>
            </div>
            <div class="icon">
              <i class="fa fa-ban"></i>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row">
        <section class="col-lg-4 connectedSortable">      
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sessions Login</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="usageChart" style="height:250px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
        </section>
          <section class="col-lg-4 connectedSortable">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Guest / User Sessions</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="guest-user-pie" style="height:250px"></canvas>
            </div>
          </div>
        </section>
          <section class="col-lg-4 connectedSortable">          
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Clients OS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="general" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </section> 
      </div>  
     <div class="row">
         <section class="col-lg-4 connectedSortable">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Clients Browser</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
          </div>
        </section>
          <section class="col-lg-4 connectedSortable">          
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Load average (avg/minutes)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="cpu-monitor" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </section> 
         <section class="col-lg-4 connectedSortable">          
            <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Memory Peak (in KB) </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="memory-monitor" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </section> 
    </div>
    </section>
    <!-- /.content -->
<?php
$this->Html->css([
    'AdminLTE./plugins/iCheck/flat/blue',
    'AdminLTE./plugins/morris/morris',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  'AdminLTE./plugins/morris/morris.min',
  'AdminLTE./plugins/sparkline/jquery.sparkline.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'AdminLTE./plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>

<?php
$this->Html->script([
  'AdminLTE./plugins/chartjs/Chart.min',
],
['block' => 'script']);
?>


<?php $this->start('scriptBotton'); ?>
<?php if(count(getSessions())>0): ?>
<script type="text/javascript">

  $(function () {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
     
    <?php $browsers=getSessionsBrowsersList(); ?>
    <?php 
    
        $color=[
            'Firefox' => '#f39c12',
            'Internet Explorer' => '#00a65a',
            'Safari' => '#00c0ef',
            'Chrome' => '#f56954',
            'Opera' => '#3c8dbc',
            'Netscape' => '#5656b0',
            'Maxthon' => '#9a56b0',
            'Konqueror' => '#566db0',
            'Mobile Browser' => '#b06056',
            'Other' => '#a956b0'
        ];
    
    ?>
        
    <?php foreach($browsers as $browser): ?>
        {
         value: <?php echo count(getSessions(' browser="' . $browser[0] . '"')) ?>,
        <?php if (array_key_exists($browser[0], $color)): ?>
            color: '<?php echo $color[$browser[0]] ?>',
            highlight: '<?php echo $color[$browser[0]] ?>',
        <?php else: ?>
            color: '<?php echo $color['Other'] ?>',
            highlight: '<?php echo $color['Other'] ?>',
        <?php endif ?>
         label: '<?php echo $browser[0] ?>'
        },
       
    <?php endforeach ?>
    ];
    
    <?php if(count($sessions)>0): ?>  
     //-------------
    //- GUEST-USER-PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var GuestUserCanvas = $("#guest-user-pie").get(0).getContext("2d");
    var GuestUserChart = new Chart(GuestUserCanvas);
    var GuestUserData = [
     
    <?php $browsers=getSessionsBrowsersList(); ?>
    <?php 
    
        $color=[
            'Guests' => '#f56954',
            'Users' => '#f39c12'
        ];
    
    ?>
        {
         value: <?php echo $sessions-$guests ?>,
            color: '<?php echo $color["Users"] ?>',
            highlight: '<?php echo $color["Users"] ?>',
            label: 'Users'
        },
        {
         value: <?php echo $guests ?>,
            color: '<?php echo $color["Guests"] ?>',
            highlight: '<?php echo $color["Guests"] ?>',
            label: 'Guests'
        }
       
    ];
    <?php endif ?>  
      
      
   
    var pieOptions = { 
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 0, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions); 
    GuestUserChart.Doughnut(GuestUserData, pieOptions);  
      
    <?php 
        
        $osList=getSessionsOSList();
    ?>
    
     <?php if(count($osList)>0): ?>  
    //-------------
    //- General BAR CHART -
    //-------------  
    var areaChartData = {
      labels: [<?php foreach($osList as $os)
                echo "'" . $os[0] . "', "; ?>],
      datasets: [
        {
          label: "Platform",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php foreach($osList as $os)
                echo getOSCount($os[0]) . ", "; ?>],
        }
      ]
    };
      
    <?php endif ?>
      
      <?php $cpu_avgs=sys_getloadavg(); ?>
      <?php if(count($cpu_avgs)>0): ?>  
      
     //-------------
    //- General BAR CHART -
    //-------------  
    var avgChartData = {
      labels: ['1','5','15'],
      datasets: [
        {
          label: "Cpu AVGs",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php foreach($cpu_avgs as $avg) echo $avg . ", "; ?>],
        }
      ]
    };
    
   <?php endif ?>
    
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    //areaChart.Line(areaChartData, areaChartOptions);
     
    <?php $hourList=getSessionsHourList(); ?>
    <?php if(count($hourList)>0): ?>  
    var usageChartData = {
      labels: [<?php foreach($hourList as $hour)
                echo "'" . $hour[0] . ",00 - " . $hour[1] . "/" . $hour[2] . "', "; ?>],
      datasets: [
        {
          label: "Session Counters",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [
              <?php foreach($hourList as $hour)
                    echo count(getSessions(" hour(lastlog)=" . "$hour[0] and day(lastlog)=" . "$hour[1] and month(lastlog)=" . "$hour[2]")) . ",";
               ?>
              ]
        }
      ]
    };
      
      
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#usageChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(usageChartData, lineChartOptions);
    <?php endif ?>  
    
    var barChartCanvas = $("#general").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[0].fillColor = "#00c0ef";
    barChartData.datasets[0].strokeColor = "#00c0ef";
    barChartData.datasets[0].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };
    
    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
    
    
    var cpuChartCanvas = $("#cpu-monitor").get(0).getContext("2d");
    var cpuChart = new Chart(cpuChartCanvas);
    var cpuChartData = avgChartData;
    cpuChartData.datasets[0].fillColor = "#00c0ef";
    cpuChartData.datasets[0].strokeColor = "#00c0ef";
    cpuChartData.datasets[0].pointColor = "#00a65a";  
    barChartOptions.datasetFill = false;
    cpuChart.Bar(cpuChartData, barChartOptions);
    
    
    <?php 
        $memoryPeak=(memory_get_usage()/1024);
        $memoryUsage=(memory_get_peak_usage()/1024);
      ?> 
    var memoryChartData = {
      labels: ['Backend', 'PHP'],
      datasets: [
        {
          label: "Memory Usage",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: ['<?php echo $memoryUsage ?>', '<?php echo $memoryPeak ?>']
        }
      ]
    };  
      
      
    
      
    var memoryChartCanvas = $("#memory-monitor").get(0).getContext("2d");
    var memoryChart = new Chart(memoryChartCanvas);
    var memoryChartData = memoryChartData;
    memoryChartData.datasets[0].fillColor = "#00c0ef";
    memoryChartData.datasets[0].strokeColor = "#00c0ef";
    memoryChartData.datasets[0].pointColor = "#00a65a";  
    memoryChart.Bar(memoryChartData, barChartOptions);    
      
      
  });    
        
        
    </script>
<?php endif ?>
<?php  $this->end(); ?>
