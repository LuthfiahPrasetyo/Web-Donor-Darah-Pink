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
    $cek_password = mysqli_query($conn, "select password from users where password = '$password'");

    if(mysqli_num_rows($cek_username) == 1){
        if(mysqli_num_rows($cek_password) == 1){
            return true;
        }else{
            echo "<script>
                    alert('Password salah!!');
                </script>";
                return false;
        }
    }else{
        echo "<script>
                alert('username salah/belum terdaftar');
            </script>";
            return false;
    }
}
