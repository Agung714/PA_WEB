<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ChiBerTo</title>
  <link rel="stylesheet" href="../stylekom.css" />
  <link rel="stylesheet" href="style.css" />
  <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
</head>

<body> 

  <?php $active = "index" ?>
  <?php require("../connection.php") ?>
  <?php require("../utils.php") ?>
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
                    <a href="dashboard.php">
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


        <div class="main">
  <section class="product">
    <div class="product-wrapper">
      <div class="section-title">
        <h1>Product</h1>
        <a href="create.php">
              <button class="btn green">+ Create</button>
            </a>
      </div>

      <div class="product-items">

        <?php

        $result = mysqli_query($conn, "SELECT * FROM products");

        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="item">
            <div class="item-name">
              <?= $row['name'] ?>
              <div class="item-type"><?= $row['type'] ?></div>
            </div>
            <div class="item-image">
              <img src="<?= $row['image_path'] ?>" alt="" />
            </div>
            <div class="item-price"><?= rupiah($row['price']) ?></div>
          <!-- </div>
          <div> -->
            <a href="update.php?id=<?= $row['id'] ?>">
              <button class="btn green">Update</button>
            </a>

            <form onsubmit="return submitForm();" style="display: block;" action="" method="post">
              <input name="id" hidden value="<?= $row['id'] ?>">
              <button name="delete" type="submit" style="display: inline;" class="btn red">Delete</button>
            </form>
          </div>
        <?php } ?>
      </div>

    </div>

        </div>
  </section>
  <script defer async="true" src="script.js"></script>
</body>

</html>
<?php 
if (isset($_POST["delete"])) {
	$id = $_POST["id"];

	$select_stmt = mysqli_prepare($conn, "SELECT image_path FROM products WHERE id = ?");
	mysqli_stmt_bind_param($select_stmt, "i", $id);
	mysqli_stmt_execute($select_stmt);
	$result = mysqli_stmt_get_result($select_stmt);
	$old_image = mysqli_fetch_assoc($result)['image_path'];
	mysqli_stmt_close($select_stmt);

	$delete_stmt = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
	mysqli_stmt_bind_param($delete_stmt, "i", $id);
	$delete_result = mysqli_stmt_execute($delete_stmt);

	if ($delete_result) {
		if (file_exists($old_image)) {
			unlink($old_image);
		}
		echo "<script>alert('Berhasil menghapus produk.')</script>";
	} else {
		echo "<script>alert('Gagal menghapus produk.')</script>";
	}

	mysqli_stmt_close($delete_stmt);
	echo "<script>document.location = 'dashboard.php'</script>";
}
?>