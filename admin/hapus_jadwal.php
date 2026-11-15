<?php
session_start();
include '../connect.php';
include '../func.php';

$id = $_GET['id'];

if (hapus_jadwal($id)) {
    echo "<script>
        alert('Jadwal berhasil dihapus!');
        document.location.href = 'menu_admin.php';
    </script>";
}
?>