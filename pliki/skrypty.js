$(document).ready(function () {

//---DOSWIADCZENIE---
	
	//dodawanie kolejnego doswiadczenia
	var exp = 0;
	$(".praca_dodaj").on("click", function () {
		var nowaPraca = $(".dosw_praca0").clone();
		exp++;
		nowaPraca.attr("class", "dosw_praca"+exp);
		nowaPraca.find("input[name='praca_od[0]']").attr("name", "praca_od["+exp+"]");
		nowaPraca.find("input[name='praca_do[0]']").attr("name", "praca_do["+exp+"]");
		nowaPraca.find("input[name='pracodawca[0]']").attr("name", "pracodawca["+exp+"]");
		nowaPraca.find("input[name='stanowisko[0]']").attr("name", "stanowisko["+exp+"]");
		nowaPraca.find("input[name='obowiazki[0]']").attr("name", "obowiazki["+exp+"]");
		nowaPraca.find("input[name='osiagniecia[0]']").attr("name", "osiagniecia["+exp+"]");
		nowaPraca.prepend("<input class='usun' type='button' value='Usuń' />");
		nowaPraca.appendTo(".doswiadczenie");
		$(".dosw_praca"+(exp-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego doswiadczenia
	$(".doswiadczenie").on("click", ".usun", function () {
		$(this).parent().remove();
		exp--;
		if (exp > 0) {
			$(".dosw_praca"+exp).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	
	
//---PROJEKTY---
	
	//dodawanie kolejnego projektu
	var proj = 0;
	$(".projekt_dodaj").on("click", function () {
		var nowyProjekt = $(".projekt0").clone();
		proj++;
		nowyProjekt.attr("class", "projekt"+proj);
		nowyProjekt.find("input[name='proj_adres[0]']").attr("name", "proj_adres["+proj+"]");
		nowyProjekt.find("input[name='proj_opis[0]']").attr("name", "proj_opis["+proj+"]");
		nowyProjekt.prepend("<input class='usun' type='button' value='Usuń' />");
		nowyProjekt.appendTo(".proj ul");
		$(".projekt"+(proj-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego projektu
	$(".projekty").on("click", ".usun", function () {
		$(this).parent().remove();
		proj--;
		if (proj > 0) {
			$(".projekt"+proj).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	
	
//---UMIEJĘTNOŚCI---
	
	//dodawanie kolejnej umiejętności
	var skil = 0;
	$(".umiej_dodaj").on("click", function () {
		var nowaUmiej = $(".umiej0").clone();
		skil++;
		nowaUmiej.attr("class", "umiej"+skil);
		nowaUmiej.find("input[name='umiej_nazwa[0]']").attr("name", "umiej_nazwa["+skil+"]");
		nowaUmiej.find("input[name='umiej_poziom[0]']").attr("name", "umiej_poziom["+skil+"]");
		nowaUmiej.prepend("<input class='usun' type='button' value='Usuń' />");
		nowaUmiej.appendTo(".umiej ul");
		$(".umiej"+(skil-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnej umiejętności
	$(".umiejetnosci").on("click", ".usun", function () {
		$(this).parent().remove();
		skil--;
		if (skil > 0) {
			$(".umiej"+skil).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	
	
//---KURSY---
	
	//dodawanie kolejnego kursu
	var kur = 0;
	$(".kurs_dodaj").on("click", function () {
		var nowyKurs = $(".kurs0").clone();
		kur++;
		nowyKurs.attr("class", "kurs"+kur);
		nowyKurs.find("input[name='kurs[0]']").attr("name", "kurs["+kur+"]");
		nowyKurs.prepend("<input class='usun' type='button' value='Usuń' />");
		nowyKurs.appendTo(".kurs ul");
		$(".kurs"+(kur-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego kursu
	$(".kursy").on("click", ".usun", function () {
		$(this).parent().remove();
		kur--;
		if (kur > 0) {
			$(".kurs"+kur).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	
	
//---EDUKACJA---
	
	//dodawanie kolejnej szkoły
	var edu = 0;
	$(".edu_dodaj").on("click", function () {
		var nowaSzkola = $(".edu_szkola0").clone();
		edu++;
		nowaSzkola.attr("class", "edu_szkola"+edu);
		nowaSzkola.find("input[name='edu_od[0]']").attr("name", "edu_od["+edu+"]");
		nowaSzkola.find("input[name='edu_do[0]']").attr("name", "edu_do["+edu+"]");
		nowaSzkola.find("input[name='edu_uczelnia[0]']").attr("name", "edu_uczelnia["+edu+"]");
		nowaSzkola.find("input[name='edu_kierunek[0]']").attr("name", "edu_kierunek["+edu+"]");
		nowaSzkola.prepend("<input class='usun' type='button' value='Usuń' />");
		nowaSzkola.appendTo(".edukacja");
		$(".edu_szkola"+(edu-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnej szkoły
	$(".edukacja").on("click", ".usun", function () {
		$(this).parent().remove();
		edu--;
		if (edu > 0) {
		 $(".edu_szkola"+edu).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	
	
//---JEZYKI---
	
	//dodawanie kolejnego jezyka
	var jez = 0;
	$(".jezyk_dodaj").on("click", function () {
		var nowyJezyk = $(".jezyk0").clone();
		jez++;
		nowyJezyk.attr("class", "jezyk"+jez);
		nowyJezyk.find("input[name='jezyk_tytul[0]']").attr("name", "jezyk_tytul["+jez+"]");
		nowyJezyk.find("input[name='jezyk_poziom[0]']").attr("name", "jezyk_poziom["+jez+"]");
		nowyJezyk.prepend("<input class='usun' type='button' value='Usuń' />");
		nowyJezyk.appendTo(".jezyki");
		$(".jezyk"+(jez-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego jezyka
	$(".jezyki").on("click", ".usun", function () {
		$(this).parent().remove();
		jez--;
		if (jez > 0) {
			$(".jezyk"+jez).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});


//---PORTALE---
	
	//dodawanie kolejnego portalu
	var por = 0;
	$(".portal_dodaj").on("click", function () {
		var nowyPortal = $(".portal0").clone();
		por++;
		nowyPortal.attr("class", "portal"+por);
		nowyPortal.find("input[name='portal_tytul[0]']").attr("name", "portal_tytul["+por+"]");
		nowyPortal.find("input[name='portal_adres[0]']").attr("name", "portal_adres["+por+"]");
		nowyPortal.prepend("<input class='usun' type='button' value='Usuń' />");
		nowyPortal.appendTo(".portale");
		$(".portal"+(por-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego portalu
	$(".portale").on("click", ".usun", function () {
		$(this).parent().remove();
		por--;
		if (por > 0) {
			$(".portal"+por).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	
	
//---ZAINTERESOWANIA---
	
	//dodawanie kolejnego zainteresowania
	var zaint = 0;
	$(".interes_dodaj").on("click", function () {
		var nowyInteres = $(".interes0").clone();
		zaint++;
		nowyInteres.attr("class", "interes"+zaint);
		nowyInteres.find("input[name='interes[0]']").attr("name", "interes["+zaint+"]");
		nowyInteres.prepend("<input class='usun' type='button' value='Usuń' />");
		nowyInteres.appendTo(".interes ul");
		$(".interes"+(zaint-1)).find(".usun").remove();
	});
	
	//usuwanie niepotrzebnego zainteresowania
	$(".zainteresowania").on("click", ".usun", function () {
		$(this).parent().remove();
		zaint--;
		if (zaint > 0) {
			$(".interes"+zaint).prepend("<input class='usun' type='button' value='Usuń' />");
		}
	});
	

//---USUWANIE/PRZYWRACANIE PÓL FORMULARZA---

	var status = "";

	//usuwanie/przwyracanie elementu wielopolowego
	$(".element").on("click", ".usun_element", function () {
		status = $(this).attr("status");
		if (status == "u") {
			$(this).parents(".element").find("input").attr("disabled", "disabled");
			$(this).parents(".element").find(".element_tytul span").css("text-decoration", "line-through");
			$(this).parent().siblings().hide();
			$(this).siblings("button").hide();
			$(this).text("Przywróć element");
			$(this).attr("status", "p");
		} else {
			$(this).parents(".element").find("input").removeAttr("disabled");
			$(this).parents(".element").find(".element_tytul span").css("text-decoration", "none");
			$(this).parent().siblings().show();
			$(this).siblings("button").show();
			$(this).text("Usuń element");
			$(this).attr("status", "u");
		}
	});
	
	//usuwanie/przwyracanie pojedynczego pola
	$("span").on("click", ".usun_pole", function () {
		status = $(this).attr("status");
		if (status == "u") {
			$(this).siblings().attr("disabled", "disabled").css("text-decoration", "line-through");
			$(this).text("Przywróć pole");
			$(this).attr("status", "p");
		} else {
			$(this).siblings().removeAttr("disabled").css("text-decoration", "none");
			$(this).text("Usuń pole");
			$(this).attr("status", "u");
		}
	});
	
});