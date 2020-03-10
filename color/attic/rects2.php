<html>
<head>

<link rel="stylesheet" href="styles.css" media="all">
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

<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {
    inlineMath: [['$','$'], ['\\(','\\)']]
	},
  
});
</script>

<script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
</script>

<script type="text/javascript" src="slideshow.js">
</script>
</head>
<body>
<div class='page'>
<div id='fontsel'>
<a href="javascript:void(0)" onclick="resizeFont(-1);" style="font-size:1.0em;text-decoration:none;color:#aaa;position:absolute;right:0;top:4em;">-Font</a>
<a href="javascript:void(0)" onclick="resizeFont(1);" style="font-size:1.4em;text-decoration:none;color:#aaa;position:absolute;right:0;top:1em">+Font</a>
</div>
<div id='text'>
<?php
$precolor1 = $_GET['color1'];
$precolor2 = $_GET['color2'];
$precolor3 = $_GET['color3'];
$precolor4 = $_GET['color4'];
$color1 = "#".$_GET['color1'];
$color2 = "#".$_GET['color2'];
$res = $_GET['res'];
$steps = floor(50*$res);
$size = 10/$res;
?>
<div class=image id="mosaic"></div>
<script type="text/javascript">
function showMosaic(res, color1, color2, mosaic) {
  res = res/5;
  steps = Math.floor(50*res);
  size = 10/res;
  radius = size;
  svg = "<svg width=\"500\" height=\"500\">";
  for (i = 0; i < steps; i++) {
    for (j = 0; j < steps; j++) {
      c_x = size*j;
      c_y = size*i;
      if ((i + j) % 2 == 0)
	svg += "<rect x="+ c_x + " y=" + c_y + " width=" + radius + 
	" height=" + radius + " fill=" + color1 + " />";
      else
	svg += "<rect x="+ c_x + " y=" + c_y + " width=" + radius + 
	" height=" + radius + " fill=" + color2 + " />";
    }
  }
  svg += "</svg>";
  document.getElementById(mosaic).innerHTML= svg;
}
</script>
<?php
echo "<script>showMosaic($res, \"$color1\", \"$color2\", \"mosaic1\")</script>";
echo "
<p>
<div class=image>
<!-- <br>Resolution: ".($res*5)." / 15 -->
<div style=\"width:100px;display:inline-block;text-align:center;padding:0px\">
<div style=\"margin:0px;float:left;width:50px;height:50px;background-color:$color1\"></div>
<div style=\"margin:0px;float:right;width:50px;height:50px;background-color:$color2\"></div>
</div>";
?>
<?php
echo "<br><br><input style=\"width:480px\" type=\"range\" name=\"res\" value=\"$res\" min=\"1\" steps=\"1\" max=\"15\" onchange=\"showMosaic(this.value,'$color1','$color2')\">";
?>
</div>
</div>
</div>
</body>
</html>