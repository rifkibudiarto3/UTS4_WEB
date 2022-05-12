<?php
    include 'other/connection.php';
    $tampil = pg_query($connection,"SELECT * FROM surat_masuk");
    $jumlah = pg_num_rows($tampil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'other/head.php'; 
    // header("refresh: 3");
    ?>
    <title>Home</title>
</head>

<body style="background-color: #ffffd188;">
        <?php include 'other/nav.php'; ?>
    <div class="container-lg mt-5">

        <?php
            if(!empty($_SESSION['message'])){
                echo $_SESSION['message'];
                $_SESSION['message']=null;
            }
        ?> 

        <h4 class="mt-5"><b>Informasi</b></h4>
        <div class="col-12 col-sm-12">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-6">
                    <div class="card border-white shadow-sm p-3 mb-4" style="border-radius: 15px;">
                        <div class="card-body"> 
                           <div class="col-12">
                               <div class="row">
                                   <div class="col-md-1">
                                    <h3><i class="bi bi-envelope-fill"></i></h3>
                                   </div>
                                   <div class="col-md-9 mt-1">
                                       <h4>Jumlah Data</h4>
                                   </div>
                                   <div class="col-md-2 mt-1">
                                    <h4> <?php echo $jumlah; ?> </h4>
                                </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-5 col-6">
                    <div class="card border-white shadow-sm p-3 mb-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <h3><i class="bi bi-person-fill"></i></h3>
                                    </div>
                                    <div class="col-md-9 mt-1">
                                        <h4>RIFKI BUDIARTO<i class="bi bi-patch-check-fill text-primary"></i></h4>
                                    </div>
                                    <div class="col-md-2 mt-1">
                                        <a href="profil.php"><h4><i class="bi bi-chevron-right text-black"></i></i></h4></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <hr>
        <div class="col-12">
        <h4 class="mt-2 mb-2"><b>Filter Berdasarkan Tanggal</b></h4>
            <form method="post" action="index.php">
                <div class="row">
                    <div class="col-md-5 col-4">
                        <label class="col-form-label">Dari :</label>
                        <input type="date" class="form-control border-white shadow-sm p-2 mb-2 mt-2" name="dari" >
                    </div>
                    <div class="col-md-5 col-4">
                        <label class="col-form-label">Sampai :</label>
                        <input type="date" name="ke" id="tgl_akhir" class="form-control border-white shadow-sm p-2 mb-2 mt-2">
                    </div>
                    <div class="col-md-1 col-2">
                        <button class="btn shadow-sm p-2 mb-2 mt-5 text-white btn-primary" type="submit" name="filter" >Filter</button>
                    </div>
                    <div class="col-md-1 col-2">
                        <button class="btn shadow-sm p-2 mb-2 mt-5 text-white btn-primary" type="submit" name="filter" ><i class="bi bi-arrow-clockwise"></i></button>
                    </div>  
                </div>
            </form> 
        </div>
        <hr>
            <h4 class="mt-2"><b>Data Surat Masuk</b></h4>
                <a href="tambah.php" class="btn p-2 mb-2 mt-2 text-white text-end btn-primary">Tambah Data</a>
                    <?php 
                        if(isset($_POST['filter'])){
                            $mulai = $_POST['dari'];
                            $akhir = $_POST['ke'];
                                if($mulai!= null || $akhir!=null){
                                $data = pg_query($connection,"SELECT * FROM surat_masuk WHERE tanggal BETWEEN '$mulai' AND '$akhir' ");
                                echo "Data Surat Masuk Dari Tanggal $mulai Sampai $akhir"; 
                                }
                                else{
                                    $data = pg_query("SELECT * FROM surat_masuk");  
                                }  
                        }else{
                            $data = pg_query("SELECT * FROM surat_masuk");      
                        }
                        while($d = pg_fetch_array($data)){
                    ?>
                        <div class="card card-block border-white shadow-sm p-1 mb-2 mt-3" style="border-radius: 5px;">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <?= $d['nomor_surat'];?>
                                        </div>
                                        <div class="col-md-3 col-3">
                                            <?= $d['tanggal'];?>
                                        </div>
                                        <div class="col-md-3 col-3">
                                            <?= $d['pengirim'];?>
                                        </div>
                                        <div class="col-md-3 col-3 text-center">
                                            <a href="proses/hapus_proses.php?id=<?= $d['id']; ?>" class="btn btn-danger shadow-sm p-1 mb-1"onclick="return confirm('Apakah Anda Yakin Menghapus Data')">Hapus</a>
                                            <a href="detail.php?id=<?= $d['id']; ?>"class="btn shadow-sm p-1 mb-1 text-white text-end btn-secondary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>     
                        </div>  
                    <?php } ?>
    </div>
        <?php include 'other/js.php'; ?>
</body>
</html>

