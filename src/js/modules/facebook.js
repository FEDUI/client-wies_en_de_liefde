'use strict';

var keys = require('./keys');
var filter = require('./filter');

var facebook = {};
var eventLink = {};

facebook.getAcces = function() {

  var getAccesUrl = 'https://graph.facebook.com/oauth/access_token?client_id=' + keys.fb.id + '&client_secret=' + keys.fb.secret + '&grant_type=client_credentials';
  if ( window.location.pathname === '/' || window.location.pathname === '/agenda' || window.location.pathname === '/agenda/' ) {
    facebook.APICall(getAccesUrl, facebook.getData);
  }
  if ( window.location.pathname === '/' || window.location.pathname === '/nieuws' || window.location.pathname === '/nieuws/' ) {
    facebook.APICall(getAccesUrl, facebook.getPosts);
  }
};

// Get the data from Facebook
facebook.getData = function(accessToken) {

  var limit = '';
  if ( window.location.pathname === '/' ) {
    limit = '.limit(10)';
  }

  var _accessToken = accessToken.access_token;
  var url = 'https://graph.facebook.com/' + keys.fb.user + '/?fields=events' + limit + '&access_token=' + _accessToken;
  facebook.APICall(url, filter.events);

};



// Get the data from Facebook
facebook.getPosts = function(accessToken) {

  var _accessToken = accessToken.access_token;

  // if on the homepage, just get 3 hits
  var limit = '';
  if ( window.location.pathname === '/' ) {
    limit = '.limit(3)';
  }


  var url = 'https://graph.facebook.com/' + keys.fb.user + '/?fields=posts' + limit + '&access_token=' + _accessToken;
  facebook.APICall(url, facebook.getEntirePost, _accessToken);

};

facebook.getPostDetails = function(postId, accessToken, postAmount) {

  var url = 'https://graph.facebook.com/' + postId + '/attachments/?access_token=' + accessToken;
  facebook.APICall(url, filter.posts, postAmount);

};

facebook.getEntirePost = function(data, accessToken) {

  var _data = data;
  var posts = _data.posts.data;
  var postAmount = posts.length;

  posts.forEach(function(post) {

    var postDate = post.created_time;
    var postId = post.id;

    eventLink[postId] = postDate;

    facebook.getPostDetails(postId, accessToken, postAmount);

  });

};


















facebook.APICall = function(url, callback, token) {

  var _url = url;
  var xhttp = new XMLHttpRequest();
  xhttp.onloadend = function() {
      if (xhttp.response) {
        var res = JSON.parse(xhttp.response);
        if (token) {
          callback(res, token);
        } else {
          callback(res);
        }
      }
  };
  xhttp.open('GET', _url, true);
  xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhttp.send();
};


module.exports = facebook;
