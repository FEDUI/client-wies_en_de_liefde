var instagram = {};
var keys = {
    clientId: 'fd3e2ea7da514b7ea84da4d6ad757133',
    accesToken: '3435776989.83b15f9.ab41e9184a4d4a0b86e22f3480afbd07',
    userId: '3435776989',
    photoSize: 'standard_resolution',
    // tags: "" // if needed
};

instagram.connect = function() {
  var url = instagram.createUrl();
  console.log(url);
  instagram.APICall(url, instagram.handleData);

};

instagram.createUrl = function() {

  var urlParts = {
    phpFile: '../../../get.php',
    phpQuery: '?url=',
    base: 'https://api.instagram.com/v1/',
    sort: 'users/',
    userId: keys.userId,
    type: '/media/recent/',
    acces: '?access_token=' + keys.accesToken
  };

  return urlParts.phpQuery + urlParts.base + urlParts.sort + urlParts.userId + urlParts.type + urlParts.acces;

};

instagram.APICall = function(url, callback) {

var _url = url;

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
  console.log(data);

  var _data = JSON.parse(data);
  var photos = _data.data;
  var filteredPhotos = [];

  photos.forEach(function(photo) {

    var filteredPhoto = instagram.filter(photo);
    filteredPhotos.push(filteredPhoto);

  });

  instagram.render(filteredPhotos);

};

instagram.filter = function(item) {

  var _item = item;

  var photo = {
    link: _item.link,
    preview: _item.images.low_resolution.url,
    large: _item.images.standard_resolution.url,
    caption: _item.caption.text
  };

  return photo;

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

};

module.exports = instagram;
