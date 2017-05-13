//------------- CREATE SOME GLOBAL VARIABLES ------------
var val;
var classavg = 0;
var count = 0;
var arr = [];

//------------- FUNCTION TO REDIRECT PAGE  ------------
function searchBar()
{
	$("#searchbar").on('input', function () {
   val = this.value;
   var website = "../class/classes.php";
   //filter object to return current value selected by user
    if($('#classes option').filter(function(){
        return this.value === val;
    }).length) {
			 localStorage.setItem("val", val);
       $(location).attr('href', website);
    }
	});
}


//------------- FUNCTION TO SHOW/HIDE POLL  ------------
function pollBox(){
		 $('#review').click(function(){
			 $('#target').toggle('slow');
		 });
}


//------------- FUNCTION TO HOVER  ------------
function changeHover(hover, nonhover){
	 $("#review, #saveclass").hover(function(){
	 $(this).css("background-color", hover);
	 }, function(){
	 $(this).css("background-color", nonhover);
})};


//------------- FUNCTION TO DISPLAY COURSE DESCRIPTION  ------------
function courseDisplay(){

	//create some variables here
	var permClass = localStorage.getItem("val");
	var titleDisplay = document.getElementById("C1B");
	var descriptionDisplay = document.getElementById("C1");


	//Pulling JSON data of course description
	var courseRequest = new XMLHttpRequest();
	courseRequest.open('GET', 'file2.php', true);
	courseRequest.onload = function()
	{
		var courseData = JSON.parse(courseRequest.responseText);
		for (var i = 0; i < courseData.length; i++){
			if(courseData[i].class == permClass){
				var title = courseData[i].title;
				var credit = "<br><b> Credit: </b>" + courseData[i].credit;
			 	var description = courseData[i].description;
			}
		}

		//Display thing based on value of permanent value
		header.insertAdjacentHTML('beforeend', permClass);
		titleDisplay.insertAdjacentHTML('beforeend', title);
		descriptionDisplay.insertAdjacentHTML('beforeend', description);
		descriptionDisplay.insertAdjacentHTML('beforeend', credit);
	}

	courseRequest.send();


}


 //--------------  FUNCTION TO DISPLAY CLASS CHART  -----------------------
 function calculateClassAvg(){

	 //Get id of stuff
	 var jsondisplay = document.getElementById("jsondisplay");
	 var reviewbtn = document.getElementById("review");
	 var header = document.getElementById("header");
	 var permClass = localStorage.getItem("val");


	 //Pulling JSON data from internal file
	 var request = new XMLHttpRequest();
	 request.open('GET', 'file.php', true);
	 request.onload = function()
	 {
		var data = JSON.parse(request.responseText);
		for (var i = 0; i < data.length; i++)
		{
			if (data[i].class == permClass){
				classavg += parseFloat(data[i].grade);
				count++;
				arr.push(parseFloat(data[i].grade));
			}
		}

		//Store class grade to pie chart
		var a = 0;
		var b = 0;
		var c = 0;
		var d = 0;
		var f = 0;
		for (var j = 0; j < arr.length; j++){
			if (arr[j] > 3.6) a++;
			else if (arr[j] > 2.6) b++;
			else if (arr[j] > 1.6) c++;
			else if (arr[j] > 0) d++;
			else{f++};
		}


		//Calculating class average and display it
		classavg = Math.round(classavg / count * 100) / 100;
		var passingrate = Math.round((a + b + c) / count * 100);

		//Calculating class letter grade
		var lettergrade;
		var letterarr = [a,b,c,d,f];
		var max = Math.max(a,b,c,d,f);
		if (max == a) lettergrade = "A";
		if (max == b) lettergrade = "B";
		if (max == c) lettergrade = "C";
		if (max == d) lettergrade = "D";
		if (max == f) lettergrade = "F";



		//Assign class label and change accent color
		var classLabel;
		var c1,c2,c3,c4,h1,h2,h3,h4;
		if (classavg > 3.30){
			classLabel = "Easy";
			jsondisplay.style.color = "#117864";
			c1 = "#117864";
			c2 = "#48C9B0";
			c3 = "#A3E4D7";
			c4 = "#D1F2EB";
			h1 = "#0E6655";
			h2 = "#1ABC9C";
			h3 = "#76D7C4";
			h4 = "#A3E4D7";
			reviewbtn.style.background = "#48C9B0";
			review.insertAdjacentHTML('beforeend', 'WAS THIS CLASS EASY? CLICK TO VOTE');
			changeHover(c1,c2);

		}
		else if (classavg > 2.60){
			classLabel = "Medium";
			jsondisplay.style.color = "#B7950B";
			c1 = "#9C640C";
			c2 ="#D4AC0D";
			c3 = "#F4D03F";
			c4 = "#FCF3CF";
			h1 = "#7E5109";
			h2 = "#B7950B";
			h3 = "##F1C40F";
			h4 = "##F9E79F";
			reviewbtn.style.background = "#D4AC0D";
			review.insertAdjacentHTML('beforeend', 'WAS THIS CLASS MEDIUM? CLICK TO VOTE');
			changeHover(c1,c2);
		}
		else if (classavg > 0){
			classLabel = "Hard";
			jsondisplay.style.color = "#922B21";
			c1 = "#7B241C";
			c2 = "#C0392B";
			c3 = "#EC7063";
			c4 = "#F5B7B1";
			h1 = "#78281F";
			h2 = "#B03A2E";
			h3 = "#C0392B";
			h4 = "#F1948A";
			reviewbtn.style.background = "#C0392B";
			review.insertAdjacentHTML('beforeend', 'WAS THIS CLASS HARD? CLICK TO VOTE');
			changeHover(c1,c2);
		}
		displayPieChart(a,b,c,d,f,c1,c2,c3,c4,h1,h2,h3,h4);

		//display Text
		var averageText = "<h4>" + "Average: " + "<b>" + classavg + "/4.00 </b><br>Most students receive <b>" + lettergrade + "</b><br>Passing rate: <b>" + passingrate +
		"%</b> <br> Sample Size: <b>" + count + " users</b></h4>";
		jsondisplay.insertAdjacentHTML('beforeend', classLabel);
		jsondisplay.insertAdjacentHTML('beforeend', averageText);

	 }

	 request.send();

 }


 //--------------------------- DISPLAYING PIE CHART -----------------------------


