<?php
    // Koneksi DB
    $server = "localhost";
    $user   = "root";
    $pass   = "";
    $database = "car_showroom";
    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    // Klik simpan
    if(isset($_POST['bsimpan'])){

      //Pengujian Apakah data akan diedit atau disimpan baru
      if($_GET['hal'] == "edit")
      {
        //Data akan diedit
        $edit = mysqli_query($koneksi, "UPDATE cardb set
											 	PlatNomor = '$_POST[tPlatNomor]',
											 	TipeMobil = '$_POST[tTipeMobil]',
												NamaCustomer = '$_POST[tNamaCustomer]',
											 	HargaMobil = '$_POST[tHargaMobil]'
											 WHERE id = '$_GET[id]'
										   ");

                       
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Berhasil Mengedit Data!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Gagal Mengedit Data!');
						document.location='index.php';
				     </script>";
			}
      }
      else{
        //Data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO cardb (PlatNomor , TipeMobil, NamaCustomer, HargaMobil) VALUES ('$_POST[tPlatNomor]', '$_POST[tTipeMobil]', '$_POST[tNamaCustomer]', '$_POST[tHargaMobil]')");
    
        if($simpan) //jika simpan sukses
        {
          echo "<script>
              alert('Berhasil Menyimpan Data!');
              document.location='index.php';
               </script>";
        }
        else
        {
          echo "<script>
              alert('Gagal Menyimpan Data!');
              document.location='index.php';
               </script>";
        }
      }
     
    }

 //Pengujian jika tombol Edit / Hapus di klik
 if(isset($_GET['hal']))
 {
   //Pengujian jika edit Data
   if($_GET['hal'] == "edit")
   {
     //Tampilkan Data yang akan diedit
     $tampil = mysqli_query($koneksi, "SELECT * FROM cardb WHERE id = '$_GET[id]' ");
     $data = mysqli_fetch_array($tampil);
     if($data)
     {
       //Jika data ditemukan, maka data ditampung ke dalam variabel
       $vPlatNomor = $data['PlatNomor'];
       $vTipeMobil = $data['TipeMobil'];
       $vNamaCustomer = $data['NamaCustomer'];
       $vHargaMobil = $data['HargaMobil'];
     }
   }
   else if ($_GET['hal'] == "hapus")
   {
     //Persiapan hapus data
     $hapus = mysqli_query($koneksi, "DELETE FROM cardb WHERE id = '$_GET[id]' ");
     if($hapus){
       echo "<script>
           alert('Berhasil Menghapus Data!');
           document.location='index.php';
            </script>";
     }
   }
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project DB</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

<!-- Awal card form -->
<div class="card">
  <div class="card-header bg-primary text-white">
    Form Input Data Penjualan
  </div>
  <div class="card-body">
    <form action="" method="post">
        
    <div class="form-group">
	    <label>Plat Nomor</label>
	    <input type="text" name="tPlatNomor" value="<?=@$vPlatNomor?>"  class="form-control" required>
	</div>

    <div class="form-group">
	    <label>Tipe Mobil</label>
	    <input type="text" name="tTipeMobil" value="<?=@$vTipeMobil?>" class="form-control" required>
	</div>

    <div class="form-group">
	    <label>Nama Customer</label>
	    <input type="text" name="tNamaCustomer" value="<?=@$vNamaCustomer?>" class="form-control" required>
	</div>

    <div class="form-group">
	    <label>Harga Mobil</label>
	    <input type="text" name="tHargaMobil" value="<?=@$vHargaMobil?>" class="form-control" required>
	</div>

        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
        <button type="reset" class="btn btn-danger" name="breset">Reset</button>
    
    </form>
  </div>
</div>
<!-- Akhir card form -->

<!-- Awal card tabel -->
<div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Data Penjualan
  </div>
  <div class="card-body">
  <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Plat Nomor</th>
            <th>Tipe Mobil</th>
            <th>Nama Customer</th>
            <th>Harga Mobil</th>
        </tr>

        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM cardb  ORDER BY id desc");
            while($data = mysqli_fetch_array($tampil)) :
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['PlatNomor']?></td>
            <td><?=$data['TipeMobil']?></td>
            <td><?=$data['NamaCustomer']?></td>
            <td><?=$data['HargaMobil']?></td>

            <td>
              <a href="index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning">Edit</a>
              <a href="index.php?hal=hapus&id=<?=$data['id']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
            </td>
        </tr>
        <?php endwhile;  
        ?>

   </table>
  </div>
</div>
<!-- Akhir card tabel -->

</div>

<script type="text/javacript" src="js/bootstrap.min.js"></script>
</body>
</html>