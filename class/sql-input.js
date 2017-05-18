var courseRequest = new XMLHttpRequest();
courseRequest.open('GET', 'allclasses/Antoinette.json', true);
courseRequest.onload = function(){
  var data = JSON.parse(courseRequest.responseText);
  var firstline = data["classes"][0];
  var string = Object.values(firstline);
  console.log(string); 
}
courseRequest.send();
