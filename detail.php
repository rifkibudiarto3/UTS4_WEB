<?php
    include 'other/connection.php';
    $query = "SELECT * from surat_masuk where id = '$_GET[id]'";
    $tampil = pg_query($connection,$query);
    while($data = pg_fetch_array($tampil)){
        $id = $data['id'];
        $nomor_surat = $data['nomor_surat'];
        $tanggal = $data['tanggal'];
        $pengirim = $data['pengirim'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'other/head.php'; ?>
    <title>Detail</title>
</head>
<body style="background-color: red;">
    <?php include 'other/nav.php'; ?>
        <div class="container mt-5">
            <div class="card border-white shadow-sm p-3 mb-4" style="border-radius: 15px;">
                <div class="card-body">
                <h2 class="text-center">Detail Data</h2>
                    <h5 class="text-white text-hidden"> <?php echo $id; ?> </h5>
                    <h5>Nomor Surat :  <?php echo $nomor_surat; ?> </h5>
                    <h5>Tanggal : <?php echo $tanggal; ?> </h5>
                    <h5>Pengirim : <?php echo $pengirim; ?>  </h5>
                    <button type="button" class="btn btn-danger mt-3" onclick="history.back()">Kembali</button>
                    <a href="edit.php?id=<?php echo $id; ?>" class="btn text-white mt-3" style="background-color: red;">EDIT</a>
                </div>
            </div>
        </div>  
    <?php include 'other/js.php'; ?>                        
</body>
</html>

                    

