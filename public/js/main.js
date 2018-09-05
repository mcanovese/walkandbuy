function scroll() {
var navLeft = document.getElementById("MyNavLeft");
var navRight = document.getElementById("MyNavRight");

var img = document.getElementById("myImg");
var imgLittle = document.getElementById("myImgLittle");
var header = document.getElementById("myHeader");
var subHead = document.getElementById("subHead");
var sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");

      navRight.classList.remove("navbar-right");
      navLeft.classList.remove("navbar-left");
      
      subHead.classList.add("hidden");
      subHead.classList.remove("flex");


      navRight.classList.add("navbar-right-sticky");
      navLeft.classList.add("navbar-left-sticky");

      img.classList.add("hidden");
      imgLittle.classList.remove("hidden");

      document.getElementById("myBtn").style.display = "block";
    } else {
      header.classList.remove("sticky");


      navRight.classList.add("navbar-right");
      navLeft.classList.add("navbar-left");

      subHead.classList.remove("hidden");
      subHead.classList.add("flex");


      navRight.classList.remove("navbar-right-sticky");
      navLeft.classList.remove("navbar-left-sticky");

      img.classList.remove("hidden");
      imgLittle.classList.add("hidden");

      document.getElementById("myBtn").style.display = "none";
    }
  }
  
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }