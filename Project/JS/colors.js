//sets website color scheme
function setColorScheme(color){
  //checks if website color scheme is red
  if(color=="red"){
    document.documentElement.style.setProperty("--primary-color","#800020")//inserts css rule
    document.styleSheets[3].insertRule(".text-dark {color:var(--primary-color) !important;}",0)//inserts css rule
    document.styleSheets[3].insertRule(".btn-dark {background-color:var(--primary-color) ;}",0)//inserts css rule
    document.styleSheets[3].insertRule(".btn-outline-dark {border:1px solid var(--primary-color);}",0)//inserts css rule
    document.styleSheets[3].insertRule(".btn-outline-dark:hover {background-color:var(--primary-color);}",0)//inserts css rule
    document.styleSheets[3].insertRule(".bg-dark {background-color:var(--primary-color) !important;}",0)//inserts css rule
  }else if(color=="blue"){//checks if color scheme is blue
    document.documentElement.style.setProperty("--primary-color","#000080")//inserts css rule
    document.styleSheets[3].insertRule(".text-dark {color:var(--primary-color) !important;}",0)//inserts css rule
    document.styleSheets[3].insertRule(".btn-dark {background-color:var(--primary-color);}",0)//inserts css rule
    document.styleSheets[3].insertRule(".btn-outline-dark {border:1px solid var(--primary-color);}",0)//inserts css rule
    document.styleSheets[3].insertRule(".btn-outline-dark:hover {background-color:var(--primary-color);}",0)//inserts css rule
    document.styleSheets[3].insertRule(".bg-dark {background-color:var(--primary-color) !important;}",0)//inserts css rule   
  } 
}

//request to get what the website color scheme should be
function requestColour(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var color=this.responseText//assigns color string
        setColorScheme(color)//set color scheme
        sessionStorage.setItem("color",color)//set storage variable for color
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}
//checks if session variable is set
if(sessionStorage.getItem("color")===null){
	requestColour("../color.php")
}else{
  	setColorScheme(sessionStorage.getItem("color"))//retrieve color scheme string and send it to function
}