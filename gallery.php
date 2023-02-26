

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/title.png"/>
    <title>Bike King Border</title>
    <meta name="author" content="Anthony Rozario">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gallery.css">
</head>
<body onload="getAccessibility();">
  <header>
      <?php include 'header.php';?> 
    </header>

  <main>
    <h1>Our Gallery</h1>
        <p>View our amazon image in all their bike glory</p>
        <div class="container" >
            <div class="card">
            <a href="products.php" onclick="setCookie('accessibility','bike');getAccessibility();">
            <img id="bike1" src="images/bike_pic1.jpg">
            </a>
              <div class="card__head">Friendship</div>
            </div>
            <div class="card">
            <a href="products.php" onclick="setCookie('accessibility','bike2');getAccessibility();">
              <img id="bike2" src="images/bike_pic2.jpg" >
            </a>
              <div class="card__head">Mountain Biking</div>
            </div>
            <div class="card">
            <a href="products.php" onclick="setCookie('accessibility','bike3');getAccessibility();">
              <img id="bike3" src="images/bike_pic3.jpg">
              </a>
              <div class="card__head">Racing</div>
            </div>
            <div class="card" onclick="setCookie('accessibility','bike3');getAccessibility();">
            <a href="products.php">
              <img id="bike4" src="images/bike_pic4.jpg">
              </a>
              <div class="card__head">Showing Off</div>
            </div>
            <div class="card">
            <a href="products.php" onclick="setCookie('accessibility','bike3');getAccessibility();">
              <img id="bike5" src="images/bike_pic5.jpg">
              </a>
              <div class="card__head">Braveness</div>
            </div>
          </div>

  </main>
  <footer>
      <?php include 'footer.php';?>
  </footer>    
    <script src="js/main.js"></script>
    <script src="js/cookies.js"></script>
</body>
</html>
