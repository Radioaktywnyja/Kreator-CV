<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>CV Kreator</title>
	<meta name="Description" content="Prosty i darmowy kreator CV.">
	<meta name="Keywords" content="CV, Kreator, Wzór">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="pliki/style_cv.css">
	<link rel="stylesheet" type="text/css" href="pliki/druk.css" media="print">
	<script src="pliki/jq.js" type="text/javascript"></script>
	<script src="pliki/skrypty.js" type="text/javascript"></script>
</head>
<body>

<?php
session_start();
	
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//dane osobiste
if (!empty($_POST['nazwisko'])) {
	$_SESSION['nazwisko'] = test_input($_POST['nazwisko']);
} else {
	$_SESSION['nazwisko'] = NULL;
}

if (!empty($_POST['zawod'])) {
	$_SESSION['zawod'] = test_input($_POST['zawod']);
} else {
	$_SESSION['zawod'] = NULL;
}

if (!empty($_POST['sciezka'])) {
	$_SESSION['sciezka'] = test_input($_POST['sciezka']);
} else {
	$_SESSION['sciezka'] = NULL;
}


//dodawanie zdjęcia
//sprawdzenie czy użytkownik dodał zdjecie
if($_FILES['zdjecie']['error'] != 4) {

	//sprawdzenie czy przy próbie wysłania pliku wystąpił błąd
	$rozmiar_zdjecia = getimagesize($_FILES['zdjecie']['tmp_name']);
	
	if($_FILES['zdjecie']['error'] > 0) {
		switch($_FILES['zdjecie']['error']) {
			case 1: $blad_zdjecia = "Rozmiar pliku przekroczył wartość 2 Mb. Proszę wybrać inne zdjęcie."; break;
			case 2: $blad_zdjecia = "Rozmiar pliku przekroczyl wartość 2 Mb. Proszę wybrać inne zdjęcie."; break;
			case 3: $blad_zdjecia = "Plik wysłany tylko częściowo"; break;
			case 4: $blad_zdjecia = "Nie wysłano żadnego pliku"; break;
			case 6: $blad_zdjecia = "Nie można wysłać pliku: Nie wskazano katalogu tymczasowego."; break;
			case 7: $blad_zdjecia = "Wysyłanie pliku nie powiodło się: Nie zapisano pliku na dysku."; break;
		}
	//sprawdzenie czy plik jest obrazem
	} elseif($_FILES['zdjecie']['type'] != "image/jpeg" && $_FILES['zdjecie']['type'] != "image/png") {
		$blad_zdjecia = "Wybrane zdjęcie nie jest plikiem typu jpeg lub png. Proszę wybrać inne zdjęcie";
	} elseif(!is_array($rozmiar_zdjecia) or $rozmiar_zdjecia[0] < 2) {
		$blad_zdjecia = "Wybrane zdjęcie nie jest plikiem typu jpeg lub png. Proszę wybrać inne zdjęcie";
	} else {
		//umieszczenie pliku w pożądanej lokalizacji
		$lokalizacja = './pliki/zdjecia/'.basename($_FILES['zdjecie']['name']);
		
		if(is_uploaded_file($_FILES['zdjecie']['tmp_name'])) {
			move_uploaded_file($_FILES['zdjecie']['tmp_name'], $lokalizacja);
			$_SESSION['zdjecie'] = "url(".$lokalizacja.")";
		}
	}
} elseif (!isset($_SESSION['zdjecie'])) {
	$_SESSION['zdjecie'] ="none";
}

//usuwanie starych zdjęć z serwera
$dir = getcwd()."./pliki/zdjecia/";
$interval = strtotime('-2 hours');

foreach (glob($dir."*") as $file) {
	if (filemtime($file) <= $interval ) { 
		unlink($file);
	}
}

//doswiadczenie
if (!empty($_POST['praca_od'])) {
	$_SESSION['ileprac'] = count($_POST['praca_od']);
	for($nrpracy=0; $nrpracy < $_SESSION['ileprac']; $nrpracy++) {
		$_SESSION['praca_od'][$nrpracy] = test_input($_POST['praca_od'][$nrpracy]);
		$_SESSION['praca_do'][$nrpracy] = test_input($_POST['praca_do'][$nrpracy]);
		$_SESSION['pracodawca'][$nrpracy] = test_input($_POST['pracodawca'][$nrpracy]);
		$_SESSION['stanowisko'][$nrpracy] = test_input($_POST['stanowisko'][$nrpracy]);
		$_SESSION['obowiazki'][$nrpracy] = test_input($_POST['obowiazki'][$nrpracy]);
		$_SESSION['osiagniecia'][$nrpracy] = test_input($_POST['osiagniecia'][$nrpracy]);
	}
} else {
	$_SESSION['ileprac'] = NULL;
}

