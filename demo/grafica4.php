<?php
	
	include "../libchart/classes/libchart.php";

	$chart = new HorizontalBarChart(600, 170);

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("/wiki/Instant_messenger", 50));
	$dataSet->addPoint(new Point("/wiki/Web_Browser", 75));
	$dataSet->addPoint(new Point("/wiki/World_Wide_Web", 122));
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));

	$chart->setTitle("Most visited pages for www.example.com");
	$chart->render("generated/demo2.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart horizontal bars demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
     Grafica muestra
	<img alt="Horizontal bars chart"  src="generated/demo2.png" style="border: 1px solid gray;"/>
</body>
</html>
