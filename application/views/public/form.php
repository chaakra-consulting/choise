<style>
  .modal-content {
    border-radius: 12px;
  }
  .modal-header h5 {
    font-weight: 600;
    color: #333;
  }
  .form-control {
    border-radius: 8px;
    border: 1px solid #ccc;
  }
  .form-control:focus {
    border-color: #000;
    box-shadow: none;
  }
  .btn-dark {
    border-radius: 8px;
    background-color: #333;
    border: none;
  }
  .btn-dark:hover {
    background-color: #000;
  }
</style>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Masukkan Detail Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('public/submit_form') ?>" method="post">
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
                    <button type="submit" class="btn btn-primary">Lihat Hasil</button>
                </form>
            </div>
        </div>
    </div>
</div>