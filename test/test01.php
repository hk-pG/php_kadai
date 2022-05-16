<?php
$x = $_GET['a'];
$y = $_GET['b'];

$z = $x + $y;

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
	<title>
		答えは<?= $z ?>
	</title>
</head>

<body>
	<?= "$x+$y=$z<br />" ?>
</body>

</html>
