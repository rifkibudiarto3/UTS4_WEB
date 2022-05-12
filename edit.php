<?php
    include('other/connection.php');
    $query = pg_query($connection, "SELECT * FROM surat_masuk WHERE id=".$_GET['id']);
    while($row = pg_fetch_array($query)){
        $id = $row['id'];
        $nomor_surat = $row['nomor_surat'];
        $tanggal = $row['tanggal'];
        $pengirim = $row['pengirim'];
}
?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'other/head.php'; ?>
    <title>Edit</title>

<body style="background-color: #ffffd188;">
    <?php include 'other/nav.php'; ?>
    <div class="container mt-5">
    
            <div class="card border-white shadow-sm p-3 mb-4" style="border-radius: 15px;">
                <form method="post" action="proses/edit_proses.php" >
                    <div class="card-body " style="margin:auto;" >
                        <h3 class="text-center"><b>Edit Data</b></h3>
                    <div class="form-group">
                    <label for="nomor">Nomor Surat</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                        <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $nomor_surat; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?> "required>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo $pengirim;?>" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger mt-3" onclick="history.back()">Batal</button>
                        <input  type="submit" name="submit" class="btn mt-3 text-white" value="SIMPAN" style="background-color: #ff9a1a;" onclick="return confirm('Simpan Data ?')">
                    </div>
                    </div>
                </form>
            </div>  
        </div>
    <?php include 'other/js.php'; ?>
</body>
</html>