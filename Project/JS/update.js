function fillFields(userid){
  request("fill.php?userid="+userid)//make request to server
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		var user=JSON.parse(this.responseText)
        document.querySelector("#fname").value=user.fname//set fname input field value
        document.querySelector("#lname").value=user.lname  //set lname input field value  
        document.querySelector("#email").value=user.email//set email input field value       
        document.querySelector("#city").value=user.city//set city input field value       
        document.querySelector("#address").value=user.address//set address input field value        
        document.querySelector("#postal").value=user.postal//set postal input field value
        document.querySelector("#password").value=user.password //set password input field value   
        document.querySelector("#isadmin").value=user.isadmin//set isadmin input field value
        document.querySelector("#isdisabled").value=user.isdisabled//set isdisabled input field value      
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}