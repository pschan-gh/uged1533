function dim() {
    document.body.style.background = "#000";
    var i;
    var x = document.getElementsByClassName("page");
    x[0].style.background="#000";
    var x = document.getElementById("text");
    x.style.background="#000";
    x.style.color="#999";
}

function resizeFont(multiplier) {
  if (document.getElementById("text").style.fontSize == "") {
    document.getElementById("text").style.fontSize = "1.0em";
  }
  document.getElementById("text").style.fontSize = parseFloat(document.getElementById("text").style.fontSize) + 0.2*(multiplier) + "em";
}

var slideIndex = 1;

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slide");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "table-cell";
  x[slideIndex-1].style['vertical-align'] = "middle";
}
function showAll() {
  var i;
  var x = document.getElementsByClassName("slide");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "block";
  }
  slideIndex=1;
    var y = document.getElementsByClassName("collapse");
  for (i = 0; i < y.length; i++) {
     y[i].style.display = "block";
  }
}

function clickedClassHandler(name,callback) {

    // apply click handler to all elements with matching className
    var allElements = document.body.getElementsByTagName("*");

    for(var x = 0, len = allElements.length; x < len; x++) {
        if(allElements[x].className == name) {
            allElements[x].onclick = handleClick;
        }
    }

    function handleClick() {
        var elmParent = this.parentNode;
        var parentChilds = elmParent.childNodes;
        var index = 0;

        for(var x = 0; x < parentChilds.length; x++) {
            if(parentChilds[x] == this) {
                break;
            }

            if(parentChilds[x].className == name) {
                index++;
            }
        }

        callback.call(this,index);
    }
}

function showCurrentDiv() {
  clickedClassHandler("slide",function(index){
    // do something with the index
      slideIndex=index;
      showDivs(slideIndex += 1);
      var y = document.getElementsByClassName("collapse");
      for (i = 0; i < y.length; i++) {
	  y[i].style.display = "";
  }
});
}

