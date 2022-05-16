<?php
$subject = "テスト";
$body = "これはテストです。";
$result = mb_send_mail(
	"ei2030@hamako-ths.ed.jp",
	$subject,
	$body,
	"From: ei2030@hamako-ths.ed.jp"
);

if ($result) {
	echo "メール送信完了";
} else {
	echo "メール送信エラー";
}
