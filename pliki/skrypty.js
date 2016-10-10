$(document).ready(function () {

//---DOSWIADCZENIE---
	
	//dodawanie kolejnego doswiadczenia
	var exp = $(".doswiadczenie > div:last-child").attr("nrpracy");
	$(".praca_dodaj").on("click", function () {
		var nowaPraca = $(".dosw_praca0").clone();
		exp++;
		nowaPraca.attr("class", "dosw_praca"+exp);
		nowaPraca.attr("nrpracy", exp);
		nowaPraca.find("input[name='praca_od[0]']").attr("name", "praca_od["+exp+"]");
		nowaPraca.find("input[name='praca_do[0]']").attr("name", "praca_do["+exp+"]");
		nowaPraca.find("input[name='pracodawca[0]']").attr("name", "pracodawca["+exp+"]");
		nowaPraca.find("input[name='stanowisko[0]']").attr("name", "stanowisko["+exp+"]");
		nowaPraca.find("input[name='obowiazki[0]']").attr("name", "obowiazki["+exp+"]");
		nowaPraca.find("input[name='osiagniecia[0]']").attr("name", "osiagniecia["+exp+"]");
		nowaPraca.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowaPraca.appendTo(".doswiadczenie");
		$(".dosw_praca"+(exp-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego doswiadczenia
	$(".doswiadczenie").on("click", ".usun", function () {
		$(this).parent().remove();
		exp--;
		if (exp > 0) {
			$(".dosw_praca"+exp).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	
	
//---PROJEKTY---
	
	//dodawanie kolejnego projektu
	var proj = $(".proj ul > li:last-child").attr("nrproj");
	$(".projekt_dodaj").on("click", function () {
		var nowyProjekt = $(".projekt0").clone();
		proj++;
		nowyProjekt.attr("class", "projekt"+proj);
		nowyProjekt.attr("nrproj", proj);
		nowyProjekt.find("input[name='proj_adres[0]']").attr("name", "proj_adres["+proj+"]");
		nowyProjekt.find("input[name='proj_opis[0]']").attr("name", "proj_opis["+proj+"]");
		nowyProjekt.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowyProjekt.appendTo(".proj ul");
		$(".projekt"+(proj-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego projektu
	$(".projekty").on("click", ".usun", function () {
		$(this).parent().remove();
		proj--;
		if (proj > 0) {
			$(".projekt"+proj).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	
	
//---UMIEJĘTNOŚCI---
	
	//dodawanie kolejnej umiejętności
	var skil = $(".umiej ul >li:last-child").attr("nrumiej");
	$(".umiej_dodaj").on("click", function () {
		var nowaUmiej = $(".umiej0").clone();
		skil++;
		nowaUmiej.attr("class", "umiej"+skil);
		nowaUmiej.attr("nrumiej", skil);
		nowaUmiej.find("input[name='umiej_nazwa[0]']").attr("name", "umiej_nazwa["+skil+"]");
		nowaUmiej.find("input[name='umiej_poziom[0]']").attr("name", "umiej_poziom["+skil+"]");
		nowaUmiej.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowaUmiej.appendTo(".umiej ul");
		$(".umiej"+(skil-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnej umiejętności
	$(".umiejetnosci").on("click", ".usun", function () {
		$(this).parent().remove();
		skil--;
		if (skil > 0) {
			$(".umiej"+skil).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	
	
//---KURSY---
	
	//dodawanie kolejnego kursu
	var kur = $(".kurs ul > li:last-child").attr("nrkurs");
	$(".kurs_dodaj").on("click", function () {
		var nowyKurs = $(".kurs0").clone();
		kur++;
		nowyKurs.attr("class", "kurs"+kur);
		nowyKurs.attr("nrkurs", kur);
		nowyKurs.find("input[name='kurs[0]']").attr("name", "kurs["+kur+"]");
		nowyKurs.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowyKurs.appendTo(".kurs ul");
		$(".kurs"+(kur-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego kursu
	$(".kursy").on("click", ".usun", function () {
		$(this).parent().remove();
		kur--;
		if (kur > 0) {
			$(".kurs"+kur).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	
	
//---EDUKACJA---
	
	//dodawanie kolejnej szkoły
	var edu = $(".edukacja > div:last-child").attr("nredu");
	$(".edu_dodaj").on("click", function () {
		var nowaSzkola = $(".edu_szkola0").clone();
		edu++;
		nowaSzkola.attr("class", "edu_szkola"+edu);
		nowaSzkola.attr("nredu", edu);
		nowaSzkola.find("input[name='edu_od[0]']").attr("name", "edu_od["+edu+"]");
		nowaSzkola.find("input[name='edu_do[0]']").attr("name", "edu_do["+edu+"]");
		nowaSzkola.find("input[name='edu_uczelnia[0]']").attr("name", "edu_uczelnia["+edu+"]");
		nowaSzkola.find("input[name='edu_kierunek[0]']").attr("name", "edu_kierunek["+edu+"]");
		nowaSzkola.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowaSzkola.appendTo(".edukacja");
		$(".edu_szkola"+(edu-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnej szkoły
	$(".edukacja").on("click", ".usun", function () {
		$(this).parent().remove();
		edu--;
		if (edu > 0) {
		 $(".edu_szkola"+edu).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	
	
//---JEZYKI---
	
	//dodawanie kolejnego jezyka
	var jez = $(".jezyki > div:last-child").attr("nrjez");
	$(".jezyk_dodaj").on("click", function () {
		var nowyJezyk = $(".jezyk0").clone();
		jez++;
		nowyJezyk.attr("class", "jezyk"+jez);
		nowyJezyk.attr("nrjez", jez);
		nowyJezyk.find("input[name='jezyk_tytul[0]']").attr("name", "jezyk_tytul["+jez+"]");
		nowyJezyk.find("input[name='jezyk_poziom[0]']").attr("name", "jezyk_poziom["+jez+"]");
		nowyJezyk.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowyJezyk.appendTo(".jezyki");
		$(".jezyk"+(jez-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego jezyka
	$(".jezyki").on("click", ".usun", function () {
		$(this).parent().remove();
		jez--;
		if (jez > 0) {
			$(".jezyk"+jez).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});


//---PORTALE---
	
	//dodawanie kolejnego portalu
	var por = $(".portale > div:last-child").attr("nrport");
	$(".portal_dodaj").on("click", function () {
		var nowyPortal = $(".portal0").clone();
		por++;
		nowyPortal.attr("class", "portal"+por);
		nowyPortal.attr("nrport", por);
		nowyPortal.find("input[name='portal_tytul[0]']").attr("name", "portal_tytul["+por+"]");
		nowyPortal.find("input[name='portal_adres[0]']").attr("name", "portal_adres["+por+"]");
		nowyPortal.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowyPortal.appendTo(".portale");
		$(".portal"+(por-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego portalu
	$(".portale").on("click", ".usun", function () {
		$(this).parent().remove();
		por--;
		if (por > 0) {
			$(".portal"+por).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	
	
//---ZAINTERESOWANIA---
	
	//dodawanie kolejnego zainteresowania
	var zaint = $(".interes ul > li:last-child").attr("nrint");
	$(".interes_dodaj").on("click", function () {
		var nowyInteres = $(".interes0").clone();
		zaint++;
		nowyInteres.attr("class", "interes"+zaint);
		nowyInteres.attr("nrint", zaint);
		nowyInteres.find("input[name='interes[0]']").attr("name", "interes["+zaint+"]");
		nowyInteres.prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		nowyInteres.appendTo(".interes ul");
		$(".interes"+(zaint-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego zainteresowania
	$(".zainteresowania").on("click", ".usun", function () {
		$(this).parent().remove();
		zaint--;
		if (zaint > 0) {
			$(".interes"+zaint).prepend("<button class='usun tooltip-act' tool='.usun_pozycje' type='button'>X</button>");
		}
		$(".tooltip").hide();
	});
	

//---USUWANIE/PRZYWRACANIE PÓL FORMULARZA---

	var status = "";

	//usuwanie/przwyracanie elementu wielopolowego
	$(".element").on("click", ".usun_element", function () {
		status = $(this).attr("status");
		if (status == "u") {
			$(this).parents(".element").find(".element_tytul span").css("text-decoration", "line-through");
			$(this).parent().siblings().hide();
			$(this).siblings("button").hide();
			$(this).text("Przywróć element");
			$(this).attr("status", "p");
			$(this).attr("tool", ".usun_element_opis-p");
		} else {
			$(this).parents(".element").find(".element_tytul span").css("text-decoration", "none");
			$(this).parent().siblings().show();
			$(this).siblings("button").show();
			$(this).text("Usuń element");
			$(this).attr("status", "u");
			$(this).attr("tool", ".usun_element_opis-u");
		}
	});
	
	//usuwanie/przwyracanie pojedynczego pola
	$("span").on("click", ".usun_pole", function () {
		status = $(this).attr("status");
		if (status == "u") {
			$(this).siblings().attr("readonly", "readonly").css("text-decoration", "line-through");
			$(this).text("+");
			$(this).attr("status", "p");
			$(this).attr("tool", ".usun_pole_opis-p");
		} else {
			$(this).siblings().removeAttr("readonly").css("text-decoration", "none");
			$(this).text("X");
			$(this).attr("status", "u");
			$(this).attr("tool", ".usun_pole_opis-u");
		}
	});
	
	//tooltip z opisem przycisków
	$("#kontener").on("mouseenter", ".tooltip-act", function (event) {
		tool=$(this).attr("tool");
		$(tool).css("bottom", $(window).height() - event.pageY + 5).css("left", event.pageX + 5);
		$(tool).show();
	}).on("mouseleave", ".tooltip-act", function () {
		$(tool).hide();
	}).on("click", ".tooltip-act", function () {
		$(".tooltip").hide();
	});
	
});