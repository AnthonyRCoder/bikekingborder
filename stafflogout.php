<?php

// remove all session variables
unset($_SESSION['staffdb']);

if(!isset($_SESSION["userdb"]) && !isset($_SESSION["staffdb"])) { 
// important
 session_start();

  // destroy the session

session_destroy();
echo'destroy';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/title.png"/>
    <title>Bike King Border</title>
    <meta name="author" content="Anthony Rozario">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
      <?php include 'header.php';?> 
    </header>

  <main>
  <h1> You have successfully logged out</h1>
  <p>To log in please visit the the<a href="login.php"> Staff Login page</a></p> 
  </main>
  <footer>
      <?php include 'footer.php';?>
  </footer>    
    <script src="js/main.js"></script>
</body>
</html>
