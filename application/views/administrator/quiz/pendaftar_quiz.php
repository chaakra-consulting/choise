<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Data Pendaftar Quiz</h1>
            <p>Data Pendaftar quiz holland</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Quiz</li>
            <li class="breadcrumb-item"><a href="#">Pendaftar Quiz</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>N0. </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Instagram</th>
                                    <th>Kota/ Kabupaten</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($quiz_results as $result): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $result->nama ?? '-'; ?></td>
                                        <td><?php echo $result->email ?? '-'; ?></td>
                                        <td><?php echo $result->no_hp ?? '-'; ?></td>
                                        <td><?php echo $result->ig ?? '-'; ?></td>
                                        <td><?php echo $result->kota ?? '-'; ?></td>
                                        <td><?php echo $result->created_at ?? '-'; ?></td>
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

<?php $this->load->view('layout/footer'); ?>