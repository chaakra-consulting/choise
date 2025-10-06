<?php
header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename=pelamar_khusus_krian.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>

<!-- DIBAWAH INI ADALAH UNTUK REKRUTMEN RSUD KRIAN -->
<table border="1">
    <thead>
        <tr>
            <th colspan="15">BIODATA</th>
            <th colspan="3">PEMBOBOTAN</th>
            <th rowspan="2">TOTAL SCORE</th>
        </tr>
        <tr>
            <th width="35">No</th>
            <th width="238">Nama Perusahaan</th>
            <th width="238">Jabatan</th>
            <th width="238">Nomor Perserta</th>
            <th width="238">Nama</th>
            <th>TTL</th>
            <th>Usia</th>
            <!-- <th>Jenis Kelamin</th>
   <th>Agama</th> -->
            <th>Domisili</th>
            <th>Alamat Susuai KTP</th>
            <th>No Hp</th>
            <th>Email</th>
            <!-- <th>Gaji yang diinginkan</th> -->
            <th>Jenjang Pendidikan Terakhir</th>
            <th>Universitas/Jurusan/Prodi</th>
            <th>IPK</th>
            <th>Pengalaman Kerja Terakhir</th>
            <!-- <th>Jenis Pelatihan</th> -->
            <th>Score IPK</th>
            <th>Score Pengalaman</th>
            <th>Score Domisili</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($pelamar as $user) {
            foreach ($data_pelamar as $key_pelamar) {
                if ($user['id_pelamar'] == $key_pelamar['id_pelamar']) {
                    $nama = $key_pelamar['nama_pelamar'];
                    $jk = $key_pelamar['jenis_kelamin'];
                    $agama = $key_pelamar['agama'];
                    $alamat = $key_pelamar['alamat'];
                    $alamatktp = $key_pelamar['alamat_ktp'];
                    $no_hp = $key_pelamar['no_hp'];
                    $ttl = $key_pelamar['tempat_lahir'] . "," . $key_pelamar['tanggal_lahir'];
                    $tgl = strtotime($key_pelamar['tanggal_lahir']);
                    $current_time = time();
                    $age_years = date('Y', $current_time) - date('Y', $tgl);
                    $age_months = date('m', $current_time) - date('m', $tgl);
                    $age_days = date('d', $current_time) - date('d', $tgl);
                    if ($age_days < 0) {
                        $days_in_month = date('t', $current_time);
                        $age_months--;
                        $age_days = $days_in_month + $age_days;
                    }

                    if ($age_months < 0) {
                        $age_years--;
                        $age_months = 12 + $age_months;
                    }
                }
            }
            $data_pendidikan2 = $this->db->query("SELECT * FROM tb_data_pendidikan WHERE id_pelamar=" . $user['id_pelamar'] . " ORDER BY tahun_keluar DESC LIMIT 1")->result_array();
            foreach ($data_pendidikan2 as $key_pendidikan) {
                $pendAkhir = $key_pendidikan['jenjang_pendidikan'];
                $nmInst = $key_pendidikan['nama_institusi'];
                $jurusan = $key_pendidikan['jurusan'];
                $ipk = $key_pendidikan['nilai_akhir'];
            }

            foreach ($data_pengalaman as $key_pengalaman) {
                if ($user['id_pelamar'] == $key_pengalaman['id_pelamar']) {
                    $jabatan = $key_pengalaman['jabatan_akhir'];
                    $perusahaan = $key_pengalaman['nama_perusahaan'];
                }
            }

            foreach ($data_pelatihan as $key_pendidikan_non) {
                if ($user['id_pelamar'] == $key_pendidikan_non['id_pelamar']) {
                    $pelatihan = $key_pendidikan_non['nama_pendidikan_nonformal'];
                }
            }

            foreach ($data_motivasi as $key_motivasi) {
                if ($user['id_pelamar'] == $key_motivasi['id_pelamar']) {
                    $gaji = $key_motivasi['gaji'];
                }
            }

            $email = $this->db->query("SELECT * FROM tb_pelamar");
            foreach ($email->result() as $key_email) {
                if ($user['id_pelamar'] == $key_email->id_pelamar) {
                    $emailfix = $key_email->email;
                }
            }

            $motiv = $this->db->query("SELECT * FROM tb_motivation_letter");
            foreach ($motiv->result() as $motiv_a) {
                if ($user['id_pelamar'] == $motiv_a->id_pelamar) {
                    $konfirm_berkas = $motiv_a->gaji;
                }
            }

            $tb_perus = $this->db->query("SELECT * FROM tb_perusahaan");
            foreach ($tb_perus->result() as $perus) {
                if ($user['id_perusahaan'] == $perus->id_perusahaan) {
                    $nama_perus = $perus->nama_perusahaan;
                }
            }

            $tb_low = $this->db->query("SELECT * FROM tb_lowongan");
            foreach ($tb_low->result() as $lowo) {
                if ($user['id_lowongan'] == $lowo->id_lowongan) {
                    $nama_lowo = $lowo->nama_jabatan;
                }
            }
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $nama_perus; ?></td>
                <td><?php if ($nama_lowo == 'Dokter Spesialis Anak') {
                        $n_lowo = 'A1';
                        echo 'A1';
                    } elseif ($nama_lowo == 'Dokter Spesialis Obstetri dan Gynecologi') {
                        $n_lowo = 'A2';
                        echo 'A2';
                    } elseif ($nama_lowo == 'Dokter Spesialis Bedah Umum') {
                        $n_lowo = 'A3';
                        echo 'A3';
                    } elseif ($nama_lowo == 'Dokter Spesialis Penyakit Dalam') {
                        $n_lowo = 'A4';
                        echo 'A4';
                    } elseif ($nama_lowo == 'Dokter Spesialis Anestesi') {
                        $n_lowo = 'A5';
                        echo 'A5';
                    } elseif ($nama_lowo == 'Dokter Spesialis Radiologi') {
                        $n_lowo = 'A6';
                        echo 'A6';
                    } elseif ($nama_lowo == 'Dokter Spesialis Patologi Klinik') {
                        $n_lowo = 'A7';
                        echo 'A7';
                    } elseif ($nama_lowo == 'Dokter Spesialis Ortopedi dan Traumatologi') {
                        $n_lowo = 'A8';
                        echo 'A8';
                    } elseif ($nama_lowo == 'Dokter Spesialis Forensik dan Medikolegal') {
                        $n_lowo = 'A9';
                        echo 'A9';
                    } elseif ($nama_lowo == 'Dokter Spesialis Jantung') {
                        $n_lowo = 'A10';
                        echo 'A10';
                    } elseif ($nama_lowo == 'Dokter Spesialis Kedokteran Fisik dan Rehabilitasi') {
                        $n_lowo = 'A11';
                        echo 'A11';
                    } elseif ($nama_lowo == 'Dokter Gigi Spesialis Prosto') {
                        $n_lowo = 'A12';
                        echo 'A12';
                    } elseif ($nama_lowo == 'Dokter Umum Ahli Pertama') {
                        $n_lowo = 'A13';
                        echo 'A13';
                    } elseif ($nama_lowo == 'Dokter Gigi Ahli Pertama') {
                        $n_lowo = 'A14';
                        echo 'A14';
                    } elseif ($nama_lowo == 'Apoteker') {
                        $n_lowo = 'A15';
                        echo 'A15';
                    } elseif ($nama_lowo == 'Perawat Ahli (PNS)') {
                        $n_lowo = 'A16';
                        echo 'A16';
                    } elseif ($nama_lowo == 'Perawat Terampil') {
                        $n_lowo = 'A17';
                        echo 'A17';
                    } elseif ($nama_lowo == 'Perawat Terampil (Instrumen)') {
                        $n_lowo = 'A18';
                        echo 'A18';
                    } elseif ($nama_lowo == 'Perawat Terampil (Sirkuler)') {
                        $n_lowo = 'A19';
                        echo 'A19';
                    } elseif ($nama_lowo == 'Penata Anestesi') {
                        $n_lowo = 'A20';
                        echo 'A20';
                    } elseif ($nama_lowo == 'Bidan Ahli') {
                        $n_lowo = 'A21';
                        echo 'A21';
                    } elseif ($nama_lowo == 'Bidan Terampil') {
                        $n_lowo = 'A22';

                        echo 'A22';
                    } elseif ($nama_lowo == 'Asisten Apoteker') {
                        $n_lowo = 'A23';

                        echo 'A23';
                    } elseif ($nama_lowo == 'Pranata Lab') {
                        $n_lowo = 'A24';

                        echo 'A24';
                    } elseif ($nama_lowo == 'Radiografer') {
                        $n_lowo = 'A25';

                        echo 'A25';
                    } elseif ($nama_lowo == 'Nutrisionis Ahli') {
                        $n_lowo = 'A26';

                        echo 'A26';
                    } elseif ($nama_lowo == 'Nutrisionis Pelaksana') {
                        $n_lowo = 'A27';

                        echo 'A27';
                    } elseif ($nama_lowo == 'Perekam Medis Pelaksana') {
                        $n_lowo = 'A28';

                        echo 'A28';
                    } elseif ($nama_lowo == 'Terapis Gigi dan Mulut Terampil') {
                        $n_lowo = 'A29';

                        echo 'A29';
                    } elseif ($nama_lowo == 'Elektromedis Pelaksana') {
                        $n_lowo = 'A30';

                        echo 'A30';
                    } elseif ($nama_lowo == 'Sanitarian Pelaksana') {
                        $n_lowo = 'A31';

                        echo 'A31';
                    } elseif ($nama_lowo == 'Fisioterapi Terampil') {
                        $n_lowo = 'A32';

                        echo 'A32';
                    } elseif ($nama_lowo == 'Administrator Kesehatan Ahli Pertama') {
                        $n_lowo = 'A33';

                        echo 'A33';
                    } elseif ($nama_lowo == 'Analis Anggaran') {
                        $n_lowo = 'A34';

                        echo 'A34';
                    } elseif ($nama_lowo == 'Analis Kebijakan Kesehatan') {
                        $n_lowo = 'A35';

                        echo 'A35';
                    } elseif ($nama_lowo == 'Analis Kepegawaian') {
                        $n_lowo = 'A36';

                        echo 'A36';
                    } elseif ($nama_lowo == 'Analis Keuangan') {
                        $n_lowo = 'A37';

                        echo 'A37';
                    } elseif ($nama_lowo == 'Analis Pembiayaan') {
                        $n_lowo = 'A38';

                        echo 'A38';
                    } elseif ($nama_lowo == 'Auditor (SPI)') {
                        $n_lowo = 'A39';

                        echo 'A39';
                    } elseif ($nama_lowo == 'Bendahara Penerimaan') {
                        $n_lowo = 'A40';

                        echo 'A40';
                    } elseif ($nama_lowo == 'Bendahara Pengeluaran') {
                        $n_lowo = 'A41';

                        echo 'A41';
                    } elseif ($nama_lowo == 'Epidemiolog') {
                        $n_lowo = 'A42';

                        echo 'A42';
                    } elseif ($nama_lowo == 'Pembimbing Kesehatan Kerja') {
                        $n_lowo = 'A43';

                        echo 'A43';
                    } elseif ($nama_lowo == 'Pengelola Keuangan') {
                        $n_lowo = 'A44';

                        echo 'A44';
                    } elseif ($nama_lowo == 'Pengelola Barang dan Jasa') {
                        $n_lowo = 'A45';

                        echo 'A45';
                    } elseif ($nama_lowo == 'Penyuluh Kesmas') {
                        $n_lowo = 'A46';

                        echo 'A46';
                    } elseif ($nama_lowo == 'Pengelola Sarana dan Prasarana Kantor') {
                        $n_lowo = 'A47';

                        echo 'A47';
                    } elseif ($nama_lowo == 'Perencana') {
                        $n_lowo = 'A48';

                        echo 'A48';
                    } elseif ($nama_lowo == 'Pranata humas ahli') {
                        $n_lowo = 'A49';

                        echo 'A49';
                    } elseif ($nama_lowo == 'Pengadministrasian Umum') {
                        $n_lowo = 'A50';

                        echo 'A50';
                    } elseif ($nama_lowo == 'Pranata Komputer') {
                        $n_lowo = 'A51';

                        echo 'A51';
                    } elseif ($nama_lowo == 'Teknik Sipil') {
                        $n_lowo = 'A52';

                        echo 'A52';
                    } elseif ($nama_lowo == 'Teknik Elektro') {
                        $n_lowo = 'A53';

                        echo 'A53';
                    } elseif ($nama_lowo == 'Juru Cuci') {
                        $n_lowo = 'A54';

                        echo 'A54';
                    } elseif ($nama_lowo == 'Pemulasara Jenazah') {
                        $n_lowo = 'A55';

                        echo 'A55';
                    } elseif ($nama_lowo == 'Juru Masak') {
                        $n_lowo = 'A56';

                        echo 'A56';
                    } elseif ($nama_lowo == 'Pramubakti') {
                        $n_lowo = 'A57';

                        echo 'A57';
                    } elseif ($nama_lowo == 'Pramusaji') {
                        $n_lowo = 'A58';

                        echo 'A58';
                    } elseif ($nama_lowo == 'Driver Ambulans') {
                        $n_lowo = 'A59';

                        echo 'A59';
                    } elseif ($nama_lowo == 'Sanitarian (Puskesmas Prambon)') {
                        $n_lowo = 'B1';

                        echo 'B1';
                    } elseif ($nama_lowo == 'Pengelola Keuangan (Puskesmas Kedungsolo)') {
                        $n_lowo = 'B2';

                        echo 'B2';
                    } elseif ($nama_lowo == 'Nutrisionis (Puskesmas Kepadangan)') {
                        $n_lowo = 'B3';

                        echo 'B3';
                    } elseif ($nama_lowo == 'Promosi Kesehatan (Puskesmas Wonoayu)') {
                        $n_lowo = 'B4';

                        echo 'B4';
                    } elseif ($nama_lowo == 'Pengelola Keuangan (Puskesmas Wonoayu)') {
                        $n_lowo = 'B5';

                        echo 'B5';
                    } elseif ($nama_lowo == 'Apoteker (Puskesmas Wonoayu)') {
                        $n_lowo = 'B6';

                        echo 'B6';
                    } elseif ($nama_lowo == 'Sanitarian (Puskesmas Wonoayu)') {
                        $n_lowo = 'B7';

                        echo 'B7';
                    } elseif ($nama_lowo == 'Apoteker (Puskesmas Sukodono)') {
                        $n_lowo = 'B8';

                        echo 'B8';
                    } elseif ($nama_lowo == 'Pranata Komputer (Puskesmas Sukodono)') {
                        $n_lowo = 'B9';

                        echo 'B9';
                    } elseif ($nama_lowo == 'Pranata Komputer (Puskesmas Sedati)') {
                        $n_lowo = 'B10';

                        echo 'B10';
                    } elseif ($nama_lowo == 'Apoteker (Puskesmas Gedangan)') {
                        $n_lowo = 'B11';

                        echo 'B11';
                    } elseif ($nama_lowo == 'Pengelola Keuangan (Puskesmas Ganting)') {
                        $n_lowo = 'B12';

                        echo 'B12';
                    } elseif ($nama_lowo == 'Pengelola Keuangan (Puskesmas Taman)') {
                        $n_lowo = 'B13';

                        echo 'B13';
                    } elseif ($nama_lowo == 'Pengadministrasi Umum (Puskesmas Krian)') {
                        $n_lowo = 'B14';

                        echo 'B14';
                    } elseif ($nama_lowo == 'Perawat (Puskesmas Balongbendo)') {
                        $n_lowo = 'B15';

                        echo 'B15';
                    } elseif ($nama_lowo == 'Promosi Kesehatan (Puskesmas Candi)') {
                        $n_lowo = 'B16';

                        echo 'B16';
                    } elseif ($nama_lowo == 'Pengelola Keuangan (Puskesmas Candi)') {
                        $n_lowo = 'B17';

                        echo 'B17';
                    } elseif ($nama_lowo == 'Pengadministrasi Umum (Puskesmas Candi)') {
                        $n_lowo = 'B18';

                        echo 'B18';
                    } elseif ($nama_lowo == 'Sanitarian (Puskesmas Candi)') {
                        $n_lowo = 'B19';

                        echo 'B19';
                    } elseif ($nama_lowo == 'Pengadministrasi Umum (Puskesmas Jabon)') {
                        $n_lowo = 'B20';

                        echo 'B20';
                    } elseif ($nama_lowo == 'Pengelola Keuangan (Puskesmas Jabon)') {
                        $n_lowo = 'B21';

                        echo 'B21';
                    } elseif ($nama_lowo == 'Pranata Komputer (Puskesmas Buduran)') {
                        $n_lowo = 'B22';

                        echo 'B22';
                    } elseif ($nama_lowo == 'Administrator Kesehatan') {
                        $n_lowo = 'C1';

                        echo 'C1';
                    } elseif ($nama_lowo == 'Pranata Hubungan Masyarakat') {
                        $n_lowo = 'C2';

                        echo 'C2';
                    } elseif ($nama_lowo == 'Pengadministrasi Umum') {
                        $n_lowo = 'C3';

                        echo 'C3';
                    } elseif ($nama_lowo == 'Pengelola Layanan Kehumasan') {
                        $n_lowo = 'C4';

                        echo 'C4';
                    } elseif ($nama_lowo == 'Pengadministrasi Umum') {
                        $n_lowo = 'C5';

                        echo 'C5';
                    } elseif ($nama_lowo == 'Tenaga Kesehatan Tradisional') {
                        $n_lowo = 'C6';

                        echo 'C6';
                    } elseif ($nama_lowo == 'Perawat PSC') {
                        $n_lowo = 'C7';

                        echo 'C7';
                    } elseif ($nama_lowo == 'Driver Sekretariat') {
                        $n_lowo = 'C8';

                        echo 'C8';
                    } else {
                        $n_lowo = $nama_lowo;
                        echo $nama_lowo;

                        // echo "-";
                    }
                    ?>
                </td>
                <td><?php echo $n_lowo . '-' . sprintf('%04d', $i); ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $ttl; ?></td>
                <td><?php echo $age_years; ?> tahun, <?php echo $age_months; ?> bulan, <?php echo $age_days; ?> hari</td>
                <!-- <td><?php echo $jk; ?></td>
                     <td><?php echo $agama; ?></td> -->
                <td><?php echo $alamat; ?></td>
                <td><?php echo $alamatktp; ?></td>
                <td><?php echo $no_hp; ?></td>
                <td><?php echo $emailfix; ?></td>
                <!-- <td><?php echo $gaji; ?></td> -->
                <td><?php echo $pendAkhir; ?></td>
                <td><?php echo $nmInst; ?> - <?php echo $jurusan; ?></td>
                <td><?php echo $ipk; ?></td>
                <td><?php
                    if (!$data_pengalaman) {
                        echo '-';
                    } else {
                        foreach ($data_pengalaman as $key_pengalaman) {
                            if ($user['id_pelamar'] == $key_pengalaman['id_pelamar']) {
                                echo '> ' . $key_pengalaman['jabatan_akhir'] . ' - ' . $key_pengalaman['nama_perusahaan'];

                                echo '<br>';
                            }
                        }
                    }

                    ?>
                </td>
                <!-- <td><?php
                if (!$data_pelatihan) {
                    echo '-';
                } else {
                    foreach ($data_pelatihan as $key_pendidikan_non) {
                        if ($user['id_pelamar'] == $key_pendidikan_non['id_pelamar']) {
                            echo '> ' . $key_pendidikan_non['nama_pendidikan_nonformal'];
                            echo '<br>';
                        }
                    }
                }
                ?></td> -->
                <td><?php
                    if ($pendAkhir == 'SMA/SMK') {
                        if ($ipk >= 96.0 && $ipk <= 100.0) {
                            $s_ipk = 50;

                            echo '50';
                        } elseif ($ipk >= 91.0 && $ipk <= 95.0) {
                            $s_ipk = 49;

                            echo '49';
                        } elseif ($ipk >= 86.0 && $ipk <= 90.0) {
                            $s_ipk = 48;

                            echo '48';
                        } elseif ($ipk >= 81.0 && $ipk <= 85.0) {
                            $s_ipk = 47;

                            echo '47';
                        } elseif ($ipk >= 75.0 && $ipk <= 80.0) {
                            $s_ipk = 46;

                            echo '46';
                        } else {
                            $s_ipk = 0;

                            echo '0';
                        }
                    } elseif ($pendAkhir == 'SMP') {
                        $s_ipk = 0;

                        echo '0';
                    } elseif ($pendAkhir == 'SD') {
                        $s_ipk = 0;

                        echo '0';
                    } else {
                        if ($ipk >= 3.96 && $ipk <= 4.0) {
                            $s_ipk = 50;

                            echo '50';
                        } elseif ($ipk >= 3.91 && $ipk <= 3.95) {
                            $s_ipk = 49;

                            echo '49';
                        } elseif ($ipk >= 3.86 && $ipk <= 3.9) {
                            $s_ipk = 48;

                            echo '48';
                        } elseif ($ipk >= 3.81 && $ipk <= 3.85) {
                            $s_ipk = 47;

                            echo '47';
                        } elseif ($ipk >= 3.76 && $ipk <= 4.8) {
                            $s_ipk = 46;

                            echo '46';
                        } elseif ($ipk >= 3.71 && $ipk <= 4.75) {
                            $s_ipk = 45;

                            echo '45';
                        } elseif ($ipk >= 3.66 && $ipk <= 4.7) {
                            $s_ipk = 44;

                            echo '44';
                        } elseif ($ipk >= 3.61 && $ipk <= 4.65) {
                            $s_ipk = 43;

                            echo '43';
                        } elseif ($ipk >= 3.56 && $ipk <= 4.6) {
                            $s_ipk = 42;

                            echo '42';
                        } elseif ($ipk >= 3.51 && $ipk <= 4.55) {
                            $s_ipk = 41;

                            echo '41';
                        } elseif ($ipk >= 3.46 && $ipk <= 4.5) {
                            $s_ipk = 40;

                            echo '40';
                        } elseif ($ipk >= 3.41 && $ipk <= 4.45) {
                            $s_ipk = 39;

                            echo '39';
                        } elseif ($ipk >= 3.36 && $ipk <= 4.4) {
                            $s_ipk = 38;

                            echo '38';
                        } elseif ($ipk >= 3.31 && $ipk <= 4.35) {
                            $s_ipk = 37;

                            echo '37';
                        } elseif ($ipk >= 3.26 && $ipk <= 4.3) {
                            $s_ipk = 36;

                            echo '36';
                        } else {
                            $s_ipk = 0;

                            echo '0';
                        }
                    }
                    ?>
                </td>
                <td><?php
                    if ($konfirm_berkas == 'CV & Bukti') {
                        $s_ber = 50;

                        echo '50';
                    } elseif ($konfirm_berkas == 'CV Saja') {
                        $s_ber = 30;

                        echo '30';
                    } else {
                        $s_ber = 20;

                        echo '20';
                    }

                    ?>
                </td>
                <td><?php
                    if ($pendAkhir == 'SMA/SMK') {
                        if ($alamat == 'Kec. Krian') {
                            $s_dom = 60;

                            echo '60';
                        } elseif ($alamat == 'Luar Kec. Krian (Kab. Sidoarjo)') {
                            $s_dom = 40;

                            echo '40';
                        } else {
                            $s_dom = 20;

                            echo '20';
                        }
                    } elseif ($pendAkhir == 'SMP') {
                        $s_dom = 0;

                        echo '0';
                    } elseif ($pendAkhir == 'SD') {
                        $s_dom = 0;

                        echo '0';
                    } else {
                        if ($alamat == 'Kec. Krian') {
                            $s_dom = 50;

                            echo '50';
                        } elseif ($alamat == 'Luar Kec. Krian (Kab. Sidoarjo)') {
                            $s_dom = 30;

                            echo '30';
                        } else {
                            $s_dom = 20;

                            echo '20';
                        }
                    }
                    ?>
                </td>
                <td><?php
                    if ($nama_perus == 'RSUD Krian') {
                        if ($pendAkhir == 'SMA/SMK') {
                            echo $s_ipk * (40 / 100) + $s_ber * (30 / 100) + $s_dom * (30 / 100);
                        } elseif ($pendAkhir == 'SMP') {
                            echo '0';
                        } elseif ($pendAkhir == 'SD') {
                            echo '0';
                        } else {
                            echo $s_ipk * (40 / 100) + $s_ber * (25 / 100) + $s_dom * (35 / 100);
                        }
                    } elseif ($nama_perus == 'Puskesmas Kabupaten Sidoarjo') {
                        if ($pendAkhir == 'SMA/SMK') {
                            echo $s_ipk * (40 / 100) + $s_ber * (30 / 100) + $s_dom * (30 / 100);
                        } elseif ($pendAkhir == 'SMP') {
                            echo '0';
                        } elseif ($pendAkhir == 'SD') {
                            echo '0';
                        } else {
                            echo $s_ipk * (60 / 100) + $s_ber * (25 / 100) + $s_dom * (35 / 100);
                        }
                    } elseif ($nama_perus == 'Dinas Kesehatan Kabupaten Sidoarjo') {
                        if ($pendAkhir == 'SMA/SMK') {
                            echo $s_ipk * (40 / 100) + $s_ber * (30 / 100) + $s_dom * (30 / 100);
                        } elseif ($pendAkhir == 'SMP') {
                            echo '0';
                        } elseif ($pendAkhir == 'SD') {
                            echo '0';
                        } else {
                            echo $s_ipk * (60 / 100) + $s_ber * (25 / 100) + $s_dom * (35 / 100);
                        }
                    } else {
                        echo '0';
                    }

                    ?></td>
            </tr>
        <?php $i++;
        } ?>
    </tbody>
</table>