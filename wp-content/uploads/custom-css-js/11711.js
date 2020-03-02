<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 

"use strict";

var canvas = document.getElementById('canvas'),
    ctx = canvas.getContext('2d'),
    w = canvas.width = window.innerHeight,
    h = canvas.height = window.innerWidth,
    points = [],
    amount = 320, // relative to screen size
    speed = 24,
    size = 2,
    lineWidth = 1.4,
    connectionDistance = 210,
    randomSize = .5,
    mouseX = 0,
    mouseY = 0,
    mouseRadius = 0;

window.addEventListener('resize', function(){
  w = canvas.width = window.innerWidth,
  h = canvas.height = window.innerHeight;
  
  ctx.fillStyle = 'hsl(190,40%,50%)';
  ctx.fillRect(0,0,w,h);
}, false);

function setup()
{
  w = canvas.width = window.innerWidth,
  h = canvas.height = window.innerHeight;
  
  var screenDelta = Math.sqrt(w + h) / 100;
  var useAmount = amount * screenDelta;
  
  for (var i = 0; i < useAmount; i++) {
    var x = (Math.random() * w);
    var y = (Math.random() * h);
    var xSpeed = (Math.random() * (speed / 10)) - (speed / 20);
    var ySpeed = (Math.random() * (speed / 10)) - (speed / 20);
    
    points.push(new Point(x,y,xSpeed,ySpeed));
  }
  
  ctx.fillStyle = 'hsl(190,40%,50%)';
  ctx.fillRect(0,0,w,h);
  
  draw();
}

function draw()
{
  ctx.globalCompositeOperation = "source-over";
   
  ctx.fillStyle = 'hsla(190,50%,3%, 0.1)';
  ctx.fillRect(0,0,w,h);
  
  ctx.lineWidth = lineWidth;
  ctx.fillStyle = 'hsl(190,55%,54%)';
  
  var screenDelta = Math.sqrt(w + h) / 100;
  var useDistance = connectionDistance * screenDelta;
  
  ctx.globalCompositeOperation = "lighter";
   
  points.each(function(point){
    points.each(function(connection){
      var distanceX = Math.pow((connection.x - point.x), 2);
      var distanceY = Math.pow((connection.y - point.y), 2);
      var distance = Math.sqrt(distanceX + distanceY);
      
      if (distance <= useDistance) {
        var alpha = 1.0 - (distance / useDistance);
        
        ctx.strokeStyle = 'hsla(190,65%,10%, '+alpha+')';
  
        ctx.beginPath();
        ctx.moveTo(point.x,point.y);
        ctx.lineTo(connection.x,connection.y);
        ctx.stroke();
        ctx.closePath();
      }
    });
  });
  
  ctx.globalCompositeOperation = "source-over";
   
  points.each(function(point){
    point.draw();
  });
  
  window.requestAnimationFrame(draw);
}

var Point = function (_x, _y, _xSpeed, _ySpeed) {
  this.x = _x;
  this.y = _y;
  this.xSpeed = _xSpeed;
  this.ySpeed = _ySpeed;
  
  var _this = this;
  
  this.draw = function() {
    var xNoise = ((Math.random() * randomSize) -randomSize/2);
    var yNoise = ((Math.random() * randomSize) -randomSize/2);
    
    _this.x += _this.xSpeed + xNoise;
    _this.y += _this.ySpeed + yNoise;
    
    if (_this.x < size || _this.x > (w - size)) {
      _this.xSpeed = -_this.xSpeed;
    }
    
    if (_this.y < size || _this.y > (h - size)) {
      _this.ySpeed = -_this.ySpeed;
    }
    
    if (_this.x < 0) {
      _this.x = 2;
    }
    
    if (_this.x > w) {
      _this.x = w - 2;
    }
    
    if (_this.y < 0) {
      _this.y = 2;
    }
    
    if (_this.y > h) {
      _this.y = h - 2;
    }
    
    ctx.beginPath();
    ctx.arc(_this.x,_this.y,size,0,2*Math.PI);
    ctx.fill();
    ctx.closePath();
  };
};

// Faster than .forEach
Array.prototype.each = function(a) {
  var l = this.length;
  for(var i=0;i<l;i++)a(this[i],i)
};

setTimeout(setup, 10);
</script>
<!-- end Simple Custom CSS and JS -->
