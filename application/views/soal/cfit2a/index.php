<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Bank Soal CFIT 2a</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item"><a href="#">Bank Soal CFIT 2a</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div id="notifikasi">
                    <?php if ($this->session->flashdata('msg')): ?>
                        <div class="alert alert-primary">
                            <?php echo $this->session->flashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('msg_update')): ?>
                        <div class="alert alert-primary">
                            <?php echo $this->session->flashdata('msg_update') ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('msg_hapus')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('msg_hapus') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="data">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Soal</th>
                                    <th>Subtes Ke-</th>
                                    <th>Opsi A</th>
                                    <th>Opsi B</th>
                                    <th>Opsi C</th>
                                    <th>Opsi D</th>
                                    <th>Opsi E</th>
                                    
                                    <th>Jawaban</th>
                                    <th>Type Soal</th>
                                    <th>Aksi</th>
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
            "order": [],
            "ajax": {
                "url": "<?php echo base_url('Soal/Soal_cfit2a/data') ?>",
                dataSrc:"",
                type: "GET",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Content-Type", "application/json");
                },
            },
            columns: [
                {
                    data: 'id_soal',
                    name: 'id_soal'
                },
                {
                    data: 'soal',
                    name: 'soal',
                    render: (data, type, row) => {
                        var url = data != '' ? `<?php echo base_url('/assets3/images/CFIT 2a/Tes :sub_tes/Soal :nomor_soal/') ?>${data}` : `<?php echo base_url('/upload/bank_soal/img_default.png') ?>`;
                        return `<img width="100" src="${url.replace(':sub_tes', row.subtes).replace(':nomor_soal', row.nomor_soal)}">`;
                    }
                },
                {
                    data: 'subtes',
                    name: 'subtes'
                },
                {
                    data: 'opsi_a',
                    name: 'opsi_a',
                    render: (data, type, row) => {
                        var url = data != '' ? `<?php echo base_url('/assets3/images/CFIT 2a/Tes :sub_tes/Soal :nomor_soal/') ?>${data}` : `<?php echo base_url('/upload/bank_soal/img_default.png') ?>`;
                        return `<img width="100" src="${url.replace(':sub_tes', row.subtes).replace(':nomor_soal', row.nomor_soal)}">`;
                    }
                },
                {
                    data: 'opsi_b',
                    name: 'opsi_b',
                    render: (data, type, row) => {
                        var url = data != '' ? `<?php echo base_url('/assets3/images/CFIT 2a/Tes :sub_tes/Soal :nomor_soal/') ?>${data}` : `<?php echo base_url('/upload/bank_soal/img_default.png') ?>`;
                        return `<img width="100" src="${url.replace(':sub_tes', row.subtes).replace(':nomor_soal', row.nomor_soal)}">`;
                    }
                },
                {
                    data: 'opsi_c',
                    name: 'opsi_c',
                    render: (data, type, row) => {
                        var url = data != '' ? `<?php echo base_url('/assets3/images/CFIT 2a/Tes :sub_tes/Soal :nomor_soal/') ?>${data}` : `<?php echo base_url('/upload/bank_soal/img_default.png') ?>`;
                        return `<img width="100" src="${url.replace(':sub_tes', row.subtes).replace(':nomor_soal', row.nomor_soal)}">`;
                    }
                },
                {
                    data: 'opsi_d',
                    name: 'opsi_d',
                    render: (data, type, row) => {
                        var url = data != '' ? `<?php echo base_url('/assets3/images/CFIT 2a/Tes :sub_tes/Soal :nomor_soal/') ?>${data}` : `<?php echo base_url('/upload/bank_soal/img_default.png') ?>`;
                        return `<img width="100" src="${url.replace(':sub_tes', row.subtes).replace(':nomor_soal', row.nomor_soal)}">`;
                    }
                },
                {
                    data: 'opsi_e',
                    name: 'opsi_e',
                    render: (data, type, row) => {
                        var url = data != '' ? `<?php echo base_url('/assets3/images/CFIT 2a/Tes :sub_tes/Soal :nomor_soal/') ?>${data}` : `<?php echo base_url('/upload/bank_soal/img_default.png') ?>`;
                        return `<img width="100" src="${url.replace(':sub_tes', row.subtes).replace(':nomor_soal', row.nomor_soal)}">`;
                    }
                },
              
                {
                    data: 'jawaban',
                    name: 'jawaban'
                },
                {
                    data: 'type_soal',
                    name: 'type_soal'
                },
                {
                    data: null,
                    name: "aksi",
                    render: (data, type, row, meta) => {
                        var edit_url = "{{url_for('musik_edit_page',musik_id=':var')}}"
                        return `<div class="btn-group" role="group">
                    <a href="${edit_url.replace(':var', data.id)}" class="btn btn-warning ml-2"><i class="fa fa-edit" style="margin-right: -3px !important; color:white;"></i></a>
                  </div>`
                    }
                }
            ]
        });
    });
</script>