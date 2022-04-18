function validateQuantity(event){
  let max=parseInt(event.max)//retrieve max value of element and parse it to an int
  let min=parseInt(event.min)//retrieve min value of element and parse it to an int
  let currentValue=parseInt(event.value)//retrieve current value of element and parse it to an int
  if(max<currentValue){//check if current value is larger than the max
  	event.value=max //if so make current value equal to max
  }else if(min>currentValue){//checks if current value is less than min
    event.value=min//if so make curernt value eqaul to min
  }
  request("manipulatecart.php?itemid="+event.name+"&quantity="+event.value)//make a request to the server
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		console.log("test")
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}