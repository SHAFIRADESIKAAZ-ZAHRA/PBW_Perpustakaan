<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: fit-content;
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
            margin-bottom: 20px;
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <h1>Tambah Buku</h1>
    <form action="buku.php?action=simpan" method="POST">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" required>

        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" required>

        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit">

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required>

        <label for="status">Status:</label>
        <select name="status">
            <option value="tersedia">Tersedia</option>
            <option value="dipinjam">Dipinjam</option>
        </select>

        <input type="submit" value="Tambah Buku">
    </form>
</body>

</html>