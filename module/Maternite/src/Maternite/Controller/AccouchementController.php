<?php

namespace Maternite\Controller;
//use Maternite\Form\ConsultationForm;
use Zend\Json\Json;
use Zend\Form\Form;
use Zend\Form\View\Helper\FormRow;
use Zend\Form\View\Helper\FormInput;
use Maternite\View\Helpers\DateHelper;
use Zend\Mvc\Controller\AbstractActionController;
use Maternite\Form\PatientForm;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Sql;
use Maternite\Form\AjoutDecesForm;
use Maternite\Form\accouchement\AdmissionForm;
use Maternite\Form\accouchement\ConsultationForm;
use Maternite;
//use Maternite\Form\accouchement\SoinForm;
use Zend\Form\View\Helper\FormTextarea;
use Zend\Form\View\Helper\FormHidden;
use Maternite\Form\accouchement\LibererPatientForm;
use Zend\Form\View\Helper\FormText;
use Zend\Form\View\Helper\FormSelect;
use Maternite\View\Helpers\DocumentPdf;
use Maternite\View\Helpers\DemandeExamenPdf;
use Maternite\View\Helpers\OrdonnancePdf;
use Maternite\View\Helpers\TraitementChirurgicalPdf;
use Maternite\View\Helpers\TraitementInstrumentalPdf;
use Maternite\View\Helpers\RendezVousPdf;
use Maternite\View\Helpers\TransfertPdf;
use Maternite\View\Helpers\HospitalisationPdf;


//use Maternite\Model\ServiceTable;
//use Maternite\Model\Service;
//use Maternite\Model\TarifConsultationTable;

class AccouchementController extends AbstractActionController

{
	protected $controlDate;
    protected $patientTable;
    protected $evacuationTable;
    protected $referenceTable;
     protected $formPatient;
     protected $formAdmission;
    protected $batimentTable;
    protected $consultationTable;
   protected $accouchementTable;
   protected $type_accouchementTable;
   protected $type_admissionTable;
    protected $grossesse;
    protected $antecedent_grossesse;
    protected $naissanceTable;
    protected $dateHelper;
    //protected $consultationTable;
    protected $consultationMaterniteTable;
    protected $motifAdmissionTable;
    protected $rvPatientConsTable;
    protected $serviceTable;
    protected $hopitalTable;
    protected $transfererPatientServiceTable;
    protected $consommableTable;
    protected $donneesExamensPhysiquesTable;
    protected $diagnosticsTable;
    protected $ordonnanceTable;
    protected $demandeVisitePreanesthesiqueTable;
    protected $notesExamensMorphologiquesTable;
    protected $demandeExamensTable;
    protected $ordonConsommableTable;
    protected $antecedantPersonnelTable;
    protected $antecedantsFamiliauxTable;
    protected $demandeHospitalisationTable;
    protected $soinhospitalisationTable;
    protected $soinsTable;
    protected $hospitalisationTable;
    protected $hospitalisationlitTable;
    protected $litTable;
    protected $salleTable;
    protected $tarifConsultationTable;
    protected $resultatVpaTable;
    protected $demandeActeTable;
    protected $admissionTable;
    protected $antecedenttype1Table;
   protected $antecedenttype2Table;
    //use Maternite\Form\accouchement\SoinForm;
    
   protected  $tableGateway;
  //recuperer la table patient  
	public function getPatientTable() {
		if (! $this->patientTable) {
			$sm = $this->getServiceLocator ();
			$this->patientTable = $sm->get ( 'Maternite\Model\PatientTable' );
		}
		return $this->patientTable;
	}
	
	public function getAdmissionTable() {
		if (! $this->admissionTable) {
			$sm = $this->getServiceLocator ();
			$this->admissionTable = $sm->get ( 'Maternite\Model\AdmissionTable' );
		}
		return $this->admissionTable;
	}
	
	public function getAntecedentType1Table() {
		if (! $this->antecedenttype1Table) {
			$sm = $this->getServiceLocator ();
			$this->antecedenttype1Table = $sm->get ( 'Maternite\Model\AntecedentType1Table' );
		}
		return $this->antecedenttype1Table;
	}
	public function getAntecedentType2Table() {
		if (! $this->antecedenttype2Table) {
			$sm = $this->getServiceLocator ();
			$this->antecedenttype2Table = $sm->get ( 'Maternite\Model\AntecedentType2Table' );
		}
		return $this->antecedenttype2Table;
	}
	public function getTarifConsultationTable() {
		if (! $this->tarifConsultationTable) {
			$sm = $this->getServiceLocator ();
			$this->tarifConsultationTable = $sm->get ( 'Maternite\Model\TarifConsultationTable' );
		}
		return $this->tarifConsultationTable;
	}
	
	public function getGrossesseTable() {
		if (! $this->grossesse) {
			$sm = $this->getServiceLocator ();
			$this->grossesse = $sm->get ( 'Maternite\Model\GrossesseTable' );
		}
		return $this->grossesse;
	}
	

	public function getDateHelper()
	{
		$this->controlDate = new DateHelper ();
	}
	public function convertDate($date) {
		$nouv_date = substr ( $date, 8, 2 ) . '/' . substr ( $date, 5, 2 ) . '/' . substr ( $date, 0, 4 );
		return $nouv_date;
	}
	
	public function getHopitalTable()
	{
		if (!$this->hopitalTable) {
			$sm = $this->getServiceLocator();
			$this->hopitalTable = $sm->get('Personnel\Model\HopitalTable');
		}
		return $this->hopitalTable;
	}
	
	public function getTransfererPatientServiceTable()
	{
		if (!$this->transfererPatientServiceTable) {
			$sm = $this->getServiceLocator();
			$this->transfererPatientServiceTable = $sm->get('Maternite\Model\TransfererPatientServiceTable');
		}
		return $this->transfererPatientServiceTable;
	}
	
	public function getConsommableTable()
	{
		if (!$this->consommableTable) {
			$sm = $this->getServiceLocator();
			$this->consommableTable = $sm->get('Pharmacie\Model\ConsommableTable');
		}
		return $this->consommableTable;
	}
	
	public function getDonneesExamensPhysiquesTable()
	{
		if (!$this->donneesExamensPhysiquesTable) {
			$sm = $this->getServiceLocator();
			$this->donneesExamensPhysiquesTable = $sm->get('Maternite\Model\DonneesExamensPhysiquesTable');
		}
		return $this->donneesExamensPhysiquesTable;
	}
	
	public function getDiagnosticsTable()
	{
		if (!$this->diagnosticsTable) {
			$sm = $this->getServiceLocator();
			$this->diagnosticsTable = $sm->get('Maternite\Model\DiagnosticsTable');
		}
		return $this->diagnosticsTable;
	}
	
	public function getOrdonnanceTable()
	{
		if (!$this->ordonnanceTable) {
			$sm = $this->getServiceLocator();
			$this->ordonnanceTable = $sm->get('Maternite\Model\OrdonnanceTable');
		}
		return $this->ordonnanceTable;
	}


		public function getConsultationMaterniteTable()
	{
		if (!$this->consultationTable) {
			$sm = $this->getServiceLocator();
			$this->consultationTable = $sm->get('Maternite\Model\ConsultationMaterniteTable');
		}
		return $this->consultationMaterniteTable;
	}
	
	
	public function getEvacuationTable()
	{
		if (!$this->evacuationTable) {
			$sm = $this->getServiceLocator();
			$this->evacuationTable = $sm->get('Maternite\Model\EvacuationTable');
		}
		return $this->evacuationTable;
	}
	
	public function getReferenceTable()
	{
		if (!$this->referenceTable) {
			$sm = $this->getServiceLocator();
			$this->referenceTable = $sm->get('Maternite\Model\ReferenceTable');
		}
		return $this->referenceTable;
	}
	
	public function getMotifAdmissionTable()
	{
		if (!$this->motifAdmissionTable) {
			$sm = $this->getServiceLocator();
			$this->motifAdmissionTable = $sm->get('Maternite\Model\MotifAdmissionTable');
		}
		return $this->motifAdmissionTable;
	}
	
	public function getRvPatientConsTable()
	{
		if (!$this->rvPatientConsTable) {
			$sm = $this->getServiceLocator();
			$this->rvPatientConsTable = $sm->get('Maternite\Model\RvPatientConsTable');
		}
		return $this->rvPatientConsTable;
	}
	public function getDemandeVisitePreanesthesiqueTable()
	{
		if (!$this->demandeVisitePreanesthesiqueTable) {
			$sm = $this->getServiceLocator();
			$this->demandeVisitePreanesthesiqueTable = $sm->get('Maternite\Model\DemandeVisitePreanesthesiqueTable');
		}
		return $this->demandeVisitePreanesthesiqueTable;
	}
	
	public function getNotesExamensMorphologiquesTable()
	{
		if (!$this->notesExamensMorphologiquesTable) {
			$sm = $this->getServiceLocator();
			$this->notesExamensMorphologiquesTable = $sm->get('Maternite\Model\NotesExamensMorphologiquesTable');
		}
		return $this->notesExamensMorphologiquesTable;
	}
	
	public function demandeExamensTable()
	{
		if (!$this->demandeExamensTable) {
			$sm = $this->getServiceLocator();
			$this->demandeExamensTable = $sm->get('Maternite\Model\DemandeTable');
		}
		return $this->demandeExamensTable;
	}
	
	public function getOrdonConsommableTable()
	{
		if (!$this->ordonConsommableTable) {
			$sm = $this->getServiceLocator();
			$this->ordonConsommableTable = $sm->get('Maternite\Model\OrdonConsommableTable');
		}
		return $this->ordonConsommableTable;
	}
	
	public function getAntecedantPersonnelTable()
	{
		if (!$this->antecedantPersonnelTable) {
			$sm = $this->getServiceLocator();
			$this->antecedantPersonnelTable = $sm->get('Maternite\Model\AntecedentPersonnelTable');
		}
		return $this->antecedantPersonnelTable;
	}
	
	public function getAntecedantsFamiliauxTable()
	{
		if (!$this->antecedantsFamiliauxTable) {
			$sm = $this->getServiceLocator();
			$this->antecedantsFamiliauxTable = $sm->get('Maternite\Model\AntecedentsFamiliauxTable');
		}
		return $this->antecedantsFamiliauxTable;
	}
	
	public function getDemandeHospitalisationTable()
	{
		if (!$this->demandeHospitalisationTable) {
			$sm = $this->getServiceLocator();
			$this->demandeHospitalisationTable = $sm->get('Maternite\Model\DemandehospitalisationTable');
		}
		return $this->demandeHospitalisationTable;
	}
	
	/* POUR LA GESTION DES HOSPITALISATIONS */
	public function getSoinHospitalisationTable()
	{
		if (!$this->soinhospitalisationTable) {
			$sm = $this->getServiceLocator();
			$this->soinhospitalisationTable = $sm->get('Maternite\Model\SoinhospitalisationTable');
		}
		return $this->soinhospitalisationTable;
	}
	
	public function getSoinsTable()
	{
		if (!$this->soinsTable) {
			$sm = $this->getServiceLocator();
			$this->soinsTable = $sm->get('Maternite\Model\SoinsTable');
		}
		return $this->soinsTable;
	}
	
	public function getHospitalisationTable()
	{
		if (!$this->hospitalisationTable) {
			$sm = $this->getServiceLocator();
			$this->hospitalisationTable = $sm->get('Maternite\Model\HospitalisationTable');
		}
		return $this->hospitalisationTable;
	}
	
	public function getHospitalisationlitTable()
	{
		if (!$this->hospitalisationlitTable) {
			$sm = $this->getServiceLocator();
			$this->hospitalisationlitTable = $sm->get('Maternite\Model\HospitalisationlitTable');
		}
		return $this->hospitalisationlitTable;
	}
	
	public function getLitTable()
	{
		if (!$this->litTable) {
			$sm = $this->getServiceLocator();
			$this->litTable = $sm->get('Maternite\Model\LitTable');
		}
		return $this->litTable;
	}
	
	public function getSalleTable()
	{
		if (!$this->salleTable) {
			$sm = $this->getServiceLocator();
			$this->salleTable = $sm->get('Maternite\Model\SalleTable');
		}
		return $this->salleTable;
	}
	
	public function getBatimentTable()
	{
		if (!$this->batimentTable) {
			$sm = $this->getServiceLocator();
			$this->batimentTable = $sm->get('Maternite\Model\BatimentTable');
		}
		return $this->batimentTable;
	}
	
	public function getResultatVpa()
	{
		if (!$this->resultatVpaTable) {
			$sm = $this->getServiceLocator();
			$this->resultatVpaTable = $sm->get('Maternite\Model\ResultatVisitePreanesthesiqueTable');
		}
		return $this->resultatVpaTable;
	}
	
	public function getDemandeActe()
	{
		if (!$this->demandeActeTable) {
			$sm = $this->getServiceLocator();
			$this->demandeActeTable = $sm->get('Maternite\Model\DemandeActeTable');
		}
		return $this->demandeActeTable;
	}
	
	
	public function getForm() {
		if (! $this->formPatient) {
			$this->formPatient = new PatientForm();
		}
		return $this->formPatient;
	}
	
	public function getConsultationTable()
	{
		if (!$this->consultationTable) {
			$sm = $this->getServiceLocator();
			$this->consultationTable = $sm->get('Maternite\Model\ConsultationTable');
		}
		return $this->consultationTable;
	}
	
	
	public function getAccouchementTable()
	{
		if (!$this->accouchementTable) {
			$sm = $this->getServiceLocator();
			$this->accouchementTable = $sm->get('Maternite\Model\AccouchementTable');
		}
		//var_dump($$this->accouchementTable);exit();
		return $this->accouchementTable;
	}
	
	public function getTypeAccouchementTable()
	{
		if (!$this->type_accouchementTable) {
			$sm = $this->getServiceLocator();
			$this->type_accouchementTable = $sm->get('Maternite\Model\TypeAccouchementTable');
		}
		//var_dump($$this->accouchementTable);exit();
		return $this->type_accouchementTable;
	}
	public function getTypeAdmissionTable()
	{
		if (!$this->type_admissionTable) {
			$sm = $this->getServiceLocator();
			$this->type_admissionTable = $sm->get('Maternite\Model\TypeAdmissionTAble');
		}
		//var_dump($$this->accouchementTable);exit();
		return $this->type_admissionTable;
	}
	public function getNaissanceTable()
	{
		if (!$this->naissanceTable) {
			$sm = $this->getServiceLocator();
			$this->naissanceTable = $sm->get('Maternite\Model\NaissanceTable');
		}
		//var_dump($$this->accouchementTable);exit();
		return $this->naissanceTable;
	}
	
	
	public function admissionGrossesseNormalAction()
	{
		
		$this->layout()->setTemplate('layout/accouchement');
		$user = $this->layout()->user;
		$idService = $user ['IdService'];
		$form = new AdmissionForm();
		
		$lespatients = $this->getConsultationTable()->listePatientsConsParMedecin($idService);
		
		// RECUPERER TOUS LES PATIENTS AYANT UN RV aujourd'hui
		$tabPatientRV = $this->getConsultationTable()->getPatientsRV($idService);
		
		return new ViewModel (array(
				'donnees' => $lespatients,
				'tabPatientRV' => $tabPatientRV,
				'form' => $form
		));
	}
	
	
	
	//recuperer le formulaire
	
	

	

	public function creerDossierPatienteAction(){
		$this->layout()->setTemplate('layout/accouchement');
            
	}
	
	
	//ajouter un nouveau patient
	
	public function ajouterAction() {
		
		$this->layout ()->setTemplate ( 'layout/accouchement' );
		$form = $this->getForm ();
		//var_dump($form); exit();
		$patientTable = $this->getPatientTable();
		$form->get('NATIONALITE_ORIGINE')->setvalueOptions($patientTable->listeDeTousLesPays());
		$form->get('NATIONALITE_ACTUELLE')->setvalueOptions($patientTable->listeDeTousLesPays());
		$data = array('NATIONALITE_ORIGINE' => 'SÃ©nÃ©gal', 'NATIONALITE_ACTUELLE' => 'SÃ©nÃ©gal');
	
		$form->populateValues($data);
	
		return new ViewModel ( array (
				'form' => $form
		) );
		
	}
	
	//enregistrement de la PPatiente
	public function enregistrementAction() {
		
		$user = $this->layout()->user;
		$id_employe = $user['id_personne']; //L'utilisateur connecté
	
		// CHARGEMENT DE LA PHOTO ET ENREGISTREMENT DES DONNEES
		if (isset ( $_POST ['terminer'] ))  // si formulaire soumis
		{
			$Control = new DateHelper();
			$form = new PatientForm();
			$Patient = $this->getPatientTable ();
			$today = new \DateTime ( 'now' );
			$nomfile = $today->format ( 'dmy_His' );
			$date_enregistrement = $today->format ( 'Y-m-d H:i:s' );
			$fileBase64 = $this->params ()->fromPost ( 'fichier_tmp' );
			$fileBase64 = substr ( $fileBase64, 23 );
	
			if($fileBase64){
				$img = imagecreatefromstring(base64_decode($fileBase64));
			}else {
				$img = false;
			}
	
			$date_naissance = $this->params ()->fromPost ( 'DATE_NAISSANCE' );
			if($date_naissance){ $date_naissance = $Control->convertDateInAnglais($this->params ()->fromPost ( 'DATE_NAISSANCE' )); }else{ $date_naissance = null;}
				
			$donnees = array(
					'LIEU_NAISSANCE' => $this->params ()->fromPost ( 'LIEU_NAISSANCE' ),
					'EMAIL' => $this->params ()->fromPost ( 'EMAIL' ),
					'NOM' => $this->params ()->fromPost ( 'NOM' ),
					'TELEPHONE' => $this->params ()->fromPost ( 'TELEPHONE' ),
					'NATIONALITE_ORIGINE' => $this->params ()->fromPost ( 'NATIONALITE_ORIGINE' ),
					'PRENOM' => $this->params ()->fromPost ( 'PRENOM' ),
					'PROFESSION' => $this->params ()->fromPost ( 'PROFESSION' ),
					'NATIONALITE_ACTUELLE' => $this->params ()->fromPost ( 'NATIONALITE_ACTUELLE' ),
					'DATE_NAISSANCE' => $date_naissance,
					'ADRESSE' => $this->params ()->fromPost ( 'ADRESSE' ),
					'SEXE' => $this->params ()->fromPost ( 'SEXE' ),
					'AGE' => $this->params ()->fromPost ( 'AGE' ),
					'DATE_MODIFICATION' => $today->format ( 'Y-m-d' ),
					//'NUMERO_DOSSIER' => $this->params ()->fromPost ( 'NUMERO_DOSSIER' ),
			);
			
			//var_dump($donnees); exit();
			
			if ($img != false) {
	
				$donnees['PHOTO'] = $nomfile;
				//ENREGISTREMENT DE LA PHOTO
				imagejpeg ( $img, 'C:\wamp\www\simens\public\img\photos_patients\\' . $nomfile . '.jpg' );
				//ENREGISTREMENT DES DONNEES
			
				$Patient->addPatient ( $donnees , $date_enregistrement , $id_employe );
				
				return $this->redirect ()->toRoute ( 'accouchement', array (
						'action' => 'liste-patient'
				) );
			} else {
				// On enregistre sans la photo
				//var_dump($donnees); exit();
				$Patient->addPatient ( $donnees , $date_enregistrement , $id_employe );
				//var_dump($donnees); exit();
				return $this->redirect ()->toRoute ( 'accouchement', array (
						'action' => 'liste-patient'
				) );
			}
		}
		return $this->redirect ()->toRoute ( 'accouchement', array (
				'action' => 'liste-patient'
		) );
	}
	
	public function listePatientAction() {
		$layout = $this->layout ();
		$layout->setTemplate ( 'layout/accouchement' );
		
		//$output = $this->getPatientTable ()->getListePatient ();
		//var_dump($output); exit();
		
		$view = new ViewModel ();
		return $view;
	}
	
	public function listePatientAjaxAction() {
		$output = $this->getPatientTable ()->getListePatient ();
		return $this->getResponse ()->setContent ( Json::encode ( $output, array (
				'enableJsonExprFinder' => true
		) ) );
	}
	
	//visualiser le patient
	public function infoPatientAction() {
		//var_dump('test');exit();
		$this->layout ()->setTemplate ( 'layout/accouchement' );
		$id_pat = $this->params ()->fromRoute ( 'id_patient', 0 );
		
		$patient = $this->getPatientTable ();
		$unPatient = $patient->getInfoPatient( $id_pat );
		
		return array (
				'lesdetails' => $unPatient,
				'image' => $patient->getPhoto ( $id_pat ),
				//'id_patient' => $unPatient['ID_PERSONNE'],
				'date_enregistrement' => $unPatient['DATE_ENREGISTREMENT']
		);
	}
	
	
	
	
	
