<?php
require '../../../function/function.php';

if (isset($_POST['addSkin'])) {
    $nama = htmlspecialchars($_POST['nama_senjata']);
    $jenis = htmlspecialchars($_POST['jenis_senjata']);
    $harga = htmlspecialchars($_POST['harga_senjata']);
    $rilis = htmlspecialchars($_POST['tanggal_rilis']);
    
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.',$gambar);
    $ekstensi = strtolower(end($x));
    $nama_gambar = strtolower(($x[0]));
    $gambar_baru = "$nama_gambar.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];
    $checktipe_ekstensi = array("jpg","png","jpeg","gif","webp");
    if(in_array($ekstensi,$checktipe_ekstensi) === false){
        echo "
        <script>
            alert('Ekstensi bukan tipe gambar');
            document.location.href = 'addSkin.php'
        </script>";
    }else{
        if (move_uploaded_file($tmp, '../uploads/'.$gambar_baru)) {
            $result = mysqli_query($conn, "INSERT INTO skin VALUES ('', '$nama', '$jenis', '$harga', '$rilis', '$gambar_baru')");
            if ($result) {
                echo "
                <script>
                    alert('Data Berhasil DiTambahkan!');
                    document.location.href = '../dash_skin.php'
                </script>";
            }else {
                echo "
                <script>
                    alert('Data Gagal DiTambahkan!');
                    document.location.href = 'addSkin.php'
                </script>";
            }
        }
    }

    // $result = mysqli_query($conn, "INSERT INTO skin VALUES ('', '$nama', '$jenis', '$harga', '$rilis', '$gambar_baru')");

    // if(mysqli_affected_rows($conn) > 0) {
    //     echo "
    //     <script> 
    //         alert('Skin Berhasil Ditambahkan');
    //         document.location.href = '../dash_skin.php';
    //     </script>";
    // } else {
    //     echo "
    //     <script> 
    //         alert('Skin Gagal Ditambahkan');
    //         document.loaction.href = 'addSkin.php';
    //     </script>";
    //     exit;
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adds.css">
    <title>Create Skin</title>
</head>
<body>
    <div class="create-skin"> 
        <h1>Create Skin</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama_senjata" class="label">Nama Skin</label>
            <input type="text" name = 'nama_senjata'>

            <label for="jenis_senjata" class="label">Jenis Senjata</label>
            <input type="text" name = 'jenis_senjata'>

            <label for="harga_senjata" class="label">Harga Senjata</label>
            <input type="text" name = 'harga_senjata'>

            <label for="tanggal_rilis" class="label">Tanggal Rilis Senjata</label>
            <input type="date" name = 'tanggal_rilis'>

            <label for="profile" class="label">image</label>
            <input type="file" name="gambar" class="gambar">

            <input type="submit" name ="addSkin" value ="Create Skin">
        </form>
        </div>
</body>
</html>