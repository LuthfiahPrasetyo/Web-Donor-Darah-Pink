<?php
session_start();
include '../connect.php';
include '../func.php';

if (isset($_GET['id'])) {
    $id_daftar = $_GET['id'];
    if (batal_daftar($id_daftar)) {
        echo "<script>
            alert('Pendaftaran donor berhasil dibatalkan.');
            document.location.href = 'menu_guest.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal membatalkan pendaftaran.');
            document.location.href = 'menu_guest.php';
        </script>";
    }
} else {
    header("location: menu_guest.php");
}
?>