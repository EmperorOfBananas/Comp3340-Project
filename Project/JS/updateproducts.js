function fillFields(itemid){
  request("fill.php?itemid="+itemid)//make request to server
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		var product=JSON.parse(this.responseText)
        document.querySelector("#item").value=product.item//set item input field value
        document.querySelector("#brand").value=product.brand//set brand input field value 
        document.querySelector("#description").value=product.description//set description input field value    
        document.querySelector("#image").value=product.image//set image input field value    
        document.querySelector("#price").value=product.price//set price input field value      
        document.querySelector("#stock").value=product.stock//set stock input field value
        document.querySelector("#categories").value=product.category//set category input field value
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}