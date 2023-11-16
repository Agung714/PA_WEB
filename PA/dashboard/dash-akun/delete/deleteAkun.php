<?php 
require '../../../function/function.php';
$id = $_GET['id'];

if( hapusakun($id) > 0){
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = '../dash_akun.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'deleteAkun.php';
    </script>";
}
?>

