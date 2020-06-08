<?php  
session_start();
error_reporting(0);

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    // header("location:login.php?pesan=gagal");
  header("location:login.php");
}
include "page/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI Aset KPPN Lhokseumawe</title>
  
  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="asset/css/stylee.css">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logokppn.png">
  <style>
    #contento{
      display:none;
    }
  </style>
</head>

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  <nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
      <div class="navbar-header" style="width:100%;">
        <div class="opener-left-menu is-open">
          <span class="top"></span>
          <span class="middle"></span>
          <span class="bottom"></span>
        </div>
        <ul class="nav navbar-nav search-nav">
          <li>
           <!-- <div class="search">
            <span class="fa fa-search icon-search" style="font-size:23px;"></span>
            <div class="form-group form-animate-text">
              <input type="text" class="form-text" required>
              <span class="bar"></span>
              <label class="label-search">Type anywhere to <b>Search</b> </label>
            </div>
          </div> -->
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right user-nav" style="padding-right: 5%">
       <li class="user-name animated fadeInLeft"><span><?php echo $_SESSION['username']; ?></span></li>
       <li class="dropdown avatar-dropdown">
         <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
       </li>
       <li><a href="logout.php" style="margin-top: -2px"><img src="asset/img/logout.png" alt="Logout" style="height: 25px"></a></li>
     </ul>
   </div>
 </div>
</nav>
<!-- end: Header -->

<div class="container-fluid mimin-wrapper" >


  <!-- start:Left Menu -->
  <div id="left-menu">


    <div class="sub-left-menu scroll">
      <ul class="nav nav-list">
        <li><div class="left-bg"></div></li>
        <li class="time">
          <h1 class="animated fadeInLeft">21:00</h1>
          <p class="animated fadeInRight">Sat,October 1st 2029</p>
        </li>
        <li class="ripple"><a href="index.php"><span class="fa-home fa"></span> Dashboard</a></li>
        <li class="ripple"><a href="index.php?page=data-aset" ><span class="fa-diamond fa"></span> Data Aset</a></li>
        <li class="ripple"><a href="index.php?page=data-pemeliharaan"><span class="fa fa-check-square-o"></span>Pemeliharaan Aset </a></li>
        <li class="ripple" onclick="myclick()"><a class="tree-toggle nav-header" >
          <span class="fa fa-pencil-square"></span> Aset Departemen  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
          <ul id="myclass" style="display: none">
            <a href="index.php?page=asetmski"><li>MSKI</li></a>
            <a href="index.php?page=asetvera"><li>VERA</li></a>
            <a href="index.php?page=asetpd"><li>PD</li></a>
            <a href="index.php?page=asetbank"><li>BANK</li></a>
            <a href="index.php?page=asetbagianumum"><li>Bagian Umum</li></a>
          </ul>
        </li>
        <li class="ripple" onclick="myclick1()"><a class="tree-toggle nav-header">
          <span class="fa fa-pencil-square"></span> Extras  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
          <ul id="myclass1" style="display: none">
            <a href="index.php?page=data-kategori"><li>Data Kategori</li></a>
            <a href="index.php?page=data-lokasi"><li>Data Lokasi</li></a>
            <a href="index.php?page=data-user"><li style="margin-bottom: 100px">Data User</li></a>
          </ul>
        </li>
        <!-- <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-check-square-o"></span>Cetak Laporan </a></li> -->
      </ul>
    </div>
  </div>
</div>
<!-- end: Left Menu -->


