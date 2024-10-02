<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengguna</title>
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
        form {
            display: flex;
            flex-direction: column;
        }
        input {
            background-color: aliceblue;
            border-radius: 3px;
            max-width: fit-content;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="submit"] {
            margin-top: 10px;
            margin-bottom: px;
            background-color: lightgrey;
        }

    </style>

</head>
<body>
    <h1>Daftar Pengguna</h1>
    <form action="index.php?controller=pengguna&action=simpan" method="POST">
        <h2>Tambah Pengguna Baru</h2>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="no_telepon">No Telepon:</label>
        <input type="text" name="no_telepon" required>

        <input type="submit" value="Simpan">
    </form>

    <h2>List Pengguna</h2>
    <table>
        <tr>
            <th>ID Pengguna</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data['pengguna'] as $pengguna): ?>
        <tr>
            <td><?php echo $pengguna['id_user']; ?></td>
            <td><?php echo $pengguna['nama']; ?></td>
            <td><?php echo $pengguna['email']; ?></td>
            <td><?php echo $pengguna['no_telepon']; ?></td>
            <td>
                <a href="index.php?controller=pengguna&action=hapus&id_pengguna=<?php echo $pengguna['id_user']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
