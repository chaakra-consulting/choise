<?php 
if (!function_exists('convert_cfit_to_iq')) {
    function convert_cfit_to_iq($total_nilai_sub) {
        $iq_map = [
            38, 40, 43, 45, 47, 48, 52, 55, 57, 60, 63, 67, 70, 72, 75, 78, 81, 85, 88, 91, 94, 96, 100, 103, 106, 109, 113, 116, 119, 121, 
            124, 128, 131, 133, 137, 140, 142, 145, 152, 155, 157, 161, 165, 167, 169, 173, 183
        ];
        if (isset($iq_map[$total_nilai_sub])) {
            return $iq_map[$total_nilai_sub];
        }
        if ($total_nilai_sub < 0) return $iq_map[0];
        if ($total_nilai_sub >= count($iq_map)) return end($iq_map);
    }
}

if (!function_exists('get_kategori_cfit')) {
    function get_kategori_cfit($iq){
        if ($iq >= 130) return 'Sangat Superior';
        if ($iq >= 120) return 'Superior';
        if ($iq >= 110) return 'Diatas Rata-rata';
        if ($iq >= 90) return 'Rata-rata';
        if ($iq >= 80) return 'Dibawah Rata-rata';
        if ($iq >= 70) return 'Borderline';
        return 'Intellectual Deficient';
    }
}

if (!function_exists('kategori_cepat_l')) {
    function kategori_cepat_l($nilai){
        if ($nilai >= 63) return "BS";
        if ($nilai >= 56) return "B";
        if ($nilai >= 53) return "C+";
        if ($nilai >= 50) return "C";
        if ($nilai >= 47) return "C-";
        if ($nilai >= 40) return "K";
        return "KS";
    }
}

if (!function_exists('kategori_cepat_P')) {
    function kategori_cepat_P($nilai){
        if ($nilai >= 73) return "BS";
        if ($nilai >= 64) return "B";
        if ($nilai >= 61) return "C+";
        if ($nilai >= 57) return "C";
        if ($nilai >= 54) return "C-";
        if ($nilai >= 47) return "K";
        return "KS";
    }
}

if (!function_exists('_get_converted_graph1')) {
    function _get_converted_graph1($dimension, $score)
    {
        switch ($dimension) {
            case 'D':
                if ($score >= 18) return 8; elseif ($score >= 15) return 7; elseif ($score >= 11) return 6; elseif ($score >= 8) return 5;
                elseif ($score >= 6) return 4; elseif ($score >= 4) return 3; elseif ($score >= 2)  return 2; else return 1;
            case 'I':
                if ($score >= 15) return 8; elseif ($score >= 13) return 7; elseif ($score >= 11) return 6; elseif ($score >= 9) return 5;
                elseif ($score >= 7) return 4; elseif ($score >= 5) return 3; elseif ($score >= 3)  return 2; else return 1;
            case 'S':
                if ($score >= 15) return 8; elseif ($score >= 13) return 7; elseif ($score >= 11) return 6; elseif ($score >= 9) return 5;
                elseif ($score >= 7) return 4; elseif ($score >= 5) return 3; elseif ($score >= 3)  return 2; else return 1;
            case 'C':
                if ($score >= 13) return 8; elseif ($score >= 11) return 7; elseif ($score >= 9) return 6; elseif ($score >= 7) return 5;
                elseif ($score >= 5) return 4; elseif ($score >= 3) return 3; elseif ($score >= 2)  return 2; else return 1;
        }
        return 0;
    }
}

if (!function_exists('_get_converted_graph2')) {
    function _get_converted_graph2($dimension, $score)
    {
        switch ($dimension) {
            case 'D':
                if ($score <= 1) return 8; elseif ($score <= 2) return 7; elseif ($score <= 3) return 6; elseif ($score <= 5) return 5;
                elseif ($score <= 7) return 4; elseif ($score <= 9) return 3; elseif ($score <= 12)  return 2; else return 1;
            case 'I':
                if ($score <= 2) return 8; elseif ($score <= 4) return 7; elseif ($score <= 5) return 6; elseif ($score <= 7) return 5;
                elseif ($score <= 9) return 4; elseif ($score <= 11) return 3; elseif ($score <= 13)  return 2; else return 1;
            case 'S':
                if ($score <= 3) return 8; elseif ($score <= 5) return 7; elseif ($score <= 6) return 6; elseif ($score <= 8) return 5;
                elseif ($score <= 10) return 4; elseif ($score <= 12) return 3; elseif ($score <= 14)  return 2; else return 1;
            case 'C':
                if ($score <= 1) return 8; elseif ($score <= 3) return 7; elseif ($score <= 4) return 6; elseif ($score <= 6) return 5;
                elseif ($score <= 8) return 4; elseif ($score <= 10) return 3; elseif ($score <= 12)  return 2; else return 1;
        }
        return 0;
    }
}

