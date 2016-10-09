'use strict';

// Or make this with placeholders, that's better!

var template = {};
var Handlebars = require('handlebars');

template.render = function(events) {

  var _events = events;

  var eventsContainer = document.querySelector('#calendar-template').innerHTML;
	var HTMLTemplate = Handlebars.compile(eventsContainer);
	var html = HTMLTemplate(_events);
	document.querySelector('.eventList').innerHTML = html;

};

module.exports = template;
