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
  
</head>
<body>
  <header>
      <?php include 'header.php';?> 
    </header>

  
  <main>  
  <h1>Register a new user</h1>
        <p>Please enter your details below to register your information</p>
        <p>&nbsp;</p>

      <div class="lcontainer">
        <form method="post" >

                <label for="inputbox">first name</label>
                <input type="text" id="inputbox" name="ufirst" placeholder="Enter firstname" required><br><br>

                <label for="usec">last name</label>
                <input type="text" id="inputbox" name="usec" placeholder="Enter lastname" required><br><br>

                <label for="uhome">house number</label>
                <input type="text" id="inputbox" name="uhome" placeholder="Enter house number" required><br><br>
                
                <label for="ustr">street</label>
                <input type="text" id="inputbox" name="ustr" placeholder="Enter street" required><br><br>

                <label for="ucty">city</label>
                <input type="text" id="inputbox" name="ucty" placeholder="Enter city" required><br><br>

                <label for="upte">postcode</label>
                <input type="text" id="inputbox" name="upte" placeholder="Enter postcode" required><br><br>

                <!--<input type="checkbox" name="usub"><br><br>-->

                <label for="emailbox">Email address</label>
            <input type="email" id="emailbox" name="newemail" placeholder="Enter email" required>

                <label for="passwordbox">Password</label>
            <input type="password" id="passwordbox" name="newpass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <input type="submit" value="Register" name="newlogin">
          </form>

          <?php
     
         ?>
        <?php
        include 'connect.php';

          //if statement to check if the form button has been clicked

          if(isset($_POST['newlogin'])) {


              $statement = $DB->prepare("SELECT * FROM logins WHERE emailAddress = '".$_POST['newemail']."'");
              
              $statement->execute();

              $count = $statement->rowCount();

              if($count > 0){

                echo "<h2>Email already taken, please try again...</h2>";
                
              } else {

                $ufirst = $_POST['ufirst'];
                $usec = $_POST['usec'];
                $uhome = $_POST['uhome'];
                $ustr = $_POST['ustr'];
                $ucty = $_POST['ucty'];
                $upte = $_POST['upte'];
                $usub = 1;
            

              $email = trim($_POST['newemail']);
              $password = trim($_POST['newpass']);
              $salt ="4g£yc7";
              $password = md5($password.$salt);

              //Pass the variable values to be inserted into the database

              $statement1 = $DB->prepare("INSERT INTO users (userID, emailAddress, firstName, lastName, houseNumber, street, city, postcode, subscription) 
                                               VALUES (NULL,'$email', '$ufirst','$usec', '$uhome', '$ustr', '$ucty', '$upte', '$usub')");
                  
              $statement = $DB->prepare("INSERT INTO logins (userID, emailAddress, password, salt)
                                         VALUES (NULL, '$email', '$password', '$salt')");

              $statement->execute();
              $statement1->execute();

              echo "<h2>Success, you have registered your details  !</h2>
                    <h1> WELCOMES $ufirst $usec";

              } 
          }

          ?>
        </div>

        
        <div id="message">
          <h3>Password must contain the following:</h3>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        <script src="js/pswvalidation.js"></script>

        
  </main>
  <footer>
      <?php include 'footer.php';?>
  </footer>    
    <script src="js/main.js"></script>
</body>
</html>
