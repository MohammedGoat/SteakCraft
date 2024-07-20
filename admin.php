<?php
@include 'config.php';
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location: login.php');
    exit;
} else {
    if (isset($_POST['add_pro'])) {
        $product_name = $_POST['pro_name'];
        $product_origin = $_POST['pro_origin'];
        $product_price = $_POST['pro_price'];
        $product_img = $_FILES['pro_img']['name'];
        $product_img_tmp_name = $_FILES['pro_img']['tmp_name'];
        $product_img_folder = 'products/'. $product_img;

        $error = array();

        if (empty($product_name) || empty($product_origin) || empty($product_price) || empty($product_img)) {
            $error[] = 'Please fill out all fields';
        } else {
            
            $insert = "INSERT INTO products(name, origin, price, image) VALUES ('$product_name', '$product_origin', '$product_price', '$product_img')";
            $upload = mysqli_query($conn, $insert);

            if ($upload) {
                
                if (move_uploaded_file($product_img_tmp_name, $product_img_folder)) {
                    $error[] = 'New product added successfully';
                } else {
                    $error[] = 'Error uploading product image';
                }
            } else {
                $error[] = 'Could not add the product';
            }
        }
    }
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:admin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="logo Steak.png" type="image/x-icon">
    <link href="login.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body class="admin" style="margin-top: 20px;">
  <div class="admn">
 <div class="container">

   <div class="out">
       <h1>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1>
       <a href="logout.php"><button class="btn">Log out</button></a>
   </div>

<section class="add">
   <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

   <h1>ADD NEW PRODUCT</h1>
        <?php
            if(isset($error)){
               foreach($error as $error){
                echo '<span class="error-msj"><center>'.$error.'</center></span>';
               };

            };
            
        ?>
    <div class="pro_form">
    <div class="box">
    <input type="text" name="pro_name" placeholder="Add product name">
    </div>
    <div class="box">
    <input type="text" name="pro_origin" placeholder="Add product Origin">
    </div>
    <div class="box">
    <input type="number" name="pro_price" placeholder="Add product price">
    </div>
    <input type="file" name="pro_img" accept="image/png, image/jpeg, image/jpg" class="pro-img">
    <button type="submit" class="btn" name="add_pro">ADD</button>

    </div>

  </form>
  <a href="menu.php"><button  class="btn" style="margin-top:20px;">Go To Menu</button></a>
  <a href="orders.php"><button  class="btn" style="margin-top:20px;">See Orders</button></a>
</section>
</div>
</div>
  <?php
  
     $select = mysqli_query($conn, "SELECT * FROM products");
   ?>
  <div class="products-display">
      <table class="products-table">
         <thead>
          <tr>
          <th>product image</th>
          <th>product name</th>
          <th>product origin</th>
          <th>product price</th>
          <th colspan="2">action</th>
        </tr>
        </thead>
        <?php
     while($row=mysqli_fetch_assoc($select)){
     ?>
         <tr>
          <td><img src="products/<?php echo $row['image'];?>" height="100"></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['origin'];?></td>
          <td><?php echo $row['price'];?> MAD</td>
          <td>
            <a href="admnupdate.php?edit=<?php echo $row['id']; ?>"><button class="btn" id="edit"><i class='bx bxs-edit' style='color:#ffff'></i>
            Edit</button></a>
            <a href="admin.php?delete=<?php echo $row['id']; ?>"><button class="btn" id="delete"><i class='bx bx-trash' style='color:#ffffff'  ></i>
            Delete</button></a>
          </td>
        </tr>


     <?php
     };
     ?>
      </table>

  </div>




</body>
</html>