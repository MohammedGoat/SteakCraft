<?php 
include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="path/to/boxicons/css/boxicons.min.css">
    <link rel="icon" href="G__7_.png" type="image/x-icon">
    <title>Orders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo Steak.png" type="image/x-icon">
</head>
<body>
<header>
        <div class="logo">
            <p><span>Steak </span>Craft</p>
        </div>
        <ul class="menu">
            <li><a href="index.php#home">Home</a></li>
            <li><a href="index.php#menu">Menu</a></li>
            <li><a href="index.php#about_us">About Us</a></li>
            <li><a href="index.php#reservation">Réservation</a></li>
            <li><a href="<?php echo "admin.php";
            ?>"><i class='bx bx-user'></i></a></li>
            <?php if(isset($_SESSION['user_id'])){
                echo "<li><a href='logout.php'>Log out</a></li>";}?>
        </ul>
        <!-- menu responsive -->
        <div class="toggle_menu"></div>
    </header>
    <section id="menu">
           <h1 class="title">Orders List</h1>

    <table class="orders">
      <thead>
        <th>Order's Nº</th>
        <th>Costumer's Name</th>
        <th>Costumer's Number</th>
        <th>Payement Methode</th>
        <th>Costumer's Adress</th>
        <th>Total Products</th>
        <th>Total Price</th>
        
      </thead>
      <tbody>

        <?php 
            $select_order =mysqli_query($conn,"SELECT * FROM `order`");
            if(mysqli_num_rows($select_order) > 0){
            while ($row=mysqli_fetch_assoc($select_order)) {
        ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['number'];?></td>
          <td><?php echo $row['method'];?></td>
          <td><?php echo $row['country'];?>,<?php echo $row['state'];?>,
          <?php echo $row['city'];?>,<?php echo $row['street'];?>,<?php echo $row['flat'];?></td>
          <td><?php echo $row['total_products'];?></td>
          <td><?php echo $row['total_price'];?>MAD</td>
        </tr>




       <?php
            };
        };
       ?>
        
      </tbody>

    </table>
        
     </section>
    
</body>
</html>