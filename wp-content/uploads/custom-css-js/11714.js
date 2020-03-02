<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
jQuery(document).ready(function( $ ){var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var W = canvas.width = window.innerWidth/2;
var H = canvas.height = window.innerHeight/2;
var padding = 20;
var points = [];
var count = 100;
var distance = 150;

/* Find requestAnimationFrame if possible */
window.requestAnimFrame = (function () {
    return  window.requestAnimationFrame   || 
        window.webkitRequestAnimationFrame || 
        window.mozRequestAnimationFrame    || 
        window.oRequestAnimationFrame      || 
        window.msRequestAnimationFrame     || 
        function ( c ) {
            window.setTimeout( c, 16.6 );
        };
})();

/* Add our points to the point collection */
while ( count-- ) points.push( new point() );

/* Define the properties and behavior of a point */
function point () {
    /* For preserving 'this' for this.update */
    var self = this;
    self.pos = { 
        x: Math.random() * ( W - padding * 2 ) + padding, 
        y: Math.random() * ( H - padding * 2 ) + padding,
        update: function () {
            if ( self.pos.x < padding || self.pos.x > W - padding ) self.vel.x *= -1;
            if ( self.pos.y < padding || self.pos.y > H - padding ) self.vel.y *= -1;
            self.pos.x += self.vel.x;
            self.pos.y += self.vel.y;
        }
    };
    self.vel = { 
        x: 2 * ( Math.random() < .5 ? -1 : 1 ), 
        y: 2 * ( Math.random() < .5 ? -1 : 1 ) 
    };
    self.clr = { 
        r: Math.round( Math.random() * 255 ),
        g: Math.round( Math.random() * 255 ),
        b: Math.round( Math.random() * 255 )
    };
}

/* Our drawing function, gets called up to 60fps */
function draw () {

    /* Paint canvas single color */
    ctx.fillStyle = "#232323";
    ctx.fillRect( 0, 0, W, H );
    
    /* Draw our strings */
    ctx.lineWidth = 1;

    /* Cycle over every point */
    points.forEach(function(p){

        /* Compare each point to current point */
        points.forEach(function(q){

            /* Find distance between two points */
            var xd = p.pos.x - q.pos.x;
            var yd = p.pos.y - q.pos.y;
            var dist = Math.sqrt( xd*xd + yd*yd );

            /* If under threshold, draw connecting line */
            if ( dist < distance ) {
                
                /* Line intensity based on proximity */
                var alpha = 1 - dist / distance;
                
                /* Draw shadow */
                ctx.strokeStyle = "rgba(0,0,0," + ( alpha * .2 ) + ")";
                ctx.beginPath();
                ctx.moveTo( p.pos.x, p.pos.y * 1.2 );
                ctx.lineTo( q.pos.x, q.pos.y * 1.2 );
                ctx.stroke();

                /* Draw string */
                ctx.strokeStyle = "rgba(%r,%g,%b,%a)".replace(/%([a-z])/g, function( m, v ) {
                    return v === "a" ? alpha : p.clr[ v ] ;
                });
                ctx.beginPath();
                ctx.moveTo( p.pos.x, p.pos.y );
                ctx.lineTo( q.pos.x, q.pos.y );
                ctx.stroke();

            }

        });

        /* Update location of point for next frame */
        p.pos.update();

    });
    
    /* Queue up the next frame */
    requestAnimFrame( draw );

}

/* Invoke animation */
requestAnimFrame( draw );
});




</script>
<!-- end Simple Custom CSS and JS -->
