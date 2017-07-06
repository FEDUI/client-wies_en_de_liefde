var frames = document.querySelectorAll('.has-frame');

for (var i = 0; i < frames.length; i++) {
  var item = frames[i];
  var frame = {
    trigger: item,
    videoContainer: item.querySelector('.frame'),
    removeTrigger: item.querySelector('.frame--remove')
  };

  setTriggers(frame);
}

function checkEsc(e) {
  if (e.keyCode === 27) { removeVideo(); }
}

function removeVideo() {
  var currentVideo = document.querySelector('.frame--show');
  if (!currentVideo) { return; }

  currentVideo.classList.add('frame--hide')
  currentVideo.classList.remove('frame--show');
}

function showVideo(e) {
  if ( e.target.computedRole === 'button' ) { return; }

  var _info = this.info;
  _info.videoContainer.classList.remove('frame--hide')
  _info.videoContainer.classList.add('frame--show');
  _info.removeTrigger.addEventListener('click', removeVideo);
  window.addEventListener('keydown', checkEsc);
}

function setTriggers(el) {
  var _el = el;
  _el.trigger.info = _el;

  _el.trigger.addEventListener('click', showVideo, false);
  _el.trigger.classList.add('setlist--hover');
}
