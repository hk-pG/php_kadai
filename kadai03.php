<?php
$body = "";

$subject = $_POST['subject'];
$body = $_POST['body'];
$to = $_POST['to'];

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
		<form action="./kadai03.php" method="post">
			<input type="hidden" name="been" value="1" />
			<input type="email" name="to" id="" placeholder="宛先@gmail.com" />
			<br />
			<input type="text" name="subject" id="" placeholder="タイトル">
			<br />
			<textarea name="body" id="" cols="30" rows="10"></textarea>
			<button type="submit">メールを送る</button>
		</form>
	</main>
</body>

</html>