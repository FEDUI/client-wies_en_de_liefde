var frames = document.querySelectorAll('.frame');

// Loop thrue all the setlist items
for (var i = 0; i < frames.length; i++) {
  var frame = frames[i];
  var outerElement = frame.parentNode; // Get the outer element of a frame
  outerElement.addEventListener('click', showVideo); // Add eventListener on list item
  outerElement.classList.add('setlist--hover');
}

// All actions to show the video
function showVideo(e) {
  var videoContainer = this.querySelector('.frame');
  videoContainer.classList.remove('frame--hide');
  videoContainer.classList.add('frame--show');

  setRemoveListener(videoContainer); // Add the listeners to remove a video
}

// All the actions to remove the video
function removeVideo() {
  var currentVideo = document.querySelector('.frame--show');
  if (!currentVideo) { return; }

  currentVideo.classList.add('frame--hide');
  currentVideo.classList.remove('frame--show');
}

// Check if the key pressed is the esc key
function checkEsc(e) {
  if (e.keyCode === 27) {
      removeVideo();
  }
}

// Add all the remove listeners where needed
function setRemoveListener(videoContainer) {
  var button = videoContainer.querySelector('button');

  button.addEventListener('click', removeVideo);
  window.addEventListener('keydown', checkEsc);
}
