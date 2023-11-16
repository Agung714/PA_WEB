<?php 
require("connection.php") ;
session_start();
?>

<?php require("utils.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - CHIBERTO</title>
    <!-- Link ke file stylesheet Anda -->
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header jika diperlukan -->
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
    
    
    <!-- Konten halaman Shopping Cart -->
    <br>
    <br>
    <br>
    <br>
    <section class="cart">

        <?php



        $result3 = mysqli_query($conn, "SELECT * FROM chart");
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $result2 = mysqli_query($conn, "SELECT * FROM users");
            $row2 = mysqli_fetch_assoc($result2);
            $barang = $row3["id_product"];
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $barang");
            $row = mysqli_fetch_assoc($result);
            if ($row3["id_product"] == $row["id"] && $_SESSION["username"] == $row3["user"] && $row3["status"]==0) {

        ?>
                <div class="product-item">
                    <img src="dashboard/<?= $row['image_path'] ?>" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <h3 class="Tulisan"><?= $row['name'] ?></h3>
                        <p class="Tulisan">Tipe: <?= $row['type'] ?></p>
                        <p class="Tulisan">Harga: <?= rupiah($row['price']) ?></p>

                        <!-- Tombol untuk menghapus produk dari keranjang -->
                        <a href="checkout.php?id=<?php echo $row3["id"] ?>"><button class="remove-button">Checkout</button>
                        <!-- Tombol untuk menghapus produk dari keranjang -->
                        <button class="remove-button">Remove</button>
                    </div>
                </div>
        <?php }
        } ?>
    </section>
    <script src="script.js"></script>
</body>

</html>

<?php

if (isset($_POST["checkout"])) {
    $item_id = $_POST["id"];
    $user = $_POST["user"];

    session_start();
    $shop = mysqli_query($connection, "UPDATE chart SET status=1");

    header("Refresh:0");
    return;
    header("Location: shopping-cart.php");
}
?>