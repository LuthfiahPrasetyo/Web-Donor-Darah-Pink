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
    <!-- Card Login Guest -->
    <div class="container mt-5" style="background-color: #f0eaea; padding: 20px; border-radius: 10px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #efc9c9; text-align: center; font-size: 20px; color: #b02424; font-weight: bold;">
                        <h3>Login Guest</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                            <!-- pokoknya di sini ada tombol login, kalo udh login langsung mengarah ke halaman menu guest -->
                            <button type="submit" class="btn btn-primary" style="background-color: #b02424; border-color: #b02424; margin-top: 10px;">Login</button>

                            <div class="form-text" display="block" style="margin-top: 10px;">Forgot your password? Click <a href="forgot_pw.php" style="color: #b02424;">here</a> to reset it.</div>

                            <div class="form-text" display="block" style="margin-top: 10px;"> If you didn't have an account, click <a href="register.php" style="margin-top: 10px; color: #b02424;">here</a> to register.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>