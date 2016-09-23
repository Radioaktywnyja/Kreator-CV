<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>CV Kreator</title>
	<meta name="Description" content="Prosty i darmowy kreator CV.">
	<meta name="Keywords" content="CV, Kreator, Wzór">
	<link rel="stylesheet" type="text/css" href="pliki/style.css">
</head>
<body>

<?php
	
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//dane osobiste
$nazwisko = test_input($_POST['nazwisko']);
$zawod = test_input($_POST['zawod']);
$sciezka = test_input($_POST['sciezka']);

//doswiadczenie
$ileprac = count($_POST['praca_od']);
for($nrpracy=0; $nrpracy < $ileprac; $nrpracy++) {
	$praca_od[$nrpracy] = test_input($_POST['praca_od'][$nrpracy]);
	$praca_do[$nrpracy] = test_input($_POST['praca_do'][$nrpracy]);
	$pracodawca[$nrpracy] = test_input($_POST['pracodawca'][$nrpracy]);
	$stanowisko[$nrpracy] = test_input($_POST['stanowisko'][$nrpracy]);
	$obowiazki[$nrpracy] = test_input($_POST['obowiazki'][$nrpracy]);
	$osiagniecia[$nrpracy] = test_input($_POST['osiagniecia'][$nrpracy]);
}

//projekty
$ileproj = count($_POST['proj_adres']);
for($nrproj = 0; $nrproj < $ileproj; $nrproj++) {
	$proj_adres[$nrproj] = test_input($_POST['proj_adres'][$nrproj]);
	$proj_opis[$nrproj] = test_input($_POST['proj_opis'][$nrproj]);
}

//umiejętności
$ileumiej = count($_POST['umiej_nazwa']);
for($nrumiej = 0; $nrumiej < $ileumiej; $nrumiej++) {
	$umiej_nazwa[$nrumiej] = test_input($_POST['umiej_nazwa'][$nrumiej]);
	$umiej_poziom[$nrumiej] = test_input($_POST['umiej_poziom'][$nrumiej]);
}

//kursy
$ilekurs = count($_POST['kurs']);
for($nrkurs = 0; $nrkurs < $ilekurs; $nrkurs++) {
	$kurs[$nrkurs] = test_input($_POST['kurs'][$nrkurs]);
}

//edukacja
$ileedu = count($_POST['edu_od']);
for($nredu = 0; $nredu < $ileedu; $nredu++) {
	$edu_od[$nredu] = test_input($_POST['edu_od'][$nredu]);
	$edu_do[$nredu] = test_input($_POST['edu_do'][$nredu]);
	$edu_uczelnia[$nredu] = test_input($_POST['edu_uczelnia'][$nredu]);
	$edu_kierunek[$nredu] = test_input($_POST['edu_kierunek'][$nredu]);
}

//dane osobiste cd + sprawdzenie poprawności wpisania maila i adresów stron
$urodziny = test_input($_POST['urodziny']);
$obywatelstwo = test_input($_POST['obywatelstwo']);
$ulica = test_input($_POST['ulica']);
$miasto = test_input($_POST['miasto']);
$kraj = test_input($_POST['kraj']);
$telefon = test_input($_POST['telefon']);

