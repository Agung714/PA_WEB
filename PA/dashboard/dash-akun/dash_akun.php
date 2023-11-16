<?php
require '../../connection.php';

require("../../utils.php");
$result = mysqli_query($conn, "SELECT * FROM users");

$akun = [];

while ($row = mysqli_fetch_assoc($result)) {
    $akun[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Account</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssakun.css">
        <title>Dashboard</title>
    </head>

    <body>
        <!-- Nav -->
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
                    <a href="dash_akun.php">
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

            <!-- Main -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <div class="date">
                        <h3><?php echo date('l, d/m/Y | h:i:s a')?></h3>
                    </div>
                    <div class="user">
                        <img src="../../Img/icons8-valorant-64.png" alt="valo">
                    </div>
                </div>

                <!-- Tampilan akun -->
                <div class="container-tampilan">
                    <div class="Tampilanakun">
                        <div class="tambahtampilan">
                            <h2>Dash-Akun</h2>
                            </div>
                        <table border="1">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Tanggal Lahir</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($akun as $acc) : ?>
                                    <tr>
                                    <td><?php echo $i ?></td>
                                        <td><?php echo $acc['first'] ?></td>
                                        <td><?php echo $acc['last'] ?></td>
                                        <td><?php echo $acc['tanggal'] ?></td>
                                        <td><?php echo $acc['username'] ?></td>
                                        <td><?php echo $acc['email'] ?></td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <script src="scriptakun.js"></script>
    </body>

    </html>
</body>

</html>