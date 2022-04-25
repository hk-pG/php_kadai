<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>test02</title>
</head>

<body>
	<?php if (empty($_GET['a']) || empty($_GET['b'])) : ?>
		<form action="./test02.php" method="get">
			<input type="text" name="a" />
			<select name="operator">
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="*">*</option>
				<option value="/">/</option>
			</select>
			<input type="text" name="b" />
			<input type="submit" value="答え" />
		</form>
	<?php else : ?>
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
		echo "$x+$y=$z<br />";
		?>
	<?php endif; ?>
</body>

</html>