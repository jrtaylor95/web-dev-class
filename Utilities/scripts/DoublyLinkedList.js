function Node(data) {
  this.prev = null;
  this.next = null;
  this.data = data;
}

Node.prototype = {
  constructor: Node,
  setData: function(data) {
    this.data = data;
  }
}

function DoubleLinkedList(comparator) {
  this.comparator = comparator;
  this.head = null;
  this.tail = null;
}

DoubleLinkedList.prototype = {
  constructor: DoubleLinkedList,
  insertAfter: function (node, newNode) {
    newNode.prev = node;
    if (node.next == null) {
      newNode.next = null;
      this.tail = newNode;
    } else {
      newNode.next = node.next;
      node.next.prev = newNode;
    }
    node.next = newNode;
  },
  insertBefore: function (node, newNode) {
    newNode.next = node;
    if (node.prev == null) {
      newNode.prev = null;
      this.head = newNode;
    } else {
      newNode.prev = node.prev;
      node.prev.next = newNode;
    }
    node.prev = newNode;
  },
  insertBeginning: function(node) {
    if (this.head == null) {
      this.head = node;
      this.tail = node;
      node.prev = null;
      node.next = null;
    } else {
      this.insertBefore(this.head, node);
    }
  },
  insertEnd: function(node) {
    if (this.tail == null) {
      this.insertBeginning(node);
    } else {
      this.insertAfter(this.tail, node);
    }
    this.tail = node;
  },
  insert: function(node) {
    if (this.head == null) {
      this.insertBeginning(node);
    } else {
      this.insertEnd(node);
    }
  },
  iterator: function() {
    let currNode = this.head;
    let head = this.head;
    let tail = this.tail;
    return {
      next: function () {
        currNode = currNode.next;
        if (currNode == null) {
          currNode = head;
        }
        return {value: currNode.data, done: false};
      },
      prev: function() {
        currNode = currNode.prev;
        if (currNode == null) {
          currNode = tail;
        }
        return {value: currNode.data, done: false};
      }
    }
  },
  isEmpty: function() {
    return head === null;
  },
  size: function() {
    let currNode = this.head;
    let size = 1;
    if (currNode === null) {
      return 0;
    } else {
      while (currNode !== null) {
        size++;
        currNode = currNode.next;
      }
    }
  }
}
