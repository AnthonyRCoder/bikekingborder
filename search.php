

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

    
</head>
<body>
    <header>
      <?php include 'header.php';?> 
    </header>
    <main>

    <?php include 'connect.php';


            if(isset($_POST['sch'])){
              $prod = $_POST['search'];

              //Prepares an SQL statement to be executed by the execute() method

      $statement = $DB->prepare("SELECT * FROM products where productName = '$prod'"); //change to your 'table' name
              
      //Executes a prepared statement
          
          $statement->execute();

            //Returns an array containing all of the remaining rows in the result set
          $count = $statement->rowCount();
          if($count==1){
          $row = $statement->fetch();
            echo'
                  <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="cycle"/>
                  <h2>'.$row['productName'].'</h2>
                    <p class="price">£ '.$row['price'].'</p>
                    <p>'.$row['productDescription'].'</p>

                    <form method="post" action="basket.php">
                    <input type="hidden" name="getbasket" value="'.$row['productID'].'">
                    <button style="background: black; color: white; padding: 1rem;" type="submit" class="cartbtn" name="basket" >Add Cart</button>
                    </form>

                    
            ';}
          }
          ?>

    </main>
    <footer>
        <?php include 'footer.php';?>
    </footer>    
    <script src="js/main.js"></script>
</body>
</html>