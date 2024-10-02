<?php
class Buku {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, status) VALUES (:judul, :penulis, :penerbit, :tahun_terbit, :status)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':judul', $data['judul']);
        $stmt->bindParam(':penulis', $data['penulis']);
        $stmt->bindParam(':penerbit', $data['penerbit']);
        $stmt->bindParam(':tahun_terbit', $data['tahun_terbit']);
        $stmt->bindParam(':status', $data['status']);
    
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Gagal menyimpan data.");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    public function read() {
        $query = "SELECT * FROM buku";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function delete($id_buku) {
        $query = "DELETE FROM buku WHERE id_buku = :id_buku";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_buku', $id_buku);
        return $stmt->execute();
    }
}
?>
