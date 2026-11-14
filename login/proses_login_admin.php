<?php
include '../connect.php';
$username = $_POST['username'];
$password = $_POST['password'];

$cek_username = $conn->query("select * from users where username = '$username'");
$cek_password = $conn->query("select * from users where password = '$password'");

if($cek_username && $cek_password ){
    echo "ada";
}elseif($cek_password != 1){
    echo "password salah";
}elseif($cek_username != 1){
    echo "Salah username";
}else{
    echo "username dan password tidak ditemukan";
}