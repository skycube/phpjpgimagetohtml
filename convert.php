<html>
<head>
<title>PHPJpgImageToHTML</title>
<style type="text/css" media="screen">
.tableImage { padding: 0; margin: 0; border: 0; }
.tableImage TD { width: 1px; height: 1px; padding: 0; margin: 0; }
</style>
</head>
<body>
<?php
error_reporting(0); 
$image='sample.jpg';
$im = imagecreatefromjpeg($image);
$info=getimagesize($image);
$width=$info[0];
$height=$info[1];
for ($i=0; $i<$height; $i++){
	$html .= "<tr>";
	for ($j=0; $j<$width; $j++){
		$color_index = imagecolorat($im, $j, $i);
		$color_tran = imagecolorsforindex($im, $color_index);
		$html .= "<td style=\"background-color: rgb($color_tran[red],$color_tran[green],$color_tran[blue]);\"></td>\n";
	}
	$html .= "</tr>\n";
}
?>

Original:<br>
<img src='sample.jpg'>
<br><br>

Coded in HTML:<br>
<table class="tableImage" cellpadding="0" cellspacing="0">
<?=$html ?>
</table>
<br><br>
</body>
</html>
