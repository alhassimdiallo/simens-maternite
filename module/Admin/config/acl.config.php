<?php
return array(
    'acl' => array(
    		
        'roles' => array(
        		
        		
        		'guest'   => null,
        		'infirmier' => 'guest',
        		'laborantin' => 'guest',
        		'admin' => 'guest',
        		'radiologie' => 'guest',
        		'anesthesie' => 'guest',
        		'major' => 'guest',
        		'facturation' => 'guest',
        		'etat_civil' => 'guest',
        		'archivage' => 'guest',
        		//'superAdmin' => 'guest',
        		//***Polyclinique
        		//***Polyclinique
        		'cardiologue' => 'guest',
        		'gynecologue' => 'guest',
        		'pediatre' => 'guest',
        		'psychiatre' => 'guest',
        		'pneumologue' => 'guest',
        		'orl' => 'guest',
        		'kinesiterapeute' => 'guest',
        		'sage_femme' => 'guest',
        		//***************
        		//***************

        		
        		'surveillant' => 'guest',
        		'medecin'     => 'surveillant',
        		
        		'superAdmin'  => 'medecin'
        		
        		
        ),
    		

    		'resources' => array(
    		
    				'allow' => array(
    						
    						/***
    						 * AdminController
    						 */
    						
    						'Admin\Controller\Admin' => array(
    								'login' => 'guest',
    								'logout' => 'guest',
    								'bienvenue' => 'guest',
    								'modifier-password' => 'guest',
    								'verifier-password' => 'guest',
    								'mise-a-jour-user-password' => 'guest',
    								
    								'utilisateurs' => array('admin','superAdmin'),
    								'liste-utilisateurs-ajax' => array('admin','superAdmin'),
    								'modifier-utilisateur' => array('admin','superAdmin'),
    								'liste-agent-personnel-ajax' => array('admin','superAdmin'),
    								'visualisation' => array('admin','superAdmin'),
    								'nouvel-utilisateur' => array('admin','superAdmin'),
    								'verifier-username' => array('admin','superAdmin'),

    								'parametrages' => array('admin','superAdmin'),
    								'gestion-des-hopitaux' => array('admin','superAdmin'),
    								'liste-hopitaux-ajax' => array('admin','superAdmin'),
    								'get-departements' => array('admin','superAdmin'),
    								'ajouter-hopital' => array('admin','superAdmin'),
    								'get-infos-hopital' => array('admin','superAdmin'),
    								'get-infos-modification-hopital' => array('admin','superAdmin'),
    								
    								'gestion-des-batiments' => array('admin','superAdmin'),
    								'gestion-des-services' => array('admin','superAdmin'),
    								'liste-services-ajax' => array('admin','superAdmin'),
    								'get-infos-service' => array('admin','superAdmin'),
    								'get-infos-modification-service' => array('admin','superAdmin'),
    								'ajouter-service' => array('admin','superAdmin'),
    								'supprimer-service' => array('admin','superAdmin'),
    								
    								'gestion-des-actes' => array('admin','superAdmin'),
    								'liste-actes-ajax' => array('admin','superAdmin'),
    								'get-infos-acte' => array('admin','superAdmin'),
    								'get-infos-modification-acte' => array('admin','superAdmin'),
    								'ajouter-acte' => array('admin','superAdmin'),
    								'supprimer-acte'  => array('admin','superAdmin'),
    								
    						),
    						
    						
    						/***
    						 * FacturationController
    						 */
    						
    						'Facturation\Controller\Facturation' => array(
    								/*Menu Dosssier*/
    								'ajouter' => array('facturation','etat_civil','major','medecin'),
    								'info-patient' => array('facturation','etat_civil','major','medecin'),
    								'modifier' => array('facturation','etat_civil','major','medecin'),
    								'enregistrement-modification' => array('facturation','etat_civil','major','medecin'),
    								'enregistrement' => array('facturation','etat_civil','major','medecin'),
    								
    								'liste-patient' => array('facturation','etat_civil','major','medecin'),
    								'liste-patient-ajax' => array('facturation','etat_civil','major','medecin'),
    								
    								/*Menu Naissance*/
    								'ajouter-naissance' => 'etat_civil',
    								'lepatient' => 'etat_civil',
    								'enregistrer-bebe' => 'etat_civil',
    								'ajouter-naissance-ajax' => 'etat_civil',
    								
    								'liste-naissance' => 'etat_civil',
    								'liste-naissance-ajax' => 'etat_civil',
    								'vue-naissance' => 'etat_civil',
    								'vue-info-maman' => 'etat_civil',
    								'modifier-naissance' => 'etat_civil',
    								
    								'ajouter-maman' => 'etat_civil',
    								'enregistrement-maman' => 'etat_civil',
    								'ajouter-patient' => 'etat_civil',
    								'enregistrement-patient' => 'etat_civil',
    								
    								/*MENU DECES*/
    								'declarer-deces' => 'guest',
    								'liste-patient-declaration-deces-ajax' => 'etat_civil',
    								'le-patient' => 'etat_civil',
    								
    								'liste-patients-decedes' => 'etat_civil',
    								'liste-patient-deces-ajax' => 'etat_civil',
    								'vue-patient-decede' => 'etat_civil',
    								'modifier-deces' => 'etat_civil',
    								'supprimer-deces' => 'etat_civil',
    								
    								/*MENU ADMISSION*/
    								'admission' => array('major', 'medecin','facturation','sage_femme','gynecologue'),
    								'liste-admission-ajax' => array('major', 'medecin','facturation'),
    								'montant' => 'facturation',
    								'enregistrer-admission' => 'facturation',
    								
    								'liste-patients-admis' => 'facturation',
    								'vue-patient-admis' => 'facturation',
    								'supprimer-admission' => 'facturation',
    								'enregistrer-deces' => 'facturation',
    								
    								'impression-pdf' => 'facturation',
    								'impression-facture' => 'facturation',
    								
    								'liste-actes' => 'facturation',
    								'liste-actes-impayes-ajax' => 'facturation',
    								'liste-actes-payes-ajax' => 'facturation',
    								
    								'vue-patient' => 'facturation',
    								'liste-actes-impayes' => 'facturation',
    								'acte-paye' => 'facturation',
    								'impression-facture-acte' => 'facturation',
    								
    								
    								
    								/*MENU ADMISSION BLOC - major*/
    								/*MENU ADMISSION BLOC - major*/
    								'admission-bloc' => array('major', 'medecin','gynecologue'),
    								'enregistrer-admission-bloc' =>  array('major', 'medecin','gynecologue'),
    								'liste-patients-admis-bloc' =>  array('major', 'medecin','gynecologue'),
    								'liste-patient-admis-bloc-ajax' =>  array('major', 'medecin','gynecologue'),
    								'vue-patient-admis-bloc' => array('major', 'medecin','gynecologue'),
    								'modification-admission-bloc' =>  array('major', 'medecin','gynecologue'),
    								'get-service' => array('major', 'medecin','gynecologue'),
    								'supprimer-admission-bloc' => array('major', 'medecin','gynecologue'),
    								'supprimer-patient' => array('major', 'medecin','gynecologue'),
    						),
    						
    						
    						/***
    						 * MaterniteController
    						 */

    						'Maternite\Controller\Maternite' => array(
    					
    								
    								//============ MEDECIN =========================
    								'consultation-medecin' => array('sage_femme', 'gynecologue'),
    								'espace-recherche-med' => array('sage_femme', 'gynecologue'),
    								'complement-consultation' =>array('sage_femme', 'gynecologue'),
    								'services' => array('sage_femme', 'gynecologue'),
    								'update-complement-consultation' => array('sage_femme', 'gynecologue'),
    								'maj-complement-consultation' => array('sage_femme', 'gynecologue'),
    								'visualisation-consultation' => array('sage_femme', 'gynecologue'),
    								'visualisation-hospitalisation' => array('sage_femme', 'gynecologue'),
    								'liste-soins-visualisation-hosp' => array('sage_femme', 'gynecologue'), 
    								
    								'imagesExamensMorphologiques' => array('sage_femme', 'gynecologue'),
    								'supprimerImage' => array('sage_femme', 'gynecologue'),
    								'demande-examen' => array('sage_femme', 'gynecologue'),
    								'demande-examen-biologique' => array('sage_femme', 'gynecologue'),
    								
    								'en-cours' => array('sage_femme', 'gynecologue','infirmier'),
    								'liste-patient-encours-ajax' => array('sage_femme', 'gynecologue'),
    								'info-patient' => array('sage_femme', 'gynecologue'),
    								'detail-info-liberation-patient' =>array('sage_femme', 'gynecologue'),
    								'info-patient-hospi' => array('sage_femme', 'gynecologue'),
    								'liste-soin' => array('sage_femme', 'gynecologue'),
    								'supprimer-soin' => array('sage_femme', 'gynecologue'),
    								'modifier-soin' => array('sage_femme', 'gynecologue'),
    								'vue-soin-appliquer' => array('sage_femme', 'gynecologue'),
    								'liberer-patient' => array('sage_femme', 'gynecologue'),
    								'liste-soins-prescrits' => array('sage_femme', 'gynecologue'),
    								'recherche-visualisation-consultation' => array('sage_femme', 'gynecologue'),
    								'enregistrer-examen-du-jour' =>array('sage_femme', 'gynecologue'),
    								'liste-examen-du-jour' => array('sage_femme', 'gynecologue'),
    								'supprimer-examen-jour' => array('sage_femme', 'gynecologue'),
    								'vue-examen-jour' => array('sage_femme', 'gynecologue'),
    								
    								'supprimer-image-morpho' => 'guest', //radiologie et archivage
    								'images-examens-morphologiques' => 'guest', //radiologie et archivage
    								
    								
    								'test-mp3' => 'gynecologue',
    								'ajouter-mp3' => 'gynecologue',
    								'afficher-mp3' => 'gynecologue',
    								'supprimer-mp3' => 'gynecologue',
    								'inserer-bd-mp3' => 'gynecologue',
    								
    								'afficher-video' => 'gynecologue',
    								'ajouter-video' => 'gynecologue',
    								'inserer-bd-video' => 'gynecologue',
    								'supprimer-video' => 'gynecologue',
    								/**PDF**/
    								'impression-Pdf' => 'gynecologue',
    								'tarifacte' => 'gynecologue',
    								'demande-acte' => 'gynecologue', 								
    								
    								//POUR LE BLOC OPERATOIRE
    								//POUR LE BLOC OPERATOIRE
    								'protocole-operatoire' => 'gynecologue',
    								'liste-patient-admis-bloc-ajax' => 'gynecologue',
    								'vue-patient-admis-bloc' => 'gynecologue',
    								'imprimer-protocole-operatoire' => 'gynecologue',
    								'enregistrer-protocole-operatoire' => 'gynecologue',
    								'liste-protocole-operatoire' => 'gynecologue',
    								'liste-patients-operes-bloc-ajax' => 'gynecologue',
    								'vue-patient-opere-bloc' => 'gynecologue',
    								'modifier-protocole-operatoire' => 'gynecologue',
    						        'image-protocole-operatoire' => 'gynecologue',
         						    'supprimer-image-protocole-operatoire' => 'gynecologue',
    						        'supprimer-images-sans-protocole' => 'gynecologue',
    						        'afficher-mp3-protocole' => 'gynecologue',
    								'test' => 'infirmier',
    								
    								
    						),
    								
    								
    						//ACCOUCHEMENT CONTROLLER
    								
    						'Maternite\Controller\Accouchement' => array(
    								'creer-dossier-patiente' => array('gynecologue','infirmier'),
    								'ajouter-patiente' => array('gynecologue','infirmier'),
    								'ajouter' =>array('gynecologue','infirmier'),
    								'enregistrement'=>array('gynecologue','infirmier'),
    								'liste-patient'=>array('gynecologue','infirmier'),
    								'liste-patient-ajax'=>array('gynecologue','infirmier'),
    								'info-patient'=>array('gynecologue','infirmier'),
    								'infos-patient'=>array('gynecologue','infirmier'),
    								'infos-patient_hospi'=>array('gynecologue','infirmier'),
    								'info-patient-admis'=>array('gynecologue','infirmier'),
    								'supprimer'=>array('gynecologue','infirmier'),
    								'supprimer-patient'=>array('gynecologue','infirmier'),
    								'modifier'=>array('gynecologue','infirmier'),
    								'admission-grossesse-normal'=>array('gynecologue','infirmier'),
    							    'admission-grossesse-pathologique'=>array('gynecologue','infirmier'),
    								'enregistrement-modification' =>array('gynecologue','infirmier'),
    								'complement-admission' =>array('gynecologue','infirmier'),
    								'admission' =>array('gynecologue','infirmier'),
    								'enregistrer-admission' =>array('gynecologue','infirmier'),
    								'liste-admission-ajax'=>array('gynecologue','infirmier'),
    								'declarer-deces'=>array('gynecologue','infirmier'),
    								'admission-test'=>array('gynecologue','infirmier'),
    								'liste-patients-admis'=>array('gynecologue','infirmier'),
    								'vue-patient-admis'=>array('gynecologue','infirmier'),
    								'accoucher'=>array('gynecologue','infirmier'),
    								'complement-accouchement'=>array('gynecologue','infirmier'),
    								'maj-accouchement'=>array('gynecologue','infirmier'),
    								'maj-complement-accouchement'=>array('gynecologue','infirmier'),
    								'update-complement-accouchement'=>array('gynecologue','infirmier'),
    								'impression-pdf'=>array('gynecologue','infirmier'),
    								'en-cours'=>array('gynecologue','infirmier'),
    								'liste-patient-encours-ajax'=>array('gynecologue','infirmier'),
    								'liste-soins-prescrits'=>array('gynecologue','infirmier'),
    								'liste-soin'=>array('gynecologue','infirmier'),
    								'vue-soin-appliquer'=>array('gynecologue','infirmier'),
    								'supprimer-soin'=>array('gynecologue','infirmier'),
    								'liste-soins-prescrits'=>array('gynecologue','infirmier'),
    								'modifier-soin'=>array('gynecologue','infirmier'),
    								'detail-info-liberation-patient'=>array('gynecologue','infirmier'),
    								'liste-soins-visualisation-hosp'=>array('gynecologue','infirmier'),
    								'enregistrer-examen-du-jour'=>array('gynecologue','infirmier'),
    								'liste-examen-du-jour'=>array('gynecologue','infirmier'),
    								'liberer-patient'=>array('gynecologue','infirmier'),
    								'vue-examen-jour'=>array('gynecologue','infirmier'),
    						),
    						
    						/***
    						 * ConsultationController
    						*/
    						
    						'Consultation\Controller\Consultation' => array(
    								//============  SURVEILLANT  ===================
    								'recherche' => 'surveillant',
    								'espace-recherche-surv' => 'surveillant',
    								'maj-consultation' => 'surveillant',
    								'ajout-constantes' => 'surveillant',
    								'ajout-donnees-constantes' => 'surveillant',
    								'maj-cons-donnees' => 'surveillant',
    						
    								//============ MEDECIN =========================
    								'consultation-medecin' => 'medecin',
    								'espace-recherche-med' => 'medecin',
    								'complement-consultation' => 'medecin',
    								'services' => 'medecin',
    								'update-complement-consultation' => 'medecin',
    								'maj-complement-consultation' => 'medecin',
    								'visualisation-consultation' => 'medecin',
    								'visualisation-hospitalisation' => array('medecin','gynecologue'),
    								'liste-soins-visualisation-hosp' => array('medecin','gynecologue'),
    						
    								'imagesExamensMorphologiques' => 'medecin',
    								'supprimerImage' => 'medecin',
    								'demande-examen' => 'medecin',
    								'demande-examen-biologique' => 'medecin',
    						
    								'en-cours' => array('medecin','infirmier','gynecologue'),
    								'liste-patient-encours-ajax' => array('medecin','infirmier','gynecologue'),
    								'info-patient' => array('medecin','infirmier','gynecologue'),
    								'detail-info-liberation-patient' => array('medecin','infirmier','gynecologue'),
    								'info-patient-hospi' => array('medecin','infirmier','gynecologue'),
    								'liste-soin' => array('medecin','infirmier','gynecologue'),
    								'supprimer-soin' =>array('medecin','infirmier','gynecologue'),
    								'modifier-soin' => array('medecin','infirmier','gynecologue'),
    								'vue-soin-appliquer' => array('medecin','infirmier','gynecologue'),
    								'liberer-patient' => array('medecin','infirmier','gynecologue'),
    								'liste-soins-prescrits' => array('medecin','infirmier','gynecologue'),
    								'recherche-visualisation-consultation' =>array('medecin','infirmier','gynecologue'),
    								'enregistrer-examen-du-jour' => array('medecin','infirmier','gynecologue'),
    								'liste-examen-du-jour' => array('medecin','infirmier','gynecologue'),
    								'supprimer-examen-jour' => array('medecin','infirmier','gynecologue'),
    								'vue-examen-jour' => array('medecin','infirmier','gynecologue'),
    						
    								'supprimer-image-morpho' => 'guest', //radiologie et archivage
    								'images-examens-morphologiques' => 'guest', //radiologie et archivage
    						
    						
    								'test-mp3' => 'medecin',
    								'ajouter-mp3' => 'medecin',
    								'afficher-mp3' => 'medecin',
    								'supprimer-mp3' => 'medecin',
    								'inserer-bd-mp3' => 'medecin',
    						
    								'afficher-video' => 'medecin',
    								'ajouter-video' => 'medecin',
    								'inserer-bd-video' => 'medecin',
    								'supprimer-video' => 'medecin',
    								/**PDF**/
    								'impression-Pdf' => 'medecin',
    								'tarifacte' => 'medecin',
    								'demande-acte' => 'medecin',



    						
    						
    								//POUR LE BLOC OPERATOIRE
    								//POUR LE BLOC OPERATOIRE

    							'protocole-operatoire' => 'medecin',
    								'liste-patient-admis-bloc-ajax' => 'medecin',
    								'vue-patient-admis-bloc' => 'medecin',
    								'imprimer-protocole-operatoire' => 'medecin',
    								'enregistrer-protocole-operatoire' => 'medecin',
    								'liste-protocole-operatoire' => 'medecin',
    								'liste-patients-operes-bloc-ajax' => 'medecin',
    								'vue-patient-opere-bloc' => 'medecin',
    								'modifier-protocole-operatoire' => 'medecin',
    								'image-protocole-operatoire' => 'medecin',
    								'supprimer-image-protocole-operatoire' => 'medecin',
    								'supprimer-images-sans-protocole' => 'medecin',
    								'afficher-mp3-protocole' => 'medecin',
    						),


                                    /* **
    						 * PersonnelController
    						  */
    						
    						'Personnel\Controller\Personnel' => array(
    								'liste-personnel' => array('admin','superAdmin'),
    								'liste-personnel-ajax' => array('admin','superAdmin'),
    								'info-personnel' => array('admin','superAdmin'),
    								'supprimer' => array('admin','superAdmin'),
    								'modifier-dossier' => array('admin','superAdmin'),
    								'dossier-personnel' => array('admin','superAdmin'),
    								
    								'transfert' => array('admin','superAdmin'),
    								'liste-personnel-transfert-ajax' => array('admin','superAdmin'),
    								'popup-agent-personnel' => array('admin','superAdmin'),
    								'vue-agent-personnel' => array('admin','superAdmin'),
    								'services' => array('admin','superAdmin'),
    								
    								'liste-transfert' => array('admin','superAdmin'),
    								'liste-transfert-ajax' => array('admin','superAdmin'),
    								'supprimer-transfert' => array('admin','superAdmin'),
    								
    								'intervention' => array('admin','superAdmin'),
    								'liste-personnel-intervention-ajax' => array('admin','superAdmin'),
    								'liste-intervention' => array('admin','superAdmin'),
    								'liste-intervention-ajax' => array('admin','superAdmin'),
    								'supprimer-transfert' => array('admin','superAdmin'),
    								'info-personnel-intervention' => array('admin','superAdmin'),
    								'vue-intervention-agent' => array('admin','superAdmin'),
    								'supprimer-intervention' => array('admin','superAdmin'),
    								'supprimer-une-intervention' => array('admin','superAdmin'),
    								'save-intervention' => array('admin','superAdmin'),
    								'modifier-intervention-agent' => array('admin','superAdmin'),
    						),
    						
    					/***
    						 * HospitalisationController
    						 */
    						
    						'Hospitalisation\Controller\Hospitalisation' => array(
    								
    								'suivi-patient' => array( 'infirmier','gynecologue'),
    								'liste-patient-suivi-ajax' => array( 'infirmier','gynecologue'),
    								'vue-soin-appliquer' => array( 'infirmier','gynecologue'),
    								'administrer-soin-patient' => array( 'infirmier','gynecologue'),
    								'application-soin' => array( 'infirmier','gynecologue'),
    								'raffraichir-liste' => array( 'infirmier','gynecologue'),
    								
    								'en-cours' => array( 'infirmier','gynecologue'),
    								'liste-patient-encours-ajax' => array( 'infirmier','gynecologue'),
    								'liste-soin' => array( 'infirmier','gynecologue'),
    								'supprimer-soin' => array( 'infirmier','gynecologue'),
    								'modifier-soin' => array( 'infirmier','gynecologue'),
    								'detail-info-liberation-patient' => array( 'infirmier','gynecologue'),
    								'liberer-patient' =>array( 'infirmier','gynecologue'),
    								'heure-suivante' => array( 'infirmier','gynecologue'),
    								'heure-passee' => array( 'infirmier','gynecologue'),
    								'liste-soins-du-jour-a-appliquer' =>array( 'infirmier','gynecologue'),
    								'details-infos-soin-a-appliquer' => array( 'infirmier','gynecologue'),
    								'heure-du-soin' => array( 'infirmier','gynecologue'),
    								
    								
    								'liste-demandes-examens' => 'laborantin',
    								'liste-demandes-examens-ajax' => 'laborantin',
    								'liste-examens-demander' => 'laborantin', 
    								'vue-examen-appliquer' => 'laborantin',
    								'raffraichir-liste-examens-bio' => 'laborantin',
    								'envoyer-examen-bio' => 'laborantin',
    								
    								'verifier-si-resultat-existe' => 'guest',
    								'modifier-examen' => 'guest',
    								'envoyer-examen' => 'guest',
    								'appliquer-examen' => 'guest',
    								'raffraichir-liste-examens' => 'guest',
    								
    								'liste-examens-effectues' => 'laborantin',
    								'liste-recherche-examens-effectues-ajax' => 'laborantin',

    								
    								'liste-demandes-examens-morpho' => 'radiologie',
    								'liste-demandes-examens-morpho-ajax' => 'radiologie',
    								'liste-examens-demander-morpho' => 'radiologie',
    								'vue-examen-appliquer-morpho' => 'radiologie',
    								'liste-examens-effectues-morpho' => 'radiologie',
    								'liste-recherche-examens-effectues-morpho-ajax' => 'radiologie',
    								'ajouter-examen' => 'radiologie',
    								'afficher-video' => 'radiologie',
    								'ajouter-video' => 'radiologie',
    								'inserer-bd-video' => 'radiologie',
    								'supprimer-video' => 'radiologie',
    								
    								
    								
    								'liste-demandes-vpa' =>     array('anesthesie','gynecologue'), 
    								'liste-demandes-vpa-ajax' => array('anesthesie','gynecologue'),
    								'details-demande-visite' =>array('anesthesie','gynecologue'),
    								'save-result-vpa' => array('anesthesie','gynecologue'),
    								'liste-recherche-vpa' => array('anesthesie','gynecologue'),
    								'liste-recherche-vpa-ajax' => array('anesthesie','gynecologue'),
    								'details-recherche-visite' =>array('anesthesie','gynecologue'),
    								
    								
    								
    								'demande-hospitalisation' => array( 'major','infirmier','gynecologue'),
    								'liste-liberer-patients' => array( 'major','infirmier','gynecologue'),
    								'liste-liberer-patient-ajax' => array( 'major','infirmier','gynecologue'),
    								'liberation-patient' => array( 'major','infirmier','gynecologue'),
    								'liberer-patient_major' =>array( 'major','infirmier','gynecologue'),
    								'info-patient-liberer' => array( 'major','infirmier','gynecologue'),
    								
    								'liste-patient-ajax' => array( 'major','infirmier','gynecologue'),
    								'salles' => array( 'major','infirmier','gynecologue'),
    								'lits' => array( 'major','infirmier','gynecologue'),
    								'liste' => array( 'major','infirmier','gynecologue'),
    								'info-patient' => array( 'major','infirmier','gynecologue'),
    								'info-patient-hospi' => array( 'major','infirmier','gynecologue'),
    								
    								'gestion-des-lits' => array( 'major','infirmier','gynecologue'),
    								'liste-lits-ajax' => array( 'major','infirmier','gynecologue'),
    								'occuper-lit' => array( 'major','infirmier','gynecologue'),
    								'liberer-lit' => array( 'major','infirmier','gynecologue'),
    								'etat-lit' =>array( 'major','infirmier','gynecologue'),
    								'information-patient' => array( 'major','infirmier','gynecologue'),
    								'info-lit-salle-batiment' => array( 'major','infirmier','gynecologue'),
    								
    								
     						),
    						
    						
    						/***
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						 * ArchivageController
    						*/
    						
    						'Archivage\Controller\Archivage' => array(
    								/*Consultation */
    								'index' => array('archivage','medecin', 'gynecologue'),
    								'consulter' => array('archivage','medecin', 'gynecologue'),
    								'liste-consultation' => array('archivage','medecin', 'gynecologue'),
    								'hospitaliser' => array('archivage','medecin', 'gynecologue'),
    								'consultation' => array('archivage','medecin', 'gynecologue'), 
    								'update-complement-consultation' => array('archivage','medecin', 'gynecologue'), 
    								'visualisation-consultation' => array('archivage','medecin', 'gynecologue'),
    						        'visualisation-consultation-vue' => array('archivage','medecin', 'gynecologue'),
    								'visualiser-consultation' => array('archivage','medecin', 'gynecologue'),
    								'ajouter-mp3' => array('archivage','medecin', 'gynecologue'),
    								'afficher-mp3' => array('archivage','medecin', 'gynecologue'),
    								'supprimer-mp3' => array('archivage','medecin', 'gynecologue'),
    								'inserer-bd-mp3' => array('archivage','medecin', 'gynecologue'),
    								'afficher-video' => array('archivage','medecin', 'gynecologue'),
    								'ajouter-video' => array('archivage','medecin', 'gynecologue'),
    								'inserer-bd-video' => array('archivage','medecin', 'gynecologue'),
    								'supprimer-video' => array('archivage','medecin', 'gynecologue'),
    						        'demande-examen-biologique'=> array('archivage','medecin'),
    						        'demande-examen' => array('archivage','medecin', 'gynecologue'),
    						        'images-examens-morphologiques' => array('archivage','medecin', 'gynecologue'),
    						        'supprimer-image' => array('archivage','medecin', 'gynecologue'),
    								
    								/*Facturation*/
    								'ajouter' => array('archivage','medecin'),
    								'enregistrement' => array('archivage','medecin'),
    								'liste-dossiers-patients' => array('archivage','medecin'),
    								'liste-patient-ajax' => array('archivage','medecin'),
    								'info-dossier-patient' => array('archivage','medecin'),
    								'modifier' => array('archivage','medecin'),
    								'enregistrement-modification' => array('archivage','medecin'),
    								'admission' => array('archivage','medecin'),
    								'liste-admission-ajax' => array('archivage','medecin'),
    								'popup-visualisation' => array('archivage','medecin'),
    								'montant' => array('archivage','medecin'),
    								'enregistrer-admission' => array('archivage','medecin'),
    								'liste-admission' => array('archivage','medecin'),
    								'vue-patient-admis' => array('archivage','medecin'),
    								'supprimer-admission'  => array('archivage','medecin'),
    								
    								/*Hospitalisation*/
    								'info-patient' => array('archivage','medecin'),
    								'info-patient-hospi' => array('archivage','medecin'),
    								'liste-patient-encours-ajax' => array('archivage','medecin'),
    								'liste-demande-hospitalisation' => array('archivage','medecin'),
    								'salles' => array('archivage','medecin'),
    								'lits' => array('archivage','medecin'),
    								'services' => array('archivage','medecin'),
    								'administrer-soin' => array('archivage','medecin'),
    								'liste-soins-prescrits' => array('archivage','medecin'),
    								'appliquer-soin' => array('archivage','medecin'),
    								'liste-patient-suivi-ajax' => array('archivage','medecin'),
    								'info-patient-suivi' => array('archivage','medecin'),
    								'administrer-soin-patient' => array('archivage','medecin'),
    								'vue-soin-appliquer' => array('archivage','medecin'),
    								'heure-suivante' => array('archivage','medecin'),
    								'application-soin' => array('archivage','medecin'),
    								'raffraichir-liste' => array('archivage','medecin'),
    								'detail-info-liberation-patient' => array('archivage','medecin'),
    								'liste-demande-hospi-ajax' => array('archivage','medecin'),
    								'liberer-patient' => array('archivage','medecin'),
    								'liste-examen-du-jour' => array('archivage','medecin'),
    								'modifier-soin' => array('archivage','medecin'),
    								'supprimer-soin' => array('archivage','medecin'),
    								'information-patient' => array('archivage','medecin'),
    								
    								/*Radiologie*/
    								'liste-resultats-radiologie' => array('archivage','medecin'),
    								'liste-recherche-examens-effectues-morpho-ajax' => array('archivage','medecin'),
    								'liste-examens-demander-morpho' => array('archivage','medecin'),
    								'verifier-si-resultat-existe' => array('archivage','medecin'),
    								'vue-examen-appliquer-morpho' => array('archivage','medecin'),
    								
    								/*Biologie*/
    								'ajouter-resultat-biologique' => array('archivage','medecin'),
    								'liste-demandes-examens-ajax' => array('archivage','medecin'),
    								'liste-examens-demander' => array('archivage','medecin'),
    								'verifier-si-resultat-existe' => array('archivage','medecin'),
    								'vue-examen-appliquer' => array('archivage','medecin'),
    								'appliquer-examen' => array('archivage','medecin'),
    								'raffraichir-liste-examens-bio' => array('archivage','medecin'),
    								'modifier-examen' => array('archivage','medecin'),
    								'envoyer-examen-bio' => array('archivage','medecin'),
    								'liste-resultats-biologie' => array('archivage','medecin'),
    								'liste-recherche-examens-effectues-ajax' => array('archivage','medecin'),
    								
    								/*Anesth�sie*/
    								'ajouter-resultat-vpa' => array('archivage','medecin','gynecologue'),
    								'liste-demandes-vpa-ajax' => array('archivage','medecin','gynecologue'),
    								'details-demande-visite' => array('archivage','medecin','gynecologue'),
    								'liste-resultats-vpa' => array('archivage','medecin','gynecologue'),
    								'liste-recherche-vpa-ajax' => array('archivage','medecin','gynecologue'),
    								'save-result-vpa' => array('archivage','medecin','gynecologue'),
    								'details-recherche-visite' => array('archivage','medecin','gynecologue'),
    								
    						),
    				),
    		),
    )
);