<html>
<head>

<link rel="stylesheet" href="../wittenberg/styles.css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

<style>
h1, h2, h3, h4, h5 {
color:#428bc1;
}
hr {border-color:#ddd}
blockquote{
border-left: 10px solid #ddd;
padding-top:0px;
padding-left:10px;
padding-right:10px;
}

</style>

</head>
<body>
<div class='page'>
<div id='text'>
<?php
$precolor1 = $_GET['color1'];
$precolor2 = $_GET['color2'];
$color1 = "#".$_GET['color1'];
$color2 = "#".$_GET['color2'];
$res = $_GET['res'];
$steps = floor(50*$res);
$size = 10/$res;
?>
<div class=image id="mosaic"></div>
<script type="text/javascript">
var c1 = '<?php echo $color1;?>';
var c2 = '<?php echo $color2;?>';
var res = '<?php echo $res; ?>';

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
//  document.getElementById("mosaic").innerHTML= svg;
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
    var mosaic = document.getElementById('mosaic');	
    for (var r = 0; r < 13; r++) {
	var svg = makeMosaic(r + 1, c1, c2);
	if (document.getElementById('svg' + (r + 1))) {
	    svgdiv = document.getElementById('svg' + (r + 1));
	} else {	    
//	    var svgdiv = document.createElement('img');
	    var svgdiv = new Image();
	    svgdiv.id = "svg" + (r + 1);
	    svgdiv.className = 'svg';
	    svgdiv.onload = function() {mosaic.appendChild(svgdiv);};
	}
	svgdiv.src = 'data:image/svg+xml;utf8,'+ svg;
	svgdiv.style.width = '500px';
	svgdiv.style.marginLeft = 'auto';
	svgdiv.style.marginRight = 'auto';
	svgdiv.style.height = '500px';
	if ((r + 1) == res)
	    svgdiv.style.display = 'block';
	else
	    svgdiv.style.display = 'none';

//	svgdiv.onload = function() {mosaic.appendChild(svgdiv);};
	mosaic.appendChild(svgdiv);
    }
}

genImages(res, c1, c2);
// showMosaic(res, c1, c2);
// document.getElementById('svg' + res).style.display = 'block';

</script>
<div class=image>
<div style="width:100px;display:inline-block;text-align:center;padding:0px">
<input type="color" value="<?php echo $color1 ?>" style="padding:0;float:left;width:50px;height:50px" onchange="c1 = this.value; genImages(res, c1, c2); showMosaic(res, c1, c2)">
<input type="color" value="<?php echo $color2 ?>" style="padding:0;float:right;width:50px;height:50px" onchange="c2 = this.value; genImages(res, c1, c2); showMosaic(res, c1, c2)">
</div>
<?php
echo "<br><br><input style=\"width:480px\" type=\"range\" name=\"res\" value=\"$res\" min=\"1\" step=\"1\" max=\"13\" oninput=\"res = this.value; showMosaic(res, c1, c2)\">";
?>
</div>
</div>
</div>
</body>
</html>
