<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <form method ="POST" action= "<?= base_url('/Auth/addusers')?>"> 
    <input type="text" name="username" placeholder="Masukkan Username">
    <input type="password" name="password" placeholder="Masukkan Password">
    <input type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda">
    <input type="text" name="nohp" placeholder="Masukkan Nomor Telepon Anda">
    <button type="submit"> Register </button>
</form>
</body>
</html>