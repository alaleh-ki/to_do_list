
function checking(elem){
  if($(elem).hasClass("checked")){
  var id =  $(elem).attr("id")
  $.post('http://localhost/to%20do%20list/main.php',{'unchecked':id}).then(res=>{
    console.log(res)
    $(elem).toggleClass("checked");
  })
  } else{
    var id =  $(elem).attr("id")
    $.post('http://localhost/to%20do%20list/main.php',{'checked':id}).then(res=>{
      console.log(res)
      $(elem).toggleClass("checked");
    })
  }
}

