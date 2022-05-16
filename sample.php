<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
</head>

<?php
/*
	https://www.jorudan.co.jp/norikae/cgi/nori.cgi?
	// fm_nori
	rf=top&
	eok1=R-&
	eok2=R-&
	pg=0&
	eki1=浜松&
	Cmap1=&
	eki2=名古屋&
	Dyy=2022&
	Dmm=5&
	Ddd=17&
	Dhh=5&
	Dmn1=1&
	Dmn2=8&
	Cway=0& // * 4
	Cfp=1&  // * 2
	Czu=2&
	S=検索&
  // Sop
	Csg=1

	18 + (4 - 1) + 2 + 1 = 24
 */

?>

<body>
	<form action="/norikae/cgi/nori.cgi" method="get" name="fm_nori" id="fm_nori" class="fmmd_Normal">
		<input type="hidden" name="rf" value="top" />
		<input type="hidden" name="eok1" value="" />
		<input type="hidden" name="eok2" value="" />
		<input type="hidden" name="pg" value="0" />
		<input type="text" id="eki1_in" name="eki1" value="" size="40" maxlength="200" tabindex="1" placeholder=" 駅、スポット、バス停、住所" autocomplete="off" />
		<input type="hidden" name="Cmap1" value="" />
		<input type="text" id="eki2_in" name="eki2" value="" size="40" maxlength="200" tabindex="1" placeholder=" 駅、スポット、バス停、住所" autocomplete="off" />
		<select id="Dyy_slc" name="Dyy" size="1" tabindex="2">
			<option value="2021">2021年</option>
			<option value="2022" selected="selected">2022年</option>
			<option value="2023">2023年</option>
		</select>

		<select id="Dmm_slc" name="Dmm" size="1" tabindex="2">
			<option value="1">1月</option>
		</select>

		<select id="Ddd_slc" name="Ddd" size="1" tabindex="2">
			<option value="16">16日</option>
			<option value="17" selected="selected">17日</option>
		</select>

		<span id="slc_times">&nbsp;
			<select id="Dhh_slc" name="Dhh" size="1" tabindex="2">
				<option value="4">4</option>
				<option value="5" selected="selected">5</option>
			</select>
			<label for="Dhh_slc">時</label><select id="Dmn1_slc" name="Dmn1" size="1" tabindex="2">
				<option value="0">0</option>
				<option value="1" selected="selected">1</option>
			</select><select id="Dmn2_slc" name="Dmn2" size="1" tabindex="2">
				<option value="8" selected="selected">8</option>
				<option value="9">9</option>
			</select>
			<label for="Dmn1_slc">分</label>
		</span>

		<span id="id_cway">
			<input type="radio" id="Cway1" name="Cway" value="0" tabindex="3" class="rd" checked="checked" /><label for="Cway1">出発</label>
			<input type="radio" id="Cway2" name="Cway" value="1" tabindex="3" class="rd" /><label for="Cway2">到着</label>
			<input type="radio" id="Cway3" name="Cway" value="2" tabindex="3" class="rd" /><label for="Cway3">始発</label>
			<input type="radio" id="Cway4" name="Cway" value="3" tabindex="3" class="rd" /><label for="Cway4">終電</label>
		</span>
		<input type="radio" id="Cfp1" name="Cfp" value="1" tabindex="3" class="rd" checked="checked" /><label for="Cfp1">ICカード利用</label>
		<input type="radio" id="Cfp2" name="Cfp" value="2" tabindex="3" class="rd" /><label for="Cfp2">切符利用</label>

		<input type="submit" name="S" value="検索" class="btn search" tabindex="10" />
		<input type="submit" name="Sop" value="経由駅・検索条件" class="btn dtl" onclick="noChck()" tabindex="10" />
		<span id="ck_sg">
			<input type="checkbox" name="Csg" id="Csg" value="1" tabindex="100" class="ckb" onclick="ekIn.onoff('off')" checked="" />
			<label for="Csg">入力予測機能</label>
		</span>
		<div class="footer"></div>
	</form>
</body>

</html>