<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nama_pengirim = isset($_POST['nama_pengirim']) ? $_POST['nama_pengirim'] : '';
    $alamat_pengirim = isset($_POST['alamat_pg']) ? $_POST['alamat_pg'] : '';
    $nama_penerima = isset($_POST['nama_penerima']) ? $_POST['nama_penerima'] : '';
    $alamat_penerima = isset($_POST['alamat_pn']) ? $_POST['alamat_pn'] : '';
    $berat_barang = isset($_POST['berat_barang']) ? $_POST['berat_barang'] : '';
    $harga_barang = isset($_POST['harga_barang']) ? $_POST['harga_barang'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO data_crud VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama_pengirim, $alamat_pengirim, $nama_penerima, $alamat_penerima, $berat_barang, $harga_barang]);
    // Output message
    $msg = 'Berhasil Menambahkan Pengiriman';
}
?>


<?= template_header('Create') ?>

<div class="content update">
    <h2>Tambah Pengiriman</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="auto" id="id">

        <label for="Nama">Nama pengirim</label>
        <input type="text" name="nama_pengirim" id="nama_pengirim">

        <label for="email">Alamat Pengirim</label>
        <input type="text" name="alamat_pg" id="alamat_pg">

        <label for="notelp">Nama Penerima</label>
        <input type="text" name="nama_penerima" id="nama_penerima">

        <label for="pekerjaan">Alamat Penerima</label>
        <input type="text" name="alamat_pn" id="alamat_pn">

        <label for="tempat_tinggal">Berat Barang(Kg)</label>
        <input type="text" name="berat_barang" value="Kg " id="berat_barang">

        <label for="tempat_tinggal">Harga Barang(Rp.)</label>
        <input type="text" name="harga_barang" value="Rp. " id="harga_barang">

        <input type="submit" value="Tambah">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>