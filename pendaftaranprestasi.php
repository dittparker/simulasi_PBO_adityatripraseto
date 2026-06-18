<?php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Implementasi wajib dari abstract method induk
public function hitungTotalBiaya() {
    return $this->biayaPendaftaranDasar - 50000;
}
    public function tampilkanInfoJalur() {
        return "Jalur Prestasi - " . $this->jenisPrestasi . " Tingkat " . $this->tingkatPrestasi;
    }

    // =========================================================================
    // METODE QUERY SPESIFIK JALUR PRESTASI
    // =========================================================================
    public static function getDaftarPrestasi($db) {
        // Query SELECT dengan klausa WHERE spesifik jalur Prestasi
        $sql = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                FROM tabel_pendaftaran 
                WHERE jalur_pendaftaran = 'Prestasi'";
        
        return $db->query($sql);
    }
}
?>