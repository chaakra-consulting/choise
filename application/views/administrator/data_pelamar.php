<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Pelamar Keseluruhan</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Data Pelamar Keseluruhan</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div id="notifikasi">
          <?php if ($this->session->flashdata('msg')) : ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('msg') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_update')) : ?>
            <div class="alert alert-primary">
              <?php echo $this->session->flashdata('msg_update') ?>
            </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('msg_hapus')) : ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('msg_hapus') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="data">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelamar</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>No Hp</th>
                  <th>E-mail</th>
                  <th>Facebook</th>
                  <th>Instagram</th>
                  <th>Twitter</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status Akun</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>
<script>
  $(document).ready(function() {
    $('#data').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?php echo base_url('Administrator/Welcome/pelamar_data') ?>",
        // dataSrc: "",
        type: "POST",
      },
      columns: [{
          data: "id_row",
          name: "id_row",
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
        },
        {
          data: "nama_pelamar",
          name: "nama_pelamar",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "alamat",
          name: "alamat",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "tempat_lahir",
          name: "tempat_lahir",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "tanggal_lahir",
          name: "tanggal_lahir",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "jenis_kelamin",
          name: "jenis_kelamin",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "no_hp",
          name: "no_hp",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "email",
          name: "email",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          },
        },
        {
          data: "facebook",
          name: "facebook",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          }
        },
        {
          data: "instagram",
          name: "instagram",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          }
        },
        {
          data: "twitter",
          name: "twitter",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          }
        },
        {
          data: "username",
          name: "username",
          render: function(data, type, row, meta) {
            return (data === null || data === "") ? "-" : data;
          }
        },
        {
          data: "password",
          name: "password",
          render: function(data, type, row, meta) {
            return "********";
          }
        },
        {
          data: "status",
          name: "status",
          render: function(data, type, row, meta) {
            return data;
          }
        },

        // {
        //   data: null,
        //   name: "aksi",
        //   render: (data, type, row, meta) => {
        //     var edit_url = "url"
        //     return `<div class="btn-group" role="group">
        //             <a href="${edit_url.replace(':var', data.id)}" class="btn btn-warning ml-2"><i class="fa fa-edit" style="margin-right: -3px !important; color:white;"></i></a>
        //           </div>`
        //   }
        // }
      ]
    });
  });
</script>