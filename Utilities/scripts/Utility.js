function Utility(utilityName, utilityDescription) {
  this.utilityName = utilityName;
  this.utilityDescription = utilityDescription;
}

Utility.prototype = {
  constructor: Utility,
  info: function() {
    document.writeln("Name: " + this.utilityName);
    document.writeln("Description: " + this.utilityDescription);
  }
}
