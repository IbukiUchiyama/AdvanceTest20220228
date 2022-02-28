/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/countString.js ***!
  \*************************************/
var textArea = document.querySelector('#opinion');
var length = document.querySelector('#opinion-length');
textArea.addEventListener('input', function () {
  length.textContent = textArea.value.length;
}, false);
/******/ })()
;