	public function infosPatientAction() {
		$this->getDateHelper();
		$id_personne = $this->params()->fromPost('id_personne',0);
		$id_cons = $this->params()->fromPost('id_cons',0);
		$encours = $this->params()->fromPost('encours',0);
		$terminer = $this->params()->fromPost('terminer',0);
		$id_demande_hospi = $this->params()->fromPost('id_demande_hospi',0);
	
		$unPatient = $this->getPatientTable()->getInfoPatient($id_personne);
		$photo = $this->getPatientTable()->getPhoto($id_personne);
	
		$demande = $this->getDemandeHospitalisationTable()->getDemandeHospitalisationWithIdcons($id_cons);
	
		$date = $this->controlDate->convertDate( $unPatient['DATE_NAISSANCE'] );
	
		$html  = "<div style='width:100%;'>";
			
		$html .= "<div style='width: 18%; height: 180px; float:left;'>";
		$html .= "<div id='photo' style='float:left; margin-left:40px; margin-top:10px; margin-right:30px;'> <img style='width:105px; height:105px;' src='".$this->getPath()."/img/photos_patients/" . $photo . "' ></div>";
		$html .= "</div>";
			
		$html .= "<div style='width: 70%; height: 200px; float:left;'>";
		$html .= "<table style='margin-top:10px; float:left; width: 100%;'>";
	
		$html .= "<tr style='width: 100%;'>";
		$html .= "<td style='width: 19%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nom:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['NOM'] . "</p></div></td>";
		$html .= "<td style='width: 29%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Lieu de naissance:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['LIEU_NAISSANCE'] . "</p></div></td>";
		$html .= "<td style='width: 23%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute;  d'origine:</a><br><div style='width: 95%; max-width: 135px;  overflow:auto;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ORIGINE'] . "</p></div></td>";
		$html .= "<td style='width: 29%; '></td>";
			
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Pr&eacute;nom:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['PRENOM'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>T&eacute;l&eacute;phone:</a><br><div style='width: 95%; max-width: 250px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['TELEPHONE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute; actuelle:</a><br><div style='width: 95%; max-width: 250px; overflow:auto;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ACTUELLE']. " </p></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Email:</a><br><div style='width: 100%; max-width: 250px; overflow:auto;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['EMAIL'] . "</p></div></td>";
			
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de naissance:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $date . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Adresse:</a><br><div style='width: 95%; max-width: 250px; height:50px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['ADRESSE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Profession:</a><br><div style='width: 95%; max-width: 250px; overflow:auto;'><p style=' font-weight:bold; font-size:17px;'>" .  $unPatient['PROFESSION'] . "</p></div></td>";
		$html .= "<td></td>";
		$html .= "</tr>";
	
		$html .= "</table>";
		$html .="</div>";
			
		$html .= "<div style='width: 12%; height: 200px; float:left;'>";
		$html .= "<div id='' style='color: white; opacity: 0.09; float:left; margin-right:5px; margin-left:5px; margin-top:5px;'> <img style='width:105px; height:105px;' src='".$this->getPath()."/img/photos_patients/" . $photo . "'></div>";
		$html .= "</div>";
			
		$html .= "</div>";
	
		$html .= "<div id='titre_info_deces'>
				     <span id='titre_info_demande41' style='margin-left:-5px; cursor:pointer;'>
				        <img src='../img/light/plus.png' /> D&eacute;tails des infos sur la demande
				     </span>
				  </div>
		          <div id='barre'></div>";
	
		$html .= "<div id='info_demande41'>";
		$html .= "<table style='margin-top:10px; margin-left: 18%; width: 80%;'>";
		$html .= "<tr style='width: 95%;'>";
		$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Consultation:</a><br><p style='font-weight:bold; font-size:17px;'>" . $id_cons . "</p></td>";
		$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de la demande:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDateTime($demande['date_demande_hospi']) . "</p></td>";
		$html .= "<td style='width: 20%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date fin pr&eacute;vue:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDate($demande['date_fin_prevue_hospi']) . "</p></td>";
		$html .= "<td style='width: 30%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>M&eacute;decin demandeur:</a><br><p style=' font-weight:bold; font-size:17px;'>" .$demande['PrenomMedecin'].' '.$demande['NomMedecin']. "</p></td>";
		$html .= "</tr>";
		$html .= "</table>";
	
		$html .="<table style='margin-top:0px; margin-left: 18%; width: 70%;'>";
		$html .="<tr style='width: 70%'>";
		$html .="<td style='padding-top: 10px; padding-bottom: 0px; padding-right: 30px; width: 20%; '><a style='text-decoration:underline; font-size:13px;'>Motif de la demande:</a><br><p id='circonstance_deces' style='background:#f8faf8; font-weight:bold; font-size:17px;'>". $demande['motif_demande_hospi'] ."</p></td>";
		$html .="<td style='padding-top: 10px; padding-bottom: 0px; padding-right: 30px; width: 20%; '><a style='text-decoration:underline; font-size:13px;'>Note:</a><br><p id='circonstance_deces' style='background:#f8faf8; font-weight:bold; font-size:17px;'> </p></td>";
		$html .="</tr>";
		$html .="</table>";
		$html .= "</div>";
	
		/***
		 * UTILISER UNIQUEMENT DANS LA VUE DE LA LISTE DES PATIENTS EN COURS D'HOSPITALISATION
		*/
		if($encours == 111) {
			$this->getDateHelper();
			$hospitalisation = $this->getHospitalisationTable()->getHospitalisationWithCodedh($id_demande_hospi);
			$lit_hospitalisation = $this->getHospitalisationlitTable()->getHospitalisationlit($hospitalisation->id_hosp);
			$lit = $this->getLitTable()->getLit($lit_hospitalisation->id_materiel);
			$salle = $this->getSalleTable()->getSalle($lit->id_salle);
			$batiment = $this->getBatimentTable()->getBatiment($salle->id_batiment);
	
			$html .= "<div id='titre_info_deces'>
					   <span id='titre_info_hospitalisation21' style='margin-left:-5px; cursor:pointer;'>
				          <img src='../img/light/plus.png' /> Infos sur l'hospitalisation
				       </span>
					  </div>
	
					  <div id='barre'></div>";
				
			$html .= "<div id='info_hospitalisation21'>";
			$html .= "<table style='margin-top:10px; margin-left: 18%; width: 80%;'>";
			$html .= "<tr style='width: 80%;'>";
			$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date d&eacute;but:</a><br><p style='font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDateTime($hospitalisation->date_debut) . "</p></td>";
			$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Batiment:</a><br><p style=' font-weight:bold; font-size:17px;'>".$batiment->intitule."</p></td>";
			$html .= "<td style='width: 20%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Salle:</a><br><p style=' font-weight:bold; font-size:17px;'>".$salle->numero_salle."</p></td>";
			$html .= "<td style='width: 30%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Lit:</a><br><p style=' font-weight:bold; font-size:17px;'>".$lit->intitule."</p></td>";
			$html .= "</tr>";
			$html .= "</table>";
			$html .= "</div>";
		}
	
		if($terminer == 0) {
			$html .="<div style='width: 100%; height: 100px;'>
	    		     <div style='margin-left:40px; color: white; opacity: 1; width:95px; height:40px; padding-right:15px; float:left;'>
                        <img  src='".$this->path."/images_icons/fleur1.jpg' />
                     </div>";
			$html .="<div class='block' id='thoughtbot' style='vertical-align: bottom; padding-left:60%; margin-bottom: 40px; padding-top: 35px; font-size: 18px; font-weight: bold;'><button type='submit' id='terminerVisualisationHosp'>Terminer</button></div>
                     </div>";
		}
		/***
		 * UTILISER UNIQUEMENT DANS LA PAGE POUR LA LIBERATION DU PATIENT EN COURS D'HOSPITALISATION
		*/
		else if($terminer == 111) {
			$html .="<div style='width: 100%; height: 270px;'>";
	
			$html .= "<div id='titre_info_deces' >Infos sur la lib&eacute;ration du patient </div>
		              <div id='barre'></div>";
	
			$chemin = $this->getServiceLocator()->get('Request')->getBasePath();
			$formLiberation = new LibererPatientForm();
			$data = array('id_demande_hospi' => $id_demande_hospi);
			$formLiberation->populateValues($data);
	
			$formRow = new FormRow();
			$formTextArea = new FormTextarea();
			$formHidden = new FormHidden();
	
			$html .="<form id='Formulaire_Liberer_Patient'  method='post' action='".$chemin."/accouchement/liberer-patient'>";
			$html .=$formHidden($formLiberation->get('id_demande_hospi'));
			$html .=$formHidden($formLiberation->get('temoin_transfert'));
			$html .=$formHidden($formLiberation->get('id_cons'));
			$html .="<div style='width: 80%; margin-left: 18%;'>";
			$html .="<table id='form_patient' style='width: 100%; '>
					 <tr class='comment-form-patient' style='width: 100%'>
					   <td id='note_soin'  style='width: 45%; '>". $formRow($formLiberation->get('resumer_medical')).$formTextArea($formLiberation->get('resumer_medical'))."</td>
					   <td id='note_soin'  style='width: 45%; '>". $formRow($formLiberation->get('motif_sorti')).$formTextArea($formLiberation->get('motif_sorti'))."</td>
					   <td  style='width: 10%;'><a href='javascript:vider_liberation()'><img id='test' style=' margin-left: 25%;' src='../images_icons/118.png' title='vider tout'></a></td>
					 </tr>
					 </table>";
			$html .="</div>";
	
			$html .="<div style=' margin-left:40px; color: white; opacity: 1; width:95px; height:40px; padding-right:15px; float:left;'>
                        <img  src='".$this->path."/images_icons/fleur1.jpg' />
                     </div>";
	
			$html .="<div style='width: 10%; padding-left: 30%; float:left;'>";
			$html .="<div class='block' id='thoughtbot' style=' float:left; width: 30%; vertical-align: bottom;  margin-bottom: 40px; padding-top: 35px; font-size: 18px; font-weight: bold;'><button id='terminerLiberer'>Annuler</button></div>";
			$html .="</div>";
				
			$html .="<div class='block' id='thoughtbot' style=' float:left; width: 30%; vertical-align: bottom;  margin-bottom: 40px; padding-top: 35px; font-size: 18px; font-weight: bold;'><button type='submit' id='liberer'>Lib&eacute;rer</button></div>";
			$html .="</form>";
	
			$html .="<script>
					  function vider_liberation(){
	                   $('#resumer_medical').val('');
	                   $('#motif_sorti').val('');
		              }
					  //$('#resumer_medical, #motif_sorti').css({'font-weight':'bold','color':'#065d10','font-family': 'Times  New Roman','font-size':'16px'});
					  $('#resumer_medical, #motif_sorti').css({'font-size':'17px'});
					</script>
					";
		}
		$html .="</div>";
	
		$html .="<script>
				  listepatient();
				  initAnimationVue();
				  animationPliantDepliant21();
		          animationPliantDepliant41();
	
				  var clickUneSeuleFois = 0;
				  $('#prescriptionOrdonnance').click(function(){
			        $( '#confirmationDeLaLiberation' ).dialog( 'close' );
			        PrescriptionOrdonnancePopup();
			        $('#PrescriptionOrdonnancePopupInterface').dialog('open');
			        if(clickUneSeuleFois == 0){
				       $('#ajouter_medicament').trigger('click');
				       $('#impressionPdf').toggle(false);
				       $('#id_personneForOrdonnance').val(".$id_personne.");
				       $('#id_consForOrdonnance').val('".$id_cons."');
				   
				       clickUneSeuleFois = 1;
	                }
			        return false;
		          });
	
				 </script>";
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ( $html ) );
	}
	
	
	
	
	
	

	public function infoPatientHospiAction(){
	
		$this->getDateHelper();
		$id_personne = $this->params()->fromPost('id_personne',0);
		$administrerSoin = $this->params()->fromPost('administrerSoin',0);
	
		$unPatient = $this->getPatientTable()->getInfoPatient($id_personne);
		$photo = $this->getPatientTable()->getPhoto($id_personne);
	
		$date = $this->controlDate->convertDate( $unPatient['DATE_NAISSANCE'] );
	
		$html  = "<div style='width:100%;'>";
			
		$html .= "<div style='width: 18%; height: 180px; float:left;'>";
		$html .= "<div id='photo' style='float:left; margin-left:40px; margin-top:10px; margin-right:30px;'> <img style='width:105px; height:105px;' src='".$this->getPath()."/img/photos_patients/" . $photo . "' ></div>";
		$html .= "</div>";
			
		$html .= "<div style='width: 65%; height: 200px; float:left;'>";
		$html .= "<table style='margin-top:10px; float:left; width: 100%;'>";
		$html .= "<tr style='width: 100%;'>";
	
		$html .= "<td style='width: 20%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>Nom:</a><br><p style='font-weight:bold; font-size:17px;'>" . $unPatient['NOM'] . "</p></td>";
		$html .= "<td style='width: 30%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>Lieu de naissance:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['LIEU_NAISSANCE'] . "</p></td>";
		$html .= "<td style='width: 20%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute; actuelle:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ACTUELLE'] . "</p></td>";
		$html .= "<td style='width: 30%; height: 50px;'></td>";
	
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='width: 20%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>Pr&eacute;nom:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['PRENOM'] . "</p></td>";
		$html .= "<td style='width: 30%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>T&eacute;l&eacute;phone:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['TELEPHONE'] . "</p></td>";
		$html .= "<td style='width: 20%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute; d'origine:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ORIGINE']. "</p></td>";
		$html .= "<td style='width: 30%; height: 50px;'><a style='text-decoration:underline; font-size:12px;'>Email:</a><br><p style='font-weight:bold; font-size:17px;'>" . $unPatient['EMAIL'] . "</p></td>";
	
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='width: 20%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de naissance:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $date . "</p></td>";
		$html .= "<td style='width: 30%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Adresse:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['ADRESSE'] . "</p></td>";
		$html .= "<td style='width: 20%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Profession:</a><br><p style=' font-weight:bold; font-size:17px;'>" .  $unPatient['PROFESSION'] . "</p></td>";
	
		$html .= "<td style='width: 30%; height: 50px;'></td>";
		$html .= "</tr>";
		$html .= "</table>";
		$html .="</div>";
			
		$html .= "<div style='width: 17%; height: 200px; float:left;'>";
		$html .= "<div id='' style='color: white; opacity: 0.09; float:left; margin-right:20px; margin-left:25px; margin-top:5px;'> <img style='width:105px; height:105px;' src='".$this->getPath()."/img/photos_patients/" . $photo . "'></div>";
		$html .= "</div>";
			
		$html .= "</div>";
	
		if($administrerSoin != 111) {
			$html .= "<div id='titre_info_deces'>Attribution d'un lit</div>
		              <div id='barre'></div>";
	
			$html .= "<script>$('#salle, #division, #lit').css({'font-weight':'bold','color':'#065d10','font-family': 'Times  New Roman','font-size':'17px'});</script>";
		}else if($administrerSoin == 111){
			$html .= "<script>$('#salle, #division, #lit').css({'font-weight':'bold','color':'#065d10','font-family': 'Times  New Roman','font-size':'17px'});</script>";
		}
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ( $html ) );
	
	}
	
	public function infoPatientAdmisAction() {
		//var_dump('test');exit();
		$this->layout ()->setTemplate ( 'layout/accouchement' );
		$id_pat = $this->params ()->fromRoute ( 'id_patient', 0 );
	
		$patient = $this->getPatientTable ();
		$unPatient = $patient->getInfoPatient( $id_pat );
	
		return array (
				'lesdetails' => $unPatient,
				'image' => $patient->getPhoto ( $id_pat ),
				'id_patient' => $unPatient['ID_PERSONNE'],
				'date_enregistrement' => $unPatient['DATE_ENREGISTREMENT']
		);
	}
	
	
	
	
	
	
	public function vueSoinAppliquerAction() {
	
		$this->getDateHelper();
		$id_sh = $this->params()->fromPost('id_sh', 0);
		$soinHosp = $this->getSoinHospitalisationTable()->getSoinhospitalisationWithId_sh($id_sh);
			
		$today = new \DateTime();
		$aujourdhui = $today->format('Y-m-d');
		$hier = date("Y-m-d", strtotime('-1 day'));
			
		$lesHeures = $this->getLesHeuresDuSoin($id_sh, $aujourdhui);
		$finDuSoin = date("Y-m-d", strtotime($soinHosp->date_debut_application.'+'.($soinHosp->duree-1).' day' ));
	
		$dateAvenir = null;
		if(!$lesHeures){
			$dateAvenir = $soinHosp->date_debut_application;
			$lesHeures  = $this->getHeuresAVenir($id_sh, $soinHosp->date_debut_application);
		}
			
		$html  ="<table style='width: 99%;'>";
			
		$html .="<tr style='width: 99%;'>
					   <td colspan='3' style='width: 99%;'>
					     <div id='titre_info_admis' style='margin-top: 0px;'>Prescription du soin : <i style='font-size: 15px;'>".$this->controlDate->convertDateTime($soinHosp->date_enregistrement)."</i></div><div id='barre_admis'></div>
					   </td>
					 </tr>";
			
		$html .="<tr style='width: 99%; '>";
		$html .="<td style='width: 36%; padding-top: 15px; padding-right: 15px;'><span style='text-decoration:underline; font-weight:bold; font-size:15px; color: #065d10; font-family: Times  New Roman;'>M&eacute;dicament</span><br><p id='zoneChampInfo' style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$soinHosp->medicament." </p></td>";
		$html .="<td style='width: 33%; padding-top: 15px; padding-right: 15px;'><span style='text-decoration:underline; font-weight:bold; font-size:15px; color: #065d10; font-family: Times  New Roman;'>Voie d'administration</span><br><p id='zoneChampInfo' style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$soinHosp->voie_administration." </p></td>";
		$html .="<td style='width: 30%; padding-top: 15px;'><span style='text-decoration:underline; font-weight:bold; font-size:15px; color: #065d10; font-family: Times  New Roman;'>Dosage & Fr&eacute;quence</span><br><p id='zoneChampInfo' style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$soinHosp->dosage." - ".$soinHosp->frequence."</p></td>";
		$html .="</tr>";
			
		$html .="<tr style='width: 99%;'>";
		$html .="<td style='vertical-align:top; padding-right: 15px; padding-top: 10px;'><span style='text-decoration:underline; font-weight:bold; font-size:15px; color: #065d10; font-family: Times  New Roman;'>Date de d&eacute;but & Dur&eacute;e & Fin</span><br><p id='zoneChampInfo' style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$this->controlDate->convertDate($soinHosp->date_debut_application)." - ".$soinHosp->duree." jr(s) - ".$this->controlDate->convertDate($finDuSoin)."</p></td>";
		$html .="<td colspan='2' style='width: 60%; vertical-align:top; padding-top: 10px;'>
				 <span style='text-decoration:underline; font-weight:bold; font-size:15px; color: #065d10; font-family: Times  New Roman;'>Heures recommand&eacute;es</span><br><p id='zoneChampInfo' class='lesHeuresRecAppDuSoin'  style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$lesHeures." </p>
				 </td>
				 </tr>";
			
		$html .="</table>";
			
		$html .="<table style='width: 99%;'>";
		$html .="<tr style='width: 95%;'>";
		$html .="<td style='width: 50%; padding-top: 10px; padding-right:25px;'><span style='text-decoration:underline; font-weight:bold; font-size:16px; color: #065d10; font-family: Times  New Roman;'>Motif</span><br><p id='label_Champ_NoteInformation' style='background:#f8faf8; font-size:17px; padding-left: 10px;'> ".$soinHosp->motif." </p></td>";
		$html .="<td style='width: 50%; padding-top: 10px;'><span style='text-decoration:underline; font-weight:bold; font-size:16px; color: #065d10; font-family: Times  New Roman;'>Note</span><br><p id='label_Champ_NoteInformation' style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$soinHosp->note." </p></td>";
		$html .="<td style='width: 0%;'> </td>";
		$html .= "</tr>";
	
			
		$html .="<tr style='width: 99%;'>
				    <td colspan='2' style='width: 99%;'>
					  <div id='titre_info_admis'>
 				         Informations sur l'application du soin
 				         <span style='padding-left: 30px;'>
 				           <img class='transfert_gauche' style='height: 14px; width: 18px; cursor:pointer;' src='".$this->getPath()."/images_icons/transfert_gauche.png' >
 				           <img class='transfert_droite2' style='height: 14px; width: 18px;' src='".$this->getPath()."/images_icons/transfert_droite2.png' >
 				         </span>
	
 				         <span class='laDateDesSoins' style='font-size: 15px; padding-left: 15px;'> Aujourd'hui - ".$this->controlDate->convertDate($aujourdhui)."</span>
 				      </div>
	
 				      <div id='barre_admis'></div>
					</td>
			     </tr>";
			
		if($soinHosp){
				
			//if($soinHosp->appliquer == 0) {
	
			$listeTouteDate = $this->getSoinHospitalisationTable()->getToutesDateDuSoin($id_sh);
			$html .="<script> var j = 0; </script>";
			$i = 0;
			foreach ($listeTouteDate as $listeDate){
	
				$html .="<table id='".$listeDate['date']."' style='width: 99%; margin-top: 10px;'>";
	
				$listeHeure = $this->getSoinHospitalisationTable()->getToutesHeures($id_sh, $listeDate['date']);
	
				if($listeHeure){
					foreach ($listeHeure as $listeH) {
						if($listeH['applique'] == 1){
	
							//RECUPERATION DES INFORMATIONS DE L'INFIRMIER AYANT APPLIQUER LES SOINS
							$infosInfirmier = $this->getSoinHospitalisationTable()->getInfosInfirmiers($listeH['id_personne_infirmier']);
							$PrenomInfirmier = " Prenom  ";
							$NomInfirmier = " Nom ";
							if($infosInfirmier){
								$PrenomInfirmier = $infosInfirmier['PRENOM'];
								$NomInfirmier = $infosInfirmier['NOM'];
							}
	
							$html .="<tr style='width: 99%;'>";
							$html .="<td style='width: 100%; vertical-align:top;'><span id='labelHeureLABEL' style='font-weight:bold; font-size:19px; padding-left: 5px; color: #065d10; font-family: Times  New Roman;'>".$listeH['heure']."</span>
								        <div class='infoUtilisateur".$listeH['id_heure']."' style='float: right; padding-top: 10px; padding-right: 10px; cursor:pointer'> <img src='../images_icons/info_infirmier.png' title='Infirmier: ".$PrenomInfirmier." ".$NomInfirmier." ".$this->controlDate->convertDateTime($listeH['date_application'])." ' /> </div>
								        <br><p id='zoneTexte' style='background:#f8faf8; font-size:17px; padding-left: 5px;'> ".$listeH['note']." </p>
								     </td>";
							$html .="</tr>";
	
							$html .="<script>
								         $('.infoUtilisateur".$listeH['id_heure']."').mouseenter(function(){
								           var tooltips = $( '.infoUtilisateur".$listeH['id_heure']."' ).tooltip({show: {effect: 'slideDown', delay: 250}});
								           tooltips.tooltip( 'open' );
       					                 });
	                                     $('.infoUtilisateur".$listeH['id_heure']."').mouseleave(function(){
	                                       var tooltips = $( '.infoUtilisateur".$listeH['id_heure']."' ).tooltip();
	                                       tooltips.tooltip( 'close' );
	                                     });
	                                     </script>";
						}
					}
				}
	
				$html .="<script>
 							  if('".$listeDate['date']."' != '".$aujourdhui."'){
                            	   $('#".$listeDate['date']."').toggle(false);
                        	  } else if('".$listeDate['date']."' == '".$aujourdhui."'){
                            	   j = ".$i."; //la position de la date d aujourdhui dans le tableau
 				                }
	
 							 </script>";
				$html .="</table>";
				$i++;
			}
			//}
	
			$html .="<script> var tableau = ['']; var tableauDate = ['']; var indice=0; var position = j; encours = 1; var tableauHeures = ['']; </script>";
			//LISTE DES DATE EN TABLEAU JS
			$listeTouteDate = $this->getSoinHospitalisationTable()->getToutesDateDuSoinPourUneDate($id_sh, $aujourdhui);
			$lastDate = null;
			foreach ($listeTouteDate as $listeDate){
				$html .="<script> tableau[indice] = '".$listeDate['date']."'; </script>";
				$html .="<script> tableauDate[indice] = '".$this->controlDate->convertDate($listeDate['date'])."'; </script>";
				$html .="<script> tableauHeures[indice++] = '".$this->getLesHeuresDuSoin($id_sh, $listeDate['date'])."'; </script>";
				$lastDate = $listeDate['date'];
			}
	
			$html .="<script>
 					 if( j == 0 ){
 					     j = position = tableau.length-1;
 					     $('#'+tableau[j]).toggle(true);
 					     $('.laDateDesSoins').text(tableauDate[j]);
 					     encours = 0; // les date pour l application du soin sont depassees
 					     if(tableau[position] == '".$hier."') {
                   		    infoPlus = 'Hier - '+tableauDate[position];
                       	    $('.laDateDesSoins').text(infoPlus);
 		                 }else if(tableau[position] == '".$aujourdhui."') {
 					     	infoPlus = 'Aujourd\'hui - '+tableauDate[position];
                       	    $('.laDateDesSoins').text(infoPlus);
 					     }
	
 					     $('.lesHeuresRecAppDuSoin').html(tableauHeures[j]);
 		                 //Si la date est superieur a la date actuelle alors
 		                 if('".$dateAvenir."' > '".$aujourdhui."'){
 		                  	$('.lesHeuresRecAppDuSoin').html('".$lesHeures."');
 		                 }
 		             }
	
 					 var infoPlus;
 					 function gauche(){
                      $('.transfert_gauche').click(function(){ if(position > j) { position = j;}
 					    if(position > 0) {
	
 					      //Active licone suivant
 					      $('.transfert_droite2').replaceWith(
			                    '<img class=\'transfert_droite\' style=\'height: 14px; width: 18px; cursor:pointer;\' src=\'".$this->getPath()."/images_icons/transfert_droite.png\' >'
			                  );
 					      droite();
 					      $('#'+tableau[position]).fadeOut(function(){
			                    if(position > 0) { $('#'+tableau[position]).toggle(false); }
 					            $('#'+tableau[--position]).fadeIn();
 					            $('.lesHeuresRecAppDuSoin').html(tableauHeures[position]);
			    
			                    if(encours == 1){
			                      if(position == j){ infoPlus = 'Aujourd\'hui - '+tableauDate[position]; }
 					                else if(position == j-1) { infoPlus = 'Hier - '+tableauDate[position];}
 					                     else { infoPlus = tableauDate[position]; }
 					               $('.laDateDesSoins').text(infoPlus);
			                    }
			                    else if(encours == 0){
 		                       		      infoPlus = tableauDate[position];
			                       	      $('.laDateDesSoins').text(infoPlus);
 		                             }
 		                  });
	
			              if(position-1 == 0){
			                $('.transfert_gauche').replaceWith(
			                   '<img class=\'transfert_gauche2\' style=\'height: 14px; width: 18px;\' src=\'".$this->getPath()."/images_icons/transfert_gauche2.png\' >'
			                );
			              }
	
 					    }else {
			                   $('.transfert_gauche').replaceWith(
			                    '<img class=\'transfert_gauche2\' style=\'height: 14px; width: 18px;\' src=\'".$this->getPath()."/images_icons/transfert_gauche2.png\' >'
			                  );
			                   return false;
 		                 }
	                    stopPropagation();
		               });
			           return false;
	                 }
			    
			         function droite(){
	                   $('.transfert_droite').click(function(){ if(position < 0) { position = 0;}
	                    if(position <j) {
			    
			               //Active l icone precedent
			               $('.transfert_gauche2').replaceWith(
			                    '<img class=\'transfert_gauche\' style=\'height: 14px; width: 18px; cursor:pointer;\' src=\'".$this->getPath()."/images_icons/transfert_gauche.png\' >'
			                  );
			               gauche();
	
	                      $('#'+tableau[position]).fadeOut(function(){
			                    if(position < j ) { $('#'+tableau[position]).toggle(false); }
	                    		$('#'+tableau[++position]).fadeIn();
 					            $('.lesHeuresRecAppDuSoin').html(tableauHeures[position]);
			    
			                    if(encours == 1){
			                       if(position == j){ infoPlus = 'Aujourd\'hui - '+tableauDate[position]; }
                                     else if(position == j-1) { infoPlus = 'Hier - '+tableauDate[position];}
 					                      else { infoPlus = tableauDate[position]; }
 					               $('.laDateDesSoins').text(infoPlus);
			                    }
	
			                    //Une fois les dates d application du soin sont depassees
			                    if(encours == 0){
			                       if(tableau[position] == '".$hier."') {
 		                       		  infoPlus = 'Hier - '+tableauDate[position];
			                       	  $('.laDateDesSoins').text(infoPlus);
 		                           } else{
			                       		infoPlus = tableauDate[position];
			                       	    $('.laDateDesSoins').text(infoPlus);
 		                             }
			                    }
 		                  });
			    
			              if(position+1 == j){
			                 $('.transfert_droite').replaceWith(
			                    '<img class=\'transfert_droite2\' style=\'height: 14px; width: 18px;\' src=\'".$this->getPath()."/images_icons/transfert_droite2.png\' >'
			                  );
			               }
 					    }else {
			                   $('.transfert_droite').replaceWith(
			                    '<img class=\'transfert_droite2\' style=\'height: 14px; width: 18px;\' src=\'".$this->getPath()."/images_icons/transfert_droite2.png\' >'
			                  );
			                   return false;
 		                 }
			    
	                    stopPropagation();
		               });
			           return false;
			    
			         }
			    
			         gauche();
			         droite();
 					 </script>";
	
		}
			
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ($html) );
	
	
	}
	
	
	
	public function listeSoinsPrescritsAction() {
		$id_hosp = $this->params()->fromPost('id_hosp', 0);
	
		$html = "<div id='titre_info_admis'>
				  <span id='titre_info_liste_soin' style='margin-left:-5px; cursor:pointer; margin-top: 100px;'>
				    <img src='../img/light/minus.png' /> Liste des soins</div>
				  </span>
		        <div id='barre_admis'></div>";
		$html .="<div id='Liste_soins_deja_prescrit'>";
		$html .= $this->raffraichirListeSoinsPrescrit($id_hosp);
		$html .="</div>";
	
		$html .="<script>
				  depliantPlus6();
				 </script>";
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ($html) );
	}
	
	
	
	
	public function supprimerSoinAction() {
		$id_sh = $this->params()->fromPost('id_sh', 0);
		$this->getSoinHospitalisationTable()->supprimerHospitalisation($id_sh);
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode () );
	}
	
	public function modifierSoinAction() {
	
		$id_sh = $this->params()->fromPost('id_sh', 0);
	
		$this->getDateHelper();
		$soin = $this->getSoinHospitalisationTable()->getSoinhospitalisationWithId_sh($id_sh);
		$heure = $this->getSoinHospitalisationTable()->getHeuresGroup($id_sh);
	
		$lesHeures = "";
		if($heure){
			for ($i = 0; $i<count($heure); $i++){
				if($i == count($heure)-1) {
					$lesHeures.= $heure[$i];
				} else {
					$lesHeures.= $heure[$i].'  -  ';
				}
			}
		}
	
		$form = new \Maternite\Form\accouchement\SoinmodificationForm();
		if($soin){
	
			$data = array(
					'medicament_m' => $soin->medicament,
					'voie_administration_m' => $soin->voie_administration,
					'frequence_m' => $soin->frequence,
					'dosage_m' => $soin->dosage,
					'date_application_m' => $this->controlDate->convertDate($soin->date_debut_application),
					'motif_m' => $soin->motif,
					'note_m' => $soin->note,
					'duree_m' => $soin->duree,
			);
	
			$form->populateValues($data);
		}
	
		$formRow = new FormRow();
		$formText = new FormText();
		$formSelect = new FormSelect();
		$formTextArea = new FormTextarea();
	
		$listeMedicament = $this->getConsommableTable()->listeDeTousLesMedicaments();
	
		$html ="<table id='form_patient' style='width: 100%;'>
	
		           <tr class='comment-form-patient' style='width: 100%;'>
		             <td style='width: 25%;'> ".$formRow($form->get('medicament_m')).$formText($form->get('medicament_m'))."</td>
		             <td style='width: 25%;'>".$formRow($form->get('voie_administration_m')).$formText($form->get('voie_administration_m'))."</td>
		             <td style='width: 25%;'>".$formRow($form->get('frequence_m')).$formText($form->get('frequence_m'))."</td>
		             <td style='width: 25%;'>".$formRow($form->get('dosage_m')).$formText($form->get('dosage_m'))."</td>
		           </tr>
		       
		           <tr class='comment-form-patient' style='width: 100%;'>
		             <td style='width: 25%;'> ".$formRow($form->get('date_application_m')).$formText($form->get('date_application_m'))."</td>
		             <td style='width: 25%;'> ".$formRow($form->get('duree_m')).$formText($form->get('duree_m'))."</td>
             		 <td colspan='2' style='width: 25%;'>".$formRow($form->get('heure_recommandee_m')).$formText($form->get('heure_recommandee_m'))."</td>
		           </tr>
		         </table>
	
		         <table id='form_patient' style='width: 100%;'>
		           <tr class='comment-form-patient'>
		             <td id='note_soin' style='width: 40%; '>". $formRow($form->get('motif_m')).$formTextArea($form->get('motif_m'))."</td>
		             <td id='note_soin' style='width: 40%; '>". $formRow($form->get('note_m')).$formTextArea($form->get('note_m'))."</td>
		             <td  style='width: 10%;' id='ajouter'></td>
		             <td  style='width: 10%;'></td>
		           </tr>
		         </table>";
		$html .="<script>
				    //$('#medicament_m, #voie_administration_m, #frequence_m, #dosage_m, #date_application_m, #heure_recommandee_m, #motif_m, #note_m').css({'font-weight':'bold','color':'#065d10','font-family': 'Times  New Roman','font-size':'18px'});
				    $('#duree_m, #heure_recommandee_m').attr('disabled', true).css({'background':'f9f9f9'});
				    $('#heure_recommandee_m').val('".$lesHeures."');
				    $(function() {
    	              $('.SlectBox_m').SumoSelect({ csvDispCount: 6 });
				    });
				    var myArrayMedicament = [''];
			        var j = 0;";
		foreach($listeMedicament as $Liste) {
			$html .="myArrayMedicament[j++] = '". $Liste['INTITULE']."';";
		}
		$html .=" $('#medicament_m' ).autocomplete({
    		         source: myArrayMedicament
                     });
				     listepatient();
				 </script>";
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ($html) );
	}
	
	public function vueExamenJourAction(){
		$this->layout()->setTemplate('layout/accouchement');
		$id_examen_jour = $this->params()->fromPost('id_examen_jour', 0);
	
		$ExamenJour = $this->getConsultationTable()->getExamenDuJourParIdExamenJour($id_examen_jour);
		$id_patient = $ExamenJour['ID_PATIENT'];
		$id_hosp = $ExamenJour['ID_HOSP'];
		$id_cons = $ExamenJour['ID_CONS'];
	
		$user = $this->layout()->user;
		$IdDuService = $user['IdService'];
	
		//POUR LES CONSTANTES
		//POUR LES CONSTANTES
		$ConstantesExamen = $this->getConsultationTable()->getConsultationExamenJour($id_cons);
		$Constantes = array(
				'poids' => $ConstantesExamen['POIDS'],
				'taille' => $ConstantesExamen['TAILLE'],
				'temperature' => $ConstantesExamen['TEMPERATURE'],
				'pressionarterielle' => $ConstantesExamen['PRESSION_ARTERIELLE'],
				'pouls' => $ConstantesExamen['POULS'],
				'frequence_respiratoire' => $ConstantesExamen['FREQUENCE_RESPIRATOIRE'],
				'glycemie_capillaire' => $ConstantesExamen['GLYCEMIE_CAPILLAIRE'],
		);
	
		//POUR LES MOTIFS D'ADMISSION
		//POUR LES MOTIFS D'ADMISSION
		$motif_admission = $this->getMotifAdmissionTable ()->getMotifAdmission ( $id_cons );
		$nbMotif = $this->getMotifAdmissionTable ()->nbMotifs ( $id_cons );
	
		//POUR LES MOTIFS D'ADMISSION
		$DonneesMotifs = array();
		$k = 1;
		foreach ( $motif_admission as $Motifs ) {
			$DonneesMotifs ['motif_admission' . $k] = $Motifs ['Libelle_motif'];
			$k ++;
		}
	
		//Pour recuper les bandelettes
		//Pour recuper les bandelettes
		$bandelettes = $this->getConsultationTable ()->getBandelette($id_cons);
	
		//POUR LES EXAMEN PHYSIQUES
		//POUR LES EXAMEN PHYSIQUES
		$examen_physique = $this->getDonneesExamensPhysiquesTable()->getExamensPhysiques($id_cons);
		$DonneesExamenPhysique = array();
		$kPhysique = 1;
		foreach ($examen_physique as $Examen) {
			$DonneesExamenPhysique ['examen_donnee'.$kPhysique] = $Examen['libelle_examen'];
			$kPhysique++;
		}
	
	
		//var_dump($bandelettes); exit();
	
		$formSoin = new Maternite\Form\accouchement\SoinForm();
			
		$hopital = $this->getTransfererPatientServiceTable ()->fetchHopital ();
		$formSoin->get ( 'hopital_accueil' )->setValueOptions ( $hopital );
		//RECUPERATION DE L'HOPITAL DU SERVICE
		$transfertPatientHopital = $this->getTransfererPatientServiceTable ()->getHopitalPatientTransfert($IdDuService);
		$idHopital = $transfertPatientHopital['ID_HOPITAL'];
		//RECUPERATION DE LA LISTE DES SERVICES DE L'HOPITAL OU SE TROUVE LE SERVICE OU LE MEDECIN TRAVAILLE
		$serviceHopital = $this->getTransfererPatientServiceTable ()->fetchServiceWithHopitalNotServiceActual($idHopital, $IdDuService);
		//LISTE DES SERVICES DE L'HOPITAL
		$formSoin->get ( 'service_accueil' )->setValueOptions ($serviceHopital);
	
		$date = new \DateTime();
		$aujourdhui = $date->format('dmy');
		$data = array (
				'hopital_accueil' => $idHopital,
				'date_cons' => $aujourdhui,
		);
		$formSoin->populateValues(array_merge($data, $Constantes, $DonneesMotifs, $bandelettes, $DonneesExamenPhysique));
	
		$listeMedicament = $this->getConsultationTable()->listeDeTousLesMedicaments();
	
		return array(
				'form' => $formSoin,
				'liste_med' => $listeMedicament,
				'id_patient' => $id_patient,
				'id_hosp' => $id_hosp,
				'nbMotifs' => $nbMotif,
				'temoin' => $bandelettes['temoin'],
				'nbDonneesExamenPhysique' => $kPhysique,
		);
	}
	
	public function listeSoinsVisualisationHospAction(){
		$id_hosp = $this->params()->fromPost('id_hosp', 0);
		// 		$html = $this->raffraichirListeSoinsPrescrit($id_hosp); //La liste avec les filtres Termier, Encours, Avenir
		$html = $this->raffraichirListeSoinsPrescritTerminer($id_hosp);
		$html .="<style> #info_liste{ margin-left:18%; width: 80%;} </style>";
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ($html) );
	}
	
	public function listeExamenDuJourAction(){
		$user = $this->layout()->user;
		$IdService = $user['IdService'];
		$id_hosp = $this->params()->fromPost('id_hosp', 0);
	
		$this->getDateHelper();
		$listeExamens = $this->getConsultationTable()->getExamenDuJour($id_hosp);
	
		$html ="";
	
		$html .='<table id="ListingExamens" class="table table-bordered tab_list_mini" >
		           <thead>
		             <tr id="nomMaj" style="height: 40px; width:100%;">
		                <th style="width: 20%; cursor: pointer;">D<minus>ate</minus></th>
		                <th style="width: 20%; cursor: pointer;">H<minus>eure</minus></th>
		                <th style="width: 50%; cursor: pointer;">P<minus>r&eacute;nom & nom m&eacute;decin</minus></th>
		                <th style="width: 10%;" >O<minus>ptions</minus></th>
		             </tr>
		           </thead>
	
		         <tbody id="donnees" class="liste_patient">';
	
		foreach ($listeExamens as $liste) {
			$html .='<tr id="ExamenDuJourLigne'.$liste['ID_EXAMEN_JOUR'].'">
					  <td> '.$this->controlDate->convertDate($liste['DATEONLY']).' </td>
					  <td> '.$this->controlDate->getTime($liste['DATE']).' </td>
					  <td> '.$liste['PrenomMedecin'].' '.$liste['NomMedecin'].' </td>
					  <td>
					  	 <a href="javascript:visualiserExamenDuJour('.$liste['ID_EXAMEN_JOUR'].')"><img style="margin-left: 5%;" src="../images_icons/voird.png" title="visualiser"></a>
					     <a href="javascript:supprimerExamenDuJour('.$liste['ID_EXAMEN_JOUR'].')"><img style="margin-left: 20%;" src="../images_icons/sup.png" title="supprimer"></a>
			  		  </td>
					</tr>';
				
		}
	
		$html .='</tbody>
				 </table>';
	
		$html .="<script>
				  initialisationScriptDataTable();
				</script>";
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ($html) );
	}
	public function enregistrerExamenDuJourAction(){
		$user = $this->layout()->user;
		$IdDuService = $user['IdService'];
		$idMedecin = $user['id_personne'];
	
		$date = new \DateTime();
		$codeExamen = 'e-j-'.$date->format('dmy-His');
	
		$formData = $this->getRequest ()->getPost ();
	
		$this->getConsultationTable ()->addConsultationExamenDuJour ($codeExamen, $formData, $IdDuService, $idMedecin);
		$this->getConsultationTable ()->addExamenDuJour($codeExamen, $formData->id_hosp);
		$this->getMotifAdmissionTable ()->addMotifAdmissionPourExamenJour ( $formData, $codeExamen );
	
		//Recuperer les donnees sur les bandelettes urinaires
		//Recuperer les donnees sur les bandelettes urinaires
		$bandelettes = array(
				'id_cons' => $codeExamen,
				'albumine' => $formData->albumine,
				'sucre' => $formData->sucre,
				'corpscetonique' => $formData->corpscetonique,
				'croixalbumine' => $formData->croixalbumine,
				'croixsucre' => $formData->croixsucre,
				'croixcorpscetonique' => $formData->croixcorpscetonique,
		);
		$this->getConsultationTable ()->addBandelette($bandelettes);
	
		//POUR LES EXAMENS PHYSIQUES
		//POUR LES EXAMENS PHYSIQUES
		$info_donnees_examen_physique = array(
				'id_cons' => $codeExamen,
				'donnee1' => $formData->examen_donnee1,
				'donnee2' => $formData->examen_donnee2,
				'donnee3' => $formData->examen_donnee3,
				'donnee4' => $formData->examen_donnee4,
				'donnee5' => $formData->examen_donnee5
		);
		$this->getDonneesExamensPhysiquesTable()->addExamenPhysiqueExamenJour($info_donnees_examen_physique);
	
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ($formData->croixalbumine) );
	}
	public function detailInfoLiberationPatientAction() {
		$this->getDateHelper();
		$chemin = $this->getServiceLocator()->get('Request')->getBasePath();
		$id_personne = $this->params()->fromPost('id_personne',0);
		$id_cons = $this->params()->fromPost('id_cons',0);
		$encours = $this->params()->fromPost('encours',0);
		$terminer = $this->params()->fromPost('terminer',0);
		$id_demande_hospi = $this->params()->fromPost('id_demande_hospi',0);
	
		$unPatient = $this->getPatientTable()->getInfoPatient($id_personne);
		$photo = $this->getPatientTable()->getPhoto($id_personne);
	
		$demande = $this->getDemandeHospitalisationTable()->getDemandeHospitalisationWithIdcons($id_cons);
	
		$date = $this->controlDate->convertDate( $unPatient['DATE_NAISSANCE'] );
	
		$html  = "<div style='width:100%;'>";
			
		$html .= "<div style='width: 18%; height: 180px; float:left;'>";
		$html .= "<div id='photo' style='float:left; margin-left:40px; margin-top:10px; margin-right:30px;'> <img style='width:105px; height:105px;' src='".$this->getPath()."/img/photos_patients/" . $photo . "' ></div>";
		$html .= "</div>";
			
		$html .= "<div style='width: 70%; height: 180px; float:left;'>";
		$html .= "<table style='margin-top:10px; float:left; width: 100%;'>";
	
		$html .= "<tr style='width: 100%;'>";
		$html .= "<td style='width: 19%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nom:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['NOM'] . "</p></div></td>";
		$html .= "<td style='width: 29%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Lieu de naissance:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['LIEU_NAISSANCE'] . "</p></div></td>";
		$html .= "<td style='width: 23%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute;  d'origine:</a><br><div style='width: 95%; max-width: 135px;  overflow:auto;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ORIGINE'] . "</p></div></td>";
		$html .= "<td style='width: 29%; '></td>";
			
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Pr&eacute;nom:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['PRENOM'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>T&eacute;l&eacute;phone:</a><br><div style='width: 95%; max-width: 250px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['TELEPHONE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute; actuelle:</a><br><div style='width: 95%; max-width: 250px; overflow:auto;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ACTUELLE']. " </p></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Email:</a><br><div style='width: 100%; max-width: 250px; overflow:auto;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['EMAIL'] . "</p></div></td>";
			
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de naissance:</a><br><div style='width: 95%; max-width: 135px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $date . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Adresse:</a><br><div style='width: 95%; max-width: 250px; height:50px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['ADRESSE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Profession:</a><br><div style='width: 95%; max-width: 250px; overflow:auto;'><p style=' font-weight:bold; font-size:17px;'>" .  $unPatient['PROFESSION'] . "</p></div></td>";
		$html .= "<td></td>";
		$html .= "</tr>";
	
	
		$html .= "</table>";
		$html .="</div>";
			
		$html .= "<div style='width: 12%; height: 200px; float:left;'>";
		$html .= "<div id='' style='color: white; opacity: 0.09; float:left; margin-right:5px; margin-left:5px; margin-top:5px;'> <img style='width:105px; height:105px;' src='".$this->getPath()."/img/photos_patients/" . $photo . "'></div>";
		$html .= "</div>";
			
		$html .= "</div>";
	
		$html .= "<div id='titre_info_deces'>
				     <span id='titre_info_demande' style='margin-left: -5px; cursor:pointer;'>
				        <img src='".$chemin."/img/light/plus.png' /> D&eacute;tails des infos sur la demande
				     </span>
				  </div>
		          <div id='barre'></div>";
	
		$html .= "<div id='info_demande'>";
		$html .= "<table style='margin-top:10px; margin-left: 18%; width: 80%;'>";
		$html .= "<tr style='width: 80%;'>";
		$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Consultation:</a><br><p style='font-weight:bold; font-size:17px;'>" . $id_cons . "</p></td>";
		$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de la demande:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDateTime($demande['Datedemandehospi']) . "</p></td>";
		$html .= "<td style='width: 20%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date fin pr&eacute;vue:</a><br><p style=' font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDate($demande['date_fin_prevue_hospi']) . "</p></td>";
		$html .= "<td style='width: 30%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>M&eacute;decin demandeur:</a><br><p style=' font-weight:bold; font-size:17px;'>" .$demande['PrenomMedecin'].' '.$demande['NomMedecin']. "</p></td>";
		$html .= "</tr>";
		$html .= "</table>";
	
		$html .="<table style='margin-top:0px; margin-left: 18%; width: 70%;'>";
		$html .="<tr style='width: 70%'>";
		$html .="<td style='padding-top: 10px; padding-bottom: 0px; padding-right: 30px; width: 20%; '><a style='text-decoration:underline; font-size:13px;'>Motif de la demande:</a><br><p id='circonstance_deces' style='background:#f8faf8; font-weight:bold; font-size:17px;'>". $demande['motif_demande_hospi'] ."</p></td>";
		$html .="<td style='padding-top: 10px; padding-bottom: 0px; padding-right: 30px; width: 20%; '><a style='text-decoration:underline; font-size:13px;'>Note:</a><br><p id='circonstance_deces' style='background:#f8faf8; font-weight:bold; font-size:17px;'> </p></td>";
		$html .="</tr>";
		$html .="</table>";
		$html .= "</div>";
	
		/***
		 * UTILISER UNIQUEMENT DANS LA VUE DE LA LISTE DES PATIENTS EN COURS D'HOSPITALISATION
		*/
		if($encours == 111) {
			$hospitalisation = $this->getHospitalisationTable()->getHospitalisationWithCodedh($id_demande_hospi);
			$lit_hospitalisation = $this->getHospitalisationlitTable()->getHospitalisationlit($hospitalisation->id_hosp);
			$lit = $this->getLitTable()->getLit($lit_hospitalisation->id_materiel);
			$salle = $this->getSalleTable()->getSalle($lit->id_salle);
			$batiment = $this->getBatimentTable()->getBatiment($salle->id_batiment);
	
			$html .= "<div id='titre_info_deces'>
					   <span id='titre_info_hospitalisation' style='margin-left:-5px; cursor:pointer;'>
				          <img src='".$chemin."/img/light/plus.png' /> Infos sur l'hospitalisation
				       </span>
					  </div>
		              <div id='barre'></div>";
	
			$html .= "<div id='info_hospitalisation'>";
			$html .= "<table style='margin-top:10px; margin-left: 18%; width: 80%;'>";
			$html .= "<tr style='width: 80%;'>";
			$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date d&eacute;but:</a><br><p style='font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDateTime($hospitalisation->date_debut) . "</p></td>";
			$html .= "<td style='width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Batiment:</a><br><p style=' font-weight:bold; font-size:17px;'>".$batiment->intitule."</p></td>";
			$html .= "<td style='width: 20%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Salle:</a><br><p style=' font-weight:bold; font-size:17px;'>".$salle->numero_salle."</p></td>";
			$html .= "<td style='width: 30%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Lit:</a><br><p style=' font-weight:bold; font-size:17px;'>".$lit->intitule."</p></td>";
			$html .= "</tr>";
			$html .= "</table>";
			$html .= "</div>";
		}
	
		$html .= "<div id='titre_info_deces'>
				    <span id='titre_info_liste' style='margin-left:-5px; cursor:pointer;'>
				      <img src='".$chemin."/img/light/plus.png' /> Liste des soins
				    </span>
				  </div>
		          <div id='barre'></div>";
	
		$hospitalisation = $this->getHospitalisationTable()->getHospitalisationWithCodedh($id_demande_hospi);
		$html .= "<div id='info_liste'>";
		$html .= $this->listeSoinsPourDetailInfoLiberationPatient($hospitalisation->id_hosp);
		$html .= "</div>";
	
		$html .= "<div id='titre_info_deces'>
				   <span id='titre_info_liberation' style='margin-left:-5px; cursor:pointer;'>
				      <img src='".$chemin."/img/light/plus.png' /> Infos sur la lib&eacute;ration du patient
				   </span>
				  </div>
		          <div id='barre'></div>";
	
		//Pour les infos sur le transfert du patient hospitalisé
		//Pour les infos sur le transfert du patient hospitalisé
		//Pour les infos sur le transfert du patient hospitalisé
		$infoTransfert = $this->getTransfererPatientServiceTable()->getPatientMedecinDonnees($id_cons);
	
		//POUR LES MEDICAMENTS
		//POUR LES MEDICAMENTS
		//POUR LES MEDICAMENTS
		// INSTANTIATION DE L'ORDONNANCE
		$infoOrdonnance = $this->getOrdonnanceTable()->getOrdonnanceHospi($id_cons);
	
		if($infoOrdonnance) {
			$idOrdonnance = $infoOrdonnance->id_document;
			//LISTE DES MEDICAMENTS PRESCRITS
			$listeMedicamentsPrescrits = $this->getOrdonnanceTable()->getMedicamentsParIdOrdonnance($idOrdonnance);
			$nbMedPrescrit = $listeMedicamentsPrescrits->count();
		}else{
			$nbMedPrescrit = 0;
			$listeMedicamentsPrescrits = null;
		}
	
		//------------------------------------------------------
		//------------------------------------------------------
		//------------------------------------------------------
		$html .= "<div id='info_liberation'>";
		$html .= "<table style='margin-top:0px; margin-left: 18%; width: 80%;'>";
		$html .= "<tr style='width: 80%'>";
	
		if($infoTransfert){
			$html .= "<td style='padding-top: 10px; width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:14px;'>Date du transfert:</a><br><p style='font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDateTime($hospitalisation->date_fin) . "</p></td>";
			$html .= "<td style='padding-top: 10px; width: 32%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:14px;'>Pr&eacute;nom & nom du m&eacute;decin:</a><br><p style='font-weight:bold; font-size:17px;'>".$infoTransfert['PrenomMedecin']." ".$infoTransfert['NomMedecin']."</p></td>";
			$html .= "<td style='padding-top: 10px; width: 43%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:14px;'>Service d'accueil:</a><br><p style='font-weight:bold; font-size:17px;'>".$infoTransfert['NomService']."</p></td>";
		} else {
			$html .= "<td style='padding-top: 10px; width: 25%; height: 50px; vertical-align: top;'><a style='text-decoration:underline; font-size:14px;'>Date de la lib&eacute;ration:</a><br><p style='font-weight:bold; font-size:17px;'>" . $this->controlDate->convertDateTime($hospitalisation->date_fin) . "</p></td>";
				
			if($infoOrdonnance){
				$html .= "<td style='padding-top: 10px; width: 25%; height: 50px; vertical-align: top;'><img id='afficherOrdonnance' style='cursor:pointer;' src='".$chemin."/images_icons/clipboard_32.png' /> <span style='font-weight:bold; font-size:17px; font-family: Times  New Roman; color: #065d10;'> Ordonnance </span></td>";
				$html .= "<td style='padding-top: 10px; width: 25%; height: 50px; vertical-align: top;'></td>";
				$html .= "<td style='padding-top: 10px; width: 25%; height: 50px; vertical-align: top;'></td>";
			}
	
		}
	
		$html .= "</tr>";
		$html .= "</table>";
	
		$html .= "<table style='margin-top:0px; margin-left: 18%; width: 80%;'>";
		$html .= "<tr style='width: 80%'>";
		$html .= "<td style='padding-top: 10px; padding-bottom: 0px; padding-right: 30px; width: 35%; '><a style='text-decoration:underline; font-size:14px;'>R&eacute;sum&eacute; m&eacute;dical:</a><br><p id='circonstance_deces' style='background:#f8faf8; font-weight:bold; font-size:17px;'>" . $hospitalisation->resumer_medical . "</p></td>";
		$html .= "<td style='padding-top: 10px; padding-bottom: 0px; padding-right: 30px; width: 35%; '><a style='text-decoration:underline; font-size:14px;'>Motif de la sortie:</a><br><p id='circonstance_deces' style='background:#f8faf8; font-weight:bold; font-size:17px;'>". $hospitalisation->motif_sorti ."</p></td>";
		$html .= "</tr>";
		$html .= "</table>";
		$html .= "</div>";
	
		if($terminer == 0) {
			$html .="<div style='width: 100%; height: 100px;'>
	    		     <div style='margin-left:40px; color: white; opacity: 1; width:95px; height:40px; padding-right:15px; float:left;'>
                        <img  src='".$chemin."/images_icons/fleur1.jpg' />
                     </div>";
			$html .="<div class='block' id='thoughtbot' style='vertical-align: bottom; padding-left:60%; margin-bottom: 40px; padding-top: 35px; font-size: 18px; font-weight: bold;'><button type='submit' id='terminerdetailhospi'>Terminer</button></div>
                     </div>";
		}
	
		$html .="<script>
				  listepatient();
				  initAnimation();
				  animationPliantDepliant();
				  animationPliantDepliant2();
				  animationPliantDepliant3();
		          animationPliantDepliant4();
	
				  $('#nbMedecamentPourVisualisation').val(".$nbMedPrescrit.");
	
				  //$('#medicament_01').val('test');
				  var i = 1;
				 </script>";
		$html .="<style> #info_liste{ margin-left:18%; width: 80%;}   </style>";
	
	
	
		//Remplissage automatique des champs
		if($nbMedPrescrit != 0) {
			foreach($listeMedicamentsPrescrits as $Medicaments){
				$html .="<script> setTimeout(function(){ $('#medicament_0'+i).val('".$Medicaments['Intitule']."'); }, 2000);  </script>";
				$html .="<script> setTimeout(function(){ $('#forme_'+i).val('".$Medicaments['FORME']."'); }, 2000);</script>";
				$html .="<script> setTimeout(function(){ $('#nb_medicament_'+i).val('".substr($Medicaments['QUANTITE'], 0, strpos($Medicaments['QUANTITE'], ' '))."'); }, 2000);  </script>";
				$html .="<script> setTimeout(function(){ $('#quantite_'+i).val('".substr($Medicaments['QUANTITE'], strpos($Medicaments['QUANTITE'], ' ')+1)."'); i++; }, 2000);  </script>";
			}
			 
			$html .="<script>
		   			  setTimeout(function(){
		   		        $('#listeMedicaments input, .form-duree_ input, .ordonnance input').attr('disabled', true).css({'background':'#f8f8f8'});
		   		        $('#controls_medicament div').toggle(false);
		   		        $('#iconeMedicament_supp_vider a img').toggle(false);
	                    $('#bouton_Medicament_modifier_demande').toggle(false);
	                    $('#bouton_Medicament_valider_demande').toggle(false);
	                    $('#increm_decrem img').toggle(false);
		              }, 2000);
		   		    </script>";
		}
	
		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse ()->setContent ( Json::encode ( $html ) );
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//modifier les info d'un patient

	public function modifierAction() {
		$control = new DateHelper();
		$this->layout ()->setTemplate ( 'layout/accouchement' );
		$id_patient = $this->params ()->fromRoute ( 'id_patient', 0 );
	
		$infoPatient = $this->getPatientTable ();
		try {
			$info = $infoPatient->getInfoPatient( $id_patient );
		} catch ( \Exception $ex ) {
			return $this->redirect ()->toRoute ( 'accouchement', array (
					'action' => 'liste-patient'
			) );
		}
		$form = new PatientForm();
		$form->get('NATIONALITE_ORIGINE')->setvalueOptions($infoPatient->listeDeTousLesPays());
		$form->get('NATIONALITE_ACTUELLE')->setvalueOptions($infoPatient->listeDeTousLesPays());
	
		$date_naissance = $info['DATE_NAISSANCE'];
		if($date_naissance){ $info['DATE_NAISSANCE'] =  $control->convertDate($info['DATE_NAISSANCE']); }else{ $info['DATE_NAISSANCE'] = null;}
	
		$form->populateValues ( $info );
	
		if (! $info['PHOTO']) {
			$info['PHOTO'] = "identite";
		}
		return array (
				'form' => $form,
				'photo' => $info['PHOTO']
		);
	}
	
	
	//ENREGISTREMNT MODIFICATION
	public function enregistrementModificationAction() {
		
		$user = $this->layout()->user;
		//var_dump($user); exit();
		$id_employe = $user['id_personne']; //L'utilisateur connecté
	
		if (isset ( $_POST ['terminer'] ))
		{
			$Control = new DateHelper();
			$Patient = $this->getPatientTable ();
			$today = new \DateTime ( 'now' );
			$nomfile = $today->format ( 'dmy_His' );
			$date_modification = $today->format ( 'Y-m-d H:i:s' );
			$fileBase64 = $this->params ()->fromPost ( 'fichier_tmp' );
			$fileBase64 = substr ( $fileBase64, 23 );
	
			if($fileBase64){
				$img = imagecreatefromstring(base64_decode($fileBase64));
			}else {
				$img = false;
			}
	
			$date_naissance = $this->params ()->fromPost ( 'DATE_NAISSANCE' );
			if($date_naissance){ $date_naissance = $Control->convertDateInAnglais($this->params ()->fromPost ( 'DATE_NAISSANCE' )); }else{ $date_naissance = null;}
	
			$donnees = array(
					'LIEU_NAISSANCE' => $this->params ()->fromPost ( 'LIEU_NAISSANCE' ),
					'EMAIL' => $this->params ()->fromPost ( 'EMAIL' ),
					'NOM' => $this->params ()->fromPost ( 'NOM' ),
					'TELEPHONE' => $this->params ()->fromPost ( 'TELEPHONE' ),
					'NATIONALITE_ORIGINE' => $this->params ()->fromPost ( 'NATIONALITE_ORIGINE' ),
					'PRENOM' => $this->params ()->fromPost ( 'PRENOM' ),
					'PROFESSION' => $this->params ()->fromPost ( 'PROFESSION' ),
					'NATIONALITE_ACTUELLE' => $this->params ()->fromPost ( 'NATIONALITE_ACTUELLE' ),
					'DATE_NAISSANCE' => $date_naissance,
					'ADRESSE' => $this->params ()->fromPost ( 'ADRESSE' ),
					'SEXE' => $this->params ()->fromPost ( 'SEXE' ),
					'AGE' => $this->params ()->fromPost ( 'AGE' ),
			);
	
			$id_patient =  $this->params ()->fromPost ( 'ID_PERSONNE' );
			if ($img != false) {
	
				$lePatient = $Patient->getInfoPatient ( $id_patient );
				$ancienneImage = $lePatient['PHOTO'];
	
				if($ancienneImage) {
					unlink ( 'C:\wamp\www\simens\public\img\photos_patients\\' . $ancienneImage . '.jpg' );
				}
				imagejpeg ( $img, 'C:\wamp\www\simens\public\img\photos_patients\\' . $nomfile . '.jpg' );
	
				$donnees['PHOTO'] = $nomfile;
				$Patient->updatePatient ( $donnees , $id_patient, $date_modification, $id_employe);
	
				return $this->redirect ()->toRoute ( 'accouchement', array (
						'action' => 'liste-patient'
				) );
			} else {
				$Patient->updatePatient($donnees, $id_patient, $date_modification, $id_employe);
				return $this->redirect ()->toRoute ( 'accouchement', array (
						'action' => 'liste-patient'
				) );
			}
		}
		return $this->redirect ()->toRoute ( 'accouchement', array (
				'action' => 'liste-patient'
		) );
	}
	
	


	
	public function supprimerAction() {
	
		if ($this->getRequest ()->isPost ()) {
			$id = ( int ) $this->params ()->fromPost ( 'id', 0 );
			$patientTable = $this->getPatientTable ();
			$patientTable->deletePatient ( $id );
	
			// Supprimer le patient s'il est dans la liste des naissances
			$naiss = $this->getNaissanceTable ();
			$naiss->deleteNaissance ( $id );
	
			// AFFICHAGE DE LA LISTE DES PATIENTS
			$liste = $patientTable->tousPatients ();
			$nb = $patientTable->nbPatientSUP900 ();
			$html = " $nb patients";
			$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
			return $this->getResponse ()->setContent ( Json::encode ( $html ) );
		}
	}
	
	
	public function listeAdmissionAjaxAction() {
		$patient = $this->getPatientTable ();
		$output = $patient->laListePatientsAjax();
		//$output = $patient->getListePatientsAjax();
		return $this->getResponse ()->setContent ( Json::encode ( $output, array (
				'enableJsonExprFinder' => true
		) ) );
	}
	
	public function getServiceTable() {
		if (! $this->serviceTable) {
			$sm = $this->getServiceLocator ();
			$this->serviceTable = $sm->get ( 'Maternite\Model\ServiceTable' );
		}
		return $this->serviceTable;
	}
	
	

      public function admissionTestAction() {
		$layout = $this->layout ();
		//var_dump('$layout'); exit();
	
		$layout->setTemplate ( 'layout/accouchement' );
		$user = $this->layout()->user;
		$idService = $user ['IdService'];
        //INSTANCIATION DU FORMULAIRE D'ADMISSION
		$formAdmission = new AdmissionForm();	
		$pat = $this->getPatientTable ();
		
		//pour admission
		$liste_type = $this->getTypeAdmissionTable ()->listeTypeAdmission ();
		//var_dump($liste_type); exit();
		//$afficheTous = array ("" => 'Selectionnez un type dans la liste');
		
		$tab_type = $liste_type;
		$formAdmission->get('motif_ad')->setValueOptions($tab_type);
		//var_dump($tab_type); exit();
		
		//var_dump($donnee_ant); exit();
		if ($this->getRequest ()->isPost ()) {							
			$today = new \DateTime ();
			$dateAujourdhui = $today->format( 'Y-m-d' );
			
			
		
			$id = ( int ) $this->params ()->fromPost ( 'id', 0 );
			
			$donnee_ant = $pat->getInfoPatientAmise( $id );
			
			//MISE A JOUR DE L'AGE DU PATIENT
			$personne = $this->getPatientTable()->miseAJourAgePatient($id);
			//*******************************
	
			//Verifier si le patient a un rendez-vous et si oui dans quel service et a quel heure
			$RendezVOUS = $pat->verifierRV($id, $dateAujourdhui);
			
			$unPatient = $pat->getInfoPatient( $id );
			
	
			$photo = $pat->getPhoto ( $id );
			
			$date = $unPatient['DATE_NAISSANCE'];
			if($date){ $date = $this->convertDate ( $unPatient['DATE_NAISSANCE'] ); }else{ $date = null;}

			$html  = "<div style='width:100%;'>";
			
			$html  = "<div style='width:100%;'>";
				
 			$html .= "<div style='width: 18%; height: 190px; float:left;'>";
 			$html .= "<div id='photo' style='float:left; margin-left:40px; margin-top:10px; margin-right:30px;'> <img style='width:105px; height:105px;' src='../img/photos_patients/" . $photo . "' ></div>";
 			$html .= "<div style='margin-left:60px; margin-top: 150px;'> <div style='text-decoration:none; font-size:14px; float:left; padding-right: 7px; '>Age:</div>  <div style='font-weight:bold; font-size:19px; font-family: time new romans; color: green; font-weight: bold;'>" . $unPatient['AGE'] . " ans</div></div>";
 			$html .= "</div>";
				
			$html .= "<div id='vuePatientAdmission' style='width: 70%; height: 190px; float:left;'>";
			$html .= "<table style='margin-top:0px; float:left; width: 100%;'>";
				
			$html .= "<tr style='width: 100%;'>";
			
			$html .= "<td style='width: 19%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Numero dossier:</a><br><div style='width: 150px; max-width: 160px; height:40px; overflow:auto; margin-bottom: 3px;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['NUMERO_DOSSIER'] . "</p></div></td>";
			$html .= "<td style='width: 29%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de naissance:</a><br><div style='width: 95%; max-width: 250px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['DATE_NAISSANCE'] . "</p></div></td>";

			$html .= "<td style='width: 23%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>T&eacute;l&eacute;phone:</a><br><div style='width: 95%; '><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['TELEPHONE'] . "</p></div></td>";
				
			$html .= "<td style='width: 29%; '></td>";
			
				$html .= "</tr><tr style='width: 100%;'>";
				$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Pr&eacute;nom:</a><br><div style='width: 95%; max-width: 130px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['PRENOM'] . "</p></div></td>";
				$html .= "<td style='width: 29%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Lieu de naissance:</a><br><div style='width: 95%; max-width: 250px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['LIEU_NAISSANCE'] . "</p></div></td>";
				$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute; actuelle:</a><br><div style='width: 95%; max-width: 135px; overflow:auto; '><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ACTUELLE']. "</p></td>";
				$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Email:</a><br><div style='width: 100%; max-width: 235px; height:40px; overflow:auto;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['EMAIL'] . "</p></div></td>";
					
				$html .= "</tr><tr style='width: 100%;'>";
				$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nom:</a><br><div style='width: 95%; max-width: 235px; height:40px; overflow:auto; '><p style=' font-weight:bold; font-size:17px;'>" .  $unPatient['NOM'] . "</p></div></td>";
				$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Adresse:</a><br><div style='width: 97%; max-width: 250px; height:50px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['ADRESSE'] . "</p></div></td>";
				$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Sexe:</a><br><div style='width: 100%; max-width: 235px; height:40px; overflow:auto;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['SEXE'] . "</p></div></td>";
				
			
			$html .= "<td style='width: 30%; height: 50px;'>";
			
			if($RendezVOUS){
				$html .= "<span> <i style='color:green;'>
					        <span id='image-neon' style='color:red; font-weight:bold;'>Rendez-vous! </span> <br>
					        <span style='font-size: 16px;'>Service:</span> <span style='font-size: 16px; font-weight:bold;'> ". $pat->getServiceParId($RendezVOUS[ 'ID_SERVICE' ])[ 'NOM' ]." </span> <br>
					        <span style='font-size: 16px;'>Heure:</span>  <span style='font-size: 16px; font-weight:bold;'>". $RendezVOUS[ 'HEURE' ]." </span> </i>
			              </span>";
			}
				$html .= "</td>";
			$html .= "</tr>";
			$html .= "</table>";
			$html .= "</div>";
			
			$html .= "<div style='width: 12%; height: 190px; float:left;'>";
			$html .= "<div id='' style='color: white; opacity: 0.09; float:left; margin-right:10px; margin-left:5px; margin-top:5px;'> <img style='width:105px; height:105px;' src='../img/photos_patients/" . $photo . "'></div>";
			$html .= "</div>";
			
			
			if ($donnee_ant) {

				$html .= "<script>";
				$html .= "$('#enf_viv').val('".$donnee_ant['enf_viv']."');";
				$html .= "$('#parite').val('".$donnee_ant['parite']."');";
				$html .= "$('#geste').val('".$donnee_ant['geste']."');";
				$html .= "</script>";
				
			}
			else {
				
				$html .= "<script>";
				$html .= "$('#enf_viv').val('');";
				$html .= "$('#parite').val('');";
				$html .= "$('#geste').val('');";
				$html .= "</script>";
			}
			

			$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
 			return $this->getResponse ()->setContent ( Json::encode ( $html ) );
 		}
 		//var_dump($formAdmission);exit();
		return array (
				'form' => $formAdmission
		);
	
	}
	
	
	
	
   public function enregistrerAdmissionAction() {
	
		$user = $this->layout()->user;
		$id_employe = $user['id_personne'];
		$Control = new DateHelper();
		$idService = $user ['IdService'];
		$service= $user ['NomService'];
		//var_dump($user); exit();
		$today = new \DateTime ( "now" );
		$date_cons = $today->format ( 'Y-m-d' );
		$date_enregistrement = $today->format ( 'Y-m-d H:i:s' );
		
		$id_patient = ( int ) $this->params ()->fromPost ( 'id_patient', 0 );

		

		//pour  evacuation reference
		
		$motif_ad = $this->params ()->fromPost('motif_ad');
		$motif = $this->params ()->fromPost ( 'motif' );
		$service_origine = $this->params ()->fromPost ( 'service_origine' );
		$motif_reference = $this->params ()->fromPost ( 'motif_reference' );
		$service_origine_ref = $this->params ()->fromPost ( 'service_origine_ref' );
		//donnee pour admission
			$donnees = array (
		
				'id_patient' => $id_patient,
				'motif_ad'=>$motif_ad,
				'id_service' => $idService,
				'date_cons' => $date_cons,
				'date_enregistrement' => $date_enregistrement,
				'id_employe' => $id_employe,
		);
	
		$id_admission=	$this->getAdmissionTable ()->addAdmissio($donnees);
		
		//pour reference
		$donnees_admission_ref= array(
			    'id_patient'=>$id_patient,
				'id_admission'=>$id_admission,
				'motif_reference'=>$motif_reference,
				'service_origine_ref'=>$service_origine_ref,
		);
		//pour evacuation
		$donnees_admission_ev= array(
				'id_patient'=>$id_patient,
				'motif'=>$motif,
				'id_admission'=>$id_admission,
				'service_origine'=>$service_origine,
				
		);
		
	
		//var_dump($id_admission);exit();
	 if ($motif_ad==2){
		
		$id_evacuation = $this->getEvacuationTable ()-> addEvacuation($donnees_admission_ev);
		

		//$this->getAdmissionTable ()->addAdmissionEv($donnees);
		//$this->getAdmissionTable ()->addAdmission($donnees,$date_enregistrement,$id_employe);
		//$id_admi=$this->getAdmissionTable ()->addAdmissionAccouchement($id_evacuation);
	
		
	}	
	
	else if ($motif_ad==3){
	
		$id_reference = $this->getReferenceTable ()-> addReference($donnees_admission_ref);
	
		//var_dump($donnees);exit();
		//$this->getAdmissionTable ()->addAdmissionRef($donnees);
	
	
	}	
		$form = new ConsultationForm ();
		
		$formData = $this->getRequest ()->getPost ();
		$form->setData ( $formData );
		//var_dump($form);exit;
		$this->getAdmissionTable ()-> addConsultation ( $form,$idService );
		
		$id_cons = $form->get ( "id_cons" )->getValue ();
		
		$this->getAdmissionTable ()->addConsultationMaternite($id_cons);
		//$this->getAdmissionTable ()->addAdmission($donnees, $date_enregistrement, $id_employe);
		
		
	
 		return $this->redirect()->toRoute('accouchement', array(
 				'action' =>'admission-test'));

	}

public function listePatientsAdmisAction() {
		
		 $this->layout ()->setTemplate ( 'layout/accouchement' );
		$patientsAdmis = $this->getAdmissionTable ();
		//INSTANCIATION DU FORMULAIRE
		
		$formAdmission = new AdmissionForm ();
	
	
		
		return new ViewModel ( array (
				'listePatientsAdmis' => $patientsAdmis->getPatientsAdmis (),
				
				'form' => $formAdmission,
				'listePatientsCons' => $patientsAdmis->getPatientAdmisCons(),
		) );
		

	}
		
public function declarerDecesAction() {
		$this->layout ()->setTemplate ( 'layout/accouchement' );
		
		//INSTANCIATION DU FORMULAIRE DE DECES
		$ajoutDecesForm = new AjoutDecesForm ();

		if ($this->getRequest ()->isPost ()) {
			$id = ( int ) $this->params ()->fromPost ( 'id', 0 );
			
			$personne = $this->getPatientTable()->miseAJourAgePatient($id);
			//*******************************
			//*******************************
			//*******************************
			$pat = $this->getPatientTable ();
			$unPatient = $pat->getInfoPatient ( $id );
			$photo = $pat->getPhoto ( $id );
			
			$date = $unPatient['DATE_NAISSANCE'];
			if($date){ $date = $this->convertDate ($date); }else{ $date = null;}

			$html = "<div style='float:left;' ><div id='photo' style='float:left; margin-right:20px; margin-bottom: 10px;'> <img  src='../img/photos_patients/" . $photo . "'  style='width:105px; height:105px;'></div>";
			$html .= "<div style='margin-left:6px;'> <div style='text-decoration:none; font-size:14px; float:left; padding-right: 7px; '>Age:</div>  <div style='font-weight:bold; font-size:19px; font-family: time new romans; color: green; font-weight: bold;'>" . $unPatient['AGE'] . " ans</div></div></div>";
			
			
			$html .= "<table>";
			
			$html .= "<tr>";
			$html .= "<td><a style='text-decoration:underline; font-size:12px;'>Nom:</a><br><p style='width:280px; font-weight:bold; font-size:17px;'>" . $unPatient['NOM'] . "</p></td>";
			$html .= "</tr><tr>";
			$html .= "<td><a style='text-decoration:underline; font-size:12px;'>Pr&eacute;nom:</a><br><p style='width:280px; font-weight:bold; font-size:17px;'>" . $unPatient['PRENOM'] . "</p></td>";
			$html .= "</tr><tr>";
			$html .= "<td><a style='text-decoration:underline; font-size:12px;'>Date de naissance:</a><br><p style='width:280px; font-weight:bold; font-size:17px;'>" . $date . "</p></td>";
			$html .= "</tr><tr>";
			$html .= "<td><a style='text-decoration:underline; font-size:12px;'>Adresse:</a><br><p style='width:280px; font-weight:bold; font-size:17px;'>" . $unPatient['ADRESSE'] . "</p></td>";
			$html .= "</tr><tr>";
			$html .= "<td><a style='text-decoration:underline; font-size:12px;'>T&eacute;l&eacute;phone:</a><br><p style='width:280px; font-weight:bold; font-size:17px;'>" . $unPatient['TELEPHONE'] . "</p></td>";
			$html .= "</tr>";
			
			$html .= "</table>";
			$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
			return $this->getResponse ()->setContent ( Json::encode ( $html ) );
		}
		return array (
				'form' => $ajoutDecesForm
		);
	}
	
	public function accoucherAction(){
		$this->layout()->setTemplate('layout/accouchement');
		$user = $this->layout()->user;
		$idService = $user ['IdService'];
	
		$lespatients = $this->getConsultationTable()->listePatientsConsParMedecin($idService);
		// RECUPERER TOUS LES PATIENTS AYANT UN RV aujourd'hui
		$tabPatientRV = $this->getConsultationTable()->getPatientsRV($idService);
		//var_dump($user); exit();
		return new ViewModel (array(
				'donnees' => $lespatients,
				'tabPatientRV' => $tabPatientRV
		));
		
	}
	
	public function ajoutConstantesAction()
	{
		$this->layout()->setTemplate('layout/accouchement');
		$id_pat = $this->params()->fromRoute('id_patient', 0);
	
		$user = $this->layout()->user;
		$id_surveillant = $user ['id_personne'];
	
		$liste = $this->getPatientTable()->getInfoPatient($id_pat);
		$image = $this->getPatientTable()->getPhoto($id_pat);
	
		// creer le formulaire
		$today = new \DateTime ();
		$date = $today->format('Y-m-d H:i:s');
		$form = new ConsultationForm ();
		$id_cons = $form->get('id_cons')->getValue();
		$heure_cons = $form->get('heure_cons')->getValue();
		// peupler le formulaire
		$dateonly = $today->format('Y-m-d');
	
		$consult = array(
				'id_patient' => $id_pat,
				'id_surveillant' => $id_surveillant,
				'date_cons' => $date,
				'dateonly' => $dateonly
		);
		$form->populateValues($consult);
	
		// RECUPERER TOUS LES PATIENTS AYANT UN RV aujourd'hui
		$tabPatientRV = $this->getConsultationTable()->getPatientsRV($user ['IdService']);
		$resultRV = null;
		if (array_key_exists($id_pat, $tabPatientRV)) {
			$resultRV = $tabPatientRV [$id_pat];
		}
	
		return new ViewModel (array(
				'lesdetails' => $liste,
				'image' => $image,
				'form' => $form,
				'id_cons' => $id_cons,
				'heure_cons' => $heure_cons,
				'dateonly' => $consult ['dateonly'],
				'resultRV' => $resultRV
		));
	}
	public function ajoutDonneesConstantesAction()
	{
		$this->layout()->setTemplate('layout/accouchement');
		$user = $this->layout()->user;
		$IdDuService = $user ['IdService'];
	
		$form = new ConsultationForm ();
		$formData = $this->getRequest()->getPost();
		$form->setData($formData);
	
		$this->getConsultationTable()->addConsultation($form, $IdDuService);
		$id_cons = $form->get("id_cons")->getValue();
		$this->getConsultationTable()->addConsultationEffective($id_cons);
	
		// Recuperer les donnees sur les bandelettes urinaires
		// Recuperer les donnees sur les bandelettes urinaires
		$bandelettes = array(
				'id_cons' => $id_cons,
				'albumine' => $form->get("albumine")->getValue(),
				'sucre' => $form->get("sucre")->getValue(),
				'corpscetonique' => $form->get("corpscetonique")->getValue(),
				'croixalbumine' => $form->get("croixalbumine")->getValue(),
				'croixsucre' => $form->get("croixsucre")->getValue(),
				'croixcorpscetonique' => $form->get("croixcorpscetonique")->getValue()
		);
		$this->getConsultationTable()->addBandelette($bandelettes);
	
		$this->getMotifAdmissionTable()->addMotifAdmission($form);
	
		return $this->redirect()->toRoute('accouchement', array(
				'action' => 'accoucher'
		));
	}
	public function majConsDonneesAction()
	{
		$this->layout()->setTemplate('layout/accouchement');
	
		$form = new ConsultationForm ();
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			$form->setData($formData);
	
			// mettre a jour la consultation
			$this->getConsultationTable()->updateConsultation($form);
	
			//Recuperer les donnees sur les bandelettes urinaires
			// Recuperer les donnees sur les bandelettes urinaires
			$bandelettes = array(
					'id_cons' => $form->get("id_cons")->getValue(),
					'albumine' => $form->get("albumine")->getValue(),
					'sucre' => $form->get("sucre")->getValue(),
					'corpscetonique' => $form->get("corpscetonique")->getValue(),
					'croixalbumine' => $form->get("croixalbumine")->getValue(),
					'croixsucre' => $form->get("croixsucre")->getValue(),
					'croixcorpscetonique' => $form->get("croixcorpscetonique")->getValue()
			);
			// mettre a jour les bandelettes urinaires
			$this->getConsultationTable()->deleteBandelette($form->get("id_cons")->getValue());
			$this->getConsultationTable()->addBandelette($bandelettes);
	
			// mettre a jour les motifs d'admission
			/*$this->getMotifAdmissionTable()->deleteMotifAdmission($form->get('id_cons')->getValue());
			$this->getMotifAdmissionTable()->addMotifAdmission($form);*/
	
			return $this->redirect()->toRoute('accouchement', array(
					'action' => 'accoucher'
			));
		} else {
			return $this->redirect()->toRoute('accouchement', array(
					'action' => 'accoucher'
			));
		}
	}
	public function complementAccouchementAction()
	{
		$this->layout()->setTemplate('layout/accouchement');
	
		$user = $this->layout()->user;
		$IdDuService = $user ['IdService'];
		$id_medecin = $user ['id_personne'];
	
		$id_pat = $this->params()->fromQuery('id_patient', 0);
		$id = $this->params()->fromQuery('id_cons');
		//$id_admission = $this->params()->fromQuery('id_grossesse',0);
 		
		$listeMedicament = $this->getConsultationTable()->listeDeTousLesMedicaments();
		
		$listeForme = $this->getConsultationTable()->formesMedicaments();
		$listetypeQuantiteMedicament = $this->getConsultationTable()->typeQuantiteMedicaments();
		
		$liste = $this->getConsultationTable()->getInfoPatient($id_pat);
		$id_admission=$liste['id_admission'];
		$id_grossesse=$liste['id_grossesse'];
		//var_dump($id_grossesse);exit();
		$image = $this->getConsultationTable()->getPhoto($id_pat);
		//$id_grossesse= $this->getGrossesseTable ()->addGrossesse();
	
		
		$donne_ante=$this->getAntecedentType1Table()->getAntecedentType1($id_pat);
		$donne_ante2=$this->getAntecedentType2Table()->getAntecedentType2($id_pat);
		//var_dump($donne_ante2);exit();
		$form = new ConsultationForm ();
		$donne_ant1=array(
					
				'enf_viv'=>$donne_ante['enf_viv'],
				'geste'=>$donne_ante['geste'],
				'parite'=>$donne_ante['parite'],
				'note_enf'=>$donne_ante['note_enf'],
				'note_geste'=>$donne_ante['note_geste'],
				'note_parite'=>$donne_ante['note_parite'],
				'mort_ne'=>$donne_ante['mort_ne'],
				'note_mort_ne'=>$donne_ante['note_mort_ne'],
				'cesar'=>$donne_ante['cesar'],
				'note_cesar'=>$donne_ante['note_cesar'],
				'groupe_sanguins'=>$donne_ante['groupe_sanguin'],
				'rhesus'=>$donne_ante['rhesus'],
				'note_gs'=>$donne_ante['note_gs'],
				'test_emmel'=>$donne_ante['test_emmel'],
				'profil_emmel'=>$donne_ante['profil_emmel'],
				'note_emmel'=>$donne_ante['note_emmel'],
				'note_autre_em'=>$donne_ante['note_autre_em'],
					
		);	$form->populateValues($donne_ant1);
		// var_dump($donne_ante2);exit();
		$quantite=array(
				'quantite'=>$donne_ante2['quantite_regle']
		);
		$regularite_iregu=array(
				'option'=>$donne_ante2['cycle'],
		
		);
		$form->get('quantite_regle')->setValueOptions($quantite);
		$form->get('regularite')->setValueOptions($regularite_iregu);
		$donne_antecedent2=array(
				'dystocie'=>$donne_ante2['dystocie'],
				'eclampsie'=>$donne_ante2['eclampsie'],
		
				'duree_cycle'=>$donne_ante2['duree_cycle'],
				'note_dystocie'=>$donne_ante2['note_dystocie'],
				'note_eclampsie'=>$donne_ante2['note_eclampsie'],
				'note_cycle'=>$donne_ante2['note_cycle'],
				'autre_go'=>$donne_ante2['autre'],
				'note_autre_go'=>$donne_ante2['note_autre'],
				'quantite_regle'=>$donne_ante2['quantite_regle'],
				'nb_garniture_jr'=>$donne_ante2['nb_garniture_jr'],
				'contraception'=>$donne_ante2['contraception'],
				'type_contraception'=>$donne_ante2['type_contraception'],
				'duree_contraception'=>$donne_ante2['duree_contraception'],
				'note_contraception'=>$donne_ante2['note_contraception'],
		);//var_dump($donne_antecedent2);exit();
		$form->populateValues($donne_antecedent2);
		//var_dump($cycle);exit();
		
		// RECUPERER TOUS LES PATIENTS AYANT UN RV aujourd'hui
		$tabPatientRV = $this->getConsultationTable()->getPatientsRV($IdDuService);
		$resultRV = null;
		if (array_key_exists($id_pat, $tabPatientRV)) {
			$resultRV = $tabPatientRV [$id_pat];
		}
		//var_dump($id_admission);exit();
		$type=$this->getTypeAdmissionTable()->getTypeAdmis($id_admission);
		//var_dump($type);exit();
		$id_type_ad=$type['id_type_ad'];
		//var_dump($id_type_ad);exit();
		$type_admission=$this->getTypeAdmissionTable()->getTypeAdmi($id_admission);			
	  // $form->get('motif_ad')->setValueOptions($type_admission);
	  // var_dump($type_admission);exit();
  		if($id_type_ad==1){
  			//var_dump($type_admission);exit();
 			$form->get('motif_ad')->setValueOptions($type_admission);
 			
  		}
	   
		elseif($id_type_ad==2){
			//var_dump($type_admi);exit();
			$evacuation = $this->getEvacuationTable()->getEva($id_admission);		
			  $form->get('motif_ad')->setValueOptions($type_admission);
			$form->get('motif')->setValue($evacuation['motif_evacuation']);
			$form->get('service_origine')->setValue($evacuation['service_origine_ev']);
			
		}
		
		
		else {
			$reference = $this->getReferenceTable()->getRefer($id_admission);
		  $form->get('motif_ad')->setValueOptions($type_admission);
			$form->get('motif')->setValue($reference['motif_reference']);
			$form->get('service_origine')->setValue($reference['service_origine_ref']);
			//var_dump($reference);exit();
		}

	
	
	

		//var_dump($form);exit();
	$liste_type = $this->getTypeAccouchementTable ()->listeTypeAccouchement ();
		$afficheTous = array ("" => 'Selectionnez un Type');
	//	var_dump($liste_type);exit();
		$tab_type = $liste_type ;
		$form->get('type_accouchement')->setValueOptions($tab_type);
		
		// instancier la consultation et rï¿½cupï¿½rer l'enregistrement
		$consult = $this->getConsultationTable()->getConsult($id);
	//var_dump($consult); exit();
		// POUR LES HISTORIQUES OU TERRAIN PARTICULIER
		// POUR LES HISTORIQUES OU TERRAIN PARTICULIER
		// POUR LES HISTORIQUES OU TERRAIN PARTICULIER
		// *** Liste des consultations
		$listeConsultation = $this->getConsultationTable()->getConsultationPatient($id_pat, $id);
	
		// Liste des examens biologiques
		$listeDesExamensBiologiques = $this->demandeExamensTable()->getDemandeDesExamensBiologiques();
		
		// Liste des examens Morphologiques
		$listeDesExamensMorphologiques = $this->demandeExamensTable()->getDemandeDesExamensMorphologiques();
		
		// *** Liste des Hospitalisations
		$listeHospitalisation = $this->getDemandeHospitalisationTable()->getDemandeHospitalisationWithIdPatient($id_pat);
		
		// instancier le motif d'admission et recupï¿½rer l'enregistrement
		$motif_admission = $this->getMotifAdmissionTable()->getMotifAdmission($id);
		$nbMotif = $this->getMotifAdmissionTable()->nbMotifs($id);
		
		// rï¿½cupï¿½ration de la liste des hopitaux
		$hopital = $this->getTransfererPatientServiceTable()->fetchHopital();
		$form->get('hopital_accueil')->setValueOptions($hopital);
		// RECUPERATION DE L'HOPITAL DU SERVICE
		$transfertPatientHopital = $this->getTransfererPatientServiceTable()->getHopitalPatientTransfert($IdDuService);
		$idHopital = $transfertPatientHopital ['ID_HOPITAL'];
	
		// RECUPERATION DE LA LISTE DES SERVICES DE L'HOPITAL OU SE TROUVE LE SERVICE OU LE MEDECIN TRAVAILLE
		$serviceHopital = $this->getTransfererPatientServiceTable()->fetchServiceWithHopitalNotServiceActual($idHopital, $IdDuService);
		
		// LISTE DES SERVICES DE L'HOPITAL
		$form->get('service_accueil')->setValueOptions($serviceHopital);
	
		// liste des heures rv
		$heure_rv = array(
				'08:00' => '08:00',
				'09:00' => '09:00',
				'10:00' => '10:00',
				'15:00' => '15:00',
				'16:00' => '16:00'
		);
		
		$form->get('heure_rv')->setValueOptions($heure_rv);
	
		$data = array(
				'id_cons' => $consult->id_cons,
				'id_medecin' => $id_medecin,
				'id_patient' => $consult->id_patient,
				'date_cons' => $consult->date,
			
				//'taille' => $consult->taille,
				'temperature' => $consult->temperature,
				'paleur' => $consult->paleur,
			
				'pressionarterielle' => $consult->pression_arterielle,
				'hopital_accueil' => $idHopital,		
				'id_admission' => $id_admission,
				'id_grossesse' => $id_grossesse,
		);
		
	    //var_dump($dat);exit();
	
		// Pour recuper les bandelettes
		$bandelettes = $this->getConsultationTable()->getBandelette($id);
		
		// RECUPERATION DES ANTECEDENTS
		// RECUPERATION DES ANTECEDENTS
		// RECUPERATION DES ANTECEDENTS
		$donneesAntecedentsPersonnels = $this->getAntecedantPersonnelTable()->getTableauAntecedentsPersonnels($id_pat);
		$donneesAntecedentsFamiliaux = $this->getAntecedantsFamiliauxTable()->getTableauAntecedentsFamiliaux($id_pat);
	
		// Recuperer les antecedents medicaux ajouter pour le patient
		// Recuperer les antecedents medicaux ajouter pour le patient
		$antMedPat = $this->getConsultationTable()->getAntecedentMedicauxPersonneParIdPatient($id_pat);
	
		// Recuperer les antecedents medicaux
		// Recuperer les antecedents medicaux
		$listeAntMed = $this->getConsultationTable()->getAntecedentsMedicaux();
	
		// FIN ANTECEDENTS --- FIN ANTECEDENTS --- FIN ANTECEDENTS
		// FIN ANTECEDENTS --- FIN ANTECEDENTS --- FIN ANTECEDENTS
	
		// Recuperer la liste des actes
		// Recuperer la liste des actes
		$listeActes = $this->getConsultationTable()->getListeDesActes();
		
		$form->populateValues(array_merge($data, $bandelettes, $donneesAntecedentsPersonnels, $donneesAntecedentsFamiliaux));
		return array(
				'lesdetails' => $liste,
				'id_cons' => $id,
				'nbMotifs' => $nbMotif,
				'image' => $image,
				'form' => $form,
				'heure_cons' => $consult->heurecons,
				'dateonly' => $consult->dateonly,
				//'liste_med' => $listeMedicament,
				'temoin' => $bandelettes ['temoin'],
				// 'temoinMotifAdmission' => $motif_admission['temoinMotifAdmission'],
				'listeForme' => $listeForme,
				'listetypeQuantiteMedicament' => $listetypeQuantiteMedicament,
				'donneesAntecedentsPersonnels' => $donneesAntecedentsPersonnels,
				'donneesAntecedentsFamiliaux' => $donneesAntecedentsFamiliaux,
				'liste' => $listeConsultation,
				'resultRV' => $resultRV,
				'listeHospitalisation' => $listeHospitalisation,
				'listeDesExamensBiologiques' => $listeDesExamensBiologiques,
				'listeDesExamensMorphologiques' => $listeDesExamensMorphologiques,
				'listeAntMed' => $listeAntMed,
				'antMedPat' => $antMedPat,
				'nbAntMedPat' => $antMedPat->count(),
				'listeActes' => $listeActes
		);
		
	}
	
	
	public function majAccouchementAction()
	{
		$this->layout()->setTemplate('layout/accouchement');

        $user = $this->layout()->user;
        $IdDuService = $user ['IdService'];

        $id_pat = $this->params()->fromQuery('id_patient', 0);
        $liste = $this->getPatientTable()->getInfoPatient($id_pat);

        // Recuperer la photo du patient
        $image = $this->getPatientTable()->getPhoto($id_pat);

        // Formulaire consultation
        $form = new ConsultationForm ();

        $id_cons = $this->params()->fromQuery('id_cons', 0);

        $consult = $this->getConsultationTable()->getConsult($id_cons);

        // instancier le motif d'admission et recupï¿½rer l'enregistrement
        //$motif_admission = $this->getMotifAdmissionTable()->getMotifAdmission($id_cons);
       // $nbMotif = $this->getMotifAdmissionTable()->nbMotifs($id_cons);

        // Pour verifier la date du rendez vous afin de le signaler
        $rendez_vous = $this->getRvPatientConsTable()->getRendezVous($id_cons);

        $data = array(
            'id_cons' => $consult->id_cons,
            'id_surveillant' => $consult->id_surveillant,
            'id_patient' => $consult->id_patient,
            'date_cons' => $consult->date,
            //'poids' => $consult->poids,
            //'taille' => $consult->taille,
        		'paleur' => $consult->paleur,
            'temperature' => $consult->temperature,
            'pressionarterielle' => $consult->pression_arterielle,
            //'pouls' => $consult->pouls,
           // 'frequence_respiratoire' => $consult->frequence_respiratoire,
           // 'glycemie_capillaire' => $consult->glycemie_capillaire
        );

        $k = 1;
       /* foreach ($motif_admission as $Motifs) {
            $data ['motif_admission' . $k] = $Motifs ['Libelle_motif'];
            $k++;
        }*/

        // Pour recuper les bandelettes
        //$bandelettes = $this->getConsultationTable()->getBandelette($id_cons);

      //  $form->populateValues(array_merge($data, $bandelettes));

        // RECUPERER TOUS LES PATIENTS AYANT UN RV aujourd'hui
        $tabPatientRV = $this->getConsultationTable()->getPatientsRV($IdDuService);
        $resultRV = null;
        if (array_key_exists($id_pat, $tabPatientRV)) {
            $resultRV = $tabPatientRV [$id_pat];
        }

        return array(
            'lesdetails' => $liste,
            'image' => $image,
            'form' => $form,
            'id_cons' => $id_cons,
            'verifieRV' => $rendez_vous,
            'heure_cons' => $consult->heurecons,
            'dateonly' => $consult->dateonly,
            //'nbMotifs' => $nbMotif,
           // 'temoin' => $bandelettes ['temoin'],
           // 'temoinMotifAdmission' => $motif_admission ['temoinMotifAdmission'],
            'resultRV' => $resultRV
        );
	}
	
	public function vuePatientAdmisAction(){
		$this->getDateHelper();
		//var_dump('test');exit();
		//$chemin = $this->getServiceLocator()->get('Request')->getBasePath();
		$idPatient = (int)$this->params()->fromPost ('idPatient');
		$idAdmission = (int)$this->params()->fromPost ('idAdmission');
	
		$unPatient = $this->getPatientTable()->getInfoPatient($idPatient);
		$photo = $this->getPatientTable()->getPhoto($idPatient);
		
		//Informations sur l'admission
		//$InfoAdmis = $this->getAdmissionTable()->getPatientAdmis($idAdmission);
		//var_dump($photo);exit();
		//Verifier si le patient a un rendez-vous et si oui dans quel service et a quel heure
		$today = new \DateTime ();
		$dateAujourdhui = $today->format( 'Y-m-d' );
		$RendezVOUS = $this->getPatientTable ()->verifierRV($idPatient, $dateAujourdhui);
		
		//Recuperer le service
		//$InfoService = $this->getServiceTable()->getServiceAffectation($InfoAdmis->id_service);
	
		$date = $unPatient['DATE_NAISSANCE'];
		//if($date){ $date = (new DateHelper())->convertDate ( $unPatient['DATE_NAISSANCE'] ); }else{ $date = null;}
	
		$html  = "<div style='width:100%;'>";
			
 		$html .= "<div style='width: 18%; height: 180px; float:left;'>";
		$html .= "<div id='photo' style='float:left; margin-left:40px; margin-top:10px; margin-right:30px;'> <img style='width:105px; height:105px;' src='../img/photos_patients/". $photo ."' ></div>";
		$html .= "<div style='margin-left:60px; margin-top: 150px;'> <div style='text-decoration:none; font-size:14px; float:left; padding-right: 7px; '>Age:</div>  <div style='font-weight:bold; font-size:19px; font-family: time new romans; color: green; font-weight: bold;'>" . $unPatient['AGE'] . " ans</div></div>";
		$html .= "</div>";
			
		$html .= "<div style='width: 70%; height: 180px; float:left;'>";
		$html .= "<table id='vuePatientAdmission' style='margin-top:10px; float:left'>";
	
		$html .= "<tr style='width: 100%;'>";
		$html .= "<td style='width: 19%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nmero dossier:</a><br><div style='width: 150px; max-width: 160px; height:40px; overflow:auto; margin-bottom: 3px;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['NUMERO_DOSSIER'] . "</p></div></td>";
		$html .= "<td style='width: 19%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Date de naissance:</a><br><div style='width: 150px; max-width: 160px; height:40px; overflow:auto; margin-bottom: 3px;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['DATE_NAISSANCE'] . "</p></div></td>";
		$html .= "<td style='width: 23%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute;  d'origine:</a><br><div style='width: 95%; '><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ORIGINE'] . "</p></div></td>";
		$html .= "<td style='width: 23%; vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>T&eacute;l&eacute;phone:</a><br><div style='width: 95%; '><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['TELEPHONE'] . "</p></div></td>";
		$html .= "<td style='width: 29%; '></td>";
		
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Pr&eacute;nom:</a><br><div style='width: 95%; max-width: 130px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['PRENOM'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Lieu de naissance:</a><br><div style='width: 95%; max-width: 250px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['LIEU_NAISSANCE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nationalit&eacute; actuelle:</a><br><div style='width: 95%; max-width: 135px; overflow:auto; '><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['NATIONALITE_ACTUELLE']. "</p></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Email:</a><br><div style='width: 100%; max-width: 235px; height:40px; overflow:auto;'><p style='font-weight:bold; font-size:17px;'>" . $unPatient['EMAIL'] . "</p></div></td>";
			
		$html .= "</tr><tr style='width: 100%;'>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Nom  :</a><br><div style='width: 95%; max-width: 130px; height:40px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" .$unPatient['NOM']  . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Sexe:</a><br><div style='width: 97%; max-width: 250px; height:50px; overflow:auto; margin-bottom: 3px;'><p style=' font-weight:bold; font-size:17px;'>" . $unPatient['SEXE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Adresse:</a><br><div style='width: 95%; max-width: 235px; height:40px; overflow:auto; '><p style=' font-weight:bold; font-size:17px;'>" .  $unPatient['ADRESSE'] . "</p></div></td>";
		$html .= "<td style='vertical-align: top;'><a style='text-decoration:underline; font-size:12px;'>Profession:</a><br><div style='width: 95%; max-width: 235px; height:40px; overflow:auto; '><p style=' font-weight:bold; font-size:17px;'>" .  $unPatient['PROFESSION'] . "</p></div></td>";
		if($RendezVOUS){
			$html .= "<span> <i style='color:green;'>
					        <span id='image-neon' style='color:red; font-weight:bold;'>Rendez-vous! </span> <br>
					        <span style='font-size: 16px;'>Service:</span> <span style='font-size: 16px; font-weight:bold;'> ". $RendezVOUS[ 'NOM' ]." </span> <br>
					        <span style='font-size: 16px;'>Heure:</span>  <span style='font-size: 16px; font-weight:bold;'>". $RendezVOUS[ 'HEURE' ]." </span> </i>
			              </span>";
		}
	
		$html .= "</td>";
		$html .= "</tr>";
		$html .= "</table>";
		$html .="</div>";
			
		$html .= "<div style='width: 12%; height: 180px; float:left; '>";

		$html .= "</div>";
			
		$html .= "</div>";
	
		
		$html .="<div id='barre_separateur'></div>";
	
		$html .="<table style='margin-top:10px; margin-left:18%; width: 80%; margin-bottom: 60px;'>";
	
 		$html .="<tr style='width: 80%; '>";
       // $html .="<td style='width: 50%; vertical-align:top; margin-right:10px;'><span id='labelHeureLABEL' style='padding-left: 5px;'>Date d'admission </span><br><p id='zoneChampInfo1' style='background:#f8faf8; padding-left: 5px; padding-top: 5px;'> ". $this->controlDate->convertDateTime($InfoAdmis->date_enregistrement) ." </p></td>";

 		//$html .="<td style='width: 50%; vertical-align:top; margin-right:10px;'><span id='labelHeureLABEL' style='padding-left: 5px;'>Service </span><br><p id='zoneChampInfo1' style='background:#f8faf8; padding-left: 5px; padding-top: 5px; font-size:15px;'> ". $InfoService->nom ." </p></td>";

		//$html .="</tr>";
	

	    $html .="</table>";
    	$html .="<table style='margin-top:10px; margin-left:18%; width: 80%;'>";
        $html .="<tr style='width: 80%;'>";
	
 		$html .="<td class='block' id='thoughtbot' style='width: 35%; display: inline-block;  vertical-align: bottom; padding-left:350px; padding-bottom: 15px; padding-right: 150px;'><button type='submit' id='terminer'>Terminer</button></td>";
	
		$html .="</tr>";
 		$html .="</table>";
	

 		
		$html .="<script>listepatient();
				  function FaireClignoterImage (){
                    $('#image-neon').fadeOut(900).delay(300).fadeIn(800);
                  }
                  setInterval('FaireClignoterImage()',2200);
	
				  $('#button_pdf').click(function(){
				     vart='/simens/public/facturation/impression-facture';
				     var formulaire = document.createElement('form');
			         formulaire.setAttribute('action', vart);
			         formulaire.setAttribute('method', 'POST');
			         formulaire.setAttribute('target', '_blank');
	
				     var champ = document.createElement('input');
				     champ.setAttribute('type', 'hidden');
				     champ.setAttribute('name', 'idAdmission');
				     champ.setAttribute('value', ".$idAdmission.");
				     formulaire.appendChild(champ);
				  
				     formulaire.submit();
	              });
	
				  $('a,img,hass').tooltip({
                  animation: true,
                  html: true,
                  placement: 'bottom',
                  show: {
                    effect: 'slideDown',
                      delay: 250
                    }
                  });
	
				 </script>";
		//var_dump($photo);exit();
 		$this->getResponse ()->getHeaders ()->addHeaderLine ( 'Content-Type', 'application/html; charset=utf-8' );
		return $this->getResponse()->setContent(Json::encode($html));
	
	}

	public function listeRendezVousAjaxAction() {
		$output = $this->getRvPatientConsTable()->getTousRV();
		// var_dump("$leRendezVous"); exit();
		//$patient = $this->getPatientTable ();
		return $this->getResponse ()->setContent ( Json::encode ( $output, array (
				'enableJsonExprFinder' => true
		) ) );
	}
	
	
	
	

	
	
	public function ajouterMamanAction() {
		$this->layout ()->setTemplate ( 'layout/accouchement' );
		$form = $this->getForm ();
		$patientTable = $this->getPatientTable();
		$form->get('NATIONALITE_ORIGINE')->setvalueOptions($patientTable->listeDeTousLesPays());
		$form->get('NATIONALITE_ACTUELLE')->setvalueOptions($patientTable->listeDeTousLesPays());
		$data = array('NATIONALITE_ORIGINE' => 'SÃ©nÃ©gal', 'NATIONALITE_ACTUELLE' => 'SÃ©nÃ©gal');
	
		$form->populateValues($data);
	
		return new ViewModel ( array (
				'form' => $form
		) );
	}

	public function majComplementAccouchementAction()
	{
		//var_dump('test');exit();
		 $this->layout()->setTemplate('layout/accouchement');

        $user = $this->layout()->user;
        $IdDuService = $user ['IdService'];
        $id_medecin = $user ['id_personne'];
        

        $this->getDateHelper();
        $id_pat = $this->params()->fromQuery('id_patient', 0);
        $id = $this->params()->fromQuery('id_cons');
        $form = new ConsultationForm ();
        $liste = $this->getConsultationTable()->getInfoPatient($id_pat);
        $image = $this->getConsultationTable()->getPhoto($id_pat);

      	$form = new ConsultationForm ();
		//var_dump($form);exit();
	
		$liste_type = $this->getTypeAccouchementTable ()->listeTypeAccouchement ();
		$afficheTous = array ("" => 'Selectionnez un Type');
		
		$tab_type = array_merge ( $afficheTous, $liste_type );
		$form->get('type_accouchement')->setValueOptions($tab_type);
        // GESTION DES ALERTES
        // RECUPERER TOUS LES PATIENTS AYANT UN RV aujourd'hui
        $tabPatientRV = $this->getConsultationTable()->getPatientsRV($IdDuService);
        $resultRV = null;
        if (array_key_exists($id_pat, $tabPatientRV)) {
            $resultRV = $tabPatientRV [$id_pat];
        }

        // POUR LES CONSTANTES
        // POUR LES CONSTANTES
        // POUR LES CONSTANTES
        $consult = $this->getConsultationTable()->getConsult($id);
//var_dump($consult);exit();
        $pos = strpos($consult->pression_arterielle, '/');
        $tensionmaximale = substr($consult->pression_arterielle, 0, $pos);
        $tensionminimale = substr($consult->pression_arterielle, $pos + 1);

        $data = array(
            'id_cons' => $consult->id_cons,
            'id_medecin' => $consult->id_medecin,
            'id_patient' => $consult->id_patient,
            'date_cons' => $consult->date,
           // 'poids' => $consult->poids,
            //'taille' => $consult->taille,
        		'paleur' => $consult->paleur,
            'temperature' => $consult->temperature,
            'tensionmaximale' => $tensionmaximale,
            'tensionminimale' => $tensionminimale,
           // 'pouls' => $consult->pouls,
            //'frequence_respiratoire' => $consult->frequence_respiratoire,
            'glycemie_capillaire' => $consult->glycemie_capillaire
        );
//var_dump($consult);exit();
        // POUR LES MOTIFS D'ADMISSION
        // POUR LES MOTIFS D'ADMISSION
        // POUR LES MOTIFS D'ADMISSION
        // instancier le motif d'admission et recupï¿½rer l'enregistrement
        $motif_admission = $this->getMotifAdmissionTable()->getMotifAdmission($id);
        $nbMotif = $this->getMotifAdmissionTable()->nbMotifs($id);

        /*
		 * //POUR LES MOTIFS D'ADMISSION $k = 1; foreach ($motif_admission as $Motifs) { $data ['motif_admission' . $k] = $Motifs ['Libelle_motif']; $k++; }
		 */

        // POUR LES EXAMEN PHYSIQUES
        // POUR LES EXAMEN PHYSIQUES
        // POUR LES EXAMEN PHYSIQUES
       // var_dump($this->getDonneesExamensPhysiquesTable()->getExamensPhysiques($id));exit();
        $examen_physique = $this->getDonneesExamensPhysiquesTable()->getExamensPhysiques($id);
        $dat = $this->controlDate->convertDate( $examen_physique['date_rupt_pde']);
        //$dat_r=$examen_physique->date_rupt_pde;
        $accouchement = $this->getAccouchementTable()->getAccouchement($id);
        $date_acc = $this->controlDate->convertDate( $accouchement['date_accouchement']);

       
     
        //var_dump($dat);exit();
        $data_exam = array(
            //'id_cons' => $consult->id_cons,
        		'examen_maternite_donnee1' => $examen_physique['toucher_vaginale'],
        		'examen_maternite_donnee2' => $examen_physique ['hauteur_uterine'],
        		'examen_maternite_donnee3' => $examen_physique ['bdc'],
        		'examen_maternite_donnee10' => $examen_physique ['nb_bdc'],
        		'examen_maternite_donnee4' => $examen_physique ['la'],
        		'examen_maternite_donnee5' => $examen_physique ['pde'],
        		'examen_maternite_donnee11' => $examen_physique ['aspect'],
        		'examen_maternite_donnee6'=>$dat,
        		'examen_maternite_donnee7' => $examen_physique ['heure_rupt_pde'],
        		'examen_maternite_donnee8' => $examen_physique ['presentation'],  		 
        		'examen_maternite_donnee9' => $examen_physique ['bassin'],
        		'note_tv' => $examen_physique ['note_tv'],
        		'note_hu' => $examen_physique ['note_hu'],
        		'note_bdc' => $examen_physique ['note_bdc'],
        		'note_la' => $examen_physique ['note_la'],
        		'note_pde' => $examen_physique ['note_pde'],
        		'note_presentation' => $examen_physique['note_presentation'],
        		'note_bassin' => $examen_physique ['note_bassin'],
        );

      // var_dump($data_exam);exit();
       // $dat ['date_accouchement'] = $this->controlDate->convertDate($accouchement ->date_accouchement);
        $data_accou = array(
        		//'id_cons' => $consult->id_cons,
        		'type_accouchement' => $accouchement ['type_accouchement'],
        		'heure_accouchement' => $accouchement ['heure_accouchement'],
        		'motif_type' => $accouchement ['motif_type'],
        		'delivrance' => $accouchement ['delivrance'],
        		'ru' => $accouchement ['ru'],
        		'hemoragie' => $accouchement ['hemoragie'],
        		'date_accouchement'=>$date_acc,
        		'ocytocique_per' => $accouchement ['ocytocique_per'],
        		'ocytocique_post' => $accouchement ['ocytocique_post'],
        		'antibiotique' => $accouchement ['antibiotique'],
        		'anticonvulsant' => $accouchement ['anticonvulsant'],
        		'transfusion' => $accouchement ['transfusion'],
        		'observations' => $accouchement ['observations'],
        		

        );
       // var_dump($data_accou);exit();
        //pour l'enfant
        //pour les accouchement
        $enfant = $this->getNaissanceTable()->getNaissance($id);
      
        $data_enf = array(
        		//'id_cons' => $consult->id_cons,
        		'poids' => $enfant ['poids'],
        	    'sexe' => $enfant ['sexe'],
        		'apgar_1' => $enfant ['apgar_1'],
        		'apgar_5' => $enfant ['apgar_5'],
        		'malf' => $enfant ['malf'],
        		'cri' => $enfant ['cri'],
        		'maintien_temp'=>$enfant ['maintien_temp'],
        		'mise_soin_precoce' => $enfant ['mise_soin_precoce'],
        		'soin_cordon' => $enfant ['soin_cordon'],
        	    'reanimation' => $enfant ['reanimation'],
        		'sat' => $enfant ['sat'],
                 'vit_k' => $enfant ['vit_k'],
        		'collyre' => $enfant ['collyre'],
        		'consult_j1_j2' => $enfant ['consult_j1_j2']
        );

        
      // var_dump($data_enf);exit();
        
        $evac = $this->getEvacuationTable()->getEvacuation($id);
        
        $data_evac = array(
        	'evacue_de' => $evac['evacue_de'],
        	'motif_evac' => $evac['motif_evac'],
        	'service_origine' => $evac['service_origine'],
        	'evacue_vers' => $evac['evacue_vers'],
        	'motif_ev_vers' => $evac['motif_ev_vers'],
        	'service_accueil_ev' => $evac['service_acceuil_ev'],
        	'reference' => $evac['reference'],
        	'motif_ref' => $evac['motif_ref'],
        	'refere_de' => $evac['refere_de'],
         );
        
        //var_dump($data_evac);exit();
        
        
        // POUR LES ANTECEDENTS OU TERRAIN PARTICULIER
        $listeConsultation = $this->getConsultationTable()->getConsultationPatientSaufActu($id_pat, $id);

        // Recuperer les informations sur le surveillant de service pour les consultations qui diffï¿½rent des consultations prises lors des archives
        $tabInfoSurv = array();
        foreach ($listeConsultation as $listeCons) {
            if ($listeCons ['ID_SURVEILLANT']) {
                $tabInfoSurv [$listeCons ['ID_CONS']] = $this->getConsultationTable()->getInfosSurveillant($listeCons ['ID_SURVEILLANT'])['PRENOM'] . ' ' . $this->getConsultationTable()->getInfosSurveillant($listeCons ['ID_SURVEILLANT'])['NOM'];
            } else {
                $tabInfoSurv [$listeCons ['ID_CONS']] = '_________';
            }
        }

        $listeConsultation = $this->getConsultationTable()->getConsultationPatientSaufActu($id_pat, $id);

        // *** Liste des Hospitalisations
        $listeHospitalisation = $this->getDemandeHospitalisationTable()->getDemandeHospitalisationWithIdPatient($id_pat);

        // POUR LES EXAMENS COMPLEMENTAIRES
        // POUR LES EXAMENS COMPLEMENTAIRES
        // POUR LES EXAMENS COMPLEMENTAIRES
        // DEMANDES DES EXAMENS COMPLEMENTAIRES
        $listeDemandesMorphologiques = $this->demandeExamensTable()->getDemandeExamensMorphologiques($id);
        $listeDemandesBiologiques = $this->demandeExamensTable()->getDemandeExamensBiologiques($id);
        $listeDemandesActes = $this->getDemandeActe()->getDemandeActe($id);

        // Liste des examens biologiques
        $listeDesExamensBiologiques = $this->demandeExamensTable()->getDemandeDesExamensBiologiques();
        // Liste des examens Morphologiques
        $listeDesExamensMorphologiques = $this->demandeExamensTable()->getDemandeDesExamensMorphologiques();

        // //RESULTATS DES EXAMENS BIOLOGIQUES DEJA EFFECTUES ET ENVOYER PAR LE BIOLOGISTE
        $listeDemandesBiologiquesEffectuerEnvoyer = $this->demandeExamensTable()->getDemandeExamensBiologiquesEffectuesEnvoyer($id);
        $listeDemandesBiologiquesEffectuer = $this->demandeExamensTable()->getDemandeExamensBiologiquesEffectues($id);

        $tableauResultatsExamensBio = array(
            'temoinGSan' => 0,
            'temoinHSan' => 0,
            'temoinBHep' => 0,
            'temoinBRen' => 0,
            'temoinBHem' => 0,
            'temoinBInf' => 0
        );
        foreach ($listeDemandesBiologiquesEffectuerEnvoyer as $listeExamenBioEffectues) {
            if ($listeExamenBioEffectues ['idExamen'] == 1) {
                $data ['groupe_sanguin'] = $listeExamenBioEffectues ['noteResultat'];
                $tableauResultatsExamensBio ['groupe_sanguin_infoInfirmier'] = $this->getConsultationTable()->getInfosSurveillant($listeExamenBioEffectues ['id_personne']);
                $tableauResultatsExamensBio ['groupe_sanguin_date_enregistrement'] = $this->controlDate->convertDateTime($listeExamenBioEffectues ['date_enregistrement']);
                $tableauResultatsExamensBio ['groupe_sanguin_conclusion'] = $listeExamenBioEffectues ['conclusion'];
                $tableauResultatsExamensBio ['temoinGSan'] = 1;
            }
            if ($listeExamenBioEffectues ['idExamen'] == 2) {
                $data ['hemogramme_sanguin'] = $listeExamenBioEffectues ['noteResultat'];
                $tableauResultatsExamensBio ['hemogramme_sanguin_infoInfirmier'] = $this->getConsultationTable()->getInfosSurveillant($listeExamenBioEffectues ['id_personne']);
                $tableauResultatsExamensBio ['hemogramme_sanguin_date_enregistrement'] = $this->controlDate->convertDateTime($listeExamenBioEffectues ['date_enregistrement']);
                $tableauResultatsExamensBio ['hemogramme_sanguin_conclusion'] = $listeExamenBioEffectues ['conclusion'];
                $tableauResultatsExamensBio ['temoinHSan'] = 1;
            }
            if ($listeExamenBioEffectues ['idExamen'] == 3) {
                $data ['bilan_hepatique'] = $listeExamenBioEffectues ['noteResultat'];
                $tableauResultatsExamensBio ['bilan_hepatique_infoInfirmier'] = $this->getConsultationTable()->getInfosSurveillant($listeExamenBioEffectues ['id_personne']);
                $tableauResultatsExamensBio ['bilan_hepatique_date_enregistrement'] = $this->controlDate->convertDateTime($listeExamenBioEffectues ['date_enregistrement']);
                $tableauResultatsExamensBio ['bilan_hepatique_conclusion'] = $listeExamenBioEffectues ['conclusion'];
                $tableauResultatsExamensBio ['temoinBHep'] = 1;
            }
            if ($listeExamenBioEffectues ['idExamen'] == 4) {
                $data ['bilan_renal'] = $listeExamenBioEffectues ['noteResultat'];
                $tableauResultatsExamensBio ['bilan_renal_infoInfirmier'] = $this->getConsultationTable()->getInfosSurveillant($listeExamenBioEffectues ['id_personne']);
                $tableauResultatsExamensBio ['bilan_renal_date_enregistrement'] = $this->controlDate->convertDateTime($listeExamenBioEffectues ['date_enregistrement']);
                $tableauResultatsExamensBio ['bilan_renal_conclusion'] = $listeExamenBioEffectues ['conclusion'];
                $tableauResultatsExamensBio ['temoinBRen'] = 1;
            }
            if ($listeExamenBioEffectues ['idExamen'] == 5) {
                $data ['bilan_hemolyse'] = $listeExamenBioEffectues ['noteResultat'];
                $tableauResultatsExamensBio ['bilan_hemolyse_infoInfirmier'] = $this->getConsultationTable()->getInfosSurveillant($listeExamenBioEffectues ['id_personne']);
                $tableauResultatsExamensBio ['bilan_hemolyse_date_enregistrement'] = $this->controlDate->convertDateTime($listeExamenBioEffectues ['date_enregistrement']);
                $tableauResultatsExamensBio ['bilan_hemolyse_conclusion'] = $listeExamenBioEffectues ['conclusion'];
                $tableauResultatsExamensBio ['temoinBHem'] = 1;
            }
            if ($listeExamenBioEffectues ['idExamen'] == 6) {
                $data ['bilan_inflammatoire'] = $listeExamenBioEffectues ['noteResultat'];
                $tableauResultatsExamensBio ['bilan_inflammatoire_infoInfirmier'] = $this->getConsultationTable()->getInfosSurveillant($listeExamenBioEffectues ['id_personne']);
                $tableauResultatsExamensBio ['bilan_inflammatoire_date_enregistrement'] = $this->controlDate->convertDateTime($listeExamenBioEffectues ['date_enregistrement']);
                $tableauResultatsExamensBio ['bilan_inflammatoire_conclusion'] = $listeExamenBioEffectues ['conclusion'];
                $tableauResultatsExamensBio ['temoinBInf'] = 1;
            }
        }

        // //RESULTATS DES EXAMENS MORPHOLOGIQUE
        $examen_morphologique = $this->getNotesExamensMorphologiquesTable()->getNotesExamensMorphologiques($id);

        $data ['radio'] = $examen_morphologique ['radio'];
        $data ['ecographie'] = $examen_morphologique ['ecographie'];
        $data ['fibrocospie'] = $examen_morphologique ['fibroscopie'];
        $data ['scanner'] = $examen_morphologique ['scanner'];
        $data ['irm'] = $examen_morphologique ['irm'];

        // //RESULTATS DES EXAMENS MORPHOLOGIQUES DEJA EFFECTUES ET ENVOYER PAR LE BIOLOGISTE
        $listeDemandesMorphologiquesEffectuer = $this->demandeExamensTable()->getDemandeExamensMorphologiquesEffectues($id);

        // DIAGNOSTICS
        // DIAGNOSTICS
        // DIAGNOSTICS
        $infoDiagnostics = $this->getDiagnosticsTable()->getDiagnostics($id);
        // POUR LES DIAGNOSTICS
        $k = 1;
        foreach ($infoDiagnostics as $diagnos) {
            $data ['diagnostic' . $k] = $diagnos ['libelle_diagnostics'];
            $k++;
        }

        $listeMedicament = $this->getConsultationTable()->listeDeTousLesMedicaments();
        $listeForme = $this->getConsultationTable()->formesMedicaments();
        $listetypeQuantiteMedicament = $this->getConsultationTable()->typeQuantiteMedicaments();

        // INSTANTIATION DE L'ORDONNANCE
        $infoOrdonnance = $this->getOrdonnanceTable()->getOrdonnanceNonHospi($id);

        if ($infoOrdonnance) {
            $idOrdonnance = $infoOrdonnance->id_document;
            $duree_traitement = $infoOrdonnance->duree_traitement;
            // LISTE DES MEDICAMENTS PRESCRITS
            $listeMedicamentsPrescrits = $this->getOrdonnanceTable()->getMedicamentsParIdOrdonnance($idOrdonnance);
            $nbMedPrescrit = $listeMedicamentsPrescrits->count();
        } else {
            $nbMedPrescrit = null;
            $listeMedicamentsPrescrits = null;
            $duree_traitement = null;
        }

        // POUR LA DEMANDE PRE-ANESTHESIQUE
        // POUR LA DEMANDE PRE-ANESTHESIQUE
        // POUR LA DEMANDE PRE-ANESTHESIQUE
        $donneesDemandeVPA = $this->getDemandeVisitePreanesthesiqueTable()->getDemandeVisitePreanesthesique($id);

        $resultatVpa = null;
        if ($donneesDemandeVPA) {
            $data ['diagnostic_traitement_chirurgical'] = $donneesDemandeVPA ['DIAGNOSTIC'];
            $data ['observation'] = $donneesDemandeVPA ['OBSERVATION'];
            $data ['intervention_prevue'] = $donneesDemandeVPA ['INTERVENTION_PREVUE'];

            $resultatVpa = $this->getResultatVpa()->getResultatVpa($donneesDemandeVPA ['idVpa']);
        }

        /**
         * ** INSTRUMENTAL ***
         */
        /**
         * ** INSTRUMENTAL ***
         */
        /**
         * ** INSTRUMENTAL ***
         */
        $traitement_instrumental = $this->getConsultationTable()->getTraitementsInstrumentaux($id);

        $data ['endoscopieInterventionnelle'] = $traitement_instrumental ['endoscopie_interventionnelle'];
        $data ['radiologieInterventionnelle'] = $traitement_instrumental ['radiologie_interventionnelle'];
        $data ['cardiologieInterventionnelle'] = $traitement_instrumental ['cardiologie_interventionnelle'];
        $data ['autresIntervention'] = $traitement_instrumental ['autres_interventions'];

        // POUR LES COMPTES RENDU OPERATOIRE
        // POUR LES COMPTES RENDU OPERATOIRE
        $compte_rendu_chirurgical = $this->getConsultationTable()->getCompteRenduOperatoire(1, $id);
        $data ['note_compte_rendu_operatoire'] = $compte_rendu_chirurgical ['note'];
        $compte_rendu_instrumental = $this->getConsultationTable()->getCompteRenduOperatoire(2, $id);
        $data ['note_compte_rendu_operatoire_instrumental'] = $compte_rendu_instrumental ['note'];

        // POUR LE TRANSFERT
        // POUR LE TRANSFERT
        // POUR LE TRANSFERT
        // INSTANCIATION DU TRANSFERT
        // RECUPERATION DE LA LISTE DES HOPITAUX
        $hopital = $this->getTransfererPatientServiceTable()->fetchHopital();

        // LISTE DES HOPITAUX
        $form->get('hopital_accueil')->setValueOptions($hopital);
        // RECUPERATION DU SERVICE OU EST TRANSFERE LE PATIENT
        $transfertPatientService = $this->getTransfererPatientServiceTable()->getServicePatientTransfert($id);

        if ($transfertPatientService) {
            $idService = $transfertPatientService ['ID_SERVICE'];
            // RECUPERATION DE L'HOPITAL DU SERVICE
            $transfertPatientHopital = $this->getTransfererPatientServiceTable()->getHopitalPatientTransfert($idService);
            $idHopital = $transfertPatientHopital ['ID_HOPITAL'];
            // RECUPERATION DE LA LISTE DES SERVICES DE L'HOPITAL OU SE TROUVE LE SERVICE OU IL EST TRANSFERE
            $serviceHopital = $this->getTransfererPatientServiceTable()->fetchServiceWithHopital($idHopital);

            // LISTE DES SERVICES DE L'HOPITAL
            $form->get('service_accueil')->setValueOptions($serviceHopital);

            // SELECTION DE L'HOPITAL ET DU SERVICE SUR LES LISTES
            $data ['hopital_accueil'] = $idHopital;
            $data ['service_accueil'] = $idService;
            $data ['motif_transfert'] = $transfertPatientService ['MOTIF_TRANSFERT'];
            $hopitalSelect = 1;
        } else {
            $hopitalSelect = 0;
            // RECUPERATION DE L'HOPITAL DU SERVICE
            $transfertPatientHopital = $this->getTransfererPatientServiceTable()->getHopitalPatientTransfert($IdDuService);
            $idHopital = $transfertPatientHopital ['ID_HOPITAL'];
            $data ['hopital_accueil'] = $idHopital;
            // RECUPERATION DE LA LISTE DES SERVICES DE L'HOPITAL OU SE TROUVE LE SERVICE OU LE MEDECIN TRAVAILLE
            $serviceHopital = $this->getTransfererPatientServiceTable()->fetchServiceWithHopitalNotServiceActual($idHopital, $IdDuService);
            // LISTE DES SERVICES DE L'HOPITAL
            $form->get('service_accueil')->setValueOptions($serviceHopital);
        }

        // POUR LE RENDEZ VOUS
        // POUR LE RENDEZ VOUS
        // POUR LE RENDEZ VOUS
        // RECUPERE LE RENDEZ VOUS
        $leRendezVous = $this->getRvPatientConsTable()->getRendezVous($id);

        if ($leRendezVous) {
            $data ['heure_rv'] = $leRendezVous->heure;
            $data ['date_rv'] = $this->controlDate->convertDate($leRendezVous->date);
            $data ['motif_rv'] = $leRendezVous->note;
        }
        
       // pour les evacuation et reference
        
        
        
        
        // Pour recuper les bandelettes
        $bandelettes = $this->getConsultationTable()->getBandelette($id);

        // RECUPERATION DES ANTECEDENTS
        // RECUPERATION DES ANTECEDENTS
        // RECUPERATION DES ANTECEDENTS
        $donneesAntecedentsPersonnels = $this->getAntecedantPersonnelTable()->getTableauAntecedentsPersonnels($id_pat);
        $donneesAntecedentsFamiliaux = $this->getAntecedantsFamiliauxTable()->getTableauAntecedentsFamiliaux($id_pat);

        // Recuperer les antecedents medicaux ajouter pour le patient
        // Recuperer les antecedents medicaux ajouter pour le patient
        $antMedPat = $this->getConsultationTable()->getAntecedentMedicauxPersonneParIdPatient($id_pat);

        // Recuperer les antecedents medicaux
        // Recuperer les antecedents medicaux
        $listeAntMed = $this->getConsultationTable()->getAntecedentsMedicaux();

        // Recuperer la liste des actes
        // Recuperer la liste des actes
        $listeActes = $this->getConsultationTable()->getListeDesActes();

        // FIN ANTECEDENTS --- FIN ANTECEDENTS --- FIN ANTECEDENTS
        // FIN ANTECEDENTS --- FIN ANTECEDENTS --- FIN ANTECEDENTS

        // POUR LES DEMANDES D'HOSPITALISATION
        // POUR LES DEMANDES D'HOSPITALISATION
        // POUR LES DEMANDES D'HOSPITALISATION
        $donneesHospi = $this->getDemandeHospitalisationTable()->getDemandehospitalisationParIdcons($id);
        if ($donneesHospi) {
            $data ['motif_hospitalisation'] = $donneesHospi->motif_demande_hospi;
            $data ['date_fin_hospitalisation_prevue'] = $this->controlDate->convertDate($donneesHospi->date_fin_prevue_hospi);
        }
        $form->populateValues(array_merge($data_evac,$data_exam,$data_accou,$data_enf,$data, $bandelettes, $donneesAntecedentsPersonnels, $donneesAntecedentsFamiliaux, $motif_admission));
        return array(
            'id_cons' => $id,
            'lesdetails' => $liste,
            'form' => $form,
      'nbMotifs' => $nbMotif,
            'image' => $image,
            'heure_cons' => $consult->heurecons,
            'liste' => $listeConsultation,
            'liste_med' => $listeMedicament,
            'nb_med_prescrit' => $nbMedPrescrit,
            'liste_med_prescrit' => $listeMedicamentsPrescrits,
            'duree_traitement' => $duree_traitement,
            'verifieRV' => $leRendezVous,
            'listeDemandesMorphologiques' => $listeDemandesMorphologiques,
            'listeDemandesBiologiques' => $listeDemandesBiologiques,
            'listeDemandesActes' => $listeDemandesActes,
            'hopitalSelect' => $hopitalSelect,
            'nbDiagnostics' => $infoDiagnostics->count(),
           // 'nbDonneesExamenPhysique' => $kPhysique,
            'dateonly' => $consult->dateonly,
            'temoin' => $bandelettes ['temoin'],
            // 'temoinMotifAdmission' => $motif_admission['temoinMotifAdmission'],
            'listeForme' => $listeForme,
            'listetypeQuantiteMedicament' => $listetypeQuantiteMedicament,
            'donneesAntecedentsPersonnels' => $donneesAntecedentsPersonnels,
            'donneesAntecedentsFamiliaux' => $donneesAntecedentsFamiliaux,
            'resultRV' => $resultRV,
            'listeDemandesBioEff' => $listeDemandesBiologiquesEffectuer->count(),
            'listeDemandesMorphoEff' => $listeDemandesMorphologiquesEffectuer->count(),
            'resultatVpa' => $resultatVpa,
            'listeHospitalisation' => $listeHospitalisation,
            'tabInfoSurv' => $tabInfoSurv,
            'tableauResultatsExamensBio' => $tableauResultatsExamensBio,
            'listeDesExamensBiologiques' => $listeDesExamensBiologiques,
            'listeDesExamensMorphologiques' => $listeDesExamensMorphologiques,
            'listeAntMed' => $listeAntMed,
            'antMedPat' => $antMedPat,
            'nbAntMedPat' => $antMedPat->count(),
            'listeActes' => $listeActes
        );
	}
	
	
	public function updateComplementAccouchementAction()
	{
        $this->getDateHelper();
        $Control = new DateHelper();
        $id_cons = $this->params()->fromPost('id_cons');
        $id_patient = $this->params()->fromPost('id_patient');
        $form = new ConsultationForm ();
        $formData = $this->getRequest()->getPost();
        $form->setData($formData);
        $id_admission = $this->params()->fromPost('id_admission');
       // $id_grossesse = $this->params()->fromPost('id_grossesse');
       //  var_dump($formData);exit();
        $user = $this->layout()->user;
        $IdDuService = $user ['IdService'];
        $id_medecin = $user ['id_personne'];
      
//DONNEES ACCOUCHEMENT
        

        
        // **********-- MODIFICATION DES CONSTANTES --********
        // **********-- MODIFICATION DES CONSTANTES --********
        // **********-- MODIFICATION DES CONSTANTES --********
    
      
        // les antecedents medicaux du patient a ajouter addAntecedentMedicauxPersonne
        $this->getConsultationTable()->addAntecedentMedicaux($formData);
        $this->getConsultationTable()->addAntecedentMedicauxPersonne($formData);
        
       //$this->getAccouchementTable()->updateAccouchement($form);
        //var_dump($form);exit();
        // mettre a jour les motifs d'admission

        $this->getMotifAdmissionTable()->deleteMotifAdmission($id_cons);
      
      
        $this->getConsultationTable()->updateConsultation($form);
       
        // Recuperer les donnees sur les bandelettes urinaires
        // Recuperer les donnees sur les bandelettes urinaires
        $bandelettes = array(
            'id_cons' => $id_cons,
            'albumine' => $this->params()->fromPost('albumine'),
            'sucre' => $this->params()->fromPost('sucre'),
            'corpscetonique' => $this->params()->fromPost('corpscetonique'),
            'croixalbumine' => $this->params()->fromPost('croixalbumine'),
            'croixsucre' => $this->params()->fromPost('croixsucre'),
            'croixcorpscetonique' => $this->params()->fromPost('croixcorpscetonique')
        );
        // mettre a jour les bandelettes urinaires
        $this->getConsultationTable()->deleteBandelette($id_cons);
        $this->getConsultationTable()->addBandelette($bandelettes);
        
       $id_grossesse= $this->getGrossesseTable()->updateGrossesse($formData);
       // var_dump($id_grossesse);exit();
      $id_antecedent1 = $this->getAntecedentType1Table ()-> updateAntecedentType1($formData); 
    
       		$id_antecedent2 = $this->getAntecedentType2Table ()-> updateAntecedentType2($formData);
       		//var_dump($formData);exit();
       $this->getDonneesExamensPhysiquesTable()->updateExamenPhysique($formData);
	
        $this->getAccouchementTable()->updateAccouchement($formData,$id_grossesse);
       // var_dump('test');exit();
      
        //ENFANT
        
        
       $this->getNaissanceTable()->updateNaissance($formData);
       //var_dump($formData);exit();

     
       
        // POUR LES ANTECEDENTS ANTECEDENTS ANTECEDENTS
        // POUR LES ANTECEDENTS ANTECEDENTS ANTECEDENTS
        // POUR LES ANTECEDENTS ANTECEDENTS ANTECEDENTS

        $donneesDesAntecedents = array(
            // **=== ANTECEDENTS PERSONNELS
            // **=== ANTECEDENTS PERSONNELS
            // LES HABITUDES DE VIE DU PATIENTS
            /* Alcoolique */
            'AlcooliqueHV' => $this->params()->fromPost('AlcooliqueHV'),
            'DateDebutAlcooliqueHV' => $this->params()->fromPost('DateDebutAlcooliqueHV'),
            'DateFinAlcooliqueHV' => $this->params()->fromPost('DateFinAlcooliqueHV'),
            /*Fumeur*/
            'FumeurHV' => $this->params()->fromPost('FumeurHV'),
            'DateDebutFumeurHV' => $this->params()->fromPost('DateDebutFumeurHV'),
            'DateFinFumeurHV' => $this->params()->fromPost('DateFinFumeurHV'),
            'nbPaquetFumeurHV' => $this->params()->fromPost('nbPaquetFumeurHV'),
            /*Droguer*/
            'DroguerHV' => $this->params()->fromPost('DroguerHV'),
            'DateDebutDroguerHV' => $this->params()->fromPost('DateDebutDroguerHV'),
            'DateFinDroguerHV' => $this->params()->fromPost('DateFinDroguerHV'),

            // LES ANTECEDENTS MEDICAUX
            'DiabeteAM' => $this->params()->fromPost('DiabeteAM'),
            'htaAM' => $this->params()->fromPost('htaAM'),
            'drepanocytoseAM' => $this->params()->fromPost('drepanocytoseAM'),
            'dislipidemieAM' => $this->params()->fromPost('dislipidemieAM'),
            'asthmeAM' => $this->params()->fromPost('asthmeAM'),

            // GYNECO-OBSTETRIQUE
            /* Menarche */
            'MenarcheGO' => $this->params()->fromPost('MenarcheGO'),
            'NoteMenarcheGO' => $this->params()->fromPost('NoteMenarcheGO'),
            /*Enf Viv*/
            'EnfVivGO' => $this->params()->fromPost('EnfVivGO'),
            'NoteEnfVivGO' => $this->params()->fromPost('NoteEnfVivGO'),
            /*Gestite*/
            'GestiteGO' => $this->params()->fromPost('GestiteGO'),
            'NoteGestiteGO' => $this->params()->fromPost('NoteGestiteGO'),
            /*Eclampsie*/
            'EclampsieGO' => $this->params()->fromPost('EclampsieGO'),
            'NoteEclampsieGO' => $this->params()->fromPost('NoteEclampsieGO'),
            /*Cesarienne*/
            'CesarienneGO' => $this->params()->fromPost('CesarienneGO'),
            'NoteCesarienneGO' => $this->params()->fromPost('NoteCesarienneGO'),
            /*MortNe*/
            'MortNeGO' => $this->params()->fromPost('MortNeGO'),
            'NoteMortNeGO' => $this->params()->fromPost('NoteMortNeGO'),
            /*Dystocie*/
            'DystocieGO' => $this->params()->fromPost('DystocieGO'),
            'NoteDystocieGO' => $this->params()->fromPost('NoteDystocieGO'),
            /*Parite*/
            'PariteGO' => $this->params()->fromPost('PariteGO'),
            'NotePariteGO' => $this->params()->fromPost('NotePariteGO'),
            /*Cycle*/
            'CycleGO' => $this->params()->fromPost('CycleGO'),
            'DureeCycleGO' => $this->params()->fromPost('DureeCycleGO'),
            'RegulariteCycleGO' => $this->params()->fromPost('RegulariteCycleGO'),
            'DysmenorrheeCycleGO' => $this->params()->fromPost('DysmenorrheeCycleGO'),

            // **=== ANTECEDENTS FAMILIAUX
            // **=== ANTECEDENTS FAMILIAUX
            'DiabeteAF' => $this->params()->fromPost('DiabeteAF'),
            'NoteDiabeteAF' => $this->params()->fromPost('NoteDiabeteAF'),
            'DrepanocytoseAF' => $this->params()->fromPost('DrepanocytoseAF'),
            'NoteDrepanocytoseAF' => $this->params()->fromPost('NoteDrepanocytoseAF'),
            'htaAF' => $this->params()->fromPost('htaAF'),
            'NoteHtaAF' => $this->params()->fromPost('NoteHtaAF')
        );

        $id_personne = $this->getAntecedantPersonnelTable()->getIdPersonneParIdCons($id_cons);
        $this->getAntecedantPersonnelTable()->addAntecedentsPersonnels($donneesDesAntecedents, $id_personne, $id_medecin);
        $this->getAntecedantsFamiliauxTable()->addAntecedentsFamiliaux($donneesDesAntecedents, $id_personne, $id_medecin);

        // POUR LES RESULTATS DES EXAMENS MORPHOLOGIQUES
        // POUR LES RESULTATS DES EXAMENS MORPHOLOGIQUES
        // POUR LES RESULTATS DES EXAMENS MORPHOLOGIQUES

        $info_examen_morphologique = array(
            'id_cons' => $id_cons,
            '8' => $this->params()->fromPost('radio_'),
            '9' => $this->params()->fromPost('ecographie_'),
            '12' => $this->params()->fromPost('irm_'),
            '11' => $this->params()->fromPost('scanner_'),
            '10' => $this->params()->fromPost('fibroscopie_')
        );

        $this->getNotesExamensMorphologiquesTable()->updateNotesExamensMorphologiques($info_examen_morphologique);

        // POUR LES DIAGNOSTICS
        // POUR LES DIAGNOSTICS
        // POUR LES DIAGNOSTICS
        $info_diagnostics = array(
            'id_cons' => $id_cons,
            'diagnostic1' => $this->params()->fromPost('diagnostic1'),
            'diagnostic2' => $this->params()->fromPost('diagnostic2'),
            'diagnostic3' => $this->params()->fromPost('diagnostic3'),
            'diagnostic4' => $this->params()->fromPost('diagnostic4')
        );

        $this->getDiagnosticsTable()->updateDiagnostics($info_diagnostics);

        // POUR LES TRAITEMENTS
        // POUR LES TRAITEMENTS
        // POUR LES TRAITEMENTS
        /**
         * ** MEDICAUX ***
         */
        /**
         * ** MEDICAUX ***
         */
        $dureeTraitement = $this->params()->fromPost('duree_traitement_ord');
        $donnees = array(
            'id_cons' => $id_cons,
            'duree_traitement' => $dureeTraitement
        );

        $Consommable = $this->getOrdonConsommableTable();
        $tab = array();
        $j = 1;

        $nomMedicament = "";
        $formeMedicament = "";
        $quantiteMedicament = "";
        for ($i = 1; $i < 10; $i++) {
            if ($this->params()->fromPost("medicament_0" . $i)) {

                $nomMedicament = $this->params()->fromPost("medicament_0" . $i);
                $formeMedicament = $this->params()->fromPost("forme_" . $i);
                $quantiteMedicament = $this->params()->fromPost("quantite_" . $i);

                if ($this->params()->fromPost("medicament_0" . $i)) {

                    $result = $Consommable->getMedicamentByName($this->params()->fromPost("medicament_0" . $i))['ID_MATERIEL'];

                    if ($result) {
                        $tab [$j++] = $result;
                        $tab [$j++] = $formeMedicament;
                        $Consommable->addFormes($formeMedicament);
                        $tab [$j++] = $this->params()->fromPost("nb_medicament_" . $i);
                        $tab [$j++] = $quantiteMedicament;
                        $Consommable->addQuantites($quantiteMedicament);
                    } else {
                        $idMedicaments = $Consommable->addMedicaments($nomMedicament);
                        $tab [$j++] = $idMedicaments;
                        $tab [$j++] = $formeMedicament;
                        $Consommable->addFormes($formeMedicament);
                        $tab [$j++] = $this->params()->fromPost("nb_medicament_" . $i);
                        $tab [$j++] = $quantiteMedicament;
                        $Consommable->addQuantites($quantiteMedicament);
                    }
                }
            }
        }

        /* Mettre a jour la duree du traitement de l'ordonnance */
        $idOrdonnance = $this->getOrdonnanceTable()->updateOrdonnance($tab, $donnees);

        /* Mettre a jour les medicaments */
        $resultat = $Consommable->updateOrdonConsommable($tab, $idOrdonnance, $nomMedicament);

        /* si aucun mï¿½dicament n'est ajoutï¿½ ($resultat = false) on supprime l'ordonnance */
        if ($resultat == false) {
            $this->getOrdonnanceTable()->deleteOrdonnance($idOrdonnance);
        }

     
        /**
         * ** CHIRURGICAUX ***
         */
        $infoDemande = array(
            'diagnostic' => $this->params()->fromPost("diagnostic_traitement_chirurgical"),
            'intervention_prevue' => $this->params()->fromPost("intervention_prevue"),
            'observation' => $this->params()->fromPost("observation"),
            'ID_CONS' => $id_cons
        );

        $this->getDemandeVisitePreanesthesiqueTable()->updateDemandeVisitePreanesthesique($infoDemande);

        /**
         * ** INSTRUMENTAL ***
         */
        /**
         * ** INSTRUMENTAL ***
         */
        /**
         * ** INSTRUMENTAL ***
         */
        $traitement_instrumental = array(
            'id_cons' => $id_cons,
            'endoscopie_interventionnelle' => $this->params()->fromPost('endoscopieInterventionnelle'),
            'radiologie_interventionnelle' => $this->params()->fromPost('radiologieInterventionnelle'),
            'cardiologie_interventionnelle' => $this->params()->fromPost('cardiologieInterventionnelle'),
            'autres_interventions' => $this->params()->fromPost('autresIntervention')
        );
        $this->getConsultationTable()->addTraitementsInstrumentaux($traitement_instrumental);

        // POUR LES COMPTES RENDU DES TRAITEMENTS
        // POUR LES COMPTES RENDU DES TRAITEMENTS
        $note_compte_rendu1 = $this->params()->fromPost('note_compte_rendu_operatoire');
        $note_compte_rendu2 = $this->params()->fromPost('note_compte_rendu_operatoire_instrumental');

        $this->getConsultationTable()->addCompteRenduOperatoire($note_compte_rendu1, 1, $id_cons);
        $this->getConsultationTable()->addCompteRenduOperatoire($note_compte_rendu2, 2, $id_cons);

        // POUR LES RENDEZ VOUS
        // POUR LES RENDEZ VOUS
        // POUR LES RENDEZ VOUS
        $id_patient = $this->params()->fromPost('id_patient');
        $date_RV_Recu = $this->params()->fromPost('date_rv');
        if ($date_RV_Recu) {
            $date_RV = $this->controlDate->convertDateInAnglais($date_RV_Recu);
        } else {
            $date_RV = $date_RV_Recu;
        }
        $infos_rv = array(
            'ID_CONS' => $id_cons,
            'NOTE' => $this->params()->fromPost('motif_rv'),
            'HEURE' => $this->params()->fromPost('heure_rv'),
            'DATE' => $date_RV
        );
        $this->getRvPatientConsTable()->updateRendezVous($infos_rv);

        // POUR LES TRANSFERT
        // POUR LES TRANSFERT
        // POUR LES TRANSFERT
        $info_transfert = array(
            'ID_SERVICE' => $this->params()->fromPost('id_service'),
            'ID_MEDECIN' => $this->params()->fromPost('med_id_personne'),
            'MOTIF_TRANSFERT' => $this->params()->fromPost('motif_transfert'),
            'ID_CONS' => $id_cons
        );

        $this->getTransfererPatientServiceTable()->updateTransfertPatientService($info_transfert);

        // POUR LES HOSPITALISATION
        // POUR LES HOSPITALISATION
        // POUR LES HOSPITALISATION
        $today = new \DateTime ();
        $dateAujourdhui = $today->format('Y-m-d H:i:s');
        $infoDemandeHospitalisation = array(
            'motif_demande_hospi' => $this->params()->fromPost('motif_hospitalisation'),
            'date_demande_hospi' => $dateAujourdhui,
           'date_fin_prevue_hospi' => $this->controlDate->convertDateInAnglais($this->params()->fromPost('date_fin_hospitalisation_prevue')),
            'id_cons' => $id_cons
        );

        $this->getDemandeHospitalisationTable()->saveDemandehospitalisation($infoDemandeHospitalisation);

        // POUR LA PAGE complement-consultation
        // POUR LA PAGE complement-consultation
        // POUR LA PAGE complement-consultation
        if ($this->params()->fromPost('terminer') == 'save') {

            // VALIDER EN METTANT '1' DANS CONSPRISE Signifiant que le medecin a consulter le patient
            // Ajouter l'id du medecin ayant consulter le patient
            $valide = array(
                'VALIDER' => 1,
                'ID_CONS' => $id_cons,
                'ID_MEDECIN' => $this->params()->fromPost('med_id_personne')
            );
            $this->getConsultationTable()->validerConsultation($valide);
           
        }

        return $this->redirect()->toRoute('accouchement', array(
            'action' => 'accoucher'
        ));
    }
	
	
	
 
    public function getPath(){
    	$this->path = $this->getServiceLocator()->get('Request')->getBasePath();
    	return $this->path;
    }

    public function impressionPdfAction(){
    	
    	$user = $this->layout()->user;
    	$serviceMedecin = $user['NomService'];
    
    	$nomMedecin = $user['Nom'];
    	$prenomMedecin = $user['Prenom'];
    	$donneesMedecin = array('nomMedecin' => $nomMedecin, 'prenomMedecin' => $prenomMedecin);

    
    	//*************************************
    	//*************************************
    	//***DONNEES COMMUNES A TOUS LES PDF***
    	//*************************************
    	//*************************************
    	$id_patient = $this->params ()->fromPost ( 'id_patient', 0 );
    	$id_cons = $this->params ()->fromPost ( 'id_cons', 0 );
    
    	//*************************************
    	$donneesPatientOR = $this->getConsultationTable()->getInfoPatient($id_patient);
    	//var_dump($donneesPatientOR); exit();
    	//**********ORDONNANCE*****************
    	//**********ORDONNANCE*****************
    	//**********ORDONNANCE*****************
    	
    	if(isset($_POST['ordonnance'])){
    		//var_dump("test");exit();
    		//récupération de la liste des médicaments
    		$medicaments = $this->getConsultationTable()->fetchConsommable();
    			
    		$tab = array();
    		$j = 1;
    		
    		//NOUVEAU CODE AVEC AUTOCOMPLETION
    		for($i = 1 ; $i < 10 ; $i++ ){
    			$nomMedicament = $this->params()->fromPost("medicament_0".$i);
    			if($nomMedicament == true){
    				$tab[$j++] = $this->params()->fromPost("medicament_0".$i);
    				$tab[$j++] = $this->params()->fromPost("forme_".$i);
    				$tab[$j++] = $this->params()->fromPost("nb_medicament_".$i);
    				$tab[$j++] = $this->params()->fromPost("quantite_".$i);
    			}
    		}
    		
    		//-***************************************************************
    		//Création du fichier pdf
    		//*************************
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new OrdonnancePdf();
    
    		//Envoyer l'id_cons
    		$page->setIdCons($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoyer les données sur le partient
    		$page->setDonneesPatient($donneesPatientOR);
    		//Envoyer les médicaments
    		$page->setMedicaments($tab);
    			
    		//Ajouter une note à la page
    		$page->addNote();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    	}
    	else
    	//**********TRAITEMENT CHIRURGICAL*****************
    	//**********TRAITEMENT CHIRURGICAL*****************
    	//**********TRAITEMENT CHIRURGICAL*****************
    	if(isset($_POST['traitement_chirurgical'])){
    		//Récupération des données
    		$donneesDemande['diagnostic'] = $this->params ()->fromPost ( 'diagnostic_traitement_chirurgical' );
    		$donneesDemande['intervention_prevue'] = $this->params ()->fromPost (  'intervention_prevue' );
    		$donneesDemande['observation'] = $this->params()->fromPost('observation');
    			
    		//CREATION DU DOCUMENT PDF
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new TraitementChirurgicalPdf();
    			
    		//Envoi Id de la consultation
    		$page->setIdConsTC($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoi des données du patient
    		$page->setDonneesPatientTC($donneesPatientOR);
    		//Envoi des données du medecin
    		$page->setDonneesMedecinTC($donneesMedecin);
    		//Envoi les données de la demande
    		$page->setDonneesDemandeTC($donneesDemande);
    			
    		//Ajouter les donnees a la page
    		$page->addNoteTC();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    			
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    			
    	}
    	else
    	//**********TRANSFERT DU PATIENT*****************
    	//**********TRANSFERT DU PATIENT*****************
    	//**********TRANSFERT DU PATIENT*****************
    	if (isset ($_POST['transfert']))
    	{
    		$id_hopital = $this->params()->fromPost('hopital_accueil');
    		$id_service = $this->params()->fromPost('service_accueil');
    		$motif_transfert = $this->params()->fromPost('motif_transfert');
    
    		//Récupérer le nom du service d'accueil
    		$service = $this->getServiceTable();
    		$infoService = $service->getServiceparId($id_service);
    		//Récupérer le nom de l'hopital d'accueil
    		$hopital = $this->getHopitalTable();
    		$infoHopital = $hopital->getHopitalParId($id_hopital);
    			
    		$donneesDemandeT['NomService'] = $infoService['NOM'];
    		$donneesDemandeT['NomHopital'] = $infoHopital['NOM_HOPITAL'];
    		$donneesDemandeT['MotifTransfert'] = $motif_transfert;
    
    		//-***************************************************************
    		//Création du fichier pdf
    		//-***************************************************************
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new TransfertPdf();
    
    		//Envoi Id de la consultation
    		$page->setIdConsT($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoi des données du patient
    		$page->setDonneesPatientT($donneesPatientOR);
    		//Envoi des données du medecin
    		$page->setDonneesMedecinT($donneesMedecin);
    		//Envoi les données de la demande
    		$page->setDonneesDemandeT($donneesDemandeT);
    
    		//Ajouter les donnees a la page
    		$page->addNoteT();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    	}
    	else
    	//**********RENDEZ VOUS ****************
    	//**********RENDEZ VOUS ****************
    	//**********RENDEZ VOUS ****************
    	if(isset ($_POST['rendezvous'])){
    			
    		$donneesDemandeRv['dateRv'] = $this->params()->fromPost('date_rv_tampon');
    		$donneesDemandeRv['heureRV'] = $this->params()->fromPost('heure_rv_tampon');
    		$donneesDemandeRv['MotifRV'] = $this->params()->fromPost('motif_rv');
    
    		//Création du fichier pdf
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new RendezVousPdf();
    
    		//Envoi Id de la consultation
    		$page->setIdConsR($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoi des données du patient
    		$page->setDonneesPatientR($donneesPatientOR);
    		//Envoi des données du medecin
    		$page->setDonneesMedecinR($donneesMedecin);
    		//Envoi les données du redez vous
    		$page->setDonneesDemandeR($donneesDemandeRv);
    
    		//Ajouter les donnees a la page
    		$page->addNoteR();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    			
    	}
    	else
    	//**********TRAITEMENT INSTRUMENTAL ****************
    	//**********TRAITEMENT INSTRUMENTAL ****************
    	//**********TRAITEMENT INSTRUMENTAL ****************
    	if(isset ($_POST['traitement_instrumental'])){
    		//Récupération des données
    		$donneesTraitementChirurgical['endoscopieInterventionnelle'] = $this->params ()->fromPost ( 'endoscopieInterventionnelle' );
    		$donneesTraitementChirurgical['radiologieInterventionnelle'] = $this->params ()->fromPost (  'radiologieInterventionnelle' );
    		$donneesTraitementChirurgical['cardiologieInterventionnelle'] = $this->params()->fromPost('cardiologieInterventionnelle');
    		$donneesTraitementChirurgical['autresIntervention'] = $this->params()->fromPost('autresIntervention');
    			
    		//CREATION DU DOCUMENT PDF
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new TraitementInstrumentalPdf();
    			
    		//Envoi Id de la consultation
    		$page->setIdConsTC($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoi des données du patient
    		$page->setDonneesPatientTC($donneesPatientOR);
    		//Envoi des données du medecin
    		$page->setDonneesMedecinTC($donneesMedecin);
    		//Envoi les données de la demande
    		$page->setDonneesDemandeTC($donneesTraitementChirurgical);
    			
    		//Ajouter les donnees a la page
    		$page->addNoteTC();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    			
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    	}
    	else
    	//**********HOSPITALISATION ****************
    	//**********HOSPITALISATION ****************
    	//**********HOSPITALISATION ****************
    	if(isset ($_POST['hospitalisation'])){
    		//Récupération des données
    		$donneesHospitalisation['motif_hospitalisation'] = $this->params ()->fromPost ( 'motif_hospitalisation' );
    		$donneesHospitalisation['date_fin_hospitalisation_prevue'] = $this->params ()->fromPost (  'date_fin_hospitalisation_prevue' );
    
    		//CREATION DU DOCUMENT PDF
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new HospitalisationPdf();
    		//Envoi Id de la consultation
    		$page->setIdConsH($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoi des données du patient
    		$page->setDonneesPatientH($donneesPatientOR);
    		//Envoi des données du medecin
    		$page->setDonneesMedecinH($donneesMedecin);
    		//Envoi les données de la demande
    		$page->setDonneesDemandeH($donneesHospitalisation);
    
    		//Ajouter les donnees a la page
    		$page->addNoteH();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    	}
    	else
    	//**********DEMANDES D'EXAMENS****************
    	//**********DEMANDES D'EXAMENS****************
    	//**********DEMANDES D'EXAMENS****************
    	if(isset ($_POST['demandeExamenBioMorpho'])){
    		$i = 1; $j = 1;
    		$donneesExamensBio = array();
    		$notesExamensBio = array();
    		//Récupération des données examens biologiques
    		for( ; $i <= 6; $i++){
    			if($this->params ()->fromPost ( 'examenBio_name_'.$i )){
    				$donneesExamensBio[$j] = $this->params ()->fromPost ( 'examenBio_name_'.$i );
    				$notesExamensBio[$j++ ] = $this->params ()->fromPost ( 'noteExamenBio_'.$i  );
    			}
    		}
    
    		$k = 1; $l = $j;
    		$donneesExamensMorph = array();
    		$notesExamensMorph = array();
    		//Récupération des données examens morphologiques
    		for( ; $k <= 11; $k++){
    			if($this->params ()->fromPost ( 'element_name_'.$k )){
    				$donneesExamensMorph[$l] = $this->params ()->fromPost ( 'element_name_'.$k );
    				$notesExamensMorph[$l++ ] = $this->params ()->fromPost ( 'note_'.$k  );
    			}
    		}
    
    
    		//CREATION DU DOCUMENT PDF
    		//Créer le document
    		$DocPdf = new DocumentPdf();
    		//Créer la page
    		$page = new DemandeExamenPdf();
    		//Envoi Id de la consultation
    		$page->setIdConsBio($id_cons);
    		$page->setService($serviceMedecin);
    		//Envoi des données du patient
    		$page->setDonneesPatientBio($donneesPatientOR);
    		//Envoi des données du medecin
    		$page->setDonneesMedecinBio($donneesMedecin);
    		//Envoi les données de la demande
    		$page->setDonneesDemandeBio($donneesExamensBio);
    		$page->setNotesDemandeBio($notesExamensBio);
    		$page->setDonneesDemandeMorph($donneesExamensMorph);
    		$page->setNotesDemandeMorph($notesExamensMorph);
    
    			
    		//Ajouter les donnees a la page
    		$page->addNoteBio();
    		//Ajouter la page au document
    		$DocPdf->addPage($page->getPage());
    			
    		//Afficher le document contenant la page
    		$DocPdf->getDocument();
    	}
    		
    }
    
    
    
    
    
    
    
    
    
}