//projekty
if (!empty($_POST['proj_adres'])) {
	$_SESSION['ileproj'] = count($_POST['proj_adres']);
	for($nrproj = 0; $nrproj < $_SESSION['ileproj']; $nrproj++) {
		$_SESSION['proj_adres'][$nrproj] = test_input($_POST['proj_adres'][$nrproj]);
		$_SESSION['proj_opis'][$nrproj] = test_input($_POST['proj_opis'][$nrproj]);
	}
} else {
	$_SESSION['ileproj'] = NULL;
}

//umiejętności
if (!empty($_POST['umiej_nazwa'])) {
	$_SESSION['ileumiej'] = count($_POST['umiej_nazwa']);
	for($nrumiej = 0; $nrumiej < $_SESSION['ileumiej']; $nrumiej++) {
		$_SESSION['umiej_nazwa'][$nrumiej] = test_input($_POST['umiej_nazwa'][$nrumiej]);
		$_SESSION['umiej_poziom'][$nrumiej] = test_input($_POST['umiej_poziom'][$nrumiej]);
	}
} else {
	$_SESSION['ileumiej'] = NULL;
}

//kursy
if (!empty($_POST['kurs'])) {
	$_SESSION['ilekurs'] = count($_POST['kurs']);
	for($nrkurs = 0; $nrkurs < $_SESSION['ilekurs']; $nrkurs++) {
		$_SESSION['kurs'][$nrkurs] = test_input($_POST['kurs'][$nrkurs]);
	}
} else {
	$_SESSION['ilekurs'] = NULL;
}

//edukacja
if (!empty($_POST['edu_od'])) {
	$_SESSION['ileedu'] = count($_POST['edu_od']);
	for($nredu = 0; $nredu < $_SESSION['ileedu']; $nredu++) {
		$_SESSION['edu_od'][$nredu] = test_input($_POST['edu_od'][$nredu]);
		$_SESSION['edu_do'][$nredu] = test_input($_POST['edu_do'][$nredu]);
		$_SESSION['edu_uczelnia'][$nredu] = test_input($_POST['edu_uczelnia'][$nredu]);
		$_SESSION['edu_kierunek'][$nredu] = test_input($_POST['edu_kierunek'][$nredu]);
	}
} else {
	$_SESSION['ileedu'] = NULL;
}

//dane osobiste cd + sprawdzenie poprawności wpisania maila i adresów stron
if (!empty($_POST['urodziny'])) {
	$_SESSION['urodziny'] = test_input($_POST['urodziny']);
} else {
	$_SESSION['urodziny'] = NULL;
}

if (!empty($_POST['obywatelstwo'])) {
	$_SESSION['obywatelstwo'] = test_input($_POST['obywatelstwo']);
} else {
	$_SESSION['obywatelstwo'] = NULL;
}

if (!empty($_POST['ulica'])) {
	$_SESSION['ulica'] = test_input($_POST['ulica']);
} else {
	$_SESSION['ulica'] = NULL;
}

if (!empty($_POST['miasto'])) {
	$_SESSION['miasto'] = test_input($_POST['miasto']);
} else {
	$_SESSION['miasto'] = NULL;
}

if (!empty($_POST['kraj'])) {
	$_SESSION['kraj'] = test_input($_POST['kraj']);
} else {
	$_SESSION['kraj'] = NULL;
}

if (!empty($_POST['telefon'])) {
	$_SESSION['telefon'] = test_input($_POST['telefon']);
} else {
	$_SESSION['telefon'] = NULL;
}

