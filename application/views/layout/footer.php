<!-- Essential javascripts for application to work-->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datetimepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script type="text/javascript">
  $('#sampleTable').DataTable();
  $('#sampleTable2').DataTable();
  $('#sampleTable3').DataTable();
  $('#sampleTable4').DataTable();
  $('#sampleTable5').DataTable();
  $('#sampleTable6').DataTable();
  $('#sampleTable7').DataTable();
</script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo base_url('assets/js/plugins/pace.min.js') ?>"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/chart.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-table2excel@1.1.1/dist/jquery.table2excel.min.js"></script>

<script type="text/javascript">
  var data = {
    labels: ["January", "February", "March", "April", "May"],
    datasets: [{
        label: "My First dataset",
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "rgba(220,220,220,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "My Second dataset",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var pdata = [{
      value: 300,
      color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "Complete"
    },
    {
      value: 50,
      color: "#F7464A",
      highlight: "#FF5A5E",
      label: "In-Progress"
    }
  ]

  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);

  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<!-- Google analytics script-->
<script type="text/javascript">
  if (document.location.hostname == 'pratikborsadiya.in') {
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
  }
</script>
<script type="text/javascript">
  $('#notifikasi').delay(5000).slideUp('slow');
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.time').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      todayBtn: true,
      autoclose: true,
      pickerPosition: "top-left"
    });
  });
</script>

