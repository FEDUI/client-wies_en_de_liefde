'use strict';

// Or make this with placeholders, that's better!

var template = {};
var Handlebars = require('handlebars');

template.render = function(events, templateHTML, destination) {

  var _events = events;

  var container = document.querySelector(templateHTML).innerHTML;
	var HTMLTemplate = Handlebars.compile(container);
	var html = HTMLTemplate(_events);
	document.querySelector(destination).innerHTML = html;

};

module.exports = template;
