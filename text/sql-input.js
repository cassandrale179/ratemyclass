var output = document.getElementById('database');

var courseRequest = new XMLHttpRequest();
courseRequest.open('GET', 'allclasses/Antoinette.json', true);
courseRequest.onload = function(){
  var data = JSON.parse(courseRequest.responseText);

  for (var j = 0; j < 1644; j++){

    //------ EVEN NUMBER LINES ARE CLASS TITLE ------
    if (j % 2 == 0){
      var string = JSON.stringify(Object.values(data["classes"][j]));
      string = string.substring(2,string.length-2);

        //Parse through string
        var arr = string.split(" ");
        var courseID = arr[0] + arr[1];
        var title = "";
        for(var i = 2; i < arr.length-2; i++){
          title = title + arr[i] + " ";
        }
        var credit = arr[arr.length-2];
    }

    //------ ODD NUMBER LINES ARE COURSE DESCRIPTION ------
    if(j % 2 != 0){
        var str = JSON.stringify(Object.values(data["classes"][j]));
        var description = str.substring(2,str.length-2);
        //------DISPLAY THE RESULT------
        var between = "','";
        var college = "A";
        var SQLtext = "INSERT INTO course(class, title, description, credit, college) VALUES ('" + courseID + between + title + between + description + between + credit + between + college + "');<br>";
        output.insertAdjacentHTML('beforeend', SQLtext);

    }
  }
}
courseRequest.send();
