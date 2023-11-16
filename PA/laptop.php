<?php 
require("connection.php") ;
session_start();
?>
<?php

if (isset($_POST["buy"])) {
  $item_id = $_POST["id"];
  $user = $_POST["user"];
 
  session_start();
  $shop = mysqli_query($conn, "INSERT INTO chart VALUES ('', '$user','$item_id',0)");
  
  header("Location: shopping-cart.php");
}
?> 
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ChiBerTo</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="stylekom.css" />
  <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
</head>

<body>
  <?php $active = "index" ?>
  <?php require("utils.php") ?>
  <!-- Start Navbar -->
  <header>
        <a href="#" class="logo"><img src="img/Logo/CBT.png" alt="logo"></a>

        <nav class="navbar">
            <ul>
                <li><a href="#">Home  <?php 
         
          ?></a></li>
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
            </ul>
        </nav>

        <a href="#" class="extra"><i data-feather="shopping-cart"></i></a>
        <a href="Login/Loginadmin.php" class="extra"><i data-feather="clipboard"></i></a>
        <a href="#" class="extra" id="menu"><i data-feather="menu"></i></a>
    </header>
    <!-- End Navbar -->


  <section class="product">
    <div class="product-wrapper">
      <div class="section-title">
        <h1>Product</h1>
      </div>

      <div class="product-items">

        <?php

        $result = mysqli_query($conn, "SELECT * FROM products");

        while ($row = mysqli_fetch_assoc($result)) { 
        if($row['type']=="Laptop") {
        ?>
          <div class="item">
            <div class="item-name">
              <?= $row['name'] ?>

              <div class="item-type"><?= $row['type'] ?></div>
            </div>

            <div class="item-image">
              <img src="dashboard/<?= $row['image_path'] ?>" alt="" />
            </div>

            <div class="item-price"><?= rupiah($row['price']) ?></div>
          <!-- </div>
          <div> -->
          <form action="" method="POST">
                <input hidden name="id" value="<?= $row['id'] ?>">
                <input hidden name="user" value="<?= $_SESSION["username"]; ?>">
                <input class="item-buy" name="buy" type="submit" value="Add to Shopping Cart">
              </form>

            <!-- <a href="update.php?id=<?= $row['id'] ?>">
              <button class="btn green">add cart</button>
            </a> -->

            
          </div>
        <?php }} ?>
      </div>

    </div>

  </section>
  <script defer async="true" src="script.js"></script>
</body>

</html>
