<h1><?php echo isset($pengguna) ? 'Edit Pengguna' : 'Tambah Pengguna'; ?></h1>
<form method="POST" action="index.php?action=<?php echo isset($pengguna) ? 'update' : 'store'; ?>">
    <?php if (isset($pengguna)): ?>
        <input type="hidden" name="id_user" value="<?= $pengguna['id_user']; ?>">
    <?php endif; ?>
    
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= isset($pengguna) ? $pengguna['nama'] : ''; ?>" required><br>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?= isset($pengguna) ? $pengguna['email'] : ''; ?>" required><br>
    
    <label>Nomor Telepon:</label>
    <input type="tel" name="no_telp" value="<?= isset($pengguna) ? $pengguna['no_telp'] : ''; ?>" required><br>
    
    <label>Peran:</label>
    <select name="peran">
        <option value="user" <?= (isset($pengguna) && $pengguna['peran'] === 'user') ? 'selected' : ''; ?>>User</option>
        <option value="admin" <?= (isset($pengguna) && $pengguna['peran'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
    </select><br>
    
    <button type="submit"><?php echo isset($pengguna) ? 'Update' : 'Simpan'; ?></button>
</form>