if(filter_var(test_input($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
	$mail = test_input($_POST['mail']);
}

if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",test_input($_POST['strona']))) {
	$strona = test_input($_POST['strona']);
}

//języki
$ilejez = count($_POST['jezyk_tytul']);
for($nrjez=0; $nrjez < $ilejez; $nrjez++) {
	$jezyk_tytul[$nrjez] = test_input($_POST['jezyk_tytul'][$nrjez]);
	$jezyk_poziom[$nrjez] = test_input($_POST['jezyk_poziom'][$nrjez]);
}

//portale
$ileport = count($_POST['portal_tytul']);
for($nrport = 0; $nrport < $ileport; $nrport++) {
	$portal_tytul[$nrport] = test_input($_POST['portal_tytul'][$nrport]);
	$portal_adres[$nrport] = test_input($_POST['portal_adres'][$nrport]);
}

//zainteresowania
$ileint = count($_POST['interes']);
for($nrint = 0; $nrint < $ileint; $nrint++) {
	$interes[$nrint] = test_input($_POST['interes'][$nrint]);
}

//klauzula
$klauzula = test_input($_POST['klauzula']);

?>

	<div id="kontener">
		<div id="osobie">
			<span class="osobie_nazwisko"><?php echo $nazwisko; ?></span>
			<span class="osobie_zawod"><?php echo $zawod; ?></span>
			<span class="osobie_cele">
				<?php echo $sciezka; ?>
			</span>
		</div>
		<div id="kolumna_lewa">
<?php
if($ileprac > 0) {
?>
			<div class="element doswiadczenie">
				<div class="element_tytul">
					<span>Doświadczenie</span>
				</div>
<?php 
for($nrpracy=0; $nrpracy < $ileprac; $nrpracy++) {
?>
				<div class="dosw_praca">
					<div class="dosw_okres">
						<span class="dosw_odkiedy"><?php echo $praca_od[$nrpracy]; ?></span>
						<span> - </span>
						<span class="dosw_dokiedy"><?php echo $praca_do[$nrpracy]; ?></span>
					</div>
					<div class="dosw_opis">
						<div class="dosw_posada">
							<span class="dosw_pracodawca"><?php echo $pracodawca[$nrpracy]; ?></span>
							<span> - </span>
							<span class="dosw_stanowisko"><?php echo $stanowisko[$nrpracy]; ?></span>
						</div>
						<div class="dosw_zakrespracy">
							<span class="dosw_zakrespracy_tytul">Obowiązki:</span>
							<span class="dosw_obowiazki"><?php echo $obowiazki[$nrpracy]; ?></span>
							<span class="dosw_zakrespracy_tytul">Osiągnięcia:</span>
							<span class="dosw_osiagniecia"><?php echo $osiagniecia[$nrpracy]; ?></span>
						</div>
					</div>
				</div>
<?php } ?>
			</div>
<?php 
} 
if($ileproj > 0) {
?>
			<div class="element projekty">
				<div class="element_tytul">
					<span>Projekty</span>
				</div>
				<div class="proj">
					<ul>
<?php
for($nrproj = 0; $nrproj < $ileproj; $nrproj++) {
?>
						<li class="projekt">
<?php
//sprawdzenie czy nazwa projektu to adres www czy zwykła nazwa. Jeśli to adres zawierający http:// to dodane zostaje przekierowanie. 
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$proj_adres[$nrproj]) && strstr($proj_adres[$nrproj], "http://")) {
?>
							<span class="proj_adres"><a href="<?php echo $proj_adres[$nrproj]; ?>"><?php echo $proj_adres[$nrproj]; ?></a></span>
<?php 
} else {
?>
							<span class="proj_adres"><?php echo $proj_adres[$nrproj]; ?></span>
<?php } ?>
							<span class="proj_opis"><?php echo $proj_opis[$nrproj]; ?></span>
						</li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php 
} 
if($ileumiej > 0) {
?>
			<div class="element umiejetnosci">
				<div class="element_tytul">
					<span>Umiejętności</span>
				</div>
				<div class="umiej">
					<ul>
<?php
for($nrumiej = 0; $nrumiej < $ileumiej; $nrumiej++) {
?>
						<li class="umiej">
							<span class="umiej_nazwa"><?php echo $umiej_nazwa[$nrumiej]; ?></span>
							<span class="umiej_poziom">
<?php 
for($star = 1; $star <= $umiej_poziom[$nrumiej]; $star++) {
?>
								<img src="pliki/fstar.png" alt="gwiazda pełna">
<?php
}
for($star = 5; $star > $umiej_poziom[$nrumiej]; $star--) {
?>
								<img src="pliki/star.png" alt="gwiazda pusta">
<?php } ?>
							</span>
						</li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php 
} 
if($ilekurs > 0) {
?>
			<div class="element kursy">
				<div class="element_tytul">
					<span>Kursy</span>
				</div>
				<div>
					<ul>
<?php
for($nrkurs = 0; $nrkurs < $ilekurs; $nrkurs++) {
?>
						<li class="kurs"><?php echo $kurs[$nrkurs]; ?></li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php 
} 
if($ileedu > 0) {
?>
			<div class="element edukacja">
				<div class="element_tytul">
					<span>Edukacja</span>
				</div>
<?php
for($nredu = 0; $nredu < $ileedu; $nredu++) {
?>
				<div class="edu_szkola">
					<div class="edu_okres">
						<span class="edu_odkiedy"><?php echo $edu_od[$nredu]; ?></span>
						<span> - </span>
						<span class="edu_dokiedy"><?php echo $edu_do[$nredu]; ?></span>
					</div>
					<div class="edu_opis">
						<div class="edu_miejsce">
							<span class="edu_uczelnia"><?php echo $edu_uczelnia[$nredu]; ?></span>
							<span class="edu_kierunek"><?php echo $edu_kierunek[$nredu]; ?></span>
						</div>
					</div>
				</div>
<?php } ?>
			</div>
<?php } ?>
		</div>
		<div id="kolumna_prawa">
<?php
if(!empty($urodziny) || !empty($obywatelstwo) || !empty($ulica) || !empty($miasto) || !empty($kraj) || !empty($telefon) || !empty($mail) || !empty($strona)) {
?>	
			<div class="element personalne">
				<div class="element_tytul">
					<span>Personalia</span>
				</div>
				<div class="person_dane">
<?php 
if(!empty($urodziny)) {
?>
					<span class="person_tytul">Data urodzenia:</span>
					<span class="person_urodziny"><?php echo $urodziny; ?></span>
<?php
}
if(!empty($obywatelstwo)) {
?>
					<span class="person_tytul">Obywatelstwo:</span>
					<span class="person_obywatelstwo"><?php echo $obywatelstwo; ?></span>
<?php
}
if(!empty($ulica) || !empty($miasto) || !empty($kraj)) {
?>
					<span class="person_tytul">Adres:</span>
					<span class="person_adres">
						<span class="person_ulica"><?php echo $ulica; ?></span>
						<span class="person_miejscowosc"><?php echo $miasto; ?></span>
						<span class="person_kraj"><?php echo $kraj; ?></span>
					</span>
<?php
}
if(!empty($telefon)) {
?>
					<span class="person_tytul">Telefon:</span>
					<span class="person_telefon"><?php echo $telefon; ?></span>
<?php
}
if(!empty($mail)) {
?>
					<span class="person_tytul">E-mail:</span>
					<span class="email"><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></span>
<?php
}
if(!empty($strona)) {
?>
					<span class="person_tytul">WWW:</span>
<?php
}
//jeśli adres zawiera http:// to dodane zostaje przekierowanie
if(strstr($strona, "http://")) {
?>
					<span class="person_www"><a href="<?php echo $strona; ?>"><?php echo $strona; ?></a></span>
<?php 
} else {
?>
					<span class="person_www"><?php echo $strona; ?></span>
<?php } ?>
				</div>
			</div>
<?php 
}
if($ilejez > 0) {
?>
			<div class="element jezyki">
				<div class="element_tytul">
					<span>Języki</span>
				</div>
<?php
for($nrjez = 0; $nrjez < $ilejez; $nrjez++) {
?>	
				<div class="jezyk">
					<span class="jezyk_tytul"><?php echo $jezyk_tytul[$nrjez]; ?></span>
					<span class="jezyk_poziom"><?php echo $jezyk_poziom[$nrjez]; ?></span>
				</div>
<?php } ?>
			</div>
<?php 
} 
if($ileport > 0) {
?>
			<div class="element portale">
				<div class="element_tytul">
					<span>Portale społecznościowe</span>
				</div>
<?php
for($nrport = 0; $nrport < $ileport; $nrport++) {
?>	
				<div class="portal">	
<?php
//jeśli adres zawiera http:// to dodane zostaje przekierowanie
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$portal_adres[$nrport]) && strstr($portal_adres[$nrport], "http://")) {
?>
					<span class="portal_tytul"><?php echo $portal_tytul[$nrport]; ?></span>
					<span class="portal_adres"><a href="<?php echo $portal_adres[$nrport]; ?>"><?php echo $portal_adres[$nrport]; ?></a></span>
<?php 
} else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$portal_adres[$nrport])) {
?>
					<span class="portal_tytul"><?php echo $portal_tytul[$nrport]; ?></span>
					<span class="portal_adres"><?php echo $portal_adres[$nrport]; ?></span>
<?php } ?>
				</div>
<?php } ?>
			</div>
<?php 
} 
if($ileint > 0) {
?>
			<div class="element zainteresowania">
				<div class="element_tytul">
					<span>Zainteresowania</span>
				</div>
				<div>
					<ul>
<?php
for($nrint = 0; $nrint < $ileint; $nrint++) {
?>
						<li class="interes"><?php echo $interes[$nrint]; ?></li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php } ?>
			<div class="podpis"></div>
		</div>
		<div id="klauzula">
			<span><?php echo $klauzula; ?></span>
		</div>
		<div style="clear: both"></div>
	</div>
</body>
</html>