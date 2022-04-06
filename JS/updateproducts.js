function fillFields(itemid){
  request("fill.php?itemid="+itemid)//make request to server
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		var product=JSON.parse(this.responseText)
        document.querySelector("#item").value=product.item
        document.querySelector("#brand").value=product.brand 
        document.querySelector("#description").value=product.description    
        document.querySelector("#image").value=product.image    
        document.querySelector("#price").value=product.price      
        document.querySelector("#stock").value=product.stock
        document.querySelector("#categories").value=product.category
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}