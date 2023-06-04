<?php
    $koneksi = mysqli_connect("localhost","root","","mahasiswauns");

    if (mysqli_connect_error()) {
        echo "koneksi peset".mysqli_connect();
    }
