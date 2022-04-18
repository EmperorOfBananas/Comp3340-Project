function addToCart(itemid){
  request("addtocart.php?itemid="+itemid,itemid)//make request to server
}

function request(url,itemid){
  var xhttp = new XMLHttpRequest()//prepare request
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
  			if(document.querySelector(`div[product="${itemid}"]`)){    //checks if element exists
               document.querySelector(`div[product="${itemid}"]`).remove()//remove html element
            }
        	//inserts html
            document.querySelector(`div[data-itemid="${itemid}"] > .card-main-height`).insertAdjacentHTML("afterbegin",this.responseText)     
      }
  };
  xhttp.open("GET", url, true)
  xhttp.send()//send request
}

function alertUser(itemid){
  if(!document.querySelector(`div[product="${itemid}"]`)){//checks if element exists or not
    //adds html
  	document.querySelector(`div[data-itemid="${itemid}"] > .card-main-height`).insertAdjacentHTML("afterbegin",`<div class="alert alert-warning text-center" product="${itemid}">Must be logged in to add item!</div>`)
  }
}