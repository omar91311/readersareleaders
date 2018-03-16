var b = document.documentElement;
var h = b.clientHeight;
console.log(h);
var l = document.getElementsByTagName("form");
l[0].style.marginTop = ((h - 180)/2 )+"px";
var c = document.getElementsByClassName("container-fluid");
console.log(c);
c[0].style.height = h+"px";
/*var body = document.body,
    html = document.documentElement;

var height = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
					   console.log(height);*/