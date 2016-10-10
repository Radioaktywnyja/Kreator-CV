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
					<input type="text" name="nazwisko" placeholder="Imię i Nazwisko" value="<?php echo $_SESSION['nazwisko']; ?>" />
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
				</span>
				<span class="osobie_zawod">
					<input type="text" name="zawod" placeholder="Zawód" value="<?php echo $_SESSION['zawod']; ?>" />
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
				</span>
				<span class="osobie_cele">
					<textarea name="sciezka" placeholder="Kilka zdań o sobie i o planowanej ścieżce zawodowej"><?php echo $_SESSION['sciezka']; ?></textarea>
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
				</span>
			</div>
			<div id="zdjecie">
				<button type="button">Wybierz zdjęcie</button>
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
				<input class="upload" type="file" name="zdjecie" accept="image/jpeg, image/png" />
			</div>
			<div id="kolumna_lewa">
				<div class="element doswiadczenie">
					<div class="element_tytul">
						<span>Doświadczenie</span>
						<button type="button" class="praca_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejne</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php
if($_SESSION['$ileprac'] > 0) { 
	for($nrpracy=0; $nrpracy < $_SESSION['$ileprac']; $nrpracy++) {
?>
					<div class="dosw_praca<?php echo $nrpracy; ?>" nrpracy="<?php echo $nrpracy; ?>">
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
									<input type="text" name="osiagniecia[<?php echo $nrpracy; ?>]" placeholder="Największe osiągnięcia na tym stanowisku" value="<?php echo $_SESSION['osiagniecia'][$nrpracy]; ?>" />
								</span>
							</div>
						</div>
					</div>
<?php
	}
} else {
?>
					<div class="dosw_praca0" nrpracy="0">
						<div class="dosw_okres">
							<span class="dosw_odkiedy"><input class="okres" type="text" name="praca_od[0]" placeholder="od kiedy" /></span>
							<span> - </span>
							<span class="dosw_dokiedy"><input class="okres" type="text" name="praca_do[0]" placeholder="do kiedy" /></span>
						</div>
						<div class="dosw_opis">
							<div class="dosw_posada">
								<span class="dosw_pracodawca"><input type="text" name="pracodawca[0]" placeholder="Pracodawca" /></span>
								<span> - </span>
								<span class="dosw_stanowisko"><input type="text" name="stanowisko[0]" placeholder="Stanowisko" /></span>
							</div>
							<div class="dosw_zakrespracy">
								<span class="dosw_obowiazki">
									<input type="text" name="obowiazki[0]" placeholder="Zakres obowiązków na tym stanowisku" />
								</span>
								<span class="dosw_osiagniecia">
									<input type="text" name="osiagniecia[0]" placeholder="Największe osiągnięcia na tym stanowisku" />
								</span>
							</div>
						</div>
					</div>
<?php } ?>
				</div>
				<div class="element projekty">
					<div class="element_tytul">
						<span>Projekty</span>
						<button type="button" class="projekt_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="proj">
						<ul>
