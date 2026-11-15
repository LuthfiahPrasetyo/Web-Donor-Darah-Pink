<?php
session_start();
include '../connect.php';

$batas = 21600;

if ((time() - $_SESSION['last_activity'] >$batas)) {
  echo "<script>
          alert('Sesi sudah habis, silahkan login ulang');
        </script>";
  session_unset();
  session_destroy();
  echo "<script>document.location.href = '../login/login_admin.php'</script>";
}

if (!(isset($_SESSION['id_admin_global']))) {
  echo "<script>
        alert('Silahkan login terlebih dahulu');
        document.location.href = '../login/login_admin.php';
      </script>";
}

$id_admin_global =$_SESSION['id_admin_global'];
$query_admin = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id_admin_global");
$data_admin = mysqli_fetch_object($query_admin);$foto_nav = (!empty($data_admin->foto_profil)) ?$data_admin->foto_profil : '../assets/profil.png';

$filter_lokasi =$_GET['lokasi'];

$lokasi =$conn->query("select distinct lokasi from jadwal_donor");
$tanggal =$conn->query("select distinct tanggal from jadwal_donor");
$jadwal =$conn->query("select * from jadwal_donor where lokasi = '$filter_lokasi'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <title>Filter Lokasi</title>
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
          <li class="nav-item" style="margin-left: 2rem;">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #b02424; font-size: 20px;">
                Lokasi
              </button>
              <ul class="dropdown-menu">
                <?php
                while ($result = mysqli_fetch_object($lokasi)) {
                ?>
                  <li><a href="lokasi_menu_admin.php?lokasi=<?= $result->lokasi ?>" class="dropdown-item"><?= $result->lokasi ?></a></li>
                <?php
                }
                ?>
              </ul>
            </div>
          </li>
          <li class="nav-item" style="margin-left: 2rem;">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #b02424; font-size: 20px;">
                Tanggal
              </button>
              <ul class="dropdown-menu">
                <?php
                while ($result = mysqli_fetch_object($tanggal)) {
                ?>
                  <li><a href="tanggal_menu_admin.php?tanggal=<?= $result->tanggal ?>" class="dropdown-item"><?= $result->tanggal ?></a></li>
                <?php
                }
                ?>
              </ul>
            </div>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <div class="dropdown">
            <img class="btn dropdown-toggle rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false" src="<?= htmlspecialchars($foto_nav); ?>" style="width: 50px; height: 50px; object-fit: cover; background-color: #b02424; outline: whitesmoke solid; padding: 0px;" />
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a href="profile_admin.php" class="dropdown-item">Profil</a></li>
              <li><a href="../login/logout.php" class="dropdown-item">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="border rounded-3 overflow-auto" style="margin: 30px 50px; background-color: #f0eaea; padding: 20px;">
    <table class="table table-striped mb-0">
      <thead style="--bs-table-bg: #efc9c9;">
        <tr>
          <th scope="col" style="width: 10%;">No</th>
          <th scope="col" style="width: 20%;">Tanggal</th>
          <th scope="col" style="width: 30%;">Lokasi</th>
          <th scope="col" style="width: 15%;">Penyelenggara</th>
          <th scope="col" style="width: 10%;">Kuota</th>
          <th scope="col" style="width: 15%;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $count = 1;
        while ($result = mysqli_fetch_object($jadwal)) {
        ?>
          <tr>
            <th scope="row"><?= $count ?></th>
            <td><?= $result->tanggal ?></td>
            <td><?= htmlspecialchars($result->lokasi); ?></td>
            <td><?= htmlspecialchars($result->penyelenggara); ?></td>
            <td><?= $result->kuota ?></td>
            <td>
              <a href="edit_jadwal.php?id=<?= $result->id_jadwal; ?>">
                <button class="btn btn-primary btn-sm">Edit</button>
              </a>
              <a href="hapus_jadwal.php?id=<?= $result->id_jadwal; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                <button class="btn btn-danger btn-sm" style="margin-left: 5px;">Hapus</button>
              </a>
            </td>
          </tr>
        <?php
          $count++;
        }
        ?>
      </tbody>
    </table>
    <div class="mt-4">
      <a href="tambah_jadwal.php" class="btn btn-success" style="background-color: #b02424; border-color: #b02424;">Tambah Jadwal</a>
      <a href="menu_admin.php" class="btn btn-secondary ms-2">Kembali ke Menu Utama</a>
    </div>
  </div>
</body>

</html>