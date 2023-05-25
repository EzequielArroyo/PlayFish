var boton=document.querySelector(".header_menu")
var menu=document.querySelector(".header__nav")

var cont=0

boton.onclick=function() {
  if (cont%2==0) {
    menu.classList.add("header__nav--active")
    menu.classList.remove("header__nav--disabled")
  }
  else {
    menu.classList.remove("header__nav--active")
    menu.classList.add("header__nav--disabled")
  }
  cont++

}
