<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>Ticketing System</title>

	<link rel="stylesheet" type="text/css" href="assets/materialize/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="assets/materialize/css/materializeV.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/ticket.css">
	<link rel="stylesheet" type="text/css" href="assets/css/pieGraph.css">
	<script src="assets/tinymce/tinymce.min.js"></script>
	<script src="assets/canvas/canvasjs.min.js"></script>

	 <script>
      tinymce.init({
          selector: "textarea"
     });



	 window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "Gaming Consoles Sold in 2012"
		},
		legend: {
			maxWidth: 350,
			itemWidth: 120
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			legendText: "{indexLabel}",
			dataPoints: [
				{ y: 4181563, indexLabel: "PlayStation 3" },
				{ y: 2175498, indexLabel: "Wii" },
				{ y: 3125844, indexLabel: "Xbox 360" },
				{ y: 1176121, indexLabel: "Nintendo DS"},
				{ y: 1727161, indexLabel: "PSP" },
				{ y: 4303364, indexLabel: "Nintendo 3DS"},
				{ y: 1717786, indexLabel: "PS Vita"}
			]
		}
		]
	});
	chart.render();
}
 </script>

</head>
<body style="padding-top: 0px; font-family: helvetica">
   <div class="row">
   	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/materialize/js/materialize.min.js"></script>
