<?php
$body = "";

$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
$body = isset($_POST["body"]) ? $_POST["body"] : "";
$to = isset($_POST["to"]) ? $_POST["to"] : "";

$from = "ei2030@hamako-ths.ed.jp";

$result = false;
if (!empty($to)) {
	$result = mb_send_mail(
		$to,
		$subject,
		$body,
		"From: $from"
	);
}

echo "$to $subject $body";

if (!empty($to)) {
	if ($result) {
		echo "<script>alert('送信に成功しました');</script>";
		// リロードによる多重送信を防ぐ
		echo "<script>location.href='kadai03.php';</script>";
		// exit;
	} else {
		echo "<script>alert('送信に失敗しました');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>kadai03</title>
	<script src="./mdl/material.min.js"></script>
	<link rel="stylesheet" href="./mdl/material.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="./scss/kadai03.css">
</head>

<body>
	<header>
		<section class="header-container">
			<h1>MAIL SENDER</h1>
		</section>
	</header>

	<main>
		<section class="mail-form">
			<form action="./kadai03.php" method="post">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="email" id="sample3" name="to">
					<label class="mdl-textfield__label" for="sample3">宛先</label>
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" id="sample3" name="subject">
					<label class="mdl-textfield__label" for="sample3">題名</label>
				</div>

				<div class="mdl-textfield mdl-js-textfield">
					<textarea class="mdl-textfield__input" type="text" rows="3" id="sample5" name="body"></textarea>
					<label class="mdl-textfield__label" for="sample5">本文</label>
				</div>

				<!-- Raised button with ripple -->
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
					送信
				</button>

			</form>
		</section>
	</main>

	<ul class='circles'>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</body>

</html>