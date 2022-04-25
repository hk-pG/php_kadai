<?php
$x = $_GET['a'];
$y = $_GET['b'];
$operator = $_GET['operator'];

switch ($operator) {
	case '+':
		$z = $x + $y;
		break;

	case '-':
		$z = $x - $y;
		break;

	case '*':
		$z = $x * $y;
		break;

	case '/':
		$z = $x / $y;
		break;

	default:
		$z = $x + $y;
		break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		答えは<?= $z ?>
	</title>
</head>

<body>
	<?= "$x$operator$y=$z<br />" ?>
</body>

</html>