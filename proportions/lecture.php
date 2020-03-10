<html>
<head>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" media="all" />
<link rel="stylesheet" href="styles.css" media="all">


<script type="text/javascript" src="../slideshow.js">
</script>

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]},
  SVG: { scale: 100 }
});
</script>

<script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
</script>

<style>
h1, h2, h3, h4 {
color:#428bc1;
}
hr {border-color:#555}
blockquote{
border-left: 10px solid #555;
padding-top:0px;
}
</style>

</head>
<body>
<div class='page'>
<div id='fontsel'>
<a href="javascript:void(0)" onclick="resizeFont(-1);" style="font-size:1.0em;text-decoration:none;color:#aaa;position:absolute;right:0;top:4em;">-Font</a>
<a href="javascript:void(0)" onclick="resizeFont(1);" style="font-size:1.4em;text-decoration:none;color:#aaa;position:absolute;right:0;top:1em">+Font</a>
</div>

<div id='text'>
<div class=title>Week 2<br>Proportions</div>
<?php
function get_page($content) {
     $source =  file_get_contents($content);
if ((empty($_GET['showall']) == 1) || ($_GET['showall'] == 0)) {
     $source = str_replace("#sep", "</div><div contenteditable=\"false\" class=\"slide\" onclick=\"showCurrentDiv()\">", $source);
}
     else
       $source = str_replace("#sep", "<hr></div><div contenteditable=\"false\" class=\"slide\" onclick=\"showCurrentDiv()\">", $source);
     $source = str_replace("#ex", "<hr><blockquote><b>Exercise.</b>", $source);
     $source = str_replace("#eg", "<hr><blockquote><b>Example.</b>", $source);
     $source = str_replace("#def", "<hr><blockquote><b>Definition.</b>", $source);
     $source = str_replace("#end", "</blockquote><hr>", $source);
     
     echo $source;
}

get_page("human_prop_exp.html");
get_page("golden_ratio_exp.html");
get_page("ref.html");

echo "<hr></div>";      


if ((empty($_GET['showall']) == 1) || ($_GET['showall'] == 0)) {
    echo "<div class=controls>
<a  style='font-size:2em;position:fixed;top:45%;left:5%' onclick='plusDivs(-1)'>❮</a>
<a  style='font-size:2em;position:fixed;top:45%;right:5%' onclick='plusDivs(1)'>❯</a>
<a  style='position:fixed;bottom:2%;left:5%' onclick='showAll()'>Show all</a>
<a  style=\"position:fixed;bottom:2%;right:5%\" onclick=\"MathJax.Hub.Typeset()\">Refresh</a></div>
<script>
showDivs(slideIndex);
</script>";
}
?>
</div>
</div>
</body>
</html>