if (!function_exists('calculate_rmib')) {
    function calculate_rmib($jawaban_rmib, $jenis_kelamin) {
        if (!$jawaban_rmib) return null;

        $rmib_scores = [];
        $kategori = [
            'Mechanical'        => $jawaban_rmib['a1'] + $jawaban_rmib['b1'] + $jawaban_rmib['c1'] + $jawaban_rmib['d1'] + $jawaban_rmib['e1'] + 
                                $jawaban_rmib['f1'] + $jawaban_rmib['g1'] + $jawaban_rmib['h1'] + $jawaban_rmib['i1'],
            'Outdoor'           => $jawaban_rmib['a2'] + $jawaban_rmib['b2'] + $jawaban_rmib['c2'] + $jawaban_rmib['d2'] + $jawaban_rmib['e2'] + 
                                $jawaban_rmib['f2'] + $jawaban_rmib['g2'] + $jawaban_rmib['h2'] + $jawaban_rmib['i2'],
            'Scientific'        => $jawaban_rmib['a3'] + $jawaban_rmib['b3'] + $jawaban_rmib['c3'] + $jawaban_rmib['d3'] + $jawaban_rmib['e3'] + 
                                $jawaban_rmib['f3'] + $jawaban_rmib['g3'] + $jawaban_rmib['h3'] + $jawaban_rmib['i3'],
            'Literary'          => $jawaban_rmib['a4'] + $jawaban_rmib['b4'] + $jawaban_rmib['c4'] + $jawaban_rmib['d4'] + $jawaban_rmib['e4'] + 
                                $jawaban_rmib['f4'] + $jawaban_rmib['g4'] + $jawaban_rmib['h4'] + $jawaban_rmib['i4'],
            'Social Service'    => $jawaban_rmib['a5'] + $jawaban_rmib['b5'] + $jawaban_rmib['c5'] + $jawaban_rmib['d5'] + $jawaban_rmib['e5'] + 
                                $jawaban_rmib['f5'] + $jawaban_rmib['g5'] + $jawaban_rmib['h5'] + $jawaban_rmib['i5'],
            'Aesthetic'         => $jawaban_rmib['a6'] + $jawaban_rmib['b6'] + $jawaban_rmib['c6'] + $jawaban_rmib['d6'] + $jawaban_rmib['e6'] + 
                                $jawaban_rmib['f6'] + $jawaban_rmib['g6'] + $jawaban_rmib['h6'] + $jawaban_rmib['i6'],
            'Musical'           => $jawaban_rmib['a7'] + $jawaban_rmib['b7'] + $jawaban_rmib['c7'] + $jawaban_rmib['d7'] + $jawaban_rmib['e7'] + 
                                $jawaban_rmib['f7'] + $jawaban_rmib['g7'] + $jawaban_rmib['h7'] + $jawaban_rmib['i7'],
            'Clerical'          => $jawaban_rmib['a8'] + $jawaban_rmib['b8'] + $jawaban_rmib['c8'] + $jawaban_rmib['d8'] + $jawaban_rmib['e8'] + 
                                $jawaban_rmib['f8'] + $jawaban_rmib['g8'] + $jawaban_rmib['h8'] + $jawaban_rmib['i8'],
            'Pratical'          => $jawaban_rmib['a9'] + $jawaban_rmib['b9'] + $jawaban_rmib['c9'] + $jawaban_rmib['d9'] + $jawaban_rmib['e9'] + 
                                $jawaban_rmib['f9'] + $jawaban_rmib['g9'] + $jawaban_rmib['h9'] + $jawaban_rmib['i9'],
            'Medical'           => $jawaban_rmib['a10'] + $jawaban_rmib['b10'] + $jawaban_rmib['c10'] + $jawaban_rmib['d10'] + $jawaban_rmib['e10'] + 
                                $jawaban_rmib['f10'] + $jawaban_rmib['g10'] + $jawaban_rmib['h10'] + $jawaban_rmib['i10'],
            'Computational'     => $jawaban_rmib['a11'] + $jawaban_rmib['b11'] + $jawaban_rmib['c11'] + $jawaban_rmib['d11'] + $jawaban_rmib['e11'] + 
                                $jawaban_rmib['f11'] + $jawaban_rmib['g11'] + $jawaban_rmib['h11'] + $jawaban_rmib['i11'],
            'Personal Contact'  => $jawaban_rmib['a12'] + $jawaban_rmib['b12'] + $jawaban_rmib['c12'] + $jawaban_rmib['d12'] + $jawaban_rmib['e12'] + 
                                $jawaban_rmib['f12'] + $jawaban_rmib['g12'] + $jawaban_rmib['h12'] + $jawaban_rmib['i12'],
        ];
        
        $scores = $kategori;
        arsort($scores);
        $disukai = array_keys(array_slice($scores, 0, 3, true));

        asort($scores);
        $tidak_disukai = array_keys(array_slice($scores, 0, 3, true));

        return [
            'disukai1' => $disukai[0] ?? '-',
            'disukai2' => $disukai[1] ?? '-',
            'disukai3' => $disukai[2] ?? '-',
            'tidak_disukai1' => $tidak_disukai[0] ?? '-',
            'tidak_disukai2' => $tidak_disukai[1] ?? '-',
            'tidak_disukai3' => $tidak_disukai[2] ?? '-',
            'form_profesi1' => $jawaban_rmib['jawaban1'] ?? '-',
            'form_profesi2' => $jawaban_rmib['jawaban2'] ?? '-',
            'form_profesi3' => $jawaban_rmib['jawaban3'] ?? '-',
        ];
    }
}

