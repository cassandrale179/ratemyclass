//----------- CREATE SOME GLOBAL VARIABLES  -----------
var difficulty;
var majorSort;

//----------- FUNCTION TO REDIRECT CLASS PAGE -----------
function pageRedirect()
{
  $('#mySelect').on('change', function() {
    var second = $(this).val();
  	difficulty = second;
  });
  $("#searchbar").on("input", function(){
  	var first = this.value;
    function myfilter(){
    	return this.value === first;
  }
  	if($("#classes option").filter(myfilter).length){
        var matches = first;
        var regExp = /\(([^)]+)\)/;
        majorSort = regExp.exec(matches)[1];
    }
  });

  $(document).ready(function () {
          $("#btnSave").click(
              function () {
                  $(location).attr("href", "../majorsort/page.php");
                  permanentString = difficulty;
                  permanentString2 = majorSort;
                  localStorage.setItem("permanentString", permanentString);
                  localStorage.setItem("permanentString2", permanentString2);
              }
          );
   });
}

//---------- FUNCTION TO SORT CLASS ----------
function sortClass(){

  //-----------GET SOME ID AND LOCAL STORAGE VALUE-----------
  var jsondisplay = document.getElementById("E1");
  var headerdisplay = document.getElementById("E");
  var permDifficulty = localStorage.getItem("permanentString");
  var permMajorSort = localStorage.getItem("permanentString2");

  //---------- CREATE SOME ARRAY----------
  var oldClass = [];
  var oldAvg = [];
  var newClass = [];
  var newAvg = new Array();
  var colorArray = [];

  //-----------SEND AN AJAX REQUEST----------
  var request = new XMLHttpRequest();
  request.open('GET', 'file2.php', true);
  request.onload = function()
  {
    var data = JSON.parse(request.responseText);

    //-----------SELECTIVELY CHOOSE CLASS BELONGING TO THE MAJOR ----------
    for (var i = 0; i < data.length; i++){
      if(data[i].class.substring(0,data[i].class.length-3) == permMajorSort){
        oldClass.push(data[i].class);
        var average = Math.round(parseFloat(data[i].sum)  / parseFloat(data[i].count) * 100) / 100;
        if (isNaN(average)) average = 0;
        oldAvg.push(average);
      }
    }


    //----------- CREATE A NEW ARRAY----------
    for (var j = 0; j < oldAvg.length; j++){
      newAvg.push(oldAvg[j]);
    }


    //----------- SORT THE NEW ARRAY---------
    newAvg.sort(function(a,b){return b - a;})

    //----------- MAPPING FUNCTION ---------
    for (var l = 0; l < newAvg.length; l++){
      for (var k = 0; k < oldAvg.length; k++){
        if (newAvg[l] == oldAvg[k] && newAvg[l] > 0){
          newClass.push(oldClass[k]);
          oldClass.splice(k,1);
          oldAvg.splice(k,1);
        }
      }
    }

    //------- FUNCTION TO CHANGE COLOR ------
    for (var m = 0; m < newAvg.length; m++){
      if (newAvg[m] > 3.30) colorArray.push("#117864");
      else if (newAvg[m] > 2.60) colorArray.push("#F4D03F");
      else if (newAvg[m] >= 0) colorArray.push("#922B21");
      else{
        colorArray.push("#424949");
      }
    }

    //-------------------- IF NO LOCAL STORAGE VALUE --------------------
    if (permDifficulty == "undefined" || permMajorSort == "undefined"){
      alert ("Please click on sorting to sort your class");
    }

    //-------------------- DISPLAYING EASY CLASS --------------------
    if (permDifficulty == "Easy"){
      for (var n = 0; n < newClass.length; n++){
        var text = "<button style='border-left: 50px solid" + colorArray[n] + "'> <b>" + newClass[n] + " </b>(Average: " + newAvg[n] + ")</button></a><br>";
        headerdisplay.insertAdjacentHTML('beforeend', '<h1> Easy to Difficult </h1>');
        jsondisplay.insertAdjacentHTML('beforeend', text);
      }
    }

    //-------------------- DISPLAYING HARD CLASS  --------------------
    if (permDifficulty == "Difficult"){
      for (var n = newClass.length-1; n >= 0; n--){
        var text = "<button style='border-left: 50px solid" + colorArray[n] + "'> <b>" + newClass[n] + " </b>(Average: " + newAvg[n] + ")</button></a><br>";
        headerdisplay.insertAdjacentHTML('beforeend', '<h1> Difficult to Easy </h1>');
        jsondisplay.insertAdjacentHTML('beforeend', text);
      }
    }
    console.log(oldAvg);
    console.log(newAvg);
    console.log(oldClass);
    console.log(newClass);
  }
  request.send();
}

pageRedirect();
sortClass();




{}
