//----------- global variables -----------
var difficulty;
var majorSort;

//----------- function to redirect class page -----------
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


function sortClass(){
  //-----------Get some element ID-----------
  var jsondisplay = document.getElementById("E1");
  var headerdisplay = document.getElementById("E");

  //-----------create some arrays-----------
  var classArray = [];
  var avgArray = [];
  var oldArray = [];
  var classArraySort = [];

  //-----------Get local storage value----------
  var permDifficulty = localStorage.getItem("permanentString");
  var permMajorSort = localStorage.getItem("permanentString2");

  //-----------send an AJAX request-----------
  var request = new XMLHttpRequest();
  request.open('GET', 'file.php', true);
  request.onload = function()
  {
     var data = JSON.parse(request.responseText);

     //-----------sorting the array by name-----------
     data.sort(function(a,b){
       var nameA = a.class.toUpperCase();
       var nameB = b.class.toUpperCase();

       if (nameA < nameB){
         return -1;
       }

       if (nameA > nameB){
         return 1;
       }
     });

     //----------- creating a class array -----------
     for (var i = 0; i < data.length; i++){
       classArray.push(data[i].class);
     }

     //-----------remove duplicates-----------
     classArray = classArray.filter((elem, i, arr) => {
       if (arr.indexOf(elem) === i){
         return elem;
       }
     });

     //----------- sort class Array by name to prevent future relooping of data-----------
     classArray = classArray.sort();


     //-----------Calculate average for each class-----------
     var sum = 0;
     var count = 0;
     var k = 0;
     var j = 0;
     while(j < data.length){
       if (data[j].class == classArray[k]){
         sum += parseFloat(data[j].grade);
         count++;
       }

       if (data[j].class != classArray[k]){
         var avg = Math.round(sum / count * 100) / 100;
         avgArray.push(avg);
         k++;
         j--;
         sum = 0;
         count = 0;
       }
       j++;
     }

      //--------------------keep an old copy of the original array--------------------
      var oldArray = new Array();
      for (var l = 0; l < avgArray.length; l++){
        oldArray.push(avgArray[l]);
      }


      //--------------------creating a new array that is sorted-------------------
      var newArray = avgArray.sort(function(a,b){
        return b - a;
      })


      //--------------------Mapping function--------------------
      for (var l = 0; l < avgArray.length; l++){
        for (var m = 0; m < oldArray.length; m++){
          if (avgArray[l] == oldArray[m]){
            classArraySort.push(classArray[m]);
          }
        }
      }

      //Creating an array that holds only class which belong to the specified major
      var majorArray = [];
      var majorScore = [];
      for (var p = 0; p < classArraySort.length; p++){
        if (classArraySort[p].substring(0, classArraySort[p].length - 3) == permMajorSort){
          majorArray.push(classArraySort[p]);
          majorScore.push(newArray[p]);
        }
      }

      //--------------------Function to change class color --------------------
      var colorArray = [];
      for (var o = 0; o < majorScore.length; o++){
        if (majorScore[o] > 3.30) colorArray.push("#117864");
        else if (majorScore[o] > 2.60) colorArray.push("#F4D03F");
        else if (majorScore[o]  > 0) colorArray.push("#922B21");
      }


      //-------------------- If no local storage value is set --------------------
      if (permDifficulty == "undefined" || permMajorSort == "undefined"){
        alert ("Please click on sorting to sort your class");
      }


      //--------------------Displaying Easy Class First --------------------
      if (permDifficulty == "Easy"){
        for (var n = 0; n < majorArray.length; n++){
          var text = "<a href='../class/" + majorArray[n] + ".php'><button style='border-left: 50px solid" + colorArray[n] + "'> <b>" + majorArray[n] + " </b>(Average: " + majorScore[n] + ")</button></a><br>";
          headerdisplay.insertAdjacentHTML('beforeend', '<h1> Easy to Difficult </h1>');
          jsondisplay.insertAdjacentHTML('beforeend', text);
        }
      }

        //--------------------Displaying Hard Class First --------------------
      if (permDifficulty == "Difficult"){
        for (var n = majorArray.length-1; n >= 0; n--){
          var text = "<button style='border-left: 50px solid" + colorArray[n] + "'> <b>" + majorArray[n] + " </b>(Average: " + majorScore[n] + ")</button></a><br>";
          headerdisplay.insertAdjacentHTML('beforeend', '<h1> Difficult to Easy </h1>');
          jsondisplay.insertAdjacentHTML('beforeend', text);
        }
      }
  }
  request.send();
}

//------- Calling our function! ---------
pageRedirect();
sortClass();
