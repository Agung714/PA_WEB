<?php

require("../connection.php");
$result = mysqli_query($conn, "SELECT * FROM products");
$row = mysqli_fetch_assoc($result);
$result2 = mysqli_query($conn, "SELECT * FROM users");
$row2 = mysqli_fetch_assoc($result2);
$result3 = mysqli_query($conn, "SELECT * FROM chart");
$row3 = mysqli_fetch_assoc($result3);

$products = [];
$users = [];
$chart = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
while ($row2 = mysqli_fetch_assoc($result2)) {
    $users[] = $row2;
}
while ($row3 = mysqli_fetch_assoc($result3)) {
    $chart[] = $row3;
}

$resultb = mysqli_query($conn, "SELECT balance FROM dash where id=1");
$rowb = mysqli_fetch_assoc($resultb);


?>

<?php require("../utils.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- Nav -->
    <div class="container">
        <div class="navigasi">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="logo-github"></ion-icon></span>
                        <span class="title">CHIBERTO</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="KOM.php">
                    <span class="icon"><ion-icon name="tv-outline"></ion-icon></span>
                        <span class="title">Items</span>
                    </a>
                </li>
                
                <li>
                    <a href="dash-akun/dash_akun.php">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="dash-order/dash_orders.php">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="mode">
                    <ion-icon name="sunny-outline"></ion-icon>
                </div>
                <div class="user">
                    <img src="../img/Logo/CBT.png" alt="CBT">
                </div>
            </div>

            <!-- Cards -->
            <div class="cardBox">
                <div class="card">
                    <div class="Items">
                        <?php
                        $pro = 1;
                        foreach ($products as $produk) :
                            $pro++;
                        endforeach;
                        ?>
                        <?php
                        $account = 1;
                        foreach ($users as $pengguna) :
                            $account++;
                        endforeach;
                        ?>
                        <?php
                        $cha = 1;
                        foreach ($chart as $keranjang) :
                            if ($keranjang['status'] == 1) {
                                $cha++;
                            }
                        endforeach;
                        ?>
                        <div class="number"><?php echo $pro ?></div>
                        <div class="cardname">Items</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="tv-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="Accounts">
                        <div class="number"><?php echo $account ?></div>
                        <div class="cardname">Accounts</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="comments">
                        <div class="number"><?php echo $cha ?></div>
                        <div class="cardname">Orders</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="comments">
                        <div class="number"><?php echo rupiah($rowb['balance']) ?></div>
                        <div class="cardname">Balance</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="card-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Request Detail List -->
            <div class="detail">
                <div class="recentRequest">
                    <div class="cardHeader">
                        <h2>Recent Request</h2>
                        <a href="#" class="btn">view all</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Request</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($users as $isi) : ?>
                                <tr>
                                    <td><?php echo $isi["first"] ?></td>
                                    <td><?php echo $isi["email"] ?></td>
                                    <td><?php echo $isi["request"] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>