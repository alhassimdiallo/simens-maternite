<!-- MES STYLES -->







	
			<!--*7*-->
		<div class='tabTitle'>EVACUATION /REFERENCE</div>
    <div style="max-height: 480px;">


        <!--  **************** NOUVELLE ACCORDEON *********************  -->
        <!--  **************** NOUVELLE ACCORDEON *********************  -->
        <div id="accordionsssss">

            <!-- ************** Tranfert **************** -->
            <!-- **1** -->
            <div style='font-family: police2;font-size: 17px; font-weight: bold;'> Evacuation </div>
            <div>

                <div style=" padding-bottom:0px; margin-bottom: 5px; border-bottom: 2px solid green; margin-left: 0px;"></div>
                <!-- LE PDF POUR IMPRESSION-->
                <div class="transf">
                    <hass><input type="submit" alt="Constantes" title="Imprimer" name="transfert" id="transfert"></hass>
                </div>
                <div class="annulertransfert">
                    <hass><input type="submit" alt="Constantes" title="Annuler" name="annulertransfert" id="annulertransfert"></hass>
                </div>
                <div style=" padding-bottom:40px; margin-bottom: 10px; border-bottom: 1px dashed green; margin-left: 0px; margin-right: 0px;"></div>
                <table id="respond" style="width: 100%;">
                    <tr class="comment-form-author" style="width: 100%;">
                         <td >
		                   <div class="comment-form-author" ><label style='top: 5px;'>Evacuee</label></div> 
		                   <div class="comment-form-author" ><?php echo $this->formRow($form->get('evacue_de'));?></div>
		              </td>

                      <td style="width: 25%;"><label>Motif d'evacuation</label><?php echo $this->formRow($form->get('motif_evac'));?></td>
                       <td style="width: 25%;"><label>Service d'origine</label><?php echo $this->formRow($form->get('service_origine'));?></td>
                       
                    </tr>

                    <tr style="width: 100%;">
                        <th></th>
                        <th></th>
                        <th style="float:right; height:40px; margin-top: 20px; width:80px;">
                            <!-- On cr�e le bouton Valider (permettant la validation des donn�es -->
                            <div id="bouton_valider_evacuation">
                                <button id='bouton_evacuation_valider'>Valider</button>
                            </div>
                            <!-- On cr�e le bouton MODIFIER (permettant la modification des donn�es -->
                            <div id="bouton_modifier_evacuation">
                                <button id='bouton_evacuation_modifier'>Modifier</button>
                            </div>
                        </th>
                    </tr>
                </table>

            </div>

            <!-- ************** Hospitalisation **************** -->
            <!-- **2** -->
            <div style='font-family: police2;font-size: 17px; font-weight: bold;'> Evacuation CHRSL</div>
            <div style="max-height:300px;">
                <div style=" padding-bottom:0px; margin-bottom: 5px; border-bottom: 2px solid green; margin-left: 0px;"></div>
                <!-- LE PDF POUR IMPRESSION-->
                <div class="rendezvous">
                    <hass><input type="submit" alt="Constantes" title="Imprimer" name="hospitalisation" id="hospitalisation"></hass>
                </div>
                <div class="annulerhospitalisation">
                    <hass><input type="submit" name="annulerhospitalisation" id="annulerhospitalisation"></hass>
                </div>
                <div style=" padding-bottom:40px; margin-bottom: 10px; border-bottom: 1px dashed green; margin-left: 0px; margin-right: 0px;"></div>

               

                <table id="respond" style="width: 73%;">
                             <tr class="comment-form-author" style="width: 100%;">
                         <td >
		                   <div class="comment-form-author" ><label style='top: 5px;'>Evacuee de CHRSL vers...</label></div> 
		                   <div class="comment-form-author" ><?php echo $this->formRow($form->get('evacue_vers'));?></div>
		              </td>

                      <td style="width: 25%;"><label>Motif d'evacuation</label><?php echo $this->formRow($form->get('motif_ev_vers'));?></td>
                       <td style="width: 25%;"><label>Service d'acceuil</label><?php echo $this->formRow($form->get('service_acceuil'));?></td>
                       
                    </tr>
                </table>

                <table style="width: 100%; margin-top: 20px;">
                    <tr>
                        <th style="width:55%;"></th>
                        <th style="width:10%;">
                            <!-- On cr�e le bouton Valider (permettant la validation des donn�es -->
                            <div id="bouton_valider_evac">
                                <button id='bouton_evac_valider'>Valider</button>
                            </div>
                            <!-- On cr�e le bouton MODIFIER (permettant la modification des donn�es -->
                            <div id="bouton_modifier_evac">
                                <button id='bouton_evac_modifier'>Modifier</button>
                            </div>
                        </th>
                        <th style="width:35%;"></th>
                    </tr>
                </table>
            </div>


            
            
            
            
         
            
            
            
            
            
            
            
            
            
            <!-- ************** Rendez-vous **************** -->
            <!-- **3** -->
            <div style='font-family: police2;font-size: 17px; font-weight: bold;'> Reference</div>
            <div>

                <div style=" padding-bottom:0px; margin-bottom: 5px; border-bottom: 2px solid green; margin-left: 0px;"></div>
                <!-- LE PDF POUR IMPRESSION-->
                <div class="rendezvous">
                    <hass><input type="submit" alt="Constantes" title="Imprimer" name="rendezvous" id="disable"></hass>
                </div>

                <div class="annulerrendezvous">
                    <hass><input type="submit" alt="Constantes" title="Annuler" name="annulerrendezvous" id="annulerrendezvous"></hass>
                </div>
                <div style=" padding-bottom:40px; margin-bottom: 10px; border-bottom: 1px dashed green; margin-left: 0px; margin-right: 0px;"></div>

                <table id="respond" style="width: 100%;">
               <tr class="comment-form-author" style="width: 100%;">
                         <td >
		                   <div class="comment-form-author" ><label style='top: 5px;'>reference</label></div> 
		                   <div class="comment-form-author" ><?php echo $this->formRow($form->get('reference'));?></div>
		              </td>

                      <td style="width: 25%;"><label>Motif de reference</label><?php echo $this->formRow($form->get('motif_ref'));?></td>
                       <td style="width: 25%;"><label>Service d'origine</label><?php echo $this->formRow($form->get('refere_de'));?></td>
                       
                    </tr>
                    <table style="width: 100%; margin-top: 20px;">
                    <tr>
                        <th style="width:55%;"></th>
                        <th style="width:10%;">
                            <!-- On cr�e le bouton Valider (permettant la validation des donn�es -->
                            <div id="bouton_valider_ref">
                                <button id='bouton_ref_valider'>Valider</button>
                            </div>
                            <!-- On cr�e le bouton MODIFIER (permettant la modification des donn�es -->
                            <div id="bouton_modifier_ref">
                                <button id='bouton_ref_modifier'>Modifier</button>
                            </div>
                        </th>
                        <th style="width:35%;"></th>
                    </tr>
                </table>
                </table>

            </div>
        </div>

    </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //EVACUATION





var evacue_de = $("#evacue_de");
var motif_evac = $("#motif_evac");
var service_origine = $("#service_origine");


//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_evacuation_valider").toggle(true);
$("#bouton_evacuation_modifier").toggle(false);

//Au debut on active tous les champs
evacue_de.attr('readonly', false).css({'background': '#fff'});
motif_evac.attr('readonly', false).css({'background': '#fff'});
service_origine.attr('readonly', false).css({'background': '#fff'});


$("#bouton_evacuation_valider").click(function () {
    if (valid == true) {

    	evacue_de.attr('readonly', true).css({'background': '#f8f8f8'});
    	motif_evac.attr('readonly', true).css({'background': '#f8f8f8'});
    	service_origine.attr('readonly', true).css({'background': '#f8f8f8'});
    	//motif_ev_vers.attr('readonly', true).css({'background': '#f8f8f8'});
    	
        $("#bouton_evacuation_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
        $("#bouton_evacuation_valider").toggle(false); //on cache le bouton permettant de valider les champs
    }
    return false;
});

$("#bouton_evacuation_modifier").click(function () {
	evacue_de.attr('readonly', false).css({'background': '#fff'});
	motif_evac.attr('readonly', false).css({'background': '#fff'});
	service_origine.attr('readonly', false).css({'background': '#fff'});
	//motif_ev_vers.attr('readonly', false).css({'background': '#fff'});
	
    $("#bouton_evacuation_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
    $("#bouton_evacuation_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
    return false;
});

//EVACUATION CHRSL


var evacue_vers = $("#evacue_vers");
var motif_ev_vers = $("#motif_ev_vers");
var service_acceuil = $("#service_acceuil");


//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_evac_valider").toggle(true);
$("#bouton_evac_modifier").toggle(false);

//Au debut on active tous les champs
evacue_vers.attr('readonly', false).css({'background': '#fff'});
motif_ev_vers.attr('readonly', false).css({'background': '#fff'});
service_acceuil.attr('readonly', false).css({'background': '#fff'});


$("#bouton_evac_valider").click(function () {
if (valid == true) {

	evacue_vers.attr('readonly', true).css({'background': '#f8f8f8'});
	motif_ev_vers.attr('readonly', true).css({'background': '#f8f8f8'});
	service_acceuil.attr('readonly', true).css({'background': '#f8f8f8'});
	//motif_ev_vers.attr('readonly', true).css({'background': '#f8f8f8'});
	
    $("#bouton_evac_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
    $("#bouton_evac_valider").toggle(false); //on cache le bouton permettant de valider les champs
}
return false;
});

$("#bouton_evac_modifier").click(function () {
	evacue_vers.attr('readonly', false).css({'background': '#fff'});
	motif_ev_vers.attr('readonly', false).css({'background': '#fff'});
	service_acceuil.attr('readonly', false).css({'background': '#fff'});
	//motif_ev_vers.attr('readonly', false).css({'background': '#fff'});
	
$("#bouton_evac_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
$("#bouton_evac_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
return false;
});










//********************* REFERENCE*****************************






var reference = $("#reference");
var motif_ref= $("#motif_ref");
var refere_de = $("#refere_de");


//Au debut on cache le bouton modifier et on affiche le bouton valider
$("#bouton_ref_valider").toggle(true);
$("#bouton_ref_modifier").toggle(false);

//Au debut on active tous les champs
reference.attr('readonly', false).css({'background': '#fff'});
motif_ref.attr('readonly', false).css({'background': '#fff'});
refere_de.attr('readonly', false).css({'background': '#fff'});


$("#bouton_ref_valider").click(function () {
if (valid == true) {

	reference.attr('readonly', true).css({'background': '#f8f8f8'});
	motif_ref.attr('readonly', true).css({'background': '#f8f8f8'});
	refere_de.attr('readonly', true).css({'background': '#f8f8f8'});
	//motif_ev_vers.attr('readonly', true).css({'background': '#f8f8f8'});
	
    $("#bouton_ref_modifier").toggle(true);  //on affiche le bouton permettant de modifier les champs
    $("#bouton_ref_valider").toggle(false); //on cache le bouton permettant de valider les champs
}
return false;
});

$("#bouton_ref_modifier").click(function () {
	reference.attr('readonly', false).css({'background': '#fff'});
	motif_ref.attr('readonly', false).css({'background': '#fff'});
	refere_de.attr('readonly', false).css({'background': '#fff'});
	//motif_ev_vers.attr('readonly', false).css({'background': '#fff'});
	
$("#bouton_ref_modifier").toggle(false);   //on cache le bouton permettant de modifier les champs
$("#bouton_ref_valider").toggle(true);    //on affiche le bouton permettant de valider les champs
return false;
});















  formulaire.submit();
    // Suppression du formulaire
    document.body.removeChild(formulaire);

<?php
echo $this->headLink()->appendStylesheet($this->basePath().'/css/pikachoose/bottom.css');
echo  $this->headScript()->appendFile($this->basePath().'/js/plugins/pikachoose/jquery.jcarousel.min.js');
echo  $this->headScript()->appendFile($this->basePath().'/js/plugins/pikachoose/jquery.pikachoose.min.js');
?>

<!-- les scripts des images dans examen morphologique   -->
<?php echo $this->headScript()->appendFile($this->basePath().'/js/plugins/fancybox/source/jquery.fancybox.js');?>

<?php echo $this->headLink()->appendStylesheet($this->basePath().'/js/plugins/fancybox/source/jquery.fancybox.css');?>
<?php
echo $this->headScript()->appendFile($this->basePath().'/js/mesjs/accouchement/complementcons_accordeon_controle.js');

echo $this->headLink()->appendStylesheet($this->basePath().'/css/mescss/bloquerDate.css'); //DatePicker
echo $this->headScript()->appendFile($this->basePath().'/js/mesjs/bloquerDate.js'); //Pour bloquer certaines dates?>




   document.body.appendChild(formulaire);



<?php echo $this->headLink()->appendStylesheet($this->basePath().'/css/maternite/accouchement/styleAdmission.css');?>
<?php echo $this->headLink()->appendStylesheet($this->basePath().'/css/mescss/bloquerDate.css'); //DatePicker;?>
<!-- MES JS -->
<?php echo $this->headScript()->appendFile($this->basePath().'/js/maternite/accouchement/jsAdmissionTest.js');
echo $this->headScript ()->appendFile ( $this->basePath () . '/js/maternite/accouchement/jsMaternite.js' );?>

<?php use  Maternite\View\Helper\DateHelper;
$Control = new DateHelper();?>

<script type="text/javascript">
var base_url = window.location.toString();
var tabUrl = base_url.split("public");

$('#plus_admission').toggle(true);
$("#admission").replaceWith("<li id='admission' style='background:#4a5765;'><a href=''><span style='margin-left:0px; color: #ffffff; font-weight:bold; font-size:20px; font-family:Times New Roman;'> <img style='display: inline;' src='"+tabUrl[0]+"public/images_icons/moin-green2.png' alt='Liste' /> Admission Patiente </span></a></li>");
dep_admission1();
$('#admission_style').css({'font-weight':'bold','color':'white','font-size':'22px'});


$(window).load(function () {
	$('#wait').toggle(false);
	$('#contenuDesInterfaces').fadeIn().css({'visibility':'visible'});
});
</script>






<!--************************************************************************************************************-->
<!--===================================== BLOCAGE DES JOURS NON CONSULTABLE ====================================-->
<!--===================================== BLOCAGE DES JOURS NON CONSULTABLE ====================================-->
<!--************************************************************************************************************-->



<style>
#contenuDesInterfaces{ visibility: hidden; };
</style>


<div id="titre" style='font-family: police2; text-decoration:none; color: green; font-size: 18px; font-weight: bold; padding-left: 35px;'><iS style='font-size: 25px;'>&curren;</iS> RECHERCHER LE PATIENT</div>
     
<div id="wait" style="color: gray; font-size: 20px; text-align: center; margin-top: 80px;" > <span> Chargement ... </span> </div>
     
<div id="contenuDesInterfaces" >
     <div id="contenu" >
        <div style="margin-right: 45px; float:right; font-size: 15px; color: gray; margin-top:5px;"><a style="text-decoration: none; cursor:pointer;" href="javascript:ajouterMaman()" ><img src='../images_icons/aj.gif' title="ajouter" /><i style="font-family: Times New Roman; font-size: 15px; color: green;"> ajouter un patient</i></a></div>
		<table style='width:95%; margin-left: 10px; align:center' class="table table-bordered tab_list_mini" id="patient">
			<thead >
			    <tr >
				    <th id="idpatient_" style='width: 15%;'><input type="text" name="search_browser" value=" Numero_Dossier" class="search_init" /></th>
					<th id="nom_" style='width: 15%;'><input type="text" name="search_browser" value=" Nom" class="search_init" /></th>
					<th id="prenom_" style='width: 17%;'><input type="text" name="search_browser" value=" Pr&eacute;nom" class="search_init" /></th>
					<th id="date_" style='width: 13%;'><input type="text" name="search_browser" value=" Date naissance" class="search_init" /></th>
					<th id="adresse_" style='width: 28%;'><input type="text" name="search_browser" value=" Adresse" class="search_init" /></th>
					<th id="effectuer_" style='width: 8%;'><input type="hidden" value="" class="" />Options</th>

				</tr>

			</thead>

			<tbody id="donnees" class="liste_patient">

	            <?php /* AFFICHAGE DE LA LISTE DES PATIENTS */?>

			</tbody>

		</table>

<script type="text/javascript">
initialisation();
</script>
</div>

<!-- POP UP pour Confirmation Suppression -->
                            <div id="confirmation" title="Informations" style="display:none;">
                              <div id="info" style="font-size: 16px;">

                              </div>
                            </div>


<!-- LES BOUTONS "TERMINER" ou "VALIDER" -->





    <div id="declarer_deces">
          <a href="" id="precedent" style="text-decoration: none; font-family: police2; width:50px; margin-left:30px;">
	        <img style=" display: inline; " src='<?php echo $this->basePath().'/images_icons/transfert_gauche.PNG'?>' alt='Constantes' title="Rechercher" />
		    Pr&eacute;c&eacute;dent
		  </a>

		  <div id="info_patient">
		  </div>

		  <?php $today = new \DateTime('now');
		  $date = $today->format ( 'd/m/Y H:i' );?>
		  <div id="titre_info_deces">Admission    <div style='float:right; margin-right:15px; font-size:14px;'> Saint-Louis le, <?php echo $date;?></div></div>
		  <div id="barre_separateur">
		  </div>

		  <?php $form = $this->form ;
		        $form->setAttribute ( 'action', $this->url ( 'accouchement', array ('action' => 'enregistrer-admission') ) );
		        $form->setAttribute ( 'id' , 'formulairePrincipal');
		        $form->prepare();
		        echo $this->form()->openTag($form);
		       ?>
		  <?php echo $this->formhidden($form->get('id_patient')); ?>    
		    
		  <div id="info_bebe" style='width: 100%; margin-top:10px; height:500px;'>
               <div style="float:left; width:20%; height:10%;">
		       </div>
		       <div style='width: 77%; float:left;'>
		         <table id="form_patient" style="width:100%;">
		             <tr id="form_patient_radio" style='width: 100%;'>Antecedents et Grossesse
		                   
		                
	 <td class="nombre" style='width: 33%;'><?php echo $this->formRow($form->get('enf_viv'));?></td>
		                  <td class="nombre" style='width: 33%;'><?php echo $this->formRow($form->get('geste'));?></td>
		                   <td class="nombre" style='width: 33%;'><?php echo $this->formRow($form->get('parite'));?></td>              
		                  <td class="nombre" style='width: 33%;'><?php echo $this->formRow($form->get('nb_cpn'));?></td>
		              </tr> 
		         
		                <tr>
		                  <td style='width: 33%;'>
                           <div class="comment-form-patient" ><label style='top: 5px;'>MORT-NE </label></div>
                           <div class="comment-form-patient_radio" ><?php echo $this->formRow($form->get('mort_ne'));?></div>
		                 </td>
		                  <td style='width: 33%;'>
		                   <div class="comment-form-patient" ><label style='top: 5px;'>CESAR</label></div> 
		                   <div class="comment-form-patient_radio" ><?php echo $this->formRow($form->get('cesar'));?></div>
		                 </td>
		                    <td style='width: 33%;'>
		                   <div class="comment-form-patient" ><label style='top: 5px;'>DYSTOCIE</label></div> 
		                   <div class="comment-form-patient_radio" ><?php echo $this->formRow($form->get('dystocie'));?></div>
		                 </td>
		                  <td >
		                   <div class="comment-form-patient" ><label style='top: 5px;'>ECLAMPSIE</label></div> 
		                   <div class="comment-form-patient_radio" ><?php echo $this->formRow($form->get('eclampsie'));?></div>
		              </td>
		              
		            
		              </tr>
		              <tr>
		                <td class="comment-form-patient" style='width: 33%;'><?php echo $this->formRow($form->get('ddr'));?></td>
		                <td class="nombre" style='width: 37%; /*25px;'><?php echo $this->formRow($form->get('duree_grossesse'));?></td>
		                     <td class="comment-form-patient" style='width: 33%;'><?php echo $this->formRow($form->get('bb_attendu'));?></td>
		             
		              </tr>
		              <tr>
		                   <td class="comment-form-patient" style='width: 33%;'>
		                <?php echo $this->formRow($form->get('vat_1'));?>
		                 <?php echo $this->formRow($form->get('vat_2'));?>
		                 <?php echo $this->formRow($form->get('vat_3'));?></td>
		                   
                   

		              </tr>
		              </table>
		       </div>
		       <div style="float:left; width:5%;">
		       </div>
		  </div>

		  <div style='width: 90%; height: 60px;'>
		     
                  <div id="terminer_annuler">
                    <div class="block" id="thoughtbot">
                       <button name="annuler" id="annuler" style=" height:35px; ">Annuler</button>
                    </div>
                    
                    <div class="block termineradmission" id="thoughtbot">
                       <button id="termineradmission" style=" height:35px; ">Terminer</button>
                    </div>
                  </div>
                </div>
                <div style='width: 40%;'></div>
          </div>
          <?php echo $this->form()->closeTag(); ?>
		  
    </div>
    
</div>

    

<div id="context-menu">
    <ul class="dropdown-menu" >
         <li><a style="cursor: pointer;" ><img id="visualiserCTX" style='margin-right: 10px; width: 19px; height: 16px;' src='/simens/public/images_icons/voir2.png'>Visualiser</a></li>
         <li class="divider2"></li>
         <li><a style="cursor: pointer;"><img  id="suivantCTX" style='margin-right: 10px; width: 19px; height: 16px;' src='/simens/public/images_icons/transfert_droite.png'>Suivant</a></li>
         <li class="divider"></li>
         <li><a id="quitterCTX"  style="cursor: pointer;">Quitter</a></li>
    </ul>
</div>
		
		
<script>
animation();
$('#service').val("");
function ajouterMaman(){
	vart=tabUrl[0]+'public/accouchement/ajouter';
    $(location).attr("href",vart);
    return false;
}

</script>