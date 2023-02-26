//Set the Cookie
function setCookie(cname, cvalue ){
    document.cookie =cname+"="+cvalue;
    
  }
  
  // Find the accessibility cookie
  function findCookie(){
  
    const cookieValue = document.cookie
    .split('; ')
    .find((row) => row.startsWith('accessibility='))
    ?.split('=')[1];
  
    return cookieValue;
  }
  
  //Check the cookie value and change image link in slideshow
  function getAccessibility(){
      if(findCookie() == 'bike'){
        document.getElementById('s1').src="images/bike_pic1.jpg";
        
      }
      else if (findCookie() == 'bike2') {
        document.getElementById('s1').src="images/bike_pic2.jpg";
      }
      else if (findCookie() == 'bike3') {
        document.getElementById('s1').src="images/bike_pic3.jpg";
      }
      else if (findCookie() == 'bike4') {
        document.getElementById('s1').src="images/bike_pic4.jpg";
      }
      else if (findCookie() == 'bike5') {
        document.getElementById('s1').src="images/bike_pic5.jpg";
      }
    }
    
    
  