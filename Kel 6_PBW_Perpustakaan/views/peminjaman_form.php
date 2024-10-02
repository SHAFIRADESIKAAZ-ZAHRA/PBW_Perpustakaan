<style>
    form {
        display: flex;
        flex-direction: column;
        max-width: fit-content;
        border-radius: 8px;
        max-width: 150px;
        font-weight: bold;
    }
    button[type="submit"]{
        border-radius: 5px;
        width: fit-content;
        background-color: lightgrey;
    }
    
</style>
<body>
    <h1>Peminjaman Buku</h1>
    <form action="index.php?action=store" method="post">
        <label for="id_user">Pilih Pengguna:</label>
        <select name="id_user" id="id_user" required>
            <?php foreach ($penggunaList as $pengguna): ?>
                <option value="<?php echo $pengguna['id_user']; ?>">
                    <?php echo $pengguna['nama']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="id_buku">Pilih Buku:</label>
        <select name="id_buku" id="id_buku" required>
            <?php foreach ($bukuList as $buku): ?>
                <option value="<?php echo $buku['id_buku']; ?>">
                    <?php echo $buku['judul']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Pinjam Buku</button>
    </form>
    <a href="peminjaman.php">Kembali</a>
</body>
</html>
