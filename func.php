<?php
include 'connect.php';

function regist($data)
{
    global $conn;

    $usn = strtolower(stripslashes($data['username']));
    $pass = mysqli_real_escape_string($conn, $data['password']);
    $pass2 = mysqli_real_escape_string($conn, $data['password2']);
    $email = mysqli_real_escape_string($conn, $data['email']);

    if ($pass != $pass2) {
        echo "<script>
        alert('password konfirmasi tidak sama, ulangi!!');</script>";
        return false;
    }

    $cek_usn = mysqli_query($conn, "select username from users where username = '$usn'");
    if (mysqli_fetch_object($cek_usn)) {
        echo "<script>
        alert('Username sudah terdaftar, coba yang lain!!');</script>";
        return false;
    }

    $insert = "INSERT INTO users (username, password, email) VALUES ('$usn', '$pass', '$email')";
    mysqli_query($conn, $insert);

    return true;
}

function login($data)
{
    global $conn;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek_username = mysqli_query($conn, "select username from users where username = '$username'");
    $cek_password = mysqli_query($conn, "select password from users where username = '$username'");

    if (mysqli_num_rows($cek_username) == 1) {
        if (mysqli_num_rows($cek_password) == 1) {
            $id = mysqli_query($conn, "select id_user from users where username = '$username'");
            $id_fetch = mysqli_fetch_object($id);
            $_SESSION['id_user_global'] = $id_fetch->id_user;
            $_SESSION['last_activity'] = time();
            return true;
        } else {
            echo "<script>
                    alert('Password salah!!');
                </script>";
            return false;
        }
    } else {
        echo "<script>
                alert('username salah/belum terdaftar');
            </script>";
        return false;
    }
}

function reset_password($data)
{
    global $conn;
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $cek_usn = mysqli_query($conn, "select username from users where username = '$username'");

    if (mysqli_num_rows($cek_usn) == 1) {
        $query_email = mysqli_query($conn, "select email from users where username = '$username'");
        $email_db = mysqli_fetch_object($query_email);
        if ($email_db->email == $email) {
            if ($password != $confirm_password) {
                echo "<script>
                        alert('Konfirmasi password tidak sesuai!!');   
                    </script>";
                return false;
            } else {
                mysqli_query($conn, "update users set password = '$password' where username = '$username'");
                return true;
            }
        } else {
            echo "<script>
                    alert('Email salah!!');
                </script>";
            return false;
        }
    } else {
        echo "<script>
                alert('username tidak ditemukan!!');
            </script>";
    }
}

