<?php
    include '../other/connection.php';

    $nomor = $_POST['nomor_surat'];
    $tanggal = $_POST['tanggal'];
    $pengirim = $_POST['pengirim'];

    $query_tambah = " INSERT INTO surat_masuk(nomor_surat,tanggal,pengirim)
     VALUES ('$nomor','$tanggal','$pengirim')";
    $tambah = pg_query($connection,$query_tambah);

    if($tambah){
        $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil menambahkan Data</div>' ;
        header("location:../index.php");
    }else{
        $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal menambahkan Data</div>' ;
        header("location:../tambah.php");
    }

?>