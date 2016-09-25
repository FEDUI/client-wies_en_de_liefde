'use strict';

// Facebook API Call
// Callback based

var facebook = {};
var spinner = require('./spinner');
var keys = require('./keys');
var filter = require('./filter');

var accessToken;

facebook.set = function() {

    // Start spinner and start the facebook req
    spinner.start();
    facebook.getAcces();

}

// Request acces to the Facebook api
facebook.getAcces = function() {

    // The url needed to get acces
    var getAccesUrl = "https://graph.facebook.com/oauth/access_token?client_id=" + keys.id + "&client_secret=" + keys.secret + "&grant_type=client_credentials";

    // Make the acces Request and send the accessToken to the facebook.getData function
    accessToken = facebook.APICall(getAccesUrl, facebook.getPosts);

}

// Get the data from Facebook
facebook.getPosts = function(accessToken) {

    // The received acces token
    var _accessToken = accessToken;

    // The url to get the data
    var url = "https://graph.facebook.com/" + keys.user + "/?fields=posts&" + _accessToken;

    // Request the data and send this to the facebook.filterData function
    facebook.APICall(url, facebook.getEntirePost, accessToken);

}

facebook.getPostDetails = function(postId, accessToken) {

    var _postId = postId;

    var url = "https://graph.facebook.com/" + _postId + "/attachments?" + accessToken;
    facebook.APICall(url, filter.posts);

}

facebook.getEntirePost = function(data, accessToken) {

    var _data = JSON.parse(data);
    console.log(_data);
    var posts = _data.posts.data;
    var numberOfPosts = posts.length;
    var counter = 0;

    posts.forEach(function(post) {

        var postId = post.id;
        var entirePost = facebook.getPostDetails(postId, accessToken);

        counter ++;
        if ( counter >= numberOfPosts ) {
            console.log("All Calls are done")
        }

    });

}

// The API call
facebook.APICall = function(url, callback, optional) {

    // The url to make the request
    var _url = url;

    // Start a new xhttp request
    var xhttp = new XMLHttpRequest();
    // If the xhttp req is loaded(done) and there is an response send the data to the callback function
    xhttp.onloadend = function() {
        if (xhttp.response) {
            callback(xhttp.response, optional);
        } else {
            console.log("Fail");
        }
    }
    // Handle the xhttp req
    xhttp.open("GET", _url, true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send();

}

module.exports = facebook;
