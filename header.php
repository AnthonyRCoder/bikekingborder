<?php 
      include 'connect.php';
      session_start();?>

<script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/header.css">


<div class="banner">
    <i class="fas fa-bars"></i>
    <img src="images/logo.png" alt="image">
    <i class="fas fa-shopping-cart"></i>
    <i class="fas fa-user">
        <div class="dropdown-content">
            <li><?php  if(!isset($_SESSION["userdb"])) { echo '<a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>';} ?></li>
            <li><a href="staff.php"><i class="fa fa-unlock"></i> staff</a></li>
            <li><?php  if(isset($_SESSION["staffdb"])) { echo "<a href='stafflogout.php'> Staff logout</a>";} ?></li>
            <li><?php   if(isset($_SESSION["userdb"])) {  echo "<a href='userlogout.php'>user logout</a>"; } else {echo '<a href="products.php">user login</a>';} ?></li>
        </div>
    </i>
    <div class="search">
        <form class="search-form" method="post" action="search.php">
            <input class="search-bar" type="text" placeholder="Enter search here" name="search">
            <button class="search-submit" type="submit" name="sch"><i class="fa fa-search"></i></button></button>
        </form>
    </div>
</div>
<nav class="header-nav">
    <ul class="header-ul">
        <li class="header-li"><a href="index.php">Home</a></li>
        <li class="header-li"><a href="products.php">Products</a></li>
       <!-- <li class="header-li"><a href="offers.php"> Special Offer</a></li>-->
        <li class="header-li"><a href="gallery.php">Gallery</a></li>
        <li class="header-li"><a href="contact.php">Contact Us</a></li>
        
    </ul>
    <ul class="header-ul2">
    <?php 


      //Prepares an SQL statement to be executed by the execute() method

      $statement = $DB->prepare("SELECT * FROM company"); //change to your 'table' name
              
      //Executes a prepared statement
          
          $statement->execute();
              
      //Returns an array containing all of the remaining rows in the result set
          
          $result = $statement->fetchAll();

          if($result){
            foreach ($result as $rs) {
          echo '<p>Opening Times Mon – Fri '.$rs['weekDayOpen'].' – '.$rs['weekDayClose'].' | Sat '.$rs['saturdayOpen'].' – '.$rs['saturdayClose'].' | Sun '.$rs['sundayOpen'].' – '.$rs['sundayClose'].' </p>';
            }
        }else{
            echo "Error";
        }
        
          ?>
    </ul>
</nav>