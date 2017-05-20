var classArr = [];
function datalist(){
  var listRequest = new XMLHttpRequest();
  listRequest.open('GET', 'file2.php', true);
  listRequest.onload = function(){
    var listData = JSON.parse(listRequest.responseText);
    for (var i = 0; i < listData.length; i++){
      classArr.push(listData[i].class);
    }
  }
  listRequest.send();
  console.log(classArr);
}
datalist();
