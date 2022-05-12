<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'other/head.php'; ?>
    <title>Tambah Data</title>
</head>
<body style="background-color: #ffffd188;">
    <?php include 'other/nav.php'; ?>       
        <div class="container mt-5">
            <div class="card border-white shadow-sm p-3 mb-4" style="border-radius: 15px;">
                <form method="post" action="proses/tambah_proses.php" >
                    <div class="card-body" style="margin:auto;" >
                        <h3 class="text-center"><b>Tambah Data</b></h3>
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat"  name="nomor_surat" placeholder="masukan nomor surat" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="masukan tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="masukan pengirim" required>
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