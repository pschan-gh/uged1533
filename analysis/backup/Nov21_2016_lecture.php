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
<!-- <h4 class=title>Colour</h4> -->

<?php
  if(!empty($_GET['dim']))
    echo "<script>dim();</script>";

function image_dump($dir) {

  $dirlist = glob($dir."/*");
  $html = "";
  foreach($dirlist as $file) {
    $html .= "<div class=image><img src=\"$file\"></div>";
  }
  return $html;
}
function link_dump($file) {

  $links = file_get_contents($file);
  $rows = explode("\n", $links);
  $html = "";
  foreach($rows as $row) {
    $html .= "<p><div class=image><img src=\"$row\"></div><br><hr>";
  }
  return $html;
}

function get_source($source) {
  if(!empty($_GET['edit']))
    $edit = "contenteditable=\"true\"";
  else
    $edit = "contenteditable=\"false\"";
  
    if(!empty($_GET['dim']))
      echo "<script>dim();</script>";
  
//  $source =  file_get_contents($content);
  $source = str_replace('\begin{proof}', "", $source);
  $source = str_replace('\end{proof}', "", $source);
  $source = str_replace('\begin{itemize}', "<ul>", $source);
  $source = str_replace('\end{itemize}', "</ul>", $source);
  $source = str_replace('\begin{enumerate}', "<ol>", $source);
  $source = str_replace('\end{enumerate}', "</ol>", $source);
  $source = str_replace("\item", "<li>", $source);
  
  if (empty($_GET['showall']) == 1 || $_GET['showall'] == 0) {
    $source = str_replace('@sep', "<hr></div><div $edit class=\"slide\" onclick=\"showCurrentDiv()\">", $source);
  } else 
    $source = str_replace('@sep', "<hr></div><div $edit class=\"slide\" onclick=\"showCurrentDiv()\">", $source);
     $source = str_replace('@ex', "<p><blockquote><h5>Exercise.</h5>", $source);
  $source = str_replace('@fact', "<p><blockquote><h5>Fact.</h5>", $source);
  $source = str_replace('@remark', "<p><blockquote><h5>Remark.</h5>", $source);
  $source = str_replace('@thm', "<p><blockquote><h5>Theorem.</h5>", $source);
  $source = str_replace('@proof', "<p><blockquote><h5>Proof.</h5>", $source);
  $source = str_replace('@cor', "<p><blockquote><h5>Corollary.</h5>", $source);
  $source = str_replace('@eg', "<p><blockquote><h5>Example.</h5>", $source);
  $source = str_replace('@def', "<p><blockquote><h5>Definition.</h5>", $source);
  $source = str_replace('@end'."\n", "<p></blockquote><hr>", $source);
  $source = str_replace('@images', "http://www.math.cuhk.edu.hk/~pschan/uged1533/images", $source);
  
  $source = str_replace('@endproof'."\n", '<br><div style="width:100%;text-align:right;color:#428bc1">&#x25FC</div>', $source);
  
  $source = preg_replace('/@collapse (\w+) \[((.*?))\]@/', '<a contenteditable=false data-toggle="collapse" href=#${1} aria-expanded="false" aria-controls="${1}">${2}</a><div id="${1}" class="collapse">', $source);
  $source = preg_replace('/@collapse (\w+)@/', '<a contenteditable=false data-toggle="collapse" href=#${1} aria-expanded="false" aria-controls="${1}">></a><div id="${1}" class="collapse">', $source);
  $source = preg_replace("/{\\\\bf(.*?)}/", '<b>${1}</b>', $source);
  $source = preg_replace("/\\\\section{(.*?)}/", '<h2>${1}</h2>', $source);
  $source = preg_replace("/\\\\subsection{(.*?)}/", '<h3>${1}</h3>', $source);
  
  echo $source;
}

$source = file_get_contents("lecture.html");

echo get_source($source);
echo "<hr></div>";

if (empty($_GET['showall']) == 1 || $_GET['showall'] == 0) {
    echo "<div class=controls>
<a  style='font-size:2em;position:fixed;top:45%;left:5%;color:#428bc1' onclick='plusDivs(-1)'>❮</a>
<a  style='font-size:2em;position:fixed;top:45%;right:5%;color:#428bc1' onclick='plusDivs(1)'>❯</a>
<a  style='position:fixed;bottom:2%;left:5%;color:#428bc1;' onclick='showAll()'>Show all</a>
<a  style=\"position:fixed;bottom:2%;right:5%;color:#428bc1;\" onclick=\"MathJax.Hub.Typeset()\">Refresh</a></div>
<script>
showDivs(slideIndex);
</script>";
}
?>
</div>
</div>
</body>
</html>


