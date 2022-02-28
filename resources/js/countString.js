const textArea = document.querySelector('#opinion');
const length = document.querySelector('#opinion-length');
textArea.addEventListener('input', () => {
  length.textContent = textArea.value.length;
}, false);