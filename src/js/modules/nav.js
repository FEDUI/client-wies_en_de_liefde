// TODO: add BABEl

const button = document.querySelector('.menu-toggle');
const body = document.querySelector('body');
console.log(button);

function toggleMenu(e) {
  body.classList.toggle('menu-collapse');
}

button.addEventListener('click', toggleMenu);
