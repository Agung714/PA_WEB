<?php
require("../../connection.php");
// session_start();
?> 

<?php require("../../utils.php") ?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="cart.css">
    
  <!-- <link rel="stylesheet" href="../../stylekom.css" /> -->
    <link rel="stylesheet" href="../style.css">
    <!-- <link rel="stylesheet" href="cssskin.css"> -->
</head>
    
<body>
    <!-- Header jika diperlukan -->
    <header> <!-- Nav -->
        <div class="container">
            <div class="navigasi">
                <ul>
                <li>
                    <a href="../dashboard.php">
                        <span class="icon"><ion-icon name="logo-github"></ion-icon></span>
                        <span class="title">CHIBERTO</span>
                    </a>
                </li>
                <li>
                    <a href="../dashboard.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../KOM.php">
                    <span class="icon"><ion-icon name="tv-outline"></ion-icon></span>
                        <span class="title">Items</span></a>
                </li>
                <li>
                    <a href="../dash-akun/dash_akun.php">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="../dash-order/dash_orders.php">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="../../logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign out</span>
                    </a>
                </li>
                </ul>
            </div>

    </header>

    <!-- Konten halaman Shopping Cart -->
    
    <div class="main">
    <section class="cart">

        <?php



        $result3 = mysqli_query($conn, "SELECT * FROM chart");
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $punya = $row3["user"];
            $barang = $row3["id_product"];
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $barang");
            $row = mysqli_fetch_assoc($result);
            // $result2 = mysqli_query($conn, "SELECT * FROM users WHERE username = 'a'");
            $result2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '$punya'");
            $row2 = mysqli_fetch_assoc($result2);
            if ($row3["id_product"] == $row["id"] && $row2["username"] == $row3["user"] && $row3["status"]==1) {

        ?>
                <!-- ------------------- -->
                <div class="product-item">
                    <img src="../<?= $row['image_path'] ?>" alt="Product Image" class="product-image">
                    <div class="product-details">
                        <h3 class="Tulisan"><?= $row['name'] ?></h3>
                        <p class="Tulisan">Tipe: <?= $row['type'] ?></p>
                        <p class="Tulisan">Harga: <?= rupiah($row['price']) ?></p>

                    </div>
                </div>
        <?php }
        } ?>
    </section>
    
    </div>
    <script src="script.js"></script>
</body>


    </html>
</body>

</html>