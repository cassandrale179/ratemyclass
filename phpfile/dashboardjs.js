function calculateChart(){

	//----- INITIALIZE THE SUM AND COUNT OF THE MAJORS --------
	var ASsum = 0; var AScount = 0;
	var CIsum =0; var CIcount = 0;
	var Hcount =0; var Hsum = 0;
	var Bsum =0; var Bcount = 0;
	var Esum = 0; var Ecount = 0;
	var Tsum =0; var Tcount = 0;
	var Asum =0; var Acount = 0;

	//------ MAKE AN AJAX REQUEST TO THE SERVER ----------
	var request = new XMLHttpRequest();
  request.open('GET', 'file2.php', true);
	request.onload = function(){
		var data = JSON.parse(request.responseText);
		for (var i = 0; i < data.length; i++){
			if (data[i].college == "AS"){			//Arts & Science
				ASsum = ASsum + parseFloat(data[i].sum);
				AScount = AScount + parseFloat(data[i].count);
			}
			if (data[i].college == "CI"){			//CCI
				CIsum = CIsum + parseFloat(data[i].sum);
				CIcount = CIcount + parseFloat(data[i].count);
			}
			if (data[i].college == "E"){			//Engineering
				Esum = Esum + parseFloat(data[i].sum);
				Ecount = Ecount + parseFloat(data[i].count);
			}
			if (data[i].college == "B"){			//Lebow
				Bsum = Bsum + parseFloat(data[i].sum);
				Bcount = Bcount + parseFloat(data[i].count);
			}
			if (data[i].college == "T"){			//Education
				Tsum = Tsum + parseFloat(data[i].sum);
				Tcount = Tcount + parseFloat(data[i].count);
			}
			if (data[i].college == "H"){			//Health
				Hsum = Hsum + parseFloat(data[i].sum);
				Hcount = Hcount + parseFloat(data[i].count);
			}
			if (data[i].college == "A"){			//Westphal
				Asum = Asum + parseFloat(data[i].sum);
				Acount = Acount + parseFloat(data[i].count);
			}
		}
		var CI = Math.round(CIsum / CIcount*100)/100;
		displayChart(ASsum / AScount, CI, Esum/Ecount, Bsum/Bcount, Tsum/Tcount, Hsum/Hcount, Asum/Acount);
	}
	request.send();
}

//--------------- FUNCTION TO DISPLAY THE CHART -------------------
function displayChart(as, ci, e, b, t, h, a){
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
    labels: ['Arts & Science', 'Computing & Info', 'Engineering', 'Lebow', 'Education', 'Health', 'Westphal'],
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
            data: [as, ci, e, b, t, h, a],
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
