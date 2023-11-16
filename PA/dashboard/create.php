<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CHIBERTO</title>
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="style.css" />
  
  <link rel="stylesheet" href="../stylekom.css" />
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
  <?php $active = "create" ?>
  <!-- <?php include("includes/dashboard-navbar.php") ?> -->
  <?php require("../connection.php") ?>

  <div class="main">
  <section class="form">
    <div class="form-wrapper">
      <h1 style="margin: 20px 0;">Form Penambahan Produk</h1>

      <form class="product-form" action="" method="post" enctype="multipart/form-data">

        <div class="form-item">
          <label class="form-label" for="product-name">Nama Produk</label>
          <input class="form-input" type="text" required name="product-name" id="product-name">
        </div>

        <div class="form-item">
          <label class="form-label" for="product-type">Tipe Produk</label>
          <select class="form-input" name="product-type" required id="product-type">
            <option value="Keyboard">Keyboard</option>
            <option value="Headphone">Headphone</option>
            <option value="Laptop">Laptop</option>
            <option value="Mouse">Mouse</option>
            <option value="Mousepad">Mousepad</option>
          </select>
        </div>

        <div class="form-item">
          <label class="form-label" for="product-price">Harga</label>
          <input class="form-input" type="number" required name="product-price" id="product-price">
        </div>

        <div class="form-item">
          <label class="form-label" for="product-image">Gambar</label>
          <input class="form-input" type="file" accept="image/*" required name="product-image" id="product-image">
        </div>

        <div style="justify-content: center" class="form-item">
          <input class="btn" type="submit" name="create" value="Create">

        </div>

      </form>
    </div>
  </section>
</div>

  <script defer async="true" src="script.js"></script>
</body>

</html>
<?php

if (isset($_POST["create"])) {
  $product_name = $_POST["product-name"];
  $product_type = $_POST["product-type"];
  $product_price = $_POST["product-price"];

  $original_file_name = basename($_FILES["product-image"]["name"]);
  $temp_file_name = $_FILES["product-image"]["tmp_name"];
  $file_type = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));


  $valid_image = true;

  // validation
  $image_size = getimagesize($_FILES["product-image"]["tmp_name"]);

  if ($image_size === false) {
    echo "<script>alert('Bukan image!')</script>";
    $valid_image = false;
  }

  if ($_FILES["product-image"]["size"] > 5000000) {
    echo "<script>alert('File terlalu besar!')</script>";
    $valid_image = false;
  }

  if (
    $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
    && $file_type != "gif"
  ) {
    echo "<script>alert('File format tidak disupport.')</script>";
    $valid_image = false;
  }

  if (!$valid_image) {
    echo "<script>window.location = window.location.href</script>";
    return;
  }

  $target_file_dir = "assets/uploads/";
  // 3. Gunakan format penamaan file seperti berikut: yyyy-mm-dd nama-file.ekstensi
  $file_format_name = date("Y-m-d") . " " . $product_name . "." . $file_type;
  $target_file_name = $target_file_dir . $file_format_name;

  $stmt = mysqli_prepare($conn, "INSERT INTO products (name, type, price, image_path) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ssds", $product_name, $product_type, $product_price, $target_file_name);

  if (mysqli_stmt_execute($stmt)) {
    @move_uploaded_file($temp_file_name, $target_file_name);
    echo "<script>alert('Berhasil menambahkan produk!')</script>";
  } else {
    echo "<script>alert('Gagal menambahkan produk!')</script>";
  }

  mysqli_stmt_close($stmt);

  echo "<script>document.location = 'dashboard.php' </script>";
}
?>
