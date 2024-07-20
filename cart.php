<?php
include('config.php');
session_start();
$user_id = $_SESSION['user_id'];
if(isset($_POST['update_quant_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id =  $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn,"UPDATE cart SET quantity ='$update_value' WHERE id ='$update_id'");
    if($update_quantity_query){
        header('location:cart.php');
    }
}
if(isset($_GET['delete'])){
    $remove_id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM cart WHERE id='$remove_id'");
    header('location:cart.php');
}
if(isset($_GET['delete_all'])){
    mysqli_query($conn,"DELETE FROM cart WHERE user_id = '$user_id'");
    header('location:cart.php');
}

// Initialisation du prix total à 0
$grand_total = 0;

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
    <title>Shopping Cart</title>
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
            <li><a href="<?php if(isset($_SESSION['user_id'])){
                echo "user_page.php";
            }else{echo "login.php";}
            ?>"><i class='bx bx-user'></i></a></li>
            <?php
if(isset($_SESSION['user_id'])){
    $select_rows = mysqli_query($conn, "SELECT COUNT(*) AS total_items FROM cart WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($select_rows);
    $counter = $row['total_items'];
    
    echo "<li><a href='cart.php'><i class='bx bxs-cart-alt'></i><span>$counter</span></a></li>";
}
?>
        </ul>
        <!-- menu responsive -->
        <div class="toggle_menu"></div>
    </header>
    <section id="menu">
           <h1 class="title">Shopping Cart</h1>

    <table class="cart">
      <thead>
        <th>Image</th>
        <th>Product name</th>
        <th>Origin</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Action</th>
      </thead>
      <tbody>

        <?php 
            $select_cart =mysqli_query($conn,"SELECT * FROM cart WHERE  user_id='{$user_id}'");
            if(mysqli_num_rows($select_cart) > 0){
                while ($row=mysqli_fetch_assoc($select_cart)) {
                    // Calcul du sous-total pour chaque produit
                    $sub_total = $row['price'] * $row['quantity'];
                    // Ajout du sous-total au prix total
                    $grand_total += $sub_total;
        ?>
        <tr>
          <td><img src="products/<?php echo $row['image'];?>" height="100"></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['origin'];?></td>
          <td><?php echo number_format($row['price']) ;?> MAD/-</td>
          <td>
              <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
              <input type="hidden" name="update_quantity_id" min="1" value="<?php echo $row['id'];?>">
                <input type="number" name="update_quantity" min="1" value="<?php echo $row['quantity'];?>"
                style="padding:5px; border-radius:5px; border:1px solid #5a5656;">
                <button type="submit" value="update" name="update_quant_btn"><a>update
                <i class='bx bxs-edit' style='color:#ffff'></i></a></button>

              </form>
          </td>
          <td>
            <?php echo $sub_total; ?> MAD
          </td>
          <td>
          <button><a href="cart.php?delete=<?php echo $row['id']; ?>"><i class='bx bx-trash' style='color:#ffffff'>
           </i>Delete</a></button>
          </td>
        </tr>
        <?php
                }
            }
        ?>
        <tr>
            <td colspan="4" class="continu_shopping"><button><a href="menu.php">Continu Shopping <i class='bx bxs-cart-alt' style='color:#ffffff' >
                 </i></a></button></td>
            <td class="continu_shopping">Grand Price:</td> 
            <td class="continu_shopping"><?php echo $grand_total ;?> MAD</td>
            <td class="continu_shopping">
           <button><a href="cart.php?delete_all"><i class='bx bx-trash' style='color:#ffffff'>
           </i>Delete All</a></button>
          </td>   
        </tr>
        <?php if($grand_total > 0){
          echo "<tr>
          <td colspan='7'>
           <button><a href='checkout.php'>
           </i>Procced To Checkout   <i class='bx bxs-check-circle' style='color:#ffffff'  ></i></a></button>
          </td> 
          </tr>";
        }
        ?>
        
      </tbody>

    </table>
        
     </section>
     <footer>
        <section class="contact1">
            <div class="contact-info">
                <div class="first-info">
                    <h2 href="#" class="logo"><span>Steak</span> Craft</h2>
                    <p> Ain Diab Bd Corniche, Casablanca</p>
                    <p>+212 522345671</p>
                    <p>SteakCraft@gmail.com</p>
                   <div class="social-icon">
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-youtube'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>  
                <div class="second-info">
                    <h4>CONTACT US</h4>
                    <p>About Page</p>
                    <p>Size Guide</p>
                    <p>Purchases and Returns</p>
                    <p>Privacy</p>
                </div>
                <div class="third-info">
                    <h4>RESERVATIONS & ORDERS</h4>
                    <p>Process</p>
                    <p>Booking Information</p>
                    <p>Ordering Information</p>
                    <p>Reservation FAQs</p>
                </div>
                <div class="fourth-info">
                    <h4>COMPANY</h4>
                    <p>Location</p>
                    <p>Hours of Operation</p>
                    <p>Mission and Values</p>
                    <p>Connexion</p>
                </div>
                <div class="fiv">
                    <h4>SUBSCRIBE</h4>
                    <p>Join us for an unparalleled culinary experience! Subscribe now to stay updated on our latest special offers, exclusive events, and culinary discoveries that will tantalize your taste buds with every visit. Never miss an opportunity to savor the delights of our restaurant.</p>
                </div>
            </div>
        </section>
          <br>
          <p class="footer_text">copyright @2024 <span>STEAK CRAFT</span> | DESIGNED BY AOUANE OUSSAMA , CHAKROUNI YOUNES , MOURTADA MOHAMMED .</p>
      </footer>


       <script>
          var small_menu = document.querySelector('.toggle_menu')
          var menu = document.querySelector('.menu')

          small_menu.onclick = function(){
               small_menu.classList.toggle('active');
               menu.classList.toggle('responsive');
          }
      </script>

    
</body>
</html>
