var dots = [],
    mouse = {
      x: 0,
      y: 0
    };

// The Dot object used to scaffold the dots
var Dot = function(color) {
  this.x = 0;
  this.y = 0;
  this.color = color;
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
};

// Creates the Dot objects, populates the dots array
for (var i = 0; i < 3; i++) {
  if (i == 0) {
    var d = new Dot("blue");
  } else if (i == 1) {
    var d = new Dot("white");
  } else {
    var d = new Dot("red");
  }
  dots.push(d);
}

// This is the screen redraw function
function draw() {
  // Make sure the mouse position is set everytime
    // draw() is called.
  var x = mouse.x,
      y = mouse.y;
  
  // This loop is where all the 90s magic happens
  dots.forEach(function(dot, index, dots) {
    var nextDot = dots[index + 1] || dots[0];
    
    dot.x = x;
    dot.y = y;
    dot.draw();
    x += (nextDot.x - dot.x) * .9;
    y += (nextDot.y - dot.y) * .9;

  });
}

addEventListener("mousemove", function(event) {
  //event.preventDefault();
  mouse.x = event.pageX;
  mouse.y = event.pageY;
});

// animate() calls draw() then recursively calls itself
  // everytime the screen repaints via requestAnimationFrame().
function animate() {
  draw();
  requestAnimationFrame(animate);
  console.log(dots);
}

// And get it started by calling animate().
animate();