error_reporting(0);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Jakarta');

$pendaftar_info = $this->db->query("
    SELECT a.nama_pendaftar_pelatihan, a.jenis_kelamin, b.nama_paket FROM tb_pendaftar_pelatihan a LEFT JOIN tb_paket_talent_test b
    ON a.id_paket = b.id_paket WHERE a.id_pendaftar_pelatihan = $id_pendaftar_pelatihan
")->row_array();

$waktu = date('d-m-Y H:i:s');
$nama_file = "Nilai Talent Test - " . $pendaftar_info['nama_pendaftar_pelatihan'] . " - " . $pendaftar_info['nama_paket'] . " - " . $waktu;
$judul_tabel = "Data Nilai Talent Test untuk " . $pendaftar_info['nama_pendaftar_pelatihan'] . " pada Paket " . $pendaftar_info['nama_paket'];

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=" . $nama_file . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

$jawaban_sub1 = $this->db->query("SELECT j.jawaban, s.jawaban as jawaban_kunci FROM tb_data_jawaban_talent_test_cfit j LEFT JOIN tb_soal_cfit s ON j.nomor_soal = s.nomor_soal AND j.subtes=s.subtes WHERE j.subtes = 1 AND j.id_pendaftar_pelatihan = $id_pendaftar_pelatihan");
$jawaban_sub2 = $this->db->query("SELECT j.jawaban, j.jawaban2, s.jawaban as jawaban_kunci, s.jawaban2 as jawaban_kunci2 FROM tb_data_jawaban_talent_test_cfit j LEFT JOIN tb_soal_cfit s ON j.nomor_soal = s.nomor_soal AND j.subtes=s.subtes WHERE j.subtes = 2 AND j.id_pendaftar_pelatihan = $id_pendaftar_pelatihan");
$jawaban_sub3 = $this->db->query("SELECT j.jawaban, s.jawaban as jawaban_kunci FROM tb_data_jawaban_talent_test_cfit j LEFT JOIN tb_soal_cfit s ON j.nomor_soal = s.nomor_soal AND j.subtes=s.subtes WHERE j.subtes = 3 AND j.id_pendaftar_pelatihan = $id_pendaftar_pelatihan");
$jawaban_sub4 = $this->db->query("SELECT j.jawaban, s.jawaban as jawaban_kunci FROM tb_data_jawaban_talent_test_cfit j LEFT JOIN tb_soal_cfit s ON j.nomor_soal = s.nomor_soal AND j.subtes=s.subtes WHERE j.subtes = 4 AND j.id_pendaftar_pelatihan = $id_pendaftar_pelatihan");

$nilai_sub1 = 0;
$nilai_sub2 = 0;
$nilai_sub3 = 0;
$nilai_sub4 = 0;

foreach ($jawaban_sub1->result() as $j) { if ($j->jawaban == $j->jawaban_kunci) {$nilai_sub1++;} }
foreach ($jawaban_sub2->result() as $j) { if ($j->jawaban == $j->jawaban_kunci && $j->jawaban2 == $j->jawaban_kunci2) {$nilai_sub2++;} }
foreach ($jawaban_sub3->result() as $j) { if ($j->jawaban == $j->jawaban_kunci) {$nilai_sub3++;} }
foreach ($jawaban_sub4->result() as $j) { if ($j->jawaban == $j->jawaban_kunci) {$nilai_sub4++;} }

$total_nilai_sub = $nilai_sub1 + $nilai_sub2 + $nilai_sub3 + $nilai_sub4;
$iq_cfit = convert_cfit_to_iq($total_nilai_sub);
$kategori_cfit = get_kategori_cfit($iq_cfit);

$holland = $this->db->query("SELECT * FROM tb_data_jawaban_talent_test_holland WHERE id_pendaftar_pelatihan = $id_pendaftar_pelatihan ORDER BY id_jawaban_holland DESC LIMIT 1")->row_array();

$jawaban_disc = $this->db->get_where('tb_data_jawaban_talent_test_disc', ['id_pendaftar_pelatihan' => $id_pendaftar_pelatihan])->result_array();
$disc = null;
if (!empty($jawaban_disc)) {
    $most_counts = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0, '*' => 0];
    $lest_counts = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0, '*' => 0];
    foreach ($jawaban_disc as $j) {
        $jawaban_m = trim($j['jawaban']);
        $jawaban_l = trim($j['jawaban2']);
        if (strlen($jawaban_m) >= 2 && strlen($jawaban_l) >= 2) {
            $aspek_m = strtoupper(substr($jawaban_m, 0, 1));
            $type_m = substr($jawaban_m, 1, 1);
            $aspek_l = strtoupper(substr($jawaban_l, 0 , 1));
            $type_l = substr($jawaban_l, 1, 1);
            if (in_array($aspek_m, ['D', 'I', 'S', 'C']) && $type_m == 'M' && in_array($aspek_l, ['D', 'I', 'S', 'C'])
                && $type_l == 'L') {
                if (isset($most_counts[$aspek_m])) {
                    $most_counts[$aspek_m]++;
                }
                if (isset($lest_counts[$aspek_l])) {
                    $lest_counts[$aspek_l]++;
                }
            }
        }
    }
    $graph1_scores = ['D' => $most_counts['D'], 'I' => $most_counts['I'], 'S' => $most_counts['S'], 'C' => $most_counts['C']];
    $graph2_scores = ['D' => $lest_counts['D'], 'I' => $lest_counts['I'], 'S' => $lest_counts['S'], 'C' => $lest_counts['C']];

    // MOST
    $disc['most']['nilai_d'] = $graph1_scores['D'];
    $disc['most']['nilai_i'] = $graph1_scores['I'];
    $disc['most']['nilai_s'] = $graph1_scores['S'];
    $disc['most']['nilai_c'] = $graph1_scores['C'];
    $disc['most']['nilai_x'] = $most_counts['*'];
    $disc['most']['konvert_d'] = _get_converted_graph1('D', $graph1_scores['D']);
    $disc['most']['konvert_i'] = _get_converted_graph1('I', $graph1_scores['I']);
    $disc['most']['konvert_s'] = _get_converted_graph1('S', $graph1_scores['S']);
    $disc['most']['konvert_c'] = _get_converted_graph1('C', $graph1_scores['C']);
    $disc['most']['konvert_x'] = '-';
    
    // LEST
    $disc['lest']['nilai_d'] = $graph2_scores['D'];
    $disc['lest']['nilai_i'] = $graph2_scores['I'];
    $disc['lest']['nilai_s'] = $graph2_scores['S'];
    $disc['lest']['nilai_c'] = $graph2_scores['C'];
    $disc['lest']['nilai_x'] = $lest_counts['*'];
    $disc['lest']['konvert_d'] = _get_converted_graph2('D', $graph2_scores['D']);
    $disc['lest']['konvert_i'] = _get_converted_graph2('I', $graph2_scores['I']);
    $disc['lest']['konvert_s'] = _get_converted_graph2('S', $graph2_scores['S']);
    $disc['lest']['konvert_c'] = _get_converted_graph2('C', $graph2_scores['C']);
    $disc['lest']['konvert_x'] = '-';

    $most_converted_scores = [
        'Dominance' => $disc['most']['konvert_d'],
        'Influence' => $disc['most']['konvert_i'],
        'Steadiness' => $disc['most']['konvert_s'],
        'Compliance' => $disc['most']['konvert_c']
    ];
    if (!empty($most_converted_scores)) {
        $max_val_most = max($most_converted_scores);
        if ($max_val_most > 0) {
            $top_categories_most = array_keys($most_converted_scores, $max_val_most);
            $disc['most']['kategori'] = implode(' /', $top_categories_most);
        } else {
            $disc['most']['kategori'] = '-';
        }
    } else {
        $disc['most']['kategori'] = '-';
    }

    $lest_converted_scores = [
        'Dominance' => $disc['lest']['konvert_d'],
        'Influence' => $disc['lest']['konvert_i'],
        'Steadiness' => $disc['lest']['konvert_s'],
        'Compliance' => $disc['lest']['konvert_c'],
    ];
    if (!empty($lest_converted_scores)) {
        $max_val_lest = max($lest_converted_scores);
        if ($max_val_lest > 0) {
            $top_categories_lest = array_keys($lest_converted_scores, $max_val_lest);
            $disc['lest']['kategori'] = implode(' /', $top_categories_lest);
        } else {
            $disc['lest']['kategori'] = '-';
        }
    } else {
        $disc['lest']['kategori'] = '-';
    }
}

