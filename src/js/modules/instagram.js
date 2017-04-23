// Require Handlebars as template engine
var Handlebars = require('../lib/handlebars.min.js');
Handlebars.registerHelper('ifCond', function(v1, v2, options) {
  if (v1 === v2) {
    return options.fn(this);
  }
  return options.inverse(this);
});

// Declare instagram
var instagram = {};
// Set all the nessasary keys
var keys = {
    clientId: 'fd3e2ea7da514b7ea84da4d6ad757133',
    accesToken: '3435776989.83b15f9.ab41e9184a4d4a0b86e22f3480afbd07',
    userId: '3435776989',
    photoSize: 'standard_resolution',
    // tags: "" // if needed
};

// The function to call
instagram.connect = function() {
  // create the url
  var url = instagram.createUrl();
  // make the api call
  instagram.APICall(url, instagram.handleData);
};

instagram.createUrl = function() {
  // create the url as a parameter for the php script
  var urlParts = {
    phpFile: '/get.php',
    phpQuery: '?url=',
    base: 'https://api.instagram.com/v1/',
    sort: 'users/',
    userId: keys.userId,
    type: '/media/recent/',
    acces: '?access_token=' + keys.accesToken
  };

  return urlParts.phpFile + urlParts.phpQuery + urlParts.base + urlParts.sort + urlParts.userId + urlParts.type + urlParts.acces;
};

instagram.APICall = function(url, callback) {
var _url = url;
// make the req
var xhttp = new XMLHttpRequest();
  // If the xhttp req is loaded(done) and there is an response send the data to the callback function
  xhttp.onloadend = function() {
    if (xhttp.response) {
      var response = xhttp.response;
      callback(response);
    }
  };

  xhttp.open('GET', _url, true);
  xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  xhttp.send();

};

instagram.handleData = function(data) {

  var _data = JSON.parse(data);
  var photos = _data.data;
  var filteredPhotos = [];

  photos.forEach(function(photo) {

    var filteredPhoto = instagram.filter(photo);
    // Filter out the Photo's only!
    if (filteredPhoto.type === 'photo') {
      filteredPhotos.push(filteredPhoto);
    }
  });

  instagram.render(filteredPhotos);

};

instagram.filter = function(item) {

  var _item = item;

  if ( _item.videos ) {
    return {
      link: _item.link,
      type: 'video',
      src: _item.videos.standard_resolution.url,
      poster: _item.images.standard_resolution.url,
      caption: _item.caption.text,
      orientation: _item.videos.standard_resolution.height > _item.videos.standard_resolution.width ? 'vertical' : 'horizontal'
    };
  } else {
    return {
      link: _item.link,
      preview: _item.images.low_resolution.url,
      large: _item.images.standard_resolution.url,
      caption: _item.caption.text,
      type: 'photo',
    };
  }
};

// instagram.handleVideo = function(video) {

    // check if the photo is actuarially a video
    // if ( _photo.videos ) {
    //     instagram.handleVideo(_photo);
    //     return;
    // }
    // Do something

// }

instagram.render = function(data) {

  var _data = data;

  var htmlTemplate = document.querySelector('#template-instagram').innerHTML;
	var template = Handlebars.compile(htmlTemplate);
	var html = template(_data);
	document.querySelector('.pictures').innerHTML = html;

  instagram.rotateImages();

};

instagram.rotateImages = function() {
  var pictures = document.querySelectorAll('.pictures--item'); // get all pictures
  for (var i = 0; i < pictures.length; i++) {
    var picture = pictures[i];
    var random = Math.floor((Math.random() * 20) + -10); // get a random number between -10 and 10
    picture.style.transform = 'rotate(' + random + 'deg)'; // set this number as an transform rotate value
  }
};

module.exports = instagram;
