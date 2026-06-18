<?php
// 1. Memanggil semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'pendaftaranreguler.php';
require_once 'pendaftaranprestasi.php';
require_once 'pendaftarankedinasan.php';

// 2. Membuat koneksi database
$koneksiObj = new Koneksi();
$db = $koneksiObj->db;

// JIKA KONEKSI GAGAL ATAU NULL, APPS DIHENTIKAN AGAR TIDAK ERROR DOMINO
if (!$db) {
    die("<h3 style='color:red; text-align:center; font-family:sans-serif;'>Gagal memuat halaman: Koneksi database bernilai NULL. Periksa kembali nama database di koneksi.php!</h3>");
}

// 3. Mengambil data dari database lewat Method Query Spesifik (Tahap 4)
$resultReguler   = PendaftaranReguler::getDaftarReguler($db);
$resultPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$resultKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

// Array untuk menampung objek-objek konkrit
$daftarReguler = [];
$daftarPrestasi = [];
$daftarKedinasan = [];

// 4. Memetakan hasil query Reguler menjadi objek
if ($resultReguler && $resultReguler->num_rows > 0) {
    while ($row = $resultReguler->fetch_assoc()) {
        $daftarReguler[] = new PendaftaranReguler(
            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
            $row['pilihan_prodi'], $row['lokasi_kampus']
        );
    }
}

// 5. Memetakan hasil query Prestasi menjadi objek
if ($resultPrestasi && $resultPrestasi->num_rows > 0) {
    while ($row = $resultPrestasi->fetch_assoc()) {
        $daftarPrestasi[] = new PendaftaranPrestasi(
            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
            $row['jenis_prestasi'], $row['tingkat_prestasi']
        );
    }
}

// 6. Memetakan hasil query Kedinasan menjadi objek
if ($resultKedinasan && $resultKedinasan->num_rows > 0) {
    while ($row = $resultKedinasan->fetch_assoc()) {
        $daftarKedinasan[] = new PendaftaranKedinasan(
            $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
            $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
            $row['sk_ikatan_dinas'], $row['instansi_sponsor']
        );
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Mahasiswa Baru</title>
    <style>
        body { 
            font-family: 'Segoe UI', system-ui, sans-serif; 
            background-color: #f1f5f9; 
            margin: 15px; 
            font-size: 11px; 
            color: #334155;
        }
        .container { max-width: 1200px; margin: 0 auto; }
        h2 { 
            text-align: center; 
            color: #0f172a; 
            font-size: 16px; 
            margin: 10px 0 20px 0;
            font-weight: 600;
        }
        .section-title {
            font-size: 12px;
            font-weight: 600;
            margin: 20px 0 8px 0;
            padding-left: 8px;
            text-transform: uppercase;
        }
        .reguler-title { border-left: 4px solid #0284c7; color: #0284c7; }
        .prestasi-title { border-left: 4px solid #16a34a; color: #16a34a; }
        .kedinasan-title { border-left: 4px solid #d97706; color: #d97706; }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            background: white; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.05); 
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 15px;
        }
        th, td { 
            padding: 5px 8px; 
            text-align: left; 
            border-bottom: 1px solid #e2e8f0; 
            line-height: 1.3;
        }
        th { 
            color: #f8fafc; 
            font-size: 11px; 
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .reguler-table th { background-color: #0284c7; }
        .prestasi-table th { background-color: #16a34a; }
        .kedinasan-table th { background-color: #d97706; }

        tr:hover { background-color: #f8fafc; }
        
        .badge { 
            padding: 1px 4px; 
            border-radius: 3px; 
            font-weight: bold; 
            font-size: 9px; 
            text-transform: uppercase; 
            display: inline-block;
        }
        .badge-reg { background-color: #e0f2fe; color: #0369a1; }
        .badge-pres { background-color: #dcfce7; color: #15803d; }
        .badge-ked { background-color: #fef3c7; color: #b45309; }

        td strong { color: #0f172a; }
    </style>
</head>
<body>

<div class="container">
    <h2>DASHBOARD DATA PENDAFTARAN MAHASISWA BARU</h2>

    <div class="section-title reguler-title">Kategori Jalur Reguler</div>
    <table class="reguler-table">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="22%">Nama Calon</th>
                <th width="15%">Asal Sekolah</th>
                <th width="10%">Nilai Ujian</th>
                <th width="13%">Biaya Dasar</th>
                <th width="20%">Info Spesifik (Polimorfisme)</th>
                <th width="15%">Total Biaya (Overriding)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarReguler as $mhs): ?>
                <tr>
                    <td><?= $mhs->getIdPendaftaran(); ?></td>
                    <td><strong><?= htmlspecialchars($mhs->getNamaCalon()); ?></strong></td>
                    <td><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                    <td><?= $mhs->getNilaiUjian(); ?></td>
                    <td>Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge badge-reg"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                    <td><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="section-title prestasi-title">Kategori Jalur Prestasi</div>
    <table class="prestasi-table">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="22%">Nama Calon</th>
                <th width="15%">Asal Sekolah</th>
                <th width="10%">Nilai Ujian</th>
                <th width="13%">Biaya Dasar</th>
                <th width="20%">Info Spesifik (Polimorfisme)</th>
                <th width="15%">Total Biaya (Overriding)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarPrestasi as $mhs): ?>
                <tr>
                    <td><?= $mhs->getIdPendaftaran(); ?></td>
                    <td><strong><?= htmlspecialchars($mhs->getNamaCalon()); ?></strong></td>
                    <td><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                    <td><?= $mhs->getNilaiUjian(); ?></td>
                    <td>Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge badge-pres"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                    <td><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></strong> <small style="color:#16a34a; font-weight:bold;">(-50k)</small></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="section-title kedinasan-title">Kategori Jalur Kedinasan</div>
    <table class="kedinasan-table">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="22%">Nama Calon</th>
                <th width="15%">Asal Sekolah</th>
                <th width="10%">Nilai Ujian</th>
                <th width="13%">Biaya Dasar</th>
                <th width="20%">Info Spesifik (Polimorfisme)</th>
                <th width="15%">Total Biaya (Overriding)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($daftarKedinasan as $mhs): ?>
                <tr>
                    <td><?= $mhs->getIdPendaftaran(); ?></td>
                    <td><strong><?= htmlspecialchars($mhs->getNamaCalon()); ?></strong></td>
                    <td><?= htmlspecialchars($mhs->getAsalSekolah()); ?></td>
                    <td><?= $mhs->getNilaiUjian(); ?></td>
                    <td>Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge badge-ked"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                    <td><strong>Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></strong> <small style="color:#b45309; font-weight:bold;">(+25% Admin)</small></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>