$cepat_teliti = $this->db->query("SELECT SUM(CASE WHEN a.jawaban = b.jawaban THEN 1 ELSE 0 END) as jawaban_benar FROM tb_data_jawaban_talent_test_cepat a JOIN tb_soal_cepat b ON a.no_soal = b.nomor_soal WHERE a.id_pendaftar_pelatihan = $id_pendaftar_pelatihan")->row_array();
$nilai_ct = $cepat_teliti['jawaban_benar'] ?? 0;
$kategori_ct = ($pendaftar_info['jenis_kelamin'] == 'L') ? kategori_cepat_l($nilai_ct) : kategori_cepat_p($nilai_ct);

$table_rmib = ($pendaftar_info['jenis_kelamin'] == 'L') ? 'tb_data_jawaban_talent_test_rmib_pria' : 'tb_data_jawaban_talent_test_rmib_wanita';
$jawaban_rmib_raw = $this->db->query("SELECT * FROM $table_rmib WHERE id_pendaftar_pelatihan = $id_pendaftar_pelatihan ORDER BY id_jawaban DESC LIMIT 1")->row_array();
$rmib = calculate_rmib($jawaban_rmib_raw, $pendaftar_info['jenis_kelamin']);

$who_am_i = $this->db->query("SELECT * FROM tb_data_jawaban_talent_test_who_am_i WHERE id_pendaftar_pelatihan = $id_pendaftar_pelatihan ORDER BY id_jawaban DESC LIMIT 1")->row_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Nilai Talent Test</title>
    <style type="text/css">
        table, td, th {
            border-collapse: collapse;
            padding: 15px;
            margin: 10px;
            color: #000;
            border: 1px solid #000;
            text-align: center
        }
    </style>
