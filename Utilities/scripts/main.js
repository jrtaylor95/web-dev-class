window.onload = function() {
  let slideButton = document.getElementById("btn_slide");
  let randomButton = document.getElementById("btn_random");
  let nextButton = document.getElementById("btn_next");
  let prevButton = document.getElementById("btn_previous");
  let autoButton = document.getElementById("btn_auto");
  let autoRandomButton = document.getElementById("btn_autoRandom");
  let stopAutoButton = document.getElementById("btn_stopAuto");
  let resetButton = document.getElementById("btn_reset");
  let img = document.getElementById("image");
  let photoViewer = new PhotoViewer();


  let iter;
  let interval;
  let slide = function() {
    let start = Number(document.getElementById("start").value);
    let end = Number(document.getElementById("end").value);
    if (end < start) {
      document.getElementById("error").innerHTML = "Invalid Range";
    } else {
      document.getElementById("error").innerHTML = "";
      photoViewer.getArrayPhotosNames();
      image.src = photoViewer.list.head.data;
      iter = undefined;
    }
  }
  let next = function() {
    if (!iter) {
      iter = photoViewer.list.iterator();
    }
    image.src = iter.next().value;
  }
  let previous = function() {
    if (!iter) {
      iter = photoViewer.list.iterator();
    }
    image.src = iter.prev().value;
  }
  let random = function() {
    let start = Number(document.getElementById("start").value);
    let end = Number(document.getElementById("end").value);
    if (end < start) {
      document.getElementById("error").innerHTML = "Invalid Range";
    } else {
      document.getElementById("error").innerHTML = "";
      photoViewer.randomize();
      image.src = photoViewer.list.head.data;
      iter = undefined;
    }
  }
  let auto = function() {
    slide();

    interval = window.setInterval(next, 5000);
  }
  let randomAuto = function() {
    random();

    interval = window.setInterval(next, 5000);
  }
  let reset = function() {
    document.getElementById("start").value = "1";
    document.getElementById("end").value = "1";
  }
  slideButton.onclick = slide;
  nextButton.onclick = next;
  prevButton.onclick = previous;
  randomButton.onclick = random;

  autoButton.onclick = auto;
  stopAutoButton.onclick = function() {
    window.clearInterval(interval);
  }
  autoRandomButton.onclick = randomAuto;
  resetButton.onclick = reset;
}
