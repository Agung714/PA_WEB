<?php
session_start();
// require '../aksi/koneksi.php';

require("connection.php");

if (!isset($_SESSION['login'])) {
    header(('Location: Login/Login.php'));
    exit(); 
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chakra+Petch:wght@400;500;700&family=Onest:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <title>CHIBERTO</title>
</head>
<body>
    <!-- Start Navbar -->
    <header>
        <a href="#" class="logo"><img src="img/Logo/CBT.png" alt="logo"></a>

            <nav class="navbar">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="laptop.php">Laptop</a></li>
                    <li><a href="#">Accessoris <i data-feather="chevron-down" class="dropdown"></i></a>
                        <ul>
                            <li><a href="headset.php">Headset</a></li>
                            <li><a href="mouse.php">Mouse</a></li>
                            <li><a href="keyboard.php">Keyboard</a></li>
                            <li><a href="mousepad.php">Mousepad</a></li>
                        </ul>
                    </li><li><a href="logout.php">Sign Out</a></li>
            
                </ul>
            </nav>
        
         <a href="shopping-cart.php" class="extra"><i data-feather="shopping-cart"></i></a>
        <a href="#" class="extra" id="menu"><i data-feather="menu"></i></a>
</header>
    <!-- End Navbar -->

    <!-- Start Hero -->
    <section class="hero" id="hero">
        <main class="content">
            <h1>Bingung Cari Laptop <span>Murah</span></h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos, corporis.</p>
            <a href="#" class="cta">Ayo Beli Sekarang</a>
        </main>
    </section>
    <!-- End Hero -->

    <!-- Start Laptop Menu -->
    <section id="menu1" class="menu1">
        <h2><span>Varian</span> Laptop</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores earum, ut quam possimus, enim ratione autem recusandae incidunt impedit perspiciatis rerum velit magnam consequatur hic sunt minima. Culpa, numquam nisi!</p>
        <div class="row">
            <div class="menu-card">
                <img src="img/laptop-1.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">- Laptop -</h3>
                <p class="menu-card-price">IDR 15.000.000</p>
            </div>
            <div class="menu-card">
                <img src="img/laptop-1.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">- Laptop -</h3>
                <p class="menu-card-price">IDR 15.000.000</p>
            </div>
            <div class="menu-card">
                <img src="img/laptop-1.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">- Laptop -</h3>
                <p class="menu-card-price">IDR 15.000.000</p>
            </div>
            <div class="menu-card">
                <img src="img/laptop-1.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">- Laptop -</h3>
                <p class="menu-card-price">IDR 15.000.000</p>
            </div>
            <div class="menu-card">
                <img src="img/laptop-1.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">- Laptop -</h3>
                <p class="menu-card-price">IDR 15.000.000</p>
            </div>
            <div class="menu-card">
                <img src="img/laptop-1.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">- Laptop -</h3>
                <p class="menu-card-price">IDR 15.000.000</p>
            </div>
        </div>
    </section>
    <!-- End Laptop Menu -->

    <!-- Start Accessoris -->
    <section id="menu2" class="menu2">
        <h2>Macam <span>Accessoris</span></h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores earum, ut quam possimus, enim ratione autem recusandae incidunt impedit perspiciatis rerum velit magnam consequatur hic sunt minima. Culpa, numquam nisi!</p>
        <div class="row">
            <div class="menu-card">
                <img src="img/Headphone.png" alt="Laptop" class="menu-card-img" id="head">
                <h3 class="menu-card-title" id="heade">Headphone</h3>
            </div>
            <div class="menu-card">
                <img src="img/Keyboard.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">Keyboard</h3>
            </div>
            <div class="menu-card">
                <img src="img/Mouse.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">Mouse</h3>
            </div>
            <div class="menu-card">
                <img src="img/mousepad.png" alt="Laptop" class="menu-card-img">
                <h3 class="menu-card-title">Mousepad</h3>
            </div>
        </div>
    </section>
    <!-- End Accessoris -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
        <h2>Contact <span>ME</span></h2>
        <p>Isi kolom di bawah untuk menanyakan update selanjutnya di web ini</p>
        <form method="POST" action="form.php">
            <div class="row">
                <div class="box">
                    <div class="name">
                    <i data-feather="user"></i>
                    <!-- <label for="Nama"></label> -->
                    <input type="text" placeholder="Nama" id="nama" name="Nama">
                    </div>
                    <div class="Email">
                        <!-- <label for="Email"></label> -->
                        <i data-feather="mail"></i>
                        <input type="email" placeholder="Email" id="email" name="Email">
                    </div>
                    <div class="noHp">
                        <!-- <label for="NoHp"></label> -->
                        <i data-feather="phone"></i>
                        <input type="number" placeholder="NoHp" id="noHp" name="NoHp">
                    </div>
                    <div class="btn">
                        <button id="send" onclick="message()">submit</button>
                    </div>
                    <div class="message">
                        <div class="success" id="success"><h6>We have received your data, we are waiting for the latest update, see you again!!</h6></div>
                        <div class="danger" id="danger">
                            <h5>Your data is incorrect, enter it according to the column listed</h5>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Contact Section End  -->
<!-- Replace -->
<script>
  feather.replace();
</script>

<script src="script.js"></script>
</body>
</html>
    <!-- Replace -->
    <script>
        feather.replace();
    </script>

    <script src="script.js"></script>
</body>

</html>