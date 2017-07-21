<?php
namespace Maternite\Model;

class AntecedentType1 {
	public $id_patient;
	public $id_cons;
	public $id_service;
	public $date_cons;
	public $enf_viv;
	public $geste;
	public $parite;
	public $mort_ne;
	public $cesar;
	public $note_enf;
	public $note_geste;
	public $note_parite;
	public $note_mort_ne;
	public $note_cesar;
	//public $date_archivage;
	//public $heure_archivage;
	//public $cons_archive_applique;
	//public $archivage;

	public function exchangeArray($data) {
		
		//$this->id_admission = (! empty ( $data ['id_admission'] )) ? $data ['id_admission'] : null;
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->geste = (! empty ( $data ['geste'] )) ? $data ['geste'] : null;
		$this->parite = (! empty ( $data ['parite'] )) ? $data ['parite'] : null;
		$this->enf_viv = (! empty ( $data ['enf_viv'] )) ? $data ['enf_viv'] : null;
		$this->mort_ne = (! empty ( $data ['mort_ne'] )) ? $data ['mort_ne'] : null;
		$this->cesar = (! empty ( $data ['cesar'] )) ? $data ['cesar'] : null;
		$this->note_enf = (! empty ( $data ['note_enf'] )) ? $data ['note_enf'] : null;
		$this->note_geste = (! empty ( $data ['note_geste'] )) ? $data ['note_geste'] : null;	
		$this->note_parite = (! empty ( $data ['note_parite'] )) ? $data ['note_parite'] : null;
		$this->note_cesar = (! empty ( $data ['note_cesar'] )) ? $data ['note_cesar'] : null;
		$this->note_mort_ne = (! empty ( $data ['note_mort_ne'] )) ? $data ['note_mort_ne'] : null;

		
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}