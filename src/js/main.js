var facebook = require('./modules/facebook');
const instagram = require('./modules/instagram');

window.addEventListener('DOMContentLoaded', function() {
  // Menu
  const menu = require('./modules/nav');
  menu.set();

  // Modernizr to check for the CSS mask of the SVG
  require('./lib/modernizr-custom.min');

  // set the placeholder for the mailchimp form
  if ( document.querySelector('.footer--newsletter') ) {
    require('./modules/newsletter');
  }

  // Facebook (check is in facebook.js)
  facebook.getAcces();

  if ( document.querySelector('.pictures') ) {
    instagram.connect();
  }

  if (document.querySelector('.setlist--item')) {
    require('./modules/setlist');
  }

  if (document.querySelector('.bandmember')) {
    require('./modules/about');
  }

  setTimeout(function() {
    document.querySelector('body').classList.add('js-clip');
  }, 100);

}, false);
