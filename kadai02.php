<?php
$x =  $_GET['a'];
$y =  $_GET['b'];
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

<?php if (empty($_GET['a']) || empty($_GET['b'])) : ?>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./scss/kadai01.css" />
		<title>kadai02</title>
	</head>

	<body>
		<header>
			<div class="header-container">
				<h1>Calculator</h1>
			</div>
		</header>
		<main>
			<form action="./kadai02.php" method="get">
				<input type="number" name="a" required />
				<select name="operator">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
				</select>
				<input type="number" name="b" required />
				<input class="btn submit-btn" type="submit" value="答え" />
			</form>
		</main>
	<?php else : ?>

		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="./scss/kadai01.css" />
			<title>答えは<?= $z ?></title>
		</head>

		<section class="result">

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

			<main>
				<canvas id="particle"></canvas>
			</main>

			<footer></footer>

		</section>

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
	<?php endif; ?>
	</body>

</html>