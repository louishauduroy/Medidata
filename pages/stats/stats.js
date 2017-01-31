$(function() {


	var contenu_ajd="";
	var contenu_hier="";

	var requestMorts = new XMLHttpRequest();
	requestMorts.open("Get","php/request-jour.php");
	requestMorts.send(null);

	requestMorts.onreadystatechange = function()
		   {
			   if (requestMorts.readyState == 4)
			  {
				  if (requestMorts.status == 200)
				  {

					  var response = requestMorts.responseText;
					  var  dbArray = JSON.parse(response);
					  var nbMortsAjd=dbArray[0];

					  contenu_ajd="<p>"+nbMortsAjd+"</p>";

					  $('#morts_ajd_nb').html(contenu_ajd);

					  var nbMortsHier=dbArray[1];

					  contenu_hier="<p>"+nbMortsHier+"</p>";

					  $('#morts_hier_nb').html(contenu_hier);


				  }
			  }
		   }


	//graphe tranches d'âge

	var requestAge = new XMLHttpRequest();
	requestAge.open("Get","php/request-age.php?jour=0");
	requestAge.send(null);

	requestAge.onreadystatechange = function()
		   {
			   if (requestAge.readyState == 4)
			  {
				  if (requestAge.status == 200)
				  {

					  var response = requestAge.responseText;
					  dbArrayAjd = JSON.parse(response);

						var requestAge2 = new XMLHttpRequest();
						requestAge2.open("Get","php/request-age.php?jour=1");
						requestAge2.send(null);

						requestAge2.onreadystatechange = function()
							   {
								   if (requestAge2.readyState == 4)
								  {
									  if (requestAge2.status == 200)
									  {

										  var response2 = requestAge2.responseText;
										  dbArrayHier = JSON.parse(response2);


										  var chart = Morris.Bar({
											  element: 'bar1',
											  data: [
												{ y: '0-14', a: dbArrayAjd[0], b: dbArrayHier[0]},
												{ y: '15-29', a: dbArrayAjd[1],  b: dbArrayHier[1] },
												{ y: '30-44',a: dbArrayAjd[2],  b: dbArrayHier[2] },
												{ y: '45-59',a: dbArrayAjd[3],  b: dbArrayHier[3] },
												{ y: '60-74', a: dbArrayAjd[4],b: dbArrayHier[4]},
												{ y: '75 et +', a: dbArrayAjd[5],b:  dbArrayHier[5]}
											  ],
											  xkey: 'y',
											  ykeys: ['a', 'b'],
											  labels: ['Aujourd\'hui', 'Hier']
											});

											var legende='<table><tr>';

											chart.options.labels.forEach(function(label, i){
											var couleur = (chart.options.barColors[i]);
											var label= chart.options.labels[i];
											//$('.carre').css('background-color', 'black');
											legende += '<td style="margin: 3px; border: 6px solid #ffffff;"><div class="carre" style="background-color:'+couleur+'"></div></td><td style="margin: 5px; border: 6px solid #ffffff;"><p>'+label+'</p></td>'


											})





									  }
								  }
							   }


				  }
			  }
		   }





	var requestSemaine = new XMLHttpRequest();
		requestSemaine.open("Get","php/request-jour.php?avecdate=0");
		requestSemaine.send(null);

		requestSemaine.onreadystatechange = function()
			   {
				   if (requestSemaine.readyState == 4)
				  {
					  if (requestSemaine.status == 200)
					  {

					  var response = requestSemaine.responseText;
					  var dbArray = JSON.parse(response);

					  var total=0;
					  for(i=0;i<7;i++){
						  total+=dbArray[i][1];
						  console.log(total);
					  }

					  contenu_total="<p>"+total+"</p>";

					  $('#total').html(contenu_total);

					  new Morris.Line({
						  // ID of the element in which to draw the chart.
						  element: 'semaine',
						  // Chart data records -- each entry in this array corresponds to a point on
						  // the chart.
						  data: [
							{ day: dbArray[6][0], value: dbArray[6][1] },
							{ day: dbArray[5][0], value: dbArray[5][1] },
							{ day: dbArray[4][0], value: dbArray[4][1] },
							{ day: dbArray[3][0], value: dbArray[3][1] },
							{ day: dbArray[2][0], value: dbArray[2][1] },
							{ day: dbArray[1][0], value: dbArray[1][1] },
							{ day: dbArray[0][0], value: dbArray[0][1] }
						  ],
						  // The name of the data record attribute that contains x-values.
						  xkey: 'day',
						  // A list of names of data record attributes that contain y-values.
						  ykeys: ['value'],
						  // Labels for the ykeys -- will be displayed when you hover over the
						  // chart.
						  hideHover: 'auto',
						  labels: ['Nombre de décès'],
						  xLabelAngle: 75
						});
				  }
			  }
		   }


});
