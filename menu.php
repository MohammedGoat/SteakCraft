<?php
include('config.php');
session_start();
if(isset($_SESSION['user_id'])){
if(isset($_POST['addcart'])){
$pro_name = $_POST['pro_name'];
$pro_price = $_POST['pro_price'];
$pro_origin = $_POST['pro_origin'];
$pro_img = $_POST['pro_img'];
$quantity =1;
$user_id = $_SESSION['user_id'];
$select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$pro_name' AND user_id = '$user_id'");
if(mysqli_num_rows($select_cart) > 0){
}else{
    $insert = mysqli_query($conn, "INSERT INTO cart (name,price,origin,image,quantity,user_id)
    VALUES ('$pro_name', '$pro_price', '$pro_origin', '$pro_img', '$quantity', '$user_id')");
}



}
}
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
    <title>Menu Steak Craft</title>
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
            <li><a href="<?php if(isset($_SESSION['admin_name'])){
                echo "admin.php";
            }else{echo  "login.php";}
            ?>"><i class='bx bx-user'></i></a></li>
           <?php
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $select_rows = mysqli_query($conn, "SELECT COUNT(*) AS total_items FROM cart WHERE user_id = '$user_id'");
    $row = mysqli_fetch_assoc($select_rows);
    $counter = $row['total_items'];
    
    echo "<li><a href='cart.php'><i class='bx bxs-cart-alt'></i><span>$counter</span></a></li>";
}
?>
<?php if(isset($_SESSION['user_id'])){
                echo "<li><a href='logout.php'>Log out</a></li>";}?>

        </ul>
        

        <!-- menu responsive -->
        <div class="toggle_menu"></div>
    </header>

    <section id="menu">
           <h4 class="mini_title">Ours Menu</h4>
           <h2 class="title">Popular Menu</h2>
           <div class="dishes">
            <?php
                $select =mysqli_query($conn,"SELECT * FROM products");
                while($row=mysqli_fetch_assoc($select)){
            ?>
               <div class="dish">
                   <img src="products/<?php echo $row['image'];?>">
                   <p><?php echo $row['name'];?></p>
                   <p>Origin : <?php echo $row['origin'];?></p>
                    <h2><?php echo $row['price'];?> MAD</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                   <button type="submit" name="addcart"><a>ADD TO CART <i class='bx bxs-cart-alt' style='color:#ffffff'  ></i></a></button>
                   <input type="hidden" name="pro_name" value="<?php echo $row['name'];?>">
                   <input type="hidden" name="pro_price" value="<?php echo $row['price'];?>">
                   <input type="hidden" name="pro_origin" value="<?php echo $row['origin'];?>">
                   <input type="hidden" name="pro_img" value="<?php echo $row['image'];?>">
    </form>               
               </div>
            <?php
                }
            ?>
               
               
          
           </div>
       </section>
       <!-- footer -->
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