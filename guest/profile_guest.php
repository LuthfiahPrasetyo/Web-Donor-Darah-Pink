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
                    width: 50px;
                    background-color: #b02424;
                    border-radius: 100%;
                    outline: whitesmoke solid;
                    padding: 0px;
                  " 
                />
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="../login/login_admin.php" class="dropdown-item">Login As Admin</a></li>
                  <li><a href="../login/login_guest.php" class="dropdown-item">Login As Guest</a></li>
                  <li><a href="../login/register.php" class="dropdown-item">Register</a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header Tutup -->
    <!-- Card Profile Guest -->
    <div class="card" style="margin: 10px 250px;">
      <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <img src="../assets/profil.png" alt="Profile Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 20px; background-color: #b02424; border-radius: 100%; outline: whitesmoke solid; padding: 0px;">
        <div class="border rounded-3 overflow-auto" style="margin: 10px 50px; background-color: #f0eaea; width: 100%; max-height: 400px; padding: 20px;">
          <table class="table table-borderless mb-0" style="font-size: 14px; color: #b02424; width: 100%;">
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Nama</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Email</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Nomor Telepon</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Usia</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Berat Badan</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Tinggi Badan</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Jenis Kelamin</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
            <tr>
            <td style="width: 30%; background-color: #f0eaea;">Golongan Darah</td>
            <td style="width: 10%; background-color: #f0eaea;">:</td>
            <td style="width: 60%; background-color: #f0eaea;">Otto</td>
            </tr>
 
            </table>
        </div>
      </div>
    </div>
</body>
</html>