var base_url = window.location.toString();
var tabUrl = base_url.split("public");

$(function () {
    $("#accordionsssss").accordion();
});
$(function () {
    $("#accordionssssssssss").accordion();
});
$(function () {
    $("#accordionssss").accordion();
});

$(function () {
    $("#accordions_resultat").accordion();
    $("#accordions_demande").accordion();
    $("#accordionsss").accordion();
});

$(function () {
    $("#accordionss").accordion();
});

$(function () {
    $("#accordions").accordion();
});


function supprimer_dernier_caractere(elm) {
    var val = $(elm).val();
    var cursorPos = elm.selectionStart;
    $(elm).val(
        val.substr(0, cursorPos - 1) + // before cursor - 1
        val.substr(cursorPos, val.length) // after cursor
    );
    elm.selectionStart = cursorPos - 1; // replace the cursor at the right place
    elm.selectionEnd = cursorPos - 1;
}

$(function () {
    /***** Fonction Controle de saisie TEMPERATURE *****/
    $('body').delegate('input.duree_traitement_ord', 'keyup', function () {

        if (!$(this).val().match(/^[0-9]{0,3}$/)) // 0-9 avec deux chiffres uniquement
            supprimer_dernier_caractere(this);
    });
});
/*** FIN ***/

//********************* ANALYSE MORPHOLOGIQUE *****************************
//********************* ANALYSE MORPHOLOGIQUE *****************************
$(function () {
    var radio = $("#radio");
    var ecographie = $("#ecographie");
    var fibrocospie = $("#fibrocospie");
    var scanner = $("#scanner");
    var irm = $("#irm");

    //Au debut on affiche pas le bouton 

    
    $("#bouton_morpho_modifier").toggle(false);
    //Au debut on affiche le bouton valider
    $("#bouton_morpho_valider").toggle(true);

    //Au debut on desactive tous les champs
    radio.attr('readonly', false);
    ecographie.attr('readonly', false);
    fibrocospie.attr('readonly', false);
    scanner.attr('readonly', false);
    irm.attr('readonly', false);

    $("#bouton_morpho_valider").click(function () {
        radio.attr('readonly', true).css({'background': '#f8f8f8'});
        ecographie.attr('readonly', true).css({'background': '#f8f8f8'});
        fibrocospie.attr('readonly', true).css({'background': '#f8f8f8'});
        scanner.attr('readonly', true).css({'background': '#f8f8f8'});
        irm.attr('readonly', true).css({'background': '#f8f8f8'});

        $("#bouton_morpho_modifier").toggle(true);
        $("#bouton_morpho_valider").toggle(false);
        return false;
    });

    $("#bouton_morpho_modifier").click(function () {
        radio.attr('readonly', false).css({'background': '#fff'});
        ecographie.attr('readonly', false).css({'background': '#fff'});
        fibrocospie.attr('readonly', false).css({'background': '#fff'});
        scanner.attr('readonly', false).css({'background': '#fff'});
        irm.attr('readonly', false).css({'background': '#fff'});

        $("#bouton_morpho_modifier").toggle(false);
        $("#bouton_morpho_valider").toggle(true);
        return false;
    });

})


//********************* TRAITEMENTS CHIRURGICAUX *****************************
//********************* TRAITEMENTS CHIRURGICAUX *****************************
//********************* TRAITEMENTS CHIRURGICAUX *****************************
$(function () {
    var diagnostic_traitement_chirurgical = $("#diagnostic_traitement_chirurgical");
    var intervention_prevue = $("#intervention_prevue");
    var observation = $("#observation");

    $("#chirurgical1").click(function () {
        diagnostic_traitement_chirurgical.attr('readonly', true).css({'background': '#f8f8f8'});
        intervention_prevue.attr('readonly', true).css({'background': '#f8f8f8'});
        observation.attr('readonly', true).css({'background': '#f8f8f8'});

        $("#bouton_chirurgical_modifier").toggle(true);
        $("#bouton_chirurgical_valider").toggle(false);
    });

    //Au debut on affiche pas le bouton modifier, on l'affiche seulement apres impression
    $("#bouton_chirurgical_modifier").toggle(false);
    //Au debut on affiche le bouton valider
    $("#bouton_chirurgical_valider").toggle(true);

    //Au debut on desactive tous les champs
    diagnostic_traitement_chirurgical.attr('readonly', false).css({'background': '#fff'});
    intervention_prevue.attr('readonly', false).css({'background': '#fff'});
    observation.attr('readonly', false).css({'background': '#fff'});

    $("#bouton_chirurgical_valider").click(function () {
        diagnostic_traitement_chirurgical.attr('readonly', true).css({'background': '#f8f8f8'});
        intervention_prevue.attr('readonly', true).css({'background': '#f8f8f8'});
        observation.attr('readonly', true).css({'background': '#f8f8f8'});

        $("#bouton_chirurgical_modifier").toggle(true);
        $("#bouton_chirurgical_valider").toggle(false);

        $("#annuler_traitement_chirurgical").attr('disabled', true);
        return false;
    });

    $("#bouton_chirurgical_modifier").click(function () {
        diagnostic_traitement_chirurgical.attr('readonly', false).css({'background': '#fff'});
        intervention_prevue.attr('readonly', false).css({'background': '#fff'});
        observation.attr('readonly', false).css({'background': '#fff'});

        $("#bouton_chirurgical_modifier").toggle(false);
        $("#bouton_chirurgical_valider").toggle(true);

        $("#annuler_traitement_chirurgical").attr('disabled', false);
        return false;
    });

});

//********************* TRAITEMENTS INSTRUMENTAUX *****************************
//********************* TRAITEMENTS INSTRUMENTAUX *****************************
//********************* TRAITEMENTS INSTRUMENTAUX *****************************
$(function () {
	var endoscopieInterventionnelle = $("#endoscopieInterventionnelle");
	var radiologieInterventionnelle = $("#radiologieInterventionnelle");
	var cardiologieInterventionnelle = $("#cardiologieInterventionnelle"); 
	var autresIntervention = $("#autresIntervention");
	
	$("#chirurgicalImpression").click(function(){
		endoscopieInterventionnelle.attr( 'readonly', true).css({'background':'#f8f8f8'});
		radiologieInterventionnelle.attr( 'readonly', true).css({'background':'#f8f8f8'});
		autresIntervention.attr( 'readonly', true).css({'background':'#f8f8f8'});
		cardiologieInterventionnelle.attr( 'readonly', true).css({'background':'#f8f8f8'});
		
		$("#bouton_chirurgical_modifier").toggle(true);
		$("#bouton_chirurgical_valider").toggle(false);	
	});
	
	$("#bouton_instrumental_modifier").toggle(false);
	$("#bouton_instrumental_valider").toggle(true);
	
	endoscopieInterventionnelle.attr( 'readonly', false).css({'background':'#fff'});
	radiologieInterventionnelle.attr( 'readonly', false).css({'background':'#fff'});
	autresIntervention.attr( 'readonly', false).css({'background':'#fff'});
	cardiologieInterventionnelle.attr( 'readonly', false).css({'background':'#fff'});
	
	$("#bouton_instrumental_valider").click(function(){
		endoscopieInterventionnelle.attr( 'readonly', true).css({'background':'#f8f8f8'});
		radiologieInterventionnelle.attr( 'readonly', true).css({'background':'#f8f8f8'});
		autresIntervention.attr( 'readonly', true).css({'background':'#f8f8f8'});
		cardiologieInterventionnelle.attr( 'readonly', true).css({'background':'#f8f8f8'});
		
		$("#bouton_instrumental_modifier").toggle(true);
		$("#bouton_instrumental_valider").toggle(false);
		
		$('#annuler_traitement_instrumental').attr('disabled', true);
		return false;
	});
	
	$("#bouton_instrumental_modifier").click(function(){
		endoscopieInterventionnelle.attr( 'readonly', false).css({'background':'#fff'});
		radiologieInterventionnelle.attr( 'readonly', false).css({'background':'#fff'});
		autresIntervention.attr( 'readonly', false).css({'background':'#fff'});
		cardiologieInterventionnelle.attr( 'readonly', false).css({'background':'#fff'});
		
		$("#bouton_instrumental_modifier").toggle(false);
		$("#bouton_instrumental_valider").toggle(true);
		
		$('#annuler_traitement_instrumental').attr('disabled', false);
		return false;
	});
	
	
	$('#annuler_traitement_instrumental').click(function(){
		endoscopieInterventionnelle.val('');
		radiologieInterventionnelle.val('');
		autresIntervention.val('');
		cardiologieInterventionnelle.val('');
		return false;
	});
	
	
	//COMPTE RENDU OPERATOIRE CHIRURGICAL
	//COMPTE RENDU OPERATOIRE CHIRURGICAL
	$("#bouton_compte_rendu_chirurgical_valider").toggle(true);
	$("#bouton_compte_rendu_chirurgical_modifier").toggle(false);
	
	$("#bouton_compte_rendu_chirurgical_valider").click(function(){
		$("#note_compte_rendu_operatoire").attr( 'readonly', true).css({'background':'#f8f8f8'});
		
		$("#bouton_compte_rendu_chirurgical_valider").toggle(false);
		$("#bouton_compte_rendu_chirurgical_modifier").toggle(true);
		
		return false;
	});
	
	$("#bouton_compte_rendu_chirurgical_modifier").click(function(){
		$("#note_compte_rendu_operatoire").attr( 'readonly', false).css({'background':'#fff'});
		
		$("#bouton_compte_rendu_chirurgical_valider").toggle(true);
		$("#bouton_compte_rendu_chirurgical_modifier").toggle(false);
		
		return false;
	});
	
	//COMPTE RENDU OPERATOIRE INSTRUMENTAL
	//COMPTE RENDU OPERATOIRE INSTRUMENTAL
	$("#bouton_compte_rendu_instrumental_valider").toggle(true);
	$("#bouton_compte_rendu_instrumental_modifier").toggle(false);
	
	
	$("#bouton_compte_rendu_instrumental_valider").click(function(){
		$("#note_compte_rendu_operatoire_instrumental").attr( 'readonly', true).css({'background':'#f8f8f8'});
		
		$("#bouton_compte_rendu_instrumental_valider").toggle(false);
		$("#bouton_compte_rendu_instrumental_modifier").toggle(true);
		
		return false;
	});
	
	$("#bouton_compte_rendu_instrumental_modifier").click(function(){
		$("#note_compte_rendu_operatoire_instrumental").attr( 'readonly', false).css({'background':'#fff'});
		
		$("#bouton_compte_rendu_instrumental_valider").toggle(true);
		$("#bouton_compte_rendu_instrumental_modifier").toggle(false);
		
		return false;
	});
	
});

// *************Autres(Transfert/Hospitalisation/ Rendez-Vous )***************
// *************Autres(Transfert/Hospitalisation/ Rendez-Vous )***************
// *************Autres(Transfert/Hospitalisation/ Rendez-Vous )***************

