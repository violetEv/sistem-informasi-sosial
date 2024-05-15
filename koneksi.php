<?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "manajemen_sosial";
            $koneksi = mysqli_connect($host, $username, $password, $database);
            if (!$koneksi) {
                die("<script>alert('Gagal tersambung dengan database.')</script>");
            }
?>