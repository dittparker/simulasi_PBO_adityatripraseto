<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Implementasi wajib dari abstract method induk
    public function hitungTotalBiaya() {
        return 0; // Contoh: Beasiswa ikatan dinas (Gratis)
    }

    public function tampilkanInfoJalur() {
        return "Jalur Kedinasan - Sponsor: " . $this->instansiSponsor . " (No SK: " . $this->skIkatanDinas . ")";
    }

    // =========================================================================
    // METODE QUERY SPESIFIK JALUR KEDINASAN
    // =========================================================================
    public static function getDaftarKedinasan($db) {
        // Query SELECT dengan klausa WHERE spesifik jalur Kedinasan
        $sql = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                FROM tabel_pendaftaran 
                WHERE jalur_pendaftaran = 'Kedinasan'";
        
        return $db->query($sql);
    }
}
?>