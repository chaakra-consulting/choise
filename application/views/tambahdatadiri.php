<?php $this->load->view('layout3/header') ?>
<?php $this->load->view('layout3/navbar') ?>
<?php $this->load->view('layout3/sidebar') ?>

<?php $id_pelamar = $this->session->userdata('ses_id'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><em class="fa fa-user color-amber"></em></a></li>
            <li class="active">Profil Saya</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil Saya</h1>
        </div>
    </div>
    <div class="col-sm-12" style="background-color: #fff; padding-top: 10px; padding-bottom: 20px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px; border-radius: 5px">
        <div class="col-sm-12">
            <h4 style="margin-bottom: 2%;"><b>Isi Data Diri</b></h4>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <p><strong>Peringatan!</strong> Silakan perbaiki kesalahan berikut:</p>
                    <ul><?php echo validation_errors('<li>', '</li>'); ?></ul>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('pesan_error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('pesan_error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('Pelamar/Pelamar/tambahdatadiri/') ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label for="nama_pelamar">Nama Lengkap</label>
                        <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
                        <input type="text" class="form-control" name="nama_pelamar" value="<?php echo set_value('nama_pelamar'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" name="nik" required="required" value="<?php echo set_value('nik'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" required="required" value="<?php echo set_value('tempat_lahir'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="text" id="datepicker" class="form-control" autocomplete="off" name="tgl_lahir" required="required" value="<?php echo set_value('tgl_lahir'); ?>">
                    </div>
                    <div class="form-check form-check-inline col-sm-12 form-check">
                        <div class="col-12"><label for="gender">Jenis Kelamin</label></div>
                        <input class="form-check-input" type="radio" name="gender" value="L" <?php echo set_radio('gender', 'L'); ?>> Laki-Laki
                        <input class="form-check-input" type="radio" name="gender" value="P" <?php echo set_radio('gender', 'P'); ?>> Perempuan
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="agama">Agama</label>
                        <select name="agama" class="form-control form-control-lg" required="required">
                            <option value="">--== Pilih Agama ==--</option>
                            <option value="Islam" <?php echo set_select('agama', 'Islam'); ?>>Islam</option>
                            <option value="Hindu" <?php echo set_select('agama', 'Hindu'); ?>>Hindu</option>
                            <option value="Budha" <?php echo set_select('agama', 'Budha'); ?>>Budha</option>
                            <option value="Kristen Protestan" <?php echo set_select('agama', 'Kristen Protestan'); ?>>Kristen Protestan</option>
                            <option value="Katolik" <?php echo set_select('agama', 'Katolik'); ?>>Katolik</option>
                            <option value="Kong Hu Cu" <?php echo set_select('agama', 'Kong Hu Cu'); ?>>Kong Hu Cu</option>
                            <option value="Lainnya" <?php echo set_select('agama', 'Lainnya'); ?>>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12">
                        <label>Alamat sesuai KTP</label>
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <input required="required" type="text" class="form-control" name="ktp_jalan" placeholder="Nama Jalan, Gedung, No. Rumah" value="<?php echo set_value('ktp_jalan'); ?>">
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="ktp_provinsi_id" id="ktp_provinsi" class="form-control">
                                    <option value="">-- Pilih Provinsi --</option>
                                    <?php foreach ($provinsi as $prov) : ?>
                                        <option value="<?php echo $prov->id ?>" <?php echo set_select('ktp_provinsi_id', $prov->id); ?>><?php echo $prov->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="ktp_kota_id" id="ktp_kota" class="form-control">
                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="ktp_kecamatan_id" class="form-control" id="ktp_kecamatan">
                                    <option value="">-- Pilih Kecamatan --</option>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="ktp_kelurahan_id" id="ktp_kelurahan" class="form-control">
                                    <option value="">-- Pilih Kelurahan/Desa --</option>
                                </select>
                            </div>
                            <input type="hidden" name="ktp_provinsi_nama" id="ktp_provinsi_nama" value="<?php echo set_value('ktp_provinsi_nama'); ?>">
                            <input type="hidden" name="ktp_kota_nama" id="ktp_kota_nama" value="<?php echo set_value('ktp_kota_nama'); ?>">
                            <input type="hidden" name="ktp_kecamatan_nama" id="ktp_kecamatan_nama" value="<?php echo set_value('ktp_kecamatan_nama'); ?>">
                            <input type="hidden" name="ktp_kelurahan_nama" id="ktp_kelurahan_nama" value="<?php echo set_value('ktp_kelurahan_nama'); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label>Alamat Domisili</label>
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 10px;">
                                <input required="required" type="text" class="form-control" name="domisili_jalan" placeholder="Nama Jalan, Gedung, No. Rumah" value="<?php echo set_value('domisili_jalan'); ?>">
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" class="form-control" name="domisili_provinsi_id" id="domisili_provinsi">
                                    <option value="">-- Pilih Provinsi --</option>
                                    <?php foreach ($provinsi as $prov) : ?>
                                        <option value="<?php echo $prov->id; ?>" <?php echo set_select('domisili_provinsi_id', $prov->id); ?>><?php echo $prov->nama; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="domisili_kota_id" id="domisili_kota" class="form-control">
                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="domisili_kecamatan_id" id="domisili_kecamatan" class="form-control">
                                    <option value="">-- Pilih Kecamatan --</option>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                <select required="required" name="domisili_kelurahan_id" id="domisili_kelurahan" class="form-control">
                                    <option value="">-- Pilih Kelurahan/Desa --</option>
                                </select>
                            </div>
                            <input type="hidden" name="domisili_provinsi_nama" id="domisili_provinsi_nama" value="<?php echo set_value('domisili_provinsi_nama'); ?>">
                            <input type="hidden" name="domisili_kota_nama" id="domisili_kota_nama" value="<?php echo set_value('domisili_kota_nama'); ?>">
                            <input type="hidden" name="domisili_kecamatan_nama" id="domisili_kecamatan_nama" value="<?php echo set_value('domisili_kecamatan_nama'); ?>">
                            <input type="hidden" name="domisili_kelurahan_nama" id="domisili_kelurahan_nama" value="<?php echo set_value('domisili_kelurahan_nama'); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-12">
                        <label for="status_perkawinan">Status Perkawinan</label>
                        <select name="status_perkawinan" class="form-control form-control-lg" required="required">
                            <option value="">--== Pilih Status Perkawinan ==--</option>
                            <option value="Belum Menikah" <?php echo set_select('status_perkawinan', 'Belum Menikah'); ?>>Belum Menikah</option>
                            <option value="Sudah Menikah" <?php echo set_select('status_perkawinan', 'Sudah Menikah'); ?>>Sudah Menikah</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="anak_ke">Anak ke</label>
                        <input type="number" class="form-control" name="anak_ke" required="required" value="<?php echo set_value('anak_ke'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="dari_x_sdr">Dari berapa bersaudara</label>
                        <input type="number" class="form-control" name="dari_x_sdr" required="required" value="<?php echo set_value('dari_x_sdr'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="no_hp">Nomor WA Aktif</label>
                        <input type="number" class="form-control" name="no_hp" required="required" value="<?php echo set_value('no_hp'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="facebook">Akun Facebook (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>
                        <input type="text" class="form-control" name="facebook" required="required" value="<?php echo set_value('facebook', '-'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="instagram">Akun Instagram (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>
                        <input type="text" class="form-control" name="instagram" required="required" value="<?php echo set_value('instagram', '-'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="twitter">Akun Twitter (Url / Link) <small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>
                        <input type="text" class="form-control" name="twitter" required="required" value="<?php echo set_value('twitter', '-'); ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="linkedin">Akun LinkedIn (Url / Link)<small style="color:red">*isi dengan "-" (TANPA PETIK) jika tidak punya</small></label>
                        <input type="text" class="form-control" name="linkedin" required="required" value="<?php echo set_value('linkedin', '-'); ?>">
                    </div>
                </div>
                <div class="col-sm-12">
                    <input type="submit" value="Simpan" class="btn btn-blue">
                    <a href="<?php echo base_url('Pelamar/Pelamar/profilawal') ?>" class="btn btn-danger mr-2 mb-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function loadInitialAddress(prefix) {
            var provinsi_id = $('#' + prefix + '_provinsi').val();
            var kota_id_lama = "<?php echo set_value('"+prefix+"_kota_id'); ?>";
            var kecamatan_id_lama = "<?php echo set_value('"+prefix+"_kecamatan_id'); ?>";
            var kelurahan_id_lama = "<?php echo set_value('"+prefix+"_kelurahan_id'); ?>";

            if (provinsi_id) {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kota'); ?>",
                    method: "POST", data: { provinsi_id: provinsi_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kabupaten/Kota --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#' + prefix + '_kota').html(options).val(kota_id_lama);
                        
                        if ($('#' + prefix + '_kota').val()) {
                            $.ajax({
                                url: "<?php echo base_url('Pelamar/Pelamar/get_kecamatan'); ?>",
                                method: "POST", data: { kota_id: kota_id_lama },
                                success: function(data_kec) {
                                    var options_kec = '<option value="">-- Pilih Kecamatan --</option>';
                                    $.each(data_kec, function(key, value) {
                                        options_kec += '<option value="' + value.id + '">' + value.nama + '</option>';
                                    });
                                    $('#' + prefix + '_kecamatan').html(options_kec).val(kecamatan_id_lama);

                                    if ($('#' + prefix + '_kecamatan').val()) {
                                        $.ajax({
                                            url: "<?php echo base_url('Pelamar/Pelamar/get_kelurahan'); ?>",
                                            method: "POST", data: { kecamatan_id: kecamatan_id_lama },
                                            success: function(data_kel) {
                                                var options_kel = '<option value="">-- Pilih Kelurahan/Desa --</option>';
                                                $.each(data_kel, function(key, value) {
                                                    options_kel += '<option value="' + value.id + '">' + value.nama + '</option>';
                                                });
                                                $('#' + prefix + '_kelurahan').html(options_kel).val(kelurahan_id_lama);
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    }
                });
            }
        }

        loadInitialAddress('ktp');
        loadInitialAddress('domisili');

        $('#ktp_provinsi').change(function() {
            var provinsi_id = $(this).val();
            var provinsi_nama = $(this).find('option:selected').text();
            $('#ktp_provinsi_nama').val(provinsi_nama); 

            if (provinsi_id != '') {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kota'); ?>",
                    method: "POST", data: { provinsi_id: provinsi_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kabupaten/Kota --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#ktp_kota').html(options);
                        $('#ktp_kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                        $('#ktp_kelurahan').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
                    }
                });
            }
        });

        $('#ktp_kota').change(function() {
            var kota_id = $(this).val();
            var kota_nama = $(this).find('option:selected').text();
            $('#ktp_kota_nama').val(kota_nama);

            if (kota_id != '') {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kecamatan'); ?>",
                    method: "POST", data: { kota_id: kota_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kecamatan --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#ktp_kecamatan').html(options);
                        $('#ktp_kelurahan').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
                    }
                });
            }
        });

        $('#ktp_kecamatan').change(function() {
            var kecamatan_id = $(this).val();
            var kecamatan_nama = $(this).find('option:selected').text();
            $('#ktp_kecamatan_nama').val(kecamatan_nama);

            if (kecamatan_id != '') {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kelurahan'); ?>",
                    method: "POST", data: { kecamatan_id: kecamatan_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kelurahan/Desa --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#ktp_kelurahan').html(options);
                    }
                });
            }
        });

        $('#ktp_kelurahan').change(function() {
            var kelurahan_nama = $(this).find('option:selected').text();
            $('#ktp_kelurahan_nama').val(kelurahan_nama);
        });

        $('#domisili_provinsi').change(function() {
            var provinsi_id = $(this).val();
            var provinsi_nama = $(this).find('option:selected').text();
            $('#domisili_provinsi_nama').val(provinsi_nama);
            if (provinsi_id != '') {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kota'); ?>",
                    method: "POST", data: { provinsi_id: provinsi_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kabupaten/Kota --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#domisili_kota').html(options);
                        $('#domisili_kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                        $('#domisili_kelurahan').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
                    }
                });
            }
        });
        $('#domisili_kota').change(function() {
            var kota_id = $(this).val();
            var kota_nama = $(this).find('option:selected').text();
            $('#domisili_kota_nama').val(kota_nama);
            if (kota_id != '') {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kecamatan'); ?>",
                    method: "POST", data: { kota_id: kota_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kecamatan --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#domisili_kecamatan').html(options);
                        $('#domisili_kelurahan').html('<option value="">-- Pilih Kelurahan/Desa --</option>');
                    }
                });
            }
        });
        $('#domisili_kecamatan').change(function() {
            var kecamatan_id = $(this).val();
            var kecamatan_nama = $(this).find('option:selected').text();
            $('#domisili_kecamatan_nama').val(kecamatan_nama);
            if (kecamatan_id != '') {
                $.ajax({
                    url: "<?php echo base_url('Pelamar/Pelamar/get_kelurahan'); ?>",
                    method: "POST", data: { kecamatan_id: kecamatan_id },
                    success: function(data) {
                        var options = '<option value="">-- Pilih Kelurahan/Desa --</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value.nama + '</option>';
                        });
                        $('#domisili_kelurahan').html(options);
                    }
                });
            }
        });
        $('#domisili_kelurahan').change(function() {
            var kelurahan_nama = $(this).find('option:selected').text();
            $('#domisili_kelurahan_nama').val(kelurahan_nama);
        });
    });
</script>

<?php $this->load->view('layout3/footer') ?>