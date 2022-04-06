function fillFields(userid){
  request("fill.php?userid="+userid)//make request to server
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		var user=JSON.parse(this.responseText)
        document.querySelector("#fname").value=user.fname
        document.querySelector("#lname").value=user.lname    
        document.querySelector("#email").value=user.email       
        document.querySelector("#city").value=user.city       
        document.querySelector("#address").value=user.address        
        document.querySelector("#postal").value=user.postal
        document.querySelector("#password").value=user.password    
        document.querySelector("#isadmin").value=user.isadmin
        document.querySelector("#isdisabled").value=user.isdisabled      
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}