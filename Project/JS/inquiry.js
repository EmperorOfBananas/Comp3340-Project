function fillFields(inquiryid){
  request("fill.php?inquiryid="+inquiryid)//make request to server
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		var inquiry=JSON.parse(this.responseText)//retrieve json
        document.querySelector("#title").value=inquiry.title//set inquiry title
        document.querySelector("#description").value=inquiry.description//set inquiry description 
        document.querySelector("#response").value=inquiry.response//set inquiry response     
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}