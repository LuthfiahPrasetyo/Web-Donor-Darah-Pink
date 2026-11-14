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

    if(mysqli_num_rows($cek_username) == 1){
        if(mysqli_num_rows($cek_password) == 1){
            $id = mysqli_query($conn, "select id_user from users where username = '$username'");
            $id_fetch = mysqli_fetch_object($id);
            $_SESSION['id_user_global'] = $id_fetch->id_user; 
            $_SESSION['last_activity'] = time();
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

function reset_password($data){
    global $conn;
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $cek_usn = mysqli_query($conn, "select username from users where username = '$username'");
    
    if(mysqli_num_rows($cek_usn) == 1){
        $query_email = mysqli_query($conn, "select email from users where username = '$username'");
        $email_db = mysqli_fetch_object($query_email);
        if($email_db->email == $email){
            if($password != $confirm_password){
                echo "<script>
                        alert('Konfirmasi password tidak sesuai!!');   
                    </script>";
                    return false;
            }else{
                mysqli_query($conn, "update users set password = '$password' where username = '$username'");
                return true;
            }
        }else{
            echo "<script>
                    alert('Email salah!!');
                </script>";
                return false;
        }
    }else{
        echo "<script>
                alert('username tidak ditemukan!!');
            </script>";
    }
}