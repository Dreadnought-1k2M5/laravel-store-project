import './bootstrap';

// Get the modal
var modal = document.getElementById("registerModalId");

// Get the button that opens the modal
var btn = document.getElementById("signupBtnId");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("modal__exit-btn")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  document.body.style.overflow = "hidden";

}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  document.body.style.overflow = "auto";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
  }
}


let loginBtn = document.getElementById("loginBtnId");

let loginForm = document.getElementById("loginFormId");

let isClicked = false;

loginBtn.onclick = function() {
  isClicked = !isClicked;
  if(isClicked){
    loginForm.style.display = "block";
    loginForm.style.color = "red";
  }else{
    loginForm.style.display = "none";
  }
}