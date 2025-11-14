<?php $this->load->view('layout2/header') ?>
<style>
    .select2-container .select2-selection--single {
        height: calc(1.5em + .75rem + 2px) !important;
        border-radius: .25rem !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }
    #select2-tempat_lahir-container {
      border-radius: 10px !important;
    }
</style>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card shadow-sm">
              <div class="card-header bg-warning text-white">
                <h4 class="mb-0">Formulir Pendaftaran Talent Test</h4>
              </div>
              <div class="card-body p-4">
                <p class="mb-4">
                  Anda Mendaftar untuk paket: <br>
                  <strong class="h5"><?php echo htmlspecialchars($paket['nama_paket']); ?></strong>
                </p>
                <?php if (validation_errors()) :  ?>
                  <div class="alert alert-danger" role="alert">
                    <strong>Mohon perbaiki kesalahan pada kolom yang ditandai.</strong>
                  </div>
                <?php endif; ?>

                <?php echo form_open('home/talent_test_proses'); ?>
                <input type="hidden" name="id_paket" value="<?php echo $paket['id_paket']; ?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('nama_lengkap') ?>" placeholder="Masukkan nama lengkap Anda" required>
                      <div class="invalid-feedback"><?php echo form_error('nama_lengkap'); ?></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="no_hp">No. HP/ WhatsApp</label>
                      <input type="tel" name="no_hp" id="no_hp" class="form-control <?php echo form_error('no_hp') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('no_hp'); ?>" placeholder="Contoh: 081234567890" required>
                      <div class="invalid-feedback"><?php echo form_error('no_hp'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input type="email" name="email" id="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('email'); ?>" placeholder="Email aktif Anda" required>
                  <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <select name="tempat_lahir" id="tempat_lahir" class="form-control select2 <?php echo form_error('tempat_lahir') 
                        ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Kota" required>
                        <option value=""></option>
                        <?php foreach ($kota as $k) : ?>
                          <option value="<?php echo $k['nama']; ?>" <?php echo set_value('tempat_lahir', $k['nama']) ?>><?php echo $k['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?php echo form_error('tempat_lahir'); ?></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <?php $max_year = date('Y') - 14; $max_date = $max_year . '-12-31'; ?>
                      <input type="date" name="tanggal_lahir" class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : ''; ?>" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" max="<?php echo $max_date;?>" required aria-describedby="tanggalLahirHelp">
                      <div class="invalid-feedback"><?php echo form_error('tanggal_lahir'); ?></div>
                      <small id="tanggalLahirHelp" class="form-text text-muted">Usia minimum pendaftar adalah 14 tahun.</small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="L" class="custom-control-input" <?php echo set_radio('jenis_kelamin','L', TRUE) ?> required>
                          <label for="jenis_kelamin_l" class="custom-control-label">Laki - laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="P" class="custom-control-input" <?php echo set_radio('jenis_kelamin', 'P') ?>>
                          <label for="jenis_kelamin_p" class="custom-control-label">Perempuan</label>
                        </div>
                      </div>
                      <div class="invalid-feedback d-block"><?php echo form_error('jenis_kelamin') ?></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="kepentingan">Kepentingan Mengikuti Test</label>
                      <select name="kepentingan" id="kepentingan" class="form-control select2 <?php echo form_error('kepentingan') ? 'is-invalid' : ''; ?>" required>
                        <option value="">Pilih Kepentingan</option>
                        <?php foreach ($kepentingan_options as $option) : ?>
                          <option value="<?php echo $option['option_text']; ?>" <?php echo set_select('kepentingan', $option['option_text']); ?>>
                            <?php echo $option['option_text']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?php echo form_error('kepentingan'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="jadwal_tanggal">Tanggal Test</label>
                      <input type="date" name="jadwal_tanggal" id="jadwal_tanggal" class="form-control <?php echo form_error('jadwal_tanggal') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('jadwal_tanggal'); ?>" required>
                      <div class="invalid-feedback"><?php echo form_error('jadwal_tanggal'); ?></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="jadwal_waktu">Waktu Test</label>
                      <input type="time" name="jadwal_waktu" id="jadwal_waktu" class="form-control <?php echo form_error('jadwal_waktu') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('jadwal_waktu'); ?>" required autocomplete="off">
                      <div class="invalid-feedback"><?php echo form_error('jadwal_waktu'); ?></div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">Lanjut ke Pembayaran</button>
                <?php echo form_close(); ?>
                <a href="<?php echo site_url('home/#pelatihan-section'); ?>" class="btn btn-secondary btn-lg btn-block">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('layout2/footer'); ?>
