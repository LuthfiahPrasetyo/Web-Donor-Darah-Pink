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
        <a href="menu_admin.php" class="navbar-brand me-2">
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
            <a href="daftardondar.php" class="btn-solid theme-primary" style="padding: 10px; border-radius: 10px; background-color: #f0eaea; color: inherit; color: #b02424; text-decoration: none; margin-right: 10px;">Daftar Donor Darah</a>
              <div class="dropdown">
                <img
                  class="btn dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  src="profil.png"
                  style="
                    width: 50px;
                    background-color: #b02424;
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
    <!-- Jadwal  Donor Darah Nih -->
    <div class="border rounded-3 overflow-auto" style="margin: 10px 50px; background-color: #f0eaea; height: 100px;">
        <table class="table table-striped mb-0">
        <thead style="--bs-table-bg: #efc9c9; text-align: justify;">
            <tr>
            <th scope="col" style="width: 10%;">No</th>
            <th scope="col" style="width: 25%;">Tanggal</th>
            <th scope="col" style="width: 45%;">Lokasi</th>
            <th scope="col" style="width: 20%;">Edit/Hapus</th>
            </tr>
        </thead>
        <tbody>
            <tr>       
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <button class="btn btn-primary">Edit</button> <button class="btn btn-danger" style="margin-left: 5px;">Hapus</button>
            </td>       
            </tr>
        </tbody>
        </table>
    </div>
    <!-- Jadwal  Donor Darah Tutup -->

</body>
</html>