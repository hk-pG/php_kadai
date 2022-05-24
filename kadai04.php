<?php
// set timezone 'Asia/Tokyo'
date_default_timezone_set('Asia/Tokyo');
$year = date('Y');
$month = date('m');
$day = date('d');
$hour = date('H');
$minute = date('i');

$display_years = [$year - 1, $year, $year + 1];

$stations = [
	"浜松",
	"名古屋",
	"小沢渡",
];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jorudan Local</title>
	<link rel="stylesheet" href="./scss/kadai04.css">
</head>

<body>
	<form action="https://www.jorudan.co.jp/norikae/cgi/nori.cgi" id="form">
		<input type="hidden" name="rf" value="top" />
		<input type="hidden" name="eok1" value="" />
		<input type="hidden" name="eok2" value="" />
		<input type="hidden" name="pg" value="0" />



		<section class="user-input">


			<div class="station-from">
				<!-- <input type="text" id="eki1_in" name="eki1" value="" size="40" maxlength="200" tabindex="1" placeholder=" 駅、スポット、バス停、住所" autocomplete="off" /> -->
				<select name="eki1" id="station-from">
					<!-- <option value="浜松">浜松</option> -->
					<?php
					foreach ($stations as $station) {
						echo "<option value='{$station}'>{$station}</option>";
					}
					?>
				</select>
			</div>

			<input type="hidden" name="Cmap1" value="" />


			<div class="station-to">
				<!-- <input type="text" id="eki2_in" name="eki2" value="" size="40" maxlength="200" tabindex="1" placeholder=" 駅、スポット、バス停、住所" autocomplete="off" /> -->
				<select name="eki2" id="station-to">
					<?php
					foreach ($stations as $station) {
						echo "<option value='{$station}'>{$station}</option>";
					}
					?>
				</select>
			</div>


			<section class="time-input-container">
				<div class="datetime">
					<input type="datetime-local" name="" id="datetime" value="<?= date('Y-m-d\TH:i') ?>">
				</div>

				<div class="datetime-separated">
					<div class="year">
						<select id="Dyy_slc" name="Dyy" size="1" tabindex="2">
							<?php
							foreach ($display_years as $index => $year) {
								if ($year == date('Y')) {
									echo "<option value=\"$year\" selected=\"selected\">{$year}年</option>";
								} else {
									echo "<option value=\"$year\" >{$year}年</option>";
								}
							}
							?>
						</select>
					</div>



					<div class="month">
						<select id="Dmm_slc" name="Dmm" size="1" tabindex="2">
							<!-- <option value="1">1月</option> -->
							<?php
							for ($i = 1; $i <= 12; $i++) {
								if ($i == $month) {
									echo "<option value=\"$i\" selected=\"selected\">{$i}月</option>";
								} else {
									echo "<option value=\"$i\" >{$i}月</option>";
								}
							}
							?>
						</select>
					</div>


					<div class="day">
						<select id="Ddd_slc" name="Ddd" size="1" tabindex="2">
							<!-- <option value="16">16日</option> -->
							<!-- <option value="17" selected="selected">17日</option> -->
							<?php
							for ($i = 1; $i <= 31; $i++) {
								if ($i == $day) {
									echo "<option value=\"$i\" selected=\"selected\">{$i}日</option>";
								} else {
									echo "<option value=\"$i\" >{$i}日</option>";
								}
							}
							?>
						</select>
					</div>

					<!-- <span id="slc_times">&nbsp; -->

					<div class="time">

						<select id="Dhh_slc" name="Dhh" size="1" tabindex="2">
							<!-- <option value="4">4</option> -->
							<!-- <option value="5" selected="selected">5</option> -->
							<?php
							for ($i = 0; $i <= 23; $i++) {
								if ($i == $hour) {
									echo "<option value=\"$i\" selected=\"selected\">{$i}</option>";
								} else {
									echo "<option value=\"$i\" >{$i}</option>";
								}
							}
							?>
						</select>
						<label for="Dhh_slc">時</label>

						<select id="Dmn1_slc" name="Dmn1" size="1" tabindex="2">
							<?php
							$minuit_head = $minute;
							// 分が2桁なら、上位1桁のみを取得
							if (strlen($minuit_head) >= 2) {
								$minuit_head = substr($minuit_head, 0, 1);
							}
							for ($i = 0; $i <= 5; $i++) {
								if ($i == $minuit_head) {
									echo "<option value=\"$i\" selected=\"selected\">{$i}</option>";
								} else {
									echo "<option value=\"$i\" >{$i}</option>";
								}
							}
							?>
						</select>

						<select id="Dmn2_slc" name="Dmn2" size="1" tabindex="2">
							<?php
							$minuit_head = $minute;
							// 分が2桁なら、下位1桁のみを取得
							if (strlen($minuit_head) >= 2) {
								$minuit_head = substr($minuit_head, 1, 1);
							}
							for ($i = 0; $i <= 9; $i++) {
								if ($i == $minuit_head) {
									echo "<option value=\"$i\" selected=\"selected\">{$i}</option>";
								} else {
									echo "<option value=\"$i\" >{$i}</option>";
								}
							}
							?>
						</select>
						<label for="Dmn1_slc">分</label>
					</div>
				</div>
			</section>

			<!-- </span> -->

			<div class="options">
				<div class="ways">
					<span id="id_cway">
						<input type="radio" id="Cway1" name="Cway" value="0" tabindex="3" class="rd" checked="checked" /><label for="Cway1">出発</label>
						<input type="radio" id="Cway2" name="Cway" value="1" tabindex="3" class="rd" /><label for="Cway2">到着</label>
						<input type="radio" id="Cway3" name="Cway" value="2" tabindex="3" class="rd" /><label for="Cway3">始発</label>
						<input type="radio" id="Cway4" name="Cway" value="3" tabindex="3" class="rd" /><label for="Cway4">終電</label>
					</span>
				</div>
				<div class="use-card">
					<input type="radio" id="Cfp1" name="Cfp" value="1" tabindex="3" class="rd" checked="checked" /><label for="Cfp1">ICカード利用</label>
					<input type="radio" id="Cfp2" name="Cfp" value="2" tabindex="3" class="rd" /><label for="Cfp2">切符利用</label>
				</div>
			</div>

			<input type="submit" name="S" value="検索" class="btn search" id="submit" tabindex="10" />
			<br />

		</section>
	</form>

	<script src="./js/kadai04.js"></script>
</body>

</html>