<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

    <h1>Daftar Peminjaman Buku</h1>
    <table>
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Pengguna</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjamanList as $peminjaman): ?>
                <tr>
                    <td><?php echo $peminjaman['id_peminjaman']; ?></td>
                    <td><?php echo $peminjaman['pengguna']; ?></td>
                    <td><?php echo $peminjaman['buku']; ?></td>
                    <td><?php echo $peminjaman['tanggal_peminjaman']; ?></td>
                    <td><?php echo $peminjaman['tanggal_pengembalian'] ?: 'Belum Kembali'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php">Kembali</a>
</body>
</html>
