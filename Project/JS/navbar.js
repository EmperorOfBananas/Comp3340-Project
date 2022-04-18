function querySearch(query){
  if(query!=""){//ensures query isnt empty
     location.replace("../search/index.php?query="+query)//replace url
  }
}