function edit_profile($data)
{
    global $conn;

    $id_user = $_SESSION['id_user_global'];

    $nama           = mysqli_real_escape_string($conn, $data['nama']);
    $email          = mysqli_real_escape_string($conn, $data['email']);
    $nomor          = mysqli_real_escape_string($conn, $data['nomor']);
    $usia           = mysqli_real_escape_string($conn, $data['usia']);
    $bb             = mysqli_real_escape_string($conn, $data['bb']);
    $tb             = mysqli_real_escape_string($conn, $data['tb']);
    $jenis_kelamin  = mysqli_real_escape_string($conn, $data['jenis_kelamin']);
    $golongan_darah = mysqli_real_escape_string($conn, $data['golongan_darah']);

    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    if ($error === 0) {
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiFile  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (!in_array($ekstensiFile, $ekstensiValid)) {
            echo "<script>alert('Format file tidak didukung! Gunakan JPG, JPEG, PNG, atau WEBP.');</script>";
            return false;
        }

        if ($ukuranFile > 2097152) {
            echo "<script>alert('Ukuran foto terlalu besar! Maksimal 2MB.');</script>";
            return false;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $folderTujuan = '../assets/profiles/';

        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        if (move_uploaded_file($tmpName, $folderTujuan . $namaFileBaru)) {
            $pathFoto = $folderTujuan . $namaFileBaru;

            $queryLama = mysqli_query($conn, "SELECT foto_profil FROM users WHERE id_user = $id_user");
            $dataLama = mysqli_fetch_object($queryLama);
            if (!empty($dataLama->foto_profil) && file_exists($dataLama->foto_profil)) {
                unlink($dataLama->foto_profil);
            }

            $query = "UPDATE users SET 
                        nama = '$nama', 
                        email = '$email', 
                        nomor = '$nomor', 
                        usia = '$usia', 
                        bb = '$bb', 
                        tb = '$tb', 
                        jenis_kelamin = '$jenis_kelamin', 
                        golongan_darah = '$golongan_darah', 
                        foto_profil = '$pathFoto'
                      WHERE id_user = $id_user";
        } else {
            echo "<script>alert('Gagal mengunggah foto ke server!');</script>";
            return false;
        }
    } else {
        $query = "UPDATE users SET 
                    nama = '$nama', 
                    email = '$email', 
                    nomor = '$nomor', 
                    usia = '$usia', 
                    bb = '$bb', 
                    tb = '$tb', 
                    jenis_kelamin = '$jenis_kelamin', 
                    golongan_darah = '$golongan_darah'
                  WHERE id_user = $id_user";
    }

    mysqli_query($conn, $query);

    return true;
}

function daftar($data)
{
    global $conn;

    $id_user        = $_SESSION['id_user_global'];
    $nama           = mysqli_real_escape_string($conn, $data['nama']);
    $usia           = mysqli_real_escape_string($conn, $data['usia']);
    $berat_badan    = mysqli_real_escape_string($conn, $data['bb']);
    $tinggi_badan   = mysqli_real_escape_string($conn, $data['tb']);
    $golongan_darah = mysqli_real_escape_string($conn, $data['golongan_darah']);
    $id_jadwal      = mysqli_real_escape_string($conn, $data['id_jadwal']);
    
    $terakhir_donor = !empty($data['terakhir_donor']) ? "'" . mysqli_real_escape_string($conn, $data['terakhir_donor']) . "'" : "NULL";

    $cek_kuota = mysqli_query($conn, "SELECT kuota FROM jadwal_donor WHERE id_jadwal = $id_jadwal");
    $data_jadwal = mysqli_fetch_object($cek_kuota);

    if ($data_jadwal->kuota <= 0) {
        echo "<script>alert('Maaf, kuota untuk jadwal ini sudah habis!');</script>";
        return false;
    }

    $query_daftar = "INSERT INTO pendaftaran_donor (id_user, id_jadwal, nama, usia, berat_badan, tinggi_badan, terakhir_donor, golongan_darah, status_pendaftaran) 
                     VALUES ($id_user, $id_jadwal, '$nama', $usia, $berat_badan, $tinggi_badan, $terakhir_donor, '$golongan_darah', 'terdaftar')";
    
    if (mysqli_query($conn, $query_daftar)) {
        mysqli_query($conn, "UPDATE jadwal_donor SET kuota = kuota - 1 WHERE id_jadwal = $id_jadwal");
        return true;
    } else {
        return false;
    }
}

function batal_daftar($id_daftar)
{
    global $conn;
    
    // Ambil id_jadwal terlebih dahulu sebelum data dihapus untuk mengembalikan kuota
    $query_cek = mysqli_query($conn, "SELECT id_jadwal FROM pendaftaran_donor WHERE id_daftar = $id_daftar");
    if ($row = mysqli_fetch_object($query_cek)) {
        $id_jadwal = $row->id_jadwal;
        
        // Hapus data pendaftaran
        $query_hapus = mysqli_query($conn, "DELETE FROM pendaftaran_donor WHERE id_daftar = $id_daftar");
        
        if ($query_hapus) {
            // Kembalikan/tambah kuota jadwal sebanyak 1
            mysqli_query($conn, "UPDATE jadwal_donor SET kuota = kuota + 1 WHERE id_jadwal = $id_jadwal");
            return true;
        }
    }
    return false;
}

//admin
function tambah_jadwal($data)
{
    global $conn;

    $tanggal       = mysqli_real_escape_string($conn, $data['tanggal']);
    $lokasi        = mysqli_real_escape_string($conn, $data['lokasi']);
    $penyelenggara = mysqli_real_escape_string($conn, $data['penyelenggara']);
    $kuota         = mysqli_real_escape_string($conn, $data['kuota']);

    $query = "INSERT INTO jadwal_donor (tanggal, lokasi, penyelenggara, kuota) VALUES ('$tanggal', '$lokasi', '$penyelenggara', '$kuota')";
    mysqli_query($conn, $query);

    return true;
}

function edit_jadwal($data)
{
    global $conn;

    $id_jadwal     = mysqli_real_escape_string($conn, $data['id_jadwal']);
    $tanggal       = mysqli_real_escape_string($conn, $data['tanggal']);
    $lokasi        = mysqli_real_escape_string($conn, $data['lokasi']);
    $penyelenggara = mysqli_real_escape_string($conn, $data['penyelenggara']);
    $kuota         = mysqli_real_escape_string($conn, $data['kuota']);

    $query = "UPDATE jadwal_donor SET 
                tanggal = '$tanggal', 
                lokasi = '$lokasi', 
                penyelenggara = '$penyelenggara', 
                kuota = '$kuota' 
              WHERE id_jadwal = $id_jadwal";
    mysqli_query($conn, $query);

    return true;
}

function hapus_jadwal($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jadwal_donor WHERE id_jadwal = $id");
    return true;
}

function login_admin($data)
{
    global $conn;

    $username = mysqli_real_escape_string($conn, $data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $cek_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($cek_admin) == 1) {
        $row = mysqli_fetch_object($cek_admin);
        if ($password == $row->password) {
            $_SESSION['id_admin_global'] = $row->id_admin;
            $_SESSION['last_activity'] = time();
            return true;
        } else {
            echo "<script>alert('Password salah!!');</script>";
            return false;
        }
    } else {
        echo "<script>alert('Username salah atau tidak terdaftar sebagai admin!');</script>";
        return false;
    }
}

function edit_profile_admin($data)
{
    global $conn;

    $id_admin = $_SESSION['id_admin_global'];
    $nama     = mysqli_real_escape_string($conn, $data['nama']);

    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    if ($error === 0) {
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];
        $ekstensiFile  = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (!in_array($ekstensiFile, $ekstensiValid)) {
            echo "<script>alert('Format file tidak didukung! Gunakan JPG, JPEG, PNG, atau WEBP.');</script>";
            return false;
        }

        if ($ukuranFile > 2097152) {
            echo "<script>alert('Ukuran foto terlalu besar! Maksimal 2MB.');</script>";
            return false;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $folderTujuan = '../assets/profiles/';

        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        if (move_uploaded_file($tmpName, $folderTujuan . $namaFileBaru)) {
            $pathFoto = $folderTujuan . $namaFileBaru;

            $queryLama = mysqli_query($conn, "SELECT foto_profil FROM admin WHERE id_admin = $id_admin");
            $dataLama = mysqli_fetch_object($queryLama);
            if (!empty($dataLama->foto_profil) && file_exists($dataLama->foto_profil)) {
                unlink($dataLama->foto_profil);
            }

            $query = "UPDATE admin SET nama = '$nama', foto_profil = '$pathFoto' WHERE id_admin = $id_admin";
        } else {
            echo "<script>alert('Gagal mengunggah foto ke server!');</script>";
            return false;
        }
    } else {
        $query = "UPDATE admin SET nama = '$nama' WHERE id_admin = $id_admin";
    }

    mysqli_query($conn, $query);
    return true;
}