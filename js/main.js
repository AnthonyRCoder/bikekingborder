/* Navigation */
const burger = document.querySelector('.fa-bars');
const nav = document.querySelector('.header-nav');

function toggleNav(){
    nav.classList.toggle('nav-active');
    burger.classList.toggle('fa-times');
}

burger.addEventListener('click',function(){
    toggleNav();
});

const cart = document.querySelector('.fa-shopping-cart');
cart.addEventListener('click',function(){
    window.location.pathname='bike/basket.php';
});

const facebook = document.querySelector('.fa-facebook-square');
facebook.addEventListener('click',function(){
    window.location.href='https://www.facebook.com/GlasgowClyde'
});

const instagram = document.querySelector('.fa-instagram');
instagram.addEventListener('click',function(){
    window.location.href='https://www.instagram.com/glasgowclyde/'
});

const twitter = document.querySelector('.fa-twitter');
twitter.addEventListener('click',function(){
    window.location.href='https://twitter.com/Glasgow_Clyde'
});

const cta = document.querySelector('.cta');
cta.addEventListener('click',function(){
    window.location.pathname='bike/products.php';
});

const cta1 = document.querySelector('.cta1');
cta1.addEventListener('click',function(){
    window.location.pathname='bike/products.php';
});

const cta2 = document.querySelector('.cta2');
cta2.addEventListener('click',function(){
    window.location.pathname='bike/products.php';
});
/*const cart1 = document.querySelector('.cartbtn');
cart1.addEventListener('click',function(){
    window.location.pathname='bike/basket.php';
});

const mylogin = document.querySelector('.offerbtn');
mylogin.addEventListener('click',function(){
    document.querySelector('input[type="submit"]').name = "mylogin";

});

const stafflogin = document.querySelector('.staffbtn');
stafflogin.addEventListener('click',function(){
    document.querySelector('input[type="submit"]').name = "stafflogin";

});*/


 const buyButton = document.querySelector(".cartbtn");
   buyButton.addEventListener("click", function(){
    window.location.href = "basket.php";
   });


