async function receiveInfo(){
	await fetch("https://api.worldbank.org/v2/country/all/indicator/SP.POP.TOTL?format=json&date=2013:2020&per_page=2128")//fetches data at url provided
  		.then(response => response.json())//retrieve response and return it as json format
  		.then(data => sessionStorage.setItem("population",JSON.stringify(data)))//sets storage variable with data
  	populateTable()//populates html table with data
}

function populateTable(){
    let populationData=JSON.parse(sessionStorage.getItem("population"))//get session variable for population data and parse it as json
    let tableBody=document.querySelectorAll("tbody")//select tbody elements
	let tableContent=Array(8).fill("")//initialize empty array of length 8
  	let index=0//index for array
    //loop through data
	for(let i=384;i<populationData[1].length;i++){    
      	//add html as a string at index
      	tableContent[index]+=`<tr><td>${populationData[1][i].country.value}</td><td>${populationData[1][i].countryiso3code}</td><td>${populationData[1][i].value}</td></tr>`
        index==7?index=0:index++//checks if index is equal to 7, if so then set to 0 otherwise increment
    }
  	//for each tbody element adds the corresponding year population data
  	tableBody.forEach((element,indexValue)=>{
       element.innerHTML+=tableContent[indexValue]//appends population data for that year
    })
}

if(sessionStorage.getItem("population")==null){
  receiveInfo()
}else{
  populateTable()
}

