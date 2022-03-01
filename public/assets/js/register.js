/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/register/register.js ***!
  \*******************************************/
function animatedForm() {
  var arrows = document.querySelectorAll('.fa-arrow-down');
  arrows.forEach(function (arrow) {
    arrow.addEventListener('click', function () {
      var input = arrow.previousElementSibling;
      var parent = arrow.parentElement;
      var nextForm = parent.nextElementSibling;

      if (input.type === 'text' && validateUser(input)) {
        nextSlide(parent, nextForm);
      } else if (input.type === 'email' && validateEmail(input)) {
        nextSlide(parent, nextForm);
      } else if (input.type === 'password' && validatePassword(input)) {
        nextSlide(parent, nextForm);
      } else {
        parent.style.animation = 'shake 0.5s ease';
      }

      parent.addEventListener('animationend', function () {
        parent.style.animation = '';
      });
    });
  });
}

function validateUser(user) {
  if (user.value.length < 6) {
    console.log('not enough characters');
    error('rgb(96, 97, 96)');
  } else {
    error('rgb(245, 248, 246)');
    return true;
  }
}

function validateEmail(email) {
  var validation = /[a-zA-z]\w{1,30}@\w{1,30}\.\w{1,5}$/;

  if (validation.test(email.value)) {
    error('rgb(245, 248, 246)');
    return true;
  } else {
    error('rgb(96, 97, 96)');
  }
}

function validatePassword(pass) {
  var validation = /\w{5,30}/;

  if (validation.test(pass.value)) {
    error('rgb(245, 248, 246)');
    return true;
  } else {
    error('rgb(96, 97, 96)');
  }
}

function error(color) {
  document.getElementById("login").style.backgroundColor = color;
}

function nextSlide(parent, nextForm) {
  parent.classList.add('innactive');
  parent.classList.remove('active');
  nextForm.classList.add('active');
}

animatedForm();
/******/ })()
;