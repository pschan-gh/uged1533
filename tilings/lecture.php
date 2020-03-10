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
    $html .= "<div class=image><img src=\"$file\"></div>\n";
  }
  return $html;
}
function link_dump($file) {

  $links = file_get_contents($file);
  $rows = explode("\n", $links);
  $html = "";
  foreach($rows as $row) {
    $html .= "<p><div class=image><img src=\"$row\"></div><br><hr>\n";
  }
  return $html;
}

function get_page($content) {
  if(!empty($_GET['edit']))
    $edit = "contenteditable=\"true\"";
  else
    $edit = "contenteditable=\"false\"";
  
    if(!empty($_GET['dim']))
      echo "<script>dim();</script>";
  
  
  $source =  file_get_contents($content);
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
echo "<h4 class=title>Week 10<br>Planar Symmetries</h4>";
echo "<div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "<h3>M. C. Escher (Dutch 1898 -1972)</h3><hr>";
echo link_dump("escher.html");
echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "<h3>Alhambra</h3><hr>";
echo link_dump("alhambra.html");
echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "<h3>Islamic Art</h3><hr>";
echo link_dump("islamic.html");
echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "<h3>Jean-L&eacuteon G&eacuter&ocircme (French, 1824 - 1904)</h3><hr>";
echo link_dump("gerome.html");
echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";

echo "<div class=image><img src='./hexagons2.jpg'>";
echo "<br><br><i>Groups and Symmetry</i>, M. A. Armstrong</div>";

echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "<div class=image><img src='./hexagons.jpg'>";
echo "<br><br><i>Groups and Symmetry</i>, M. A. Armstrong</div>";

echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "<div class=image><img src='./hexagons3.jpg'>";
echo "<br><br><i>Groups and Symmetry</i>, M. A. Armstrong</div>";

echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "A <i>symmetry</i> of a wallpaper pattern is a transformation which leaves the pattern unchanged.  Such a transformation can be one of the following:";
echo "<ul><li> translation (<b>shift</b>)
<img style=\"width:200px\" src=\"translation.jpg\">
<li>rotation (<b>turn</b>)
<img style=\"width:200px\" src=\"rotation.jpg\">
<li>reflection (<b>flip</b>)
<img style=\"width:200px\" src=\"reflection.jpg\">
<li>glide reflection 
<img style=\"width:200px\" src=\"glide.jpg\"></ul>";

echo "<hr>
<div class=image>
(Illustration from <i>Geometric Symmetry in Patterns and Tilings</i>, Clare Horne.)
</div>";

echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "We will work with wallpaper patterns which have two shift symmetries. ";
echo "Any such wallpaper is associated with an underlying <i>lattice</i>,
which is obtained by applying the shift symmetries repeatedly to a fixed point 
(the origin) in the pattern.";

echo "<p><div class=image><img src='./lattice.jpg'>";
echo "<br><br><i>Groups and Symmetry</i>, M. A. Armstrong</div>";

echo "<hr></div><div class=\"slide\" onclick=\"showCurrentDiv()\">";
echo "There are five types of lattices generated this way:";
echo "<p><div class=image><img src='./lattice1.jpg'>";
echo "<br><br><i>Groups and Symmetry</i>, M. A. Armstrong</div>";

?>
<hr></div><div class="slide" onclick="showCurrentDiv()">
Note that a rotational (turn) symmetry of a wallpaper pattern may
correspond to a rotation (clockwise or anticlockwise) by 
60, 90, 120 or 180 degrees only.
<p>
There is no rotational symmetry which corresponds to a rotation by, say, 72 degrees.

<hr></div><div class="slide" onclick="showCurrentDiv()">
The set of shift, turn, flip and glide reflection symmetries 
of a wallpaper pattern form its
<b>wallpaper group</b>.  There are exactly 17 possible wallpaper groups.

<p>
They are enumerated by a combination of letters and integers.  For example:
<center>
$p6m, p4g, cm$
</center>

<hr></div><div class="slide" onclick="showCurrentDiv()">

<ul>
<li>
"<b>$p$</b>" stands for a <b>primitive lattice</b>, namely a lattice made up of cells
with no lattice points in their interiors.
<li>
"<b>$c$</b>" stands for a <b>centred lattice</b>, namely a lattice
each of whose building block is a non-primitive cell
plus a centered interior lattice point (Centred Rectangular).
<li>
"<b>$m$</b>" stands for reflection (m for <b>mirror</b>).
<li>
"<b>$g$</b>" stands for <b>glide reflection</b>.
</ul>
<ul>
<li>
"<b>$1$</b>" stands for the identity transformation (i.e. do nothing).
<li>
Each of "<b>$2, 3, 4, 6$</b>" stands for a rotation of the corresponding order.
</ul>
<hr>
A pattern is encoded in 4 characters "$x_1x_2x_3x_4$" as follows:
<ul>
<li>$x_1$ is either $p$ or $c$, depending on the lattice structure.
<li> $x_2$ is one of $1, 2, 3, 4, 6$, depending on the type of rotational symmetry.
($1$ stands for no rotational symmetry.)
<li> $x_3$ is one of $1$, $m$, or $g$, depending on whether there is mirror or glide
symmetry with respect to the "main" translation axis.<br>
(We choose the "main" axis to be any one of the two translational axes which has a mirror perpendicular to it.  If none of the two axes has a mirror perpendicular to it, then either one may be chosen to be the main one.)
<li> $x_4$ is one of $1$, $m$, or $g$, depending on whether there is mirror or glide symmetry with respect to some other axis besides the main one.
</ul>

<hr></div><div class="slide" onclick="showCurrentDiv()">
<p>
The following table serves as a useful guide in
identifying the wallpaper group of a given wallpaper pattern:
<div class=image>
<a href="https://en.wikipedia.org/wiki/Wallpaper_group#Guide_to_recognizing_wallpaper_groups">Guide to recognizing wallpaper groups</a> (Wikipedia).
</div>
<p>
Notice that the character "1" is sometimes omitted.

<?php
echo get_page("examples.html");
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