<!-- start: content -->
<div id="content">
  <div class="panel" style="margin-bottom: 0px">
    <div class="panel-body">
      <div class="col-md-6 col-sm-12" style="padding-top: 2%;">
        <h3 class="animated fadeInLeft">SI Inventaris Aset KPPN Lhokseumawe</h3>
        <!-- <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p> -->
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="col-md-6 col-sm-12 text-right" style="padding-left:45%;">
          <img class="animated fadeInDown" src="asset/img/logokppn.png" style="height: 100px">
        </div>                  
      </div>
    </div>                    
  </div>


  <div class="col-md-12 padding-0" style="padding-top: 0px">
    <div class="panel bg-light-grey text-black">
     <?php 
     if(isset($_GET['page'])){
      $page = $_GET['page'];

      switch ($page) {
        case 'data-aset':
        include "page/dataaset.php";
        break;
        case 'data-aset-hapus':
        include "page/dataasethapus.php";
        break;

        case 'data-pemeliharaan':
        include "page/datapemeliharaan.php";
        break; 
        case 'data-pemeliharaan-hapus':
        include "page/datapemeliharaanhapus.php";
        break; 

        case 'asetmski':
        include "page/datamski.php";
        break;

        case 'asetvera':
        include "page/datavera.php";
        break;

        case 'asetpd':
        include "page/datapd.php";
        break;  

        case 'asetbagianumum':
        include "page/databagianumum.php";
        break;

        case 'asetbank':
        include "page/databank.php";
        break;

        case 'data-kategori':
        include "page/datakategori.php";
        break;
        case 'data-kategori-hapus':
        include "page/datakategorihapus.php";
        break;

        case 'data-lokasi':
        include "page/datalokasi.php";
        break;
        case 'data-lokasi-hapus':
        include "page/datalokasihapus.php";
        break;

        case 'data-user':
        include "page/datauser.php";
        break;
        case 'data-user-hapus':
        include "page/datauserhapus.php";
        break;

        default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
      }
    }
    else{
      ?>
      <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
          <div class="panel" style="text-align: center; padding: 20px">
            <h3>Selamat Datang 
              <br>di Sistem Informasi Inventaris Aset KPPN Lhokseumawe.</h3>
              <img src="asset/img/home.png" style="width: 400px">
            </div>
          </div>
        </div>
        <?php

      }

      ?>


    </div>
  </div>
  <!-- end: content -->




</div>


<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

<script src="asset/js/js.js"></script>
<script src="asset/js/js1.js"></script>


<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/fullcalendar.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/plugins/jquery.vmap.min.js"></script>
<script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
<script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
<script src="asset/js/plugins/chart.min.js"></script>

<!-- plugin tables -->
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>




<!-- custom -->
<script src="asset/js/main.js"></script>
<script>
  function myclick(){
    var x =document.getElementById("myclass");
    if (x.style.display==="none") {
      x.style.display="block";
    } else {
      x.style.display="none";
    }
  }
