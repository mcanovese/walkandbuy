function myFunction() {
var navLeft = document.getElementById("MyNavLeft");
var navRight = document.getElementById("MyNavRight");
var navCenter = document.getElementById("MyNavCenter");
var img = document.getElementById("myImg");
var imgLittle = document.getElementById("myImgLittle");
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");

      navRight.classList.remove("navbar-right");
      navLeft.classList.remove("navbar-left");

      navCenter.classList.add("navbar-center-sticky");
      navRight.classList.add("navbar-right-sticky");
      navLeft.classList.add("navbar-left-sticky");

      img.classList.add("hidden");
      imgLittle.classList.remove("hidden");
    } else {
      header.classList.remove("sticky");

      navCenter.classList.add("navbar-center");
      navRight.classList.add("navbar-right");
      navLeft.classList.add("navbar-left");

      navCenter.classList.remove("navbar-center-sticky");
      navRight.classList.remove("navbar-right-sticky");
      navLeft.classList.remove("navbar-left-sticky");

      img.classList.remove("hidden");
      imgLittle.classList.add("hidden");
    }
  }