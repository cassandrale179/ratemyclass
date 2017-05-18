var courseRequest = new XMLHttpRequest();
courseRequest.open('GET', 'allclasses/Antoinette.json', true);
courseRequest.onload = function(){
  var data = JSON.parse(courseRequest.responseText);
  var firstline = data["classes"][0];
  var string = Object.values(firstline);
  string = JSON.stringify(string);
  string = string.substring(2,string.length-2);
  var split = string.split(" ");
  console.log(split);

  var title = split[0]+split[1];
  var credit = split[split.length-2];



}
courseRequest.send();
