<?php
@include 'config.php';
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location: login.php');
    exit;
} else {
    if(isset($_GET['edit'])){
    $id = $_GET['edit'];}
    if (isset($_POST['update_pro'])) {
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
            
            $update = "UPDATE products SET name = '$product_name',price = '$product_price',
            origin = '$product_origin',image = '$product_img' WHERE id = $id ";
            $upload = mysqli_query($conn,$update);

            if ($upload) {
                
                if (move_uploaded_file($product_img_tmp_name, $product_img_folder)) {
                    header('location:admin.php');
                } else {
                    $error[] = 'Error uploading product image';
                }
            } else {
                $error[] = 'Could not add the product';
            }
        }
    }
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
    <title>Update Product</title>
</head>
<body class="admin">
<div class="admn" style="margin-top: 20px;">
 <div class="container">

<section class="add">
   <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

   <h1>UPDATE THE PRODUCT</h1>
        <?php
            if(isset($error)){
               foreach($error as $error){
                 echo '<span class="error-msj"><center>'.$error.'</center></span>';
               };

            };
            
        ?>
        <?php
        $select =mysqli_query($conn,"SELECT * FROM products WHERE id = $id");
        while($row=mysqli_fetch_assoc($select)){
        
        ?>
    <div class="pro_form">
    <div class="box">
    <input type="text" name="pro_name" placeholder="Update product name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="box">
    <input type="text" name="pro_origin" placeholder="Update product Origin" value="<?php echo $row['origin']; ?>">
    </div>
    <div class="box">
    <input type="number" name="pro_price" placeholder="Update product price" value="<?php echo $row['price'];?>">
    </div>
    <input type="file" name="pro_img" accept="image/png, image/jpeg, image/jpg" class="pro-img">
    <button type="submit" class="btn" name="update_pro">Update</button>
    <?php }; ?>
    
  </form>
  </div>
  <a href="admin.php"><button  class="btn" style="margin-top:20px;">Go Back</button></a>

    
</section> 
</div>
</div>
</body>
</html>