// ******************* Tranfert ********************************
// ******************* Tranfert ********************************
$(function () {
    var motif_transfert = $("#motif_transfert");
    var hopital_accueil = $("#hopital_accueil");
    var service_accueil = $("#service_accueil");
//	$("#transfert").click(function(){
//		motif_transfert.attr( 'readonly', true).css({'background':'#f8f8f8'});
//		$("#hopital_accueil_tampon").val(hopital_accueil.val());
//		//hopital_accueil.attr( 'disabled', true).css({'background':'#f8f8f8'});
//		$("#service_accueil_tampon").val(service_accueil.val());
//		//service_accueil.attr( 'disabled', true).css({'background':'#f8f8f8'});
//		$("#bouton_transfert_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
//	    $("#bouton_transfert_valider").toggle(false); //on cache le bouton permettant de valider les champs
//	});

    $("bouton_valider_transfert").button();
    $("bouton_modifier_transfert").button();

    //Au debut on cache le bouton modifier et on affiche le bouton valider
    $("#bouton_transfert_valider").toggle(true);
    $("#bouton_transfert_modifier").toggle(false);

    //Au debut on desactive tous les champs
    motif_transfert.attr('readonly', false).css({'background': '#fff'});
    ;
    hopital_accueil.attr('disabled', false).css({'background': '#fff'});
    ;
    service_accueil.attr('disabled', false).css({'background': '#fff'});
    ;

    //Valider(cach�) avec le bouton 'valider'
    $("#bouton_transfert_valider").click(function () {
        motif_transfert.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le motif transfert
        $("#hopital_accueil_tampon").val(hopital_accueil.val());
        hopital_accueil.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver hopital accueil
        $("#service_accueil_tampon").val(service_accueil.val());
        service_accueil.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver service accueil
        $("#bouton_transfert_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_transfert_valider").toggle(false); //on cache le bouton permettant de valider les champs

        $("#annulertransfert").attr('disabled', true);
        return false;
    });
    //Activer(d�cach�) avec le bouton 'modifier'
    $("#bouton_transfert_modifier").click(function () {
        motif_transfert.attr('readonly', false).css({'background': '#fff'});
        hopital_accueil.attr('disabled', false).css({'background': '#fff'});
        service_accueil.attr('disabled', false).css({'background': '#fff'});
        $("#bouton_transfert_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
        $("#bouton_transfert_valider").toggle(true);    //on affiche le bouton permettant de valider les champs

        $("#annulertransfert").attr('disabled', false);
        return false;
    });
});



//********************* HOSPITALISATION *****************************
//********************* HOSPITALISATION *****************************
$(function () {
    var motif_hospitalisation = $("#motif_hospitalisation");
    var date_fin_hospitalisation = $("#date_fin_hospitalisation_prevue");
//	$("#hospitalisation").click(function(){
//		motif_hospitalisation.attr( 'disabled', true).css({'background':'#f8f8f8'});
//		date_fin_hospitalisation.attr( 'disabled', true).css({'background':'#f8f8f8'});
//		$("#bouton_hospi_modifier").toggle(true);
//		$("#bouton_hospi_valider").toggle(false);
//	});

    $("#annulerhospitalisation").click(function () {
        motif_hospitalisation.val("");
        date_fin_hospitalisation.val("");
        return false;
    });
    //Au debut on affiche pas le bouton modifier
    $("#bouton_hospi_modifier").toggle(false);
    //Au debut on affiche le bouton valider
    $("#bouton_hospi_valider").toggle(true);

    //Au debut on desactive tous les champs
    motif_hospitalisation.attr('disabled', false).css({'background': '#fff'});
    date_fin_hospitalisation.attr('disabled', false).css({'background': '#fff'});

    $("#bouton_hospi_valider").click(function () {
        motif_hospitalisation.attr('disabled', true).css({'background': '#f8f8f8'});
        date_fin_hospitalisation.attr('disabled', true).css({'background': '#f8f8f8'});
        $("#bouton_hospi_modifier").toggle(true);
        $("#bouton_hospi_valider").toggle(false);

        $("#annulerhospitalisation").attr('disabled', true);
        return false;
    });

    $("#bouton_hospi_modifier").click(function () {
        motif_hospitalisation.attr('disabled', false).css({'background': '#fff'});
        date_fin_hospitalisation.attr('disabled', false).css({'background': '#fff'});
        $("#bouton_hospi_modifier").toggle(false);
        $("#bouton_hospi_valider").toggle(true);

        $("#annulerhospitalisation").attr('disabled', false);
        return false;
    });


});

$('#date_fin_hospitalisation_prevue').datepicker(
    $.datepicker.regional['fr'] = {
        closeText: 'Fermer',
        changeYear: true,
        yearRange: 'c-80:c',
        prevText: '&#x3c;Préc',
        nextText: 'Suiv&#x3e;',
        currentText: 'Courant',
        monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun',
            'Jul', 'Aout', 'Sep', 'Oct', 'Nov', 'Dec'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        minDate: 1,
        showMonthAfterYear: false,
        yearRange: '1990:2025',
        showAnim: 'bounce',
        changeMonth: true,
        changeYear: true,
        yearSuffix: '',
    }
);
//********************* RENDEZ VOUS *****************************
//********************* RENDEZ VOUS *****************************
$(function () {
    var motif_rv = $('#motif_rv');
    var date_rv = $("#date_rv");
    var heure_rv = $("#heure_rv");
    date_rv.attr('autocomplete', 'off');
    $("#disable").click(function () {
        motif_rv.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le motif
        $("#date_rv_tampon").val(date_rv.val()); //Placer la date dans date_rv_tampon avant la desacivation
        date_rv.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver la date
        $("#heure_rv_tampon").val(heure_rv.val()); //Placer l'heure dans heure_rv_tampon avant la desacivation
        heure_rv.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver l'heure
        $("#disable_bouton").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#enable_bouton").toggle(false); //on cache le bouton permettant de valider les champs

        date_rv.val(date);
    });

    $("button").button();
    //$( "bouton_valider" ).button();

    //Au debut on affiche pas le bouton modifier, on l'affiche seulement apres impression
    $("#disable_bouton").toggle(false);
    //Au debut on affiche le bouton valider
    $("#enable_bouton").toggle(true);

    //Au debut on desactive tous les champs
    motif_rv.attr('readonly', false).css({'background': '#fff'});
    date_rv.attr('disabled', false).css({'background': '#fff'});
    heure_rv.attr('disabled', false).css({'background': '#fff'});

    //Valider(cach�) avec le bouton 'valider'
    $("#enable_bouton").click(function () {
        motif_rv.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le 
        $("#date_rv_tampon").val(date_rv.val()); //Placer la date dans date_rv_tampon avant la desacivation
        date_rv.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver la date
        $("#heure_rv_tampon").val(heure_rv.val()); //Placer l'heure dans heure_rv_tampon avant la desacivation
        heure_rv.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver l'heure
        $("#disable_bouton").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#enable_bouton").toggle(false); //on cache le bouton permettant de valider les champs

        $("#annulerrendezvous").attr('disabled', true);
        return false;
    });
    //Activer(d�cach�) avec le bouton 'modifier'
    $("#disable_bouton").click(function () {
        motif_rv.attr('readonly', false).css({'background': '#fff'});      //activer le motif
        date_rv.attr('disabled', false).css({'background': '#fff'});      //activer la date
        heure_rv.attr('disabled', false).css({'background': '#fff'});    //activer l'heure
        $("#disable_bouton").toggle(false);   //on cache le bouton permettant de modifier les champs
        $("#enable_bouton").toggle(true);    //on affiche le bouton permettant de valider les champs

        $("#annulerrendezvous").attr('disabled', false);
        return false;
    });

});







//*************Autres(Evacuation/Reference/  )***************

//*************Autres(Evacuation/Reference/  )***************

//******************* Reference ********************************
//******************* Reference ********************************
$(function () {
 var evacue_de = $("evacue_de");
 var motif_evac = $("#motif_evac");
 var service_origine = $("#service_origine");


 $("bouton_valider_evacuation").button();
 $("bouton_modifier_evacuation").button();

 //Au debut on cache le bouton modifier et on affiche le bouton valider
 $("#bouton_evacuation_valider").toggle(true);
 $("#bouton_evacuation_modifier").toggle(false);

 //Au debut on desactive tous les champs
 evacue_de.attr('readonly', false).css({'background': '#fff'});
 ;
motif_evac.attr('disabled', false).css({'background': '#fff'});
 ;
 service_origine.attr('disabled', false).css({'background': '#fff'});
 ;

 //Valider(cach�) avec le bouton 'valider'
 $("#bouton_evacuation_valider").click(function () {
     evacue_de.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le motif transfert
    // $("#hopital_accueil_tampon").val(hopital_accueil.val());
    motif_evac.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver hopital accueil
    // $("#service_accueil_tampon").val(service_accueil.val());
     service_origine.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver service accueil
     $("#bouton_evacuation_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
     $("#bouton_evacuation_valider").toggle(false); //on cache le bouton permettant de valider les champs

     //$("#annulertransfert").attr('disabled', true);
     return false;
 });
 //Activer(d�cach�) avec le bouton 'modifier'
 $("#bouton_evacuation_modifier").click(function () {
     evacue_de.attr('readonly', false).css({'background': '#fff'});
     motif_evac.attr('disabled', false).css({'background': '#fff'});
     service_origine.attr('disabled', false).css({'background': '#fff'});
     $("#bouton_evacuation_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
     $("#bouton_evacuation_valider").toggle(true);    //on affiche le bouton permettant de valider les champs

    //$("#annulertransfert").attr('disabled', false);
     return false;
 });
});



//*************Autres(Evacuation/Reference/  )***************

//******************* Evacuation CHRSL ********************************
//******************* Reference ********************************
$(function () {
var evacue_vers = $("evacue_vers");
var motif_ev_vers = $("#motif_ev_vers");
var service_acceuil_ev = $("#service_acceuil_ev");


$("bouton_valider_evac").button();
$("bouton_modifier_evac").button();

//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_evac_valider").toggle(true);
$("#bouton_evac_modifier").toggle(false);

//Au debut on desactive tous les champs
evacue_vers.attr('readonly', false).css({'background': '#fff'});
;
motif_ev_vers.attr('disabled', false).css({'background': '#fff'});
;
service_acceuil_ev.attr('disabled', false).css({'background': '#fff'});
;

//Valider(cach�) avec le bouton 'valider'
$("#bouton_evac_valider").click(function () {
   evacue_vers.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le motif transfert
  // $("#hopital_accueil_tampon").val(hopital_accueil.val());
  motif_ev_vers.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver hopital accueil
  // $("#service_accueil_tampon").val(service_accueil.val());
   service_acceuil_ev.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver service accueil
   $("#bouton_evac_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
   $("#bouton_evac_valider").toggle(false); //on cache le bouton permettant de valider les champs

   //$("#annulertransfert").attr('disabled', true);
   return false;
});
//Activer(d�cach�) avec le bouton 'modifier'
$("#bouton_evac_modifier").click(function () {
   evacue_vers.attr('readonly', false).css({'background': '#fff'});
   motif_ev_vers.attr('disabled', false).css({'background': '#fff'});
   service_acceuil_ev.attr('disabled', false).css({'background': '#fff'});
   $("#bouton_evac_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
   $("#bouton_evac_valider").toggle(true);    //on affiche le bouton permettant de valider les champs

  //$("#annulertransfert").attr('disabled', false);
   return false;
});
});
//********************* RENDEZ VOUS *****************************
//********************* RENDEZ VOUS *****************************
$(function () {
 var reference = $('#reference');
 var motif_ref = $("#motif_ref");
 var refere_de = $("#refere_de");
 //date_rv.attr('autocomplete', 'off');
 $("#disable").click(function () {
     reference.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le motif
     //$("#date_rv_tampon").val(date_rv.val()); //Placer la date dans date_rv_tampon avant la desacivation
     motif_ref.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver la date
     //$("#heure_rv_tampon").val(heure_rv.val()); //Placer l'heure dans heure_rv_tampon avant la desacivation
     refere_de.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver l'heure
     $("#disable_bouton_ref").toggle(true);  //on affiche le bouton permettant de modifier les champs
     $("#enable_bouton_ref").toggle(false); //on cache le bouton permettant de valider les champs

     //date_rv.val(date);
 });

 $("button_ref").button();
 //$( "bouton_valider" ).button();

 //Au debut on affiche pas le bouton modifier, on l'affiche seulement apres impression
 $("#disable_bouton_ref").toggle(false);
 //Au debut on affiche le bouton valider
 $("#enable_bouton_ref").toggle(true);

 //Au debut on desactive tous les champs
 reference.attr('readonly', false).css({'background': '#fff'});
 motif_ref.attr('disabled', false).css({'background': '#fff'});
 refere_de.attr('disabled', false).css({'background': '#fff'});

 //Valider(cach�) avec le bouton 'valider'
 $("#enable_bouton_ref").click(function () {
     motif_ref.attr('readonly', true).css({'background': '#f8f8f8'});     //d�sactiver le 
    // $("#date_rv_tampon").val(date_rv.val()); //Placer la date dans date_rv_tampon avant la desacivation
     motif_ref.attr('disabled', true).css({'background': '#f8f8f8'});     //d�sactiver la date
    // $("#heure_rv_tampon").val(heure_rv.val()); //Placer l'heure dans heure_rv_tampon avant la desacivation
     refere_de.attr('disabled', true).css({'background': '#f8f8f8'});   //d�sactiver l'heure
     $("#disable_bouton_ref").toggle(true);  //on affiche le bouton permettant de modifier les champs
     $("#enable_bouton_ref").toggle(false); //on cache le bouton permettant de valider les champs

     //$("#annulerrendezvous").attr('disabled', true);
     return false;
 });
 //Activer(d�cach�) avec le bouton 'modifier'
 $("#disable_bouton_ref").click(function () {
     reference.attr('readonly', false).css({'background': '#fff'});      //activer le motif
     motif_ref.attr('disabled', false).css({'background': '#fff'});      //activer la date
     refere_de.attr('disabled', false).css({'background': '#fff'});    //activer l'heure
     $("#disable_bouton_ref").toggle(false);   //on cache le bouton permettant de modifier les champs
     $("#enable_bouton_ref").toggle(true);    //on affiche le bouton permettant de valider les champs

     //$("#annulerrendezvous").attr('disabled', false);
     return false;
 });

});









//Boite de dialogue de confirmation d'annulation
//Boite de dialogue de confirmation d'annulation
//Boite de dialogue de confirmation d'annulation

/***BOITE DE DIALOG POUR LA CONFIRMATION DE SUPPRESSION**/
/***BOITE DE DIALOG POUR LA CONFIRMATION DE SUPPRESSION**/

var theHREF = tabUrl[0] + "public/accouchement/accoucher";
function confirmation() {

    $("#confirmation2").dialog({
        resizable: false,
        height: 170,
        width: 505,
        autoOpen: false,
        modal: true,
        buttons: {
            "Oui": function () {
                $(this).dialog("close");
                window.location.href = theHREF;
            },
            "Non": function () {
                $(this).dialog("close");
            }
        }
    });
}

$("#annuler2").click(function () {
    //event.preventDefault();
    confirmation();
    $("#confirmation2").dialog('open');

    return false;
});

var temoinHu= 0;
var temoinTaille = 0;
//var temoinPaleur = 0;
var temoinPoids = 0;
var temoinTemperature = 0;
var temoinPouls = 0;
var temoinTensionMaximale = 0;
var temoinTensionMinimale = 0;

var valid = true;  // VARIABLE GLOBALE utilis�e dans 'VALIDER LES DONNEES DU TABLEAU DES CONSTANTES'
/****** ======================================================================= *******/
/****** ======================================================================= *******/
/****** ======================================================================= *******/
/****** MASK DE SAISIE ********/
/****** MASK DE SAISIE ********/
/****** MASK DE SAISIE ********/
function maskSaisie() {
    $(function () {
        $("#pressionarterielle").mask("299/299");
        $("#glycemie_capillaire").mask("9,99");
    });



  

    $("#temperature").blur(function () {
        var valeur = $('#temperature').val();
        if (isNaN(valeur / 1) || valeur > 45 || valeur < 34 || valeur == "") {
            $("#temperature").css("border-color", "#FF0000");
            $("#erreur_temperature").fadeIn().text("Min: 34°C, Max: 45°C").css({
                "color": "#ff5b5b",
                "padding": " 0 10px 0 10px",
                "margin-top": "-18px",
                "font-size": "13px",
                "font-style": "italic"
            });
            temoinTemperature = 3;
        }
        else {
            $("#temperature").css("border-color", "");
            $("#erreur_temperature").fadeOut();
            temoinTemperature = 0;
        }
        return false;
    });


    $("#tensionmaximale").blur(function () {
        var valeur = $('#tensionmaximale').val();
        if (isNaN(valeur / 1) || valeur > 300 || valeur == "") {
            $("#tensionmaximale").css("border-color", "#FF0000");
            $("#erreur_tensionmaximale").fadeIn().text("300mmHg").css({
                "color": "#ff5b5b",
                "padding": " 0 10px 0 10px",
                "margin-top": "-18px",
                "font-size": "13px",
                "font-style": "italic"
            });
            temoinTensionMaximale = 5;
        } else {
            $("#tensionmaximale").css("border-color", "");
            $("#erreur_tensionmaximale").fadeOut();
            temoinTensionMaximale = 0;
        }
    });

    $("#tensionminimale").blur(function () {
        var valeur = $('#tensionminimale').val();
        if (isNaN(valeur / 1) || valeur > 200 || valeur == "") {
            $("#tensionminimale").css("border-color", "#FF0000");
            $("#erreur_tensionminimale").fadeIn().text("200mmHg").css({
                "color": "#ff5b5b",
                "padding": " 0 10px 0 105px",
                "margin-top": "-18px",
                "font-size": "13px",
                "font-style": "italic"
            });
            temoinTensionMinimale = 6;
        } else {
            $("#tensionminimale").css("border-color", "");
            $("#erreur_tensionminimale").fadeOut();
            temoinTensionMinimale = 0;
        }
    });
}


/****** CONTROLE APRES VALIDATION ********/
/****** CONTROLE APRES VALIDATION ********/

$("#terminer,#bouton_constantes_valider, #terminer2, #terminer3, #terminer4").click(function () {

    valid = true;
         
   
    

    if ($('#temperature').val() == "" || temoinTemperature == 3) {
        $("#temperature").css("border-color", "#FF0000");
        $("#erreur_temperature").fadeIn().text("Min: 34°C, Max: 45°C").css({
            "color": "#ff5b5b",
            "padding": " 0 10px 0 10px",
            "margin-top": "-18px",
            "font-size": "13px",
            "font-style": "italic"
        });
        valid = false;
    }
    else {
        $("#temperature").css("border-color", "");
        $("#erreur_temperature").fadeOut();
    }

//	         if( $("#pouls").val() == "" || temoinPouls == 4){
//	         	 $("#pouls").css("border-color","#FF0000");
//	             $("#erreur_pouls").fadeIn().text("Max: 150 battements").css({"color":"#ff5b5b","padding":" 0 10px 0 10px","margin-top":"-18px","font-size":"13px","font-style":"italic"});
//	             valid = false;
//	         }
//	         else{
//	         	 $("#pouls").css("border-color", "");
//	             $("#erreur_pouls").fadeOut();
//	         }

    if ($("#tensionmaximale").val() == "" || temoinTensionMaximale == 5) {
        $("#tensionmaximale").css("border-color", "#FF0000");
        $("#erreur_tensionmaximale").fadeIn().text("300mmHg").css({
            "color": "#ff5b5b",
            "padding": " 0 10px 0 10px",
            "margin-top": "-18px",
            "font-size": "13px",
            "font-style": "italic"
        });
        valid = false;
    }
    else {
        $("#tensionmaximale").css("border-color", "");
        $("#erreur_tensionmaximale").fadeOut();
    }

    if ($("#tensionminimale").val() == "" || temoinTensionMinimale == 6) {
        $("#tensionminimale").css("border-color", "#FF0000");
        $("#erreur_tensionminimale").fadeIn().text("200mmHg").css({
            "color": "#ff5b5b",
            "padding": " 0 10px 0 105px",
            "margin-top": "-18px",
            "font-size": "13px",
            "font-style": "italic"
        });
        valid = false;
    }
    else {
        $("#tensionminimale").css("border-color", "");
        $("#erreur_tensionminimale").fadeOut();
    }

    return false;
});

//-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*--*-*-*-*-*-*-*-*-*--*-*-*-*--*-*-*-*-*-**--*-**-*--**-*-*-*-*-*-*-*-*-*-*-*-*-*--**-*-*-*-*-
//Method envoi POST pour updatecomplementconsultation
//Method envoi POST pour updatecomplementconsultation
//Method envoi POST pour updatecomplementconsultation
function updateexecuterRequetePost(donnees) {
    // Le formulaire monFormulaire existe deja dans la page
       var formulaire = document.createElement("form");

    formulaire.setAttribute("action", tabUrl[0] + "public/accouchement/update-complement-accouchement");
    formulaire.setAttribute("method", "POST");
   
    document.body.appendChild(formulaire);
    
    for (donnee in donnees) {
        // Ajout dynamique de champs dans le formulaire
        var champ = document.createElement("input");
        champ.setAttribute("type", "hidden");
        champ.setAttribute("name", donnee);
        champ.setAttribute("value", donnees[donnee]);
        formulaire.appendChild(champ);
    }

    // Envoi de la requete
    formulaire.submit();
    // Suppression du formulaire
    document.body.removeChild(formulaire);
}

/***LORS DU CLICK SUR 'Terminer' ****/
/***LORS DU CLICK SUR 'Terminer' ****/
$("#terminer2, #terminer3").click(function () { 

    if (valid == false) {
        $('#motifsAdmissionConstanteClick').trigger('click');
        $('#constantesClick').trigger('click');
        return false;
    }

    $('#bouton_Acte_valider_demande button, #bouton_ExamenBio_valider_demande button, #bouton_morpho_valider_demande button').trigger('click');

    var donnees = new Array();
    donnees['id_cons'] = $("#id_cons").val();
    donnees['terminer'] = 'save';

    // **********-- Donnees de l'examen physique --*******
    // **********-- Donnees de l'examen physique --*******
    donnees['examen_maternite_donnee1'] = $("#examen_maternite_donnee1").val();
    donnees['examen_maternite_donnee2'] = $("#examen_maternite_donnee2").val();
    donnees['examen_maternite_donnee3'] = $("#examen_maternite_donnee3").val();
    donnees['examen_maternite_donnee4'] = $("#examen_maternite_donnee4").val();
    donnees['examen_maternite_donnee5'] = $("#examen_maternite_donnee5").val();
    donnees['examen_maternite_donnee6'] = $("#examen_maternite_donnee6").val();
    donnees['examen_maternite_donnee7'] = $("#examen_maternite_donnee7").val();
    donnees['examen_maternite_donnee8'] = $("#examen_maternite_donnee8").val();
    donnees['examen_maternite_donnee9'] = $("#examen_maternite_donnee9").val();
    donnees['examen_maternite_donnee10'] = $("#examen_maternite_donnee10").val();
    donnees['examen_maternite_donnee11'] = $("#examen_maternite_donnee11").val(); 
    donnees['note_tv'] = $("#note_tv").val();
    donnees['note_hu'] = $("#note_hu").val();
    donnees['note_bdc'] = $("#note_bdc").val();
    donnees['note_la'] = $("#note_la").val();
    donnees['note_pde'] = $("#note_pde").val();
    donnees['note_presentation'] = $("#note_presentation").val();
    donnees['note_bassin'] = $("#note_bassin").val();
    
    
    
    
    //**********-- ANALYSE BIOLOGIQUE --************
    //**********-- ANALYSE BIOLOGIQUE --************
    donnees['groupe_sanguin'] = $("#groupe_sanguin").val();
    donnees['hemogramme_sanguin'] = $("#hemogramme_sanguin").val();
    donnees['bilan_hemolyse'] = $("#bilan_hemolyse").val();
    donnees['bilan_hepatique'] = $("#bilan_hepatique").val();
    donnees['bilan_renal'] = $("#bilan_renal").val();
    donnees['bilan_inflammatoire'] = $("#bilan_inflammatoire").val();

    //**********-- ANALYSE MORPHOLOGIQUE --************
    //**********-- ANALYSE MORPHOLOGIQUE --************
    donnees['radio_'] = $("#radio").val();
    donnees['ecographie_'] = $("#ecographie").val();
    donnees['fibroscopie_'] = $("#fibrocospie").val();
    donnees['scanner_'] = $("#scanner").val();
    donnees['irm_'] = $("#irm").val();

    //*********** DIAGNOSTICS ************
    //*********** DIAGNOSTICS ************
    donnees['diagnostic1'] = $("#diagnostic1").val();
    donnees['diagnostic2'] = $("#diagnostic2").val();
    donnees['diagnostic3'] = $("#diagnostic3").val();
    donnees['diagnostic4'] = $("#diagnostic4").val();
    donnees['decisions'] = $("#decisions").val();
    //*********** ORDONNACE (M�dical) ************
    //*********** ORDONNACE (M�dical) ************
    donnees['duree_traitement_ord'] = $("#duree_traitement_ord").val();

    for (var i = 1; i < 10; i++) {
        if ($("#medicament_0" + i).val()) {
            donnees['medicament_0' + i] = $("#medicament_0" + i).val();
            donnees['forme_' + i] = $("#forme_" + i).val();
            donnees['nb_medicament_' + i] = $("#nb_medicament_" + i).val();
            donnees['quantite_' + i] = $("#quantite_" + i).val();
        }
    }

    //*********** TRAITEMENTS CHIRURGICAUX ************
    //*********** TRAITEMENTS CHIRURGICAUX ************
    donnees['diagnostic_traitement_chirurgical'] = $("#diagnostic_traitement_chirurgical").val();
    donnees['intervention_prevue'] = $("#intervention_prevue").val();
    donnees['type_anesthesie_demande'] = $("#type_anesthesie_demande").val();
    donnees['numero_vpa'] = $("#numero_vpa").val();
    donnees['observation'] = $("#observation").val();
    donnees['note_compte_rendu_operatoire'] = $("#note_compte_rendu_operatoire").val();

    //*********** TRAITEMENTS INSTRUMENTAL ************
    //*********** TRAITEMENTS INSTRUMENTAL ************
    donnees['endoscopieInterventionnelle'] = $("#endoscopieInterventionnelle").val();
    donnees['radiologieInterventionnelle'] = $("#radiologieInterventionnelle").val();
    donnees['cardiologieInterventionnelle'] = $("#cardiologieInterventionnelle").val();
    donnees['autresIntervention'] = $("#autresIntervention").val();
    donnees['note_compte_rendu_operatoire_instrumental'] = $("#note_compte_rendu_operatoire_instrumental").val();


    // **********-- Rendez Vous --*******
    // **********-- Rendez Vous --*******
    donnees['id_patient'] = $("#id_patient").val();
    donnees['id_admission'] = $("#id_admission").val();
    donnees['id_grossesse'] = $("#id_grossesse").val();
    //Au cas ou l'utilisateur ne valide pas ou n'imprime pas cela veut dire que le champ n'est pas d�sactiver
    if ($("#date_rv").val()) {
        $("#date_rv_tampon").val($("#date_rv").val());
    }
    donnees['date_rv'] = $("#date_rv_tampon").val();
    donnees['motif_rv'] = $("#motif_rv").val();
    donnees['heure_rv'] = $("#heure_rv").val();

    // **********-- Hospitalisation --*******
    // **********-- Hospitalisation --*******
    //Desactivation des champs pour la recuperation des donnees
    $("#motif_hospitalisation").attr('disabled', false);
    $("#date_fin_hospitalisation_prevue").attr('disabled', false);
    donnees['motif_hospitalisation'] = $("#motif_hospitalisation").val();
    donnees['date_fin_hospitalisation_prevue'] = $("#date_fin_hospitalisation_prevue").val();

    // **********-- Transfert --*******
    // **********-- Transfert --*******
    //Au cas ou l'utilisateur ne valide pas ou n'imprime pas cela veut dire que le champ n'est pas d�sactiver
    if ($("#service_accueil").val()) {
        $("#service_accueil_tampon").val($("#service_accueil").val());
    }
    ;

    donnees['id_service'] = $("#service_accueil_tampon").val();
    donnees['med_id_personne'] = $("#id_medecin").val();
    donnees['date'] = $("#date_cons").val();
    donnees['motif_transfert'] = $("#motif_transfert").val();

    //**********-- LES MOTIFS D'ADMISSION --********
    //**********-- LES MOTIFS D'ADMISSION --********
    //**********-- LES MOTIFS D'ADMISSION --********
    donnees['motif_admission1'] = $('#motifAdmission input[name=motif_admission]:checked').val();
    if (!donnees['motif_admission1']){
        donnees['motif_admission1']=0;
    }

    donnees['motif_admission2'] = $('#BUcheckbox2 input[name=nouvelleGrossesse]:checked').val();
    if (!donnees['motif_admission2']){
        donnees['motif_admission2']=0;
    }

    //**********-- LES CONSTANTES CONSTANTES CONSTANTES --********
    //**********-- LES CONSTANTES CONSTANTES CONSTANTES --********
    //**********-- LES CONSTANTES CONSTANTES CONSTANTES --********
    //Recuperer les valeurs des champs
    //Recuperer les valeurs des champs
    
   // donnees['poids'] = $("#poids").val();
   // donnees['taille'] = $("#taille").val();
    donnees['hu'] = $("#hu").val();
    donnees['paleur'] = $("#paleur").val();
    donnees['temperature'] = $("#temperature").val();
    donnees['tensionmaximale'] = $("#tensionmaximale").val();
    donnees['tensionminimale'] = $("#tensionminimale").val();
    //donnees['pouls'] = $("#pouls").val();
    //donnees['frequence_respiratoire'] = $("#frequence_respiratoire").val();
    donnees['glycemie_capillaire'] = $("#glycemie_capillaire").val();
   
    
    
    //Antecedent type 1
    
    
    donnees['enf_viv'] = $("#enf_viv").val();
    donnees['note_enf'] = $("#note_enf").val();
    donnees['geste'] = $("#geste").val();
    donnees['note_geste'] = $("#note_geste").val();
    donnees['parite'] = $("#parite").val();
    donnees['note_parite'] = $("#note_parite").val();
    donnees['mort_ne'] = $("#mort_ne").val();
    donnees['note_mort_ne'] = $("#note_mort_ne").val();
    donnees['cesar'] = $("#cesar").val();
    donnees['note_cesar'] = $("#note_cesar").val();
    donnees['groupe_sanguins'] = $("#groupe_sanguins").val();
    donnees['rhesus'] = $("#rhesus").val();
    donnees['note_gs'] = $("#note_gs").val();
    donnees['test_emmel'] = $("#test_emmel").val();
    donnees['profil_emmel'] = $("#profil_emmel").val();
    donnees['note_emmel'] = $("#note_emmel").val();
    donnees['note_autre_em'] = $("#note_autre_em").val();
    //Antecedent type 2
    
    donnees['dystocie'] = $("#dystocie").val();
    donnees['note_dystocie'] = $("#note_dystocie").val();
    donnees['eclampsie'] = $("#eclampsie").val();
    donnees['note_eclampsie'] = $("#note_eclampsie").val();
    donnees['cycle'] = $("#regularite").val();
    donnees['quantite_regle'] = $("#quantite_regle").val();
    donnees['nb_garniture_jr'] = $("#nb_garniture_jr").val();
    donnees['note_cycle'] = $("#note_cycle").val();
    donnees['duree_cycle'] = $("#duree_cycle").val();
    donnees['regularite'] = $("#regularite").val();
    donnees['autre_go'] = $("#autre_go").val();
    donnees['note_autre'] = $("#note_autre_go").val();
    donnees['contraception'] = $("#contraception").val();
    donnees['type_contraception'] = $("#type_contraception").val();
    donnees['duree_contraception'] = $("#duree_contraception").val();
    donnees['note_contraception'] = $("#note_contraception").val();
    //grosseesse
    
    donnees['ddr'] = $("#ddr").val();
    donnees['duree_grossesse'] = $("#duree_grossesse").val();
    donnees['note_ddr'] = $("#note_ddr").val();
    donnees['nb_cpn'] = $("#nb_cpn").val();
    donnees['note_cpn'] = $("#note_cpn").val();
    donnees['bb_attendu'] = $("#bb_attendu").val();
    donnees['note_bb'] = $("#note_bb").val(); 
    donnees['nombre_bb'] = $("#nombre_bb").val();
    donnees['vat_1'] = $("#vat_1").val();
    donnees['vat_2'] = $("#vat_2").val();
    donnees['vat_3'] = $("#vat_3").val();
    donnees['note_vat'] = $("#note_vat").val();
    
    
    
    
    
    //**********--ACCOUCHEMENT --********
    //Recuperer les valeurs des champs
    donnees['type_accouchement'] = $("#type_accouchement").val();
    donnees['motif_type'] = $("#motif_type").val();
    
    
    donnees['date_accouchement'] = $("#date_accouchement").val();
    donnees['heure_accouchement'] = $("#heure_accouchement").val();
    donnees['delivrance'] = $("#delivrance").val();
    donnees['ru'] = $("#ru").val();
    donnees['hemoragie'] = $("#hemoragie").val();
    donnees['ocytocique_per'] = $("#ocytocique_per").val();
    donnees['ocytocique_post'] = $("#ocytocique_post").val();
    donnees['antibiotique'] = $("#antibiotique").val();
    donnees['anticonvulsant'] = $("#anticonvulsant").val();
    donnees['transfusion'] = $("#transfusion").val();
    donnees['observations'] = $("#observations").val();
    donnees['note_accouchement'] = $("#note_accouchement").val();
    donnees['note_delivrance'] = $("#note_delivrance").val();
    donnees['note_hemorragie'] = $("#note_hemoragie").val();
    donnees['note_ocytocique'] = $("#note_ocytocique").val();
    donnees['note_antibiotique'] = $("#note_antibiotique").val();
    donnees['note_anticonv'] = $("#note_anticonv").val();
    donnees['note_transfusion'] = $("#note_transfusion").val();
    
    
    
    //**********--ENFANT-********

    donnees['sexe'] = $("#sexe").val();
    donnees['poids'] = $("#poids").val();
    donnees['malf'] = $("#malf").val();
    donnees['cri'] = $("#cri").val();
    donnees['maintien_temp'] = $("#maintien_temp").val();
    donnees['mise_soin_precoce'] = $("#mise_soin_precoce").val();
    donnees['soin_cordon'] = $("#soin_cordon").val();
    donnees['reanimation'] = $("#reanimation").val();
    donnees['apgar_1'] = $("#apgar_1").val();
    donnees['apgar_5'] = $("#apgar_5").val();
    donnees['sat'] = $("#sat").val();
    donnees['vit_k'] = $("#vit_k").val();
    donnees['collyre'] = $("#collyre").val();
    donnees['consult_j1_j2'] = $("#consult_j1_j2").val();
    donnees['perim_cranien'] = $("#perim_cranien").val();
    donnees['perim_brachial'] = $("#perim_brachial").val();
    donnees['perim_cephalique'] = $("#perim_cephalique").val();
    donnees['note_perim'] = $("#note_perim").val();
    donnees['taille_enf'] = $("#taille_enf").val();
    
    
  //**********--DEVENU DU NOUVEAU NE-********

    donnees['viv_bien_portant'] = $("#viv_bien_portant").val();
    donnees['viv_mal_form'] = $("#viv_mal_form").val();
    donnees['malade'] = $("#malade").val();
    donnees['decede'] = $("#decede").val();
    donnees['date_dece'] = $("#date_dece").val();
    donnees['heure_dece'] = $("#heure_dece").val();
    donnees['note_viv_bien_portant'] = $("#note_viv_bien_portant").val();
    donnees['note_mal_form'] = $("#note_mal_form").val();
    donnees['note_malade'] = $("#note_malade").val();
    donnees['note_decede'] = $("#note_decede").val();
    //Evacuation et Reference
    //**********--EVACUATION et REFERENCE-********

    donnees['motif_ad'] = $("#motif_ad").val();
   // donnees['type_ad'] = $("#type_ad").val();
    donnees['motif'] = $("#motif").val();
    donnees['service_origine'] = $("#service_origine").val();
//    donnees['evacue_vers'] = $("#evacue_vers").val();
//    donnees['motif_ev_vers'] = $("#motif_ev_vers").val();
//    donnees['service_acceuil_ev'] = $("#service_acceuil_ev").val();
//    donnees['reference'] = $("#reference").val();
//    donnees['motif_ref'] = $("#motif_ref").val();
//    donnees['refere_de'] = $("#refere_de").val();
    
    //Recuperer les donnees sur les bandelettes urinaires
    //Recuperer les donnees sur les bandelettes urinaires
    donnees['albumine'] = $('#BUcheckbox input[name=albumine]:checked').val();
    if (!donnees['albumine']) {
        donnees['albumine'] = 0;
    }
    donnees['croixalbumine'] = $('#BUcheckbox input[name=croixalbumine]:checked').val();
    if (!donnees['croixalbumine']) {
        donnees['croixalbumine'] = 0;
    }

    donnees['sucre'] = $('#BUcheckbox input[name=sucre]:checked').val();
    if (!donnees['sucre']) {
        donnees['sucre'] = 0;
    }
    donnees['croixsucre'] = $('#BUcheckbox input[name=croixsucre]:checked').val();
    if (!donnees['croixsucre']) {
        donnees['croixsucre'] = 0;
    }

    donnees['corpscetonique'] = $('#BUcheckbox input[name=corpscetonique]:checked').val();
    if (!donnees['corpscetonique']) {
        donnees['corpscetonique'] = 0;
    }
    donnees['croixcorpscetonique'] = $('#BUcheckbox input[name=croixcorpscetonique]:checked').val();
    if (!donnees['croixcorpscetonique']) {
        donnees['croixcorpscetonique'] = 0;
    }
    //Recuperer les donnees sur les bandelettes urinaires
    //Recuperer les donnees sur les bandelettes urinaires
   

    //GESTION DES ANDECEDENTS
    //GESTION DES ANDECEDENTS
    //GESTION DES ANDECEDENTS
    //GESTION DES ANDECEDENTS
    //**=== ANTECEDENTS PERSONNELS
    //**=== ANTECEDENTS PERSONNELS

    //LES HABITUDES DE VIE DU PATIENTS
    /*Alcoolique*/
    donnees['AlcooliqueHV'] = $("#AlcooliqueHV:checked").val();
    if (!donnees['AlcooliqueHV']) {
        donnees['AlcooliqueHV'] = 0;
    }
    donnees['DateDebutAlcooliqueHV'] = $("#DateDebutAlcooliqueHV").val();
    donnees['DateFinAlcooliqueHV'] = $("#DateFinAlcooliqueHV").val();
    /*Fumeur*/
    donnees['FumeurHV'] = $("#FumeurHV:checked").val();
    if (!donnees['FumeurHV']) {
        donnees['FumeurHV'] = 0;
    }
    donnees['DateDebutFumeurHV'] = $("#DateDebutFumeurHV").val();
    donnees['DateFinFumeurHV'] = $("#DateFinFumeurHV").val();
    donnees['nbPaquetFumeurHV'] = $("#nbPaquetFumeurHV").val();
    /*Droguer*/
    donnees['DroguerHV'] = $("#DroguerHV:checked").val();
    if (!donnees['DroguerHV']) {
        donnees['DroguerHV'] = 0;
    }
    donnees['DateDebutDroguerHV'] = $("#DateDebutDroguerHV").val();
    donnees['DateFinDroguerHV'] = $("#DateFinDroguerHV").val();
    /*AutresHV*/
    donnees['AutresHV'] = $("#AutresHV:checked").val();
    if (!donnees['AutresHV']) {
        donnees['AutresHV'] = 0;
    }
    donnees['NoteAutresHV'] = $("#NoteAutresHV").val();

    //LES ANTECEDENTS MEDICAUX
    /*Diabete*/
    donnees['DiabeteAM'] = $("#DiabeteAM:checked").val();
    if (!donnees['DiabeteAM']) {
        donnees['DiabeteAM'] = 0;
    }
    /*Hta*/
    donnees['htaAM'] = $("#htaAM:checked").val();
    if (!donnees['htaAM']) {
        donnees['htaAM'] = 0;
    }
    /*Drepanocytose*/
    donnees['drepanocytoseAM'] = $("#drepanocytoseAM:checked").val();
    if (!donnees['drepanocytoseAM']) {
        donnees['drepanocytoseAM'] = 0;
    }
    /*Dislipid�mie*/
    donnees['dislipidemieAM'] = $("#dislipidemieAM:checked").val();
    if (!donnees['dislipidemieAM']) {
        donnees['dislipidemieAM'] = 0;
    }
    /*Asthme*/
    donnees['asthmeAM'] = $("#asthmeAM:checked").val();
    if (!donnees['asthmeAM']) {
        donnees['asthmeAM'] = 0;
    }

    /*Ajout automatique des antecedents medicaux*/
    var $nbCheckboxAM = ($('#nbCheckboxAM').val()) + 1;
    var $nbCheck = 0;
    var $ligne;
    var $reste = ( $nbCheckboxAM - 1 ) % 5;
    var $nbElement = parseInt(( $nbCheckboxAM - 1 ) / 5);
    if ($reste != 0) {
        $ligne = $nbElement + 1;
    }
    else {
        $ligne = $nbElement;
    }

    var k = 0;
    var i;
    for (var j = 1; j <= $ligne; j++) {
        for (i = 0; i < 5; i++) {
            var $champValider = $('#champValider_' + j + '_' + i + ':checked').val();
            if ($champValider == 'on') {
                donnees['champValider_' + k] = 1;
                donnees['champTitreLabel_' + k] = $('#champTitreLabel_' + j + '_' + i).val();
                k++;
                $nbCheck++;
            }
        }
        i = 0;
    }

    donnees['nbCheckboxAM'] = $nbCheck;

    //GYNECO-OBSTETRIQUE
    /*Menarche*/
    donnees['MenarcheGO'] = $("#MenarcheGO:checked").val();
    if (!donnees['MenarcheGO']) {
        donnees['MenarcheGO'] = 0;
    }
    donnees['NoteMenarcheGO'] = $("#NoteMenarcheGO").val();

    /*Enf Viv*/
    donnees['EnfVivGO'] = $("#EnfVivGO:checked").val();
    if (!donnees['EnfVivGO']) {
        donnees['EnfVivGO'] = 0;
    }
    donnees['NoteEnfVivGO'] = $("#NoteEnfVivGO").val();

    /*Eclampsie*/
    donnees['EclampsieGO'] = $("#EclampsieGO:checked").val();
    if (!donnees['EclampsieGO']) {
        donnees['EclampsieGO'] = 0;
    }
    donnees['NoteEclampsieGO'] = $("#NoteEclampsieGO").val();

    /*Cesarienne*/
    donnees['CesarienneGO'] = $("#CesarienneGO:checked").val();
    if (!donnees['CesarienneGO']) {
        donnees['CesarienneGO'] = 0;
    }
    donnees['NoteCesarienneGO'] = $("#NoteCesarienneGO").val();

    /*Mort Ne*/
    donnees['MortNeGO'] = $("#MortNeGO:checked").val();
    if (!donnees['MortNeGO']) {
        donnees['MortNeGO'] = 0;
    }
    donnees['NoteMortNeGO'] = $("#NoteMortNeGO").val();

    /*Dystocie*/
    donnees['DystocieGO'] = $("#DystocieGO:checked").val();
    if (!donnees['DystocieGO']) {
        donnees['DystocieGO'] = 0;
    }
    donnees['NoteDystocieGO'] = $("#NoteDystocieGO").val();

    /*Gestite*/
    donnees['GestiteGO'] = $("#GestiteGO:checked").val();
    if (!donnees['GestiteGO']) {
        donnees['GestiteGO'] = 0;
    }
    donnees['NoteGestiteGO'] = $("#NoteGestiteGO").val();
    /*Parite*/
    donnees['PariteGO'] = $("#PariteGO:checked").val();
    if (!donnees['PariteGO']) {
        donnees['PariteGO'] = 0;
    }
    donnees['NotePariteGO'] = $("#NotePariteGO").val();
    /*Cycle*/
    donnees['CycleGO'] = $("#CycleGO:checked").val();
    if (!donnees['CycleGO']) {
        donnees['CycleGO'] = 0;
    }
    donnees['DureeCycleGO'] = $("#DureeCycleGO").val();
    donnees['RegulariteCycleGO'] = $("#RegulariteCycleGO").val();
    donnees['DysmenorrheeCycleGO'] = $("#DysmenorrheeCycleGO").val();
    /*Autres*/
    donnees['AutresGO'] = $("#AutresGO:checked").val();
    if (!donnees['AutresGO']) {
        donnees['AutresGO'] = 0;
    }
    donnees['NoteAutresGO'] = $("#NoteAutresGO").val();

    //**=== ANTECEDENTS FAMILIAUX
    //**=== ANTECEDENTS FAMILIAUX
    donnees['DiabeteAF'] = $("#DiabeteAF:checked").val();
    if (!donnees['DiabeteAF']) {
        donnees['DiabeteAF'] = 0;
    }
    donnees['NoteDiabeteAF'] = $("#NoteDiabeteAF").val();

    donnees['DrepanocytoseAF'] = $("#DrepanocytoseAF:checked").val();
    if (!donnees['DrepanocytoseAF']) {
        donnees['DrepanocytoseAF'] = 0;
    }
    donnees['NoteDrepanocytoseAF'] = $("#NoteDrepanocytoseAF").val();

    donnees['htaAF'] = $("#htaAF:checked").val();
    if (!donnees['htaAF']) {
        donnees['htaAF'] = 0;
    }
    donnees['NoteHtaAF'] = $("#NoteHtaAF").val();

    donnees['autresAF'] = $("#autresAF:checked").val();
    if (!donnees['autresAF']) {
        donnees['autresAF'] = 0;
    }
    donnees['NoteAutresAF'] = $("#NoteAutresAF").val();

    updateexecuterRequetePost(donnees);
});

//Annuler le transfert au clic
$("#annulertransfert").click(function () {
    $("#motif_transfert").val("");
    document.getElementById('service_accueil').value = "";
    return false;
});

//Annuler le rendez-vous au clic
$("#annulerrendezvous").click(function () {
    $("#motif_rv").val("");
    $("#date_rv").val("");
    document.getElementById('heure_rv').value = "";
    return false;
});

//Annuler le traitement chirurgical au clic
$("#annuler_traitement_chirurgical").click(function () {
    $("#diagnostic_traitement_chirurgical").val("");
    $("#intervention_prevue").val("");
    $("#observation").val("");
    return false;
});

/**************************************************************************************************************/

/*======================================== MENU ANTECEDENTS MEDICAUX =========================================*/

/**************************************************************************************************************/
function AntecedentScript() {
    $(function () {
        //CONSULTATION
        //CONSULTATION
        $("#titreTableauConsultation").toggle(false);
        $("#ListeConsultationPatient").toggle(true);
        $("#ListeCons").toggle(true);
        $("#boutonTerminerConsultation").toggle(false);
        $(".pager").toggle(false);

        //HOSPITALISATION
        //HOSPITALISATION
        $("#titreTableauHospitalisation").toggle(false);
        $("#boutonTerminerHospitalisation").toggle(false);
        $("#ListeHospitalisation").toggle(false);
        $("#ListeHospi").toggle(false);


        //CONSULTATION
        //CONSULTATION
        $(".image1").click(function () {

            $("#MenuAntecedent").fadeOut(function () {
                $("#titreTableauConsultation").fadeIn("fast");
                $("#ListeConsultationPatient").fadeIn("fast");
                $("#ListeCons").fadeIn("fast");
                $("#boutonTerminerConsultation").toggle(true);
                $(".pager").toggle(true);
            });
        });

        $("#TerminerConsultation").click(function () {
            $("#boutonTerminerConsultation").fadeOut();
            $(".pager").fadeOut();
            $("#titreTableauConsultation").fadeOut();
            $("#ListeCons").fadeOut();
            $("#ListeConsultationPatient").fadeOut(function () {
                $("#MenuAntecedent").fadeIn("fast");
            });
        });

        //HOSPITALISATION
        //HOSPITALISATION
        $(".image2").click(function () {
            $("#MenuAntecedent").fadeOut(function () {
                $("#titreTableauHospitalisation").fadeIn("fast");
                $("#boutonTerminerHospitalisation").toggle(true);
                $("#ListeHospitalisation").fadeIn("fast");
                $("#ListeHospi").fadeIn("fast");
            });
        });

        $("#TerminerHospitalisation").click(function () {
            $("#boutonTerminerHospitalisation").fadeOut();
            $("#ListeHospitalisation").fadeOut();
            $("#ListeHospi").fadeOut();
            $("#titreTableauHospitalisation").fadeOut(function () {
                $("#MenuAntecedent").fadeIn("fast");
            });
        });


    });

    /*************************************************************************************************************/

    /*=================================== MENU ANTECEDENTS TERRAIN PARTICULIER ==================================*/

    /*************************************************************************************************************/

    $(function () {
        //ANTECEDENTS PERSONNELS
        //ANTECEDENTS PERSONNELS
        $("#antecedentsPersonnels").toggle(false);
        $("#AntecedentsFamiliaux").toggle(false);
        //	$("#MenuAntecedentPersonnel").toggle(false);
        $("#HabitudesDeVie").toggle(false);
        $("#AntecedentMedicaux").toggle(false);
        $("#AntecedentChirurgicaux").toggle(false);
        $("#GynecoObstetrique").toggle(false);

        //*****************************************************************
        //*****************************************************************
        //ANTECEDENTS PERSONNELS
        //ANTECEDENTS PERSONNELS
        $(".image1_TP").click(function () {
            $("#MenuTerrainParticulier").fadeOut(function () {
                $("#MenuAntecedentPersonnel").fadeIn("fast");
            });
        });

        $(".image_fleche").click(function () {
            $("#MenuAntecedentPersonnel").fadeOut(function () {
                $("#MenuTerrainParticulier").fadeIn("fast");
            });
        });

        //HABITUDES DE VIE
        //HABITUDES DE VIE
        $(".image1_AP").click(function () {
            $("#MenuAntecedentPersonnel").fadeOut(function () {
                $("#HabitudesDeVie").fadeIn("fast");
            });
        });

        $("#TerminerHabitudeDeVie").click(function () {
            $("#HabitudesDeVie").fadeOut(function () {
                $("#MenuAntecedentPersonnel").fadeIn("fast");
            });
        });

        //ANTECEDENTS MEDICAUX
        //ANTECEDENTS MEDICAUX
        $(".image2_AP").click(function () {
            $("#MenuAntecedentPersonnel").fadeOut(function () {
                $("#AntecedentMedicaux").fadeIn("fast");
            });
        });

        $("#TerminerAntecedentMedicaux").click(function () {
            $("#AntecedentMedicaux").fadeOut(function () {
                $("#MenuAntecedentPersonnel").fadeIn("fast");
            });
        });

        //ANTECEDENTS CHIRURGICAUX
        //ANTECEDENTS CHIRURGICAUX
        $(".image3_AP").click(function () {
            $("#MenuAntecedentPersonnel").fadeOut(function () {
                $("#AntecedentChirurgicaux").fadeIn("fast");
            });
        });

        $("#TerminerAntecedentChirurgicaux").click(function () {
            $("#AntecedentChirurgicaux").fadeOut(function () {
                $("#MenuAntecedentPersonnel").fadeIn("fast");
            });
        });

        //ANTECEDENTS CHIRURGICAUX
        //ANTECEDENTS CHIRURGICAUX
        $(".image4_AP").click(function () {
            $("#MenuAntecedentPersonnel").fadeOut(function () {
                $("#GynecoObstetrique").fadeIn("fast");
            });
        });

        $("#TerminerGynecoObstetrique").click(function () {
            $("#GynecoObstetrique").fadeOut(function () {
                $("#MenuAntecedentPersonnel").fadeIn("fast");
            });
        });


        //HABITUDES DE VIE TESTER SI UNE HABITUDE EST COCHEE OU PAS
        //HABITUDES DE VIE TESTER SI UNE HABITUDE EST COCHEE OU PAS
        //$("#HabitudesDeVie input[name=testHV]").attr('checked', true);

        if (temoinAlcoolique != 1) {
            $("#dateDebAlcoolique, #dateFinAlcoolique").toggle(false);
        }
        if (temoinFumeurHV != 1) {
            $("#dateDebFumeur, #dateFinFumeur, #nbPaquetJour, #nbPaquetAnnee").toggle(false);
            $('#nbPaquetFumeurHV').val("");
            $('#nbPaquetAnnee').toggle(false);
        } else {
            if (nbPaquetFumeurHV != 0) {
                var nbPaquetAnnee = nbPaquetFumeurHV * 365;
                $("#nbPaquetAnnee label").html("<span style='font-weight: bold; color: green;'>" + nbPaquetAnnee + "</span> paquets/an");
            } else {
                $('#nbPaquetFumeurHV').val("");
                $('#nbPaquetAnnee').toggle(false);
            }
        }
        if (temoinDroguerHV != 1) {
            $("#dateDebDroguer, #dateFinDroguer").toggle(false);
        }

        $("#DivNoteAutresHV").toggle(false);

        if ($('#DateDebutAlcooliqueHV').val() == '00/00/0000') {
            $('#DateDebutAlcooliqueHV').val("");
        }
        if ($('#DateFinAlcooliqueHV').val() == '00/00/0000') {
            $('#DateFinAlcooliqueHV').val("");
        }
        $('#HabitudesDeVie input[name=AlcooliqueHV]').click(function () {
            var boutons = $('#HabitudesDeVie input[name=AlcooliqueHV]');
            if (boutons[1].checked) {
                $("#dateDebAlcoolique, #dateFinAlcoolique").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#dateDebAlcoolique, #dateFinAlcoolique").toggle(false);
            }
        });

        if ($('#DateDebutFumeurHV').val() == '00/00/0000') {
            $('#DateDebutFumeurHV').val("");
        }
        if ($('#DateFinFumeurHV').val() == '00/00/0000') {
            $('#DateFinFumeurHV').val("");
        }
        $('#HabitudesDeVie input[name=FumeurHV]').click(function () {
            var boutons = $('#HabitudesDeVie input[name=FumeurHV]');
            if (boutons[1].checked) {
                $("#dateDebFumeur, #dateFinFumeur, #nbPaquetJour, #nbPaquetAnnee").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#dateDebFumeur, #dateFinFumeur, #nbPaquetJour, #nbPaquetAnnee").toggle(false);
            }
            if ($('#nbPaquetFumeurHV').val() == "") {
                $('#nbPaquetAnnee').toggle(false);
            }
        });

        $('#nbPaquetFumeurHV').keyup(function () {
            var valeur = $('#nbPaquetFumeurHV').val();
            if (isNaN(valeur / 1) || valeur > 10) {
                $('#nbPaquetFumeurHV').val("");
                valeur = null;
            }
            if (valeur) {
                var nbPaquetAnnee = valeur * 365;
                $("#nbPaquetAnnee").toggle(true);
                $("#nbPaquetAnnee label").html("<span style='font-weight: bold; color: green;'>" + nbPaquetAnnee + "</span> paquets/an");
            } else {
                $("#nbPaquetAnnee").toggle(false);
            }
        });

        if ($('#DateDebutDroguerHV').val() == '00/00/0000') {
            $('#DateDebutDroguerHV').val("");
        }
        if ($('#DateFinDroguerHV').val() == '00/00/0000') {
            $('#DateFinDroguerHV').val("");
        }
        $('#HabitudesDeVie input[name=DroguerHV]').click(function () {
            var boutons = $('#HabitudesDeVie input[name=DroguerHV]');
            if (boutons[1].checked) {
                $("#dateDebDroguer, #dateFinDroguer").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#dateDebDroguer, #dateFinDroguer").toggle(false);
            }
        });

        $('#HabitudesDeVie input[name=AutresHV]').click(function () {
            var boutons = $('#HabitudesDeVie input[name=AutresHV]');
            if (boutons[1].checked) {
                $("#DivNoteAutresHV").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#DivNoteAutresHV").toggle(false);
            }
        });

        //ANTECEDENTS MEDICAUX TESTER SI C'EST COCHE
        //ANTECEDENTS MEDICAUX TESTER SI C'EST COCHE
        if (temoinDiabeteAM != 1) {
            $(".imageValiderDiabeteAM").toggle(false);
        }
        if (temoinhtaAM != 1) {
            $(".imageValiderHtaAM").toggle(false);
        }
        if (temoindrepanocytoseAM != 1) {
            $(".imageValiderDrepanocytoseAM").toggle(false);
        }
        if (temoindislipidemieAM != 1) {
            $(".imageValiderDislipidemieAM").toggle(false);
        }
        if (temoinasthmeAM != 1) {
            $(".imageValiderAsthmeAM").toggle(false);
        }

        $('#AntecedentMedicaux input[name=DiabeteAM]').click(function () {
            var boutons = $('#AntecedentMedicaux input[name=DiabeteAM]');
            if (boutons[1].checked) {
                $(".imageValiderDiabeteAM").toggle(true);
            }
            if (!boutons[1].checked) {
                $(".imageValiderDiabeteAM").toggle(false);
            }
        });

        $('#AntecedentMedicaux input[name=htaAM]').click(function () {
            var boutons = $('#AntecedentMedicaux input[name=htaAM]');
            if (boutons[1].checked) {
                $(".imageValiderHtaAM").toggle(true);
            }
            if (!boutons[1].checked) {
                $(".imageValiderHtaAM").toggle(false);
            }
        });

        $('#AntecedentMedicaux input[name=drepanocytoseAM]').click(function () {
            var boutons = $('#AntecedentMedicaux input[name=drepanocytoseAM]');
            if (boutons[1].checked) {
                $(".imageValiderDrepanocytoseAM").toggle(true);
            }
            if (!boutons[1].checked) {
                $(".imageValiderDrepanocytoseAM").toggle(false);
            }
        });

        $('#AntecedentMedicaux input[name=dislipidemieAM]').click(function () {
            var boutons = $('#AntecedentMedicaux input[name=dislipidemieAM]');
            if (boutons[1].checked) {
                $(".imageValiderDislipidemieAM").toggle(true);
            }
            if (!boutons[1].checked) {
                $(".imageValiderDislipidemieAM").toggle(false);
            }
        });

        $('#AntecedentMedicaux input[name=asthmeAM]').click(function () {
            var boutons = $('#AntecedentMedicaux input[name=asthmeAM]');
            if (boutons[1].checked) {
                $(".imageValiderAsthmeAM").toggle(true);
            }
            if (!boutons[1].checked) {
                $(".imageValiderAsthmeAM").toggle(false);
            }
        });

        
        
        
        //Antecedent GO
        //
      
    
        //GYNECO-OBSTETRIQUE TESTER SI C'EST COCHE
        //GYNECO-OBSTETRIQUE TESTER SI C'EST COCHE
        if (temoinMenarcheGO != 1) {
            $("#NoteMonarche").toggle(false);
        }
        if (temoinGestiteGO != 1) {
            $("#NoteGestite").toggle(false);
        }
        if (temoinPariteGO != 1) {
            $("#NoteParite").toggle(false);
        }
        if (temoinCycleGO != 1) {
            $("#RegulariteON, #DysmenorrheeON, #DureeGO").toggle(false);
        }
        $("#DivNoteAutresGO").toggle(false);

        $('#GynecoObstetrique input[name=MenarcheGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=MenarcheGO]');
            if (boutons[1].checked) {
                $("#NoteMonarche").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteMonarche").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=EnfVivGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=EnfVivGO]');
            if (boutons[1].checked) {
                $("#NoteEnfViv").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteEnfViv").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=GestiteGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=GestiteGO]');
            if (boutons[1].checked) {
                $("#NoteGestite").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteGestite").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=PariteGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=PariteGO]');
            if (boutons[1].checked) {
                $("#NoteParite").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteParite").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=MortNeGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=MortNeGO]');
            if (boutons[1].checked) {
                $("#NoteMortNe").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteMortNe").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=DystocieGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=DystocieGO]');
            if (boutons[1].checked) {
                $("#NoteDystocie").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteDystocie").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=CesarienneGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=CesarienneGO]');
            if (boutons[1].checked) {
                $("#NoteCesarienne").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteCesarienne").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=CycleGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=CycleGO]');
            if (boutons[1].checked) {
                $("#RegulariteON, #DysmenorrheeON, #DureeGO").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#RegulariteON, #DysmenorrheeON, #DureeGO").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=EclampsieGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=EclampsieGO]');
            if (boutons[1].checked) {
                $("#NoteEclampsie").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#NoteEclampsie").toggle(false);
            }
        });

        $('#GynecoObstetrique input[name=AutresGO]').click(function () {
            var boutons = $('#GynecoObstetrique input[name=AutresGO]');
            if (boutons[1].checked) {
                $("#DivNoteAutresGO").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#DivNoteAutresGO").toggle(false);
            }
        });

        //ANTECEDENTS FAMILIAUX TESTER SI C'EST COCHE
        //ANTECEDENTS FAMILIAUX TESTER SI C'EST COCHE
        if (temoinDiabeteAF != 1) {
            $("#DivNoteDiabeteAF").toggle(false);
        }
        if (temoinDrepanocytoseAF != 1) {
            $("#DivNoteDrepanocytoseAF").toggle(false);
        }
        if (temoinhtaAF != 1) {
            $("#DivNoteHtaAF").toggle(false);
        }
        $("#DivNoteAutresAF").toggle(false);

        $('#AntecedentsFamiliaux input[name=DiabeteAF]').click(function () {
            var boutons = $('#AntecedentsFamiliaux input[name=DiabeteAF]');
            if (boutons[1].checked) {
                $("#DivNoteDiabeteAF").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#DivNoteDiabeteAF").toggle(false);
            }
        });

        $('#AntecedentsFamiliaux input[name=DrepanocytoseAF]').click(function () {
            var boutons = $('#AntecedentsFamiliaux input[name=DrepanocytoseAF]');
            if (boutons[1].checked) {
                $("#DivNoteDrepanocytoseAF").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#DivNoteDrepanocytoseAF").toggle(false);
            }
        });

        $('#AntecedentsFamiliaux input[name=htaAF]').click(function () {
            var boutons = $('#AntecedentsFamiliaux input[name=htaAF]');
            if (boutons[1].checked) {
                $("#DivNoteHtaAF").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#DivNoteHtaAF").toggle(false);
            }
        });

        $('#AntecedentsFamiliaux input[name=autresAF]').click(function () {
            var boutons = $('#AntecedentsFamiliaux input[name=autresAF]');
            if (boutons[1].checked) {
                $("#DivNoteAutresAF").toggle(true);
            }
            if (!boutons[1].checked) {
                $("#DivNoteAutresAF").toggle(false);
            }
        });
        //******************************************************************************
        //******************************************************************************
        $(".image2_TP").click(function () {
            $("#MenuTerrainParticulier").fadeOut(function () {
                $("#AntecedentsFamiliaux").fadeIn("fast");
            });
        });

        /***    $("#TerminerAntecedentsFamiliaux").click(function(){
				$("#AntecedentsFamiliaux").fadeOut("fast");
			}); */
    });
}


/***************************************************************************************/

/**========================== PAGINATION INTERVENTION ================================**/

/***************************************************************************************/

function pagination() {
    $(function () {
        //CODE POUR INITIALISER LA LISTE
        $('#ListeConsultationPatient').each(function () {
            var currentPage = 0;
            var numPerPage = 3;
            var $table = $(this);
            $table.find('tbody tr').hide()
                .slice(currentPage * numPerPage, (currentPage + 1) * numPerPage)
                .show();
        });
        //CODE POUR LA PAGINATION
        $('#ListeConsultationPatient').each(function () {
            var currentPage = 0;
            var numPerPage = 3;
            var $table = $(this);
            var repaginate = function () {
                $table.find('tbody tr').hide()
                    .slice(currentPage * numPerPage, (currentPage + 1) * numPerPage)
                    .show();
            };
            var numRows = $table.find('tbody tr').length;
            var numPages = Math.ceil(numRows / numPerPage);
            var $pager = $('<div class="pager"></div>');


            for (var page = 0; page < numPages; page++) {
                $('<a class="page-number" id="page_number" style="cursor:pointer; margin-right: 5px; background: #efefef; width:80px; height:80px; padding-left: 10px; padding-right: 10px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></a>').text(page + 1)
                    .bind('click', {newPage: page}, function (event) {
                        currentPage = event.data['newPage'];
                        repaginate();
                        $(this).addClass('active').css({
                            'background': '#8e908d',
                            'color': 'white'
                        }).siblings().removeClass('active').css({'background': '#efefef', 'color': 'black'});
                    }).appendTo($pager).addClass('clickable');
            }


            $pager.insertAfter($table)
                .find('a.page-number:first').addClass('active').css({'background': '#8e908d', 'color': 'white'});
        });
    });
}

function jsPagination() {
    $('#ListeConsultationPatient, #ListeHospitalisation').dataTable
    ({
        "sPaginationType": "full_numbers",
        "aaSorting": [], //pour trier la liste affichee
        "oLanguage": {
            "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sInfo": "_START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty": "0 &eacute;l&eacute;ment &agrave; afficher",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "",
            "sUrl": "",
            "sWidth": "30px",
            "oPaginate": {
                "sFirst": "|<",
                "sPrevious": "<",
                "sNext": ">",
                "sLast": ">|"
            }
        },
        "iDisplayLength": 3,
        "aLengthMenu": [1, 2, 3],
    });
}

/***************************************************************************************/

/**========================== CONSTANTES CONSTANTES  ================================**/

/***************************************************************************************/

$('table input').attr('autocomplete', 'off');
//*********************************************************************
//*********************************************************************
//*********************************************************************
function dep1() {
    $('#depliantBandelette').click(function () {
        $("#depliantBandelette").replaceWith("<img id='depliantBandelette' style='cursor: pointer; position: absolute; padding-right: 120px; margin-left: -5px;' src='../img/light/plus.png' />");
        dep();
        $('#BUcheckbox').animate({
            height: 'toggle'
        }, 1000);
        return false;
    });
}

//------------------------------------------------------------------------
function dep() {
    $('#depliantBandelette').click(function () {
        $("#depliantBandelette").replaceWith("<img id='depliantBandelette' style='cursor: pointer; position: absolute; padding-right: 120px; margin-left: -5px;' src='../img/light/minus.png' />");
        dep1();
        $('#BUcheckbox').animate({
            height: 'toggle'
        }, 1000);
        return false;
    });
}
//------------------------------------------------------------------------

  


    

//CHOIX DU CROIX
//========================================================

OptionCochee();
function OptionCochee() {
    $("#labelAlbumine").toggle(false);
    $("#labelSucre").toggle(false);
    $("#labelCorpscetonique").toggle(false);

    //AFFICHER SI C'EST COCHE
    //AFFICHER SI C'EST COCHE
    var boutonsAlbumine = $('#BUcheckbox input[name=albumine]');
    if (boutonsAlbumine[1].checked) {
        $("#labelAlbumine").toggle(true);
    }

    var boutonsSucre = $('#BUcheckbox input[name=sucre]');
    if (boutonsSucre[1].checked) {
        $("#labelSucre").toggle(true);
    }

    var boutonsCorps = $('#BUcheckbox input[name=corpscetonique]');
    if (boutonsCorps[1].checked) {
        $("#labelCorpscetonique").toggle(true);
    }
//========================================================


    
  //AFFICHER AU CLICK SI C'EST COCHE
    //AFFICHER AU CLICK SI C'EST COCHE
    $('#BUcheckbox input[name=albumine]').click(function () {
        $("#ChoixPlus").toggle(false);
        var boutons = $('#BUcheckbox input[name=albumine]');
        if (boutons[0].checked) {
            $("#labelAlbumine").toggle(false);
            $("#BUcheckbox input[name=croixalbumine]").attr('checked', false);
        }
        if (boutons[1].checked) {
            $("#labelAlbumine").toggle(true);
            $("#labelCroixAlbumine").toggle(true);
        }
    });

    $('#BUcheckbox input[name=sucre]').click(function () {
        $("#ChoixPlus2").toggle(false);
        var boutons = $('#BUcheckbox input[name=sucre]');
        if (boutons[0].checked) {
            $("#labelSucre").toggle(false);
            $("#BUcheckbox input[name=croixsucre]").attr('checked', false);
        }
        if (boutons[1].checked) {
            $("#labelSucre").toggle(true);
            $("#labelCroixSucre").toggle(true);
        }
    });
    $('#BUcheckbox input[name=corpscetonique]').click(function () {
        $("#ChoixPlus3").toggle(false);
        var boutons = $('#BUcheckbox input[name=corpscetonique]');
        if (boutons[0].checked) {
            $("#labelCorpscetonique").toggle(false);
            $("#BUcheckbox input[name=croixcorpscetonique]").attr('checked', false);
        }
        if (boutons[1].checked) {
            $("#labelCorpscetonique").toggle(true);
            $("#labelCroixCorpscetonique").toggle(true);
        }
    });

}
//CHOIX DU CROIX
//========================================================
$("#ChoixPlus").toggle(false);
albumineOption();
function albumineOption() {
  var boutons = $('#BUcheckbox input[name=croixalbumine]');
  if (boutons[0].checked) {
      $("#labelCroixAlbumine").toggle(false);
      $("#ChoixPlus").toggle(true);
      $("#ChoixPlus label").html("1+");

  }
  if (boutons[1].checked) {
      $("#labelCroixAlbumine").toggle(false);
      $("#ChoixPlus").toggle(true);
      $("#ChoixPlus label").html("2+");

  }
  if (boutons[2].checked) {
      $("#labelCroixAlbumine").toggle(false);
      $("#ChoixPlus").toggle(true);
      $("#ChoixPlus label").html("3+");

  }
  if (boutons[3].checked) {
      $("#labelCroixAlbumine").toggle(false);
      $("#ChoixPlus").toggle(true);
      $("#ChoixPlus label").html("4+");

  }
}

$('#BUcheckbox input[name=croixalbumine]').click(function () {
    albumineOption();
});




$("#ChoixPlus2").toggle(false);
sucreOption();
function sucreOption() {
    var boutons = $('#BUcheckbox input[name=croixsucre]');
    if (boutons[0].checked) {
        $("#labelCroixSucre").toggle(false);
        $("#ChoixPlus2").toggle(true);
        $("#ChoixPlus2 label").html("1+");

    }
    if (boutons[1].checked) {
        $("#labelCroixSucre").toggle(false);
        $("#ChoixPlus2").toggle(true);
        $("#ChoixPlus2 label").html("2+");

    }
    if (boutons[2].checked) {
        $("#labelCroixSucre").toggle(false);
        $("#ChoixPlus2").toggle(true);
        $("#ChoixPlus2 label").html("3+");

    }
    if (boutons[3].checked) {
        $("#labelCroixSucre").toggle(false);
        $("#ChoixPlus2").toggle(true);
        $("#ChoixPlus2 label").html("4+");

    }
}
$('#BUcheckbox input[name=croixsucre]').click(function () {
    sucreOption();
});


$("#ChoixPlus3").toggle(false);
corpscetoniqueOption();
function corpscetoniqueOption() {
    var boutons = $('#BUcheckbox input[name=croixcorpscetonique]');
    if (boutons[0].checked) {
        $("#labelCroixCorpscetonique").toggle(false);
        $("#ChoixPlus3").toggle(true);
        $("#ChoixPlus3 label").html("1+");

    }
    if (boutons[1].checked) {
        $("#labelCroixCorpscetonique").toggle(false);
        $("#ChoixPlus3").toggle(true);
        $("#ChoixPlus3 label").html("2+");

    }
    if (boutons[2].checked) {
        $("#labelCroixCorpscetonique").toggle(false);
        $("#ChoixPlus3").toggle(true);
        $("#ChoixPlus3 label").html("3+");

    }
    if (boutons[3].checked) {
        $("#labelCroixCorpscetonique").toggle(false);
        $("#ChoixPlus3").toggle(true);
        $("#ChoixPlus3 label").html("4+");

    }
}
$('#BUcheckbox input[name=croixcorpscetonique]').click(function () {
    corpscetoniqueOption();
});

//******************* VALIDER LES DONNEES DU TABLEAU DES MOTIFS ********************************
//******************* VALIDER LES DONNEES DU TABLEAU DES MOTIFS ********************************

/****** ======================================================================= *******/
/****** ======================================================================= *******/
/****** ======================================================================= *******/
    //******************* VALIDER LES DONNEES DU TABLEAU DES CONSTANTES ********************************
    //******************* VALIDER LES DONNEES DU TABLEAU DES CONSTANTES ********************************

    //Au debut on d�sactive le code cons et la date de consultation qui sont non modifiables
var id_cons = $("#id_cons");
var date_cons = $("#date_cons");
id_cons.attr('readonly', true);
date_cons.attr('readonly', true);

var poids = $('#poids');
var hu = $('#hu');
var taille = $('#taille');
//var paleur = $('#paleur');
var tension = $('#tension');
var bu = $('#bu');
var temperature = $('#temperature');
var glycemie_capillaire = $('#glycemie_capillaire');
var pouls = $('#pouls');
var frequence_respiratoire = $('#frequence_respiratoire');
var tensionmaximale = $("#tensionmaximale");
var tensionminimale = $("#tensionminimale");

//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_constantes_valider").toggle(true);
$("#bouton_constantes_modifier").toggle(false);

//Au debut on active tous les champs
hu.attr('readonly', false).css({'background': '#fff'});
poids.attr('readonly', false).css({'background': '#fff'});
taille.attr('readonly', false).css({'background': '#fff'});
//paleur.attr('readonly', false).css({'background': '#fff'});
tension.attr('readonly', false).css({'background': '#fff'});
bu.attr('readonly', false).css({'background': '#fff'});
temperature.attr('readonly', false).css({'background': '#fff'});
glycemie_capillaire.attr('readonly', false).css({'background': '#fff'});
pouls.attr('readonly', false).css({'background': '#fff'});
frequence_respiratoire.attr('readonly', false).css({'background': '#fff'});
tensionmaximale.attr('readonly', false).css({'background': '#fff'});
tensionminimale.attr('readonly', false).css({'background': '#fff'});

$("#bouton_constantes_valider").click(function () {
    if (valid == true) {

        hu.attr('readonly', true).css({'background': '#f8f8f8'});
        poids.attr('readonly', true).css({'background': '#f8f8f8'});
        taille.attr('readonly', true).css({'background': '#f8f8f8'});
        //paleur.attr('readonly', true).css({'background': '#f8f8f8'});
        tension.attr('readonly', true).css({'background': '#f8f8f8'});
        bu.attr('readonly', true).css({'background': '#f8f8f8'});
        temperature.attr('readonly', true).css({'background': '#f8f8f8'});
        glycemie_capillaire.attr('readonly', true).css({'background': '#f8f8f8'});
        pouls.attr('readonly', true).css({'background': '#f8f8f8'});
        frequence_respiratoire.attr('readonly', true).css({'background': '#f8f8f8'});
        tensionmaximale.attr('readonly', true).css({'background': '#f8f8f8'});
        tensionminimale.attr('readonly', true).css({'background': '#f8f8f8'});

        $("#bouton_constantes_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_constantes_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_constantes_modifier").click(function () {
    poids.attr('readonly', false).css({'background': '#fff'});
    taille.attr('readonly', false).css({'background': '#fff'});
   hu.attr('readonly', false).css({'background': '#fff'});
   // paleur.attr('readonly', false).css({'background': '#fff'});
    tension.attr('readonly', false).css({'background': '#fff'});
   bu.attr('readonly', false).css({'background': '#fff'});
    temperature.attr('readonly', false).css({'background': '#fff'});
    glycemie_capillaire.attr('readonly', false).css({'background': '#fff'});
    pouls.attr('readonly', false).css({'background': '#fff'});
    frequence_respiratoire.attr('readonly', false).css({'background': '#fff'});
    tensionmaximale.attr('readonly', false).css({'background': '#fff'});
    tensionminimale.attr('readonly', false).css({'background': '#fff'});

    $("#bouton_constantes_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_constantes_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});

//ACCOUCHEMENT
var forme_accouchement = $("#type_accouchement");
var motif_forme = $("#motif_type");
var date_accouchement = $("#date_accouchement");
var heure_accouchement = $("#heure_accouchement");
var delivrance = $("#delivrance");
var ru = $("#ru");
var hemorragie = $("#hemoragie");
var ocytocine_per = $("#ocytocique_per");
var ocytocine_post = $("#ocytocique_post");
var antibiotique = $("#antibiotique");
var anticonv = $("#anticonvulsant");
var transfusion = $("#transfusion");
//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_accouchement_valider").toggle(true);
$("#bouton_accouchement_modifier").toggle(false);

//Au debut on active tous les champs
forme_accouchement.attr('readonly', false).css({'background': '#fff'});
motif_forme.attr('readonly', false).css({'background': '#fff'});
date_accouchement.attr('readonly', false).css({'background': '#fff'});
heure_accouchement.attr('readonly', false).css({'background': '#fff'});
delivrance.attr('readonly', false).css({'background': '#fff'});
ru.attr('readonly', false).css({'background': '#fff'});
hemorragie.attr('readonly', false).css({'background': '#fff'});
ocytocine_per.attr('readonly', false).css({'background': '#fff'});
ocytocine_post.attr('readonly', false).css({'background': '#fff'});
antibiotique.attr('readonly', false).css({'background': '#fff'});
anticonv.attr('readonly', false).css({'background': '#fff'});
transfusion.attr('readonly', false).css({'background': '#fff'});
$("#bouton_accouchement_valider").click(function () {
    if (valid == true) {

        forme_accouchement.attr('readonly', true).css({'background': '#f8f8f8'});
        motif_forme.attr('readonly', true).css({'background': '#f8f8f8'});
        date_accouchement.attr('readonly', true).css({'background': '#f8f8f8'});
       heure_accouchement.attr('readonly', true).css({'background': '#f8f8f8'});
      delivrance.attr('readonly', true).css({'background': '#f8f8f8'});
       ru.attr('readonly', true).css({'background': '#f8f8f8'});
       hemorragie.attr('readonly', true).css({'background': '#f8f8f8'});
       ocytocine_per.attr('readonly', true).css({'background': '#f8f8f8'});
       ocytocine_post.attr('readonly', true).css({'background': '#f8f8f8'});
       antibiotique.attr('readonly', true).css({'background': '#f8f8f8'});
       anticonv.attr('readonly', true).css({'background': '#f8f8f8'});
       transfusion.attr('readonly', true).css({'background': '#f8f8f8'});
        $("#bouton_accouchement_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_accouchement_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_accouchement_modifier").click(function () {
    forme_accouchement.attr('readonly', false).css({'background': '#fff'});
    motif_forme.attr('readonly', false).css({'background': '#fff'});
    date_accouchement.attr('readonly', false).css({'background': '#fff'});
   heure_accouchement.attr('readonly', false).css({'background': '#fff'});
  delivrance.attr('readonly', false).css({'background': '#fff'});
   ru.attr('readonly', false).css({'background': '#fff'});
  hemorragie.attr('readonly', false).css({'background': '#fff'});
  ocytocine_per.attr('readonly', false).css({'background': '#fff'});
  ocytocine_post.attr('readonly', false).css({'background': '#fff'});
  antibiotique.attr('readonly', false).css({'background': '#fff'});
  anticonv.attr('readonly', false).css({'background': '#fff'});
  tranfusion.attr('readonly', false).css({'background': '#fff'});
    $("#bouton_accouchement_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_accouchement_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});












//ENFANT





var sexe = $("#sexe");
var poids = $("#poids");
var apgar1 = $("#apgar_1");
var apgar5 = $("#apgar_5");
var malf = $("#malf");
var cri = $("#cri");
var maintien_temp = $("#maintien_temp");
var mise_soin_precoce = $("#mise_soin_precoce");
var soin_cordon = $("#soin_cordon");
var reanimation = $("#reanimation");
var sat = $("#sat");
var vit_k = $("#vit_k");
var collyre = $("#collyre");
var consult_j1_j2 = $("#consult_j1_j2");
//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_enfant_valider").toggle(true);
$("#bouton_enfant_modifier").toggle(false);

//Au debut on active tous les champs
sexe.attr('readonly', false).css({'background': '#fff'});
poids.attr('readonly', false).css({'background': '#fff'});
apgar1.attr('readonly', false).css({'background': '#fff'});
apgar5.attr('readonly', false).css({'background': '#fff'});
malf.attr('readonly', false).css({'background': '#fff'});
cri.attr('readonly', false).css({'background': '#fff'});
maintien_temp.attr('readonly', false).css({'background': '#fff'});
mise_soin_precoce.attr('readonly', false).css({'background': '#fff'});
soin_cordon.attr('readonly', false).css({'background': '#fff'});
reanimation.attr('readonly', false).css({'background': '#fff'});
sat.attr('readonly', false).css({'background': '#fff'});
vit_k.attr('readonly', false).css({'background': '#fff'});
collyre.attr('readonly', false).css({'background': '#fff'});
consult_j1_j2.attr('readonly', false).css({'background': '#fff'});
$("#bouton_enfant_valider").click(function () {
    if (valid == true) {

    	sexe.attr('readonly', true).css({'background': '#f8f8f8'});
    	poids.attr('readonly', true).css({'background': '#f8f8f8'});
    	apgar1.attr('readonly', true).css({'background': '#f8f8f8'});
    	apgar5.attr('readonly', true).css({'background': '#f8f8f8'});
    	malf.attr('readonly', true).css({'background': '#f8f8f8'});
    	cri.attr('readonly', true).css({'background': '#f8f8f8'});
    	maintien_temp.attr('readonly', true).css({'background': '#f8f8f8'});
    	mise_soin_precoce.attr('readonly', true).css({'background': '#f8f8f8'});
    	soin_cordon.attr('readonly', true).css({'background': '#f8f8f8'});
    	reanimation.attr('readonly', true).css({'background': '#f8f8f8'});
    	sat.attr('readonly', true).css({'background': '#f8f8f8'});
    	vit_k.attr('readonly', true).css({'background': '#f8f8f8'});
    	collyre.attr('readonly', true).css({'background': '#f8f8f8'});
    	consult_j1_j2.attr('readonly', true).css({'background': '#f8f8f8'});
        $("#bouton_enfant_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_enfant_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_enfant_modifier").click(function () {
	sexe.attr('readonly', false).css({'background': '#fff'});
	poids.attr('readonly', false).css({'background': '#fff'});
	apgar1.attr('readonly', false).css({'background': '#fff'});
	apgar5.attr('readonly', false).css({'background': '#fff'});
	malf.attr('readonly', false).css({'background': '#fff'});
  cri.attr('readonly', false).css({'background': '#fff'});
  maintien_temp.attr('readonly', false).css({'background': '#fff'});
  mise_soin_precoce.attr('readonly', false).css({'background': '#fff'});
  soin_cordon.attr('readonly', false).css({'background': '#fff'});
  reanimation.attr('readonly', false).css({'background': '#fff'});
  sat.attr('readonly', false).css({'background': '#fff'});
  vit_k.attr('readonly', false).css({'background': '#fff'});
  collyre.attr('readonly', false).css({'background': '#fff'});
  consult_j1_j2.attr('readonly', false).css({'background': '#fff'});
    $("#bouton_enfant_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_enfant_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});




















//Antecedent 


var geste = $("#geste");
var parite = $("#parite");
var enf_viv = $("#enf_viv");
var nb_cpn = $("#nb_cpn");
var mort_ne = $("#mort_ne");
var cesar = $("#cesar");
var dystocie = $("#dystocie");
var eclampsie = $("#eclampsie");

//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_ant_valider").toggle(true);
$("#bouton_ant_modifier").toggle(false);

//Au debut on active tous les champs
geste.attr('readonly', false).css({'background': '#fff'});
parite.attr('readonly', false).css({'background': '#fff'});
enf_viv.attr('readonly', false).css({'background': '#fff'});
nb_cpn.attr('readonly', false).css({'background': '#fff'});
mort_ne.attr('readonly', false).css({'background': '#fff'});
cesar.attr('readonly', false).css({'background': '#fff'});
dystocie.attr('readonly', false).css({'background': '#fff'});
eclampsie.attr('readonly', false).css({'background': '#fff'});

$("#bouton_ant_valider").click(function () {
  if (valid == true) {

  	geste.attr('readonly', true).css({'background': '#f8f8f8'});
  	parite.attr('readonly', true).css({'background': '#f8f8f8'});
  	enf_viv.attr('readonly', true).css({'background': '#f8f8f8'});
  	nb_cpn.attr('readonly', true).css({'background': '#f8f8f8'});
  	mort_ne.attr('readonly', true).css({'background': '#f8f8f8'});
  	cesar.attr('readonly', true).css({'background': '#f8f8f8'});
  	dystocie.attr('readonly', true).css({'background': '#f8f8f8'});
  	eclampsie.attr('readonly', true).css({'background': '#f8f8f8'});
  
      $("#bouton_ant_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
      $("#bouton_ant_valider").toggle(false); //on cache le bouton permettant de valider les champs
  }
  return false;
});

$("#bouton_ant_modifier").click(function () {
	geste.attr('readonly', false).css({'background': '#fff'});
	parite.attr('readonly', false).css({'background': '#fff'});
	enf_viv.attr('readonly', false).css({'background': '#fff'});
	nb_cpn.attr('readonly', false).css({'background': '#fff'});
	mort_ne.attr('readonly', false).css({'background': '#fff'});
cesar.attr('readonly', false).css({'background': '#fff'});
dystocie.attr('readonly', false).css({'background': '#fff'});
eclampsie.attr('readonly', false).css({'background': '#fff'});

  $("#bouton_ant_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
  $("#bouton_ant_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
  return false;
});







//Grossesse


var ddr = $("#ddr");
var duree_grossesse = $("#duree_grossesse");
var bb_attendu = $("#bb_attendu");
var vat_1 = $("#vat_1");
var vat_2 = $("#vat_2");
var vat_3 = $("#vat_3");


//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_gro_valider").toggle(true);
$("#bouton_gro_modifier").toggle(false);

//Au debut on active tous les champs
ddr.attr('readonly', false).css({'background': '#fff'});
duree_grossesse.attr('readonly', false).css({'background': '#fff'});
bb_attendu.attr('readonly', false).css({'background': '#fff'});
vat_1.attr('readonly', false).css({'background': '#fff'});
vat_2.attr('readonly', false).css({'background': '#fff'});
vat_3.attr('readonly', false).css({'background': '#fff'});


$("#bouton_gro_valider").click(function () {
if (valid == true) {

	ddr.attr('readonly', true).css({'background': '#f8f8f8'});
	duree_grossesse.attr('readonly', true).css({'background': '#f8f8f8'});
	bb_attendu.attr('readonly', true).css({'background': '#f8f8f8'});
	vat_1.attr('readonly', true).css({'background': '#f8f8f8'});
	vat_2.attr('readonly', true).css({'background': '#f8f8f8'});
	vat_3.attr('readonly', true).css({'background': '#f8f8f8'});


    $("#bouton_gro_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
    $("#bouton_gro_valider").toggle(false); //on cache le bouton permettant de valider les champs
}
return false;
});

$("#bouton_gro_modifier").click(function () {
	ddr.attr('readonly', false).css({'background': '#fff'});
	duree_grossesse.attr('readonly', false).css({'background': '#fff'});
	bb_attendu.attr('readonly', false).css({'background': '#fff'});
	vat_1.attr('readonly', false).css({'background': '#fff'});
	vat_2.attr('readonly', false).css({'background': '#fff'});
    vat_3.attr('readonly', false).css({'background': '#fff'});


$("#bouton_gro_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
$("#bouton_gro_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
return false;
});







$('#dateDebAlcoolique input, #dateFinAlcoolique input, #dateDebFumeur input, #dateFinFumeur input, #dateDebDroguer input, #dateFinDroguer input').datepicker(
    $.datepicker.regional['fr'] = {
        closeText: 'Fermer',
        changeYear: true,
        yearRange: 'c-80:c',
        prevText: '&#x3c;Préc',
        nextText: 'Suiv&#x3e;',
        currentText: 'Courant',
        monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun',
            'Jul', 'Aout', 'Sep', 'Oct', 'Nov', 'Dec'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearRange: '1990:2025',
        showAnim: 'bounce',
        changeMonth: true,
        changeYear: true,
        yearSuffix: ''
    }
);



//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
var itab = 1;
var ligne = 0;
var tableau = [];

function ajouterToutLabelAntecedentsMedicaux(tableau_) {
    for (var l = 1; l <= ligne; l++) {
        if (l == 1) {
            $("#labelDesAntecedentsMedicaux_" + 1).html("").css({'height': '0px'});
            itab = 1;
        } else {
            $("#labelDesAntecedentsMedicaux_" + l).remove();
        }
    }

    var tab = [];
    var j = 1;

    for (var i = 1; i < tableau_.length; i++) {
        if (tableau_[i]) {
            tab[j++] = tableau_[i];
            itab++;
            ajouterLabelAntecedentsMedicaux(tableau_[i]);
        }
    }

    tableau = tab;
    itab = j;
    $('#nbCheckboxAM').val(itab);

    stopPropagation();
}


//Ajouter des labels au click sur ajouter
//Ajouter des labels au click sur ajouter
//Ajouter des labels au click sur ajouter
var scriptLabel = "";
function ajouterLabelAntecedentsMedicaux(nomLabel) {

    if (!nomLabel) {
        stopPropagation();
    }

    var reste = ( itab - 1 ) % 5;
    var nbElement = parseInt(( itab - 1 ) / 5);
    if (reste != 0) {
        ligne = nbElement + 1;
    }
    else {
        ligne = nbElement;
    }

    var i = 0;
    if (ligne == 1) {
        i = $("#labelDesAntecedentsMedicaux_" + ligne + " td").length;
    } else {
        if (reste == 1) {
            $("#labelDesAntecedentsMedicaux_" + (ligne - 1)).after(
                "<tr id='labelDesAntecedentsMedicaux_" + ligne + "' style='width:100%; '>" +
                "</tr>");
        }
        i = $("#labelDesAntecedentsMedicaux_" + ligne + " td").length;
    }

    scriptLabel =
        "<td id='BUcheckbox' class='label_" + ligne + "_" + i + "' style='width: 20%; '> " +
        "<div > " +
        " <label style='width: 90%; height:30px; text-align:right; font-family: time new romans; font-size: 18px;'> " +
        "    <span style='padding-left: -10px;'> " +
        "       <a href='javascript:supprimerLabelAM(" + ligne + "," + i + ");' ><img class='imageSupprimerAsthmeAM' style='cursor: pointer; float: right; margin-right: -10px; width:10px; height: 10px;' src='" + tabUrl[0] + "public/images_icons/sup.png' /></a> " +
        "       <img class='imageValider_" + ligne + "_" + i + "'  style='cursor: pointer; margin-left: -15px;' src='" + tabUrl[0] + "public/images_icons/tick-icon2.png' /> " +
        "    </span> " +
        nomLabel + "  <input type='checkbox' checked='${this.checked}' name='champValider_" + ligne + "_" + i + "' id='champValider_" + ligne + "_" + i + "' > " +
        " <input type='hidden'  id='champTitreLabel_" + ligne + "_" + i + "' value='" + nomLabel + "' > " +
        " </label> " +
        "</div> " +
        "</td> " +

        "<script>" +
        "$('#champValider_" + ligne + "_" + i + "').click(function(){" +
        "var boutons = $('#champValider_" + ligne + "_" + i + "');" +
        "if( boutons[0].checked){ $('.imageValider_" + ligne + "_" + i + "').toggle(true);  }" +
        "if(!boutons[0].checked){ $('.imageValider_" + ligne + "_" + i + "').toggle(false); }" +
        "});" +
        "</script>"
    ;

    if (i == 0) {
        //AJOUTER ELEMENT SUIVANT
        $("#labelDesAntecedentsMedicaux_" + ligne).html(scriptLabel);
        $("#labelDesAntecedentsMedicaux_" + ligne).css({'height': '50px'});
    } else if (i < 5) {
        //AJOUTER ELEMENT SUIVANT
        $("#labelDesAntecedentsMedicaux_" + ligne + " .label_" + ligne + "_" + (i - 1)).after(scriptLabel);
    }

}

//Ajouter un label --- Ajouter un label
//Ajouter un label --- Ajouter un label
//Ajouter un label --- Ajouter un label

$('#imgIconeAjouterLabel').click(function () {
    if (!$('#autresAM').val()) {
        stopPropagation();
    }
    else {
        tableau[itab++] = $('#autresAM').val();
        ajouterLabelAntecedentsMedicaux($('#autresAM').val());
        $('#nbCheckboxAM').val(itab);
        $('#autresAM').val("");
    }
    stopPropagation();
});


//Supprimer un label ajouter --- Supprimer un label ajouter
//Supprimer un label ajouter --- Supprimer un label ajouter
//Supprimer un label ajouter --- Supprimer un label ajouter
function supprimerLabelAM(ligne, i) {

    var pos = ((ligne - 1) * 5) + i;
    var indiceTableau = pos + 1;
    tableau[indiceTableau] = "";

    $("#labelDesAntecedentsMedicaux_" + ligne + " .label_" + ligne + "_" + i).fadeOut(
        function () {
            ajouterToutLabelAntecedentsMedicaux(tableau);
        }
    );

}

//Ajout de l'auto-completion sur le champ autre
//Ajout de l'auto-completion sur le champ autre

function autocompletionAntecedent(myArrayMedicament) {
    $("#imageIconeAjouterLabel label input").autocomplete({
        source: myArrayMedicament
    });
}


function affichageAntecedentsMedicauxDuPatient(nbElement, tableau_) {
    for (var i = 1; i <= nbElement; i++) {
        itab++;
        ajouterLabelAntecedentsMedicaux(tableau_[i]);
    }
    tableau = tableau_;
}






$('.ExamenMaterniteDonnee3').toggle(false);
function getExamenMaterniteDonnee3(val){ 
	
	if(val==1){
		$("#examenMaterniteDonnee3").html("BDC");
		$('.ExamenMaterniteDonnee3').fadeIn();
	}else{
		$("#examenMaterniteDonnee3 span span").html("");
		$('.ExamenMaterniteDonnee3').fadeOut();
	}	
}

getExamenMaterniteDonnee3($('#examen_maternite_donnee3').val());






$('.ExamenMaterniteDonnee5').toggle(false);
function getExamenMaterniteDonnee5(val){ 
	
	if(val==1){
		$("#examenMaterniteDonnee5").html("PDE");
		$('.ExamenMaterniteDonnee5').fadeIn();
	}else{
		$("#examenMaterniteDonnee5 span span").html("");
		$('.ExamenMaterniteDonnee5').fadeOut();
	}	
}

getExamenMaterniteDonnee5($('#examen_maternite_donnee5').val());


$('.BbAttendu').toggle(false);
function getBbAttendu(val){ 
	
	if(val=='Multiple'){
		$("#bbAttendu").html("Bb attendu");
		$('.BbAttendu').fadeIn();
	}else{
		$("#bbAttendu span span").html("");
		$('.BbAttendu').fadeOut();
	}	
}

getBbAttendu($('#bb_attendu').val());


$('.Test').toggle(false);
function getTest(val){ 
	
	if(val=='1'){
		$("#test").html("Test emmel");
		$('.Test').fadeIn();
	}else{
		$("#test span span").html("");
		$('.Test').fadeOut();
		$('.Profil').fadeOut();
	}	
}

getTest($('#test_emmel').val());


$('.Profil').toggle(false);
function getProfil(val){ 
	
	if(val=='Autre'){
		$("#profil").html("Profil");
		$('.Profil').fadeIn();
	}else{
		$("#profil span span").html("");
		$('.Profil').fadeOut();
	}	
}










//pour quantite

//$('.Quantite').toggle(false);
function getQuantite(val){ 
	
	if(val==1){
		$("#quantite").html("Quantite Regle");
		$('.Quantite').fadeIn();
	}else{
		$("#quantite span span").html("");
		$('.Quantite').fadeOut();
	}	
}


//pour cycle
//$('.Cycle').toggle(false);
function getCycle(val){ 
	
	if(val==1){
		$("#cycle").html("Cycle");
		$('.Cycle').fadeIn();
	}else{
		$("#cycle span span").html("");
		$('.Cycle').fadeOut();
		$('.Quantite').fadeOut();
	}	
}


//pour conteraception
//$('.Contraception').toggle(false);
function getContraception(val){ 
	
	if(val=='1'){
		$("#contracetion").html("Contraception");
		$('.Contraception').fadeIn();
	}else{
		$("#contraception span span").html("");
		$('.Contraception').fadeOut();
		
	}	
}





//$('.MotifAdmission').toggle(false);
function getMotif(val){ 
	//alert(val);
	if(val==1){
		$("#motifad").html("Motif d\'admission");
		$('.MotifAdmission').fadeOut();	
	}
		else {
		$("#motifad span span").html("");
		$('.MotifAdmission').fadeIn();
		
	
}
}




//$('.Dystocie').toggle(false);
function getDystocie(val){ 
	//alert(val);
	if(val==1){
		$("#dystocie").html("DYstocie");
		$('.Dystocie').fadeOut();	
	}
		else {
		$("#dystocie span span").html("");
		$('.Dystocie').fadeIn();
		
	
}
}
//alert(dystocie);

var eclampsie=$("#eclampsie");
if (eclampsiee.checked)
{
	$('.Eclampsie').toggle(true);
	}
else 
	{
	$('.Eclampsie').toggle(false);
	}

//pour accouchement

$('.TypeAccouchement').toggle(false);
function getAccouchement(val){	
	//alert(val);
	if((val==0)||(val==1)){
		$("#typeaccouchement").html("Accouchement");
		$('.TypeAccouchement').fadeOut();
	}else{
		$("#typeaccouchement span span").html("");
		$('.TypeAccouchement').fadeIn();
		
	}	
}








//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
//===================================================================================================================
	  	
	  	