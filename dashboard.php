<?php

// Menampilkan header
include "templates/index.html";

// Melakukan re-direct jika bukan admin
if (!isset($_SESSION['user'])||$checkRole!=1) {
    header("location:login.php")l;
}

?>
