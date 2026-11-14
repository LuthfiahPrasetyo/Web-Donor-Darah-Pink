<?php
session_start();
include '../connect.php';
include '../func.php';

$batas = 900;

if (!(isset($_SESSION['id_user_global']))) {
    echo "<script>
        alert('Silahkan login terlebih dahulu');
        document.location.href = '../login/login_guest.php';
      </script>";
}
if ((time() - $_SESSION['last_activity'] > $batas)) {
    echo "<script>
          alert('Sesi sudah habiss, silahkan login ulang');
        </script>";
    session_unset();
    session_destroy();
    echo "<script>document.location.href = '../login/login_guest.php'</script>";
}

$id_user_global = $_SESSION['id_user_global'];
$query_user = mysqli_query($conn, "select * from users where id_user = $id_user_global");
$data = mysqli_fetch_object($query_user);

$tempat = mysqli_query($conn, "select * from jadwal_donor");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="margin: 0px; background-color: #f0eaea;">
    <!-- Header Nih -->
    <nav class="navbar navbar-expand-lg" style="background-color: #efc9c9;">
        <div class="container">
            <a href="menu_guest.php" class="navbar-brand me-2">
                <img
                    src="../assets/logo3.png"
                    height="40"
                    alt="Blood Logo"
                    loading="lazy"
                    style="margin-top: -1px;" />
            </a>

            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="align-self: center;">
                        <b style="font-size: 25px; color: #b02424;">DONDARAHYUK</b>
                    </li>
                </ul>
                <!-- Profile -->
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <img
                            class="btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            src="../assets/profil.png"
                            style="
                    width: 50px;
                    background-color: #b02424;
                    border-radius: 100%;
                    outline: whitesmoke solid;
                    padding: 0px;
                  " />
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="../assets/profile.php" class="dropdown-item">Profile</a></li>
                            <li><a href="../login/logout.php" class="dropdown-item">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header Tutup -->
    <!-- Card Daftar Donor Darah -->
    <div class="container mt-5" style="background-color: #f0eaea; padding: 20px; border-radius: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #efc9c9; text-align: center; font-size: 20px; color: #b02424; font-weight: bold;">
                        <h3>Daftar Donor Darah</h3>
                    </div>
                    <div class="card-body">
                        <!-- Form Daftar Donor Darah goes here -->
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" value="<?= $data->nama ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $data->email ?>">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" value="<?= $data->nomor ?>">
                            </div>
                            <div type="number" class="mb-3">
                                <label for="usia" class="form-label">Usia</label>
                                <input type="number" class="form-control" id="usia" value="<?= $data->usia ?>">
                            </div>
                            <div type="number" class="mb-3">
                                <label for="berat" class="form-label">Berat Badan (kg)</label>
                                <input type="number" class="form-control" id="berat" value="<?= $data->bb ?>">
                            </div>
                            <div type="number" class="mb-3">
                                <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" class="form-control" id="tinggi" value="<?= $data->tb ?>">
                            </div>
                            <div class="mb-3">
                                <label for="pernah_donor" class="form-label">Pernah Donor?</label>
                                <select class="form-select" id="pernah_donor" name="pernah_donor" onchange="cekPernahDonor()">
                                    <option value="">Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <!-- Kolom Kapan Terakhir Donor (Awalnya Disembunyikan) -->
                            <div class="mb-3" id="wrapper_terakhir_donor" style="display: none;">
                                <label for="terakhir_donor" class="form-label">Sudah berapa bulan sejak donor terakhir? (bulan)</label>
                                <input type="number" class="form-control" id="terakhir_donor" name="terakhir_donor" placeholder="Masukkan jumlah bulan">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" value="<?= $data->jenis_kelamin ?>">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                <select class="form-select" id="golongan_darah" value="<?= $data->golongan_darah ?>">
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Daftar Donor Darah</label>
                                <select class="form-select">
                                    <?php
                                    while ($result = mysqli_fetch_object($tempat)) {
                                    ?>
                                        <option value="<?= $result->lokasi . " " . $result->tanggal ?>"><?= $result->lokasi . " " . $result->tanggal ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="daftar" class="btn btn-primary" style="background-color: #b02424; border-color: #b02424;">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function cekPernahDonor() {
        const statusDonor = document.getElementById('pernah_donor').value;
        const wrapperTerakhir = document.getElementById('wrapper_terakhir_donor');
        const inputTerakhir = document.getElementById('terakhir_donor');

        if (statusDonor === 'Ya') {
            wrapperTerakhir.style.display = 'block'; // Munculkan kolom
            inputTerakhir.required = true; // Wajib diisi jika pilih Ya
        } else {
            wrapperTerakhir.style.display = 'none';  // Sembunyikan kolom
            inputTerakhir.value = ''; // Kosongkan nilai input
            inputTerakhir.required = false; // Tidak wajib
        }
    }
    </script>
</body>

</html>