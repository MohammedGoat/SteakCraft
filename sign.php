<?php
@include ('config.php');

if(isset($_POST['sign'])){
$name = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass =md5($_POST['password']);
$cpass =md5($_POST['cpassword']);
$user_type = $_POST['user_type'];

$select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

$result = mysqli_query($conn,$select);
if(mysqli_num_rows($result) > 0){

$error[]= 'User already exist!';
}else{
   if($pass != $cpass){
     
      $error[]= 'Password not matched!';
   }     
   else{
      if(strlen($_POST['password']) < 8){
         $error[]= 'Password is too short!';
      }
      else{
       $insert="INSERT INTO user_form (name,email,password,user_type)
       VALUES('$name','$email','$pass','$user_type')";
       mysqli_query($conn,$insert);
       header('location:login.php');
      }

   }
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>S'inscrire</title>
</head>

<body class="log">
   <section class="login">
    <form action="sign.php" method="post">

        <h1>Register</h1>
        <?php
            if(isset($error)){
               foreach($error as $error){
                
                  echo '<span class="error-msj"><center>'.$error.'</center></span>';
               };

            };
            
        ?>
        <div class="input">
        <div class="box">
           <input type="text" name="username" placeholder="Username" required>
           <i class="bx bxs-user"></i>
        </div>
        <div class="box">
            <input type="email" name="email" placeholder="Email" required>
            <i class='bx bx-envelope'></i>
         </div>
        <div class="box">
           <input type="password" name="password" placeholder="password" required>
           <i class='bx bxs-lock'></i>
        </div>
        <div class="box">
            <input type="password" name="cpassword" placeholder="Confirm your password" required>
            <i class="bx bxs-lock-alt"></i>
         </div>
         <div class="box">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
          </div>
        <button type="submit" class="btn" name="sign">Register</button>
        
        
          </div>

    </form>
    <a href="index.php"><button  class="btn" style="margin-top:20px;">Go Home</button></a>
    <div class="inscrire">
           <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
   </section>


</body>

</html>
