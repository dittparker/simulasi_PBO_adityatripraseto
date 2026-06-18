<?php

// Menggunakan keyword 'abstract' agar kelas tidak bisa diinstansiasi langsung
abstract class Pendaftaran {
    
    // Properti Terenkapsulasi (protected) - Wajib dipetakan dari kolom database
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    /**
     * Constructor untuk memetakan nilai dari database ke properti objek
     */
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran        = $id_pendaftaran;
        $this->nama_calon            = $nama_calon;
        $this->asal_sekolah          = $asal_sekolah;
        $this->nilai_ujian           = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib tanpa isi / body / kurung kurawal)
    // =========================================================================
    
    // Menghitung total biaya pendaftaran yang berbeda di tiap jalur
    abstract public function hitungTotalBiaya();

    // Menampilkan informasi fasilitas atau detail spesifik dari jalur pendaftaran
    abstract public function tampilkanInfoJalur();

    // =========================================================================
    // GETTER METHODS (Agar nilai protected bisa diakses/dicetak di file tampilan luar)
    // =========================================================================
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }
}

?>