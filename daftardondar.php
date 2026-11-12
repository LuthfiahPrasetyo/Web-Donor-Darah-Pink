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
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" placeholder="Masukkan nomor HP">
                            </div>
                            <div type="number" class="mb-3">
                                <label for="usia" class="form-label">Usia</label>
                                <input type="number" class="form-control" id="usia" placeholder="Masukkan usia">
                            </div>
                            <div type="number" class="mb-3">
                                <label for="berat" class="form-label">Berat Badan (kg)</label>
                                <input type="number" class="form-control" id="berat" placeholder="Masukkan berat badan">
                            </div>
                            <div type="number" class="mb-3">
                                <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" class="form-control" id="tinggi" placeholder="Masukkan tinggi badan">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Pernah Donor?</label>
                                <select class="form-select" id="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <!--kalau pernah donor, muncul pertanyaan ini-->
                            <div type="number" class="mb-3">
                                <label for="terakhir_donor" class="form-label">Sudah berapa bulan sejak donor terakhir?(bulan)</label>
                                <input type="number" class="form-control" id="terakhir_donor" placeholder="Masukkan jumlah bulan">
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                <select class="form-select" id="golongan_darah">
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Daftar Donor Darah</label>
                                <select class="form-select" id="jenis_kelamin">
                                    <option value="">Pilih Waktu dan Tempat Donor</option>
                                    <option value="Sleman">Sleman</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #b02424; border-color: #b02424;">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>