var facebook = require('./modules/facebook');
const instagram = require('./modules/instagram');

// instagram.connect();
facebook.getAcces();

window.addEventListener('DOMContentLoaded', function() {
  const menu = require('./modules/nav');
  menu.set();

  if ( document.querySelector('.pictures') ) {
    instagram.connect();
  }

  if (document.querySelector('.setlist--item')) {
    require('./modules/setlist');
  }

  if (document.querySelector('.bandmember')) {
    require('./modules/about');
  }

}, false);
