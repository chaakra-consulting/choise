<style>
  .modal-content {
    border-radius: 8px;
    background: #fff;
    border: 1px solid #e1e5e9;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  }
  .modal-header {
    background-color: #FBC02D;
    border-bottom: 1px solid #bdc3c7;
    border-radius: 6px 6px 0 0;
  }
  .modal-header h5 {
    font-weight: 500;
    color: #fff;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 20px;
  }
  .form-control {
    border-radius: 6px;
    border: 1px solid #bdc3c7;
    padding: 10px 12px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transition: border-color 0.3s ease;
  }
  .form-control:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
    outline: none;
  }
  .btn-primary {
    border-radius: 6px;
    background-color: #3498db;
    border: none;
    color: #fff;
    padding: 10px 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }
  .btn-primary:hover {
    background-color: #2980b9;
  }
  .form-label {
    color: #34495e;
    font-weight: 500;
    margin-bottom: 5px;
  }
  .mb-3 {
    margin-bottom: 1rem !important;
  }
</style>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Masukkan Detail Anda</h5>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('quiz/submit_form') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="08123456789" required>
                    </div>
                    <div class="mb-3">
                        <label for="ig" class="form-label">Instagram</label>
                        <input type="text" name="ig" id="ig" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <div class="form-group">
                        <label for="kota">Tempat Lahir</label>
                        <select name="kota" id="kota" class="form-control select2 <?php echo form_error('kota') 
                          ? 'is-invalid' : ''; ?>" data-placeholder="Pilih Kota" required>
                          <option value=""></option>
                          <?php foreach ($kota as $k) : ?>
                            <option value="<?php echo $k['nama']; ?>" <?php echo set_value('kota', $k['nama']) ?>><?php echo $k['nama']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?php echo form_error('kota'); ?></div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lihat Hasil</button>
                </form>
            </div>
        </div>
    </div>
</div>