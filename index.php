<!DOCTYPE html>
<html>
<head>
	<title>Weather</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="google-site-verification" content="uza6Gh8xbuNXozz7q8MICSSLrgnoLzioHvqTE2tclI4" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
		<link rel="stylesheet" type="text/css" href="sass/style.css?v=<?php echo time(); ?>">
		<script type="text/javascript" href="css/style.js"></script>
</head>
<body>
<div class="main_div">
	<select id="city" name="city" onchange="tempdata()">
		<option>Pune</option>
		<option>Keshod</option>
		<option>Junagadh</option>
		<option>Mumbai</option>
		<option>Delhi</option>
		<option>Bangalore</option>
		<option>Hyderabad</option>
		<option>Ahmedabad</option>
		<option>Chennai</option>
		<option>Kolkata</option>
		<option>Surat</option>
		<option>Jaipur</option>
		<option>Lucknow</option>
		<option>Kanpur</option>
		<option>Nagpur</option>
		<option>Indore</option>
		<option>Thane</option>
		<option>Bhopal</option>
		<option>Visakhapatnam</option>
		<option>Pimpri & Chinchwad</option>
		<option>Patna</option>
		<option>Vadodara</option>

		<option>Ghaziabad</option>
		<option>Ludhiana</option>
		<option>Agra</option>
		<option>Nashik</option>
		<option>Faridabad</option>
		<option>Meerut</option>
		<option>Rajkot</option>
		<option>Kalyan</option>
		<option>Varanasi</option>
		<option>Srinagar</option>
		<option>Aurangabad</option>
		<option>Dhanbad</option>
		<option>Amritsar</option>
		<option>Allahabad</option>
		<option>Ranchi</option>
		<option>Coimbatore</option>
		<option>Jabalpur</option>
		<option>Gwalior</option>
		<option>Vijayawada</option>
		<option>Jodhpur</option>
		<option>Raipur</option>
		<option>Kota</option>
		<option>Chandigarh</option>
		<option>Bhavnagar</option>
	</select>
	<!-- <input type="text" id="city" name="city" class="form-control" />
	<button onclick="tempdata()">search</button> -->
	<div class="weather_div">
		<div class="c1"></div>
		<div class="c2"></div>
		<div class="c3"></div>
		<div id="weather_icon"><i class="fas fa-sun"></i></div>
		<div id="place" class="place d-flex align-items-center"><i class="fas fa-street-view"></i><h2 id="place1">Keshod</h2><h2>,Ind</h2></div>
		<p id="dat">mon | 08/23 | 12:20AM</p>
		<h3 id="tem">24&deg;C</h3>
		<p id="min_max">Min 23 | Max 30</p>
	</div>
</div>
<script type="text/javascript">
	const date = document.getElementById("dat");
	var wai = document.getElementById("weather_icon");
	const cd = () =>{
		var arr = new Array();
		arr[0] = "Sun";
		arr[1] = "Mon";
		arr[2] = "Tue";
		arr[3] = "Wed";
		arr[4] = "thu";
		arr[5] = "fri";
		arr[6] = "Sat";
		let ct = new Date();
		//console.log(arr[ct.getDay()]);
		var day = arr[ct.getDay()];

		var arr1 = new Array();
		arr[0] = "Jan";
		arr[1] = "Feb";
		arr[2] = "Mar";
		arr[3] = "Apr";
		arr[4] = "May";
		arr[5] = "Jun";
		arr[6] = "jul";
		arr[7] = "Aug";
		arr[8] = "Sep";
		arr[9] = "Oct";
		arr[10] = "Nov";
		arr[11] = "Dec";

		//let ct = new Date();
		//console.log(arr[ct.getDay()]);
		let month = arr[ct.getMonth()];

		let dat = ct.getDate();
		

		let hour = ct.getHours();
		let min = ct.getMinutes() ;
		let p = "AM";
		if (hour > 11) {
			p = "PM";
			if (hour > 12) hour -= 12;
		}
		if (min < 10 ) {
			min = "0" + min;	
		}
		console.log(min);
		return `${day} | ${month}/${dat} | ${hour}:${min}${p}`  ;
	};
	document.getElementById("dat").innerHTML =  cd();

	const tempdata = () =>{
	const city = document.getElementById("city").value;
	const f = "http://api.openweathermap.org/data/2.5/weather?q=";
	const l = "&appid=d9306eb6dd930650aede48577f488c27"
	key = f + city + l ;
	/*console.log(city);*/
	//api.openweathermap.org/data/2.5/weather?q=Keshod&appid=d9306eb6dd930650aede48577f488c27
	
		fetch(key).then((apidata)=>{
				return apidata.json();
			}).then((jsondata) =>{
				let temp = jsondata.main.temp;
				let temp_min = jsondata.main.temp_min;
				let temp_max = jsondata.main.temp_max;
				wi = jsondata.weather[0].main;
				console.log(wi);
				document.getElementById("tem").innerHTML = Math.round(temp - 273.15)+"&deg;C";
				document.getElementById("min_max").innerHTML = "Min  "+ Math.round(temp_min - 273.15) + "&deg;| Max  " + Math.round(temp_max - 273.15) +"&deg;"; 
				document.getElementById("place1").innerHTML = city;
				/*console.log(jsondata.main.temp_min);
				console.log(jsondata.main.temp_max);*/
				if (wi == "Clouds") {
					wai.innerHTML = "<i class='fas fa-cloud' style='color:#fff;' id='weather_icon'></i>";
				}
				if (wi == "Sunny") {
						wai.innerHTML = "<i class='fas fa-sun' id='weather_icon'></i>";
				}
				if (wi == "Overcast") {
					wai.innerHTML = "<i class='fas fa-cloud' style='color:#000;' id='weather_icon'></i>";
				}
				if (wi == "Thunderstorm") {
					wai.innerHTML = "<i class='fas fa-poo-storm' style='color:#000;' id='weather_icon'></i>";	
				}
				if (wi == "Drizzle") {
					wai.innerHTML = "<i class='fas fa-cloud-sun-rain' style='color:#000;' id='weather_icon'></i>";
				}
				if (wi == "Rain") {
					wai.innerHTML = "<i class='fas fa-cloud-showers-heavy' style='color:hsl(0, 0%, 60%);' id='weather_icon'></i>";	
				}
				if (wi == "Haze") {
					wai.innerHTML = "<i class='fas fa-smog' style='color:hsl(0, 0%, 70%);' id='weather_icon'></i>";	
				}
				

			});	
	}

	tempdata();
	

</script>
</body>
</html>