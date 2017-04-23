var bandmembers = document.querySelectorAll('.overflow--text');

function getAllParags(article) {
  var parags = article.querySelectorAll('p');
  var paragsArray = [];

  for (var i = 0; i < parags.length; i++) {
    paragsArray.push(parags[i]);
  }

  return paragsArray;
}

function checkForBreak(parags) {
  var check = false;
  var number = 0;

  allParags.forEach(function(parag, i) {
    if ( parag.innerHTML === '<!--more-->' ) {
      check = true;
      number = i;
      return; }
  });

  if (check === true) {
    return number;
  }
}

function makeContainer(container, a) {
  var overflowContainer = document.createElement('div');
  overflowContainer.classList.add('overflow--text-overflow');
  for (var i = a; i < container.length; i++) {
    overflowContainer.appendChild(container[i]);
  }

  var readLess = createReadLess();
  overflowContainer.appendChild(readLess);

  return overflowContainer;
}

function getName(container) {
  var parentElement = '';
  if (container.parentNode) { parentElement = container.parentNode; } else if (container.parentElement) { parentElement = container.parentElement; }
  var name = parentElement.querySelector('h3').innerHTML;
  // get only the first name
  var space = name.indexOf(' ');
  var fistName = name.substr(0, space)
  return fistName;
}

function makeBreakElement(textContainer) {
  var breakElement = document.createElement('button');
  var name = getName(textContainer);
  breakElement.classList.add('overflow--text-break');
  breakElement.innerHTML = 'Lees meer over ' + name;

  breakElement.addEventListener('click', toggleShow);

  return breakElement;
}

function createReadLess() {
  var breakElement = document.createElement('button');
  breakElement.classList.add('overflow--text-less');
  breakElement.innerHTML = 'verberg';

  breakElement.addEventListener('click', toggleHide);
  return breakElement;
}

function toggleHide() {
  var parentElement = '';
  var grandParent = '';
  if (this.parentNode) {
    parentElement = this.parentNode;
    grandParent = parentElement.parentNode;
  } else if (this.parentElement) {
    parentElement = this.parentElement;
    grandParent = parentElement.parentElement;
  }
  grandParent.classList.add('overflow');
}

function toggleShow() {
  var parentElement = '';
  if (this.parentNode) { parentElement = this.parentNode; } else if (this.parentElement) { parentElement = this.parentElement; }
  parentElement.classList.remove('overflow');
}

for (var i = 0; i < bandmembers.length; i++) {

  var bandmember = bandmembers[i];
  var allParags = getAllParags(bandmember);
  var number = checkForBreak(allParags);

  if (number) {
    var newContainer = makeContainer(allParags, number);
    var breakElement = makeBreakElement(bandmember);
    bandmember.classList.add('overflow');
    bandmember.appendChild(breakElement);
    bandmember.appendChild(newContainer);
  }
}
