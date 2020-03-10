<html>
<head>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]},
  SVG: { scale: 100 }
});

</script>
<script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
</script>
<link rel="stylesheet" href="../styles.css" media="all">
<style>
#text {
text-align: justify;
width:15cm;
padding-top:3cm;
padding-bottom:3cm;
margin-left:3cm;  
font-size:1.2em;
}
</style>

<script type="text/javascript">
function resizeFont(multiplier) {
  if (document.getElementById("text").style['font-size'] == "") {
    document.getElementById("text").style['font-size'] = "1.2em";
  }
  document.getElementById("text").style['font-size'] = parseFloat(document.getElementById("text").style['font-size']) + 0.2*(multiplier) + "em";
}
</script>
</head>
<body>
<div class='page'>
<div id='fontsel'>
<a href="javascript:void(0)" onclick="resizeFont(-1);" style="font-size:1.0em;text-decoration:none;color:#aaa;position:absolute;right:0;bottom:1.8em;">-Font</a>
<a href="javascript:void(0)" onclick="resizeFont(1);" style="font-size:1.4em;text-decoration:none;color:#aaa;position:absolute;right:0;top:0">+Font</a>
</div>

<div id='text'> 
<?php
echo  file_get_contents('./human_prop.html');
echo  file_get_contents('./golden_ratio.html');
?>

<p style='clear:right'>
<hr>
<h2>References</h2>
<ol>
<li value="1">
<a id='footnote-1' style='text-decoration:none' href="#ref-1">
<span style='font-family:Sans-Serif'>^</span></a>
Tobin, Richard. <i>The Canon of Polykleitos</i>,
American Journal of Archaeology in 1975, Vol. 79, No. 4 (Oct., 1975), pp. 307-321.
<li value="2">
<a id='footnote-2' style='text-decoration:none' href="#ref-2">
<span style='font-family:Sans-Serif'>^</span></a>
Hambidge, Jay. <i>The Elements of Dynamic Symmetry</i>, 
Dover Publications (June 1, 1967).
<li value="3">
<a id='footnote-3' style='text-decoration:none' href="#ref-3">
<span style='font-family:Sans-Serif'>^</span></a>
<a href='https://en.wikipedia.org/wiki/Golden_rectangle'>
https://en.wikipedia.org/wiki/Golden_rectangle</a>
<li value="4">
<a id='footnote-4' style='text-decoration:none' href="#ref-4">
<span style='font-family:Sans-Serif'>^</span></a>
<a href='http://www.goldennumber.net/category/design/'>
http://www.goldennumber.net/category/design/</a>
<li value="5">
<a id='footnote-5' style='text-decoration:none' href="#ref-5">
<span style='font-family:Sans-Serif'>^</span></a>
Markowsky, George. <i>Misconceptions about the Golden Ratio</i>,
The College Mathematics Journal
Vol. 23, No. 1 (Jan., 1992), pp. 2-19
<a href='http://www.jstor.org/stable/2686193'>JSTOR</a>
</ol>
</div> <!-- text -->
</div> <!-- page -->
</body>
</html>


