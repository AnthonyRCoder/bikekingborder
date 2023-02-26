<?php include 'connect.php'; ?>

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

  <?php
  $bqty = 0;

   if(isset($_GET['action'])){

        if($_GET['action']=="del"){
            $productID = $_GET['productID'];
            
            $statement=$DB->prepare("DELETE FROM basketitems WHERE productID = '$productID'");
            $statement->execute();
        
        Echo 'Database successfully delete!';
        }  

    }

    

    if(isset($_GET['add'])){
                
        $pID = $_GET['pid'];
        $bqty = $_GET['qty'] + 1;

    $statement=$DB->prepare("UPDATE basketitems
                            SET quantity = '$bqty'
                            WHERE productID = '$pID'
                            ");
    $statement->execute();   

    Echo 'Database successfully Update!';
    }
  

$total = 0;

if(isset($_POST['basket'])) {

    $productID = $_POST['getbasket'];
    $bqty = 0;
    $bID = 0;
    

    $statement = $DB->prepare("SELECT * FROM basketitems WHERE productID = '$productID'");
    
    $statement->execute();

    $count = $statement->rowCount();

    if($count > 0){        

      echo "<h2>All ready Have this Products Added</h2>";
    
    } else {
        $productID = $_POST['getbasket'];
        $bID = $productID;
        $bqty = 1;
        $statement = $DB->prepare("INSERT INTO basketitems (basketID, quantity, productID) 
                                    VALUES ($bID, '$bqty', '$productID') ");
        $statement->execute();

        Echo 'Database successfully added!';
    }
}




?>

<h1 class="basket-header">Shopping Basket</h1>
<div class="basket">
    <?php
     //Prepares an SQL statement to be executed by the execute() method

     $statement = $DB->prepare("SELECT * FROM basketitems, products where basketitems.productID = products.productID"); //change to your 'table' name
              
     //Executes a prepared statement
         
         $statement->execute();
          //Returns an array containing all of the remaining rows in the result set 
        $rows = $statement->fetchAll();
         if(count($rows) > 0){

         $record = 0;    

        while($record < count($rows)){
            echo '<div class="basketItem">';
            echo '  <div class="productImage">';
            echo '      <p class="productImg"><img class="listImage" id="productItem" src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']) . '" alt=""/></p>';
            echo '  </div>';
            echo '  <div class="basket_details">';
            echo '      <p class="productCode">Code - '.$rows[$record]['productCode'].'</p>';
            echo '      <p class="productName">'.$rows[$record]['productName'].'</p>';
            echo '      <p class="productPrice">£ '.$rows[$record]['price'].'</p>';
            echo '      <p class="productQuantity">Qty - '.$rows[$record]['quantity'].'</p>';
            echo '  </div>';
            echo '  <p class="basketItem-delete"><a href="basket.php?productID='.$rows[$record]['productID'].'&action=del"><i class="fas fa-trash-alt"></i></a></p>';

            echo '  <form action="basket.php" method="get">
                        <input type="hidden" name="pid" value="'.$rows[$record]['productID'].'">
                        <input type="hidden" name="qty" value="'.$rows[$record]['quantity'].'">
                        <button type="submit" name="add"><i class="fa fa-plus"></i></button>
                    </form>
                    <p>&nbsp;</p>
                    ';
            echo '</div>';
            
            $total = $total + ($rows[$record]['price'] * $rows[$record]['quantity']);
            $record++;    
        }}
    ?>

    </div>
    <div class="basket-total">
        <h1>Total</h1>
        <h1>£ <?=number_format($total, 2, ".", ",");?></h1>
    </div>

    <form action="products.php" method="get">
    <button type="submit" name="pay" class="button pay">Proceed to Payment</button>
    </form>

  </main>
  <footer>
      <?php include 'footer.php';?>
  </footer>    
    <script src="js/main.js"></script>
</body>
</html>