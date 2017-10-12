function PhotoViewer() {
  Utility.call(this, "PhotoViewer", "View Photos");
  this.list = null;
}

PhotoViewer.prototype = Object.create(Utility.prototype);
PhotoViewer.prototype.constructor = PhotoViewer;
PhotoViewer.prototype.getArrayPhotosNames = function(){
  let folder = document.getElementById("folder").value;
  let commonName = document.getElementById("name").value;
  let start = Number(document.getElementById("start").value);
  let end = Number(document.getElementById("end").value);
  let list = new DoubleLinkedList();

  let currNode = list.head;
  for (let i = start; i <= end; i++) {
    let newNode = new Node(folder + commonName + i + '.jpg');
    list.insert(newNode);
  }

  this.list = list;
}
PhotoViewer.prototype.randomize = function() {
  let folder = document.getElementById("folder").value;
  let commonName = document.getElementById("name").value;
  let start = Number(document.getElementById("start").value);
  let end = Number(document.getElementById("end").value);

  let list = new DoubleLinkedList();

  let currNode = list.head;
  for (let i = start; i <= end; i++) {
    let node = new Node(folder + commonName + i + '.jpg');
    if (currNode == null) {
      list.insertBeginning(node);
    } else {
      let choice = Math.floor((Math.random() * 10) + 1);

      if (choice % 2 == 0) {
        list.insertAfter(currNode, node);
      } else {
        list.insertBefore(currNode, node);
      }
    }
    currNode = node;
  }
  this.list = list;
}