if(!empty($_POST['mail']) && filter_var(test_input($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
	$_SESSION['mail'] = test_input($_POST['mail']);
} else {
	$_SESSION['mail'] = NULL;
}

if(!empty($_POST['strona']) && preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",test_input($_POST['strona']))) {
	$_SESSION['strona'] = test_input($_POST['strona']);
} else {
	$_SESSION['strona'] = NULL;
}

//języki
if (!empty($_POST['jezyk_tytul'])) {
	$_SESSION['ilejez'] = count($_POST['jezyk_tytul']);
	for($nrjez=0; $nrjez < $_SESSION['ilejez']; $nrjez++) {
		$_SESSION['jezyk_tytul'][$nrjez] = test_input($_POST['jezyk_tytul'][$nrjez]);
		$_SESSION['jezyk_poziom'][$nrjez] = test_input($_POST['jezyk_poziom'][$nrjez]);
	}
} else {
	$_SESSION['ilejez'] = NULL;
}

//portale
if (!empty($_POST['portal_tytul'])) {
	$_SESSION['ileport'] = count($_POST['portal_tytul']);
	for($nrport = 0; $nrport < $_SESSION['ileport']; $nrport++) {
		$_SESSION['portal_tytul'][$nrport] = test_input($_POST['portal_tytul'][$nrport]);
		$_SESSION['portal_adres'][$nrport] = test_input($_POST['portal_adres'][$nrport]);
	}
} else {
	$_SESSION['ileport'] = NULL;
}

//zainteresowania
if (!empty($_POST['interes'])) {
	$_SESSION['ileint'] = count($_POST['interes']);
	for($nrint = 0; $nrint < $_SESSION['ileint']; $nrint++) {
		$_SESSION['interes'][$nrint] = test_input($_POST['interes'][$nrint]);
	}
} else {
	$_SESSION['ileint'] = NULL;
}

//klauzula
if (!empty($_POST['klauzula'])) {
	$_SESSION['klauzula'] = test_input($_POST['klauzula']);
} else {
	$_SESSION['klauzula'] = NULL;
}

?>

	<div id="kontener">
			<div id="narzedzia">
		<a href="edit.php"><button class="tooltip-act" tool=".edytuj_cv">Edytuj</button></a>
		<button onclick="javascript:window.print();" class="tooltip-act" tool=".drukuj_cv">Drukuj</button>
		<div class="tooltip edytuj_cv">
			<span>Wraca do formularza edycji danych</span>
		</div>
		<div class="tooltip drukuj_cv">
			<span>Drukuje CV. W przypadku pojawienia się dodatkowego nagłówka i stopki lub braku zdjęcia na wyruku należy zmienić ustawienia przeglądarki.</span>
		</div>
	</div>
		<div id="naglowek">
			<div id="osobie">
				<span class="osobie_nazwisko"><?php echo $_SESSION['nazwisko']; ?></span>
				<span class="osobie_zawod"><?php echo $_SESSION['zawod']; ?></span>
				<span class="osobie_cele"><?php echo $_SESSION['sciezka']; ?></span>
			</div>
			<div id="zdjecie" style="background-image: <?php echo $_SESSION['zdjecie']; ?>"><span><?php if(isset($blad_zdjecia)) { echo $blad_zdjecia; } ?></span></div>
		</div>
		<div id="kolumna_lewa">
<?php
if(isset($_SESSION['ileprac'])) {
?>
			<div class="element doswiadczenie">
				<div class="element_tytul">
					<span>Doświadczenie</span>
				</div>
<?php 
for($nrpracy=0; $nrpracy < $_SESSION['ileprac']; $nrpracy++) {
?>
				<div class="dosw_praca">
					<div class="dosw_okres">
						<span class="dosw_odkiedy"><?php echo $_SESSION['praca_od'][$nrpracy]; ?></span>
						<span> - </span>
						<span class="dosw_dokiedy"><?php echo $_SESSION['praca_do'][$nrpracy]; ?></span>
					</div>
					<div class="dosw_opis">
						<div class="dosw_posada">
							<span class="dosw_pracodawca"><?php echo $_SESSION['pracodawca'][$nrpracy]; ?></span>
							<span> - </span>
							<span class="dosw_stanowisko"><?php echo $_SESSION['stanowisko'][$nrpracy]; ?></span>
						</div>
						<div class="dosw_zakrespracy">
							<span class="dosw_zakrespracy_tytul">Obowiązki:</span>
							<span class="dosw_obowiazki"><?php echo $_SESSION['obowiazki'][$nrpracy]; ?></span>
<?php 
if (!empty($_SESSION['osiagniecia'][$nrpracy])) {
?>
							<span class="dosw_zakrespracy_tytul">Osiągnięcia:</span>
							<span class="dosw_osiagniecia"><?php echo $_SESSION['osiagniecia'][$nrpracy]; ?></span>
<?php } ?>
						</div>
					</div>
				</div>
<?php } ?>
			</div>
<?php 
} 
if(isset($_SESSION['ileproj'])) {
?>
			<div class="element projekty">
				<div class="element_tytul">
					<span>Projekty</span>
				</div>
				<div class="proj">
					<ul>
<?php
for($nrproj = 0; $nrproj < $_SESSION['ileproj']; $nrproj++) {
?>
						<li class="projekt">
<?php
//sprawdzenie czy nazwa projektu to adres www czy zwykła nazwa. Jeśli to adres zawierający http:// to dodane zostaje przekierowanie. 
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_SESSION['proj_adres'][$nrproj]) && strstr($_SESSION['proj_adres'][$nrproj], "http://")) {
?>
							<span class="proj_adres"><a href="<?php echo $_SESSION['proj_adres'][$nrproj]; ?>"><?php echo $_SESSION['proj_adres'][$nrproj]; ?></a></span>
<?php 
} else {
?>
							<span class="proj_adres"><?php echo $_SESSION['proj_adres'][$nrproj]; ?></span>
<?php } ?>
							<span class="proj_opis"><?php echo $_SESSION['proj_opis'][$nrproj]; ?></span>
						</li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php 
} 
if(isset($_SESSION['ileumiej'])) {
?>
			<div class="element umiejetnosci">
				<div class="element_tytul">
					<span>Umiejętności</span>
				</div>
				<div class="umiej">
					<ul>
<?php
for($nrumiej = 0; $nrumiej < $_SESSION['ileumiej']; $nrumiej++) {
?>
						<li class="umiej">
							<span class="umiej_nazwa"><?php echo $_SESSION['umiej_nazwa'][$nrumiej]; ?></span>
							<span class="umiej_poziom">
<?php 
for($star = 1; $star <= $_SESSION['umiej_poziom'][$nrumiej]; $star++) {
?>
								<img src="pliki/fstar.png" alt="gwiazda pełna">
<?php
}
for($star = 5; $star > $_SESSION['umiej_poziom'][$nrumiej]; $star--) {
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
if(isset($_SESSION['ilekurs'])) {
?>
			<div class="element kursy">
				<div class="element_tytul">
					<span>Kursy</span>
				</div>
				<div>
					<ul>
<?php
for($nrkurs = 0; $nrkurs < $_SESSION['ilekurs']; $nrkurs++) {
?>
						<li class="kurs"><?php echo $_SESSION['kurs'][$nrkurs]; ?></li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php 
} 
if(isset($_SESSION['ileedu'])) {
?>
			<div class="element edukacja">
				<div class="element_tytul">
					<span>Edukacja</span>
				</div>
<?php
for($nredu = 0; $nredu < $_SESSION['ileedu']; $nredu++) {
?>
				<div class="edu_szkola">
					<div class="edu_okres">
						<span class="edu_odkiedy"><?php echo $_SESSION['edu_od'][$nredu]; ?></span>
						<span> - </span>
						<span class="edu_dokiedy"><?php echo $_SESSION['edu_do'][$nredu]; ?></span>
					</div>
					<div class="edu_opis">
						<div class="edu_miejsce">
							<span class="edu_uczelnia"><?php echo $_SESSION['edu_uczelnia'][$nredu]; ?></span>
							<span class="edu_kierunek"><?php echo $_SESSION['edu_kierunek'][$nredu]; ?></span>
						</div>
					</div>
				</div>
<?php } ?>
			</div>
<?php } ?>
		</div>
		<div id="kolumna_prawa">
<?php
if(!empty($_SESSION['urodziny']) || !empty($_SESSION['obywatelstwo']) || !empty($_SESSION['ulica']) || !empty($_SESSION['miasto']) || !empty($_SESSION['kraj']) || !empty($_SESSION['telefon']) || !empty($_SESSION['mail']) || !empty($_SESSION['strona'])) {
?>	
			<div class="element personalne">
				<div class="element_tytul">
					<span>Personalia</span>
				</div>
				<div class="person_dane">
<?php 
if(!empty($_SESSION['urodziny'])) {
?>
					<span class="person_tytul">Data urodzenia:</span>
					<span class="person_urodziny"><?php echo $_SESSION['urodziny']; ?></span>
<?php
}
if(!empty($_SESSION['obywatelstwo'])) {
?>
					<span class="person_tytul">Obywatelstwo:</span>
					<span class="person_obywatelstwo"><?php echo $_SESSION['obywatelstwo']; ?></span>
<?php
}
if(!empty($_SESSION['ulica']) || !empty($_SESSION['miasto']) || !empty($_SESSION['kraj'])) {
?>
					<span class="person_tytul">Adres:</span>
					<span class="person_adres">
						<span class="person_ulica"><?php echo $_SESSION['ulica']; ?></span>
						<span class="person_miejscowosc"><?php echo $_SESSION['miasto']; ?></span>
						<span class="person_kraj"><?php echo $_SESSION['kraj']; ?></span>
					</span>
<?php
}
if(!empty($_SESSION['telefon'])) {
?>
					<span class="person_tytul">Telefon:</span>
					<span class="person_telefon"><?php echo $_SESSION['telefon']; ?></span>
<?php
}
if(!empty($_SESSION['mail'])) {
?>
					<span class="person_tytul">E-mail:</span>
					<span class="email"><a href="mailto:<?php echo $_SESSION['mail']; ?>"><?php echo $_SESSION['mail']; ?></a></span>
<?php
}
if(!empty($_SESSION['strona'])) {
?>
					<span class="person_tytul">WWW:</span>
<?php
}
//jeśli adres zawiera http:// to dodane zostaje przekierowanie
if(strstr($_SESSION['strona'], "http://")) {
?>
					<span class="person_www"><a href="<?php echo $_SESSION['strona']; ?>"><?php echo $_SESSION['strona']; ?></a></span>
<?php 
} else {
?>
					<span class="person_www"><?php echo $_SESSION['strona']; ?></span>
<?php } ?>
				</div>
			</div>
<?php 
}
if(isset($_SESSION['ilejez'])) {
?>
			<div class="element jezyki">
				<div class="element_tytul">
					<span>Języki</span>
				</div>
<?php
for($nrjez = 0; $nrjez < $_SESSION['ilejez']; $nrjez++) {
?>	
				<div class="jezyk">
					<span class="jezyk_tytul"><?php echo $_SESSION['jezyk_tytul'][$nrjez]; ?></span>
					<span class="jezyk_poziom"><?php echo $_SESSION['jezyk_poziom'][$nrjez]; ?></span>
				</div>
<?php } ?>
			</div>
<?php 
} 
if(isset($_SESSION['ileport'])) {
?>
			<div class="element portale">
				<div class="element_tytul">
					<span>Portale społecznościowe</span>
				</div>
<?php
for($nrport = 0; $nrport < $_SESSION['ileport']; $nrport++) {
?>	
				<div class="portal">	
<?php
//jeśli adres zawiera http:// to dodane zostaje przekierowanie
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_SESSION['portal_adres'][$nrport]) && strstr($_SESSION['portal_adres'][$nrport], "http://")) {
?>
					<span class="portal_tytul"><?php echo $_SESSION['portal_tytul'][$nrport]; ?></span>
					<span class="portal_adres"><a href="<?php echo $_SESSION['portal_adres'][$nrport]; ?>"><?php echo $_SESSION['portal_adres'][$nrport]; ?></a></span>
<?php 
} else if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_SESSION['portal_adres'][$nrport])) {
?>
					<span class="portal_tytul"><?php echo $_SESSION['portal_tytul'][$nrport]; ?></span>
					<span class="portal_adres"><?php echo $_SESSION['portal_adres'][$nrport]; ?></span>
<?php } ?>
				</div>
<?php } ?>
			</div>
<?php 
} 
if(isset($_SESSION['ileint'])) {
?>
			<div class="element zainteresowania">
				<div class="element_tytul">
					<span>Zainteresowania</span>
				</div>
				<div>
					<ul>
<?php
for($nrint = 0; $nrint < $_SESSION['ileint']; $nrint++) {
?>
						<li class="interes"><?php echo $_SESSION['interes'][$nrint]; ?></li>
<?php } ?>
					</ul>
				</div>
			</div>
<?php } ?>
			<div class="podpis"></div>
		</div>
		<div id="klauzula">
			<span><?php echo $_SESSION['klauzula']; ?></span>
		</div>
		<div style="clear: both"></div>
	</div>
</body>
</html>