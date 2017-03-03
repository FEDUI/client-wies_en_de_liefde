var setlistItems = document.querySelectorAll('.setlist--item');
// var frame = document.querySelector('.frame iframe');
// var frameContainer = document.querySelector('.frame--container');

for (var i = 0; i < setlistItems.length; i++) {
  if (setlistItems[i].dataset.embed) {
    var item = setlistItems[i];

    item.classList.add('setlist--item-click');
    item.addEventListener('click', toggleIframe);
  }
}

function toggleIframe(e) {
  var outerElement;
  if ( e.target && e.target.nodeName === 'LI' ) {
    outerElement = e.target;
  } else if ( e.target && e.target.nodeName === 'IMG' ) {
    outerElement = e.target.parentElement;
  }

  var video = outerElement.querySelector('iframe');
  console.log(video);
  // var videoSource = outerElement.dataset.embed;
  //
  // // on click fill url of iframe and show the movie
  // frame.src = videoSource;
  // frameContainer.classList.remove('frame--hide');
  // Make a cross and esc for video remove
}