</head>
<body>
    <h3 style="text-align: center;">
        <?php echo $judul_tabel; ?>
    </h3>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th class="tg-c30w" rowspan="4" style="background-color: yellow;">No</th>
                <th class="tg-0pky" rowspan="4" style="background-color: yellow;">Nama</th>
                <th class="tg-c3ow" colspan="3" rowspan="2" style="background-color: yellow;">CFIT</th>
                <th class="tg-c3ow" colspan="6" rowspan="2" style="background-color: yellow;">Holland</th>
                <th class="tg-c3ow" colspan="3" rowspan="2" style="background-color: yellow;">Who Am I</th>
                <th class="tg-c3ow" colspan="9" style="background-color: yellow;">RMIB</th>
                <th class="tg-c3ow" colspan="12" style="background-color: yellow;">DISC</th>
                <th class="tg-c3ow" colspan="2" rowspan="2" style="background-color: yellow;">Cepat Teliti</th>
            </tr>
            <tr>
                <!-- RMIB -->
                <td colspan="3"><b><center>Paling Disukai</center></b></td>
                <td colspan="3"><b><center>Paling Tidak Disukai</center></b></td>
                <td colspan="3"><b><center>Form Profesi</center></b></td>

                <!-- DISC -->
                <td><b><center>&nbsp;</center></b></td>
                <td colspan="5"><b><center>Nilai</center></b></td>
                <td colspan="5"><b><center>Konvert</center></b></td>
                <td rowspan="3"><b><center>Kategori</center></b></td>
            </tr>
            <tr>
                <!-- CFIT -->
                <td class="tg-0pky" rowspan="2"><b><center>Nilai</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>IQ</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>Kategori</center></b></td>

                <!-- Holland -->
                <td class="tg-0pky" rowspan="2"><b><center>R</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>I</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>A</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>S</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>E</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>K</center></b></td>

                <!-- Who Am I -->
                <td class="tg-0pky" rowspan="2"><b><center>Kelebihan</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>Kekurangan</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>Gambaran 5 Tahun Kedepan</center></b></td>

                <!-- RMIB -->
                <td class="tg-opky" rowspan="2"><b><center>1</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>2</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>3</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>1</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>2</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>3</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>1</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>2</center></b></td>
                <td class="tg-opky" rowspan="2"><b><center>3</center></b></td>

                <!-- DISC -->
                <td class="tg-0pky" rowspan="2"><b><center>&nbsp;</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>D</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>I</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>S</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>C</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>X</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>D</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>I</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>S</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>C</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>X</center></b></td>

                <!-- Cepat Teliti -->
                <td class="tg-0pky" rowspan="2"><b><center>Nilai</center></b></td>
                <td class="tg-0pky" rowspan="2"><b><center>Kategori</center></b></td>
            </tr>
            <tr></tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">1</td>
                <td rowspan="2"><?php echo $pendaftar_info['nama_pendaftar_pelatihan']; ?></td>

                <!-- CFIT -->
                <td rowspan="2"><?php echo $total_nilai_sub; ?></td>
                <td rowspan="2"><?php echo $iq_cfit; ?></td>
                <td rowspan="2"><?php echo $kategori_cfit; ?></td>

                <!-- Holland -->
                <td rowspan="2"><?php echo $holland['nilai_r'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $holland['nilai_i'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $holland['nilai_a'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $holland['nilai_s'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $holland['nilai_e'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $holland['nilai_k'] ?? '-'; ?></td>

                <!-- Who Am I -->
                <td rowspan="2"><?php echo $who_am_i['jawaban1'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $who_am_i['jawaban2'] ?? '-'; ?></td>
                <td rowspan="2"><?php echo $who_am_i['jawaban3'] ?? '-'; ?></td>

                <!-- RMIB -->
                <td rowspan="2"><?php echo $rmib['disukai1'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['disukai2'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['disukai3'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['tidak_disukai1'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['tidak_disukai2'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['tidak_disukai3'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['form_profesi1'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['form_profesi2'] ?? '-' ?></td>
                <td rowspan="2"><?php echo $rmib['form_profesi3'] ?? '-' ?></td>
                
                <!-- DISC -->
                <td><b>MOST</b></td>
                <td><?php echo $disc['most']['nilai_d'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['nilai_i'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['nilai_s'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['nilai_c'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['nilai_x'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['konvert_d'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['konvert_i'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['konvert_s'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['konvert_c'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['konvert_x'] ?? '-'; ?></td>
                <td><?php echo $disc['most']['kategori'] ?? '-'; ?></td>
                
                <!-- Cepat Teliti -->
                <td rowspan="2"><?php echo $nilai_ct; ?></td>
                <td rowspan="2"><?php echo $kategori_ct; ?></td>
            </tr>
            <tr>
                <td><b>LEST</b></td>
                <td><?php echo $disc['lest']['nilai_d'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['nilai_i'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['nilai_s'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['nilai_c'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['nilai_x'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['konvert_d'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['konvert_i'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['konvert_s'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['konvert_c'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['konvert_x'] ?? '-'; ?></td>
                <td><?php echo $disc['lest']['kategori'] ?? '-'; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>