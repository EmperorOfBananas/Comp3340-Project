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
//removes item from cart
function removeItem(event){
  let id=parseInt(event.title)//retrieve title value of element and parse it to an int
  requestToRemove("manipulatecart.php?itemid="+id+"&remove=1",id)//make a request to the server
}

function checkout(){
  requestCheckout("checkout.php")//makes request to server
}

function requestToRemove(url,itemid){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		document.querySelector(`div[itemid="${itemid}"]`).remove()//remove element selected
        document.querySelector(".total").innerHTML="Subtotal: $"+this.responseText//update total
        if(this.responseText=="0"){//if cart is empty
          //adds html
          document.querySelector("h2").insertAdjacentHTML("afterend",
          `<div class="row shadow text-center my-5 py-5">
            <div class="col"><i class="fa-solid fa-bag-shopping"></i> Cart is empty</div>
          </div>`)
        }
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}

function requestCheckout(url){
  var xhr = new XMLHttpRequest()//prepare request
  
  xhr.open("POST", url, true)//POST method
  xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText!="empty"){//if reponse returns empty
			location.replace("index.php?checkoutCompleted=1")//user wants to checkout so replace url
        }
      }
  }
  xhr.send()//send request
}

function request(url){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		document.querySelector(".total").innerHTML="Subtotal: $"+parseFloat(this.responseText).toFixed(2)//update total
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}