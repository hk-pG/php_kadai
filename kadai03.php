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
	<link rel="stylesheet" href="./scss/kadai03.css">
</head>

<body>
	<header>
		<div class="header-box">
			<a href="./kadai03.php">
				<img src="./scss/icons/mail_logo_title.png" alt="" />
			</a>
		</div>
	</header>
	<main>
		<section class="mail-form">
			<form action="./kadai03.php" method="post">
				<p>宛先</p>
				<input type="email" name="to" id="" placeholder="宛先@gmail.com" />
				<br />
				<p>題名</p>
				<input type="text" name="subject" id="" placeholder="タイトル">
				<br />
				<p>本文</p>
				<textarea name="body" id="" cols="30" rows="10"></textarea>
				<br />
				<button type="submit">メールを送る</button>
			</form>
		</section>
	</main>
</body>

</html>