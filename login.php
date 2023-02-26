<?php include 'connect.php';?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/title.png"/>
    <title>Bike King Border</title>
    <meta name="author" content="Anthony Rozario">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header>
      <?php include 'header.php';?> 
    </header>

    <main>
        <h2>Staff Login</h2>
        <p>Please enter your details below to login</p>
        <p>&nbsp;</p>
        <div class="lcontainer">        
            <form method="post" action="staff.php">
                <div class="form-group">
                    <label for="emailbox">Email address</label>
                    <input type="email" id="emailbox" name="checkemail" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="passwordbox">Password</label>
                    <input type="password" id="passwordbox" name="checkpass" placeholder="Password">
                </div>

                <input type="submit" name="staffLogin" value="Login">
            </form>
        </div>
    </main>
    <footer>
        <?php include 'footer.php';?>
    </footer>    
    <script src="js/main.js"></script>
</body>
</html>