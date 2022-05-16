<?php
$x = $_GET['a'];
$y = $_GET['b'];
$operator = $_GET['operator'];
$is_calc_success = true;


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
		if ($y == 0) {
			$is_calc_success = false;
		} else {
			$z = $x / $y;
		}
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
	<link rel="stylesheet" href="style.css">
	<title>
		<?= $is_calc_success ? "答えは" . $z : "計算に失敗しました" ?>
	</title>
</head>

<body>
	<?= $is_calc_success ? "$x$operator$y=$z<br />" : "計算に失敗しました"  ?>
</body>

</html>