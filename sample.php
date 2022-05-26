<?php
// $x = $_GET['a'];
$x = isset($_GET['a']) ? $_GET['a'] : 0;
$y = isset($_GET['b']) ? $_GET['b'] : 0;
$operator = isset($_GET['operator']) ? $_GET['operator'] : '+';
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
		$operator = '×';
		break;

	case '/':
		if ($y == 0) {
			$is_calc_success = false;
		} else {
			$z = $x / $y;
		}
		$operator = '÷';
		break;

	default:
		$z = $x + $y;
		break;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./scss/kadai01.css" />
	<title>答えは<?= $z ?></title>
</head>
<header>
	<div class="header-container">
		<h1>Calculator</h1>
		<a href="./kadai02.php">
			<button class="btn header-btn">
				もう一度計算する
			</button>
		</a>
	</div>
</header>

<canvas id="particle"></canvas>

<script src="./particle/jquery-3.6.0.min.js"></script>
<script src="./particle/particleText.min.js"></script>
<script type="text/javascript">
	$(function() {

		//オプション付き
		$('#particle').particleText({
			text: '<?= $is_calc_success ? "$x$operator$y=$z" : "計算に失敗しました"  ?>', // 文字

			number: 800,

			colors: ['#A23E48', '#3F4A3C', '#FF276E'], // パーティクルの色を複数指定可能

			speed: 'high', // slow, middle, high の3つから選んでください。


		});
	});
</script>
</body>

</html>