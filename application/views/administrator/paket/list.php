<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> <?php echo $title; ?></h1>
    </div>
    <div class="modal fade" id="modalTambah" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              Tambah Opsi Kepentingan
            </h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('Administrator/Paket/tambah_kepentingan') ?>" method="post">
              <div class="mb-3">
                <label for="option-text" class="form-label"><b>Teks Opsi</b></label>
                <input type="text" class="form-control" id="option_text" name="option_text" placeholder="Masukkan teks opsi kepentingan" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label"> STATUS : </label>
                <input type="checkbox" name="status" id="status" value="aktif" class="form-input" checked>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a href="<?php echo site_url('Administrator/Paket/tambah')?>" class="btn btn-primary">Tambah Paket Baru</a>
        <hr>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $nomor = 1;
                foreach ($paket_list as $paket): ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $paket['nama_paket']; ?></td>
                        <td>Rp. <?php echo number_format($paket['Harga'], 0, ',', '.'); ?></td>
                        <!-- <td><?php echo $paket['status']; ?></td> -->
                        <td>
                          <?php if ($paket['status'] == 'aktif') {
                            echo 'Aktif';
                          } else {
                            echo 'Tidak Aktif';
                          };
                           ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('Administrator/Paket/edit/' . $paket['id_paket']); ?>" 
                              class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo site_url('Administrator/Paket/ujian/' . $paket['id_paket']); ?>"
                              class="btn btn-sm btn-primary"><i class='fa fa-gear'></i></a>
                            <a href="<?php echo site_url('Administrator/Paket/kepentingan/' . $paket['id_paket']); ?>"
                              class="btn btn-sm btn-info"><i class="fa fa-list"></i> Kepentingan</a>
                            <a href="<?php echo site_url('Administrator/Paket/hapus/' . $paket['id_paket']); ?>" 
                              class="btn btn-sm btn-danger" 
                              onclick="return confirm('Yakin ingin menghapus?');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php 
                $nomor++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Opsi</button>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Opsi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; $modal = 0; foreach ($options as $option) : ?>
                  <div class="modal fade" id="ModalEdit<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Opsi Kepentingan</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('Administrator/Paket/edit_kepentingan') ?>" method="post">
                            <div class="mb-3">
                              <label for="option-text" class="form-label"><b>Teks Opsi</b></label>
                              <input type="text" class="form-control" id="option_text" name="option_text" value="<?php echo $option['option_text'] ?>" required>
                              <input type="hidden" name="id" value="<?php echo $option['id'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="" class="control-label">STATUS : </label>
                              <input type="checkbox" name="status" id="status" class="form-input" value="aktif" 
                              <?php if ($option['status'] == 'aktif') {
                                echo 'checked';
                              } ?>>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-warning">Edit</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="ModalHapus<?php echo $modal ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Opsi Kepentingan</h4>
                        </div>
                        <div class="modal-body">
                          <p>Apakah anda yakin akan menghapus opsi <b><?php echo $option['option_text'] ?> </b>?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url('Administrator/Paket/hapus_kepentingan/'. $option['id']) ?>" title="Hapus Data">
                            <button type="button" class="btn btn-danger">
                              Hapus <i class="fa fa-trash"></i>
                            </button>
                          </a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $option['option_text']; ?></td>
                    <td><?php echo $option['status']; ?></td>
                    <td>
                      <button data-toggle="modal" data-target="#ModalEdit<?php echo $modal?>" type="button" 
                        class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil"></i>
                      </button>
                      <button data-toggle="modal" data-target="#ModalHapus<?php echo $modal ?>" type="button" 
                        class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php $modal++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php $this->load->view('layout/footer'); ?>