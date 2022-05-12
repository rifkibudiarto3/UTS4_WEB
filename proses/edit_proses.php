<?php

    include('../other/connection.php');
        $id = $_POST['id'];
        $nomor = $_POST['nomor'];
        $tanggal = $_POST['tanggal'];
        $pengirim = $_POST['pengirim']; 

        $query_edit = "UPDATE surat_masuk SET nomor_surat='$nomor', tanggal='$tanggal', pengirim='$pengirim' WHERE id = '$id' ";
        $edit = pg_query($connection,$query_edit);

        if($edit){
            $_SESSION['message'] = '<div class= "alert alert-success" role="alert">Berhasil Update Data</div>';
            header("location:../index.php");
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Update Data </div>';
            header("location:../index.php?id=$id");
        }
?>