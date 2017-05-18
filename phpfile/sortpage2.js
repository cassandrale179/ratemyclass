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
      if(data[i].class.substring(0, data[i].class.length-3) == permMajorSort){
        oldClass.push(data[i].class);
        var average = Math.round(parseFloat(data[i].sum)  / parseFloat(data[i].count) * 100) / 100;
        oldAvg.push(average);
      }
    }


    //----------- CREATE AN OLD ARRAY----------
    for (var j = 0; j < oldAvg.length; j++){
      newAvg.push(oldAvg[j]);
    }


    //----------- SORT THE NEW ARRAY---------
    newAvg.sort(function(a,b){return b - a;})

    //----------- MAPPING FUNCTION ---------
    for (var k = 0; k  < newAvg.length; k++){
      for (var l = 0; l < oldAvg.length; l++){
        if (oldAvg[l] == newAvg[k]) newClass.push(oldClass[l]);
      }
    }

    //------- FUNCTION TO CHANGE COLOR ------
    for (var m = 0; m < newAvg.length; m++){
      if (newAvg[m] > 3.30) colorArray.push("#117864");
      else if (newAvg[m] > 2.60) colorArray.push("#F4D03F");
      else if (newAvg[m] > 0) colorArray.push("#922B21");
    }

    //-------------------- If no local storage value is set --------------------
    if (permDifficulty == "undefined" || permMajorSort == "undefined"){
      alert ("Please click on sorting to sort your class");
    }

    //--------------------Displaying Easy Class First --------------------
    if (permDifficulty == "Easy"){
      for (var n = 0; n < newAvg.length; n++){
        var text = "<button style='border-left: 50px solid" + colorArray[n] + "'> <b>" + newClass[n] + " </b>(Average: " + newAvg[n] + ")</button></a><br>";
        headerdisplay.insertAdjacentHTML('beforeend', '<h1> Easy to Difficult </h1>');
        jsondisplay.insertAdjacentHTML('beforeend', text);
      }
    }

    //--------------------Displaying Hard Class First --------------------
    if (permDifficulty == "Difficult"){
      for (var n = newAvg.length-1; n >= 0; n--){
        var text = "<button style='border-left: 50px solid" + colorArray[n] + "'> <b>" + newClass[n] + " </b>(Average: " + newAvg[n] + ")</button></a><br>";
        headerdisplay.insertAdjacentHTML('beforeend', '<h1> Difficult to Easy </h1>');
        jsondisplay.insertAdjacentHTML('beforeend', text);
      }
    }
  }
  request.send();
}

pageRedirect();
sortClass();
