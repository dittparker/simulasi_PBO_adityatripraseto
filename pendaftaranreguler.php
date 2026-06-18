<?php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Implementasi wajib dari abstract method induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar; // Tarif normal reguler
    }

    public function tampilkanInfoJalur() {
        return "Jalur Reguler - Prodi: " . $this->pilihanProdi . " (" . $this->lokasiKampus . ")";
    }

    // =========================================================================
    // METODE QUERY SPESIFIK JALUR REGULER
    // =========================================================================
    public static function getDaftarReguler($db) {
        // Query SELECT dengan klausa WHERE spesifik jalur Reguler
        $sql = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                FROM tabel_pendaftaran 
                WHERE jalur_pendaftaran = 'Reguler'";
        
        return $db->query($sql);
    }
}
?>