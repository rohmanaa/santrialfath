<?php

include "config.php";

if (isset($_POST['absen'])) {
    $id = $_POST['id_karyawan'];
    $tglnow = date("Y-m-d");
    $cek = mysqli_num_rows(
        mysqli_query(
            $conn,
            "SELECT * FROM presensi WHERE tgl='$tglnow' AND id_karyawan='$id'"
        )
    );

    if ($cek > 0) {
        session_start();
        $_SESSION['toast_warning'] = 'Warning';

        echo <<<HTML
            <script language='javascript'>
            window.location='../kehadiranku.php';
            </script>
        HTML;
    } else {
        $id = $_POST['id_karyawan'];
        $khd = $_POST['id_khd'];
        $tg = $_POST['tgl'];
        $jm = $_POST['jam_msk'];
        $jk = $_POST['jam_klr'];
        $ket = $_POST['ket'];
        $stts = $_POST['id_status'];

        $input = mysqli_query(
            $conn,
            "INSERT INTO presensi (id_karyawan, id_khd, tgl, jam_msk, jam_klr, ket, id_status)
            VALUES('$id', '$khd', '$tg', '$jm', '$jk', '$ket','$stts')"
        );

        if ($input) {
            session_start();
            $_SESSION['toast_success'] = 'Success';

            echo <<<HTML
                <script language='javascript'>
                window.location='../kehadiranku.php';
                </script>
            HTML;
        } else {
            session_start();
            $_SESSION['toast_error'] = 'Error';

            echo <<<HTML
                <script language='javascript'>
                window.location='../kehadiranku.php';
                </script>
            HTML;
        }
    }
} 
?>
