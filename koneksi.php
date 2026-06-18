<?php

class Koneksi {
    // Sesuaikan kredensial server localhost kamu jika berbeda
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_simulasi_ti-1D_adityatriprasetyo"; 
    public $db;

    public function __construct() {
        try {
            // Membuka koneksi menggunakan MySQLi OOP
            $this->db = new mysqli($this->host, $this->username, $this->password, $this->database);

            // Cek apakah ada error saat koneksi
            if ($this->db->connect_error) {
                throw new Exception("Koneksi ke database gagal: " . $this->db->connect_error);
            }
        } catch (Exception $e) {
            echo "Terjadi Kesalahan: " . $e->getMessage();
        }
    }
}
?>