<?php include 'connect.php';


 if(isset($_GET['pay'])){

  $statement=$DB->prepare("DELETE FROM basketitems");
      $statement->execute();
  
  Echo 'payment successfully!';
  
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
    <link rel="stylesheet" type="text/css" href="css/modal.css">
  
    
</head>
<body>
  <header>
      <?php include 'header.php';?> 
    </header>
    
  <main>
    
    <div>
    <?php include 'offers.php';?>
    <p>&nbsp;</p>

    <hr>
    <br/>
    <h1>Our Products</h1>     
    <?php 
 


      //Prepares an SQL statement to be executed by the execute() method

      $statement = $DB->prepare("SELECT * FROM products"); //change to your 'table' name
              
      //Executes a prepared statement
          
          $statement->execute();
              
      //Returns an array containing all of the remaining rows in the result set
          
          $result = $statement->fetchAll();

          echo '<div class="col3">';
          if($result){
            foreach ($result as $rs) {
              echo '<div class="card">
                      <img src="data:image/jpeg;base64,'.base64_encode($rs['image']).'" alt="'.$rs['productName'].'" style="width:100%" />
                      <h2 class="txt-limit1">'.$rs['productName'].'</h2>
                      <p class="price">£ '.$rs['price'].'</p>
                      <p class="txt-limit">'.$rs['productDescription'].'</p>

                      <form method="post" action="basket.php">
                      <input type="hidden" name="getbasket" value="'.$rs['productID'].'">
                      <button type="submit" class="cartbtn" name="basket" >Add Cart</button>
                      </form>
 
                          <p>&nbsp;</p>
                          <a href="products.php?prodidinput='.$rs['productID'].' class="fade-btn">View Detail</a>
                          <br><br>
               
                      </div>';                
            }
                  echo '</div>';
          }else{
            echo "No result Found";
          }
      ?>
          <?php

            if(isset($_GET['prodidinput'])){
              $prodid = $_GET['prodidinput'];

              //Prepares an SQL statement to be executed by the execute() method

      $statement = $DB->prepare("SELECT * FROM products where productID = '$prodid'"); //change to your 'table' name
              
      //Executes a prepared statement
          
          $statement->execute();

            //Returns an array containing all of the remaining rows in the result set
          $count = $statement->rowCount();
          if($count==1){
          $row = $statement->fetch();
            echo'<div class="wrapper">
              <div id="fade-modal" class="modal tl">
                <div class="content">
                  <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="'.$row['productName'].'"/>
                  <h2>'.$row['productName'].'</h2>
                    <p class="price">£ '.$row['price'].'</p>
                    <p>'.$row['productDescription'].'</p>
             
                    <form method="post" action="basket.php">
                      <input type="hidden" name="getbasket" value="'.$row['productID'].'">
                      <button type="submit" class="cartbtn" name="basket" >Add Cart</button>
                      </form>
                    </div>
                      <span id="fade-close" class="close">&times;</span>
                    </div>
            </div>';
            }
          }
          ?>
  </main>
  <footer>
      <?php include 'footer.php';?>
  </footer>    

  <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
    <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"> </script>
    <script src="jquery.min.js"></script>
    <script src="ui.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