<script>
  $("#id_lowongan").change(function() {
    //alert($(this).find(':selected').data('perusahaan'));
    var perusahaan = $(this).find('option:selected').attr('data-idperusahaan');
    $('#idperusahaan').val(perusahaan);
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', ".downloadPelamar", function(e){
      e.preventDefault();
      $("#container-form").show();
      $("#container-results-tabs").hide();
      $("#loading-data").hide();
      $("#btnKembaliSorting").hide();
      $("#btnDownloadPelamar").hide();
      $("#btnPreviewPelamar").show();

      $("#modalDownloadPelamar").modal('show');
      let id_lowongan = $(this).data('id_lowongan');
      let nama_jabatan = $(this).data('nama_jabatan');
      let nama_perusahaan = $(this).data('nama_perusahaan');
      let jenis_lowongan = $(this).data('jenis_lowongan');
      let jadwal_seleksi = $(this).data('jadwal_seleksi');

      $("#table-lowongan").html(`
        <tr><th>Posisi Jabatan</th><td>:</td><td>${nama_jabatan}</td></tr>
        <tr><th>Perusahaan</th><td>:</td><td>${nama_perusahaan}</td></tr>
        <tr><th>Jenis Lowongan</th><td>:</td><td>${jenis_lowongan}</td></tr>
        <tr><th>Jadwal Seleksi</th><td>:</td><td>${jadwal_seleksi}</td></tr>
      `);
      $("#formDownloadPelamar").attr('action', `<?= base_url('Administrator/Data_lowongan/preview_download_pelamar/') ?>${id_lowongan}`);
    });

    $("#formDownloadPelamar").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        method: "post",
        data: $(this).serialize(),
        dataType: "JSON",
        beforeSend: function() {
          $("#container-form").slideUp(300);
          $("#loading-data").show();
          $("#btnPreviewPelamar").hide();
        },
        success: function(response) {
          $('#loading-data').hide();
          $('#container-results-tabs').show();
          $('#btnKembaliSorting').show();

          const downloadBaseUrl = $("#formDownloadPelamar").attr('action').replace('preview_download_pelamar', 'download_pelamar');
          const filterData = $("#formDownloadPelamar").serialize();
          const downloadUrl = `${downloadBaseUrl}?${filterData}`;

          $("#btnDownloadPelamar").attr('href', downloadUrl).show();
          
          $('#city-tabs').empty();
          $('#city-tab-content').empty();
          
          if (Object.keys(response).length === 0) {
            $('#city-tab-content').html('<div class="alert alert-warning text-center">Tidak ada data pelamar yang ditemukan.</div>');
            $('#btnDownloadPelamar').hide();
            return;
          }

          let isFirstTab = true;
          for (const kota in response) {
            const pelamarData = response[kota];
            const safeKotaId = kota.replace(/[^A-Z0-9]/ig, "_");

            $('#city-tabs').append(`<li class="nav-item"><a class="nav-link ${isFirstTab ? 'active' : ''}" data-toggle="tab" href="#content-${safeKotaId}">${kota} <span class="badge badge-info">${pelamarData.length}</span></a></li>`);
            
            let tableRows = '';
            pelamarData.forEach((pelamar, index) => {
              const dataDiri = pelamar.data_diri;
              let pendidikanList = pelamar.data_pendidikan.map(p => `- ${p.jenjang_pendidikan} - ${p.nama_institusi} (${p.jurusan})`).join('<br>');
              let pengalamanList = pelamar.data_pengalaman_kerja.map(p => `- ${p.jabatan_akhir} - ${p.nama_perusahaan}`).join('<br>');
              let pelatihanList = pelamar.data_pendidikan_nonformal.map(p => `- ${p.nama_pendidikan_nonformal}`).join('<br>');

              tableRows += `
                <tr>
                  <td>${index + 1}</td>
                  <td>${dataDiri.nama_pelamar}</td>
                  <td>${dataDiri.tempat_lahir}, ${dataDiri.tanggal_lahir}</td>
                  <td>${pelamar.umur}</td>
                  <td>${dataDiri.jenis_kelamin}</td>
                  <td>${dataDiri.agama}</td>
                  <td>${dataDiri.alamat}</td>
                  <td>${pelamar.domisili_provinsi || ''}</td>
                  <td>${pelamar.domisili_kota || ''}</td>
                  <td>${pelamar.domisili_kecamatan || ''}</td>
                  <td>${pelamar.domisili_kelurahan || ''}</td>
                  <td>${dataDiri.no_hp}</td>
                  <td>${dataDiri.facebook}</td>
                  <td>${dataDiri.instagram}</td>
                  <td>${dataDiri.twitter}</td>
                  <td>${dataDiri.linkedin}</td>
                  <td>${dataDiri.email}</td>
                  <td>${pelamar.gaji_diinginkan}</td>
                  <td>${pendidikanList}</td>
                  <td>${pengalamanList}</td>
                  <td>${pelatihanList}</td>
                  <td>${pelamar.keterangan_berkas}</td>
                </tr>`;
            });

            $('#city-tab-content').append(`
              <div class="tab-pane fade ${isFirstTab ? 'show active' : ''}" id="content-${safeKotaId}">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Usia</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Domisili</th>
                        <th>Domisili Provinsi</th>
                        <th>Domisili Kota</th>
                        <th>Domisili Kecamatan</th>
                        <th>Domisili Kelurahan</th>
                        <th>No HP</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Twitter</th>
                        <th>LinkedIn</th>
                        <th>Email</th>
                        <th>Gaji</th>
                        <th>Pendidikan</th>
                        <th>Pengalaman</th>
                        <th>Pelatihan</th>
                        <th>Berkas</th>
                      </tr>
                    </thead>
                    <tbody>${tableRows}</tbody>
                  </table>
                </div>
              </div>`);
            isFirstTab = false;
          }
        },
        error: function() {
          $('#loading-data').hide();
          $("#container-form").slideDown(300);
          $("#btnPreviewPelamar").show();
          alert("Terjadi kesalahan saat memuat data. Silakan coba lagi.");
        }
      });
    });

    $("#btnKembaliSorting").click(function() {
      $("#container-results-tabs").slideUp(300);
      $("#loading-data").hide();
      $("#container-form").slideDown(300);
      $(this).hide();
      $("#btnDownloadPelamar").hide();
      $("#btnPreviewPelamar").show();
    });
  });
</script>
</body>
</html>