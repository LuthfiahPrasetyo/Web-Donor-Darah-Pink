<?php
session_start();
include '../connect.php';

$batas = 21600; // Sesi 6 jam

if ((time() - $_SESSION['last_activity'] > $batas)) {
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

$id_admin_global = $_SESSION['id_admin_global'];
$data_profil = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id_admin_global");
$result = mysqli_fetch_object($data_profil);

$foto_profil = (!empty($result->foto_profil)) ? $result->foto_profil : '../assets/profil.png';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <title>Profil Admin</title>
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
        <div class="d-flex align-items-center">
          <div class="dropdown">
            <img class="btn dropdown-toggle rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false" src="<?= htmlspecialchars($foto_profil); ?>" style="width: 50px; height: 50px; object-fit: cover; background-color: #b02424; outline: whitesmoke solid; padding: 0px;" />
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a href="profile_admin.php" class="dropdown-item">Profil</a></li>
              <li><a href="../login/logout.php" class="dropdown-item">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="card" style="margin: 10px 250px;">
    <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
      <img src="<?= htmlspecialchars($foto_profil); ?>" alt="Profile Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 20px; background-color: #b02424; outline: whitesmoke solid; padding: 0px;">
      <div class="border rounded-3 overflow-auto" style="margin: 10px 50px; background-color: #f0eaea; width: 100%; max-height: 400px; padding: 20px;">
        <table class="table table-borderless mb-0" style="font-size: 14px; color: #b02424; width: 100%;">
          <tr>
            <td style="width: 30%; background-color: #f0eaea;">Nama Admin</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;"><?= htmlspecialchars($result->nama ?? '-'); ?></td>
          </tr>
          <tr>
            <td style="width: 30%; background-color: #f0eaea;">Username</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;"><?= htmlspecialchars($result->username ?? '-'); ?></td>
          </tr>
          <tr>
            <td style="width: 30%; background-color: #f0eaea;">Email</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;"><?= htmlspecialchars($result->email ?? '-'); ?></td>
          </tr>
          <tr>
            <td style="width: 30%; background-color: #f0eaea;">
              <a href="edit_profile_admin.php">
                <button class="btn btn-sm btn-danger">Edit data</button>
              </a>
            </td>
            <td style="width: 10%; background-color: #f0eaea;"></td>
            <td style="width: 60%; background-color: #f0eaea;"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>

</html>