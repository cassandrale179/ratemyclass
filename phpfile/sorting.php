<?php
	session_start();
	if ( $_SESSION['logged_in'] != 1 ) {
	  header('location: login.php');
	}
	else {
	    $username= $_SESSION['username'];
		};

	?>

<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
	<title>Sort Class</title>

	<!-- Latest compiled and minified CSS -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 	<!-- Optional theme -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 	<!-- Latest compiled and minified jQuery -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
	 integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  	crossorigin="anonymous"></script>

 	<!-- Latest compiled and minified JavaScript -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Link the HTML to Font Awesome Icon (Bootstrap CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--Link to chart.JS CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>

	<!-- Link the HTML with CSS -->
	<link rel="stylesheet" href="../css/sortingstyle.css" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
</head>

<body>
	<!-- NAVIGATION BAR -->
	<div id="A">
		<div id="A1">
			<a href="dashboard.php"><button id="Abtn"> DASHBOARD </button></a>
		</div>
		<div id="A2">
			<a href="searchpage.php"><button id="Abtn"> SEARCH CLASS</button></a>
		</div>
		<div id="A3">
			<a href="sorting.php"><button id="Abtn"> SORT </button></a>
		</div>
		<div id="A4">
			<a href="inputgrade.php"><button id="Abtn"> INPUT GRADE </button></a>
		</div>
		<div id="A5">
			<a href="setting.php"><button id="Abtn"> SETTINGS </button></a>
		</div>
		<div id="A6">
			<a href='logout.php'><button id="Abtn" name="logout"> LOGOUT </button></a>
		</div>
	</div>
	<!-- OPTION ONE: SORTING FROM EASIEST TO MOST DIFFICULT -->
	<div id="C">
		<div id="C1">
			<button id="C2button"> CHOOSE A MAJOR </button>
			<input type="text" id="searchbar" placeholder="Type A Major Here..." list="classes"/>
				<datalist id="classes">
<option value = "Advertising Design (ADGD)">
<option value = "Animation (ANIM)">
<option value = "Architecture (ARCH)">
<option value = "Art History (ARTH)">
<option value = "Dance (DANC)">
<option value = "Design & Merchandising (DSMR)">
<option value = "Digital Media (DIGM)">
<option value = "Entertainment & Arts Management (EAM)">
<option value = "Environmental Graphic Design (EVGD)">
<option value = "Fashion Design (FASH)">
<option value = "Film & Video (FMVD)">
<option value = "Film Studies (FMST)">
<option value = "Game Art and Production (GMAP)">
<option value = "General Design Arts (CDA)">
<option value = "Graphic Design (VSCM)">
<option value = "Interactive Digital Media (IDM)">
<option value = "Interior Design (INTR)">
<option value = "Music (MUSC)">
<option value = "Music Industry Program (MIP)">
<option value = "Performing Arts (PRFA)">
<option value = "Photography (PHTO)">
<option value = "Printing Technology Management (PTM)">
<option value = "Product Design (PROD)">
<option value = "Retail Leadership (RETL)">
<option value = "Screenwriting & Playwriting (SCRP)">
<option value = "Study Abroad-Performing Arts (SAPA)">
<option value = "TV Industry & Enterprise (TVIE)">
<option value = "TV Information & Technology (TVIT)">
<option value = "TV Production (TVPR)">
<option value = "TV Studies (TVST)">
<option value = "Theatre (THTR)">
<option value = "Visual Studies (VSST)">
<option value = "Web & Motion Graphic Design (WMGD)">
<option value = "Web Development (WBDV)">
<option value = "Westphal Studies (WEST)">
<option value = "Accounting (ACCT)">
<option value = "Business Statistics (STAT)">
<option value = "Economics (ECON)">
<option value = "Finance (FIN)">
<option value = "General Business (BUSN)">
<option value = "Human Resource Management (HRMT)">
<option value = "International Business (INTB)">
<option value = "Legal Studies (BLAW)">
<option value = "Management (MGMT)">
<option value = "Management Information Systems (MIS)">
<option value = "Marketing (MKTG)">
<option value = "Operations Management (OPM)">
<option value = "Operations Research (OPR)">
<option value = "Organizational Behavior (ORGB)">
<option value = "Taxation (TAX)">
<option value = "Center for Civic Engagement (CV)">
<option value = "Civic Engagement (CIVC)">
<option value = "Architectural Engineering (AE)">
<option value = "Biomedical Engineering Tech (BET)">
<option value = "Chemical Engineering (CHE)">
<option value = "Chemical Engineering Chemistry (CHEC)">
<option value = "Civil & Architectural Engineering (CAE)">
<option value = "Civil Engineering (CIVE)">
<option value = "Civil, Architectural & Environmental Engr (CAEE)">
<option value = "Construction Management (CMGT)">
<option value = "Elec & Comp Engr-Computers (ECEC)">
<option value = "Elec & Computer Engr-Electroph (ECEE)">
<option value = "Elec & Computer Engr-Power Eng (ECEP)">
<option value = "Elec & Computer Engr-Systems (ECES)">
<option value = "Electrical & Computer Engr (ECE)">
<option value = "Electrical Engineering Lab (ECEL)">
<option value = "Electrical Engr Technology (EET)">
<option value = "Engineering Management (EGMT)">
<option value = "Engineering, General (ENGR)">
<option value = "Environmental Engineering (ENVE)">
<option value = "Industrial Engineering (INDE)">
<option value = "Manufacturing Engr Technology (MET)">
<option value = "Materials Engineering (MATE)">
<option value = "Mechanical Engr & Mechanics (MEM)">
<option value = "Mechanical Engr Technology (MHT)">
<option value = "Project Management (PROJ)">
<option value = "Property Management (PRMT)">
<option value = "Real Estate (REAL)">
<option value = "Systems Engineering (SYSE)">
<option value = "Public Health (PBHL)">
<option value = "Center for Hospitality and Sport Management (SH)">
<option value = "Culinary Arts (CULA)">
<option value = "Food Science (FDSC)">
<option value = "Hotel & Restaurant Management (HRM)">
<option value = "Sport Coaching Leadership (SCL)">
<option value = "Sport Management (SMT)">
<option value = "Africana Studies (AFAS)">
<option value = "Anthropology (ANTH)">
<option value = "Arabic (ARBC)">
<option value = "Arts & Sciences-Interdisp Stud (AS-I)">
<option value = "Bioscience & Biotechnology (BIO)">
<option value = "Chemical Engineering Chemistry (CHEC)">
<option value = "Chemistry (CHEM)">
<option value = "Chinese (CHIN)">
<option value = "Communication (COM)">
<option value = "Criminal Justice (CJ)">
<option value = "Criminology and Justice Studies (CJS)">
<option value = "English (ENGL)">
<option value = "English as a Second Language (ESL)">
<option value = "Environmental Science (ENVS)">
<option value = "Environmental Studies & Sustainability (ENSS)">
<option value = "French (FREN)">
<option value = "Geoscience (GEO)">
<option value = "German (GER)">
<option value = "Global Studies (GST)">
<option value = "Greek (GREC)">
<option value = "Hebrew (HBRW)">
<option value = "History (HIST)">
<option value = "Humanities, General (HUM)">
<option value = "International Studies (IST)">
<option value = "International Studies Abroad (AS-A)">
<option value = "Italian (ITAL)">
<option value = "Japanese (JAPN)">
<option value = "Judaic Studies (JUDA)">
<option value = "Korean (KOR)">
<option value = "Language (LANG)">
<option value = "Linguistics (LING)">
<option value = "Mathematics (MATH)">
<option value = "Philosophy (PHIL)">
<option value = "Physics (PHYS)">
<option value = "Physics-Environmental Science (PHEV)">
<option value = "Political Science (PSCI)">
<option value = "Portuguese (PORT)">
<option value = "Psychology (PSY)">
<option value = "Russian (RUSS)">
<option value = "Sociology (SOC)">
<option value = "Spanish (SPAN)">
<option value = "Women Studies (WMST)">
<option value = "Women and Gender Studies (WGST)">
<option value = "Writing (WRIT)">
<option value = "Close School of Entrepreneurship (C)">
<option value = "Entrepreneurship and Innovation (ENTP)">
<option value = "Computer Science (CS)">
<option value = "Computing Technology (CT)">
<option value = "Computing and Informatics (CI)">
<option value = "Emergency Management (EMER)">
<option value = "Homeland Security Management (HSM)">
<option value = "Information Science & Systems (INFO)">
<option value = "Software Engineering (SE)">
<option value = "Goodwin College of Professional Studies (GC)">
<option value = "Communications & Applied Tech (CAT)">
<option value = "Customer Operations (CUST)">
<option value = "General Studies (GSTD)">
<option value = "Professional Studies (PRST)">
<option value = "College of Nursing & Health Professions (NH)">
<option value = "Anatomy (ANAT)">
<option value = "Behavioral & Addictions Couns (BACS)">
<option value = "Cardiovascular Perfusion (CVPT)">
<option value = "Complementary & Integrative Therapy (CIT)">
<option value = "Health Sciences (HSCI)">
<option value = "Health Services Administration (HSAD)">
<option value = "Health and Society (HLSO)">
<option value = "Invasive Cardiovascular Tech (ICVT)">
<option value = "Medical Billing and Coding (MBC)">
<option value = "Neuroscience (NEUR)">
<option value = "Nursing (NURS)">
<option value = "Nutrition & Food Science (NFS)">
<option value = "Physiology (PHGY)">
<option value = "Statistics (STS)">
<option value = "Pennoni Honors College (PE)">
<option value = "Custom-Designed Minor (CSDN)">
<option value = "Honors Program (HNRS)">
<option value = "Leadership (LEAD)">
<option value = "Biomedical Engineering & Sci (BMES)">
<option value = "School of Education (T)">
<option value = "Creativity Studies (CRTV)">
<option value = "Education Human Resource Devel (EHRD)">
<option value = "Education Learning Techniques (EDLT)">
<option value = "Geography Education (EDGE)">
<option value = "Mathematics Education (MTED)">
<option value = "STEM Teacher Education (ESTM)">
<option value = "Special Education (EDEX)">
<option value = "Teacher Education (EDUC)">
				</datalist>
		</div>
		<div id="C2">
			<button id="C2button"> CHOOSE LEVEL OF DIFFICULTY</button>
			<select id="mySelect">
				<option> Choose Sorting Order </option>
				<option value="Easy"> Easiest to Hardest</option>
				<option value="Difficult">Hardest to Easiest</option>
			</select>
		</div>

	</div>


		<div id="D">
			<button id="btnSave"> SUBMIT </button>
			<p><i>(If there is error, please refresh page and choose again)</i></p>
		</div>


<script type="text/javascript" src="sortpage2.js"></script>
</body>