<?php
if($_SESSION['$ileproj'] > 0) { 
	for($nrproj = 0; $nrproj < $_SESSION['$ileproj']; $nrproj++) {
?>
							<li class="projekt<?php echo $nrproj; ?>" nrproj="<?php echo $nrproj; ?>">
								<span class="proj_adres"><input type="text" name="proj_adres[<?php echo $nrproj; ?>]" placeholder="Nazwa projektu lub adres www" value="<?php echo $_SESSION['proj_adres'][$nrproj]; ?>" /></span>
								<span class="proj_opis"><input type="text" name="proj_opis[<?php echo $nrproj; ?>]" placeholder="Kilka zdań na temat projektu" value="<?php echo $_SESSION['proj_opis'][$nrproj]; ?>" /></span>
							</li>
<?php
	}
} else {
?>
							<li class="projekt0" nrproj="0">
								<span class="proj_adres"><input type="text" name="proj_adres[0]" placeholder="Nazwa projektu lub adres www" /></span>
								<span class="proj_opis"><input type="text" name="proj_opis[0]" placeholder="Kilka zdań na temat projektu" /></span>
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
				<div class="element umiejetnosci">
					<div class="element_tytul">
						<span>Umiejętności</span>
						<button type="button" class="umiej_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejną</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="umiej">
						<ul>
<?php 
if($_SESSION['$ileumiej'] > 0) {
	for($nrumiej = 0; $nrumiej < $_SESSION['$ileumiej']; $nrumiej++) {
?>
							<li class="umiej<?php echo $nrumiej; ?>" nrumiej="<?php echo $nrumiej; ?>">
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
							<li class="umiej0" nrumiej="0">
								<span class="umiej_nazwa"><input type="text" name="umiej_nazwa[0]" placeholder="Nazwa umiejętności i jej poziom w skali 1-5" /></span>
								<span class="umiej_poziom">
									<input type="radio" name="umiej_poziom[0]" value="1" checked="checked" />1
									<input type="radio" name="umiej_poziom[0]" value="2" />2
									<input type="radio" name="umiej_poziom[0]" value="3" />3
									<input type="radio" name="umiej_poziom[0]" value="4" />4
									<input type="radio" name="umiej_poziom[0]" value="5" />5
								</span>
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
				<div class="element kursy">
					<div class="element_tytul">
						<span>Kursy</span>
						<button type="button" class="kurs_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="kurs">
						<ul>
<?php 
if($_SESSION['$ilekurs'] > 0) {
	for($nrkurs = 0; $nrkurs < $_SESSION['$ilekurs']; $nrkurs++) {
?>
							<li class="kurs<?php echo $nrkurs; ?>" nrkurs="<?php echo $nrkurs; ?>">
								<input type="text" name="kurs[<?php echo $nrkurs; ?>]" placeholder="Nazwa kursu" value="<?php echo $_SESSION['kurs'][$nrkurs]; ?>" />
							</li>
<?php
	}
} else {
?>
							<li class="kurs0" nrkurs="0">
								<input type="text" name="kurs[0]" placeholder="Nazwa kursu" />
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
				<div class="element edukacja">
					<div class="element_tytul">
						<span>Edukacja</span>
						<button type="button" class="edu_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejną</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php 
if($_SESSION['$ileedu'] > 0) {
	for($nredu = 0; $nredu < $_SESSION['$ileedu']; $nredu++) {
?>
					<div class="edu_szkola<?php echo $nredu; ?>" nredu="<?php echo $nredu; ?>">
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
					<div class="edu_szkola0" nredu="0">
						<div class="edu_okres">
							<span class="edu_odkiedy"><input class="okres" type="text" name="edu_od[0]" placeholder="od kiedy" /></span>
							<span> - </span>
							<span class="edu_dokiedy"><input class="okres" type="text" name="edu_do[0]" placeholder="do kiedy" /></span>
						</div>
						<div class="edu_opis">
							<div class="edu_miejsce">
								<span class="edu_uczelnia"><input type="text" name="edu_uczelnia[0]" placeholder="Nazwa uczelni" /></span>
								<span class="edu_kierunek"><input type="text" name="edu_kierunek[0]" placeholder="Kierunek" /></span>
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
							<input type="text" name="urodziny" placeholder="DD.MM.RRRR" value="<?php echo $_SESSION['urodziny']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
						</span>
						<span class="person_tytul">Obywatelstwo:</span>
						<span class="person_obywatelstwo">
							<input type="text" name="obywatelstwo" placeholder="Obywatelstwo" value="<?php echo $_SESSION['obywatelstwo']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
						</span>
						<span class="person_tytul">Adres:</span>
						<span class="person_adres">
							<input type="text" name="ulica" placeholder="Ulica nr" value="<?php echo $_SESSION['ulica']; ?>" />
							<input type="text" name="miasto" placeholder="XX-XXX Miejscowość" value="<?php echo $_SESSION['miasto']; ?>" />
							<input type="text" name="kraj" placeholder="Kraj" value="<?php echo $_SESSION['kraj']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
						</span>
						<span class="person_tytul">Telefon:</span>
						<span class="person_telefon">
							<input type="text" name="telefon" placeholder="Nr telefonu" value="<?php echo $_SESSION['telefon']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
						</span>
						<span class="person_tytul">E-mail:</span>
						<span class="email">
							<input type="text" name="mail" placeholder="Adres e-mail" value="<?php echo $_SESSION['mail']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
						</span>
						<span class="person_tytul">WWW:</span>
						<span class="person_www">
							<input type="text" name="strona" placeholder="Strona WWW" value="<?php echo $_SESSION['strona']; ?>" />
							<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
						</span>
					</div>
				</div>
				<div class="element jezyki">
					<div class="element_tytul">
						<span>Języki</span>
						<button type="button" class="jezyk_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php 
if($_SESSION['$ilejez'] > 0) {
	for($nrjez = 0; $nrjez < $_SESSION['$ilejez']; $nrjez++) {
?>	
					<div class="jezyk<?php echo $nrjez; ?>" nrjez="<?php echo $nrjez; ?>">
						<span class="jezyk_tytul"><input type="text" name="jezyk_tytul[<?php echo $nrjez; ?>]" placeholder="Język" value="<?php echo $_SESSION['jezyk_tytul'][$nrjez]; ?>" /></span>
						<span class="jezyk_poziom"><input type="text" name="jezyk_poziom[<?php echo $nrjez; ?>]" placeholder="Poziom" value="<?php echo $_SESSION['jezyk_poziom'][$nrjez]; ?>" /></span>
					</div>
<?php 
	}
} else {
?>
					<div class="jezyk0" nrjez="0">
						<span class="jezyk_tytul"><input type="text" name="jezyk_tytul[0]" placeholder="Język" /></span>
						<span class="jezyk_poziom"><input type="text" name="jezyk_poziom[0]" placeholder="Poziom" /></span>
					</div>
<?php } ?>
				</div>
				<div class="element portale">
					<div class="element_tytul">
						<span>Portale społecznościowe</span>
						<button type="button" class="portal_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejny</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
<?php  
if($_SESSION['$ileport'] > 0) {
	for($nrport = 0; $nrport < $_SESSION['$ileport']; $nrport++) {
?>	
					<div class="portal<?php echo $nrport; ?>" nrport="<?php echo $nrport; ?>">
						<span class="portal_tytul"><input type="text" name="portal_tytul[<?php echo $nrport; ?>]" placeholder="Nazwa portalu" value="<?php echo $_SESSION['portal_tytul'][$nrport]; ?>" /></span>
						<span class="portal_adres"><input type="text" name="portal_adres[<?php echo $nrport; ?>]" placeholder="Adress www do profilu" value="<?php echo $_SESSION['portal_adres'][$nrport]; ?>" /></span>
					</div>
<?php
	}
} else {
?>
					<div class="portal0" nrport="0">
						<span class="portal_tytul"><input type="text" name="portal_tytul[0]" placeholder="Nazwa portalu" /></span>
						<span class="portal_adres"><input type="text" name="portal_adres[0]" placeholder="Adress www do profilu" /></span>
					</div>
<?php } ?>
				</div>
				<div class="element zainteresowania">
					<div class="element_tytul">
						<span>Zainteresowania</span>
						<button type="button" class="interes_dodaj tooltip-act" tool=".dodaj_pozycje">Dodaj kolejne</button>
						<button type="button" class="usun_element tooltip-act" tool=".usun_element_opis-u" status="u">Usuń element</button>
					</div>
					<div class="interes">
						<ul>
<?php 
if($_SESSION['$ileint'] > 0) {
	for($nrint = 0; $nrint < $_SESSION['$ileint']; $nrint++) {
?>
							<li class="interes<?php echo $nrint; ?>" nrint="<?php echo $nrint; ?>">
								<input type="text" name="interes[<?php echo $nrint; ?>]" placeholder="Zainteresowanie" value="<?php echo $_SESSION['interes'][$nrint]; ?>" />
							</li>
<?php
	}
} else {
?>
							<li class="interes0" nrint="0">
								<input type="text" name="interes[0]" placeholder="Zainteresowanie" />
							</li>
<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div id="klauzula">
				<span>
					<textarea name="klauzula" placeholder="Klauzula o ochronie danych osobowych"><?php echo $_SESSION['klauzula']; ?></textarea>
					<button type="button" class="usun_pole tooltip-act" tool=".usun_pole_opis-u" status="u">X</button>
				</span>
			</div>
			<input class="tooltip-act" tool=".wyslij_form" type="submit" value="Wyświetl" />
			<input class="tooltip-act" tool=".wyczysc_form" type="reset" value="Wyczyść formularz" />
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