'use strict';

var keys = require('./keys');
var filter = require('./filter');

var facebook = {};

facebook.getAcces = function() {

  var getAccesUrl = 'https://graph.facebook.com/oauth/access_token?client_id=' + keys.fb.id + '&client_secret=' + keys.fb.secret + '&grant_type=client_credentials';
  facebook.APICall(getAccesUrl, facebook.getData);

};

// Get the data from Facebook
facebook.getData = function(accessToken) {

    var _accessToken = accessToken;
    var url = 'https://graph.facebook.com/' + keys.fb.user + '/?fields=events&' + _accessToken;
    facebook.APICall(url, filter.events);

};

facebook.APICall = function(url, callback) {

    var _url = url;
    var xhttp = new XMLHttpRequest();
    xhttp.onloadend = function() {
        if (xhttp.response) {
            callback(xhttp.response);
        }
    };
    xhttp.open('GET', _url, true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();

};


module.exports = facebook;
