var facebook = require('./modules/facebook');
const instagram = require('./modules/instagram');

// instagram.connect();
facebook.getAcces();

window.addEventListener('DOMContentLoaded', function() {
  const menu = require('./modules/nav');
  menu.set();


  const photowall = document.querySelector('.photowall');
  if ( photowall ) {
    instagram.connect();
  }

  if (document.querySelector('.setlist--item')) {
    require('./modules/setlist');
  }
}, false);
