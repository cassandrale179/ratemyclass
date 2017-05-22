function calculateChart(){

	//----- INITIALIZE THE SUM AND COUNT OF THE MAJORS --------
	var ASsum = 0; var AScount = 0;
	var Hcount = 0; var Hsum = 0;
	var Bsum = 0; var Bcount = 0;
	var CIsum = 0; var CIcount = 0;
	var Esum = 0; var Ecount = 0;
	var Tsum = 0; var Tcount = 0;
	var SHsum = 0; var SHcount = 0;
	var Asum = 0; var Acount = 0;
	var ENTPsum = 0; var ENTPcount = 0;

	//------ MAKE AN AJAX REQUEST TO THE SERVER ----------
	var request = new XMLHttpRequest();
  request.open('GET', 'file2.php', true);
	request.onload = function(){
		var data = JSON.parse(request.responseText);
		for (var i = 0; i < data.length; i++){
			if (data[i].college == "CI"){
				CIsum = CIsum + parseFloat(data[i].sum);
				CIcount = CIcount + parseFloat(data[i].count);
			}
		}
		displayChart(ASsum / AScount, Hsum / Hcount, Bsum/Bcount, Tsum/Tcount, CIsum/CIcount, Esum/Ecount, SHsum/SHcount, Asum/Acount, ENTPsum/ENTPcount);
	}
	request.send();
}

//--------------- FUNCTION TO DISPLAY THE CHART -------------------
function displayChart(as, h, l, cci, edu, engr, hos, west, entp){
		Chart.defaults.global.defaultFontFamily = 'Roboto Condensed';
		Chart.defaults.global.defaultFontSize = 14;
		var ctx = $('#canvas');
		var options = {
    	maintainAspectRatio: false,
    	responsive: false,
    	scales: {
    		xAxes: [{
    			ticks:{
    				fontFamily: 'Roboto Condensed',
    			}
    		}],
    		yAxes: [{
    			ticks:{
    				fontFamily: 'Roboto Condensed',
    			}
    		}]
    	}
	};
		var data = {
    labels: ['Arts & Science', 'Health', 'Lebow', 'CCI', 'Education', 'Engineering',
    'Entrepreneur', 'Hospitality', 'Westphal'],
    datasets: [
        {
            label: 'AVERAGE FINAL GRADE ACROSS COLLEGES (DREXEL)',
            backgroundColor: 'rgba(75,192,192,0.4)',
            borderColor: 'rgba(75,192,192,1)',
            pointHoverBackgroundColor: 'rgba(75,192,192,1)',
            pointHoverBorderColor: 'rgba(220,220,220,1)',
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [as, h, l, cci, edu, engr, entp, hos, west, 0],
        }
    ]
};
		var myBarChart = new Chart(ctx, {
		    type: 'bar',
		    data: data,
		    options: options
		});
}

calculateChart();
