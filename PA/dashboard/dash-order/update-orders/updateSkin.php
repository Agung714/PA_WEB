<?php
require '../../../function/function.php';

if (isset($_GET['id'])) {
    $id_skin = $_GET['id'];
    $skinid = mysqli_query($conn, "SELECT * FROM skin WHERE id_senjata = $id_skin");
    
    $skin = [];
    
    while ($row = mysqli_fetch_assoc($skinid)) {
        $skin[] = $row;
    }
    
    $skin = $skin[0];
}

if (isset($_POST['updateSkin'])) {
    $ns = $_POST['nama_senjata'];
    $js = $_POST['jenis_senjata'];
    $hs = $_POST['harga_senjata'];
    $tr = $_POST['tanggal_rilis'];

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
            document.location.href = 'updateSkin.php'
        </script>";
    }else{
        if (move_uploaded_file($tmp, '../uploads/'.$gambar_baru)) {
            $result = mysqli_query($conn, "UPDATE skin SET nama_senjata = '$ns', jenis_senjata = '$js', harga_senjata = '$hs', tanggal_rilis = '$tr', gambar = '$gambar_baru' WHERE id_senjata = '$id_skin'");
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
                    document.location.href = 'updateSkin.php'
                </script>";
            }
        }
    }

    $result = mysqli_query($conn, "UPDATE skin SET nama_senjata = '$ns', jenis_senjata = '$js', harga_senjata = '$hs', tanggal_rilis = '$tr' WHERE id_senjata = $id_skin");

    if($result > 0){
        echo "
        <script>  
            alert('Skin Berhasil Diubah');
            document.location.href = '../dash_skin.php';
        </script>";
    } else {
        echo "
        <script> 
            alert('Akun Gagal Diubah');
            document.location.href = 'updateSkin.php';
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
    <title>Update Skin</title>
</head>
<body>
    <div class="cardHeader">
        <h2>Update Skin</h2>
        <!-- <a href="#" class="btn">view all</a> -->
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="id">
    <table>
        <thead>
            <tr>
                <label for="nama_senjata">Nama Skin</label>
                <input type="text" name="nama_senjata" value="<?= $skin['nama_senjata'] ?>">
            </tr>
            <tr>
                <label for="jenis_senjata">Jenis Senjata</label>
                <input type="text" name="jenis_senjata" value="<?= $skin['jenis_senjata'] ?>">
            </tr>
            <tr>
                <label for="harga_senjata">Harga Senjata</label>
                <input type="text" name="harga_senjata" value="<?= $skin['harga_senjata'] ?>">
            </tr>
            <tr>
                <label for="tanggal_rilis">Tanggal Rilis</label>
                <input type="date" name="tanggal_rilis" value="<?= $skin['tanggal_rilis'] ?>">
            </tr>
            <tr>
                <label for="profile">image</label>
                <input type="file" name="gambar">
            </tr>
            <button type="submit" name="updateSkin">Update</button>
        </thead>
        </form>
</body>
</html>