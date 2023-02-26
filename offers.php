
<link rel="stylesheet" href="css/login.css">

<?php 
      include 'connect.php';
  
      ?>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/cardslide.css" />  
  

<?php  
 
 if(isset($_SESSION["userdb"])) { 
   echo "<h2>You have logged in.</h2>"; 

 } 
 else 
 { 
  echo "<h1>To see the OFFER Login to continue.</h1>";
   echo '<h2>User Login</h2>
 <p>Please enter your details below to login</p>
 <div class="lcontainer">        
 <form method="post" action="products.php">
     <div class="form-group">
         <label for="emailbox">Email address</label>
         <input type="email" id="emailbox" name="checkemail" placeholder="Enter email">
     </div>
     <div class="form-group">
         <label for="passwordbox">Password</label>
         <input type="password" id="passwordbox" name="checkpass" placeholder="Password">
     </div>

     <input type="submit" name="myLogin" value="Login">
 </form>
 </div>';

  

if(isset($_POST['myLogin'])){ 

 //Store the username and password, use trim() to removing any spaces

$checkuser = trim($_POST['checkemail']);
$checkpass = trim($_POST['checkpass']);

$salt ="4g£yc7";
$checkpass = md5($checkpass.$salt);

 //prepare Database query statement, to find the staff credentials submitted
 $statement=$DB->prepare("SELECT * FROM logins WHERE emailAddress='$checkuser' AND password ='$checkpass'");
 $statement->execute(); //sends the query to the sql database

 //if successful then the database should generate 1 row that matches our login details
 $count =$statement->rowCount();
 if($count==1) {
   $_SESSION["userdb"] = true; 
     echo "<h2>Log in successful</h2>";
 }
 else {
     echo '<h1 class="red">Error logging in, please try again...</h1>
     <a href="login.php"> Register page</a>';
 }    

}
 }
?>
  <?php

if(isset($_SESSION["userdb"])) { 

//Prepares an SQL statement to be executed by the execute() method

      $statement = $DB->prepare("SELECT * from products 
                                inner join offers on products.productID = offers.productID"); //change to your 'table' name
              
      //Executes a prepared statement
          
          $statement->execute();
              
      //Returns an array containing all of the remaining rows in the result set
          
          $result = $statement->fetchAll();
          echo '<h1>Our Offers</h1>
              <div class="container swiper">
                <div class="slide-container">
                  <div class="card-wrapper swiper-wrapper">';
                  
          if($result){
            foreach ($result as $rs) {
  

    echo' <div class="card swiper-slide">
       <div class="image-box">
         <img src="data:image/jpeg;base64,'.base64_encode($rs['image']).'" alt="'.$rs['productName'].'" />
       </div>
       <div class="profile-details">
         <img src="images/bottom1.png" alt="" />
         <div class="name-job">
           <h3 class="name">'.$rs['productName'].'</h3>
           <h4 class="job">£ '.$rs['price'].'</h4>
         </div>
       </div>
           <form method="post" action="basket.php">
           <input type="hidden" name="getbasket" value="'.$rs['productID'].'">
           <button type="submit" class="cartbtn" name="basket" >Add Cart</button>
           </form>
     </div>';

            }
   echo'</div>
 </div>
 <div class="swiper-button-next swiper-navBtn"></div>
 <div class="swiper-button-prev swiper-navBtn"></div>
 <div class="swiper-pagination"></div>
</div>

<script src="js/swiper-bundle.min.js"></script>
<script src="js/cardslide.js"></script>
<script src="js/main.js"></script>';
            
          }
}
?>

