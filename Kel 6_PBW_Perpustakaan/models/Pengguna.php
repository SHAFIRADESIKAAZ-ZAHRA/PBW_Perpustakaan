<?php
class Pengguna {
    private $conn;
    private $table = 'pengguna'; // Ganti dengan nama tabel Anda

    public $id_pengguna;
    public $nama;
    public $email;
    public $no_telepon;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPengguna() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahPengguna() {
        $query = "INSERT INTO " . $this->table . " (nama, email, no_telepon) VALUES (:nama, :email, :no_telepon)";
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':no_telepon', $this->no_telepon);

        return $stmt->execute();
    }

    public function editPengguna() {
        $query = "UPDATE " . $this->table . " SET nama = :nama, email = :email, no_telepon = :no_telepon WHERE id_pengguna = :id_pengguna";
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':no_telepon', $this->no_telepon);

        return $stmt->execute();
    }

    public function hapusPengguna() {
        $query = "DELETE FROM " . $this->table . " WHERE id_pengguna = :id_pengguna";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_pengguna', $this->id_pengguna);
        
        return $stmt->execute();
    }
}
