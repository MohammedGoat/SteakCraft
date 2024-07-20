<?php
@include ('config.php');
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $message = $_POST['message'];
    $sql = "INSERT INTO complaints_requests (name, email , product , message) VALUES ('$name', '$email', '$product', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Votre plainte/demande a été soumise avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
    <title>About Us</title>
    <link rel="icon" href="logo Steak.png" type="image/x-icon">
    <link rel="stylesheet" href="aboutus.css">
</head>
<body>
    <section>
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
            </ul>
    
            <!-- menu responsive -->
            <div class="toggle_menu"></div>
        </header>
    </section>
    <section id="contact">
        <h1 class="section_title">ABOUT US</h1>
        <div class="localisation_contact_div">
            <div class="localisation">
                <h3>Our Localisation</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.976591087764!2d-7.660163223709571!3d33.60591184116497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d3aa5f5131eb%3A0x2a435b1e0914bf7d!2sComplexe%20La%20Cascade!5e0!3m2!1sfr!2sma!4v1712190593314!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="form_contact">
                <h3>Send a COMPLAINT/REQUEST</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" placeholder="Name" name="name">
                    <input type="email" placeholder="Email" name="email">
                    <input type="text" placeholder="Product" name="product">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="SUBMIT">
               </form>

             
            </div>
        </div>
    </section>
    <footer>
        <div class="services_list">
            <div class="service">
                <img src="clock.png" alt="">
                <h2>Opening</h2>
                <p>10h00 à 23h00</p>
                <p>12h00 à 00h00</p>
            </div>

            <div class="service">
              <img src="pin.png" alt="">
              <h2>Adresses</h2>
              <p>Morroco - Casablanca</p>
              <p>Bd Corniche , Ain Diab</p>
          </div>
          <div class="service">
              <img src="email.png" alt="">
              <h2>Emails</h2>
              <p>SteakCraft@gmail.com</p>
              <p>CraftSt@gmail.com</p>
          </div>
          <div class="service">
              <img src="call.png" alt="">
              <h2>Numbers</h2>
              <p>+212 522345671</p>
              <p>+212 522678943</p>
          </div>
          
          <hr>
        </div>

        <p class="footer_text">copyright @2024 <span>STEAK CRAFT</span> | DESIGNED BY AOUANE OUSSAMA , CHAKROUNI YOUNES , MORTADA MOHAMED .</p>
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