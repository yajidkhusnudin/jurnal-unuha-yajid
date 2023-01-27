<?php
include "../config.php";
include "../database/koneksi.php";
require_once ('../layout/header.php');
require_once ('../layout/navbar.php');


$sql = "SELECT * FROM tahun_ajaran";
$hasil = $koneksi->query($sql);
$koneksi->close();
?>

<div class="wrap-content">
    <?php require_once ('../layout/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Tahun Ajaran</h1>
            <div class="card">
                <div class="card-body">
                <a href="<?php echo $base_url ;?>/tahunajaran/tambah_tahunajaran.php" class="btn btn-success mb-3">Tambah Tahun Ajaran</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Semester</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no_urut = 1; 
                            if ($hasil->num_rows > 0) {
                                while ($row = $hasil->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $no_urut++; ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                            ?>
                            <tr>
                                <td colspan="4">Belum Ada Data Tahun Ajaran</td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../layout/footer.php');?>