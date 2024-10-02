<?php
require_once 'config/Database.php';
require_once 'controllers/PeminjamanController.php';

class PeminjamanController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function listPeminjam()
    {
        $penggunaQuery = "SELECT * FROM pengguna";
        $stmt = $this->db->prepare($penggunaQuery);
        $stmt->execute();
        $penggunaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $penggunaList;
    }

    public function storePeminjaman($id_user, $id_buku)
    {
        $tanggal_peminjaman = date('Y-m-d');
        $status_peminjaman = 'aktif';

        $query = "INSERT INTO peminjaman (id_user, id_buku, tanggal_peminjaman, status_peminjaman) 
                  VALUES (:id_user, :id_buku, :tanggal_peminjaman, :status_peminjaman)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->bindParam(':tanggal_peminjaman', $tanggal_peminjaman);
        $stmt->bindParam(':status_peminjaman', $status_peminjaman);
        return $stmt->execute();
    }


    public function listBuku()
    {
        $bukuQuery = "SELECT * FROM buku";
        $stmt = $this->db->prepare($bukuQuery);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listPeminjaman()
    {
        $peminjamanQuery = "SELECT p.id_peminjaman, p.tanggal_peminjaman, p.tanggal_pengembalian, u.nama AS pengguna, b.judul AS buku
                            FROM peminjaman p
                            JOIN pengguna u ON p.id_user = u.id_user
                            JOIN buku b ON p.id_buku = b.id_buku
                            ORDER BY p.tanggal_peminjaman DESC";
        $stmt = $this->db->prepare($peminjamanQuery);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPenggunaById($id_user)
    {
        $query = "SELECT * FROM pengguna WHERE id_user = :id_user";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBukuById($id_buku)
    {
        $query = "SELECT * FROM buku WHERE id_buku = :id_buku";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_buku', $id_buku);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
