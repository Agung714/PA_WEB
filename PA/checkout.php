<?php
require("connection.php");
session_start();
?>

<?php require("utils.php") ?>
<?php

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM chart where id=$id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar dan bagian lainnya dari halaman jika diperlukan -->
<!-- Start Navbar -->
<header>
        <a href="#" class="logo"><img src="img/Logo/CBT.png" alt="logo"></a>

        <nav class="navbar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="laptop.php">Laptop <i data-feather="chevron-down" class="dropdown"></i></a>

                </li>
                <li><a href="#">Accessoris <i data-feather="chevron-down" class="dropdown"></i></a>
                    <ul>
                        <li><a href="headset.php">Headshet</a>
                        </li>
                        <li><a href="mouse.php">Mouse</a>
                        </li>
                        <li><a href="keyboard.php">Keyboard</a>
                        </li>
                        <li><a href="mousepad.php">Mousepad</a>

                        </li>
                    </ul>
                </li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
        </nav>
        <a href="shopping-cart.php" class="extra"><i data-feather="shopping-cart"></i></a>
        <!-- <a href="Login/Loginadmin.php" class="extra"><i data-feather="clipboard"></i></a> -->
        <a href="#" class="extra" id="menu"><i data-feather="menu"></i></a>
    </header>
    <!-- End Navbar -->

    <!-- Konten halaman Checkout -->
    <section class="checkout">
        <div class="container">
            <h1>Checkout</h1>
            <!-- Informasi produk yang akan dibeli -->
            <div class="product-info">
                <h2>Product Information</h2>
                <div class="product">

                    <?php
                    $result3 = mysqli_query($conn, "SELECT * FROM chart where id=$id");
                    $row3 = mysqli_fetch_assoc($result3);
                    $barang = $row3["id_product"];
                    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $barang");
                    $row = mysqli_fetch_assoc($result);
                   
                    ?>
                    <img src="dashboard/<?= $row['image_path'] ?>" alt="Product Image">
                    <div class="details">
                        <h3><?= $row['name'] ?></h3>
                        <p>Tipe: <?= $row['type'] ?></p>
                        <p>Harga: <?= rupiah($row['price']) ?></p>
                    </div>
                </div>
                <!-- Form atau konten checkout -->
                <form action="" method="POST">
                    <!-- Informasi pembeli, alamat, metode pembayaran, dll. -->
                    <!-- Contoh input form -->
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" required>
                    </div>

                    <!-- Informasi produk yang tersembunyi untuk dikirim saat checkout -->
                    <input name="id" hidden value="<?= $row3['id'] ?>">

                    <!-- <input type="hidden" name="product_name" value="Nama Produk">
                    <input type="hidden" name="product_type" value="Tipe Produk">
                    <input type="hidden" name="product_image" value="path/to/product-image.jpg">
                    <input type="hidden" name="product_price" value="15000000"> -->
                    <!-- Tombol untuk mengirimkan form -->
                    <button type="submit" name="checkout">Proses Checkout</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Bagian footer atau elemen lainnya jika diperlukan -->

    <!-- Script yang diperlukan jika ada -->
    <script src="script.js"></script>
</body>

</html>


<?php

$resultb = mysqli_query($conn, "SELECT balance FROM dash where id=1");
$rowb = mysqli_fetch_assoc($resultb);
$balance= $rowb['balance'];

if (isset($_POST["checkout"])) {
    $id = $_POST["id"];

    // session_start();
    $shop = mysqli_query($conn, "UPDATE chart SET status=1 WHERE id = $id");
    
    $balance += $row['price'];
    $profit = mysqli_query($conn, "UPDATE dash SET balance= '$balance' WHERE id = 1");

    header("Location: shopping-cart.php");
    return;
}
?>