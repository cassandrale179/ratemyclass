var classArr = [];
var list = document.getElementById("classes");

  var listRequest = new XMLHttpRequest();
  listRequest.open('GET', 'file2.php', true);
  listRequest.onload = function(){
    var listData = JSON.parse(listRequest.responseText);
    for (var i = 0; i < listData.length; i++){
      classArr.push(listData[i].class);
    }
    //Appending array into option value
    classArr.forEach(function(item){
       var option = document.createElement('option');
       option.value = item;
       list.appendChild(option);
    });
  }
  listRequest.send();
