<?php
namespace Maternite\Model;

class AntecedentType2 {

	public $id_patient;
	public $id_cons;
	public $dystocie;
	public $eclampsie;
	public $cycle;
	public $duree_cycle;
	public $regularite;

	public $note_eclampsie;
	public $note_dystocie;
	public $note_cycle;
	public $autre;
	public $note_autre;
	



	public function exchangeArray($data) {
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
		$this->dystocie = (! empty ( $data ['dystocie'] )) ? $data ['dystocie'] : null;
		$this->eclampsie = (! empty ( $data ['eclampsie'] )) ? $data ['eclampsie'] : null;
		$this->duree_cycle = (! empty ( $data ['duree_cycle'] )) ? $data ['duree_cycle'] : null;
		$this->regularite = (! empty ( $data ['regularite'] )) ? $data ['regularite'] : null;
		$this->autre = (! empty ( $data ['autre'] )) ? $data ['autre'] : null;
		//$this->note_mort_ne = (! empty ( $data ['note_mort_ne'] )) ? $data ['note_mort_ne'] : null;
		$this->note_dystocie = (! empty ( $data ['note_dystocie'] )) ? $data ['note_dystocie'] : null;
		$this->note_eclampsie = (! empty ( $data ['note_eclampsie'] )) ? $data ['note_eclampsie'] : null;
		$this->note_autre = (! empty ( $data ['note_autre'] )) ? $data ['note_autre'] : null;
		$this->note_cycle = (! empty ( $data ['note_cycle'] )) ? $data ['note_cycle'] : null;
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}