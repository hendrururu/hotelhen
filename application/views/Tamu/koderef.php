<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Kamar Hotel</title>
  </head>
  <body>
    <h1><?=$_SESSION['user']->nama ?></h1>
   <div class="container">
     <div class="card mb-3">
  <img src="" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">List Bookinganmu</h5>
    <p class="card-text">
      Kode Booking Anda : 
    </p>
    <p>
        <div class="row">
            <?php foreach($data['booklah'] as $key => $item ) : ?>
            <div class="col-md-4 mb-2">
                 <div class="card">
                <img src="img" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$item->Nama_room?> x <?=$item->jml_kamar ?> Kamar</h5>
                    <p>Nama tamu = <?=$item->nama_tamu?></p>
                    <p>Tanggal Check-In = <?=$item->tgl_cekin?></p>
                    <p>Tanggal Check-out = <?=$item->tgl_cekout?></p>
                    <p>Metode Pembayaran = <?=$item->PayBay?></p>
                    <p>
                      <?php if ($item->PayEND!=1)
                      {$pesan= 'Pembayaran Belum Selesai';}
                      else {$pesan= 'Pembayaran Telah Selesai';}
                      echo $pesan;
                      ?>

                    </p>
                    <p>
                      <strong> 
                        ID Pemesanan Anda : <?=$item->RefPB?>
                      </strong>
                    </p>
                </div>      
            </div>
        </div>  
        <?php endforeach ?>
    </div>    
    </p>

    <!-- <a href="<?=base_url('/Tamu/booking'). '?id='.$kamar['Info_kamar']->id ?>" 
    class="btn btn-primary">Pesan Sekarang
  </a> -->
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
     
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>