
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Booking Page</title>
  </head>
  <body>
    <h1>Halaman Booking</h1>
    <div class="container">
        <form method="POST" action="<?=base_url('Tamu/gobook') ?>" >

        <div class="row"> 
          <div class="col-md-12">
        <div class="row">
        <div class="col-md-4"><p class="mb-1">tgl_cekin</p>
        <input class="form-control" type="date" name="tgl_cekin" placeholder="tgl_cekin" required="" ></div>
          <div class="col-md-4"><p class="mb-1">tgl_cekout</p>
        <input class="form-control" type="date" name="tgl_cekout" placeholder="tgl_cekout" required=""></div>
          <div class="col-md-4"><p class="mb-1">jml_kamar</p>
        <input class="form-control" type="number" name="jml_kamar" placeholder="jml_kamar" required=""></div>
        </div>    
        </div>
          <div class="col-md-12"> 
         <p class="mt-3">nama_pemesan</p>
        <input class="form-control" type="text" name="nama_pemesan" placeholder="nama_pemesan" 
        value="<?=$data['user']->nama;?>" readonly >
        <p class="mt-3">email</p>
        <input class="form-control" type="email" name="email" placeholder="email" required="">
        <p class="mt-3">no_hp</p>
        <input class="form-control" type="number" name="no_hp" placeholder="no_hp" required="">
        <p class="mt-3">nama_tamu</p>
        <input class="form-control" type="text" name="nama_tamu" placeholder="nama_tamu" required="">
        <input class="form-control" type="hidden" name="id_kamar" placeholder="Tipe Kamar">

        <p class="mt-3">Pilih Tipe Kamars</p>
        <select class="form-select" name="id_kamar">
        <option value="<?=$data['Byid'][0]->id?>" selected> <?=$data['Byid'][0]->Nama_room?> </option>
            <?php foreach($data['alltipe'] as $key => $item):?>
              
              <option value="<?=$item->id?>"><?=$item->Nama_room?> </option>
            <?php endforeach; ?>
            
        </select>


       <hr> <p class="mt-3">PayBay</p>
        <select class="form-select" name="PayBay">
            <option>Bayar Di Tempat</option>
            <option>Transfer Bank</option>
        </select>
          </div>
        </div>




       
      <hr><button type="submit" > Kirim </button>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>