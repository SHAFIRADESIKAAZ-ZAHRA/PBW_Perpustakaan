<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            background-color: #E6E6FA;
            box-shadow: 1px 1px 3px #000;
        }
        th, td {
            border: 1px solid #000;
            box-shadow: 1px 1px 3px #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #D3D3D3;
        }
        h2 {
            font-size: larger;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-top: 10px;
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="buku.php?action=create">Tambah Buku</a>
    <table>
        <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $row['id_buku']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['penulis']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td><?php echo $row['tahun_terbit']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="buku.php?action=hapus&id_buku=<?php echo $row['id_buku']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
