function Recorder() {
  Utility.call(this, "Recorder", "Record Drawings");
  this.list = new DoubleLinkedList();
}

Recorder.prototype = Object.create(Utility.prototype);
Recorder.prototype.constructor = Recorder;
Recorder.prototype.record = function(x, y){
    this.list.insert(new Node({xCo: x, yCo: y}));
}
