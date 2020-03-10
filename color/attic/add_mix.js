var c1 = '#ff0000';
var c2 = '#00ff00';
var res = 1;

function makeMosaic(k, color1, color2) {
  k = k/5;
  steps = Math.floor(50*k);
  size = 10/k;
  radius = Math.round(100*size)/100;
  svg = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"500\" height=\"500\">";
  for (var i = 0; i < steps; i++) {
    for (var j = 0; j < steps; j++) {
      c_x = Math.round(100*size*j)/100;
      c_y = Math.round(100*size*i)/100;
      if ((i + j) % 2 == 0)
	svg += "<rect x='"+ c_x + "' y='" + c_y + "' width='" + radius + 
	"' height='" + radius + "' fill='" + color1 + "' />";
      else
	svg += "<rect x='"+ c_x + "' y='" + c_y + "' width='" + radius + 
	"' height='" + radius + "' fill='" + color2 + "' />";
    }
  }
  svg += "</svg>";
  return svg;
}

function showMosaic(res, c1, c2) {
    var svgdivs = document.getElementsByClassName('svg');
    for (var i = 0; i < svgdivs.length; i++) {
	svgdivs[i].style.display = 'none';	
    }
    document.getElementById('svg' + res).style.display = 'block';
}

function genImages(res, c1, c2) {
    var svgdivs = document.getElementsByClassName('svg');
    for (var i = 0; i < svgdivs.length; i++) {
	svgdivs[i].style.display = 'none';	
    }
    var mosaic = document.getElementById('mosaic');
    for (var r = 0; r < 13; r++) {
	var svg = makeMosaic(r + 1, c1, c2);
	if (document.getElementById('svg' + (r + 1))) {
	    svgdiv = document.getElementById('svg' + (r + 1));
	} else {	    
//	    var svgdiv = new Image();
	    var svgdiv = document.createElement("div");
	    svgdiv.id = "svg" + (r + 1);
	    svgdiv.className = 'svg';
	 //   svgdiv.onload = function() {
		mosaic.appendChild(svgdiv);
	 //   };	
	}

//	svgdiv.src = 'data:image/svg+xml;utf8,' + encodeURIComponent(svg);
	svgdiv.innerHTML = svg;
	svgdiv.style.width = '500px';
	svgdiv.style.marginLeft = 'auto';
	svgdiv.style.marginRight = 'auto';
	svgdiv.style.height = '500px';
	
	if (r + 1 == res) 
	    svgdiv.style.display = 'block';
	else
	    svgdiv.style.display = 'none';

    }
    document.getElementById('loading').style.display = 'none';
}
genImages(res, c1, c2);
