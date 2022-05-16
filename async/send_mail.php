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
