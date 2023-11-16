<?php
require '../../../function/function.php';

if(isset($_POST["register"])){
    if(register($_POST) > 0){
        echo "
        <script>  
            alert('Akun Berhasil Dibuat');
            document.location.href = '../dash_akun.php';
        </script>";
    } else {
        echo "
        <script> 
            alert('Akun Gagal Dibuat');
            document.location.href = 'addAkun.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Akun</title>
</head>
<body>
    <div class="create-akun">
        <h1>Create Account</h1>
    </div>
    <form action="" method="post">
        <label for="first_Name">First Name</label>
        <input type="text" name = 'first_Name'>

        <label for="last_Name">Last Name</label>
        <input type="text" name = 'last_Name'>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name = 'tanggal_lahir'>

        <label for="username">Username</label>
        <input type="text" name = 'username'>

        <label for="password">Password</label>
        <input type="password" name = 'password'>

        <label for="password2">Konfirmasi Password</label>
        <input type="password" name='password2'>

        <label for="email">Email</label>
        <input type="email" name = 'email'>

        <button type="submit" name="register">Submit</button>
    </form>
</body>
</html>