<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Kelola Pertanyaan Holland</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Quiz</li>
            <li class="breadcrumb-item"><a href="#">Pertanyaan Holland</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <a href="<?php echo base_url('administrator/quiz/add')?>" class="btn btn-primary">Tambah Pertanyaan</a>
                <hr>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Tipe</th>
                                    <th>Dibuat</th>
                                    <th>Diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($questions as $question): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $question->question_text; ?></td>
                                    <td><?php echo strtoupper($question->type); ?></td>
                                    <td><?php echo $question->created_at; ?></td>
                                    <td><?php echo $question->updated_at; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('administrator/quiz/edit/' . $question->id); ?>" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo base_url('administrator/quiz/delete/' . $question->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->load->view('layout/footer') ?>
