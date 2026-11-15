<?php
session_start();
include '../connect.php';
include '../func.php';

$batas = 900;

if ((time() - $_SESSION['last_activity'] > $batas)) {
  echo "<script>
          alert('Sesi sudah habis, silahkan login ulang');
        </script>";
  session_unset();
  session_destroy();
  echo "<script>document.location.href = '../login/login_guest.php'</script>";
}

if (!(isset($_SESSION['id_user_global']))) {
  echo "<script>
        alert('Silahkan login terlebih dahulu');
        document.location.href = '../login/login_guest.php';
      </script>";
}

if (isset($_POST['edit'])) {
  if (edit_profile($_POST)) {
    echo "<script>
        alert('Data berhasil diperbarui!');
        document.location.href = 'profile_guest.php';
      </script>";
  }
}

$id_user_global = $_SESSION['id_user_global'];
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id_user = $id_user_global");
$data = mysqli_fetch_object($query_user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <title>Edit Profil</title>
</head>

<body style="margin: 0px; background-color: #f0eaea;">
  <nav class="navbar navbar-expand-lg" style="background-color: #efc9c9;">
    <div class="container">
      <a href="menu_guest.php" class="navbar-brand me-2">
        <img src="../assets/logo3.png" height="40" alt="Blood Logo" loading="lazy" style="margin-top: -1px;" />
      </a>
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" style="align-self: center;">
            <b style="font-size: 25px; color: #b02424;">DONDARAHYUK</b>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <a href="daftardondar.php" class="btn-solid theme-primary" style="padding: 10px; border-radius: 10px; background-color: #f0eaea; color: #b02424; text-decoration: none; margin-right: 10px;">Daftar Donor Darah</a>
          <div class="dropdown">
            <?php 
              $foto_nav = (!empty($data->foto_profil)) ? $data->foto_profil : '../assets/profil.png';
            ?>
            <img class="btn dropdown-toggle rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false" src="<?= htmlspecialchars($foto_nav); ?>" style="width: 50px; height: 50px; object-fit: cover; background-color: #b02424; outline: whitesmoke solid; padding: 0px;" />
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a href="../login/logout.php" class="dropdown-item">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="card" style="margin: 10px 250px;">
    <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
      
      <?php 
        $foto_profil = (!empty($data->foto_profil)) ? $data->foto_profil : '../assets/profil.png';
      ?>
      <img src="<?= htmlspecialchars($foto_profil); ?>" alt="Profile Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 20px; background-color: #b02424; outline: whitesmoke solid; padding: 0px;">
      
      <div class="border rounded-3 overflow-auto" style="margin: 10px 50px; background-color: #f0eaea; width: 100%; padding: 20px;">
        <form action="" method="post" enctype="multipart/form-data">
          
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data->nama ?? ''); ?>">
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data->email ?? ''); ?>">
          </div>
          
          <div class="mb-3">
            <label for="nomor" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor" name="nomor" value="<?= htmlspecialchars($data->nomor ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label for="usia" class="form-label">Usia</label>
            <input type="number" class="form-control" id="usia" name="usia" value="<?= htmlspecialchars($data->usia ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label for="bb" class="form-label">Berat Badan</label>
            <input type="text" class="form-control" id="bb" name="bb" value="<?= htmlspecialchars($data->bb ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label for="tb" class="form-label">Tinggi Badan</label>
            <input type="text" class="form-control" id="tb" name="tb" value="<?= htmlspecialchars($data->tb ?? ''); ?>">
          </div>

          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="Laki-laki" <?= (($data->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
              <option value="Perempuan" <?= (($data->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="golongan_darah" class="form-label">Golongan Darah</label>
            <select class="form-select" id="golongan_darah" name="golongan_darah">
              <option value="">Pilih Golongan Darah</option>
              <option value="A" <?= (($data->golongan_darah ?? '') == 'A') ? 'selected' : ''; ?>>A</option>
              <option value="B" <?= (($data->golongan_darah ?? '') == 'B') ? 'selected' : ''; ?>>B</option>
              <option value="AB" <?= (($data->golongan_darah ?? '') == 'AB') ? 'selected' : ''; ?>>AB</option>
              <option value="O" <?= (($data->golongan_darah ?? '') == 'O') ? 'selected' : ''; ?>>O</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="foto" class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            <small class="text-muted">Format: JPG, JPEG, PNG. Kosongkan jika tidak ingin mengubah foto.</small>
          </div>

          <button type="submit" name="edit" class="btn btn-primary" style="background-color: #b02424; border-color: #b02424;">Perbarui</button>
        </form>
      </div>
      
      <a href="profile_guest.php" class="mt-2">
        <button class="btn btn-secondary">Batalkan</button>
      </a>
    </div>
  </div>
</body>

</html>