//Piechart thingy
function displayPieChart(a,b,c,d,f,c1,c2,c3,c4,h1,h2,h3,h4)
{
 Chart.defaults.global.defaultFontFamily = "Roboto Condensed";
 Chart.defaults.global.defaultFontSize = 14;
 var doughnut = $('#canvas1');
 var doughnutoptions = {
	 maintainAspectRatio: false,
	 responsive: false,
	 animateScale: true,
	 cutoutPercentage: 70
 }

 var doughnutdata={
	 labels: [
					 Math.round(a / count*100) + "% of users get A",
					 Math.round(b / count*100) + "% of users get B",
					 Math.round(c / count*100) + "% of users get C",
					 Math.round(d / count*100) + "% of users get D",
					 Math.round(f / count*100) + "% of users get F"
	 ],
	 datasets: [
			 {
				 data: [a,b,c,d,f],
				 backgroundColor: [
					 c1,
					 c2,
					 c3,
					 c4,
					 "#E5E8E8"
					 ],
					 hoverBackgroundColor: [
							 h1,
							 h2,
							 h3,
							 h4,
							 "#E5E7E9"
					 ]
			 }],
 };

 var mydoughtnut = new Chart(doughnut, {
	 type: "doughnut",
	 data: doughnutdata,
	 options: doughnutoptions
 });
}


//----- CALLING OUR FUNCTION ----------
searchBar();
pollBox();
courseDisplay();
calculateClassAvg();
