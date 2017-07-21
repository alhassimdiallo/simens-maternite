<?php
namespace Maternite\Model;

class Admission {
	public $id_admission;
	public $motif_admission;
	public $id_evacuation;
	public $id_reference;
// 	public $id_grossesse;
// 	public $id_ant_t2;
	public $id_patient;
	public $id_service;
	public $date_cons;
// 	public $evacuee_de;
// 	public $motif_evac;
// 	public $geste;
// 	public $parite;
// 	public $mort_ne;
// 	public $enf_viv;
// 	public $cesar;
// 	public $vat_1;
// 	public $vat_2;
// 	public $vat_3;
// 	public $nombre_bb;
	//public $taux_majoration;
	//public $id_type_facturation;
	//public $organisme;

// 	public $dystocie;
// 	public $eclampsie;
// 	public $ddr;
// 	public $duree_grossesse;
// 	public $bb_attendu;
// 	public $nb_cpn;
// 	public $refrence;
// 	public $service;
// 	public $motif_ref;
	public $id_employe;
	public $date_enregistrement;
	//public $date_archivage;
	//public $heure_archivage;
	//public $cons_archive_applique;
	//public $archivage;

	public function exchangeArray($data) {
		
		$this->id_admission = (! empty ( $data ['id_admission'] )) ? $data ['id_admission'] : null;
		$this->motif_admission=(!empty($data ['motif_admission'])) ? $data['motif_admission']:null;
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->id_evacuation = (! empty ( $data ['id_evacuation'] )) ? $data ['id_evacuation'] : null;
		$this->id_reference = (! empty ( $data ['id_reference'] )) ? $data ['id_reference'] : null;
// 		$this->id_grossesse = (! empty ( $data ['id_grossesse'] )) ? $data ['id_grossesse'] : null;
// 		$this->id_ant_t2 = (! empty ( $data ['id_ant_t2'] )) ? $data ['id_ant_t2'] : null;
		$this->id_service = (! empty ( $data ['id_service'] )) ? $data ['id_service'] : null;
		$this->date_cons = (! empty ( $data ['date_cons'] )) ? $data ['date_cons'] : null;
// 		$this->evacuee_de = (! empty ( $data ['evacuee_de'] )) ? $data ['evacuee_de'] : null;
// 	$this->motif_evac = (! empty ( $data ['motif_evac'] )) ? $data ['motif_evac'] : null;
		
// 		$this->geste = (! empty ( $data ['geste'] )) ? $data ['geste'] : null;
// 		$this->parite = (! empty ( $data ['parite'] )) ? $data ['parite'] : null;
// 		$this->enf_viv = (! empty ( $data ['enf_viv'] )) ? $data ['enf_viv'] : null;
		
// 		$this->mort_ne = (! empty ( $data ['mort_ne'] )) ? $data ['mort_ne'] : null;
// 		$this->cesar = (! empty ( $data ['cesar'] )) ? $data ['cesar'] : null;
// 		$this->dystocie = (! empty ( $data ['dystocie'] )) ? $data ['dystocie'] : null;
// 		$this->eclampsie = (! empty ( $data ['eclampsie'] )) ? $data ['eclampsie'] : null;

		//$this->nb_cpn = (! empty ( $data ['nb_cpn'] )) ? $data ['nb_cpn'] : null;
// 		$this->service = (! empty ( $data ['service'] )) ? $data ['service'] : null;
// 		$this->refrence = (! empty ( $data ['reference'] )) ? $data ['reference'] : null;
// 		$this->motif_ref = (! empty ( $data ['motif_ref'] )) ? $data ['motif_ref'] : null;
		$this->id_employe = (! empty ( $data ['id_employe'] )) ? $data ['id_employe'] : null;
		$this->date_enregistrement = (! empty ( $data ['date_enregistrement'] )) ? $data ['date_enregistrement'] : null;
// 		$this->ddr = (! empty ( $data ['ddr'] )) ? $data ['ddr'] : null;
// 		$this->duree_grossesse = (! empty ( $data ['duree_grossesse'] )) ? $data ['duree_grossesse'] : null;
// 		$this->vat_1 = (! empty ( $data ['vat_1'] )) ? $data ['vat_1'] : null;
// 		$this->vat_2 = (! empty ( $data ['vat_2'] )) ? $data ['vat_2'] : null;
// 		$this->vat_3 = (! empty ( $data ['vat_3'] )) ? $data ['vat_3'] : null;
// 		$this->bb_attendu = (! empty ( $data ['bb_attendu'] )) ? $data ['bb_attendu'] : null;
// 		$this->nombre_bb = (! empty ( $data ['nombre_bb'] )) ? $data ['nombre_bb'] : null;
		//$this->date_archivage = (! empty ( $data ['date_archivage'] )) ? $data ['date_archivage'] : null;
		//$this->heure_archivage = (! empty ( $data ['heure_archivage'] )) ? $data ['heure_archivage'] : null;
		//$this->cons_archive_applique = (! empty ( $data ['cons_archive_applique'] )) ? $data ['cons_archive_applique'] : null;
		//$this->archivage = (! empty ( $data ['archivage'] )) ? $data ['archivage'] : null;
		
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}