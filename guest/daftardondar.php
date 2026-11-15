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

if (isset($_POST['daftar'])) {
    if (daftar($_POST)) {
        echo "<script>
          alert('Kamu berhasil mendaftar, selamat!');
          document.location.href = 'menu_guest.php';
        </script>";
    }
}

$id_user_global = $_SESSION['id_user_global'];
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id_user = $id_user_global");
$data = mysqli_fetch_object($query_user);

$tempat = mysqli_query($conn, "SELECT * FROM jadwal_donor WHERE kuota > 0");

$foto_nav = (!empty($data->foto_profil)) ? $data->foto_profil : '../assets/profil.png';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Daftar Donor Darah</title>
</head>

<body style="margin: 0px; background-color: #f0eaea;">
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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="align-self: center;">
                        <b style="font-size: 25px; color: #b02424;">DONDARAHYUK</b>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <img
                            class="btn dropdown-toggle rounded-circle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            src="<?= htmlspecialchars($foto_nav); ?>"
                            style="
                    width: 50px;
                    height: 50px;
                    object-fit: cover;
                    background-color: #b02424;
                    border-radius: 100%;
                    outline: whitesmoke solid;
                    padding: 0px;
                  " />
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="profile_guest.php" class="dropdown-item">Profile</a></li>
                            <li><a href="../login/logout.php" class="dropdown-item">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5" style="background-color: #f0eaea; padding: 20px; border-radius: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #efc9c9; text-align: center; font-size: 20px; color: #b02424; font-weight: bold;">
                        <h3>Daftar Donor Darah</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data->nama ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data->email ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="nomor" value="<?= htmlspecialchars($data->nomor ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="usia" class="form-label">Usia</label>
                                <input type="number" class="form-control" id="usia" name="usia" value="<?= htmlspecialchars($data->usia ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat Badan (kg)</label>
                                <input type="number" step="0.01" class="form-control" id="berat" name="bb" value="<?= htmlspecialchars($data->bb ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" step="0.01" class="form-control" id="tinggi" name="tb" value="<?= htmlspecialchars($data->tb ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pernah_donor" class="form-label">Pernah Donor?</label>
                                <select class="form-select" id="pernah_donor" onchange="cekPernahDonor()">
                                    <option value="">Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3" id="wrapper_terakhir_donor" style="display: none;">
                                <label for="terakhir_donor" class="form-label">Tanggal Terakhir Donor</label>
                                <input type="date" class="form-control" id="terakhir_donor" name="terakhir_donor">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" <?= (($data->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= (($data->gender ?? '') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                <select class="form-select" id="golongan_darah" name="golongan_darah" required>
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A" <?= (($data->golongan_darah ?? '') == 'A') ? 'selected' : ''; ?>>A</option>
                                    <option value="B" <?= (($data->golongan_darah ?? '') == 'B') ? 'selected' : ''; ?>>B</option>
                                    <option value="AB" <?= (($data->golongan_darah ?? '') == 'AB') ? 'selected' : ''; ?>>AB</option>
                                    <option value="O" <?= (($data->golongan_darah ?? '') == 'O') ? 'selected' : ''; ?>>O</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_jadwal" class="form-label">Pilih Jadwal & Lokasi Donor</label>
                                <select class="form-select" id="id_jadwal" name="id_jadwal" required>
                                    <option value="">Pilih Jadwal</option>
                                    <?php
                                    while ($result = mysqli_fetch_object($tempat)) {
                                    ?>
                                        <option value="<?= $result->id_jadwal; ?>"><?= htmlspecialchars($result->lokasi); ?> (<?= $result->tanggal; ?>) - Sisa Kuota: <?= $result->kuota; ?></option>
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
                wrapperTerakhir.style.display = 'block';
                inputTerakhir.required = true;
            } else {
                wrapperTerakhir.style.display = 'none';
                inputTerakhir.value = '';
                inputTerakhir.required = false;
            }
        }
    </script>
</body>

</html>