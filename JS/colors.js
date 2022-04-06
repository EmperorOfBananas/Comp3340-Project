function requestColour(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		if(this.responseText=="red"){
          document.styleSheets[3].insertRule(".text-dark {color:#800020 !important;}",0)
          document.styleSheets[3].insertRule(".btn-dark {background-color:#800020 !important;}",0)
          document.styleSheets[3].insertRule(".btn-outline-dark {border:1px solid #800020!important;}",0)
          document.styleSheets[3].insertRule(".btn-outline-dark:hover {background-color:#800020 !important;}",0)
          document.styleSheets[3].insertRule(".bg-dark {background-color:#800020 !important;}",0)          
        }else if(this.responseText=="blue"){
          document.styleSheets[3].insertRule(".text-dark {color:#000080 !important;}",0)
          document.styleSheets[3].insertRule(".btn-dark {background-color:#000080 !important;}",0)
          document.styleSheets[3].insertRule(".btn-outline-dark {border:1px solid #000080!important;}",0)
          document.styleSheets[3].insertRule(".btn-outline-dark:hover {background-color:#000080 !important;}",0)
          document.styleSheets[3].insertRule(".bg-dark {background-color:#000080 !important;}",0)          
        }
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}

requestColour("../color.php")