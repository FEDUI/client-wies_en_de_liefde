var body = document.querySelector('body');
var toggleButton = document.querySelector('.menu-toggle');

var toggleBreakpoint = 900;
var classListToggle = false;

var menu = {
  set: function() {
    if ( window.innerWidth <= toggleBreakpoint ) {
      toggleButton.addEventListener('click', this.click, false);
    }
    this.resize();
  },

  open: function() {
    body.classList.add('menu-collapse');
    classListToggle = true;
  },

  close: function() {
    body.classList.remove('menu-collapse');
    classListToggle = false;
  },

  click: function() {
    if ( classListToggle === true ) {
      menu.close();
    } else {
      menu.open();
      menu.activateEsc();
    }
  },

  activateEsc: function() {
    window.onkeyup = function(e) {
      if (e.keyCode === 27) { menu.close(); }
    };
  },

  resize: function() {
    window.onresize = function(_this) {
      menu.set();
    };
  }
};

module.exports = menu;
