<?php
echo "hai";
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
        <a href="landingpage.php" class="navbar-brand me-2">
          <img
            src="logo3.png"
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
                  <li><a class="dropdown-item">Sleman</a></li>
                  <li><a class="dropdown-item">Bantul</a></li>
                  <li><a class="dropdown-item">Gunungkidul</a></li>
                </ul>
              </div>
            </li>
            <!--Dropdown tanggal-->
            <li class="nav-item" style="margin-left: 2rem;">
              <input type="date" class="form-control" id="datepicker1" style="background-color: #f0eaea; color: #b02424; font-size: 15px;">
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
                  src="profil.png"
                  style="
                    width: 40px;
                    background-color: rgb(234, 179, 208);
                    border-radius: 100%;
                    outline: whitesmoke solid;
                    padding: 0px;
                  " 
                />
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="login_admin.php" class="dropdown-item">Login As Admin</a></li>
                  <li><a href="login_guest.php" class="dropdown-item">Login As Guest</a></li>
                  <li><a href="register.php" class="dropdown-item">Register</a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header Tutup -->

    <!--Ini buat kalo udah Donor Darah-->
    <div class="card" style="margin: 20px;">
      <p class="card-header" style="font-size: 14px;">Jadwal Anda</p>
      <div class="card-body">
        <p class="card-title" style="font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-heart-fill" viewBox="0 0 16 16" style="margin-right: 10px; font-size: 14px;">
          <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
        </svg>11/11/2026 (Ini diisi Tanggalnya)</p>

        <p class="card-title" style="font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
          <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411"/>
        </svg>Embung Banjarharjo, Sleman(Ini diisi Lokasinya)</p>

        <p class="card-text" style="font-size: 12px;">Pastikan Anda tidur minimal 6 jam, makan makanan bergizi, dan banyak minum air putih sebelum mendonor. <br>Hindari begadang, makanan berlemak tinggi, serta konsumsi obat-obatan tertentu agar kondisi tubuh prima dan proses donor berjalan lancar.</p>
      </div>
    </div>

    <!--Ini buat kalo BELUM Donor Darah-->
    <div class="card" style="margin: 20px;">
      <h5 class="card-header">Jadwal Anda</h5>
      <div class="card-body">
        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16" style="margin: 15px;">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z"/>
        </svg>Anda belum mendaftarkan diri untuk donor darah. Silakan daftar terlebih dahulu!</h5>
        <a href="daftardondar.php" class="btn-solid theme-primary" style="padding: 10px; border-radius: 10px; background-color: rgb(234, 179, 208); color: inherit; text-decoration: none;">Daftar Donor Darah</a>
      </div>
    </div>
</body>
</html>