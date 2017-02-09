'use strict';

// Or make this with placeholders, that's better!

var template = {};
var Handlebars = require('../lib/handlebars');
Handlebars.registerHelper('ifCond', function(v1, v2, options) {
  if (v1 === v2) {
    return options.fn(this);
  }
  return options.inverse(this);
});

template.render = function(events, templateHTML, destination) {

  var _events = events;

  var container = document.querySelector(templateHTML).innerHTML;
	var HTMLTemplate = Handlebars.compile(container);
	var html = HTMLTemplate(_events);
	document.querySelector(destination).innerHTML = html;

};

module.exports = template;
