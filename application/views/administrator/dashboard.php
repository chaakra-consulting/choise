<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<!-- content -->
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Sistem E-Recruitment</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-building-o fa-3x"></i>
        <div class="info">
          <h4>Perusahaan</h4>
          <?php
          $query_per = $this->db->query("SELECT count(id_perusahaan) AS jumlah FROM tb_perusahaan");
          $result = $query_per->result_array();
          ?>
          <p><b><?php echo $result[0]['jumlah'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-file fa-3x"></i>
        <div class="info">
          <h4>Lowongan Aktif</h4>
          <?php
          $query_low = $this->db->query("SELECT count(id_lowongan) AS jumlah FROM tb_lowongan WHERE status='tersedia'");
          $result = $query_low->result_array();
          ?>
          <p><b><?php echo $result[0]['jumlah'] ?></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Pelamar</h4>
          <?php
          $query_pel = $this->db->query("SELECT count(id_pelamar) AS jumlah FROM tb_pelamar");
          $result = $query_pel->result_array();
          ?>
          <p><b><?php echo $result[0]['jumlah'] ?></b></p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Stars</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div> -->
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Grafik Lowongan Bulanan <?= json_encode($currentYear) ?></h3>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="tile">
        <h3 class="tile-title">Distribusi Pelamar</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
          <div id="pieChartLegend"></div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- end content -->
<?php $this->load->view('layout/footer'); ?>
<script type="text/javascript">
  var dynamicLabels = <?= json_encode($monthLabels) ?>;
  var dynamicData = <?= json_encode($monthlyData) ?>;
  var currentYear = <?= json_encode($currentYear) ?>;

  var data = {
    labels: dynamicLabels,
    datasets: [
      {
        label: "Total Lowongan " + currentYear,
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: dynamicData // <--- Injects the [0, 5, 0, 12...] array
      }
    ]
  };

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);


  var pdata = [{
      value: <?= $genderDistribution[0]['jumlah'] ?>,
      color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "Laki-laki"
    },
    {
      value: <?= $genderDistribution[1]['jumlah'] ?>,
      color: "#F7464A",
      highlight: "#FF5A5E",
      label: "Perempuan"
    }
  ]

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var options = {
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li style=\"list-style: none;\"><span style=\"display:inline-block; width:12px; height:12px; margin-right:8px; background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };
  var pieChart = new Chart(ctxp).Pie(pdata, options);
  $("#pieChartLegend").html(pieChart.generateLegend());
</script>