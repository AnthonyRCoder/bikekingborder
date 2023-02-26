<?php include 'connect.php';


        // open Hours--------------------------------------------------------- 
            if(isset($_POST['ohbtn'])){
                
                $ohweek = $_POST['ohweek'];
                $chweek = $_POST['chweek'];
                $ohsat = $_POST['ohsat'];
                $chsat = $_POST['chsat'];
                $ohsun = $_POST['ohsun'];
                $chsun = $_POST['chsun'];

                $statement=$DB->prepare("UPDATE company 
                                         SET weekDayOpen = '$ohweek', weekDayClose = '$chweek', saturdayOpen ='$ohsat', saturdayClose ='$chsat', sundayOpen = '$ohsun', sundayClose = '$chsun'");
                $statement->execute();
                Echo 'Database successfully updated!';
            }
  
            // Product------------------------------------------------------
            if(isset($_POST['upbtn'])){

            $pID = $_POST['pID'];
            $pname = $_POST['pname'];
            $pmfr = $_POST['pmfr'];
            $pprice = $_POST['pprice'];
            $pcag = $_POST['pcag'];
            
            $statement=$DB->prepare("UPDATE products 
                                    SET productName = '$pname', manufacturer = '$pmfr',  price = '$pprice', category = '$pcag' 
                                    WHERE productID = '$pID'");
                $statement->execute();

                Echo 'Database successfully updated!';
            }

            // Offer------------------------------------------------------
            if(isset($_POST['uofbtn'])){

                $oprice = $_POST['oprice'];

                $statement=$DB->prepare("UPDATE offers
                                         SET price = '$oprice'
                                         WHERE offerID = '".$_POST['oID']."'");
                $statement->execute();

                Echo 'Database successfully updated!';
            }
    
            if(isset($_POST['aofbtn'])){
                $oprice = $_POST['oprice'];
                $opID = $_POST['opID'];
            
            $statement = $DB->prepare("INSERT INTO offers (offerID, price, productID) 
                                        VALUES (NULL, '$oprice', '$opID') ");
            $statement->execute();

            Echo 'Database successfully added!';
            }

            if(isset($_POST['dofbtn'])) {

                $opID = $_POST['opID'];        
                $statement=$DB->prepare("DELETE FROM offers WHERE '$opID' = productID");
                $statement->execute();

                Echo 'Database successfully Delete!';

            } 

        //User--------------------------------------------------------------------
            if(isset($_POST['uubtn'])){
                
                $uID = $_POST['uID'];
                $uemail = $_POST['uemail'];
                $ufirst = $_POST['ufirst'];
                $usec = $_POST['usec'];
                $uhome = $_POST['uhome'];
                $ustr = $_POST['ustr'];
                $ucty = $_POST['ucty'];
                $upte = $_POST['upte'];
               
                

                $statement=$DB->prepare("UPDATE users 
                                        SET emailAddress = '$uemail', firstName = '$ufirst', lastName = '$usec', houseNumber = '$uhome', street = '$ustr', city = '$ucty', postcode = '$upte' 
                                        WHERE userID = '$uID'");
                $statement->execute();
                
                Echo 'Database successfully updated!';
            }

             //if statement to check if the update button has been clicked
            //if true, delete the record with the id 
            if(isset($_POST['dubtn'])) {

                $uID = $_POST["uID"];
                $uemail = $_POST['uemail'];        
                $statement=$DB->prepare("DELETE FROM users WHERE userID = '$uID'");
                $statement1=$DB->prepare("DELETE FROM logins WHERE '$uemail' = emailAddress");
                $statement->execute();
                $statement1->execute();

                Echo 'Database successfully Delete!';

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
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>
</head>
<body>

  <header>
      <?php include 'header.php';?> 
    </header>
    <?php

        if(isset($_SESSION["staffdb"])) {
            echo "<h1>You have logged in.</h1>"; 
            
        }
        else if(isset($_POST['staffLogin'])){

        //Check login credentials

                //Store the username and password, use trim() to removing any spaces

      $username = trim($_POST['checkemail']);
      $username = "admin@bikeking.co.uk";
      $password = trim($_POST['checkpass']);
      $salt ="4g£yc7";
        $password = md5($password.$salt);
      

        //prepare Database query statement, to find the staff credentials submitted
        $statement=$DB->prepare("SELECT * FROM logins WHERE emailAddress ='$username' AND password ='$password'");
        $statement->execute(); //sends the query to the sql database

          //if successful then the database should generate 1 row that matches our login details
          $count =$statement->rowCount();
          if($count==1) {
            //Create a global session variable, set to true when a user is logged in
            $_SESSION["staffdb"] = true; 
              echo "<h1>You have logged in.</h1>";
            }
            else {
              echo "<h1>Error logging in, please try again...</h1>
              <a class='staffbtn'  href='login.php'>login</a></h1>";

          }    
          
          }
          else {
          echo "<h1>You don't have permission to see this page. <br>
          <a class='staffbtn'  href='login.php'>login</a></h1>";
          }

?>

          
<main>

<?php
 if(isset($_SESSION["staffdb"])) {

//Prepares an SQL statement to be executed by the execute() method

$statement = $DB->prepare("SELECT * FROM company"); //change to your 'table' name
              
//Executes a prepared statement
    
    $statement->execute();
        
//Returns an array containing all of the remaining rows in the result set
    
    $result = $statement->fetchAll();
    /*if(isset($_POST["ohbtn"])) {

    $default = get_option('ohweek');
    $default = get_option('chweek');
    $default = get_option('ohsat');
    $default = get_option('chsat');
    $default = get_option('ohsun');
    $default = get_option('chsun');
    if( $default == "")
    {
        $default = $result['weekOpenDay'];
        foreach ($default as $dft) {
        $dft['weekOpenDay'];
        $dft['weekOpenDay'];
        $dft['saturdayOpenDay'];
        $dft['saturdayCloseDay'];
        $dft['sundayOpenDay'];
        $dft['sundayCloseDay'];
        }
    }
}     */
if($result){
    foreach ($result as $rs) {
        echo'<section class="position">
            <div class="pos-card top-centre">
                <div class="card-image">
                <h5 class="pos-text"> Opening Hours</h5>
                <form method="post" action="staff.php">
                  <label for="ohweek">Mon - Fri Open Hours:</label>
                      <input type="text" name="ohweek" value="'.$rs['weekDayOpen'].'"><br><br>

                  <label for="chweek">Mon - Fri Close Hours:</label>
                      <input type="text" name="chweek" value="'.$rs['weekDayClose'].'"><br><br>
                      
                  <label for="ohsat">Sat Open Hours:</label>
                      <input type="text" name="ohsat" value="'.$rs['saturdayOpen'].'"><br><br>

                    <label for="chsat">Sat Close Hours:</label>
                      <input type="text" name="chsat" value="'.$rs['sundayClose'].'"><br><br>

                      <label for="ohsun">Sun Open Hours:</label>
                      <input type="text" name="ohsun" value="'.$rs['sundayOpen'].'"><br><br>

                      <label for="chsun">Sun Close Hours:</label>
                      <input type="text" name="chsun" value="'.$rs['sundayClose'].'"><br><br>
    

                      <input type="submit" name="ohbtn"
                              value="Edit"/>
                  </form>
                </div>
            </div>   ';}
        }
    ?>
    <?php



          echo'  <div class="pos-card bottom-centre">
                <div class="card-image">
                <h5 class="pos-text">Update Product </h5>
                <label for="pname">Product ID:</label>
                    <form action="staff.php" method="get">
                        <input type="text" name="pid" placeholder="Enter to Update"><br><br>
                        <input type="submit" value="Search">
                    </form>
                
                
                ';
                if(isset($_GET['pid'])){
                    $pid = $_GET['pid'];
                
                    //Prepares an SQL statement to be executed by the execute() method
                
                    $statement = $DB->prepare("SELECT * FROM products WHERE productID = '$pid'"); //change to your 'table' name
                                
                    //Executes a prepared statement
                        
                        $statement->execute();
                        
                        //Returns an array containing all of the remaining rows in the result set
                        $count = $statement->rowCount();
                        if($count==1){
                        $row = $statement->fetch();
                        echo'
                <form method="post" action="staff.php">

                <label for="pID">Product ID: '.$row['productID'].'</label><br><br>
                <input type="hidden" name="pID" value="'.$row['productID'].'">
                
                  <label for="pname">Product Name:</label>
                      <input type="text" name="pname" value="'.$row['productName'].'"><br><br>

                      <label for="pmfr">Manufacturer:</label>
                      <input type="text" name="pmfr" value="'.$row['manufacturer'].'"><br><br>

                  <label for="pprice">Product Price:</label>
                      <input type="text" name="pprice" value="'.$row['price'].'"><br><br>
                      
                  <label for="pinfo">Product Info:</label>
                      <input type="text" name="pinfo" value="'.$row['productDescription'].'"><br><br>

                      <label for="pcag">Category:</label>
                      <input type="text" name="pcag" value="'.$row['category'].'"><br><br>';

                      //<input type="file" name="pcag" value=src="data:image/jpeg;base64,'.base64_encode($row['image']).'" ><br><br>

                    echo'  <input type="submit" name="upbtn"
                              value="Update"/>
                  </form>
                </div>
            </div>';}}
            ?>
            <?php
            
            echo'
            <div class="pos-card top-right">
                <div class="card-image">
                <h5 class="pos-text"> Add/Update/Delete Offers</h5>
                <label for="fid">Offer ID:</label>

                <form action="staff.php" method="get">
                        <input type="text" name="fid"  placeholder="To Add Offer leave it blank "><br><br>
                        <input type="submit" value="Search">
                    </form>
                
                
                ';
                
                if(isset($_GET['fid'])){
                    $fid = $_GET['fid'];

                    //Prepares an SQL statement to be executed by the execute() method
                
                    $statement = $DB->prepare("SELECT * FROM offers WHERE offerID = '$fid'"); //change to your 'table' name
                                
                    //Executes a prepared statement
                        
                        $statement->execute();
                        
                        //Returns an array containing all of the remaining rows in the result set
                        $result = $statement->fetchAll();

                        if($result){
                            foreach ($result as $rs) {
                       
                        echo'
                <form method="post" action="staff.php">

                <label for="oID">Offer ID: '.$rs['offerID'].'</label><br><br>
                  <input type="hidden" name="oID" value="'.$rs['offerID'].'">

                    <label for="opID">Product ID: '.$rs['productID'].'</label><br><br>
                    <input type="hidden" name="opID" value="'.$rs['productID'].'">

                  <label for="oprice">Offer Price:</label>
                      <input type="text" name="oprice" value="'.$rs['price'].'"><br><br>

                      <input type="submit" name="uofbtn"value="Update"/>
                      <input type="submit" name="dofbtn"value="Delete"/>
                  </form>';}
                
                
                
                }else{
           
                  
                  echo'
                <form method="post">

                  <label for="oID">Offer ID:</label>
                      <input type="hidden" name="oID"><br><br>

                      <label for="opID">Product ID:</label>
                      <input type="text" name="opID" placeholder="Enter"><br><br>

                  <label for="oprice">Offer Price:</label>
                      <input type="text" name="oprice" placeholder="Enter"><br><br>
                      
                      <input type="submit" name="aofbtn"
                              value="Add"/>
                  </form>';

                echo
                '</div>
            </div>';}}
            ?>
            <?php
        
       echo'
            <div class="pos-card top-centre">
                <div class="card-image">
                    <h5 class="pos-text"> Update/Delete Customer</h5>
                    <label for="uid">User ID</label>
                    <form action="staff.php" method="get">
                        <input type="text" name="uid" placeholder="Enter to Update"><br><br>
                        <input type="submit" value="Search">
                    </form>
                
                
                ';
                if(isset($_GET['uid'])){
                    $uid = $_GET['uid'];

                     //Prepares an SQL statement to be executed by the execute() method
        
                    $statement = $DB->prepare("SELECT * FROM users WHERE userID = '$uid'"); //change to your 'table' name
                                
                    //Executes a prepared statement
                        
                        $statement->execute();
                            
                    //Returns an array containing all of the remaining rows in the result set
            
                    $result = $statement->fetchAll();
            
            if($result){
                foreach ($result as $rs) {
            
            echo'
                    <form method="post" action="staff.php">

                    <label for="uID">User ID: '.$rs['userID'].'</label>
                        <input type="hidden" name="uID" value="'.$rs['userID'].'"><br><br>

                    <label for="uemail">email:</label>
                        <input type="text" name="uemail" value="'.$rs['emailAddress'].'"><br><br>
                        
                    <label for="ufirst">first name:</label>
                        <input type="text" name="ufirst" value="'.$rs['firstName'].'"><br><br>

                        <label for="usec">last name:</label>
                        <input type="text" name="usec" value="'.$rs['lastName'].'"><br><br>

                        <label for="uhome">house number:</label>
                        <input type="text" name="uhome" value="'.$rs['houseNumber'].'"><br><br>
                        
                        <label for="ustr">street:</label>
                        <input type="text" name="ustr" value="'.$rs['street'].'"><br><br>

                        <label for="ucty">city:</label>
                        <input type="text" name="ucty" value="'.$rs['city'].'"><br><br>

                        <label for="upte">postcode:</label>
                        <input type="text" name="upte" value="'.$rs['postCode'].'"><br><br>

                        <label for="usub">subsrciption:</label>
                        <input type="text" name="usub" value="'.$rs['subscription'].'"><br><br>

                        <input type="submit" name="uubtn"
                                value="Update"/>

                        <input type="submit" name="dubtn"
                        value="Delete"/>
                    </form>
                </div>
            </div>              
        </section>';}}}

                }
    
        ?>
        
        
        
        

  </main>
  <footer>
      <?php include 'footer.php';?>
  </footer>    
    <script src="js/main.js"></script>
</body>
</html>
