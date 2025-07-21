<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Tambah Data</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#">Ujian BELBIN</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ujian BELBIN</h3>
        <div class="tile-body">
          <form action="<?php echo base_url('Administrator/Data_ujian/tambahdata_belbin') ?>" method="post">

            <div class="form-group">
              <label class="control-label">Nama Ujian</label>
              <input class="form-control" name="nama_ujian" type="text" required>
            </div>

            <div class="form-group">
              <label class="control-label">Waktu Mulai</label>
              <input class="form-control time" name="waktu_dimulai" type="text" required>
            </div>

            <div class="form-group">
              <label class="control-label">Waktu Berakhir</label>
              <input class="form-control time" name="waktu_berakhir" type="text" required>
            </div>
            
            <br>
            <div class="card">
              <div class="card-header">
                Part 1
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 1</label>
                      <input class="form-control time" name="start_uji_sub1" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 1</label>
                    <input class="form-control time" name="end_uji_sub1" type="text" required>
                  </div>
                </div>
              </div>
            </div>
          
             <br>
            <div class="card">
              <div class="card-header">
                Part 2
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 2</label>
                      <input class="form-control time" name="start_uji_sub2" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 2</label>
                    <input class="form-control time" name="end_uji_sub2" type="text" required>
                  </div>
                </div>
              </div>
            </div>
          
            <br>
            <div class="card">
              <div class="card-header">
                Part 3
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 3</label>
                      <input class="form-control time" name="start_uji_sub3" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 3</label>
                    <input class="form-control time" name="end_uji_sub3" type="text" required>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="card">
              <div class="card-header">
                Part 4
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 4</label>
                      <input class="form-control time" name="start_uji_sub4" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 4</label>
                    <input class="form-control time" name="end_uji_sub4" type="text" required>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="card">
              <div class="card-header">
                Part 5
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 5</label>
                      <input class="form-control time" name="start_uji_sub5" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 5</label>
                    <input class="form-control time" name="end_uji_sub5" type="text" required>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="card">
              <div class="card-header">
                Part 6
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 6</label>
                      <input class="form-control time" name="start_uji_sub6" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 6</label>
                    <input class="form-control time" name="end_uji_sub6" type="text" required>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="card">
              <div class="card-header">
                Part 7
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="control-label">Waktu Mulai Ujian Part 7</label>
                      <input class="form-control time" name="start_uji_sub7" type="text" required>
                    </div>
                  </div>
                  <div class="col">
                    <label class="control-label">Waktu Berkahir Ujian Part 7</label>
                    <input class="form-control time" name="end_uji_sub7" type="text" required>
                  </div>
                </div>
              </div>
            </div>

            <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('ses_nama'); ?>">

            <input style="margin-top: 15px" type="submit" value="Kirim" class="btn btn-primary">
            <a style="margin-top: 15px" href="<?php echo base_url('Administrator/Data_ujian') ?>" class="btn btn-secondary"> Cancel</a>
          </form>
        </div>

      </div>
    </div>
  </div>
</main>


<?php $this->load->view('layout/footer') ?>