</script>
<script>
  function myclick1(){
    var x =document.getElementById("myclass1");
    if (x.style.display==="none") {
      x.style.display="block";
    } else {
      x.style.display="none";
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>

<script type="text/javascript">
  (function(jQuery){

        // start: Chart =============

        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {

          var tooltipEl = $('#chartjs-tooltip');

          if (!tooltip) {
            tooltipEl.css({
              opacity: 0
            });
            return;
          }

          tooltipEl.removeClass('above below');
          tooltipEl.addClass(tooltip.yAlign);

          var innerHtml = '';
          if (undefined !== tooltip.labels && tooltip.labels.length) {
            for (var i = tooltip.labels.length - 1; i >= 0; i--) {
              innerHtml += [
              '<div class="chartjs-tooltip-section">',
              '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
              '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
              '</div>'
              ].join('');
            }
            tooltipEl.html(innerHtml);
          }

          tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle
          });
        };
        var randomScalingFactor = function() {
          return Math.round(Math.random() * 100);
        };
        var lineChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [{
            label: "My First dataset",
            fillColor: "rgba(21,186,103,0.4)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(66,69,67,0.3)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [18,9,5,7,4.5,4,5,4.5,6,5.6,7.5]
          }, {
            label: "My Second dataset",
            fillColor: "rgba(21,113,186,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [4,7,5,7,4.5,4,5,4.5,6,5.6,7.5]
          }]
        };

        var doughnutData = [
        {
          value: 300,
          color:"#129352",
          highlight: "#15BA67",
          label: "Alfa"
        },
        {
          value: 50,
          color: "#1AD576",
          highlight: "#15BA67",
          label: "Beta"
        },
        {
          value: 100,
          color: "#FDB45C",
          highlight: "#15BA67",
          label: "Gamma"
        },
        {
          value: 40,
          color: "#0F5E36",
          highlight: "#15BA67",
          label: "Peta"
        },
        {
          value: 120,
          color: "#15A65D",
          highlight: "#15BA67",
          label: "X"
        }

        ];


        var doughnutData2 = [
        {
          value: 100,
          color:"#129352",
          highlight: "#15BA67",
          label: "Alfa"
        },
        {
          value: 250,
          color: "#FF6656",
          highlight: "#FF6656",
          label: "Beta"
        },
        {
          value: 100,
          color: "#FDB45C",
          highlight: "#15BA67",
          label: "Gamma"
        },
        {
          value: 40,
          color: "#FD786A",
          highlight: "#15BA67",
          label: "Peta"
        },
        {
          value: 120,
          color: "#15A65D",
          highlight: "#15BA67",
          label: "X"
        }

        ];

        var barChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(21,186,103,0.4)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(21,186,103,0.2)",
            highlightStroke: "rgba(21,186,103,0.2)",
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            fillColor: "rgba(21,113,186,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(21,113,186,0.2)",
            highlightStroke: "rgba(21,113,186,0.2)",
            data: [28, 48, 40, 19, 86, 27, 90]
          }
          ]
        };

        window.onload = function(){
          var ctx = $(".doughnut-chart")[0].getContext("2d");
          window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
            responsive : true,
            showTooltips: true
          });

          var ctx2 = $(".line-chart")[0].getContext("2d");
          window.myLine = new Chart(ctx2).Line(lineChartData, {
           responsive: true,
           showTooltips: true,
           multiTooltipTemplate: "<%= value %>",
           maintainAspectRatio: false
         });

          var ctx3 = $(".bar-chart")[0].getContext("2d");
          window.myLine = new Chart(ctx3).Bar(barChartData, {
           responsive: true,
           showTooltips: true
         });

          var ctx4 = $(".doughnut-chart2")[0].getContext("2d");
          window.myDoughnut2 = new Chart(ctx4).Doughnut(doughnutData2, {
            responsive : true,
            showTooltips: true
          });

        };
        
        //  end:  Chart =============

        // start: Calendar =========
        $('.dashboard .calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          defaultDate: '2015-02-12',
            businessHours: true, // display business hours
            editable: true,
            events: [
            {
              title: 'Business Lunch',
              start: '2015-02-03T13:00:00',
              constraint: 'businessHours'
            },
            {
              title: 'Meeting',
              start: '2015-02-13T11:00:00',
                    constraint: 'availableForMeeting', // defined below
                    color: '#20C572'
                  },
                  {
                    title: 'Conference',
                    start: '2015-02-18',
                    end: '2015-02-20'
                  },
                  {
                    title: 'Party',
                    start: '2015-02-29T20:00:00'
                  },

                // areas where "Meeting" must be dropped
                {
                  id: 'availableForMeeting',
                  start: '2015-02-11T10:00:00',
                  end: '2015-02-11T16:00:00',
                  rendering: 'background'
                },
                {
                  id: 'availableForMeeting',
                  start: '2015-02-13T10:00:00',
                  end: '2015-02-13T16:00:00',
                  rendering: 'background'
                },

                // red areas where no events can be dropped
                {
                  start: '2015-02-24',
                  end: '2015-02-28',
                  overlap: false,
                  rendering: 'background',
                  color: '#FF6656'
                },
                {
                  start: '2015-02-06',
                  end: '2015-02-08',
                  overlap: true,
                  rendering: 'background',
                  color: '#FF6656'
                }
                ]
              });
        // end : Calendar==========

        // start: Maps============

        jQuery('.maps').vectorMap({
          map: 'world_en',
          backgroundColor: null,
          color: '#fff',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          values: sample_data,
          scaleColors: ['#C8EEFF', '#006491'],
          normalizeFunction: 'polynomial'
        });

        // end: Maps==============

      })(jQuery);
    </script>
    <!-- end: Javascript -->
  </body>
  </html>