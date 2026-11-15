<?php
session_start();
include '../connect.php';
include '../func.php';

if (isset($_POST['tambah'])) {
    if (tambah_jadwal($_POST)) {
        echo "<script>
            alert('Jadwal donor berhasil ditambahkan!');
            document.location.href = 'menu_admin.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Tambah Jadwal</title>
</head>

<body style="margin: 0px; background-color: #f0eaea;">
    <nav class="navbar navbar-expand-lg" style="background-color: #efc9c9;">
        <div class="container">
            <a href="menu_admin.php" class="navbar-brand me-2">
                <img src="../assets/logo3.png" height="40" alt="Blood Logo" loading="lazy" style="margin-top: -1px;" />
            </a>
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="align-self: center;">
                        <b style="font-size: 25px; color: #b02424;">DONDARAHYUK</b>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5" style="background-color: #f0eaea; padding: 20px; border-radius: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #efc9c9; text-align: center; font-size: 20px; color: #b02424; font-weight: bold;">
                        <h3>Tambah Jadwal Donor</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                            </div>
                            <div class="mb-3">
                                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" required>
                            </div>
                            <div class="mb-3">
                                <label for="kuota" class="form-label">Kuota</label>
                                <input type="number" class="form-control" id="kuota" name="kuota" required>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary" style="background-color: #b02424; border-color: #b02424;">Simpan Jadwal</button>
                            <a href="menu_admin.php" class="btn btn-secondary ms-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>