var dots = [],
    mouse = {
      x: 0,
      y: 0
    };

// The Dot object used to scaffold the dots
var Dot = function(color, zid) {
  this.x = 0;
  this.y = 0;
  this.color = color;
  this.zid = zid
  this.node = (function(){
    var n = document.createElement("div");
    n.className = "trail";
    document.body.appendChild(n);
    return n;
  }());
};
// The Dot.prototype.draw() method sets the position of 
  // the object's <div> node
Dot.prototype.draw = function() {
  this.node.style.left = this.x + "px";
  this.node.style.top = this.y + "px";
  this.node.style.background = this.color
  this.node.style.zIndex = this.zid
};

// Creates the Dot objects, populates the dots array
for (var i = 0; i < 3; i++) {
  if (i == 0) {
    var d = new Dot("blue", 1000);
  } else if (i == 1) {
    var d = new Dot("white", 999);
  } else {
    var d = new Dot("red", 998);
  }
  dots.push(d);
}

function draw() {
  
  var x = mouse.x,
      y = mouse.y;
  
      
  dots.forEach(function(dot, index, dots) {
    var nextDot = dots[index + 1] || dots[0];
    
    dot.x = x;
    dot.y = y;
    dot.draw();
    x += (nextDot.x - dot.x) * .7;
    y += (nextDot.y - dot.y) * .7;

  });
}

addEventListener("mousemove", function(event) {
  //event.preventDefault();
  mouse.x = event.pageX;
  mouse.y = event.pageY;
});

function animate() {
  draw();
  requestAnimationFrame(animate);
}

animate();
