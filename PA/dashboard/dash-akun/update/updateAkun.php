<?php
require '../../../function/function.php';
$id_akun = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM register WHERE id = '$id_akun'");

$register = [];

while ($row = mysqli_fetch_assoc($result)) {
    $register[] = $row;
}

$register = $register[0];


if (isset($_POST['updateAkun'])) {
    $nama1 = $_POST['first_Name'];
    $nama2 = $_POST['last_Name'];
    $tl = $_POST['tanggal_lahir'];
    $usn = $_POST['username'];
    $pw = $_POST['password'];
    $email = $_POST['email'];

    $result = mysqli_query($conn, "UPDATE register SET first_Name = '$nama1', last_Name = '$nama2', tanggal_lahir = '$tl', username = '$usn', password = '$pw', email = '$email' WHERE id = '$id_akun'");

    if($result > 0){
        echo "
        <script>  
            alert('Akun Berhasil Diubah');
            document.location.href = '../dash_akun.php';
        </script>";
    } else {
        echo "
        <script> 
            alert('Akun Gagal Diubah');
            document.location.href = 'updateAkun.php';
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
    <title>Update Akun</title>
</head>

<body>
    <div class="cardHeader">
        <h2>Recent Request</h2>
        <a href="#" class="btn">view all</a>
    </div>
    <form action="" method="post">
    <table>
        <thead>
            <tr>
                <label for="first_Name">First Name</label>
                <input type="text" name="first_Name" value="<?= $register['first_Name'] ?>">
            </tr>
            <tr>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_Name" value="<?= $register['last_Name'] ?>">
            </tr>
            <tr>
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="<?= $register['tanggal_lahir'] ?>">
            </tr>
            <tr>
                <label for="username">Username</label>
                <input type="text" name="username" value="<?= $register['username'] ?>">
            </tr>
            </tr>
            <tr>
                <label for="password">Password Baru</label>
                <input type="password" name="password" value="<?= $register['password'] ?>">
            </tr>
            <tr>
                <label for="Email">Email</label>
                <input type="email" name="email" value="<?= $register['email'] ?>">
                
            </tr>
            <input type="submit" name='updateAkun' value='Update Akun'>
        </thead>
        </form>
</body>

</html>