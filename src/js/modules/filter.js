'use strict';

var template = require('./template');
var filter = {};
var unknown = 'Onbekend';
var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'];

filter.events = function(data) {

    var _data = data;
    var events = _data.events.data;
    var d = new Date();
    var currentMonth = d.getMonth() + 1;
    var currentDay = d.getDate();
    var currentYear = d.getFullYear();

    var comingEvents = [];
    var pastEvents = [];

    events.forEach(function(event) {

        var gig = {};

        // ToDo: Butify this with the checkExistance function
        if ( event.name) {
            gig.title = event.name;
        } else {
            gig.title = unknown;
        }
        if ( event.place && event.place.location && event.place.location.city ) {
            gig.city = event.place.location.city;
        } else {
            gig.city = unknown;
        }
        if ( event.place && event.place.name ) {
            gig.locationName = event.place.name;
        } else {
            gig.locationName = unknown;
        }
        if ( event.id ) {
            gig.link = 'https://www.facebook.com/events/' + event.id;
        } else {
            gig.link = 'https://www.facebook.com/';
        }
        if ( event.start_time ) {
            gig.date = filter.parseDate(event.start_time);
        } else {
            gig.date = unknown;
        }

        if ( gig.date.year && gig.date.month && gig.date.day ) {
          var nextYear = Number(gig.date.year) > currentYear;
          var thisYear = Number(gig.date.year) === currentYear;
          var nextMonth = Number(gig.date.month) > currentMonth;
          var thisMonth = Number(gig.date.month) === currentMonth;
          var thisDay = Number(gig.date.day) >= currentDay;

          if ( nextYear || thisYear && nextMonth || thisYear && thisMonth && thisDay) {
            comingEvents.push(gig);
          } else {
            gig.done = 'true';
            pastEvents.push(gig);
          }
        }
    });

    if ( pastEvents.length > 3 ) {
        pastEvents = pastEvents.slice(0, 3);
    }

    var eventsCombined = comingEvents.concat(pastEvents);

    template.render(eventsCombined, '#calendar-template', '.eventList');

};

// Parsed the data
filter.parse = function(data) {

    return JSON.parse(data);

};

filter.parseDate = function(fbDate) {

    var _fbDate = fbDate;

    // Date Calculations
    var date = _fbDate.slice(0, 10);
    var year = date.slice(0, 4);
    var month = date.slice(5, 7);
    if ( month.slice(0, 1) === '0' ) {
        month = month.slice(1, 2);
    }
    var day = date.slice(8, 10);

    // Time Calculations
    var time = _fbDate.slice(11, 16);
    var hour = time.slice(0, 2);
    var minute = time.slice(3, 5);

    return {
        fullDate: date,
        calculateDate: year + month + day,
        year: year,
        month: month,
        monthName: monthNames[month - 1],
        day: day,
        time: time,
        hour: hour,
        minute: minute
    };

};









var filteredPosts = [];
var counter = 0;

// Filter the Posts data
filter.posts = function(data, postAmount) {

  var _data = data;
  var postsData = _data.data[0];
  var post = {};

  // cover_photo
  // share

  if (postsData.type) {
    post.type = postsData.type;

    switch (postsData.type) {
      case 'share':
      case 'photo':
      case 'cover_photo':
      case 'profile_media':
        post.type = 'photo';
        if ( postsData.url ) { post.url = postsData.url; }
        if ( postsData.description ) { post.text = postsData.description; }
        if ( postsData.media ) { post.image = [postsData.media.image.src]; }
      break;

      case 'event':
      if ( postsData.url ) { post.url = postsData.url; }
        if ( postsData.media ) { post.image = [postsData.media.image.src]; }
        if ( postsData.title ) { post.text = postsData.title; }
      break;

      case 'album':
      if ( postsData.url ) { post.url = postsData.url; }
         if (postsData.subattachments) {
           post.image = [];
           postsData.subattachments.data.forEach(function(photo, i) {
             if (i <= 3) {
               post.image.push(photo.media.image.src);
             }
           });
         }
      break;

      case 'video_autoplay':
      case 'video_share_youtube':
      // @TODO: Get the url to the video!
        post.type = 'video';
        if ( postsData.url ) { post.url = postsData.url; }
        if ( postsData.target.url ) { post.image = [postsData.media.image.src]; }
        if (postsData.description) {post.text = postsData.title; }
      break;
    }

    if (post.text && post.text.length >= 120) {

      post.text = post.text.substring(0, 120);
      post.toLarge = true;
    }

    filteredPosts.push(post);
    counter ++;

    if ( counter >= postAmount ) {

      // reorder the posts to date!
      template.render(filteredPosts, '#news-template', '.news-overview');
    }
  }
};


module.exports = filter;
