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
    <h1>Kamar yang tersedia di HotelHen :</h1>
    <?php foreach ($data as $key => $kamar): ?>
   <div class="container">
     <div class="card mb-3">
  <img src="<?=$kamar['Info_kamar']->img_room?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$kamar['Info_kamar']->Nama_room?> - Harga : RP
    <?=$kamar['Info_kamar']->harga?></h5>
    <p class="card-text">
      fasilitas:
    </p>
    <p>
      <ul>
      <?php if (!empty($kamar['F_kamar'])): ?>
        <?php foreach ($kamar['F_kamar'] as $key2 => $F): ?>
          <li>
            <?=$F->nama_fasilitas?>
          </li>
          <?php endforeach; ?>
          <?php endif; ?>
        </ul>     
    </p>

    <a href="<?=base_url('/Tamu/detailkamar'). '?id='.$kamar['Info_kamar']->id ?>" 
    class="btn btn-primary">Lihat Detail
  </a>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
    <?php endforeach ?>
     
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>