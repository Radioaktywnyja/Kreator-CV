<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>CV Kreator</title>
	<meta name="Description" content="Prosty i darmowy kreator CV.">
	<meta name="Keywords" content="CV, Kreator, Wzór">
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="pliki/style_form.css">
	<script src="pliki/jq.js" type="text/javascript"></script>
	<script src="pliki/skrypty.js" type="text/javascript"></script>
</head>
<body>

<?php
session_start();
?>
	<form action="insert.php" method="POST" enctype="multipart/form-data">
		<div id="kontener">
			<div id="osobie">
				<span class="osobie_nazwisko">
<?php 
if (isset($_SESSION['nazwisko'])) {
?>
					<input type="text" name="nazwisko" placeholder="Imię i Nazwisko" value="<?php echo $_SESSION['nazwisko']; ?>" />
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
					<input disabled="disabled" style="text-decoration: line-through;" type="text" name="nazwisko" placeholder="Imię i Nazwisko" />
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
				</span>
				<span class="osobie_zawod">
<?php 
if (isset($_SESSION['zawod'])) {
?>
					<input type="text" name="zawod" placeholder="Zawód" value="<?php echo $_SESSION['zawod']; ?>" />
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
					<input disabled="disabled" style="text-decoration: line-through;" type="text" name="zawod" placeholder="Zawód" />
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
				</span>
				<span class="osobie_cele">
<?php 
if (isset($_SESSION['sciezka'])) {
?>
					<textarea name="sciezka" placeholder="Kilka zdań o sobie i o planowanej ścieżce zawodowej"><?php echo $_SESSION['sciezka']; ?></textarea>
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
					<textarea disabled="disabled" style="text-decoration: line-through;" name="sciezka" placeholder="Kilka zdań o sobie i o planowanej ścieżce zawodowej"></textarea>
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
				</span>
			</div>
			<div id="zdjecie">
				<button type="button">Wybierz zdjęcie</button>
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
				<input class="upload" type="file" name="zdjecie" accept="image/jpeg, image/png" />
			</div>
			<div id="kolumna_lewa">
				<div class="element doswiadczenie">
<?php
if(isset($_SESSION['ileprac'])) { 
?>
					<div class="element_tytul">
						<span>Doświadczenie</span>
						<button type="button" class="praca_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejne</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php
for($nrpracy=0; $nrpracy < $_SESSION['ileprac']; $nrpracy++) {
?>
					<div class="dosw_praca<?php echo $nrpracy; ?>" nrpracy="<?php echo $nrpracy; ?>">
<?php 
if ($nrpracy == $_SESSION['ileprac'] - 1 && $nrpracy > 0) {
?>
						<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
						<div class="dosw_okres">
							<span class="dosw_odkiedy"><input class="okres" type="text" name="praca_od[<?php echo $nrpracy; ?>]" placeholder="od kiedy" value="<?php echo $_SESSION['praca_od'][$nrpracy]; ?>" /></span>
							<span> - </span>
							<span class="dosw_dokiedy"><input class="okres" type="text" name="praca_do[<?php echo $nrpracy; ?>]" placeholder="do kiedy" value="<?php echo $_SESSION['praca_do'][$nrpracy]; ?>" /></span>
						</div>
						<div class="dosw_opis">
							<div class="dosw_posada">
								<span class="dosw_pracodawca"><input type="text" name="pracodawca[<?php echo $nrpracy; ?>]" placeholder="Pracodawca" value="<?php echo $_SESSION['pracodawca'][$nrpracy]; ?>" /></span>
								<span> - </span>
								<span class="dosw_stanowisko"><input type="text" name="stanowisko[<?php echo $nrpracy; ?>]" placeholder="Stanowisko" value="<?php echo $_SESSION['stanowisko'][$nrpracy]; ?>" /></span>
							</div>
							<div class="dosw_zakrespracy">
								<span class="dosw_obowiazki">
									<input type="text" name="obowiazki[<?php echo $nrpracy; ?>]" placeholder="Zakres obowiązków na tym stanowisku" value="<?php echo $_SESSION['obowiazki'][$nrpracy]; ?>" />
								</span>
								<span class="dosw_osiagniecia">
									<input type="text" name="osiagniecia[<?php echo $nrpracy; ?>]" placeholder="Największe osiągnięcia na tym stanowisku (pole niewymagane)" value="<?php echo $_SESSION['osiagniecia'][$nrpracy]; ?>" />
								</span>
							</div>
						</div>
					</div>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Doświadczenie</span>
						<button style="display: none;" type="button" class="praca_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejne</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="dosw_praca0" nrpracy="0">
						<div class="dosw_okres">
							<span class="dosw_odkiedy"><input disabled="disabled" class="okres" type="text" name="praca_od[0]" placeholder="od kiedy" /></span>
							<span> - </span>
							<span class="dosw_dokiedy"><input disabled="disabled" class="okres" type="text" name="praca_do[0]" placeholder="do kiedy" /></span>
						</div>
						<div class="dosw_opis">
							<div class="dosw_posada">
								<span class="dosw_pracodawca"><input disabled="disabled" type="text" name="pracodawca[0]" placeholder="Pracodawca" /></span>
								<span> - </span>
								<span class="dosw_stanowisko"><input disabled="disabled" type="text" name="stanowisko[0]" placeholder="Stanowisko" /></span>
							</div>
							<div class="dosw_zakrespracy">
								<span class="dosw_obowiazki">
									<input disabled="disabled" type="text" name="obowiazki[0]" placeholder="Zakres obowiązków na tym stanowisku" />
								</span>
								<span class="dosw_osiagniecia">
									<input disabled="disabled" type="text" name="osiagniecia[0]" placeholder="Największe osiągnięcia na tym stanowisku" />
								</span>
							</div>
						</div>
					</div>
<?php } ?>
				</div>
				<div class="element projekty">
<?php
if(isset($_SESSION['ileproj'])) { 
?>
					<div class="element_tytul">
						<span>Projekty</span>
						<button type="button" class="projekt_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="proj">
						<ul>
<?php
for($nrproj = 0; $nrproj < $_SESSION['ileproj']; $nrproj++) {
?>
							<li class="projekt<?php echo $nrproj; ?>" nrproj="<?php echo $nrproj; ?>">
<?php 
if ($nrproj == $_SESSION['ileproj'] - 1 && $nrproj > 0) {
?>
								<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
								<span class="proj_adres"><input type="text" name="proj_adres[<?php echo $nrproj; ?>]" placeholder="Nazwa projektu lub adres www" value="<?php echo $_SESSION['proj_adres'][$nrproj]; ?>" /></span>
								<span class="proj_opis"><input type="text" name="proj_opis[<?php echo $nrproj; ?>]" placeholder="Kilka zdań na temat projektu" value="<?php echo $_SESSION['proj_opis'][$nrproj]; ?>" /></span>
							</li>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;" >Projekty</span>
						<button style="display: none;" type="button" class="projekt_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="proj">
						<ul>
							<li class="projekt0" nrproj="0">
								<span class="proj_adres"><input disabled="disabled" type="text" name="proj_adres[0]" placeholder="Nazwa projektu lub adres www" /></span>
								<span class="proj_opis"><input disabled="disabled" type="text" name="proj_opis[0]" placeholder="Kilka zdań na temat projektu" /></span>
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
				<div class="element umiejetnosci">
<?php 
if(isset($_SESSION['ileumiej'])) {
?>
					<div class="element_tytul">
						<span>Umiejętności</span>
						<button type="button" class="umiej_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejną</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="umiej">
						<ul>
<?php 
for($nrumiej = 0; $nrumiej < $_SESSION['ileumiej']; $nrumiej++) {
?>
							<li class="umiej<?php echo $nrumiej; ?>" nrumiej="<?php echo $nrumiej; ?>">
<?php 
if ($nrumiej == $_SESSION['ileumiej'] - 1 && $nrumiej > 0) {
?>
								<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
								<span class="umiej_nazwa"><input type="text" name="umiej_nazwa[<?php echo $nrumiej; ?>]" placeholder="Nazwa umiejętności i jej poziom w skali 1-5" value="<?php echo $_SESSION['umiej_nazwa'][$nrumiej]; ?>" /></span>
								<span class="umiej_poziom">
									<input type="radio" name="umiej_poziom[<?php echo $nrumiej; ?>]" value="1" <?php if($_SESSION['umiej_poziom'][$nrumiej] == 1) { echo 'checked="checked"'; } ?> />1
									<input type="radio" name="umiej_poziom[<?php echo $nrumiej; ?>]" value="2" <?php if($_SESSION['umiej_poziom'][$nrumiej] == 2) { echo 'checked="checked"'; } ?> />2
									<input type="radio" name="umiej_poziom[<?php echo $nrumiej; ?>]" value="3" <?php if($_SESSION['umiej_poziom'][$nrumiej] == 3) { echo 'checked="checked"'; } ?> />3
									<input type="radio" name="umiej_poziom[<?php echo $nrumiej; ?>]" value="4" <?php if($_SESSION['umiej_poziom'][$nrumiej] == 4) { echo 'checked="checked"'; } ?> />4
									<input type="radio" name="umiej_poziom[<?php echo $nrumiej; ?>]" value="5" <?php if($_SESSION['umiej_poziom'][$nrumiej] == 5) { echo 'checked="checked"'; } ?> />5
								</span>
							</li>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Umiejętności</span>
						<button style="display: none;" type="button" class="umiej_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejną</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="umiej">
						<ul>
							<li class="umiej0" nrumiej="0">
								<span class="umiej_nazwa"><input disabled="disabled" type="text" name="umiej_nazwa[0]" placeholder="Nazwa umiejętności i jej poziom w skali 1-5" /></span>
								<span class="umiej_poziom">
									<input disabled="disabled" type="radio" name="umiej_poziom[0]" value="1" checked="checked" />1
									<input disabled="disabled" type="radio" name="umiej_poziom[0]" value="2" />2
									<input disabled="disabled" type="radio" name="umiej_poziom[0]" value="3" />3
									<input disabled="disabled" type="radio" name="umiej_poziom[0]" value="4" />4
									<input disabled="disabled" type="radio" name="umiej_poziom[0]" value="5" />5
								</span>
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
				<div class="element kursy">
<?php 
if(isset($_SESSION['ilekurs'])) {
?>
					<div class="element_tytul">
						<span>Kursy</span>
						<button type="button" class="kurs_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="kurs">
						<ul>
<?php 
	for($nrkurs = 0; $nrkurs < $_SESSION['ilekurs']; $nrkurs++) {
?>
							<li class="kurs<?php echo $nrkurs; ?>" nrkurs="<?php echo $nrkurs; ?>">
<?php 
if ($nrkurs == $_SESSION['ilekurs'] - 1 && $nrkurs > 0) {
?>
								<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
								<input type="text" name="kurs[<?php echo $nrkurs; ?>]" placeholder="Nazwa kursu" value="<?php echo $_SESSION['kurs'][$nrkurs]; ?>" />
							</li>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Kursy</span>
						<button style="display: none;" type="button" class="kurs_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="kurs">
						<ul>
							<li class="kurs0" nrkurs="0">
								<input disabled="disabled" type="text" name="kurs[0]" placeholder="Nazwa kursu" />
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
				<div class="element edukacja">
<?php 
if(isset($_SESSION['ileedu'])) {
?>
					<div class="element_tytul">
						<span>Edukacja</span>
						<button type="button" class="edu_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejną</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php 
	for($nredu = 0; $nredu < $_SESSION['ileedu']; $nredu++) {
?>
					<div class="edu_szkola<?php echo $nredu; ?>" nredu="<?php echo $nredu; ?>">
<?php 
if ($nredu == $_SESSION['ileedu'] - 1 && $nredu > 0) {
?>
						<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
						<div class="edu_okres">
							<span class="edu_odkiedy"><input class="okres" type="text" name="edu_od[<?php echo $nredu; ?>]" placeholder="od kiedy" value="<?php echo $_SESSION['edu_od'][$nredu]; ?>" /></span>
							<span> - </span>
							<span class="edu_dokiedy"><input class="okres" type="text" name="edu_do[<?php echo $nredu; ?>]" placeholder="do kiedy" value="<?php echo $_SESSION['edu_do'][$nredu]; ?>" /></span>
						</div>
						<div class="edu_opis">
							<div class="edu_miejsce">
								<span class="edu_uczelnia"><input type="text" name="edu_uczelnia[<?php echo $nredu; ?>]" placeholder="Nazwa uczelni" value="<?php echo $_SESSION['edu_uczelnia'][$nredu]; ?>" /></span>
								<span class="edu_kierunek"><input type="text" name="edu_kierunek[<?php echo $nredu; ?>]" placeholder="Kierunek" value="<?php echo $_SESSION['edu_kierunek'][$nredu]; ?>" /></span>
							</div>
						</div>
					</div>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Edukacja</span>
						<button style="display: none;" type="button" class="edu_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejną</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="edu_szkola0" nredu="0">
						<div class="edu_okres">
							<span class="edu_odkiedy"><input disabled="disabled" class="okres" type="text" name="edu_od[0]" placeholder="od kiedy" /></span>
							<span> - </span>
							<span class="edu_dokiedy"><input disabled="disabled" class="okres" type="text" name="edu_do[0]" placeholder="do kiedy" /></span>
						</div>
						<div class="edu_opis">
							<div class="edu_miejsce">
								<span class="edu_uczelnia"><input disabled="disabled" type="text" name="edu_uczelnia[0]" placeholder="Nazwa uczelni" /></span>
								<span class="edu_kierunek"><input disabled="disabled" type="text" name="edu_kierunek[0]" placeholder="Kierunek" /></span>
							</div>
						</div>
					</div>
<?php } ?>
				</div>
			</div>
			<div id="kolumna_prawa">
				<div class="element personalne">
					<div class="element_tytul">
						<span>Personalia</span>
					</div>
					<div class="person_dane">
						<span class="person_tytul">Data urodzenia:</span>
						<span class="person_urodziny">
<?php 
if (isset($_SESSION['urodziny'])) {
?>
							<input type="text" name="urodziny" placeholder="DD.MM.RRRR" value="<?php echo $_SESSION['urodziny']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="urodziny" placeholder="DD.MM.RRRR" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
						</span>
						<span class="person_tytul">Obywatelstwo:</span>
						<span class="person_obywatelstwo">
<?php 
if (isset($_SESSION['obywatelstwo'])) {
?>
							<input type="text" name="obywatelstwo" placeholder="Obywatelstwo" value="<?php echo $_SESSION['obywatelstwo']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="obywatelstwo" placeholder="Obywatelstwo" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
						</span>
						<span class="person_tytul">Adres:</span>
						<span class="person_adres">
<?php 
if (isset($_SESSION['ulica'])) {
?>
							<input type="text" name="ulica" placeholder="Ulica nr" value="<?php echo $_SESSION['ulica']; ?>" />
							<input type="text" name="miasto" placeholder="XX-XXX Miejscowość" value="<?php echo $_SESSION['miasto']; ?>" />
							<input type="text" name="kraj" placeholder="Kraj" value="<?php echo $_SESSION['kraj']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="ulica" placeholder="Ulica nr" value="<?php echo $_SESSION['ulica']; ?>" />
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="miasto" placeholder="XX-XXX Miejscowość" value="<?php echo $_SESSION['miasto']; ?>" />
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="kraj" placeholder="Kraj" value="<?php echo $_SESSION['kraj']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
						</span>
						<span class="person_tytul">Telefon:</span>
						<span class="person_telefon">
<?php 
if (isset($_SESSION['telefon'])) {
?>
							<input type="text" name="telefon" placeholder="Nr telefonu" value="<?php echo $_SESSION['telefon']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="telefon" placeholder="Nr telefonu" value="<?php echo $_SESSION['telefon']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
						</span>
						<span class="person_tytul">E-mail:</span>
						<span class="email">
<?php 
if (isset($_SESSION['mail'])) {
?>
							<input type="text" name="mail" placeholder="Adres e-mail" value="<?php echo $_SESSION['mail']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="mail" placeholder="Adres e-mail" value="<?php echo $_SESSION['mail']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
						</span>
						<span class="person_tytul">WWW:</span>
						<span class="person_www">
<?php 
if (isset($_SESSION['strona'])) {
?>
							<input type="text" name="strona" placeholder="Strona WWW" value="<?php echo $_SESSION['strona']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
							<input disabled="disabled" style="text-decoration: line-through;" type="text" name="strona" placeholder="Strona WWW" value="<?php echo $_SESSION['strona']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
						</span>
					</div>
				</div>
				<div class="element jezyki">
<?php 
if(isset($_SESSION['ilejez'])) {
?>
					<div class="element_tytul">
						<span>Języki</span>
						<button type="button" class="jezyk_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php 
	for($nrjez = 0; $nrjez < $_SESSION['ilejez']; $nrjez++) {
?>	
					<div class="jezyk<?php echo $nrjez; ?>" nrjez="<?php echo $nrjez; ?>">
<?php 
if ($nrjez == $_SESSION['ilejez'] - 1 && $nrjez > 0) {
?>
						<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
						<span class="jezyk_tytul"><input type="text" name="jezyk_tytul[<?php echo $nrjez; ?>]" placeholder="Język" value="<?php echo $_SESSION['jezyk_tytul'][$nrjez]; ?>" /></span>
						<span class="jezyk_poziom"><input type="text" name="jezyk_poziom[<?php echo $nrjez; ?>]" placeholder="Poziom" value="<?php echo $_SESSION['jezyk_poziom'][$nrjez]; ?>" /></span>
					</div>
<?php 
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Języki</span>
						<button style="display: none;" type="button" class="jezyk_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="jezyk0" nrjez="0">
						<span class="jezyk_tytul"><input disabled="disabled" type="text" name="jezyk_tytul[0]" placeholder="Język" /></span>
						<span class="jezyk_poziom"><input disabled="disabled" type="text" name="jezyk_poziom[0]" placeholder="Poziom" /></span>
					</div>
<?php } ?>
				</div>
				<div class="element portale">
<?php  
if(isset($_SESSION['ileport'])) {
?>
					<div class="element_tytul">
						<span>Portale społecznościowe</span>
						<button type="button" class="portal_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php  
	for($nrport = 0; $nrport < $_SESSION['ileport']; $nrport++) {
?>	
					<div class="portal<?php echo $nrport; ?>" nrport="<?php echo $nrport; ?>">
<?php 
if ($nrport == $_SESSION['ileport'] - 1 && $nrport > 0) {
?>
						<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
						<span class="portal_tytul"><input type="text" name="portal_tytul[<?php echo $nrport; ?>]" placeholder="Nazwa portalu" value="<?php echo $_SESSION['portal_tytul'][$nrport]; ?>" /></span>
						<span class="portal_adres"><input type="text" name="portal_adres[<?php echo $nrport; ?>]" placeholder="Adress www do profilu" value="<?php echo $_SESSION['portal_adres'][$nrport]; ?>" /></span>
					</div>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Portale społecznościowe</span>
						<button style="display: none;" type="button" class="portal_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="portal0" nrport="0">
						<span class="portal_tytul"><input disabled="disabled" type="text" name="portal_tytul[0]" placeholder="Nazwa portalu" /></span>
						<span class="portal_adres"><input disabled="disabled" type="text" name="portal_adres[0]" placeholder="Adress www do profilu" /></span>
					</div>
<?php } ?>
				</div>
				<div class="element zainteresowania">
<?php 
if(isset($_SESSION['ileint'])) {
?>
					<div class="element_tytul">
						<span>Zainteresowania</span>
						<button type="button" class="interes_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejne</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="interes">
						<ul>
<?php 
	for($nrint = 0; $nrint < $_SESSION['ileint']; $nrint++) {
?>
							<li class="interes<?php echo $nrint; ?>" nrint="<?php echo $nrint; ?>">
<?php 
if ($nrint == $_SESSION['ileint'] - 1 && $nrint > 0) {
?>
								<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>
<?php } ?>
								<input type="text" name="interes[<?php echo $nrint; ?>]" placeholder="Zainteresowanie" value="<?php echo $_SESSION['interes'][$nrint]; ?>" />
							</li>
<?php
	}
} else {
?>
					<div class="element_tytul">
						<span style="text-decoration: line-through;">Zainteresowania</span>
						<button style="display: none;" type="button" class="interes_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejne</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-p" status="p">Przywróć element</button>
					</div>
					<div style="display: none;" class="interes">
						<ul>
							<li class="interes0" nrint="0">
								<input disabled="disabled" type="text" name="interes[0]" placeholder="Zainteresowanie" />
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div id="klauzula">
				<span>
<?php 
if (isset($_SESSION['klauzula'])) {
?>
					<textarea name="klauzula" placeholder="Klauzula o ochronie danych osobowych"><?php echo $_SESSION['klauzula']; ?></textarea>
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
<?php 
} else {
?>
					<textarea disabled="disabled" style="text-decoration: line-through;" name="klauzula" placeholder="Klauzula o ochronie danych osobowych"></textarea>
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-p" status="p">+</button>
<?php } ?>
				</span>
			</div>
			<input class="tooltip-act" tool=".wyslij_form" type="submit" value="Wyświetl" />
			<input class="tooltip-act" tool=".wyczysc_form" type="reset" value="Przywróć pierwotne" />
			<div class="tooltip usun_pole_opis-u">
				<span>Usuwa z CV wybrane pole. Może zostać przywrócone</span>
			</div>
			<div class="tooltip usun_pole_opis-p">
				<span>Przywraca do CV wybrane pole</span>
			</div>
			<div class="tooltip usun_element_opis-u">
				<span>Usuwa z CV caly element. Może zostać przywrócony bez utraty danych</span>
			</div>
			<div class="tooltip usun_element_opis-p">
				<span>Przywraca do CV caly element</span>
			</div>
			<div class="tooltip dodaj_pozycje">
				<span>Dodaje do elementu kolejną pozycję</span>
			</div>
			<div class="tooltip usun_pozycje">
				<span>Usuwa z elementu ostatnią pozycję, bez możliwości odzyskania danych</span>
			</div>
			<div class="tooltip wyslij_form">
				<span>Wyświetla gotowe CV, z możliwością ponownej edycji</span>
			</div>
			<div class="tooltip wyczysc_form">
				<span>Czyści cały formularz, bez możliwości odzyskania danych</span>
			</div>
			<div style="clear: both"></div>
		</div>
	</form>	
</body>
</html>