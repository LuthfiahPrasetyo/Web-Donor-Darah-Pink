<?php
session_start();
include '../connect.php';

$batas = 900;

if ((time() - $_SESSION['last_activity'] > $batas)) {
    echo "<script>
          alert('Sesi sudh habiss, silahkan login ulang');
        </script>";
    session_unset();
    session_destroy();
    echo "<script>document.location.href = '../login/login_guest.php'</script>";
}

if( !(isset($_SESSION['id_user_global']))){
  echo "<script>
        alert('Silahkan login terlebih dahulu');
        document.location.href = '../login/login_guest.php';
      </script>";
}

$id_user_global = $_SESSION['id_user_global'];
$menu_lokasi = $_GET['lokasi'];

$jadwal_user = mysqli_query($conn, "select * from pendaftaran_donor where id_user = $id_user_global");
$lokasi = mysqli_query($conn, "select distinct lokasi from jadwal_donor");
$tanggal = mysqli_query($conn, "select distinct tanggal from jadwal_donor");
$jadwal = mysqli_query($conn, "select * from jadwal_donor where lokasi = '$menu_lokasi'");

// $jadwal_donor = mysqli_query($conn, "select * from ")
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
            style="margin-top: -1px;"
          />
        </a>

        <div class="collapse navbar-collapse" id="navbarButtonsExample">
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item" style="align-self: center;">
              <b style="font-size: 25px; color: #b02424;"
                >DONDARAHYUK</b
              >
            </li>
            <!--Dropdown lokasi-->
            <li class="nav-item" style="margin-left: 2rem;">
              <div class="dropdown">
                <button
                  class="btn dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="color: #b02424; font-size: 20px;"
                >
                  Lokasi
                </button>
                <ul class="dropdown-menu">
                  <?php
                  while($result = mysqli_fetch_object($lokasi)){
                  ?>
                  <li><a href="lokasi_menu_guest.php?lokasi=<?= $result->lokasi ?>" class="dropdown-item"><?= $result->lokasi ?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </li>
            <!--Dropdown tanggal-->
            <li class="nav-item" style="margin-left: 2rem;">
              <div class="dropdown">
                <button
                  class="btn dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="color: #b02424; font-size: 20px;"
                >
                  Tanggal
                </button>
                <ul class="dropdown-menu">
                  <?php
                  while($result = mysqli_fetch_object($tanggal)){
                  ?>
                  <li><a href="tanggal_menu_guest.php?tanggal=<?= $result->tanggal ?>" class="dropdown-item"><?= $result->tanggal ?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </div>
            </li>
            
          </ul>
          <!-- Profile -->
          <div class="d-flex align-items-center">
              <a href="daftardondar.php" class="btn-solid theme-primary" style="padding: 10px; border-radius: 10px; background-color: #f0eaea; color: inherit; color: #b02424; text-decoration: none; margin-right: 10px;">Daftar Donor Darah</a>
              <div class="dropdown">
                <img
                  class="btn dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  src="../assets/profil.png"
                  style="
                    width: 40px;
                    background-color: rgb(234, 179, 208);
                    border-radius: 100%;
                    outline: whitesmoke solid;
                    padding: 0px;
                  " 
                />
                <ul class="dropdown-menu dropdown-menu-end">
                  <?php if(isset($_SESSION['id_user_global'])){ ?>
                  <li><a href="profile_guest.php" class="dropdown-item">Profil</a></li>
                  <li><a href="../login/logout.php" class="dropdown-item">logout</a></li>
                  <?php }else{ ?> 
                  <li><a href="../login/login_admin.php" class="dropdown-item">Login As Admin</a></li>
                  <li><a href="../login/login_guest.php" class="dropdown-item">Login As Guest</a></li>
                  <li><a href="../login/register.php" class="dropdown-item">Register</a></li>
                  <?php } ?>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header Tutup -->

    <!--Ini buat kalo udah Donor Darah-->
    <?php if(mysqli_num_rows($jadwal_user) > 0){
      $jadwal_donor = mysqli_query($conn, "select jd.* from jadwal_donor jd join pendaftaran_donor pd on pd.id_jadwal = jd.id_jadwal join users u on u.id_user = pd.id_user where pd.id_user = $id_user_global"); 
      
      while($result = mysqli_fetch_object($jadwal_donor)){
    ?>
    <div class="card" style="margin: 10px 50px;">
      <p class="card-header" style="font-size: 14px; background-color: #efc9c9;">Jadwal Anda</p>
      <div class="card-body">
        <p class="card-title" style="font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-heart-fill" viewBox="0 0 16 16" style="margin-right: 10px; font-size: 14px;">
          <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
        </svg><?= $result->tanggal ?></p>

        <p class="card-title" style="font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
          <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411"/>
        </svg><?= $result->lokasi ?></p>

        <p class="card-text" style="font-size: 12px;">Pastikan Anda tidur minimal 6 jam, makan makanan bergizi, dan banyak minum air putih sebelum mendonor. <br>Hindari begadang, makanan berlemak tinggi, serta konsumsi obat-obatan tertentu agar kondisi tubuh prima dan proses donor berjalan lancar.</p>
      </div>
    </div>

    <!--Ini buat kalo BELUM Donor Darah-->
    <?php }}else{?>
        <div class="card" style="margin: 10px 50px;" >
          <h5 class="card-header" style="background-color: #efc9c9;">Jadwal Anda</h5>
          <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;" >
            <h5 class="card-title" style="font-size: 18px;"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16" style="margin: 15px;">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z"/>
            </svg>Anda belum mendaftarkan diri untuk donor darah. Silakan daftar terlebih dahulu!</h5>
            <a href="daftardondar.php" class="btn-solid theme-primary" style="padding: 10px; border-radius: 10px; background-color:#b02424; color: white; text-decoration: none; margin-right: 10px; margin-left: auto; align-items: end;">Daftar Donor Darah</a>
          </div>
        </div>
        <?php } ?>
        <!-- Jadwal  Donor Darah Nih -->
    <div class="border rounded-3 overflow-auto" style="margin: 10px 50px; background-color: #f0eaea;">
        <table class="table table-striped mb-0">
        <thead style="--bs-table-bg: #efc9c9;">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Kuota</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            while($result = mysqli_fetch_object($jadwal)){
            ?>
            <tr>
            <th scope="row"><?= $count ?></th>
            <td><?= $result->tanggal ?></td>
            <td><?= $result->lokasi ?></td>
            <td><?= $result->kuota ?></td>
            </tr>
            <?php
            $count++;
            }
            ?>
        </tbody>
        </table>
    </div>
    <!-- Jadwal  Donor Darah Tutup -->
</body>
</html>