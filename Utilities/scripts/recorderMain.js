let recorderList = null;
let canvas;
let currentColor = "red";
let start = function() {
  recorderList = new Recorder();
  canvas.onmousemove = processMousePosition;
}

let stop = function() {
  canvas.onmousemove = undefined;
}
let interval;
let clear = function() {
  clearInterval(interval);
  let context = document.getElementById("canvas").getContext("2d");
  context.fillStyle = "white";
  context.fillRect(0, 0, canvas.width, canvas.height);
}

let play = function() {
  clear();
  let iter = recorderList.list.iterator();
  let start = iter.next().value;
  draw(start.xCo, start.yCo);
  let currNode = iter.next().value;
  interval = setInterval(function() {
    if (currNode.xCo != start.xCo || currNode.yCo != start.yCo) {
      draw(currNode.xCo, currNode.yCo);
      currNode = iter.next().value;
    } else {
      clearInterval(interval);
    }
  }, 100);

}

let save = function() {
  let array = new Array();
  let currNode = recorderList.list.head;
  while (currNode != null) {
    array.push(currNode.data);
    currNode = currNode.next;
  }

  localStorage.setItem("drawing", JSON.stringify(array));
}

let load = function() {
  let array = JSON.parse(localStorage.getItem("drawing"));

  recorderList = new Recorder();

  for (let i = 0; i < array.length; i++) {
    recorderList.list.insert(new Node(array[i]));
  }
}

function processMousePosition(evt) {
  let xCo = evt.pageX;
  let yCo = evt.pageY;
  draw(xCo, yCo);
  recorderList.record(xCo, yCo);
}

function draw(xPos, yPos) {
  let context = document.getElementById("canvas").getContext("2d");

  context.fillStyle = currentColor;
  context.fillRect(xPos, yPos, 5, 5);
}

let changeColor = function() {
  let red = document.getElementById("color_red").value;
  let green = document.getElementById("color_green").value;
  let blue = document.getElementById("color_blue").value;
  let context = document.getElementById("canvas").getContext("2d");
  currentColor = `rgb(${red}, ${green}, ${blue})`;
  context.fillStyle = currentColor;
}

window.onload = function() {
  canvas = document.getElementById("canvas");
  let startButton = document.getElementById("btn_start");
  let stopButton = document.getElementById("btn_stop");
  let playButton = document.getElementById("btn_play");
  let saveButton = document.getElementById("btn_save");
  let loadButton = document.getElementById("btn_load");
  let colorButton = document.getElementById("btn_color");
  let clearButton = document.getElementById("btn_clear");

  startButton.onclick = start;
  stopButton.onclick = stop;
  playButton.onclick = play;
  clearButton.onclick = clear;
  saveButton.onclick = save;
  loadButton.onclick = load;
  colorButton.onclick = changeColor;
}
