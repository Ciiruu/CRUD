<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama_pengirim = isset($_POST['nama_pengirim']) ? $_POST['nama_pengirim'] : '';
        $alamat_pengirim = isset($_POST['alamat_pg']) ? $_POST['alamat_pg'] : '';
        $nama_penerima = isset($_POST['nama_penerima']) ? $_POST['nama_penerima'] : '';
        $alamat_penerima = isset($_POST['alamat_pn']) ? $_POST['alamat_pn'] : '';
        $berat_barang = isset($_POST['berat_barang']) ? $_POST['berat_barang'] : '';
        $harga_barang = isset($_POST['harga_barang']) ? $_POST['harga_barang'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE data_crud SET id = ?, nama_pengirim = ?, alamat_pg = ?, nama_penerima = ?,alamat_pn = ?,berat_barang = ?,harga_barang = ? WHERE id = ?');
        $stmt->execute([$id, $nama_pengirim, $alamat_pengirim, $nama_penerima, $alamat_penerima, $berat_barang, $harga_barang, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM data_crud WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?= template_header('Read') ?>

<div class="content update">
    <h2>Update Pengiriman #<?= $contact['id'] ?></h2>
    <form action="update.php?id=<?= $contact['id'] ?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" value="<?= $contact['id']; ?>">

        <label for="nama">Nama pengirim</label>
        <input type="text" name="nama_pengirim" value="<?= $contact['nama_pengirim']; ?>">

        <label for="email">Alamat Pengirim</label>
        <input type="text" name="alamat_pg" value="<?= $contact['alamat_pg']; ?>">

        <label for="notelp">Nama Penerima</label>
        <input type="text" name="nama_penerima" value="<?= $contact['nama_penerima']; ?>">

        <label for="pekerjaan">Alamat Penerima</label>
        <input type="text" name="alamat_pn" value="<?= $contact['alamat_pn']; ?>">

        <label for="tempat_tinggal">Berat Barang</label>
        <input type="text" name="berat_barang" value="<?= $contact['berat_barang']; ?>">

        <label for="tempat_tinggal">Harga Barang</label>
        <input type="text" name="harga_barang" value="<?= $contact['harga_barang']; ?>">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg) : ?>
        <p><?= $msg ?></p>
    <?php endif; ?>
</div>

<?= template_footer() ?>