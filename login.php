<?php
session_start();
session_unset();
session_destroy();
@include ('config.php');
session_start();

if(isset($_POST['log'])){
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass =md5($_POST['password']);

$select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

$result = mysqli_query($conn,$select);
if(mysqli_num_rows($result) > 0){

$row = mysqli_fetch_array($result);
if($row['user_type'] == 'admin'){

$_SESSION['admin_name'] = $row['name'];
$_SESSION['user_id'] = $row['id'];
header('location:admin.php');

}elseif($row['user_type'] == 'user'){

   $_SESSION['user_name'] = $row['name'];
   $_SESSION['user_id'] = $row['id'];
   header('location:menu.php');
   
   }
}else{
   $error[] = 'Incorrect email or password!';
}

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="login.css" rel="stylesheet">
    <link rel="icon" href="logo Steak.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>

<body class="log">
   <section class="login">
    <form action="login.php" method="post">

        <h1>Log in</h1>
        <?php
            if(isset($error)){
               foreach($error as $error){
                
                  echo '<span class="error-msj"><center>'.$error.'</center></span>';
               };

            };
            
        ?>
        <div class="input">
        <div class="box">
           <input type="Email" name="email" placeholder="Email" required>
           <i class='bx bx-envelope'></i>
        </div>
        <div class="box">
           <input type="password" name="password" placeholder="Password" required>
           <i class='bx bxs-key'></i>
        </div>
        <button type="submit" class="btn" name="log">Log in</button>

          </div>

    </form>
    <a href="index.php"><button  class="btn" style="margin-top:20px;">Go Home</button></a>
        <div class="inscrire">
           <p>You don't have an account? <a href="sign.php">Register now</a></p>
        </div>
   </section>



</body>

</html>
