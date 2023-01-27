<?php
//memanggil folder
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');

// ambil data prodi
$query_prodi = "SELECT * FROM matakuliah";
$prodi = $koneksi->query($query_prodi);

if (isset($_POST['submit'])) {
    $keterangan = $_POST['keterangan'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO tahun_ajaran(keterangan, semester) VALUES ('".$keterangan."', '".$semester."')";
    $simpan = $koneksi->query($sql);

    if ($simpan) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data Gagal Disimpan";
    }

    $koneksi->close();
}
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Matakuliah</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_matakuliah">Nama Matakuliah</label>
                                    <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah"
                                        placeholder="Masukkan Nama Matakuliah" required>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                        <select  class="form-control" name="semester" id="semester">
                                                <?php for($i=1; $i<10; $i++) { ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php }?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="sks">SKS</label>
                                    <input type="text" class="form-control" id="sks" name="sks"
                                        placeholder="Masukkan SKS" required>
                                </div>
                            </div>                     
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary mb-1">
                        <a href="<?php echo $base_url ;?>/tahunajaran/tampil_tahunajaran.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>